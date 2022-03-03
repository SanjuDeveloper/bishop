<?php 

require 'database.php';

if(isset($_POST['SENDQUERY'])){
	extract($_POST);
	$db = new bishop();
	$db->Connect();
	$Createquery = $db->createQuery($name, $email,$phone, $type,$message,$_SERVER['REQUEST_URI']); // for insert record

    $db->sendMail($name,$email,$message,$phone);  // for send mail

	if(is_numeric($Createquery)){
		//echo "Record insert successfully".$Createquery;  die();
		echo '<script language="javascript">';
		echo 'alert("Thank you! we will respond you  soon")';
		echo '</script>';
		header("Location: contactForm.php");
	

	}

}
 

?>
   <div class="h-top-icon">
        <img src="assets/images/Group 2757.svg" alt="images">
    </div>
    <div class="">
        <form method="POST" action="#">
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" placeholder="Your Name *" name="name" >
            </div>
            <div class="form-group">
                <input type="phone" class="form-control form-control-lg" placeholder="Your Phone Number *" name="phone">
            </div>
            <div class="form-group">
                <input type="email" class="form-control form-control-lg" placeholder="Your Email *" name="email" >
            </div>
            <div class="form-group h-select">
                <select class="form-control form-control-lg" name="type">
                <option value="" disabled selected>Type of case</option>
                                <option value="Criminal Law">Criminal Law </option>
                                <option value="Family Law & Divorce"> Family Law & Divorce  </option>
                                <option value="Business & Commercial Law"> Business & Commercial Law </option>
                                <option value="Civil Claims & Disputes"> Civil Claims & Disputes </option>
                                <option value="Others"> Others</option>
                </select>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="form-group">
                <textarea class="form-control form-control-lg" name="message" placeholder="Type your message here..." rows="3"></textarea>
            </div>
            <div class="h-contact-btn">
                <input type="submit" name="SENDQUERY" class="btn h-contact-form-btn" value="SUBMIT ENQUIRY">
            </div>
        </form>
    </div>