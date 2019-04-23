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
  <h2>Vehicle Part Details</h2>
<form action="vehicle_part_details.php" method="POST">
    <fieldset>
    <div class="form-group">
     <div class="col-xs-4">
      <label for="part_num">Part Number: </label>
      <input type="part_num" class="form-control" id="part_num" name="part_num" placeholder="Enter Part Number">
    </div>
    </div>
    <br>
    <br>
    <br>
    <div class="form-group">
     <div class="col-xs-4">
      <label for="part_name">Part Name: </label>
      <input type="part_name" class="form-control" id="part_name" name="part_name" placeholder="Enter Part Name">
    </div>
    </div>
   <br>
   <br>
   <br>    
    <div class="form-group">
     <div class="col-xs-4">
      <label for="quantity">Quantity: </label>
      <input type="quantity" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity">
    </div>
    </div>
   <br>
   <br>
   <br><div class="container">
  <h3>Choose one of the options </h3>        
  <input type="submit" name="insert" class="btn" value="Insert">
  <input type="submit" name="update" class="btn btn-default" value="Update">
  <input type="submit" name="delete" class="btn btn-info" value="Delete">
  <input type="submit" name="close" class="btn btn-danger" value="Close">
  <br><br>
          <input type="submit" name="view_vehicle_parts" class="btn btn-success" value="View Vehicles Parts">            
  </div>
    </fieldset>
    </form>
    </div>
    </div>
    
    <!--table -->
    <?php  if(isset($_POST["view_vehicle_parts"])){ ?>
   <br><br>
<table id="t01">
  <tr>
    <th>PART NUMBER</th>
    <th>PART NAME </th> 
    <th>QUANTITY </th>
  </tr>
     <?php
    $conn = mysqli_connect("localhost", "username", "", "uhtd_db");
    $query = "SELECT * FROM part";  
      $result1 = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result1))  
      {  
    ?>
  <tr>
    <td><?=$row['partno']?></td>
    <td><?=$row['partname']?></td>
    <td><?=$row['quantity']?></td>
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

    $SQL= "INSERT INTO part (partno, partname, quantity) VALUES ('".$_POST['part_num']."', '".$_POST['part_name']."', '".$_POST['quantity']."')";
        
                  $result=mysqli_query($conn,$SQL);

    
if(!$SQL){
    echo "cannot insert data";
} else{
    echo "data inserted successfully";
}
}

//update
if(isset($_POST['update']))
    {
    $SQL= "UPDATE part SET partname='".$_POST['part_name']."', quantity='".$_POST['quantity']."'
WHERE partno= '".$_POST['part_num']."' ";
                  $result=mysqli_query($conn,$SQL);


if(!$SQL){
    echo "cannot update data";
} else{
    echo "data updated successfully";
}
}

//delete
if(isset($_POST['delete']))
    {

    $SQL= "DELETE FROM part WHERE partno= '".$_POST['part_num']."'";

                  $result=mysqli_query($conn,$SQL);


if(!$SQL){
    echo "cannot delete data";
} else{
    echo "data deleted successfully";
}
}


mysqli_close($conn);
?>
