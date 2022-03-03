<?php
		date_default_timezone_set("Etc/GMT");
	
	

		define('TDEMO', true);
		define('HOST',"localhost");
		//define('HOST',"160.153.129.34");
		define('DBUSER', "root");
		define('DBPASSWORD',"");
		define('DBNAME',"akashdb");
	
		class  bishop
		{

			protected $connection = null;
			
			function __construct() 
			{
				$this->connection = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";",DBUSER, DBPASSWORD);
				$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			
			function __destruct() {
				$this->connection = null;
			}
			public function Connect()
			{
				
				$this->connection = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";",DBUSER, DBPASSWORD);
				 $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
            }

			public function Close()
			{
				$this->connection = null;
			}

			public function getUser($filters="")
			{
				try
				{
                    //echo "SELECT * FROM adminUser $filters";
					//$this->Connect();
					$query = $this->connection->prepare("SELECT * FROM adminUser $filters");
					$query->execute();
					return $query;
                   /* return true;*/
				}catch(PDOException $e)
				{
					return $e;
				}
				
			}

		
		
			Public Function createContact($name, $email,$phone, $type,$message,$url)
			{
				//$this->Connect();
				
				try
				{
					$query = $this->connection->prepare("INSERT INTO contact (name,email,phone,type,message,url) VALUES (:name,:email,:phone,:type,:message,:url)");
					
					$query->bindParam(':name', $name);
					$query->bindParam(':email', $email);
					$query->bindParam(':phone', $phone);
					$query->bindParam(':type', $type);
					$query->bindParam(':message', $message);
					$query->bindParam(':url', $url);
					$query->execute();
					$last_id = $this->connection->lastInsertId();
					return $last_id;
				}
				catch(PDOException $e)
				{
					return $e;
				}
            }


			Public Function createQuery($name, $email,$phone, $type,$message,$url)
			{
				//$this->Connect();
				
				try
				{
					$query = $this->connection->prepare("INSERT INTO query (name,email,phone,type,message,url) VALUES (:name,:email,:phone,:type,:message,:url)");
					
					$query->bindParam(':name', $name);
					$query->bindParam(':email', $email);
					$query->bindParam(':phone', $phone);
					$query->bindParam(':type', $type);
					$query->bindParam(':message', $message);
					$query->bindParam(':url', $url);
					$query->execute();
					$last_id = $this->connection->lastInsertId();
					return $last_id;
				}
				catch(PDOException $e)
				{
					return $e;
				}
            }

			Public Function createSubscribe($name, $email,$phone,$message,$url)
			{
				//$this->Connect();
				
				try
				{
					$query = $this->connection->prepare("INSERT INTO userdata (name,email,phone,message,url) VALUES (:name,:email,:phone,:message,:url)");
					
					$query->bindParam(':name', $name);
					$query->bindParam(':email', $email);
					$query->bindParam(':phone', $phone);
					$query->bindParam(':message', $message);
					$query->bindParam(':url', $url);
					$query->execute();
					$last_id = $this->connection->lastInsertId();
					return $last_id;
				}
				catch(PDOException $e)
				{
					return $e;
				}
            }
			
			Public Function createForm($name, $email,$phone, $type,$message)
			{
				//$this->Connect();
				
				try
				{
					$query = $this->connection->prepare("INSERT INTO contact (name,email,phone,type,message) VALUES (:name,:email,:phone,:type,:message)");
					
					$query->bindParam(':name', $name);
					$query->bindParam(':email', $email);
					$query->bindParam(':phone', $phone);
					$query->bindParam(':type', $type);
					$query->bindParam(':message', $message);
					$query->execute();
					$last_id = $this->connection->lastInsertId();
					return $last_id;
				}
				catch(PDOException $e)
				{
					return $e;
				}
            }

            public function Delete_User_Role($filter)// -----------  new  function ---------
			{
				try
				{
					$query = $this->connection->prepare("DELETE  FROM user_role $filter");
					$query->execute();
					return true;
				}
				catch(PDOException $e)
				{
					return $e;
				}
			}

			public function Update_Advertiser_password($adv_id,$password)
			{
				//$this->Connect();
				try
				{
					$query = $this->connection->prepare("UPDATE advreq SET pwd='$password' WHERE adv_id=$adv_id");
					$query->execute();
					return true;
				}
				catch(PDOException $e)
				{
					return $e;
				}
				
			}
            public function sendMail($name,$email,$message,$phone)
            {
             	  // jisko mail jaega
					//$mailreceiver = 'contact@bishoplawcorp.com';
					//$mailreceiver = 'vipul.tyagi94@gmail.com';

					$mailreceiver = 'bhattsanju.it@gmail.com';
					
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
            }
								
		
				//------------#Invoices End-----------
		}
	?>