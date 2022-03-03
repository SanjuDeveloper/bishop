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

			public function getContact($filters="")
			{
				try
				{
                    
					//$this->Connect();
					$query = $this->connection->prepare("SELECT * FROM contact $filters");
					$query->execute();
					return $query;                  
				}catch(PDOException $e)
				{
					return $e;
				}
				
			}

			public function getData($filters="")
			{
				try
				{
                    
					//$this->Connect();
					$query = $this->connection->prepare("SELECT * FROM userdata $filters");
					$query->execute();
					return $query;                  
				}catch(PDOException $e)
				{
					return $e;
				}
				
			}

			public function getQuery($filters="")
			{
				try
				{
                    
					//$this->Connect();
					$query = $this->connection->prepare("SELECT * FROM query $filters");
					$query->execute();
					return $query;                  
				}catch(PDOException $e)
				{
					return $e;
				}
				
			}
		
			 Public Function createForm($name, $email,$phone, $password)
			{
				//$this->Connect();
				
				try
				{
					$query = $this->connection->prepare("INSERT INTO adminUser (name,email, phone, password) VALUES (:name,:email,:phone,:password)");
					
					$query->bindParam(':name', $name);
					$query->bindParam(':email', $email);
					$query->bindParam(':phone', $phone);
					$query->bindParam(':password', $password);
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
            public function Send_New_Cc_On_Traffic_Source_Mail($to,$username,$TS_name,$cc)//----  new  --------
            {
                $subject = "new cc on traffic source:";
                $mailfrom = "no-reply@callvertise.com";
                include 'mail_formats/campaign-paused-no-routing.php';
                //$subject='Welcome to Callvertise: '.$account_type.'! Account Activation!';
                $subject='Traffic Source Required CC Update!';
                $headers = 'From: '.$mailfrom . "\r\n" .
                    'Bcc: bcc.support@callvertise.com' . "\r\n" . 
                    'X-Mailer: PHP/' . phpversion();$headers .= 'MIME-Version: 1.0' . "\r\n";$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                if(mail($to,$subject,$message,$headers))
                {
                    return true;
                }else
                {
                    echo false;
                }
            }
								
		
				//------------#Invoices End-----------
		}
	?>