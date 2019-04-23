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
  <h2>TRIP COMPLETION FORM</h2>
<form action="trip_completion.php" method="POST">
    <fieldset>       
        <div class="form-group">
          <div class="col-xs-4">
      <label for="form_num">Form Number: </label>   
         <br><font color="red">select department id from existing list</font><br>          
      <input type="form_num" class="form-control" id="form_num" name="form_num" placeholder="Enter Form Number"> 
    </div>
    </div>
   <br>
   <br>
   <br><br>
    <div class="form-group">
     <div class="col-xs-4">
      <label for="odometer_start">Odometer Start: </label>
      <input type="odometer_start" class="form-control" id="odometer_start" name="odometer_start" placeholder="Enter Odometer Start">
    </div>
    </div>
    <br>
    <br>
    <br>
    <div class="form-group">
     <div class="col-xs-4">
      <label for="odometer_end">Odometer End: </label>
      <input type="odometer_end" class="form-control" id="odometer_end" name="odometer_end" placeholder="Enter Odometer End">
    </div>
    </div>
   <br>
   <br>
   <br>    
    <div class="form-group">
     <div class="col-xs-4">
      <label for="fuel_usg">Fuel Usage: </label>
      <input type="fuel_usg" class="form-control" id="fuel_usg" name="fuel_usg" placeholder="Enter Fuel Usage">
    </div>
    </div>
   <br>
   <br>
   <br>
     <div class="form-group">
     <div class="col-xs-4">
      <label for="uh_credit">UH CREDIT CARD</label>
      <input type="uh_credit" class="form-control" id="uh_credit" name="uh_credit" placeholder="Enter UH CREDIT CARD DETAILS">
    </div>
    </div>
       
   <br>
   <br>    
   <br>
   <div class="container">
  <h2>Complain</h2>
  <p>enter your grievances:</p>
  <form>
    <div class="col-xs-4">
    <div class="form-group">
      <label for="comment">complain box:</label>
      <textarea class="form-control" rows="3" name="complain" id="comment"></textarea>
    </div>
    </div>
    </form>
    </div>

<div class="container">
  <h3>Choose one of the options </h3>
  <input type="submit" name="insert" class="btn" value="Insert">
  <input type="submit" name="update" class="btn btn-default" value="Update">
  <input type="submit" name="delete" class="btn btn-info" value="Delete">
  <input type="submit" name="close" class="btn btn-danger" value="Close">
  <br>
  <br>
 <input type="submit" name="view_complt_trips" class="btn btn-success" value="View Completed Trips">
  </div>
    </fieldset>
    </form>
    </div>
    </div>
    
     <!--table -->
    <?php  if(isset($_POST["view_complt_trips"])){ ?>
   <br><br>
<table id="t01">
  <tr>
    <th>FORM NUMBER</th>
    <th>ODOMETER START</th> 
    <th>ODOMETER END</th>
    <th>FUEL</th>       
    <th>UH CREDIT CARD NUMBER</th>
    <th>COMPLAIN</th>
  </tr>
     <?php
    $conn = mysqli_connect("localhost", "username", "", "uhtd_db");
    $query = "SELECT * FROM tripcompletion";  
      $result1 = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result1))  
      {  
    ?>
  <tr>
    <td><?=$row['formno']?></td>
    <td><?=$row['odometerstar']?></td>
    <td><?=$row['odometerend']?></td>
      <td><?=$row['fuel']?></td>
    <td><?=$row['uhcreditcardno']?></td>
    <td><?=$row['complain']?></td>
      
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

    $SQL= "INSERT INTO tripcompletion (formno, odometerstar, odometerend, fuel, uhcreditcardno, complain) VALUES ('".$_POST['form_num']."', '".$_POST['odometer_start']."', '".$_POST['odometer_end']."', '".$_POST['fuel_usg']."', '".$_POST['uh_credit']."', '".$_POST['complain']."')";
        
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
       $SQL= "UPDATE tripcompletion SET odometerstar='".$_POST['odometer_start']."', odometerend='".$_POST['odometer_end']."', fuel='".$_POST['fuel_usg']."', uhcreditcardno='".$_POST['uh_credit']."', complain='".$_POST['complain']."' 
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

    $SQL= "DELETE FROM tripcompletion WHERE formno= '".$_POST['form_num']."'";

                  $result=mysqli_query($conn,$SQL);


if(!$SQL){
    echo "cannot delete data";
} else{
    echo "data deleted successfully";
}
}


mysqli_close($conn);
?>
