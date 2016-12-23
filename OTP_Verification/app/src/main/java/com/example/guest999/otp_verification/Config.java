package com.example.guest999.otp_verification;

/**
 * Created by Joshi on 10/12/2016.
 */
public class Config {
    //URLs to register.php and confirm.php file
    public static final String REGISTER_URL = "http://10.0.2.2/androidotp/register.php";
    public static final String CONFIRM_URL = "http://10.0.2.2/androidotp/confirm.php";
    public static final String RESEND_URL = "http://10.0.2.2/androidotp/resendotp.php";

    //Keys to send username, password, phone and otp
    public static final String KEY_USERNAME = "username";
    public static final String KEY_PASSWORD = "password";
    public static final String KEY_PHONE = "phone";
    public static final String KEY_OTP = "otpcode";

    //JSON Tag from response from server
    public static final String TAG_RESPONSE = "ErrorMessage";
}
