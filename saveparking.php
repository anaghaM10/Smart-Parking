<?php
require 'mysqlConnect.php';
?>
<?php
if(isset($_POST['update'])){
	//$location=mysqli_real_escape_string($con,$_POST['location']);
	//$name=mysqli_real_escape_string($con,$_POST['name']);
	$street=mysqli_real_escape_string($con,$_POST['street']);

	$slot=mysqli_real_escape_string($con,$_POST['slot']);
	$price=mysqli_real_escape_string($con,$_POST['price']);

	//$attendant=mysqli_real_escape_string($con,$_POST['attendant']);


	   if($price=='' && $slot==''){
		echo"<script>alert('please fill all field')</script>";
		echo"<script>window.open('edit.php','_self')</script>";
		exit();
	 }

	else{
		$update = "UPDATE `parkings`  SET `price` = '$price', `slot` = '$slot' where `street` = '$street';";
		//$update="UPDATE `parkings` SET `price` = '$price', `slot` = '$slot' where `street` = '$street';";
		$run_update=mysqli_query($con,$update);
		if($run_update){
			echo"<script>alert('Successful added!')</script>";
			echo"<script>window.open('basic_table.php','_self')</script>";

		}
		else{
			echo"<script>alert('Error please try again')</script>";
			echo"<script>window.open('edit.php','_self')</script>";
		}
}}

?>
