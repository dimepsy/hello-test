<!DOCTYPE>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SEVA Wiki Portal</title>
<link href="CSS/Style Sheet.css"rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#054772">
	<div class="userinterface">
   		<div class="header" style=" background-color: #054772">
       		<br />
            <center class="heading1">SEVA Wiki Portal</center></div>
			
			<div id='menu'>
				<ul class="nav">
				<li ><a href='index.php'><span>Home</span></a></li>
				  <li class='active'><a href="project.php">Published Research</a></li>
				  <li><a href="upload.php">Upload Here</a></li>
			</ul>
			</div>
			
			<div class = 'content1'>
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
							<div class ='common'>
							<br><br>
								&nbsp&nbspName : $b[$i]<br><br>
								&nbsp&nbspDescription : $c[$i]
								<br><br>
								
								<div class='sideproject1'>
								<form action='download.php' method='post'>
										<input class='input' type='hidden' name='file' value='$e[$i]'>
										&nbsp&nbsp<input type='submit' value='Download'><br>
								</form>
								</div>
								
								<div class='sideproject2'>
								<form action='temp.php' method='post'>
										<input type = 'hidden' name = 'projectname' value = '$b[$i]'>
										<input type = 'hidden' name = 'projectdesc' value = '$c[$i]'>
										<input type='hidden' name='projectno' value='$p'>
										&nbsp&nbsp<input type='submit' value='Feedback'>
									</form>
								</div>
							</div>
							<br><br>
							";
						}
					}
				?>
				</div>
			</div>
		</div>
</body>

</html>