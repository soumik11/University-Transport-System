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
    <a href="welcome.php">
          <span class="glyphicon glyphicon-home bt pull-right btn-lg"></span>
        </a>
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

<div class="conainer">
  <h2>Vehicle Details</h2>
<form action="vehicle_details.php" method="POST">
    <fieldset>
    <div class="form-group">
          <div class="col-xs-4">
      <label for="reg_num">Registration Number: </label>   
      <input type="reg_num" class="form-control" id="reg_num" name="reg_num" placeholder="Enter Registration Number"> 
    </div>
    </div>
   <br>
   <br>
    <br>
    <div class="form-group">
     <div class="col-xs-4">
      <label for="mod">Model: </label>
      <input type="mod" class="form-control" id="mod" name="mod" placeholder="Enter Model">
    </div>
    </div>
    <br>
    <br>
    <br>
    <div class="form-group">
     <div class="col-xs-4">
      <label for="type">Type</label>
      <input type="type" class="form-control" id="type" name="type" placeholder="Enter Type">
    </div>
    </div>
   <br>
   <br>
   <br>    
    <div class="form-group">
     <div class="col-xs-4">
      <label for="colr">Color: </label>
      <input type="colr" class="form-control" id="colr" name="colr" placeholder="Enter color">
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
          <input type="submit" name="view_vehicle" class="btn btn-success" value="View Vehicles">
      </div>
    </fieldset>
    </form>
    </div>
    </div>
    
    <!--table -->
    <?php  if(isset($_POST["view_vehicle"])){ ?>
   <br><br>
<table id="t01">
  <tr>
    <th>REGISTRATION NUMBER</th>
    <th>MODEL </th> 
    <th>TYPE </th>
    <th>COLOR </th>
  </tr>
     <?php
    $conn = mysqli_connect("localhost", "username", "", "uhtd_db");
    $query = "SELECT * FROM vehicle";  
      $result1 = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result1))  
      {  
    ?>
  <tr>
    <td><?=$row['registrationno']?></td>
    <td><?=$row['model']?></td>
    <td><?=$row['type']?></td>
      <td><?=$row['color']?></td>
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

    $SQL= "INSERT INTO vehicle (registrationno, model, type, color) VALUES ('".$_POST['reg_num']."', '".$_POST['mod']."', '".$_POST['type']."', '".$_POST['colr']."')";
        
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
$SQL= "UPDATE vehicle SET model='".$_POST['mod']."', type='".$_POST['type']."', color='".$_POST['colr']."'
WHERE registrationno= '".$_POST['reg_num']."' ";
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

    $SQL= "DELETE FROM vehicle WHERE registrationno= '".$_POST['reg_num']."'";

                  $result=mysqli_query($conn,$SQL);


if(!$SQL){
    echo "cannot delete data";
} else{
    echo "data deleted successfully";
}
}


mysqli_close($conn);
?>
