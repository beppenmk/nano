<?php include_once('tpl/admin/menu_admin.php')?>


<a class="btn btn-warning" href="<?php echo $root?>/index.php?azione=p_offerte_mod">Aggiungi </a>
<?php echo str_err()?>
<?php
//var_dump_pre($news);
 new Table ($tabella_offerte);
?>