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
  <h2>Register Staff</h2>
<form action="register_staff.php" method="POST">
    <fieldset>      
    <div class="form-group">
          <div class="col-xs-4">
      <label for="staff_id">Staff ID:</label>   
      <input type="staff_id" class="form-control" id="staff_id" name="staff_id" placeholder="Enter Staff ID"> 
    </div>
    </div>
   <br>
   <br>
   <br>
   <br>
    <div class="form-group">
     <div class="col-xs-4">
      <label for="first_name">First Name: </label>
      <input type="first_name" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
    </div>
    </div>
   <br>
   <br>
   <br>
   <div class="form-group">
     <div class="col-xs-4">
      <label for="last_name">Last Name: </label>
      <input type="last_name" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
    </div>
    </div>
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
   <div class="form-group">
     <div class="col-xs-4">
      <label for="designation">Designation:</label>
      <input type="designation" class="form-control" id="designation" name="designation" placeholder="Enter Designation">
    </div>
    </div>
   <br>
   <br>
   <br>
     <div class="form-group">
     <div class="col-xs-4">
      <label for="email_id">Email ID: </label>
      <input type="email_id" class="form-control" id="email_id" name="email_id" placeholder="Enter Email ID">
    </div>
    </div>
   <br>
   <br>    
   <br>
        <div class="form-group">
     <div class="col-xs-4">
      <label for="pwd">Set password </label>
      <input type="pwd" class="form-control" id="pwd" name="pwd" placeholder="Enter Password">
    </div>
    </div>
   <br>
   <br>    
   <br>
        <div class="form-group">
     <div class="col-xs-4">
      <label for="cnf_pwd">Confirm Password </label>
      <input type="cnf_pwd" class="form-control" id="cnf_pwd" name="cnf_pwd" placeholder="Enter Same Password">
    </div>
    </div>
   <br>
   <br>    
   <br>
        <div class="form-group">
     <div class="col-xs-4">
      <label for="drv_lsc">Driving Liscence: </label>
      <input type="drv_lsc" class="form-control" id="drv_lsc" name="drv_lsc" placeholder="Enter Driving Liscence">
    </div>
    </div>
   <br>
   <br>    
   <br>
        <div class="form-group">
     <div class="col-xs-4">
      <label for="train_levl">Training Level</label>
      <input type="train_levl" class="form-control" id="train_levl" name="train_levl" placeholder="Enter Training Level">
    </div>
    </div>
   <br>
   <br>    
   <br>
        <div class="form-group">
     <div class="col-xs-4">
      <label for="auth_levl">Authority Level </label>
      <input type="auth_levl" class="form-control" id="auth_levl" name="auth_levl" placeholder="Enter Authority Level">
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
 <input type="submit" name="reg_emp" class="btn btn-success" value="View Registered Employee Details">
<br>
  <br>
  <a href="welcome.php" class="btn btn-link btn-success">back</a>
