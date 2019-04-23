<!DOCTYPE html>
<html>
<head>
<style> 
body{
    background-image: url("off_cream.jpg");
}
</style>
      <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
  <h2>DEPARTMENT DETAILS</h2>
<form action="department.php" method="POST">
    <fieldset>
    <div class="form-group">
          <div class="col-xs-4">
      <label for="department_id">Department ID:</label>
      <input type="department_id" class="form-control" name="department_id" id="department_id" placeholder="Enter Department ID">
    </div>
    </div>
   <br>
   <br>
   <br>
    <div class="form-group">
     <div class="col-xs-4">
      <label for="department_name">Department Name: </label>
      <input type="department_name" class="form-control" name="department_name" id="department_name" placeholder="Enter Department Name">
    </div>
    </div>
   <br>
   <br>
   <br>
    
    <div class="form-group">
     <div class="col-xs-4">
      <label for="building_number">BUILDING NUMBER:</label>
      <input type="building_number" class="form-control" name="building_number" id="building_number" placeholder="Enter BUILDING NUMBER">
    </div>
    </div>
   <br>
   <br>
   <br>    
    <div class="form-group">
     <div class="col-xs-4">
      <label for="building_name">BUILDING NAME: </label>
      <input type="building_name" class="form-control" name="building_name" id="building_name" placeholder="Enter BUILDING NAME">
    </div>
    </div>
   <br>
   <br>
   <br>
     <div class="form-group">
     <div class="col-xs-4">
      <label for="campus">CAMPUS: </label>
      <input type="campus" class="form-control" name="campus" id="campus" placeholder="Enter CAMPUS">
    </div>
    </div>
   <br>
   <br>    
   <br>       
<div class="container">
  <h3>Choose one of the options </h3>
  <input type="submit" name="insert" class="btn" value="Insert">
  <input type="submit" name="update" class="btn btn-default" value="Update">
  <input type="submit" name="delete" class="btn btn-info" value="Delete">
  <input type="submit" name="close" class="btn btn-danger" value="Close">
  <br>
  <br>
  <input type="submit" name="view_dept" class="btn btn-success" value="View All Departments">
  </div>
    </fieldset>
</form>
    </div>
    </div>
    
    
<!--table -->
    <?php  if(isset($_POST["view_dept"])){ ?>
   <br><br>
<table id="t01">
  <tr>
    <th>DEPARTMENT ID</th>
    <th>DEPARTMENT NAME</th> 
    <th>BUILDING NUMBER</th>
    <th>BUILDING NAME</th>
    <th>CAMPUS</th>
  </tr>
     <?php
    $conn = mysqli_connect("localhost", "username", "", "uhtd_db");
    $query = "SELECT * FROM department";  
      $result1 = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result1))  
      {  
    ?>
  <tr>
    <td><?=$row['deptid']?></td>
    <td><?=$row['deptname']?></td>
    <td><?=$row['buildingno']?></td>
      <td><?=$row['buildingname']?></td>
      <td><?=$row['campus']?></td>
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

    $SQL= "INSERT INTO department (deptid, deptname, buildingno, buildingname, campus) VALUES ('".$_POST['department_id']."', '".$_POST['department_name']."', '".$_POST['building_number']."', '".$_POST['building_name']."',  '".$_POST['campus']."')";

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

    $SQL= "UPDATE department SET deptname='".$_POST['department_name']."', buildingno='".$_POST['building_number']."', buildingname='".$_POST['building_name']."', campus='".$_POST['campus']."' 
    WHERE deptid= '".$_POST['department_id']."' ";
    
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

    $SQL= "DELETE FROM department WHERE deptid= '".$_POST['department_id']."'";

                  $result=mysqli_query($conn,$SQL);


if(!$SQL){
    echo "cannot delete data";
} else{
    echo "data deleted successfully";
}
}

//view

mysqli_close($conn);
?>