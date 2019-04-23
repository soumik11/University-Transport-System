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
  <h2>Reservation Detail</h2>
<form action="reservation_detail.php" method="POST">
    <fieldset>      
        <div class="form-group">
     <div class="col-xs-4">
     <label for="form_num">Form Number: </label>
     <input type="form_num" class="form-control" id="form_num" name="form_num" placeholder="Enter Form Number">
    </div>
    </div>
    <br>
    <br>
    <br>
    <div class="form-group">
          <div class="col-xs-4">
      <label for="staff_id">Staff ID:</label> 
              <br><font color="red">select staff id from existing list</font><br>
      <input type="staff_id" class="form-control" id="staff_id" name="staff_id" placeholder="Enter Staff ID"> 
    </div>
    </div>
   <br>
   <br>
   <br>
   <br>
    <div class="form-group">
     <div class="col-xs-4">
      <label for="department_id">Department ID: </label>
     <br><font color="red">select department id from existing list</font><br>
  <input type="department_id" class="form-control" id="department_id" name="department_id" placeholder="Enter Department ID">
    </div>
    </div>
   <br>
   <br>
   <br>  
    <br>    
   <div class="form-group">
     <div class="col-xs-4">
      <label for="vehicle_num">Vehicle Number:</label>
              <br><font color="red">select vehicle from existing list</font><br>
         
      <input type="vehicle_num" class="form-control" id="vehicle_num" name="vehicle_num" placeholder="Enter Vehicle Number">
    </div>
    </div>
   <br>
   <br>
   <br>
        <br>
     <div class="form-group">
     <div class="col-xs-4">
      <label for="booking_date">Booking Date</label>
      <input type="booking_date" class="form-control" id="booking_date" name="booking_date" placeholder="YYYY/MM/DD">
    </div>
    </div>
   <br>
   <br>    
   <br>
        <div class="form-group">
     <div class="col-xs-4">
      <label for="booking_time">Booking Time </label>
      <input type="booking_time" class="form-control" id="booking_time" name="booking_time" placeholder="Hour:Minute:Second">
    </div>
    </div>
   <br>
   <br>    
   <br>
        <div class="form-group">
     <div class="col-xs-4">
      <label for="design">Designation </label>
      <input type="design" class="form-control" id="design" name="design" placeholder="Enter Designation">
    </div>
    </div>
   <br>
   <br>    
   <br>
        <div class="form-group">
     <div class="col-xs-4">
      <label for="purp">Purpose: </label>
      <input type="purp" class="form-control" id="purp" name="purp" placeholder="Enter Purpose">
    </div>
    </div>

   <br>
   <br>    
   <br>
         
        <div class="form-group">
     <div class="col-xs-4">
         
      <label for="driver_staff_id">Driver Staff ID</label>
         <br><font color="red"> select driverstaff id from existing list </font><br>     
      <input type="driver_staff_id" class="form-control" id="driver_staff_id" name="driver_staff_id" placeholder="Enter Driver Staff ID">
    </div>
    </div>
   <br>
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
 <input type="submit" name="view_reg_forms" class="btn btn-success" value="View Registered Forms">
  </div>
    </fieldset>
    </form>
    </div>
    </div>
        <!--table for reserved forms -->
    <?php  if(isset($_POST["view_reg_forms"])){ ?>
   <br><br>
<table id="t01">
  <tr>
    <th>FORM NUMBER</th>
    <th>STAFF ID</th> 
    <th>DEPARTMENT ID</th>
    <th>VEHICLE NUMBER</th>
    <th>BOOKING DATE</th> 
    <th>BOOKING TIME </th>
    <th>DESIGNATION</th>
    <th>PURPOSE </th> 
    <th>DRIVER STAFF ID </th>
      
      
  </tr>
     <?php
    $conn = mysqli_connect("localhost", "username", "", "uhtd_db");
    $query = "SELECT * FROM reservevehicle";  
      $result1 = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result1))  
      {  
    ?>
  <tr>
    <td><?=$row['formno']?></td>
    <td><?=$row['staffid']?></td>
    <td><?=$row['deptid']?></td>
    <td><?=$row['vehicleno']?></td>
    <td><?=$row['bookingdate']?></td>
    <td><?=$row['bookingtime']?></td>
    <td><?=$row['destination']?></td>
    <td><?=$row['purpose']?></td>
    <td><?=$row['driverstaffid']?></td>
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

    $SQL= "INSERT INTO reservevehicle (formno, staffid, deptid, vehicleno, bookingdate, bookingtime, destination, purpose, driverstaffid) VALUES ('".$_POST['form_num']."', '".$_POST['staff_id']."', '".$_POST['department_id']."', '".$_POST['vehicle_num']."', '".$_POST['booking_date']."', '".$_POST['booking_time']."', '".$_POST['design']."', '".$_POST['purp']."', '".$_POST['driver_staff_id']."')";
        
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
$SQL= "UPDATE reservevehicle SET staffid='".$_POST['staff_id']."', deptid='".$_POST['department_id']."', vehicleno='".$_POST['vehicle_num']."', bookingdate='".$_POST['booking_date']."', bookingtime='".$_POST['booking_time']."', destination='".$_POST['design']."', purpose='".$_POST['purp']."', driverstaffid='".$_POST['driver_staff_id']."'
    WHERE formno= '".$_POST['form_num']."' ";

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

    $SQL= "DELETE FROM reservevehicle WHERE formno= '".$_POST['form_num']."'";

                  $result=mysqli_query($conn,$SQL);


if(!$SQL){
    echo "cannot delete data";
} else{
    echo "data deleted successfully";
}
}


mysqli_close($conn);
?>
