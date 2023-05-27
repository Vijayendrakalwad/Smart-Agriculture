<?php
session_start();
// if(!isset($_SESSION['email'])){

//     header("Location: ../index.php");
//     }

  $db = new mysqli('localhost','root','','agric');
     


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Farmer | Dashboard </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../vendor/Jquery-ui/jquery-ui.min.css">
<!--===============================================================================================-->
</head>
    <body>
    <div class="wrapper">
        <!-- Sidebar  -->
     <?php  include_once ('page-headers.php'); ?>
            <hr>
           <?php require('weather.php');?>
            <div class="line"></div>


             <br>
 	
            
            
             <div class="line"></div>



                <footer>
           
            </footer>
           

           <?php
            $conn = mysqli_connect("localhost","root", "","agric");

            $url = 'http://188.166.206.43/dzKq6PQH8BDTn_s2IcKDVkIFXtse3jMm/get/V1';

//Use file_get_contents to GET the URL in question.
$contents = file_get_contents($url);

// $temp = $contents['2,3'];
// echo $temp;
$dat1 = $dat2 = $dat3 = 0;
//If $contents is not a boolean FALSE value.
if($contents !== false){
    //Print out the contents.
    //echo $contents;
    $data = json_decode($contents);
    $str_arr = explode("," , $data[0]);
    $dat1 = $str_arr[0];
    
   
    // echo $dat1;
    // echo $dat2;
    // echo $dat3;
    // echo $dat4;
}
else
{
  //echo $Error;

}
//////////
$url1 = 'http://188.166.206.43/dzKq6PQH8BDTn_s2IcKDVkIFXtse3jMm/get/V2';

//Use file_get_contents to GET the URL in question.
$contents1 = file_get_contents($url1);

// $temp = $contents['2,3'];
// echo $temp;
$dat2 = 0;
//If $contents is not a boolean FALSE value.
if($contents1 !== false){
    //Print out the contents.
    //echo $contents;
    $data1 = json_decode($contents1);
    $str_arr1 = explode("," , $data1[0]);
    $dat2 = $str_arr1[0];
    
   
    // echo $dat1;
    // echo $dat2;
    // echo $dat3;
    // echo $dat4;
}
else
{
  //echo $Error;

}
//////////
$url2 = 'http://188.166.206.43/dzKq6PQH8BDTn_s2IcKDVkIFXtse3jMm/get/V3';

//Use file_get_contents to GET the URL in question.
$contents2 = file_get_contents($url2);

// $temp = $contents['2,3'];
// echo $temp;
$dat3 = 0;
//If $contents is not a boolean FALSE value.
if($contents2 !== false){
    //Print out the contents.
    //echo $contents;
    $data2 = json_decode($contents2);
    $str_arr2 = explode("," , $data2[0]);
    $dat3 = $str_arr2[0];
    
   
    // echo $dat1;
    // echo $dat2;
    // echo $dat3;
    // echo $dat4;
}
else
{
  //echo $Error;

}



$push  = mysqli_query($conn, "INSERT INTO `sensors` (`temp`, `humidity`, `soil`) VALUES ('$dat1', '$dat2', '$dat3');");

if($push){
	echo "New Data Updated";
}
else{
	echo "Couldn't Pull data from server";
}

            $get = mysqli_query($conn, "SELECT * FROM `sensors` ORDER by id Desc LIMIT 1;");
            $temp = $humid = $soil = 0;

            while($row =  mysqli_fetch_assoc($get)){
            	$temp = $row['temp'];
            	$humid = $row['humidity'];
            	$soil = $row['soil'];
            }

            
              ?>

              <h1>Sensor values</h1>

              <table style="border:2px solid #000;border-collapse: collapse; width: 100%;padding: 10px; text-align: center;">
              	<tr style="text-align: center;">
              		<th style="border:1px solid #000;">Temperature <br>
              			<?php echo $temp; ?> <sup>0</sup> C
              		</th>
              		<th style="border:1px solid #000;">Humidity <br>
              			<?php echo $humid; ?>
              			<sup>%</sup> 
              		</th>
              		<th style="border:1px solid #000;">Soil Mositure <br>
              			<?php echo $soil; ?> <sup>%</sup> 
              		</th>
              	</tr>
              </table> <br><br><br>
        
        </div>
    </div>
  
       
	
<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/main.js"></script>
    <script src="../vendor/Jquery-ui/jquery-ui.min.js"></script>
   
</body>
</html>