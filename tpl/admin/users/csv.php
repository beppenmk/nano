<?php 
function cleanData(&$str) {
	 $str = preg_replace("/\t/", "\\t", $str); 
	 $str = preg_replace("/\r?\n/", "\\n", $str); 
	 if(strstr($str, '"'))
	  $str = '"' . str_replace('"', '""', $str) . '"'; 
}
 // filename for download 
$filename = "users_" . date('Ymd') . ".xls";
 header("Content-Disposition: attachment; filename=\"$filename\"");
 header("Content-Type: application/vnd.ms-excel");
 $flag = false; 
 foreach($elenco_utenti as $row) {
 	if(!$flag) {
 	 // display field/column names as first row 
 		echo implode("\t", array_keys($row)) . "\r\n"; $flag = true; 
 	}
 	 array_walk($row, 'cleanData'); 
 	 echo implode("\t", array_values($row)) . "\r\n";
 } 
 	 exit; 
 ?>