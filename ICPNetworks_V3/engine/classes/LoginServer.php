<?php
//=======================================================================\\
//  ## ####### #######                                                   \\
//  ## ##      ##   ##                                                   \\
//  ## ##      ## ####  |\  | |¯¯¯ ¯¯|¯¯ \      / |¯¯¯| |¯¯¯| | / |¯¯¯|  \\
//  ## ##      ##       | \ | |--    |    \    /  | | | | |_| |<   ¯\_   \\
//  ## ####### ##       |  \| |___   |     \/\/   |___| | |\  | \ |___|  \\
// --------------------------------------------------------------------- \\
//    Brazillian Developer / WebSite: http://www.icpnetworks.com.br      \\
//                 Email & Skype: ivan1507@gmail.com.br                  \\
//=======================================================================\\
namespace ICPNetworks {
	
	class LoginServer {
		
		public function __construct($db_type, $conn, $config) {
			$this->db_type = $db_type;
			$this->conn = $conn;
			$this->L2jVersaoRussa = $config["L2jVersaoRussa"];
			$this->L2jVersaoClassic = $config["L2jVersaoClassic"];
			$this->L2jVersaoAcis = $config["L2jVersaoAcis"];
			$this->l2jOldAcis = $config["l2jOldAcis"];
			$this->serverName = $config["SITE_NAME"];
			$this->CreateAccWithEmail = $config["CreateAccWithEmail"];
			$this->RecoveryAccWithEmail = $config["RecoveryAccWithEmail"];
			$this->SMTP_HOST = $config["SMTP_HOST"];
			$this->SMTP_PORT = $config["SMTP_PORT"];
			$this->SMTP_EMAIL = $config["SMTP_EMAIL"];
			$this->SMTP_PASS = $config["SMTP_PASS"];
		}
		
		public function resposta($msg,$title=null,$type=null,$redirect=null){
			echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js\" type=\"text/javascript\"></script><script src=\"//cdn.jsdelivr.net/npm/sweetalert2@10\"></script><script type=\"text/javascript\">$(document).ready(function(){Swal.fire({ title: '".$title."', html: '".$msg."', icon: '".$type."'".(!empty($redirect) ? ", confirmButtonText: 'Ok', preConfirm: () => { return [ window.location.href = '".$redirect."' ] } })" : "})")."})</script>";
		}
		
		private function ICP_encrypt($pass){
			if($this->db_type){
				if($this->L2jVersaoRussa){
					return base64_encode(hash('whirlpool', $pass, true));
				}elseif($this->L2jVersaoClassic){
					return base64_encode(hash("sha3-256", $pass, true));
				}else{
					return base64_encode(hash("sha1", $pass, true));
				}
			}else{
				$key = array();
				$dst = array();
				$i = 0;
				$nBytes = strlen($pass);
				while ($i < $nBytes){
					$i++;
					$key[$i] = ord(substr($pass, $i - 1, 1));
					$dst[$i] = $key[$i];
				}
				$rslt = $key[1] + $key[2]*256 + $key[3]*65536 + $key[4]*16777216;
				$one = $rslt * 213119 + 2529077;
				$one = $one - intval($one/ 4294967296) * 4294967296;
				$rslt = $key[5] + $key[6]*256 + $key[7]*65536 + $key[8]*16777216;
				$two = $rslt * 213247 + 2529089;
				$two = $two - intval($two/ 4294967296) * 4294967296;
				@$rslt = $key[9] + $key[10]*256 + $key[11]*65536 + $key[12]*16777216;
				$three = $rslt * 213203 + 2529589;
				$three = $three - intval($three/ 4294967296) * 4294967296;
				@$rslt = $key[13] + $key[14]*256 + $key[15]*65536 + $key[16]*16777216;
				$four = $rslt * 213821 + 2529997;
				$four = $four - intval($four/ 4294967296) * 4294967296;
				$key[4] = intval($one/16777216);
				$key[3] = intval(($one - $key[4] * 16777216) / 65535);
				$key[2] = intval(($one - $key[4] * 16777216 - $key[3] * 65536) / 256);
				$key[1] = intval(($one - $key[4] * 16777216 - $key[3] * 65536 - $key[2] * 256));
				$key[8] = intval($two/16777216);
				$key[7] = intval(($two - $key[8] * 16777216) / 65535);
				$key[6] = intval(($two - $key[8] * 16777216 - $key[7] * 65536) / 256);
				$key[5] = intval(($two - $key[8] * 16777216 - $key[7] * 65536 - $key[6] * 256));
				$key[12] = intval($three/16777216);
				$key[11] = intval(($three - $key[12] * 16777216) / 65535);
				$key[10] = intval(($three - $key[12] * 16777216 - $key[11] * 65536) / 256);
				$key[9] = intval(($three - $key[12] * 16777216 - $key[11] * 65536 - $key[10] * 256));
				$key[16] = intval($four/16777216);
				$key[15] = intval(($four - $key[16] * 16777216) / 65535);
				$key[14] = intval(($four - $key[16] * 16777216 - $key[15] * 65536) / 256);
				$key[13] = intval(($four - $key[16] * 16777216 - $key[15] * 65536 - $key[14] * 256));
				$dst[1] = $dst[1] ^ $key[1];
				$i=1;
				while ($i<16){
					$i++;
					@$dst[$i] = $dst[$i] ^ $dst[$i-1] ^ $key[$i];
				}
				$i=0;
				while ($i<16){
					$i++;
					if ($dst[$i] == 0) {
						$dst[$i] = 102;
					}
				}
				$encrypt = "0x";
				$i=0;
				while ($i<16){
					$i++;
					if ($dst[$i] < 16) {
						$encrypt = $encrypt . "0" . dechex($dst[$i]);
					} else {
						$encrypt = $encrypt . dechex($dst[$i]);
					}
				}
				return $encrypt;
			}
			return null;
		}
		
