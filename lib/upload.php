<?php
include_once 'init.php';
$tab =$_GET['tab'];
$dati['id_'.$tab] = $_GET['id']; 

//If directory doesnot exists create it.
$output_dir = "../uploads/$tab/";

if(isset($_FILES["myfile"]))
{
	$ret = array();
	$error =$_FILES["myfile"]["error"];
   {
    	if(!is_array($_FILES["myfile"]['name'])) //single file
    	{
          $img = img($_FILES["myfile"],$output_dir,0,150,'min/',$_FILES["myfile"]['name']);//
          $ret[$fileName]= $output_dir.$img['nome'];
          $dati['foto']=$img['nome'];
          $dati['nome']=str_replace(array('.jpg','.png','.gif'), "",strtolower($img['nome']));;
         
		 
		 
		  $db->insert($tab.'_img',$dati);


    	}
    	else
    	{
    	    $fileCount = count($_FILES["myfile"]['name']);
          for($i=0; $i < $fileCount; $i++)
    		  {
    		    $img = img($_FILES["myfile"][$i],$output_dir,0,150,'min/',$_FILES["myfile"][$i]['name']);//
            $ret[$fileName]= $output_dir.$img['nome'];
            $dati['foto']=$img['nome'];
            $dati['nome']=$img['nome'];
            $db->insert($tab.'_img',$dati);
          }
    	}
    }
   echo json_encode($ret);
}

?>