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
	
	use \ICPNetworks\Miscs\Suport AS Suport;
	
	class ServerInfo extends Suport {
		
		public function serverDetails() {
			$rank = array();
			if($this->ALLOW_SERVER_STATS){
				if($this->db_type){
					if($this->L2jVersaoRussa){
						$records2 = $this->loginConn->prepare("SELECT COUNT(login) AS accounts FROM accounts");
						$records = $this->gameConn->prepare("SELECT COUNT(char_name) AS players_on, (SELECT COUNT(char_name) FROM characters) AS chars, (SELECT COUNT(name) FROM clan_subpledges WHERE type = '0') AS clans FROM characters WHERE online = '1'");
					}else{
						if(!empty($this->loginConn)){
							$records2 = $this->loginConn->prepare("SELECT COUNT(login) AS accounts FROM accounts");
							$records = $this->gameConn->prepare("SELECT COUNT(char_name) AS players_on, (SELECT COUNT(char_name) FROM characters) AS chars, (SELECT COUNT(*) FROM clan_data) AS clans FROM characters WHERE online = '1'");
						}else{
							$records = $this->gameConn->prepare("SELECT COUNT(char_name) AS players_on, (SELECT COUNT(char_name) FROM characters) AS chars, (SELECT COUNT(login) FROM accounts) AS accounts, (SELECT COUNT(*) FROM clan_data) AS clans FROM characters WHERE online = '1'");
						}
					}
				}else{
					$records2 = $this->loginConn->prepare("SELECT COUNT(account) AS accounts FROM user_auth", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$records = $this->gameConn->prepare("SELECT COUNT(char_name) AS players_on, (SELECT COUNT(char_name) FROM user_data) AS chars, (SELECT COUNT(name) FROM Pledge) AS clans FROM user_data WHERE login > logout", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				}
				$records->execute();
				if($records->rowCount() > 0){
					while ($row = $records->fetchObject()) {
						if(!empty($this->loginConn)){
							$records2->execute();
							if($records2->rowCount() > 0){
								while ($row2 = $records2->fetchObject()) {
									$accounts = $row2->accounts;
								}
							}else{
								$accounts = 0;
							}
						}else{
							$accounts = $row->accounts;
						}
						if($this->FAKE_PLAYERS_ENABLED){
							$accounts = ceil($accounts * $this->FAKE_PLAYERS_NUMBER);
							$chars = ceil($row->chars * $this->FAKE_PLAYERS_NUMBER);
							$playersOnline = ceil($row->players_on * $this->FAKE_PLAYERS_NUMBER);
							$clans = ceil($row->clans * $this->FAKE_PLAYERS_NUMBER);
						}else{
							$chars = $row->chars;
							$playersOnline = $row->players_on;
							$clans = $row->clans;
						}
						array_push($rank, array("totalAccounts" => $accounts, "totalCharacters" => $chars, "totalCharactersOnline" => $playersOnline, "totalClans" => $clans));
					}
				}else{
					array_push($rank, array("totalAccounts" => 0, "totalCharacters" => 0, "totalCharactersOnline" => 0, "totalClans" => 0));
				}
			}
			return $rank;
		}
		
		function showStaff(){
			$staff = array();
			$records = $this->gameConn->prepare("SELECT * FROM icp_staff ORDER BY id ASC");
			$records->execute();
			if($records->rowCount() > 0){
				while ($row = $records->fetchObject()) {
					array_push($staff, array("staffImg" => $row->img, "staffName" => $row->name, "staffEmail" => $row->email));
				}
			}
			return $staff;
		}
		
		public function showNews($newsId,$limit){
			$news = array();
			if($this->ENABLE_NEWS > 0){
				if(!empty($limit)){
					$where = $newsId > 0 ? " WHERE n.id = '".$newsId."'" : null;
					if($this->db_type){
						$records = $this->gameConn->prepare("SELECT n.*, CASE WHEN n.author != '' THEN CASE WHEN (SELECT CONCAT(img,';',name) FROM icp_staff WHERE login = n.author) IS NULL THEN 'noimage.jpg;GM Anonymous' ELSE (SELECT CONCAT(img,';',name) FROM icp_staff WHERE login = n.author) END ELSE 'noimage.jpg;GM Anonymous' END AS staff FROM icp_news AS n".$where." ORDER BY n.date DESC LIMIT ".$limit);
					}else{
						$records = $this->gameConn->prepare("SELECT n.*, CASE WHEN n.author != '' THEN CASE WHEN (SELECT CONCAT(img,';',name) FROM icp_staff WHERE login = n.author) IS NULL THEN 'noimage.jpg;GM Anonymous' ELSE (SELECT CONCAT(img,';',name) FROM icp_staff WHERE login = n.author) END ELSE 'noimage.jpg;GM Anonymous' END AS staff FROM icp_news AS n".$where." ORDER BY n.date DESC OFFSET ".str_replace(","," ROWS FETCH NEXT", $limit)." ROWS ONLY", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					}
				}else{
					$records = $this->gameConn->prepare("SELECT n.*, CASE WHEN n.author != '' THEN CASE WHEN (SELECT CONCAT(img,';',name) FROM icp_staff WHERE login = n.author) IS NULL THEN 'noimage.jpg;GM Anonymous' ELSE (SELECT CONCAT(img,';',name) FROM icp_staff WHERE login = n.author) END ELSE 'noimage.jpg;GM Anonymous' END AS staff FROM icp_news AS n ORDER BY n.date DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				}
				$records->execute();
				if($records->rowCount() > 0){
					while ($row = $records->fetchObject()) {
						$staff = explode(";",$row->staff);
						array_push($news, array("newsId" => $row->id, "newsText" => $row->news, "newsTitle" => $row->title, "newsDate" => $row->date, "newsImage" => $staff[0], "newsAuthor" => $staff[1]));
					}
				}
			}
			return $news;
		}
		
	}
	
}