		public function login($username, $password){
			$errMsg = null;
			$errMsg .= empty($username) ? 'Enter your username.<br>' : null;
			$errMsg .= empty($password) ? 'Enter your password.' : null;
			if(empty($errMsg)){
				$pass = $this->ICP_encrypt($password);
				if($this->db_type){
					$accesslevel_accounts = $this->info_table("accounts","accesslevel");
					if($this->L2jVersaoAcis && !$this->l2jOldAcis){
						$records = $this->conn->prepare('SELECT a.login, a.password, a.'.$accesslevel_accounts.', CASE WHEN (SELECT CONCAT(email, ";", accessLevel, ";", vip_end, ";", status) FROM icp_accounts WHERE login = a.login) IS NULL THEN "" ELSE (SELECT CONCAT(email, ";", accessLevel, ";", vip_end, ";", status) FROM icp_accounts WHERE login = a.login) END AS icp_table FROM accounts AS a WHERE a.login = ?');
						$records->execute([$username]);
						$results = $records->fetch(\PDO::FETCH_ASSOC);
						if($results){
							if(password_verify($password, $results["password"])){
								if(empty($results["icp_table"])){
									$acc_id = strtotime(date("Y-m-d H:i:s"));
									if($this->CreateAccWithEmail){
										$insert_icp = $this->conn->prepare('INSERT INTO icp_accounts (login, email, acc_id, vip_end) VALUES (?,?,?,?)');
										$insert_icp->execute([$username,"",$acc_id,date("Y-m-d H:i:s")]);
									}else{
										$insert_icp = $this->conn->prepare('INSERT INTO icp_accounts (login, email, acc_id, vip_end, status) VALUES (?,?,?,?,"1")');
										$insert_icp->execute([$username,"",$acc_id,date("Y-m-d H:i:s")]);
									}
									return "email_is_null";
								}else{
									$icpTable = explode(";",$results["icp_table"]);
									if($results["{$accesslevel_accounts}"] < 0 && $icpTable[3] || $icpTable[1] < 0){
										return "acc_banned";
									}elseif(empty($icpTable[0])){
										return "email_is_null";
									}else{
										if(!$icpTable[3])
											return "account_inactivated";
										else{
											$this->addLogIp($results["login"]);
											$_SESSION["ICP_UserName"] = $results["login"];
											$_SESSION["ICP_UserAccessLevel"] = empty($icpTable[1]) ? 0 : $icpTable[1];
											$_SESSION["ICP_UserEmail"] = $icpTable[0];
											$_SESSION["ICP_UserVip"] = strtotime($icpTable[2]) < time() ? "Disabled" : "Enabled";
											$_SESSION["ICP_UserVipEnd"] = strtotime($icpTable[2]) < time() ? "Disabled" : $icpTable[2];
											return "success";
										}
									}
								}
							}else{
								return "pass_login_error";
							}
						}else{
							return "pass_login_error";
						}
					}else{
						$records = $this->conn->prepare('SELECT a.login, a.'.$accesslevel_accounts.', CASE WHEN (SELECT CONCAT(email, ";", accessLevel, ";", vip_end, ";", status) FROM icp_accounts WHERE login = a.login) IS NULL THEN "" ELSE (SELECT CONCAT(email, ";", accessLevel, ";", vip_end, ";", status) FROM icp_accounts WHERE login = a.login) END AS icp_table FROM accounts AS a WHERE a.login = ? AND a.password = ?');
						$records->execute([$username,$pass]);
						$results = $records->fetch(\PDO::FETCH_ASSOC);
						if($results){
							if(empty($results["icp_table"])){
								$acc_id = strtotime(date("Y-m-d H:i:s"));
								if($this->CreateAccWithEmail){
									$insert_icp = $this->conn->prepare('INSERT INTO icp_accounts (login, email, acc_id, vip_end) VALUES (?,?,?,?)');
									$insert_icp->execute([$username,"",$acc_id,date("Y-m-d H:i:s")]);
								}else{
									$insert_icp = $this->conn->prepare('INSERT INTO icp_accounts (login, email, acc_id, vip_end, status) VALUES (?,?,?,?,"1")');
									$insert_icp->execute([$username,"",$acc_id,date("Y-m-d H:i:s")]);
								}
								return "email_is_null";
							}else{
								$icpTable = explode(";",$results["icp_table"]);
								if($results["{$accesslevel_accounts}"] < 0 && $icpTable[3] || $icpTable[1] < 0){
									return "acc_banned";
								}elseif(empty($icpTable[0])){
									return "email_is_null";
								}else{
									if(!$icpTable[3]){
										return "account_inactivated";
									}else{
										$this->addLogIp($results["login"]);
										$_SESSION["ICP_UserName"] = $results["login"];
										$_SESSION["ICP_UserAccessLevel"] = empty($icpTable[1]) ? 0 : $icpTable[1];
										$_SESSION["ICP_UserEmail"] = $icpTable[0];
											$_SESSION["ICP_UserVip"] = strtotime($icpTable[2]) < time() ? "Disabled" : "Enabled";
											$_SESSION["ICP_UserVipEnd"] = strtotime($icpTable[2]) < time() ? "Disabled" : $icpTable[2];
										return "success";
									}
								}
							}
						}else{
							return "pass_login_error";
						}
					}
				}else{
					$records = $this->conn->prepare("SELECT TOP 1 u.account, (SELECT CONCAT(uid,';',pay_stat) FROM user_account WHERE account = u.account) AS uid, CASE WHEN (SELECT CONCAT(email, ';', accessLevel, ';', vip_end, ';', status) FROM icp_accounts WHERE login = u.account) IS NULL THEN '' ELSE (SELECT CONCAT(email, ';', accessLevel, ';', vip_end, ';', status) FROM icp_accounts WHERE login = u.account) END AS icp_table FROM user_auth AS u WHERE u.account = ? AND u.password LIKE ".$pass);
					$records->execute([$username]);
					$results = $records->fetch(\PDO::FETCH_ASSOC);
					if($results){
						if(empty($results["icp_table"])){
							$acc_id = strtotime(date("Y-m-d H:i:s"));
							if($this->CreateAccWithEmail){
								$insert_icp = $this->conn->prepare('INSERT INTO icp_accounts (login, email, acc_id, vip_end) VALUES (?,?,?,?)');
								$insert_icp->execute([$username,"",$acc_id,date("Y-m-d H:i:s")]);
							}else{
								$insert_icp = $this->conn->prepare('INSERT INTO icp_accounts (login, email, acc_id, vip_end, status) VALUES (?,?,?,?,?)');
								$insert_icp->execute([$username,"",$acc_id,date("Y-m-d H:i:s"),"1"]);
							}
							return "email_is_null";
						}else{
							$accStatus = explode(";",$results["uid"]);
							$icpTable = explode(";",$results["icp_table"]);
							if($accStatus[1] == 0 && $icpTable[3] || $icpTable[1] < 0){
								return "acc_banned";
							}elseif(empty($icpTable[0])){
								return "email_is_null";
							}else{
								if(!$icpTable[3])
									return "account_inactivated";
								else{
									$this->addLogIp($results["account"]);
									$_SESSION["ICP_UserName"] = trim($results['account']);
									$_SESSION["ICP_UserAccessLevel"] = empty($icpTable[1]) ? 0 : $icpTable[1];
									$_SESSION["ICP_UserEmail"] = $icpTable[0];
									$_SESSION["ICP_UserVip"] = strtotime($icpTable[2]) < time() ? "Disabled" : "Enabled";
									$_SESSION["ICP_UserVipEnd"] = strtotime($icpTable[2]) < time() ? "Disabled" : $icpTable[2];
									$_SESSION["ICP_UserId"] = $accStatus[0];
									return "success";
								}
							}
						}
					}else{
						return "pass_login_error";
					}
				}
			}else{
				return "ERROR!<br><br>".$errMsg;
			}
		}
		
