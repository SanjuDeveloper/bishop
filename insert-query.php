<?php

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
    $response = array();
    
    // jisko mail jaega
    $mailreceiver = 'contact@bishoplawcorp.com';
    //$mailreceiver = 'vipul.tyagi94@gmail.com';
    
    // subject
    $subject = "New Enquiry Received from ".$name;
    
    // message body
    $Content = "Dear Admin, Please check the enquiry details below: <br><br><b>Name : </b> ".$name."<br><br><b>Email : </b> ".$email."<br><br><b>Phone : </b> ".$phone."<br><br><b>Message : </b> ".$message."<br><br>Thank You";
    
    // jisse mail bhejna h
    $headers = "From: ".$name." <".$email.">\r\n";
    $headers .= "Reply-To: ".$name." <".$email.">\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";  
    
    if(mail($mailreceiver, $subject, $Content , $headers)){
        $response['error'] = false;
    }
    else{
        $response['error'] = true;
        $response['message'] = 'Please Try Again!';
    }
    
    echo json_encode($response);

?>