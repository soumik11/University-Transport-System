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
  <h2>MAINTAIN LOG</h2>
<form action="maintain_log.php" method="POST">
    <fieldset>
    <div class="form-group">
          <div class="col-xs-4">
      <label for="form_num">Form Number:</label>   
      <input type="form_num" class="form-control" id="form_num" name="form_num" placeholder="Enter Form Number"> 
    </div>
    </div>
   <br>
   <br>
   <br>
   <br>
    <div class="form-group">
     <div class="col-xs-4">
      <label for="vehicle_id">Vehicle ID: </label>
         <br><font color="red">select vehicle id from existing list</font><br>          
         <input type="vehicle_id" class="form-control" id="vehicle_id" name="vehicle_id" placeholder="Enter Vehicle ID">
    </div>
    </div>
   <br>
   <br>
   <br>
   <div class="container">
  <h2>Description</h2>
  <p>enter description about maintainence:</p>
  <form>
    <div class="col-xs-4">
    <div class="form-group">
      <label for="comment">Comment:</label>
      <textarea class="form-control" rows="3" id="comment" name="comment"></textarea>
    </div>
    </div>
       </form>
        </div>
    <br>
    <div class="form-group">
     <div class="col-xs-4">
      <label for="initial_date">Initial Date:</label>
      <input type="initial_date" class="form-control" id="initial_date" name="initial_date" placeholder="Enter Initial Date">
    </div>
    </div>
   <br>
   <br>
   <br>    
    <div class="form-group">
     <div class="col-xs-4">
      <label for="completion_date">Completion Data: </label>
      <input type="completion_date" class="form-control" id="completion_date" name="completion_date" placeholder="Enter Completion Date">
    </div>
    </div>
   <br>
   <br>
   <br>
     <div class="form-group">
     <div class="col-xs-4">
      <label for="inspector_id">Inspector ID: </label>
                  <br><font color="red">select inspector id from existing list</font><br> 
      <input type="inspector_id" class="form-control" id="inspector_id" name="inspector_id" placeholder="Enter CAMPUS">
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
  <br><br>
  <input type="submit" name="view_logs" class="btn btn-success" value="View Logs">
 <a href="maintain_detail.php" class="btn btn-link btn-success">goto Maintain Details</a>
</div>
    </fieldset>
    </form>
    </div>
    </div>
    
       <!--table for registered forms -->
    <?php  if(isset($_POST["view_logs"])){ ?>
   <br><br>
<table id="t01">
  <tr>
    <th>FORM NUMBER</th>
    <th>VEHICLE ID</th> 
    <th>DESCRIPTION</th>
    <th>INITIAL DATE</th> 
    <th>COMPLETION DATE</th>
    <th>INSPECTOR ID</th>

    </tr>
     <?php
    $conn = mysqli_connect("localhost", "username", "", "uhtd_db");
    $query = "SELECT * FROM maintainlog";  
      $result1 = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result1))  
      {  
    ?>
  <tr>
    <td><?=$row['formno']?></td>
    <td><?=$row['vehicleid']?></td>
    <td><?=$row['description']?></td>
    <td><?=$row['initialdate']?></td>
    <td><?=$row['completiondate']?></td>
    <td><?=$row['inspectorid']?></td>
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

    $SQL= "INSERT INTO maintainlog (formno, vehicleid, description, initialdate, completiondate, inspectorid) VALUES ('".$_POST['form_num']."', '".$_POST['vehicle_id']."', '".$_POST['comment']."', '".$_POST['initial_date']."', '".$_POST['completion_date']."', '".$_POST['inspector_id']."')";
        
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
    $SQL= "UPDATE maintainlog SET vehicleid='".$_POST['department_name']."', description='".$_POST['building_number']."', buildingname='".$_POST['building_name']."', campus='".$_POST['campus']."' 
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

    $SQL= "DELETE FROM maintainlog WHERE formno= '".$_POST['form_num']."'";

                  $result=mysqli_query($conn,$SQL);


if(!$SQL){
    echo "cannot delete data";
} else{
    echo "data deleted successfully";
}
}


mysqli_close($conn);
?>
