<?php
	mysql_connect('localhost','root','')or die('Error connecting' . mysql_error());
	mysql_select_db('wikidata') or die('Database not found.' . mysql_error());
?>