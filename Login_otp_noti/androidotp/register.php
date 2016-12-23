<?php 
 //Constants for our API
 //this is applicable only when you are using Cheap SMS Bazaar
 define('SMSUSER','j710tushar');
 define('PASSWORD','8460069721');
 define('SENDERID','DEMOOO');
 
 
 //This function will send the otp 
 function sendOtp($otpcode, $phone){
 //This is the sms text that will be sent via sms 
 $sms_content = "Welcome to Tranetech Software Solution: Your verification code is $otpcode";
 
 //Encoding the text in url format
 $sms_text = urlencode($sms_content);
 
 //This is the Actual API URL concatnated with required values 
 $api_url = 'http://login.cheapsmsbazaar.com/vendorsms/pushsms.aspx?user='.SMSUSER.'&password='.PASSWORD.'&msisdn=91'.$phone.'&sid='.SENDERID.'&msg='.$sms_text.'&fl=0';
 
 //Envoking the API url and getting the response 
 $response = file_get_contents( $api_url);
 
 //Returning the response 
 return $response;
 }
 
 
 //If a post request comes to this script 
 if($_SERVER['REQUEST_METHOD']=='POST'){ 
 
 //getting username password and phone number 
 $username = $_POST['username'];
 $password = $_POST['password'];
 $phone = $_POST['phone'];
 
 //Generating a 6 Digits OTP or verification code 
 $otpcode = rand(100000, 999999);
 
 //Importing the db connection script 
 require_once('dbConnect.php');
 
 //Creating an SQL Query 
 $sql = "INSERT INTO otpverification (username, password, phone, otpcode) values ('$username','$password','$phone','$otpcode')";
 
 //If the query executed on the db successfully 
 if(mysqli_query($con,$sql)){
 //printing the response given by sendOtp function by passing the otp and phone number 
            echo sendOtp($otpcode,$phone);
 }else{
 //printing the failure message in json 
 echo '{"ErrorMessage":"Failure"}';
 }
 
 //Closing the database connection 
 mysqli_close($con);
 }