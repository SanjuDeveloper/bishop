<?php 

require 'database.php';

if(isset($_POST['SEND'])){
	extract($_POST);;
	$db = new bishop();
	$db->Connect();
	$Createquery = $db->createContact($name, $email,$phone, $type,$message,$_SERVER['REQUEST_URI']); // for insert record

	$db->sendMail($name,$email,$message,$phone);  // for send mail

	if(is_numeric($Createquery)){
		//echo "Record insert successfully".$Createquery; 
		echo '<script language="javascript">';
		echo 'alert("Thank you! we will respond you  soon")';
		echo '</script>';
		header("Location: form.php");
	

	}

}
 

?>


<h1 class="section-divider h_form"></h1>
<div class="container">
			<h1 class="title1 text-white text-center mb-5"> Send an Enquiry</h1> 
			<div class="formBoxx">
				<div class="row mt-2 mb-5">
			 		<div class="col-sm-6 text-center">
			 			<div class="d-flex justify-content-center">
			 					<a href="#" target="_blank" class="nbtn"><i class="fas fa-location-arrow"></i></a>
			 				<a href="#" target="_blank" class="nbtn"><i class="far fa-envelope"></i></a>
			 				<a href="#" target="_blank" class="nbtn"><i class="fas fa-phone"></i></a>
			 			</div>
			 		
			 		</div>
			 		<div class="col-sm-6 text-center">
			 			<div class="d-flex justify-content-center">
			 					<a href="#" target="_blank" class="nbtn"><i class="fab fa-facebook-f"></i></a>
			 					<a href="#" target="_blank" class="nbtn"><i class="fab fa-instagram"></i></a>
			 				
			 					<a href="#" target="_blank" class="nbtn"><i class="fab fa-linkedin-in"></i></a>
			 				
			 			</div>
			 		</div>
			 	</div>
			 	<div class="row">
					<form action="#" method="POST">
						<div class="col-sm-6">
							<input type="text" placeholder="Your Name" class="form-control" name="name">
							<input type="text" placeholder="Your Phone Number" class="form-control" name="phone">
							<input type="text" placeholder="Your Email" class="form-control" name="email">
							<select class="form-control mb-0" name="type">
									<option value="" disabled selected>Type of case</option>
									<option value="Traffic & Drink Driving"> Traffic & Drink Driving </option>
									<option value="Sex Crime"> Sex Crime  </option>
									<option value="Violence"> Violence </option>
									<option value="Theft,Fraud & Cheating"> Theft,Fraud & Cheating </option>
									<option value="Drugs"> Drugs</option>
									<option value="Harassment etc."> Harassment etc.</option>
									<option value="Other"> Other</option>

							</select>
					
						</div>
						<div class="col-sm-6">
							<textarea class="form-control" rows="8" name="message" placeholder="type your message here"></textarea>
							<input type="submit" class="btn btn-block btn-green text-uppercase" name="SEND" value="Send Query" >
					
						</div>
					</form>

			 	</div>
			 </div>
		</div>