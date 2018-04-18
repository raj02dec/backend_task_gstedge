<?php

   
$connection = mysqli_connect('localhost','root','','gst');/////DATABASE CONNECTION

$a = "";

if(!$connection){
   
    die("QUERY FAILED".mysqli_error($connection));
}else{

$query = 'SELECT * FROM task';
$result = mysqli_query($connection,$query); 
if($result == null){
    die("no output");
}else{
while($row = mysqli_fetch_assoc($result)){
    $serial_no = $row['serial_no'];
    
    $year = $row['year'];
    $total_employees = $row['no_of_employees'];
    if($a == ""){
        $a = $total_employees;
    }
    if($total_employees>=$a){
        $a = $total_employees-$a;
        
    }else{
        
        $a = $a-$total_employees;
        $a = -$a;
    }
    echo $year."=".$a."<br>"; 
$a = $total_employees;
    $time = $row['timestamp'];
    //$a = $total_employees-$a;
    //echo $year."=".$a."<br>";
   

      
}

}    
}
echo "<br>";
echo "<br>";
echo "<br>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- BOOTSTRAP CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>Database</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    

</head>
<body class="table">
<div class="container">

<!--CREATING TABLE -->

<table class="table table-bordered table-hover" style="text-align:center">
    <thead>
        <td>Serial no.</td>
        <td>Year</td>
        <td>No. of Employees</td>
        <td>Time</td>
    </thead>
    <tbody>
    <?php 
//////////FETCHING DATA FROM TABLE
$query = 'SELECT * FROM task';
$result = mysqli_query($connection,$query);    
 while($row = mysqli_fetch_assoc($result)){

    $serial_no = $row['serial_no'];
    $year = $row['year'];
    $total_employees = $row['no_of_employees'];       
    $time = $row['timestamp'];
     
     echo "<tr>";
     echo "<td>$serial_no</td>";
     echo "<td>$year</td>";
     echo "<td>$total_employees</td>";
     echo "<td>$time</td>";
     echo "<tr>";
 }
        ?> 

    </tbody>
</table>
</div>

</body>
</html>