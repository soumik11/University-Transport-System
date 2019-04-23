<!DOCTYPE html>
<html>
<head>
        <style> 
body{
    background-image: url("off_cream.jpg");
}
</style>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!--table styles-->    
    <style>
table {
    margin: auto;
    width:75%;
    z-index: 1;
    overflow: auto;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}

th, td {
    padding: 5px;
    text-align: left;
}


table#t01 th {
    background-color: black;
    color: white;
}
</style>

    </head>
<body>
<div style="padding:50px;">
    
<div class="container">
  <h2>MAINTAIN DETAIL FORM</h2>
<form action="maintain_log.php" method="POST">
    <fieldset>
        <div class="form-group">
          <div class="col-xs-4">
      <label for="serial_num">Serial Number:</label>   (only for update purpose)
      <input type="serial_num" class="form-control" name="serial_num" id="serial_num" placeholder="Enter Serial Number"> 
    </div>
    </div>
   <br>
   <br>
   <br>
   <br>
    <div class="form-group">
     <div class="col-xs-4">
      <label for="form_num">Form Number: </label>
      <input type="form_num" class="form-control" name="form_num" id="form_num" placeholder="Enter Form Number">
    </div>
    </div>
   <br>
   <br>
   <br>
    
    <div class="form-group">
     <div class="col-xs-4">
      <label for="pwd">BUILDING NUMBER:</label>
      <input type="password" class="form-control" name="building_num" id="building_num" placeholder="Enter BUILDING NUMBER">
    </div>
    </div>
   <br>
   <br>
   <br>    
    <div class="form-group">
     <div class="col-xs-4">
      <label for="part_num">Part Number: </label>
      <input type="part_num" class="form-control" name="part_num" id="part_num" placeholder="Enter Part Number">
    </div>
    </div>
   <br>
   <br>
   <br>
     <div class="form-group">
     <div class="col-xs-4">
      <label for="mechanic_id">Mechanic ID: </label>
      <input type="mechanic_id" class="form-control" name="mechanic_id" id="mechanic_id" placeholder="Enter CAMPUS">
    </div>
    </div>
   <br>
   <br>    
   <br>

<div class="container">
  <h3>Choose one of the options </h3>
 <input type="submit" name="insert" class="btn" value="Insert">
  <input type="submit" name="close" class="btn btn-danger" value="Close">
  <br><br>
  <input type="submit" name="view_maintn_detls" class="btn btn-success" value="View Maintainence Details">
      </div>
    </fieldset>
    </form>
    </div>
    </div>
    
    
       <!--table for registered forms -->
    <?php  if(isset($_POST["view_maintn_detls"])){ ?>
   <br><br>
<table id="t01">
  <tr>
    <th>SERIAL NUMBER</th>
    <th>FORM NUMBER</th> 
    <th>PART NUMBER</th>
    <th>MECHANIC ID</th> 
    </tr>
     <?php
    $conn = mysqli_connect("localhost", "username", "", "uhtd_db");
    $query = "SELECT * FROM maintaindetail";  
      $result1 = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result1))  
      {  
    ?>
  <tr>
    <td><?=$row['serialno']?></td>
    <td><?=$row['formno']?></td>
    <td><?=$row['partno']?></td>
    <td><?=$row['mechanicid']?></td>
    </tr>
   <?php }?> 

</table>
<?php }?>

</body> 
</html>

        <?php
// Create connection
$conn = mysqli_connect("localhost", "username", "", "uhtd_db");

    if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
} 
echo "Connected successfully";
//insert
if(isset($_POST['insert']))
    {

    $SQL= "INSERT INTO maintaindetail (serialno,formno,partno,mechanicid) VALUES ('".$_POST['serial_num']."', '".$_POST['form_num']."', '".$_POST['building_num']."', '".$_POST['part_num']."', '".$_POST['mechanic_id']."')";
        
                  $result=mysqli_query($conn,$SQL);

    
if(!$SQL){
    echo "cannot insert data";
} else{
    echo "data inserted successfully";
}
}


mysqli_close($conn);
?>
