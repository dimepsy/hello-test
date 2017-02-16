<?php 
    session_start();
    include('configure.php');
	
    if(isset($_POST['submit'])){
        if(!empty($_POST['uid']) && !empty($_POST['pwd'])){
            
			//$get_username=mysqli_real_escape_string($conn,$_POST['uid']);
            //$get_password=mysqli_real_escape_string($conn,$_POST['pwd']);
           
			$get_username=$_POST['uid'];
            $get_password=$_POST['pwd'];
           
			$sql="SELECT * FROM login WHERE username= '$get_username' AND passwd = '$get_password' LIMIT 0,30";

            if($result=mysql_query($sql)){

                if(mysql_num_rows($result)> 0){
                    header("Location: index.php");
                }else{
                    header("Location: portal.php?login=wrong");
                }               
            }
			else
			{
                header("Location: portal.php?login=error");
            }                
        }else{
            header("Location: portal.php?login=empty");
            }       
    }

?>