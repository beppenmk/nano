<?php

$db->delete('news',$_GET['id'],'id','foto');
		header("location:$root/index.php?azione=p_news_mod&id=".$_GET['id']);
		exit;