		private function addLogIp($username){
			if($this->db_type)
				$logIp = $this->conn->prepare("SELECT ip FROM icp_accounts_ip WHERE login = ? ORDER BY id DESC LIMIT 1", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			else
				$logIp = $this->conn->prepare("SELECT TOP 1 ip FROM icp_accounts_ip WHERE login = ? ORDER BY id DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			$logIp->execute([$username]);
			$results = $logIp->fetch(\PDO::FETCH_ASSOC);
			$ip = $this->get_client_ip();
			if($results){
				if($results["ip"] != $ip){
					$logIp = $this->conn->prepare("INSERT INTO icp_accounts_ip (ip, date, login) VALUES (?,?,?)");
					$logIp->execute([$ip,date("Y/m/d"),$username]);
				}
			}else{
				$logIp = $this->conn->prepare("INSERT INTO icp_accounts_ip (ip, date, login) VALUES (?,?,?)");
				$logIp->execute([$ip,date("Y/m/d"),$username]);
			}
			return null;
		}
		
		private function get_client_ip(){
			$v4mapped_prefix_hex = '00000000000000000000ffff';
			$v4mapped_prefix_bin = hex2bin($v4mapped_prefix_hex);
			$ipaddress = '';
			if (isset($_SERVER['HTTP_CLIENT_IP']))
				$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
			else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
				$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_X_FORWARDED']))
				$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
			else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
				$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_FORWARDED']))
				$ipaddress = $_SERVER['HTTP_FORWARDED'];
			else if(isset($_SERVER['REMOTE_ADDR']))
				$ipaddress = $_SERVER['REMOTE_ADDR'];
			else
				$ipaddress = 'UNKNOWN';
			$addr_bin = inet_pton($ipaddress);
			if( substr($addr_bin, 0, strlen($v4mapped_prefix_bin)) == $v4mapped_prefix_bin) {
			$addr_bin = substr($addr_bin, strlen($v4mapped_prefix_bin));
			}
			return inet_ntop($addr_bin);
		}
		
		public function addEmail($username, $password, $email){
			$errMsg = null;
			$errMsg .= empty($username) ? 'Enter your username.<br>' : null;
			$errMsg .= empty($password) ? 'Enter your password.' : null;
			$errMsg .= empty($email) ? 'Enter a email.<br>' : null;
			$errMsg .= !filter_var($email, FILTER_VALIDATE_EMAIL) ? 'Invalid email!<br>' : null;
			if(empty($errMsg)){
				$pass = $this->ICP_encrypt($password);
				if($this->db_type){
					if($this->L2jVersaoAcis && !$this->l2jOldAcis){
						$records = $this->conn->prepare('SELECT password FROM accounts WHERE login = ?');
						$records->execute([$username]);
						$results = $records->fetch(\PDO::FETCH_ASSOC);
						if($results){
							if(password_verify($password, $results["password"])){
								return $this->addEmail2($username,$password,$email);
							}else{
								return "pass_login_error";
							}
						}else{
							return "pass_login_error";
						}
					}else{
						$records = $this->conn->prepare('SELECT * FROM accounts WHERE login = ? AND password = ?');
						$records->execute([$username,$pass]);
						$results = $records->fetch(\PDO::FETCH_ASSOC);
						if($results){
							return $this->addEmail2($username,$password,$email);
						}else{
							return "pass_login_error";
						}
					}
				}else{
					$records = $this->conn->prepare("SELECT TOP 1 * FROM user_auth WHERE account = ? AND password LIKE ".$pass);
					$records->execute([$username]);
					$results = $records->fetch(\PDO::FETCH_ASSOC);
					if($results){
						return $this->addEmail2($username,$password,$email);
					}else{
						return "pass_login_error";
					}
				}
			}else{
				return "ERROR!<br><br>".$errMsg;
			}
		}
		
		public function addEmail2($username, $password, $email){
			$records = $this->conn->prepare('SELECT acc_id, email FROM icp_accounts WHERE login = ?');
			$records->execute([$username]);
			$results = $records->fetch(\PDO::FETCH_ASSOC);
			if($results){
				$acc_id = $results["acc_id"];
				if(empty($results["email"])){
					if($this->CreateAccWithEmail){
						$assunto = "Register - ".$this->serverName;
						$mensagem = "<center><font color='#0066FF' size='5'><b><u>".$username."</u>, welcome to ".$this->serverName."</b>!</font><br><br>This is an automatic email generated by our website to complete your registration.<br><br>To activate your account, click on the link below:<br><a href='http://".$this->url_completa()."index.php?icp=panel&show=activate&acc=".$acc_id."'>http://".$this->url_completa()."index.php?icp=panel&show=activate&acc=".$acc_id."</a><br><br>Your Login is : <b>".$username."</b><br>Your password is : <b>".$password."</b><br><br>You can change your password in our control panel at any time..<br><br>Have a good game!<br><br>Regards...<br><br><h3><u>Staff ".$this->serverName."</u></h3></center>";
						if(!$this->sendEmail($this->serverName, $email, $assunto, $mensagem)){
							return "error_sent_mail";
						}else{
							$insert_icp = $this->conn->prepare('UPDATE icp_accounts SET email = ? WHERE login = ? AND acc_id = ?');
							$insert_icp->execute([$email,$username,$acc_id]);
							return "success";
						}
					}else{
						$insert_icp = $this->conn->prepare('UPDATE icp_accounts SET email = ? WHERE login = ? AND acc_id = ?');
						$insert_icp->execute([$email,$username,$acc_id]);
						return "success";
					}
				}else{
					return "email_already_exists";
				}
			}
		}
		
		public function register($username,$email,$password1,$password2,$rules){
			$errMsg = null;
			$errMsg .= empty($username) ? 'Enter a username.<br>' : null;
			$errMsg .= empty($email) ? 'Enter a email.<br>' : null;
			$errMsg .= !filter_var($email, FILTER_VALIDATE_EMAIL) ? 'Invalid email!<br>' : null;
			$errMsg .= empty($password1) ? 'Enter a password.<br>' : null;
			$errMsg .= empty($password2) ? 'Enter password confirmation.<br>' : null;
			$errMsg .= $password1 != $password2 ? 'Passwords do not match.<br>' : null;
			$errMsg .= empty($errMsg) ? null : '<br>Try again';
			if(empty($errMsg)){
				$pass = $this->ICP_encrypt($password1);
				$acc_id = strtotime(date("Y-m-d H:i:s"));
				$assunto = "Register - ".$this->serverName;
				$mensagem = "<center><font color='#0066FF' size='5'><b><u>".$username."</u>, welcome to ".$this->serverName."</b>!</font><br><br>This is an automatic email generated by our website to complete your registration.<br><br>To activate your account, click on the link below:<br><a href='http://".$this->url_completa()."index.php?icp=panel&show=activate&acc=".$acc_id."'>http://".$this->url_completa()."index.php?icp=panel&show=activate&acc=".$acc_id."</a><br><br>Your Login is : <b>".$username."</b><br>Your password is : <b>".$password1."</b><br><br>You can change your password in our control panel at any time..<br><br>Have a good game!<br><br>Regards...<br><br><h3><u>Staff ".$this->serverName."</u></h3></center>";
				if($this->db_type){
					$records = $this->conn->prepare('SELECT login FROM accounts WHERE login = ?');
					$records->execute([$username]);
					$results = $records->fetch(\PDO::FETCH_ASSOC);
					if(!$results){
						$accesslevel_accounts = $this->info_table("accounts","accesslevel");
						if($this->CreateAccWithEmail){
							if(!$this->sendEmail($this->serverName, $email, $assunto, $mensagem)){
								return $this->resposta("Account has not been created.<br>Please contact an Admin.","Oops...","error");
							}else{
								$insert_acc = $this->conn->prepare('INSERT INTO accounts (login, password, '.$accesslevel_accounts.') VALUES (?,?,"-1")');
								$pass = $this->L2jVersaoAcis && !$this->l2jOldAcis ? str_replace("$2y$", "$2a$", password_hash($password1, PASSWORD_BCRYPT)) : $pass;
								$insert_acc->execute([$username,$pass]);
								$insert_icp = $this->conn->prepare('INSERT INTO icp_accounts (login, email, acc_id, vip_end) VALUES (?,?,?,?)');
								$insert_icp->execute([$username,$email,$acc_id,date("Y-m-d H:i:s")]);
								return $this->resposta("Account created successfully.<br>Access your email to activate your account.<br>If the email doesn\'t arrive, check your spam box.<br>Welcome to ".$this->serverName."!","Success!","success","?icp=panel");
							}
						}else{
							$insert_acc = $this->conn->prepare('INSERT INTO accounts (login, password, '.$accesslevel_accounts.') VALUES (?,?,"0")');
							$pass = $this->L2jVersaoAcis && !$this->l2jOldAcis ? str_replace("$2y$", "$2a$", password_hash($password1, PASSWORD_BCRYPT)) : $pass;
							$insert_acc->execute([$username,$pass]);
							$insert_icp = $this->conn->prepare('INSERT INTO icp_accounts (login, email, acc_id, status, vip_end) VALUES (?,?,?,"1",?)');
							$insert_icp->execute([$username,$email,$acc_id,date("Y-m-d H:i:s")]);
							return $this->resposta("Account created successfully.<br>Welcome to ".$this->serverName."!","Success!","success","?icp=panel");
						}
					}else{
						return $this->resposta("The account name ".$username." is already in use.<br>Choose another and try again.","Oooh no!","error");
					}
				}else{
					$records = $this->conn->prepare('SELECT account FROM user_auth WHERE account = ?', array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$records->execute([$username]);
					$results = $records->fetch(\PDO::FETCH_ASSOC);
					if(!$results){
						$answer = $this->ICP_encrypt("icpnetworks");
						$ssn = mt_rand(1000000,9999999).mt_rand(100000,999999);
						if($this->CreateAccWithEmail){
							if(!$this->sendEmail($this->serverName, $email, $assunto, $mensagem)){
								return $this->resposta("Account has not been created.<br>Please contact an Admin.","Oops...","error");
							}else{
								$insert_ssn = $this->conn->prepare("INSERT INTO [ssn](ssn,name,email,job,phone,zip,addr_main,addr_etc,account_num) VALUES (?,?,?,?,?,?,?,?,?)");
								$insert_ssn->execute([$ssn,$username,$email,"0","telphone","123456","","","1"]);
								$insert_acc = $this->conn->prepare("INSERT INTO user_account (account,pay_stat) VALUES (?,?)");
								$insert_acc->execute([$username,"0"]);
								$insert_inf = $this->conn->prepare("INSERT INTO user_info (account,ssn,kind) VALUES (?,?,?)");
								$insert_inf->execute([$username,$ssn,"99"]);
								$insert_auth = $this->conn->prepare("INSERT INTO user_auth (account,password,quiz1,quiz2,answer1,answer2) VALUES (?,".$pass.",'','',".$answer.",".$answer.")");
								$insert_auth->execute([$username]);
								$insert_icp = $this->conn->prepare("INSERT INTO icp_accounts (login, email, acc_id, vip_end, status, accessLevel) VALUES (?,?,?,?,'1','0')");
								$insert_icp->execute([$username,$email,$acc_id,date("Y-m-d H:i:s")]);
								return $this->resposta("Account created successfully.<br>Access your email to activate your account.<br>If the email doesn\'t arrive, check your spam box.<br>Welcome to ".$this->serverName."!","Success!","success","?icp=panel");
							}
						}else{
							$insert_ssn = $this->conn->prepare("INSERT INTO [ssn](ssn,name,email,job,phone,zip,addr_main,addr_etc,account_num) VALUES (?,?,?,?,?,?,?,?,?)");
							$insert_ssn->execute([$ssn,$username,$email,"0","telphone","123456","","","1"]);
							$insert_acc = $this->conn->prepare("INSERT INTO user_account (account,pay_stat) VALUES (?,?)");
							$insert_acc->execute([$username,"1"]);
							$insert_inf = $this->conn->prepare("INSERT INTO user_info (account,ssn,kind) VALUES (?,?,?)");
							$insert_inf->execute([$username,$ssn,"99"]);
							$insert_auth = $this->conn->prepare("INSERT INTO user_auth (account,password,quiz1,quiz2,answer1,answer2) VALUES (?,".$pass.",'','',".$answer.",".$answer.")");
							$insert_auth->execute([$username]);
							$insert_icp = $this->conn->prepare("INSERT INTO icp_accounts (login, email, acc_id, vip_end, status, accessLevel) VALUES (?,?,?,?,'1','0')");
							$insert_icp->execute([$username,$email,$acc_id,date("Y-m-d H:i:s")]);
							return $this->resposta("Account created successfully.<br>Welcome to ".$this->serverName."!","Success!","success","?icp=panel");
						}
					}else{
						return $this->resposta("The account name ".$username." is already in use.<br>Choose another and try again.","Oooh no!","error");
					}
				}
			}else{
				return $this->resposta($errMsg,"Oops...","error");
			}
		}
		
		public function recovery($username,$email){
			$errMsg = null;
			$errMsg .= empty($username) ? 'Enter a user.<br>' : null;
			$errMsg .= empty($email) ? 'Enter a email.<br>' : null;
			$errMsg .= !filter_var($email, FILTER_VALIDATE_EMAIL) ? 'Invalid email!' : null;
			if(empty($errMsg)){
				$CaracteresAceitos = 'abcdxywzABCDZYWZ0123456789';
				$password = null;
				for($i=0; $i < 8; $i++)
					$password .= $CaracteresAceitos[mt_rand(0, (strlen($CaracteresAceitos)-1))];
				$newpass = $this->ICP_encrypt($password);
				$assunto = "Password recovery - ".$this->serverName;
				$mensagem = "<center><font color='#0066FF' size='5'><b>Hi <u>".$username."</u></b>!</font><br><br>This is an automatic email generated by our website for password recovery.<br><br>Your Login is : <b>".$username."</b><br>Your new password is : <b>".$password."</b><br><br>You can change your password on our control panel at any time.<br><br>Regards...<br><br><h3><u>Staff ".$this->serverName."</u></h3></center>";
				$records = $this->conn->prepare('SELECT accessLevel FROM icp_accounts WHERE login = ? AND email = ?', array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				$records->execute([$username,$email]);
				if($records->rowCount() == 1){
					$results = $records->fetch(\PDO::FETCH_ASSOC);
					if($results["accessLevel"] > 0){
						if($this->RecoveryAccWithEmail){
							if(!$this->sendEmail($this->serverName, $email, $assunto, $mensagem)){
								return $this->resposta("Failed to send email.<br>Please contact an Admin.","Oops...","error");
							}else{
								if($this->db_type){
									$newpass = $this->L2jVersaoAcis && !$this->l2jOldAcis ? str_replace("$2y$", "$2a$", password_hash($password, PASSWORD_BCRYPT)) : $newpass;
									$alterandosenha = $this->conn->prepare('UPDATE accounts SET password = "'.$newpass.'" WHERE login = ?');
									$alterandosenha->execute([$username]);
									return $this->resposta("A new password has been sent to your email.","Success!","success");
								}else{
									$alterandosenha = $this->conn->prepare('UPDATE user_auth SET password = '.$newpass.' WHERE account = ?', array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
									$alterandosenha->execute([$username]);
									return $this->resposta("A new password has been sent to your email.","Success!","success");
								}
							}
						}else{
							if($this->db_type){
								$newpass = $this->L2jVersaoAcis && !$this->l2jOldAcis ? str_replace("$2y$", "$2a$", password_hash($password, PASSWORD_BCRYPT)) : $newpass;
								$alterandosenha = $this->conn->prepare('UPDATE accounts SET password = "'.$newpass.'" WHERE login = ?');
								$alterandosenha->execute([$username]);
								return $this->resposta("Hi ".$username.", please write down your new password : ".$password."<br><br>Thanks!<br>Staff ".$this->serverName,"Success!","success");
							}else{
								$alterandosenha = $this->conn->prepare('UPDATE user_auth SET password = '.$newpass.' WHERE account = ?', array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
								$alterandosenha->execute([$username]);
								return $this->resposta("Hi ".$username.", please write down your new password : ".$password."<br><br>Thanks!<br>Staff ".$this->serverName,"Success!","success");
							}
						}
					}else{
						return $this->resposta("You've been banned!","Oooh no!","error");
					}
				}else{
					return $this->resposta("Data do not match!<br>Try again.","Oops...","error");
				}
			}else{
				return $this->resposta($errMsg,"Oops...","error");
			}
		}
		
		public function passChange($senha1,$senha2,$senha3,$username){
			$errMsg = null;
			$errMsg .= empty($senha1) ? 'Enter current password.<br>' : null;
			$errMsg .= empty($senha2) ? 'Enter your new password.<br>' : null;
			$errMsg .= empty($senha3) ? 'Repeat your new password.<br>' : null;
			$errMsg .= empty($username) ? 'Invalid login.<br>' : null;
			$errMsg .= $senha2 != $senha3 ? 'New passwords do not match.<br>' : null;
			$errMsg .= empty($errMsg) ? null : '<br>Try again';
			if(empty($errMsg)){
				if($this->db_type){
					if($this->L2jVersaoAcis && !$this->l2jOldAcis){
						$records = $this->conn->prepare('SELECT password FROM accounts WHERE login = ?');
						$records->execute([$username]);
						$results = $records->fetch(\PDO::FETCH_ASSOC);
						if($results){
							if(password_verify($senha1, $results["password"])){
								$alterandosenha = $this->conn->prepare('UPDATE accounts SET password = ? WHERE login = ?');
								$alterandosenha->execute([str_replace("$2y$", "$2a$", password_hash($senha2, PASSWORD_BCRYPT)),$username]);
								return $this->resposta("Your password has been changed!","Success!","success");
							}else{
								return $this->resposta("Invalid password.<br>Try again.","Oooh no!","error");
							}
						}else{
							return $this->resposta("Invalid password.<br>Try again.","Oooh no!","error");
						}
					}else{
						$records = $this->conn->prepare('SELECT password FROM accounts WHERE login = ? AND password = ?');
						$records->execute([$username,$this->ICP_encrypt($senha1)]);
						if($records->rowCount() == 1){
							$alterandosenha = $this->conn->prepare('UPDATE accounts SET password = ? WHERE password = ? AND login = ?');
							$alterandosenha->execute([$this->ICP_encrypt($senha2),$this->ICP_encrypt($senha1),$username]);
							return $this->resposta("Your password has been changed!","Success!","success");
						}else{
							return $this->resposta("Invalid password.<br>Try again.","Oooh no!","error");
						}
					}
				}else{
					$records = $this->conn->prepare('SELECT password FROM user_auth WHERE account = ? AND password = '.$this->ICP_encrypt($senha1), array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$records->execute([$username]);
					if($records->rowCount() == 1){
						$alterandosenha = $this->conn->prepare('UPDATE user_auth SET password = '.$this->ICP_encrypt($senha2).' WHERE password = '.$this->ICP_encrypt($senha1).' AND account = ?');
						$alterandosenha->execute([$username]);
						return $this->resposta("Your password has been changed!","Success!","success");
					}else{
						return $this->resposta("Invalid password.<br>Try again.","Oooh no!","error");
					}
				}
			}else{
				return $this->resposta($errMsg,"Oops...","error");
			}
		}
		
		function emailChange($email1,$email2,$email3,$login){
			$errMsg = null;
			$errMsg .= empty($email1) ? 'The current email is invalid.<br>' : null;
			$errMsg .= empty($email2) ? 'The new email is invalid.<br>' : null;
			$errMsg .= empty($email3) ? 'The confirmation of the new email is invalid.<br>' : null;
			$errMsg .= !filter_var($email1, FILTER_VALIDATE_EMAIL) ? 'The current email is invalid.<br>' : null;
			$errMsg .= !filter_var($email2, FILTER_VALIDATE_EMAIL) ? 'The new email is invalid.<br>' : null;
			$errMsg .= !filter_var($email3, FILTER_VALIDATE_EMAIL) ? 'The confirmation of the new email is invalid.<br>' : null;
			$errMsg .= $email2 != $email3 ? 'The confirmation of the new email is incorrect.<br>' : null;
			$errMsg .= empty($login) ? 'Invalid login.<br>' : null;
			$errMsg .= empty($errMsg) ? null : '<br>Try again';
			if(empty($errMsg)){
				$records = $this->conn->prepare("SELECT * FROM icp_accounts WHERE login = ? AND email = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				$records->execute([$login,$email1]);
				if($records->rowCount() == 1){
					$email_changing = $this->conn->prepare("UPDATE icp_accounts SET email = ? WHERE login = ? AND email = ?");
					$email_changing->execute([$email2,$login,$email1]);
					$_SESSION["ICP_UserEmail"] = $email2;
					return $this->resposta("Email exchanged.","Success!","success","?icp=panel&show=accounts");
				}else{
					return $this->resposta("Incorrect current email.<br>Try again.","Oooh no!","error");
				}
			}else{
				return $this->resposta($errMsg,"Oops...","error");
			}
		}
		
		private function url_completa(){
			$url = explode("/", $_SERVER['REQUEST_URI']);
			$url_completa = null;
			for($x=0;$x<(count($url)-1);$x++){
				$url_completa .= $url[$x]."/";
			}
			return $_SERVER['SERVER_NAME'].$url_completa;
		}
		
		private function sendEmail($nome_remetente, $email_remetente, $assunto, $mensagem, $contato = false){
			require_once('engine/phpmailer/src/PHPMailer.php');
			require_once('engine/phpmailer/src/SMTP.php');
			$mail = new \PHPMailer\PHPMailer\PHPMailer(true);
			try {
				$mail->IsSMTP(); 
				$mail->Host = $this->SMTP_HOST;
				$mail->SMTPAuth = true;
				$mail->Username = $this->SMTP_EMAIL;
				$mail->Password = $this->SMTP_PASS;
				$mail->Port = $this->SMTP_PORT;
				if($contato){
					$mail->setFrom($email_remetente, $nome_remetente);
					$mail->addAddress($this->SMTP_EMAIL);
				}else{
					$mail->setFrom($this->SMTP_EMAIL, $this->serverName);
					$mail->addAddress($email_remetente);
				}
				$mail->WordWrap = 50;
				$mail->IsHTML(true);
				$mail->CharSet = "utf-8";
				$mail->Subject = $assunto;
				$mail->Body = $mensagem;
				return $mail->Send();
			} catch (\Exception $e) {
				return false;
			}
		}
		
		private function info_table($tabela,$coluna){
			$tabela = strtolower($tabela);
			$coluna = strtolower($coluna);
			if($this->db_type){
				$stmt = $this->conn->prepare('SHOW COLUMNS FROM '.$tabela);
				if($stmt->execute()){
					if($coluna == "accesslevel"){
						while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
							if(preg_match("/^access/i", $row["Field"]))
								return $row["Field"];
						}
					}
					if($coluna == "charid"){
						if($tabela == "ally_data" || $tabela == "augmentations" || $tabela == "characters" || $tabela == "character_quests" || $tabela == "character_subclasses" || $tabela == "character_skills" || $tabela == "character_skills_save" || $tabela == "heroes" || $tabela == "olympiad_nobles" || $tabela == "character_raid_points" || $tabela == "items" || $tabela == "item_attributes" || $tabela == "item_elementals" || $tabela == "item_variations"){
							while($row = $stmt->fetch(\PDO::FETCH_ASSOC))
								if ($row["Key"] == "PRI")
									return $row["Field"];
						}else{
							$row = $stmt->fetch(\PDO::FETCH_ASSOC);
							return $row["Field"];
						}
					}
				}
			}
			return null;
		}
		
		public function setPrivilege($privId,$login,$senderPrivId){
			if($senderPrivId == 10){
				$table = $this->db_type ? "accounts" : "user_auth";
				$col = $this->db_type ? "login" : "account";
				$getUsername = $this->conn->prepare("SELECT * FROM ".$table." WHERE ".$col." = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				$getUsername->execute([$login]);
				if($getUsername->rowCount() == 1){
					$getUsername2 = $this->conn->prepare("SELECT * FROM icp_accounts WHERE login = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$getUsername2->execute([$login]);
					if($getUsername2->rowCount() == 1){
						if($privId <= 0){
							if($this->db_type){
								$accesslevel_accounts = $this->info_table("accounts","accesslevel");
								$setBan = $this->conn->prepare("UPDATE accounts SET ".$accesslevel_accounts." = ? WHERE login = ?");
								$setBan->execute([$privId,$login]);
							}else{
								$BanUnban = $privId == 0 ? 1 : $privId;
								$BanUnban = $privId < 0 ? 0 : $BanUnban;
								$setBan = $this->conn->prepare("UPDATE user_account SET pay_stat = ? WHERE account = ?");
								$setBan->execute([$BanUnban,$login]);
							}
						}
						$setPriv = $this->conn->prepare("UPDATE icp_accounts SET accessLevel = ? WHERE login = ?");
						if($setPriv->execute([$privId,$login]))
							return $this->resposta("privilege successfully given!","Success!","success");
						else
							return $this->resposta("Error giving privilege.","Oops...","error");
					}else{
						return $this->resposta("The account does not exist.","Oops...","error");
					}
				}else{
					return $this->resposta("The account does not exist.","Oops...","error");
				}
			}else{
				return $this->resposta("You are not allowed to do this.","Oops...","error");
			}
		}
		
	}
	
}