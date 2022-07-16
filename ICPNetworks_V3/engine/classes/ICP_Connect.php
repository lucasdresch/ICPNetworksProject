<?php
require_once("FloodProtection.php");
use frdl\security\floodprotection\FloodProtection;
class ICPConnect {
	protected static $db_game;
	protected static $db_login;
	private function __construct($dbtype, $db_host, $db_name, $db_user, $db_pass) {
		$this->host = $db_host;
		$this->name = $db_name;
		$this->user = $db_user;
		$this->pass = $db_pass;
		$this->type = $dbtype;
		$db_driver = strtolower($this->name) == "lin2db" || strtolower($this->name) == "lin2world" ? "sqlsrv:Server" : "mysql:host";
		$db_database = strtolower($this->name) == "lin2db" || strtolower($this->name) == "lin2world" ? "Database" : "dbname";
		if($this->type == "login"){
			try {
				self::$db_login = new \PDO($db_driver."=".$this->host."; ".$db_database."=".$this->name, $this->user, $this->pass);
				self::$db_login->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				self::$db_login->exec('SET NAMES utf8');
			} catch (PDOException $e) {
				return false;
			}
		}elseif($this->type == "game"){
			try {
				self::$db_game = new \PDO($db_driver."=".$this->host."; ".$db_database."=".$this->name, $this->user, $this->pass);
				self::$db_game->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				self::$db_game->exec('SET NAMES utf8');
			} catch (PDOException $e) {
				return false;
			}
		}else{
			return false;
		}
	}
	static function get_client_ip(){
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
	public static function connect($dbtype,$dbhost, $dbname, $dbuser, $dbpass) {
		$AllowedIps = array(
			'186.234.16.8',		//PagSeguro
			'186.234.16.9',		//PagSeguro
			'186.234.48.8',		//PagSeguro
			'186.234.48.9',		//PagSeguro
			'186.234.144.17',	//PagSeguro
			'186.234.144.18',	//PagSeguro
			'200.147.112.136',	//PagSeguro
			'200.147.112.137',	//PagSeguro
			'200.221.19.20',	//PagSeguro
			'64.4.248.8',		//PayPal
			'64.4.249.8',		//PayPal
			'66.211.169.17',	//PayPal
			'173.0.84.40',		//PayPal
			'173.0.84.8',		//PayPal
			'173.0.88.40',		//PayPal
			'173.0.88.8',		//PayPal
			'173.0.92.8',		//PayPal
			'173.0.93.8',		//PayPal
			'54.88.218.97',		//MercadoPago
			'18.215.140.160',	//MercadoPago
			'18.213.114.129',	//MercadoPago
			'18.206.34.84'		//MercadoPago
		);
		if(!in_array(ICPConnect::get_client_ip(),$AllowedIps)){
			$FloodProtection = new FloodProtection('ICPNetworks', 30, 60, null, false);	
			if($FloodProtection->check(ICPConnect::get_client_ip())){
				header("HTTP/1.1 429 Too Many Requests");
				exit("
					<html>
						<title>ICPNetworks Flood Protection</title>
						<body style=\"text-align:center;\">
							<h1>ICPNetworks Flood Protection</h1><br>
							<img src=\"images/miscs/what.jfif\"><br>
							<h3>Your IP ".ICPConnect::get_client_ip()." has been blocked!</h3>
							Wait a few seconds and try to access again.<br><br><br>
							<img src=\"images/miscs/icplogo.png\" width=\"200\" height=\"48\">
							<p><a href=\"http://www.icpnetworks.com.br\" target=\"_blank\">ICPNetworks &copy; 2010–2030</a></p>
							<p>All rights reserved</p>
						</body>
					</html>
				");
			}
		}
		if($dbtype == "login"){
			if (!self::$db_login) {
				new ICPConnect($dbtype, $dbhost, $dbname, $dbuser, $dbpass);
			}
			return self::$db_login;
		}elseif($dbtype == "game"){
			if (!self::$db_game) {
				new ICPConnect($dbtype, $dbhost, $dbname, $dbuser, $dbpass);
			}
			return self::$db_game;
		}
		return false;
	}
}