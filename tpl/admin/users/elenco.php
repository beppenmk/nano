<?php include_once('tpl/admin/menu_admin.php')?>

<a class="btn btn-info" href="<?php echo $root?>/index.php?azione=p_users_csv" target="_blank">Esporta (xls) </a>

<a class="btn btn-warning" href="<?php echo $root?>/index.php?azione=p_users_mod" >Aggiungi </a>

<?php echo str_err()?>



<?php
//var_dump_pre($news);
 new Table ($tabella_utenti);
?>