<?php

	function get_info_by_id($id) {
		$info = array();

		mysql_connect('localhost', 'root', '');
		mysql_select_db('Alfian');
		$result = mysql_query('SELECT * FROM id WHERE id =' . $id);
		$info = mysql_fetch_array ($result, MYSQL_ASSOC); 

		return $info; 
	}

	if (isset($_GET["action"])) {
		switch ($_GET["action"]) {
			case "get_info";
				if (isset($_GET["id"])) 
					$value = get_info_by_id($_GET["id"]);
				else
					$value = "ERROR";
				break;
		}
	}
	
	exit(json_encode($value));
	
?>
