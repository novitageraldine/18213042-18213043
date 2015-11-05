<?php

if (isset($_GET["action"]) && isset($_GET["id"]) && isset($_GET["action"]) == "get_info") {
	$info = file_get_contents('http://localhost/rest-api1.php?action=get_info&id=' . $_GET["id"]);
	echo $info;
	echo '<br />';
	echo '<br />';
	$info = json_decode($info,true);
#	echo $info;
}

?>

<table border = "1">
<tr> 
	<td> id </td>
	<td> <?php echo $info["id"] ?> </td>
</tr>
<tr> 
	<td> nama </td>
	<td> <?php echo $info["nama"] ?> </td>
</tr>
</table>
<br>
<table border = "1">
	<tr>
		<td> id </td>
		<td> nama </td>
	</tr>
	<tr>
		<td> <?php echo $info["id"] ?> </td>
		<td> <?php echo $info["nama"] ?> </td>
	</tr>
</table>
