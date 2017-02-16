<!-- style sheet-->
<link href="style.css" rel="stylesheet" type="text/css" />
<!-- Jquery to set select value to textbox -->
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$("li").mouseover(function() {
        var selected = $(this).html();
		$("input#textbox").val(selected);});

$("li").click(function() {
        var selected = $(this).html();
		$("ul").fadeOut(10);
		$("input#textbox").val(selected);});
});
</script>

<?php
$var = $_POST['suggest'] ; // Get the search variable
$lower= strtolower($var); //make string lowercase
$trimmed = trim($lower); //remove whitespace from the variable
$stringlen=strlen($trimmed); // Get the length
$searchlimit=10;// No. of search result appear for suggetion
//EDIT Requied here
$dbhost="localhost"; //hostname
$dbuser="root"; //username
$dbpass=" "; //password
$dbname="wikidata"; //databasename
$dbtable="upload"; //table name
$dbcol="title";// column name
$dbdesc="description";
mysql_connect("localhost","root","");//connect to your database 
mysql_select_db("$dbname") or die("Unable to select database"); //specify database 
$query = "Select * FROM $dbtable WHERE $dbcol LIKE \"%$trimmed%\"  
  ORDER BY $dbcol"; // specify table and field names for the SQL query

 $numresults=mysql_query($query);
 $numrows=mysql_num_rows($numresults);
  
 /* if($numrows==0) // No result condition
  {
  print " <ul> <h1>No Suggetions for your search</h1>";
  }
 else
 {
	  print " <ul> <h1>suggestions</h1>";
  } */
// get results
  $result = mysql_query($query) or die("Unable to execute");
// counter intialized to 0
$count = 0 ;
// display the search results returned
  while ($row= mysql_fetch_array($result)) //start whule
  { 
  $title = $row["$dbcol"];
  $desc=$row["$dbdesc"];
  if($count<=$searchlimit) //start if for checking search limit
  {
		$lower2=strtolower($title); // make database value lowercase
		$sub=substr($lower2, 0,$stringlen); //make string length equal to user string
		if($trimmed==$sub)// start if for string matching with substring
		{
			print "<li>$title</li>";
			$count++ ;
			}	//End if for string matching with substring
		}//Endif for checking search limit
	}//End whule
print"</ul>";



//echo "$title";
//echo "$desc";
?>
