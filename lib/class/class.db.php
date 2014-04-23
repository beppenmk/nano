<?php
/*
Aggiunto un embrione di gestione errori 
adesso ogni metodo in caso di errore lo restituisce autonomamente senza dover controllare l'esito;
*/

//creo una classe x la gestione del db
class mysql{
	
	//proprietà
	//uso protected per evitare di modificare i valori 
	protected  $database;
	protected  $host;
	protected  $user;
	protected  $password;
	protected  $db;
	protected  $pre="";
	protected  $root;
	public  $elenco_sql;
	
//costruttore
// al suo interno effettuo la connessione al DB
	function __construct($database,$host,$user,$password,$root,$azione){
		
		//il costruttore popola solo le proprietà di classe
		$this->database=$database;
		$this->host=$host;
		$this->user=$user;
		$this->password=$password;
		$this->root=$root;
		$this->azione=$azione;
		
	}
	
	
//metodo connessione;
//utilizzo la visibilità protected per evitare di utilizare la connessione fine a se stessa
//questo metodo può essere richiamato solo da altri metodi 
	protected  function connect(){

		$esito_connessione = $this->db=mysql_connect($this->host,$this->user,$this->password);
		
		
		
		if($esito_connessione){
			//connessione andata a buon fine
			$esito_connessione_db = mysql_select_db($this->database,$this->db); 	
				if($esito_connessione_db){
					return $esito_connessione_db;
				}else{
					echo 'Nessun DB selezionato';
					return false;
				}
		
		}else{
			//connessione fallita
			echo "<p style=\"color:red\">Non mi son collegato al db.<br/>Ricontrolla i parametri </p>";
			return false;		
		}	
	}
	
	/*
	 * in questo metodo pulisco i dati prima di utilizzarli 
	 */
	protected function pulisci($array,$t = 0){
		$dati = array();
		
		if($t == 0){
			foreach ($array as $k =>$v){
			/*
			 * <?php  ''' èèè """  ?>  ''' èèè """ [b]xxx[/b]
			 * 
			 */
				
				$v = addslashes($v);
				$v=htmlspecialchars($v);
				//$v = utf8_encode($v);
				//$v = htmlentities($v);
				
				$v = trim($v);
				
				
									
				
				$dati[$k] = $v;
			}
		}elseif($t==1){
			foreach ($array as $k =>$v){
				
				//$v=utf8_decode($v);
				//$v=html_entity_decode($v);
					
				$v=stripslashes($v);
				$v=trim($v);
				//$v = str_replace('&lt;br /&gt;','/n',$v);;
				
				/*
				 * nn attivo queste conversioni nel pannello di controllo 
				 */				
				
				if(!isset($_GET['azione']) ||  (!preg_match('#^p_(.*?)#',@$_GET['azione'])) ){
					 //bold
					$v=preg_replace("#\[b\](.*?)\[/b\]#","<b>$1</b>",$v);
					//italic
					$v=preg_replace("#\[i\](.*?)\[/i\]#","<i>$1</i>",$v);
					//link
					$v=preg_replace("#\[link\](.*?)\[/link\]#","<a class=\"link_pannello\" onclick=\"window.open(this.href); return false;\" href=\"".$this->root."/documenti/$1\">$1</a>",$v);
					
					//link web
					$v=preg_replace("#\[www\](.*?)\[/www\]#","<a onclick=\"window.open(this.href); return false;\" href=\"http://$1\">$1</a>",$v);


					//titolo
					$v=preg_replace("#\[titolo\](.*?)\[/titolo\]#","<h3 class=\"titolo_pannello\">$1</h3>",$v);

					//immagini
					$v=preg_replace("#\[img\](.*?)\[/img\]#","<img  src=\"".$this->root."/documenti/$1\" alt=\"foto nel testo\" class=\"immagine_testo\"/>",$v);
					
					//correzione a capo 
					$v=nl2br($v);
				
				}	
				$dati[$k] = $v;
			}
		}
		
		return $dati;
	}
	
	

	
	
	public function debug(){
		 
		return   $this->elenco_sql;
    
	}
	
	
//metodo chiusura connessione
	public function close() {
		return mysql_close($this->db);
	}


########################################
//metodo che passa una query standard
	public function query($sql){
		//echo $sql.'<hr>';
		 $this->elenco_sql.='<hr>'.$sql;
		 
		//echo  $this->debug();
		 
		if($this->connect()){
			mysql_query('SET NAMES utf8');
			$esito = mysql_query($sql);
			if(!$esito||$esito==''){
			
				
			}else{
			
			 return $esito;
			}	
		}
		
		
	}


//metodo che legge una query select restituendo array	
	public function read($tabella,$filtro=''){
		$dati='';
		
		if($filtro !='')
		$filtro =' AND '.$filtro;
		
		$ris=$this->query("SELECT * FROM ".$this->pre.$tabella." where 1 $filtro");
		if($ris!=''){
				while ($riga=mysql_fetch_assoc($ris)){
					
					$dati[]=$this->pulisci($riga,1);
				}
				
		
			return (is_array($dati)) ? $dati: array();
		}
	
	}



########################################
//metodo che passa una query insert
	public function insert($tabella,$dati){
		
		$dati = $this->pulisci($dati);
		
		$chiavi = '';
		$valori = '';
		$sql = "INSERT INTO ".$this->pre.$tabella."  ";
		
		foreach($dati as $k =>$v){
			$chiavi .=$k.',';
			$valori .= "'".$v."',";
		}
		$chiavi=substr($chiavi,0,($chiavi)-1);	
		$valori=substr($valori,0,($valori)-1);
		
			
		$sql.='('.$chiavi.')';
		$sql.=" VALUES ($valori)";
	
	
 

		if($this->query($sql)){
			return true;
		}
		
	}
	
