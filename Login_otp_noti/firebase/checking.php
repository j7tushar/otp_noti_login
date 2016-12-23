<?php 
 
//If a post request is detected 
if($_SERVER['REQUEST_METHOD']=='POST')
{
 
 //Getting the phone,firebaseid and pass 
 $phone = $_POST['phone'];
 $firebaseid = $_POST['firebaseid'];
 
 
    //Importing the dbConnect script 
 require_once('dbConnect.php');
 
 //Creating an SQL to fetch the otp from the table 
 $sql = "SELECT firebaseid FROM otpverification WHERE phone = '$phone' ";
 $q1 = mysqli_query($con,$sql);
 $check = mysqli_fetch_array($q1);
  $fbid =  $check['firebaseid'];
  
 if($firebaseid==$fbid){
 echo 'success';
 }else{
 echo 'failure';
 }
}