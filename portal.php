<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Seva Portal </title>

    <!-- Bootstrap Core CSS -->
    <link href="portal/css/saroj.min.css" rel="stylesheet">
    <script src="wysiwyg.js"></script>
	
    <link href="css/custom.css" rel="stylesheet">

</head>

<body onLoad="iFrameOn();">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <img src="seva.jpg" width="100px" height="60x" align="left">
		<div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                
                <a class="navbar-brand" href="http://www.sevadevelopment.com/"> Seva Development</a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="sevaportal.html">Home </a>
                    </li>
                    
                   
				   
                </ul>

				
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<div class="container-fluid">

		<!-- Left Column -->
		<div class="col-sm-3">

			<!-- List-Group Panel -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title"> <strong>Article Topics</strong></h1>
				</div>
				
			</div>

			<!-- Text Panel -->
			
            <div id = "fetch" class= "list-group">
			<?php
				include("projectfetch.php");
			?>
				<div class='sidebar1'>
				<?php
					for($i=0; $i< $count; $i++)
					{
						if($f[$i]==1)
						{	$p=$i+1;
							echo "
							
							<a id='$a[$i]' href='#' onClick='load_detail(this.id);' class='list-group-item'>	&nbsp&nbsp$b[$i]</a>
								
							";
						}
					}
				?>
				</div>
			</div>
			<!-- Text Panel -->
			
				
		</div><!--/Left Column-->
  
  
		<!-- Center Column -->
		<div class="col-sm-6">
		
			<!-- Alert -->
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>! WELCOME ! </strong><br> Welcome to the Seva Portal !! ---Learn and let other know---
			</div>		
			
			<div id="detail">
<?php
$var = isset($_GET['sugg']) ; // Get the search variable
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
  ORDER BY $dbcol"; // specify table and fie ld names for the SQL query

 $numresults=mysql_query($query);
 $numrows=mysql_num_rows($numresults);
  
  if($numrows==0) // No result condition
  {
  echo " <ul> <h1>No Results for your search</h1>";
  }
 else
 {
	  echo " <ul> <h1>Results</h1>";
  }
// get results
  $result = mysql_query($query) or die("Unable to execute");
// counter intialized to 0
$count = 0 ;
// display the search results returned
  while ($row= mysql_fetch_array($result)) //start whule
  { 
  $title = $row["$dbcol"];
  $desc = $row["$dbdesc"];
  $desc=$row["$dbdesc"];
  if($count<=$searchlimit) //start if for checking search limit
  {
		$lower2=strtolower($title); // make database value lowercase
		$sub=substr($lower2, 0,$stringlen); //make string length equal to user string
		if($trimmed==$sub)// start if for string matching with substring
		{
			echo "<li><b>$title</b></li>";
			echo "$desc";
			echo "<br><br>";
			$count++ ;
			}	//End if for string matching with substring
		}//Endif for checking search limit
	}//End while
echo"</ul>";

?>
			</div>
			
			
			<hr>
			<hr>
		</div><!--/Center Column-->


	  <!-- Right Column -->
	  <div class="col-sm-3" align="right">
				
			<!-- Form -->
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Log In <span class="caret"></span></a>
				<ul class="dropdown-menu" aria-labelledby="about-us" <="" li="">
	
			<div class="panel panel-default">
			
				<div class="panel-heading">
					<h3 class="panel-title">
						<span class="glyphicon glyphicon-log-in"></span> 
						Log In 
					</h3>
				</div>
				<div class="panel-body" >
					<form method="post" action="login.php" > 
					
						<div class="form-group">
							<input class="form-control" id="uid" name="uid" placeholder="Username" type="text">
						</div>
                        
						<div class="form-group">
							<input class="form-control" id="pwd" name="pwd" placeholder="Password" type="password">
						
						</div>
						<input type="submit" name ="submit" value ="Log In">
						
					</form>
				</div>
			</div>
			
			

	</ul>
	
 
 			
	  </div><!--/Right Column -->

	</div><!--/container-fluid-->
	


	
    <!-- jQuery -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- IE10 viewport bug workaround -->
	<script src="js/ie10-viewport-bug-workaround.js"></script>
	
	<!-- Placeholder Images -->
	<script src="js/holder.min.js"></script>
	

	

		<script>
			 function load_detail(link_id){
            document.getElementById("detail").innerHTML='<object id="profileobj" width="100%" height="100%" type="text/html" data="sample.php?id='+link_id+'" ></object>';
			//document.getElementByID("dinfo").className="";
			//document.getElementByID("pinfo").className="active";			
			}
		</script>


	
	

</body>

</html>