	public function last_id($tabella,$id='id'){
		$sql = "SELECT ".$id." from ".$this->pre.$tabella."  order by  ".$id." DESC";
		$ris=$this->query($sql);
		if($ris!=''){
			$riga= mysql_fetch_array($ris);
			return $riga[0];
		}else{
			return 0;
		}



	}
########################################
//metodo che passa una query update
	public function update($tabella,$dati,$valore,$campo='id'){
			$dati = $this->pulisci($dati);
		$campi='';
		$sql = "UPDATE ".$this->pre.$tabella." SET ";
		foreach($dati as $k =>$v){
			$campi .="$k = '".$v."',";
		}
		$campi=substr($campi,0,($campi)-1);	
		$sql.=$campi;
		
		$sql.=" WHERE $campo = '$valore'";
		if($this->query($sql))
			return true;	
	}
	
########################################
//metodo che passa una query delete
	public function delete($tabella,$valore,$campo_confronto='id',$campo=''){
		
		
		if($campo!=''){
		//svuoto solo un campo 	
			$sql="UPDATE $tabella SET $campo = '' WHERE $campo_confronto = '$valore';";
		}else{
		//elimino riga	
			$sql = "DELETE FROM ".$this->pre.$tabella." WHERE $campo_confronto = '$valore' ";
		}
				if($this->query($sql))
				return true;
		


	}	
	
########################################
//metodo che trova una riga 
	public function riga($tabella,$valore,$campo='id'){
		$ris = $this->read($tabella," $campo = $valore"); 
		if($ris!=''){
			return 	$this->pulisci($ris[0],1);
		}

	}
########################################
//metodo che genera una select di un campo di una tabella

	public function select($tabella,$nome_da_visualizzare,$value,$default='',$filtro=''){
		$riga = $this->read($tabella,$filtro);
		$n=$this->conta($tabella,$filtro);
		$opt='<option value="">--Scegli--</option>';
		
		if($riga!=''){	
			for($i=0;$i<$n;$i++){
				
				$sel='';
				if($default==$riga[$i][$value]){ $sel = 'selected="selected"';}
				$opt.= '<option value="'.$riga[$i][$value].'" '.$sel.'>'.$riga[$i][$nome_da_visualizzare].'</option>';
				$sel='';
			
			}			
				return "<select ddv-required ='true' name=\"".$value."_".$tabella."\">".$opt.'</select>';

			}
		
	}


########################################
//metodo che conta i dati di una tabella con opzionale filtro
	public function conta($tabella,$filtro=''){
		if($filtro !='')
		$filtro =' AND '.$filtro;
		$ris=$this->query("SELECT count(*) FROM ".$this->pre.$tabella." WHERE 1 $filtro");
		if($ris!=''){
			$riga= mysql_fetch_array($ris);
			return $riga[0];
		}else{
			return 0;
		}
	}
	
########################################
//metodo che trova qualcosa 
	
	public function trova($tabella,$campo,$campo_confronto,$valore,$corto=1){	
	 $dati=array();
	 $sql="SELECT $campo FROM ".$this->pre.$tabella."  WHERE $campo_confronto = '$valore'";
	
		$ris=$this->query($sql);
		if($ris!=''){
				while ($riga=mysql_fetch_assoc($ris)){
					$dati[]=$this->pulisci($riga,1);
				}
			if($corto==1){
				return $dati[0][$campo];
				exit;
			}else{
				return $dati;	
			}
				
				
			
		}
	
}
	
	
	/*
	 * 
	 * @param object $cosa [optional]
	 * @param object $id [optional]
	 * @return 
	 */
	//contenuti della pagina
	public function pagina($cosa='testo',$id='' ){
	
	
	$id = ($id=='')?$this->azione:$id; 
	
	
	$tabella = $this->pre.$_SESSION[$this->database]['lingua'];
	
	$sql="SELECT $cosa FROM ".$this->pre.$tabella." WHERE pagina = '$id'";
	
	$ris=$this->query($sql);

	$riga=mysql_fetch_array($ris);
	return $riga[0];
}

	


}





/*
//istanzio classe
$prova = new mysql($database,$host,$user,$password);

//restituisco array
$prova->read('tabella','filtro(opzionale)');

//query
//passo una query qualunque
//restituisco bool
$prova->query('sql');


//insert
//insert in tabella (array = chiave valore)
//restituisco bool
$prova->insert('tabella',array);->bool	


//conta
//conto gli elementi du una tabella filtro opzionale
//restituisce numero
$prova->conta('tabella','filtro (opzionale)');


//select
//restituisce un campo di tipo select
//nome da visualizzare nel menu a tendina
// value da passare (default il dato precedente )
//filtro opzionale
$prova->select('tabella','nome_da_visualizzare','campo_value','filtro(opzionale)');


//riga
//restituisce un array di una riga sola
//nome tabella
//valore campo confronto
//campo di confronto di default id 
$prova->riga('tabella','valore','campo')



//update 
//tabella (array = chiave valore) 
// valore del campo 
// campo (default id)
//restituisco bool
$prova->update($tabella,$dati,$valore,$campo,);


//delete
//tabella
//valore del campo
//campo di confronto (default id)
//campo(default vuoto ) se non vuoto cancella solo il campo corrispondente, se vuoto cancella la riga
$prova->delete($tabella,$valore,$campo_confronto='id',$campo='')


//trova
//tabella
//campo da cercare
//campo da confrontare
//valore da confrontare

$prova->trova($tabella,$campo,$campo_confronto,$valore)


*/
