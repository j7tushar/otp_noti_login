<?php 
 
//If a post request is detected 
if($_SERVER['REQUEST_METHOD']=='POST')
{
 
 //Getting the phone,firebaseid and pass 
 $phone = $_POST['phone'];
 $password = $_POST['password'];
 $firebaseid = $_POST['firebaseid'];
 
 
    //Importing the dbConnect script 
 require_once('dbConnect.php');
 
 //Creating an SQL to fetch the otp from the table 
 $sql = "SELECT * FROM otpverification WHERE phone = '$phone' AND password = '$password' ";
 $q1 = mysqli_query($con,$sql);
 if(mysqli_num_rows($q1) > 0)
 {
	 //echo "record is there";
	 $result = mysqli_fetch_array($q1);
	 $status =  $result['status'];
 	 $fbid =  $result['firebaseid'];
	 if($firebaseid==$fbid)
	 {
								
   	    echo "Active";
								
								
	 }
	  else
		{
																	 
			$q22 = "update otpverification set status = 'Active', firebaseid = '$firebaseid' where phone = '$phone' ";
			mysqli_query($con,$q22);
								
		    echo "Active";
		}
	 
 }
 else{
	 echo "data not found";
 }
 //Getting the result array from database 
 //$result = mysqli_fetch_array($q1);
 
 //Getting the otp from the array 
 //$realotp = $result['otpcode'];
 
 //If the otp given is equal to otp fetched from database 
 //if($otpcode == $realotp){
 //Creating an sql query to update the column verified to 1 for the specified user 
 //$sql = "UPDATE otpverification SET  verified =  '1' WHERE username ='$username'";
 
 //If the table is updated 
// if(mysqli_query($con,$sql)){
 //displaying success 
 //echo 'success';
 //}else{
 //displaying failure 
 //echo 'failure';
 //}
 //}else{
 //displaying failure if otp given is not equal to the otp fetched from database  
 //echo 'failure';
// }
 
 //Closing the database 
 mysqli_close($con);
}