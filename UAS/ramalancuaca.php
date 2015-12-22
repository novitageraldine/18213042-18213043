<?php
require('simple_html_dom.php');

function parse_bmkg() {
	$html = file_get_html('http://www.bmkg.go.id/BMKG_Pusat/Informasi_Cuaca/Prakiraan_Cuaca/Prakiraan_Cuaca_Indonesia.bmkg');
	
	$array = array();
	
	foreach($html->find('tr') as $row) {
		$first_td = $row->find('td',0);
		if (isset($first_td->plaintext)) {
			$kota = $first_td->plaintext;
			$today = $row->find('td',1);
		
			if ($kota == 'Bandung') {
				$x = 0;
				foreach($today->find('div')as $div) {
					$array[$x] = $div->innertext;;
					$x++;
				}
			}
		}
	}
	return $array;
}

function save_to_database() {
	$cuaca = array();
	$cuaca = parse_bmkg();
	
	mysql_connect('localhost', 'root', '');
	mysql_select_db('ramalancuaca');
	mysql_query("UPDATE `Bandung` SET `cuaca`= '$cuaca[0]',`suhu`='$cuaca[1]',`kelembapan`='$cuaca[2]' WHERE id = 1");
}

function get_data() {
	$info = array();
	
	save_to_database();
	
	$result = mysql_query('SELECT * FROM bandung WHERE id = 1');
	$info = mysql_fetch_array ($result, MYSQL_ASSOC); 
	
	return $info; 
}

if($_SERVER ['REQUEST_METHOD']==='GET'){
	$coba = get_data();
	echo json_encode ($coba);
}
 
?>
