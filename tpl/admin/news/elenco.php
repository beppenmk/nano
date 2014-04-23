<?php include_once('tpl/admin/menu_admin.php')?>


<a class="btn btn-warning" href="<?php echo $root?>/index.php?azione=p_news_mod">Aggiungi </a>
<?php echo str_err()?>

<?php
//creo tabella 
$tabella_news = array ('table'=>array ('class'=>'dataTable'),
	'th'=>$news_tabella_k,
	'tr'=>$news_tabella_v
);
 new Table ($tabella_news,'gradeU');
?>
