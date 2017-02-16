<?php
	$count=0;
	include("configure.php");
	$sql='SELECT id, title, description, email, file, status FROM upload ORDER BY title ASC';
	
	mysql_select_db('wikidata');
	$retval= mysql_query($sql);
	if(! $retval)
	{
		die('Could not get data : ' .mysql_error());	
	}
	
	for($i=0;$row = mysql_fetch_array($retval, MYSQL_ASSOC); $i++)
	{
		$f[$i] = $row['status'];
		$a[$i]= $row['id'];
		$b[$i]= $row['title'];
		$c[$i] = $row['description'];
		$d[$i] = $row['email'];
		$e[$i] = $row['file'];
		$count++;	
	}
	
?>