</div>
    </fieldset>
    </form>
    </div>
    </div>
       <!--table for registered employee -->
    <?php  if(isset($_POST["reg_emp"])){ ?>
   <br><br>
<table id="t01">
  <tr>
    <th>STAFF ID</th> 
    <th>FIRST NAME</th>
    <th>LAST NAME</th>
    <th>DEPARTMENT ID</th> 
    <th>DESIGNATION</th>
    <th>EMAIL ID</th>      
      
  </tr>
     <?php
    $conn = mysqli_connect("localhost", "username", "", "uhtd_db");
    $query = "SELECT * FROM staffinformation";  
      $result1 = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result1))  
      {  
    ?>
  <tr>
    <td><?=$row['staffid']?></td>
    <td><?=$row['firstname']?></td>
    <td><?=$row['lastname']?></td>
    <td><?=$row['deptid']?></td>
    <td><?=$row['designation']?></td>
    <td><?=$row['emailid']?></td>
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

    $SQL0= "INSERT INTO staff(staffid, password) VALUES ('".$_POST['staff_id']."', '".$_POST['pwd']."')";
    $staff_id = mysqli_insert_id( $conn );
    
    $SQL1= "INSERT INTO staffinformation (staffid, firstname, lastname, deptid, designation, emailid) VALUES ('".$_POST['staff_id']."', '".$_POST['first_name']."', '".$_POST['last_name']."','".$_POST['department_id']."', '".$_POST['designation']."', '".$_POST['email_id']."')";
    

    $SQL2= "INSERT INTO staffdriver(staffid, drivinglicense) VALUES ('".$_POST['staff_id']."', '".$_POST['drv_lsc']."')";
    
    $SQL3= "INSERT INTO staffmechanic(staffid, traininglevel,authoritylevel) VALUES ('".$_POST['staff_id']."', '".$_POST['train_levl']."','".$_POST['auth_levl']."')";
    
                  $result=mysqli_query($conn,$SQL0);
                 $result=mysqli_query($conn,$SQL1);
                  $result=mysqli_query($conn,$SQL2);
                  $result=mysqli_query($conn,$SQL3);

    if(!$SQL0){
    echo "cannot insert data";
} else if(!$SQL1){
    echo "cannot insert data";
} else if(!$SQL2){
    echo "cannot insert data";
}    else if(!$SQL3){
    echo "cannot insert data";
} 
    else{
    echo "data inserted successfully";
}

}
//update
if(isset($_POST['update']))
    {
    $SQL0= "UPDATE staff SET password='".$_POST['pwd']."'
    WHERE staffid= '".$_POST['staff_id']."' ";
    $staff_id = mysqli_insert_id( $conn );
   
    $SQL1= "UPDATE staffinformation SET firstname='".$_POST['first_name']."', lastname='".$_POST['last_name']."', deptid='".$_POST['department_id']."', designation='".$_POST['designation']."', emailid= '".$_POST['email_id']."'
    WHERE staffid= '".$_POST['staff_id']."' ";
   
    $SQL2= "UPDATE staffdriver SET drivinglicense='".$_POST['drv_lsc']."'
    WHERE staffid= '".$_POST['staff_id']."' ";
    
    $SQL3= "UPDATE staffmechanic SET traininglevel='".$_POST['train_levl']."',authoritylevel='".$_POST['auth_levl']."'
    WHERE staffid= '".$_POST['staff_id']."' ";
                
                $result=mysqli_query($conn,$SQL0);
                $result=mysqli_query($conn,$SQL1);
                $result=mysqli_query($conn,$SQL2);
                $result=mysqli_query($conn,$SQL3);

    if(!$SQL0){
    echo "cannot update data";
} else if(!$SQL1){
    echo "cannot update data";
} else if(!$SQL2){
    echo "cannot update data";
}    else if(!$SQL3){
    echo "cannot update data";
} 
    else{
    echo "data updated successfully";
}
}

//delete
if(isset($_POST['delete']))
    {

    $SQL0= "DELETE FROM staff WHERE staffid= '".$_POST['staff_id']."'";
    $SQL1= "DELETE FROM staffinformation WHERE staffid= '".$_POST['staff_id']."'";
    $SQL2= "DELETE FROM staffdriver WHERE staffid= '".$_POST['staff_id']."'";
    $SQL3= "DELETE FROM staffmechanic WHERE staffid= '".$_POST['staff_id']."'";
                
                $result=mysqli_query($conn,$SQL0);
                $result=mysqli_query($conn,$SQL1);
                $result=mysqli_query($conn,$SQL2);
                $result=mysqli_query($conn,$SQL3);

    if(!$SQL0){
    echo "cannot delete data";
} else if(!$SQL1){
    echo "cannot delete data";
} else if(!$SQL2){
    echo "cannot delete data";
}    else if(!$SQL3){
    echo "cannot delete data";
} 
    else{
    echo "data deleted successfully";
}
}
mysqli_close($conn);
?>