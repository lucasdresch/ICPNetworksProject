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
	
	class Rankings extends Suport {
		
		public function PvP_Pk($type,$limit,$classId=null) {
			$rank = array();
			if($limit > 0){
				if($this->ENABLE_TOP_PVP && $type == "pvpkills" && empty($classId) || $this->ENABLE_TOP_PK && $type == "pkkills" && empty($classId) || $this->ENABLE_TOP_CLASS_PVP && $type == "pvpkills" && !empty($classId) || $this->ENABLE_TOP_CLASS_PK && $type == "pkkills" && !empty($classId)){
					if($this->db_type){
						$where = empty($classId) ? null : " AND base_class = '{$classId}'";
						$accesslevel_characters = $this->info_table("characters","accesslevel");
						if($this->L2jVersaoRussa){
							$charid_subclass = $this->info_table("character_subclasses","charid");
							$charid_characters = $this->info_table("characters","charid");
							$whereBase = $this->L2jVersaoClassic ? "type" : "isBase";
							$where = empty($classId) ? null : " AND (SELECT class_id FROM character_subclasses WHERE ".$charid_subclass." = c.".$charid_characters." AND ".$whereBase." = '1') = '{$classId}'";
							$records = $this->gameConn->prepare("SELECT c.char_name, c.".$type.", (SELECT class_id FROM character_subclasses WHERE ".$charid_subclass." = c.".$charid_characters." AND ".$whereBase." = '1') AS base_class, IF((SELECT name FROM clan_subpledges WHERE clan_id = c.clanid AND type = '0') IS NULL, 'n/a', (SELECT name FROM clan_subpledges WHERE clan_id = c.clanid AND type = '0')) AS clan, IF((SELECT (SELECT ally_name FROM ally_data WHERE ally_id = cd.ally_id) AS aname FROM clan_data AS cd WHERE cd.clan_id = c.clanid) IS NULL, '-', (SELECT (SELECT ally_name FROM ally_data WHERE ally_id = cd.ally_id) AS aname FROM clan_data AS cd WHERE cd.clan_id = c.clanid)) AS ally FROM characters AS c WHERE c.".$accesslevel_characters." = '0' AND c.".$type." > '0'".$where." ORDER BY c.".$type." DESC, c.char_name ASC LIMIT ".$limit);
						}elseif($this->L2jVersaoClassic){
							$records = $this->gameConn->prepare("SELECT c.char_name, c.".$type.", c.base_class, IF((SELECT clan_name FROM clan_data WHERE clan_id = c.clanid) IS NULL, 'n/a', (SELECT clan_name FROM clan_data WHERE clan_id = c.clanid)) AS clan, IF((SELECT ally_name FROM clan_data WHERE clan_id = c.clanid) IS NULL, 'n/a', (SELECT ally_name FROM clan_data WHERE clan_id = c.clanid)) AS ally FROM characters AS c WHERE c.".$accesslevel_characters." = '0' AND c.".$type." > '0'".$where." ORDER BY c.".$type." DESC, c.char_name ASC LIMIT ".$limit);
						}else{
							$records = $this->gameConn->prepare("SELECT c.char_name, c.".$type.", c.base_class, IF((SELECT clan_name FROM clan_data WHERE clan_id = c.clanid) IS NULL, 'n/a', (SELECT clan_name FROM clan_data WHERE clan_id = c.clanid)) AS clan, IF((SELECT ally_name FROM clan_data WHERE clan_id = c.clanid) IS NULL, 'n/a', (SELECT ally_name FROM clan_data WHERE clan_id = c.clanid)) AS ally FROM characters AS c WHERE c.".$accesslevel_characters." = '0' AND c.".$type." > '0'".$where." ORDER BY c.".$type." DESC, c.char_name ASC LIMIT ".$limit);
						}
					}else{
						$where = empty($classId) ? null : " AND subjob0_class = '{$classId}'";
						$type_ = $type == "pvpkills" ? "DUEL" : "PK";
						$records = $this->gameConn->prepare("SELECT TOP ".$limit." c.char_name, (c.".$type_.") AS ".$type.", (c.subjob0_class) AS base_class, CASE WHEN c.pledge_id > '0' THEN (SELECT name FROM Pledge WHERE pledge_id = c.pledge_id) ELSE 'n/a' END AS clan, CASE WHEN (SELECT alliance_id FROM Pledge WHERE pledge_id = c.pledge_id) > '0' THEN (SELECT name FROM Alliance WHERE pledge_id = c.pledge_id) ELSE 'n/a' END AS ally FROM user_data AS c WHERE c.builder = '0' AND c.".$type_." > '0'".$where." ORDER BY c.".$type_." DESC, c.char_name ASC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					}
					$records->execute();
					if($records->rowCount() > 0){
						$x=1;
						while ($row = $records->fetchObject()) {
							array_push($rank, array("playerPosition" => $x, "playerName" => $row->char_name, "playerClan" => $row->clan, "playerAlly" => $row->ally, "playerClass" => $this->classe_name($row->base_class), "playerCount" => number_format($row->{$type},0,".",".")));
							$x++;
						}
						if($records->rowCount() < $limit){
							for($x=1;$x<=($limit - $records->rowCount());$x++){
								array_push($rank, array("playerPosition" => $records->rowCount()+$x, "playerName" => "-", "playerClan" => "-", "playerAlly" => "-", "playerClass" => "-", "playerCount" => "-"));
							}
						}
					}else{
						for($x=1;$x<=$limit;$x++){
							array_push($rank, array("playerPosition" => $x, "playerName" => "-", "playerClan" => "-", "playerAlly" => "-", "playerClass" => "-", "playerCount" => "-"));
						}
					}
				}else{
					for($x=1;$x<=$limit;$x++){
						array_push($rank, array("playerPosition" => $x, "playerName" => "-", "playerClan" => "-", "playerAlly" => "-", "playerClass" => "-", "playerCount" => "-"));
					}
				}
			}
			return $rank;
		}
		
		private function getCastleAttDef($type,$casteloID,$dono){
			$AttDef = null;
			if($this->db_type){
				if(!$this->L2jVersaoRussa){
					$records = $this->gameConn->prepare('SELECT (SELECT clan_name FROM clan_data WHERE clan_id = sc.clan_id) AS clan FROM siege_clans AS sc WHERE sc.castle_id = ? AND sc.type = ?');
				}else{
					$records = $this->gameConn->prepare('SELECT (SELECT name FROM clan_subpledges WHERE clan_id = sc.clan_id AND type = "0") AS clan FROM siege_clans AS sc WHERE sc.residence_id = ? AND sc.type = ?');
				}
			}else{
				$records = $this->gameConn->prepare('SELECT p.name AS defensores FROM castle_war cw left join pledge p on p.pledge_id=cw.pledge_id WHERE cw.castle_id = ? AND cw.type = ?');
			}
			$records->execute([$casteloID,$type]);
			$x=1;
			while ($row = $records->fetchObject()) {
				$AttDef .= $row->clan;
				$AttDef .= $x == $records->rowCount() ? "." : ", ";
				$x++;
			}
			if($type == 1)
				if(empty($AttDef))
					$retorno = "None.";
				else
					$retorno = $AttDef;
			else
				if(empty($AttDef))
					if($dono == "Unowned")
						$retorno = "NPC's.";
					else
						$retorno = $dono.".";
				else
					$retorno = $dono.", ".$AttDef;
			return empty($retorno) ? null : $retorno;
		}
		
		function Castles(){
			$rank = array();
			if($this->ENABLE_CASTLE_SIEGES){
				if($this->db_type){
					if($this->L2jVersaoRussa){
						$tax = $this->chronicle == "Classic" ? '""' : 'tax_percent';
						$records = $this->gameConn->prepare('SELECT id, name, ('.$tax.') AS taxPercent, (siege_date) AS siegeDate FROM castle');
					}elseif($this->L2jVersaoClassic){
						$records = $this->gameConn->prepare('SELECT id, name, (siege_date) AS siegeDate, ("0") AS taxPercent FROM castle');
					}else{
						$records = $this->gameConn->prepare('SELECT id, name, taxPercent, siegeDate FROM castle');
					}
				}else{
					$records = $this->gameConn->prepare('SELECT id, name, (tax_rate) AS taxPercent, (next_war_time) AS siegeDate FROM castle');
				}
				$records->execute();
				while ($row = $records->fetchObject()) {
					if($this->db_type){
						if($this->L2jVersaoClassic){
							$siegeDate = date("Y-m-d H:i:s", strtotime($row->siegeDate));
						}else{
							$siegeDate = date("Y-m-d H:i:s", ($row->siegeDate/1000));
						}
					}else{
						$siegeDate = $row->siegeDate > strtotime(date('Y-m-d H:i:s')) ? date("Y-m-d H:i:s",$row->siegeDate) : "Sem data prevista";
					}
					$dono = explode(";",$this->getCastleOwner($row->id));
					array_push($rank, array("castleName" => str_replace("_castle","",$row->name), "castleOwner" => $this->getCastleLeader($row->id), "castleClan" => $dono[0], "castleAlly" => $dono[1], "castleDate" => $siegeDate, "castleTax" => $row->taxPercent, "castleDefenders" => $this->getCastleAttDef(2,$row->id,$dono[0]), "castleAttackers" => $this->getCastleAttDef(1,$row->id,$dono[0])));
				}
			}
			return $rank;
		}
		
		private function getCastleOwner($casteloID){
			$ClanDono = null;
			if($this->db_type){
				if(!$this->L2jVersaoRussa){
					$records = $this->gameConn->prepare('SELECT (clan_name) AS clan, (ally_name) AS ally FROM clan_data WHERE hasCastle = ?');
				}else{
					$records = $this->gameConn->prepare('SELECT (cs.name) AS clan, (SELECT (SELECT ally_name FROM ally_data WHERE ally_id = cd.ally_id) FROM clan_data AS cd WHERE cd.clan_id = cs.clan_id) AS ally FROM clan_subpledges AS cs WHERE (SELECT clan_id FROM clan_data WHERE hasCastle = ? AND clan_id = cs.clan_id) = cs.clan_id AND cs.type = "0"');
				}
			}else{
				$records = $this->gameConn->prepare('SELECT (p.name) AS clan, (SELECT name FROM Alliance WHERE master_pledge_id = p.pledge_id) AS ally FROM Pledge AS p WHERE p.castle_id = ?');
			}
			$records->execute([$casteloID]);
			while ($row = $records->fetchObject()) {
				$ClanDono = $row->clan;
				$AllyDono = $row->ally;
			}
			$ClanDono = empty($ClanDono) ? "Unowned" : $ClanDono;
			$AllyDono = empty($AllyDono) ? "n/a" : $AllyDono;
			return $ClanDono.";".$AllyDono;
		}
		
		private function getCastleLeader($castleID){
			if($this->db_type){
				$charid_characters = $this->info_table("characters","charid");
				if($this->L2jVersaoRussa)
					$char = $this->gameConn->prepare("SELECT (SELECT char_name FROM characters WHERE ".$charid_characters." = cs.leader_id) AS leader FROM clan_subpledges AS cs WHERE cs.clan_id = (SELECT clan_id FROM clan_data WHERE hasCastle = ? AND clan_id = cs.clan_id) AND cs.type = '0'");
				else
					$char = $this->gameConn->prepare("SELECT (SELECT char_name FROM characters WHERE ".$charid_characters." = cd.leader_id) AS leader FROM clan_data AS cd WHERE cd.hasCastle = ?");
			}else{
				$char = $this->gameConn->prepare("SELECT (SELECT char_name FROM user_data WHERE char_id = cd.ruler_id) AS leader FROM Pledge AS cd WHERE cd.castle_id = ?");
			}
			$char->execute([$castleID]);
			$results = $char->fetch();
			if($results){
				return $results["leader"];
			}else{
				return "Unknown";
			}
		}
		
		public function Bosses($type = true){
			$rank = array();
			if($this->ENABLE_BOSS_STATUS){
				if($this->db_type){
					if(!$this->L2jVersaoRussa){
						$bossTable = $type ? "grandboss_data" : "raidboss_spawnlist";
						if($this->L2jVersaoAcis){
							$npcsfile = simplexml_load_file('engine/xml/bosses_acis.xml');
							$Bosses = $this->gameConn->query('SELECT boss_id,respawn_time FROM '.$bossTable.' WHERE boss_id != 29177 AND boss_id != 29178 AND boss_id != 29179 AND boss_id != 29046 AND boss_id != 29047 AND boss_id != 29066 AND boss_id != 29067 AND boss_id != 29068 ORDER BY respawn_time ASC');
							foreach ($Bosses as $row) {
								$morto = null;
								if(($row["boss_id"] == 29019 && ($row["respawn_time"] / 1000) < time()) || ($row["boss_id"] == 29045 && ($row["respawn_time"] / 1000) < time())){
									$bossId = array(29019 => array(29066,29067,29068), 29045 => array(29046,29047));
									for($x=0;$x<count($bossId[$row["boss_id"]]);$x++){
										$BossRepeat = $this->gameConn->prepare('SELECT respawn_time FROM '.$bossTable.' WHERE boss_id = '.$bossId[$row["boss_id"]][$x]);
										$BossRepeat->execute();
										if($BossRepeat->rowCount() == 1){
											while ($row2 = $BossRepeat->fetchObject()) {
												if(($row2->respawn_time / 1000) > time()){
													$morto .= $row2->respawn_time;
												}
											}
										}
									}
								}
								$respawn_time = !empty($morto) ? $morto : $row["respawn_time"];
								if(($respawn_time / 1000) > time()){
									$respawn = "<span style='font-size:11px;'>".date('d/m/Y H:i:s',($respawn_time / 1000))."</span>";
									$status = "<span style='color:#F00;font-weight:bold;'>Morto</span>";
								}else{
									$status = "<span style='color:#3CB371;font-weight:bold;'>Alive</span>";
									$respawn = "Available";
								}
								foreach ($npcsfile->xpath('//npc[@id='.$row["boss_id"].']') as $npc) {
									$boss_name = $this->filter($npc["name"], true);
								}
								foreach ($npcsfile->xpath('//npc[@id='.$row["boss_id"].']/set[@name="level"]') as $npc) {
									$boss_level = $npc["val"];
								}
								foreach ($npcsfile->xpath('//npc[@id='.$row["boss_id"].']/set[@name="type"]') as $npc) {
									$boss_type = $npc["val"];
								}
								if(($type && $boss_type == "L2GrandBoss" && !empty($boss_name)) || (!$type && $boss_type == "L2RaidBoss" && !empty($boss_name)))
									array_push($rank, array("bossName" => $boss_name, "bossLevel" => $boss_level, "bossStatus" => $status, "bossRespawn" => $respawn));
							}
						}elseif($this->L2jVersaoClassic){
							$bossTable = $type ? "grandboss_data" : "npc_respawns";
							if($bossTable == "grandboss_data"){
								$Bosses = 'SELECT b.*, (SELECT name FROM icp_npc WHERE id = b.boss_id) AS bossname, (SELECT level FROM icp_npc WHERE id = b.boss_id) AS bosslevel FROM '.$bossTable.' AS b WHERE b.boss_id != 29177 AND b.boss_id != 29178 AND b.boss_id != 29179 AND b.boss_id != 29046 AND b.boss_id != 29047 AND b.boss_id != 29066 AND b.boss_id != 29067 AND b.boss_id != 29068 ORDER BY bossname ASC';
								foreach ($this->gameConn->query($Bosses) as $row) {
									$morto = null;
									if(($row["boss_id"] == 29019 && ($row["respawn_time"] / 1000) < time()) || ($row["boss_id"] == 29045 && ($row["respawn_time"] / 1000) < time()) || ($row["boss_id"] == 29180 && ($row["respawn_time"] / 1000) < time())){
										$bossId = array(29019 => array(29066,29067,29068), 29045 => array(29046,29047), 29180 => array(29177,29178,29179));
										for($x=0;$x<=count($bossId[$row["boss_id"]]);$x++){
											$BossRepeat = $this->gameConn->prepare('SELECT respawn_time FROM '.$bossTable.' WHERE boss_id = '.$bossId[$row["boss_id"]][$x]);
											$BossRepeat->execute();
											if($BossRepeat->rowCount() == 1){
												while ($row2 = $BossRepeat->fetchObject()) {
													if(($row2->respawn_time / 1000) > time()){
														$morto .= $row2->respawn_time;
													}
												}
											}
										}
									}
									$respawn_time = !empty($morto) ? $morto : $row["respawn_time"];
									if(($row["respawn_time"] / 1000) > time()){
										$respawn = "<span style='font-size:11px;'>".date('d/m/Y H:i:s',($respawn_time / 1000))."</span>";
										$status = "<span style='color:#F00;font-weight:bold;'>Morto</span>";
									}else{
										$status = "<span style='color:#3CB371;font-weight:bold;'>Alive</span>";
										$respawn = "Available";
									}
									array_push($rank, array("bossName" => $row["bossname"], "bossLevel" => $row["bosslevel"], "bossStatus" => $status, "bossRespawn" => $respawn));
								}
							}else{
								$Bosses = 'SELECT b.*, (SELECT name FROM icp_npc WHERE id = b.id) AS bossname, (SELECT level FROM icp_npc WHERE id = b.id) AS bosslevel FROM '.$bossTable.' AS b WHERE b.id != 29177 AND b.id != 29178 AND b.id != 29179 AND b.id != 29046 AND b.id != 29047 AND b.id != 29066 AND b.id != 29067 AND b.id != 29068 ORDER BY bossname ASC';
								foreach ($this->gameConn->query($Bosses) as $row) {
									$morto = null;
									if(($row["id"] == 29019 && ($row["respawnTime"] / 1000) < time()) || ($row["id"] == 29045 && ($row["respawnTime"] / 1000) < time()) || ($row["id"] == 29180 && ($row["respawnTime"] / 1000) < time())){
										$bossId = array(29019 => array(29066,29067,29068), 29045 => array(29046,29047), 29180 => array(29177,29178,29179));
										for($x=0;$x<=count($bossId[$row["id"]]);$x++){
											$BossRepeat = $this->gameConn->prepare('SELECT respawnTime FROM '.$bossTable.' WHERE id = '.$bossId[$row["id"]][$x]);
											$BossRepeat->execute();
											if($BossRepeat->rowCount() == 1){
												while ($row2 = $BossRepeat->fetchObject()) {
													if(($row2->respawnTime / 1000) > time()){
														$morto .= $row2->respawnTime;
													}
												}
											}
										}
									}
									$respawn_time = !empty($morto) ? $morto : $row["respawnTime"];
									if(($row["respawnTime"] / 1000) > time()){
										$respawn = "<span style='font-size:11px;'>".date('d/m/Y H:i:s',($respawn_time / 1000))."</span>";
										$status = "<span style='color:#F00;font-weight:bold;'>Morto</span>";
									}else{
										$status = "<span style='color:#3CB371;font-weight:bold;'>Alive</span>";
										$respawn = "Available";
									}
									array_push($rank, array("bossName" => $row["bossname"], "bossLevel" => $row["bosslevel"], "bossStatus" => $status, "bossRespawn" => $respawn));
								}
							}
						}else{
							$Bosses = $this->gameConn->prepare('SELECT b.*, (SELECT name FROM icp_npc WHERE id = b.boss_id) AS bossname, (SELECT level FROM icp_npc WHERE id = b.boss_id) AS bosslevel FROM '.$bossTable.' AS b WHERE boss_id != 29177 AND boss_id != 29178 AND boss_id != 29179 AND boss_id != 29046 AND boss_id != 29047 AND boss_id != 29066 AND boss_id != 29067 AND boss_id != 29068 ORDER BY bossname ASC');
							$Bosses->execute();
							if($Bosses->rowCount() > 0){
								while ($row = $Bosses->fetchObject()) {
									$morto = null;
									if(($row->boss_id == 29019 && ($row->respawn_time / 1000) < time()) || ($row->boss_id == 29045 && ($row->respawn_time / 1000) < time()) || ($row->boss_id == 29180 && ($row->respawn_time / 1000) < time())){
										$bossId = array(29019 => array(29066,29067,29068), 29045 => array(29046,29047), 29180 => array(29177,29178,29179));
										for($x=0;$x<count($bossId[$row->boss_id]);$x++){
											$BossRepeat = $this->gameConn->prepare('SELECT respawn_time FROM '.$bossTable.' WHERE boss_id = '.$bossId[$row->boss_id][$x]);
											$BossRepeat->execute();
											if($BossRepeat->rowCount() == 1){
												while ($row2 = $BossRepeat->fetchObject()) {
													if(($row2->respawn_time / 1000) > time()){
														$morto .= $row2->respawn_time;
													}
												}
											}
										}
									}
									$respawn_time = !empty($morto) ? $morto : $row->respawn_time;
									if(($row->respawn_time / 1000) > time()){
										$respawn = "<span style='font-size:11px;'>".date('d/m/Y H:i:s',($respawn_time / 1000))."</span>";
										$status = "<span style='color:#F00;font-weight:bold;'>Morto</span>";
									}else{
										$status = "<span style='color:#3CB371;font-weight:bold;'>Alive</span>";
										$respawn = "Available";
									}
									array_push($rank, array("bossName" => $row->bossname, "bossLevel" => $row->bosslevel, "bossStatus" => $status, "bossRespawn" => $respawn));
								}
							}else{
								if($type){
									$Bosses = $this->gameConn->query('SELECT (b.bossId) AS boss_id, (b.respawnDate) AS respawn_time, (SELECT name FROM icp_npc WHERE id = b.bossId) AS bossname, (SELECT level FROM icp_npc WHERE id = b.bossId) AS bosslevel FROM grandboss_intervallist AS b WHERE bossId != 29177 AND bossId != 29178 AND bossId != 29179 AND bossId != 29046 AND bossId != 29047 AND bossId != 29066 AND bossId != 29067 AND bossId != 29068 ORDER BY bossname ASC');
								}else{
									$Bosses = $this->gameConn->query('SELECT b.*, (SELECT name FROM icp_npc WHERE id = b.boss_id) AS bossname, (SELECT level FROM icp_npc WHERE id = b.boss_id) AS bosslevel FROM raidboss_spawnlist AS b WHERE boss_id != 29177 AND boss_id != 29178 AND boss_id != 29179 AND boss_id != 29046 AND boss_id != 29047 AND boss_id != 29066 AND boss_id != 29067 AND boss_id != 29068 ORDER BY bossname ASC');
								}
								foreach ($Bosses as $row) {
									$morto = null;
									if(($row["boss_id"] == 29019 && ($row["respawn_time"] / 1000) < time()) || ($row["boss_id"] == 29045 && ($row["respawn_time"] / 1000) < time()) || ($row["boss_id"] == 29180 && ($row["respawn_time"] / 1000) < time())){
										$bossId = array(29019 => array(29066,29067,29068), 29045 => array(29046,29047), 29180 => array(29177,29178,29179));
										for($x=0;$x<=count($bossId[$row["boss_id"]]);$x++){
											if($type){
												$BossRepeat = $this->gameConn->prepare('SELECT (respawnDate) AS respawn_time FROM grandboss_intervallist WHERE bossId = '.$bossId[$row["boss_id"]][$x]);
											}else{
												$BossRepeat = $this->gameConn->prepare('SELECT respawn_time FROM raidboss_spawnlist WHERE boss_id = '.$bossId[$row["boss_id"]][$x]);
											}
											$BossRepeat->execute();
											if($BossRepeat->rowCount() == 1){
												while ($row2 = $BossRepeat->fetchObject()) {
													if(($row2->respawn_time / 1000) > time()){
														$morto .= $row2->respawn_time;
													}
												}
											}
										}
									}
									$respawn_time = !empty($morto) ? $morto : $row["respawn_time"];
									if(($row["respawn_time"] / 1000) > time()){
										$respawn = "<span style='font-size:11px;'>".date('d/m/Y H:i:s',($respawn_time / 1000))."</span>";
										$status = "<span style='color:#F00;font-weight:bold;'>Morto</span>";
									}else{
										$status = "<span style='color:#3CB371;font-weight:bold;'>Alive</span>";
										$respawn = "Available";
									}
									array_push($rank, array("bossName" => $row["bossname"], "bossLevel" => $row["bosslevel"], "bossStatus" => $status, "bossRespawn" => $respawn));
								}
							}
						}
					}else{
						if($this->chronicle == "Interlude" || $this->chronicle == "Classic")
							$npcsfile = simplexml_load_file('engine/xml/bosses_lucera.xml');
						else
							$npcsfile = simplexml_load_file('engine/xml/bosses_russo.xml');
						foreach($npcsfile->npc as $boss){
							if ($boss["id"] != "29177" AND $boss["id"] != "29178" AND $boss["id"] != "29179" AND $boss["id"] != "29046" AND $boss["id"] != "29047" AND $boss["id"] != "29066" AND $boss["id"] != "29067" AND $boss["id"] != "29068"){
								$Bosses = $this->gameConn->prepare('SELECT * FROM raidboss_status WHERE id = ?');
								$Bosses->execute([$boss["id"]]);
								if($Bosses->rowCount() > 0){
									while ($row = $Bosses->fetchObject()) {
										$morto = null;
										if(($boss["id"] == 29019 && ($row->respawn_delay / 1000) < time()) || ($boss["id"] == 29045 && ($row->respawn_delay / 1000) < time()) || ($boss["id"] == 29180 && ($row->respawn_delay / 1000) < time())){
											$bossId = array(29019 => array(29066,29067,29068), 29045 => array(29046,29047), 29180 => array(29177,29178,29179));
											for($x=0;$x<=count($bossId[$boss["id"]]);$x++){
												$BossRepeat = $this->gameConn->prepare('SELECT respawn_delay FROM raidboss_status WHERE id = '.$bossId[$boss["id"]][$x]);
												$BossRepeat->execute();
												if($BossRepeat->rowCount() == 1){
													while ($row2 = $BossRepeat->fetchObject()) {
														if(($row2->respawn_delay / 1000) > time()){
															$morto .= $row2->respawn_delay;
														}
													}
												}
											}
										}
										$respawn_time = !empty($morto) ? $morto : $row->respawn_delay;
										if(($respawn_time / 1000) > time()){
											$respawn = "<span style='font-size:11px;'>".date('d/m/Y H:i:s',($respawn_time / 1000))."</span>";
											$status = "<span style='color:#F00;font-weight:bold;'>Morto</span>";
										}else{
											$status = "<span style='color:#3CB371;font-weight:bold;'>Alive</span>";
											$respawn = "Available";
										}
									}
								}else{
									$status = "<span style='color:#3CB371;font-weight:bold;'>Alive</span>";
									$respawn = "Available";
								}
								if(($type && $boss["type"] == "BigBoss") || (!$type && $boss["type"] == "RaidBoss"))
									array_push($rank, array("bossName" => $this->filter($boss["name"], true), "bossLevel" => $boss["level"], "bossStatus" => $status, "bossRespawn" => $respawn));
							}
						}
					}
				}else{
					if($type){
						$Bosses = $this->gameConn->prepare("SELECT DISTINCT npc_db_name, alive, time_low FROM npc_boss WHERE npc_db_name LIKE 'Frintessa' OR npc_db_name LIKE 'Valakas' OR npc_db_name LIKE 'Zaken' OR npc_db_name LIKE 'Baium' OR npc_db_name LIKE 'queen_ant' OR npc_db_name LIKE 'High Priestess van Halter' OR npc_db_name LIKE 'Antharas' OR npc_db_name LIKE 'Benom' OR npc_db_name LIKE 'Orfen' OR npc_db_name LIKE 'Core' ORDER BY npc_db_name ASC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					}else{
						$Bosses = $this->gameConn->prepare("SELECT DISTINCT npc_db_name, alive, time_low FROM npc_boss WHERE npc_db_name NOT LIKE 'sentinel_guard_%' AND npc_db_name NOT LIKE '%ordery01' AND npc_db_name NOT LIKE '%_siege_%' AND npc_db_name NOT LIKE '%b02_%' AND npc_db_name NOT LIKE 'tbb%' AND npc_db_name NOT LIKE 'tbf%' AND npc_db_name NOT LIKE 'nurka%'  AND npc_db_name NOT LIKE 'devastated_%' AND npc_db_name NOT LIKE 'fortress_%' AND npc_db_name NOT LIKE 'Frintessa' AND npc_db_name NOT LIKE 'Valakas' AND npc_db_name NOT LIKE 'Zaken' AND npc_db_name NOT LIKE 'Baium' AND npc_db_name NOT LIKE 'queen_ant' AND npc_db_name NOT LIKE 'High Priestess van Halter' AND npc_db_name NOT LIKE 'Antharas' AND npc_db_name NOT LIKE 'antaras_max' AND npc_db_name NOT LIKE 'antaras_min' AND npc_db_name NOT LIKE 'antaras_normal' AND npc_db_name NOT LIKE 'Benom' AND npc_db_name NOT LIKE 'Orfen' AND npc_db_name NOT LIKE 'Core' ORDER BY npc_db_name ASC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					}
					$Bosses->execute();
					if($Bosses->rowCount() > 0){
						while ($row = $Bosses->fetchObject()) {
							if($row->time_low > strtotime(date('Y-m-d H:i:s'))){
								$respawn = "<span style='font-size:11px;'>".date('d/m/Y H:i:s',$row->time_low)."</span>";
								$status = "<span style='color:#F00;font-weight:bold;'>Morto</span>";
							}else{
								$status = "<span style='color:#3CB371;font-weight:bold;'>Alive</span>";
								$respawn = "Available";
							}
							array_push($rank, array("bossName" => ucwords(str_replace("_"," ",$row->npc_db_name)), "bossLevel" => "", "bossStatus" => $status, "bossRespawn" => $respawn));
						}
					}
				}
			}
			return $rank;
		}
		
		function rankRaidPoints($limit){
			$rank = array();
			if($this->ENABLE_TOP_RAID){
				if($this->db_type){
					if($limit > 0){
						$accesslevel_characters = $this->info_table("characters","accesslevel");
						$charid_characters = $this->info_table("characters","charid");
						if($this->L2jVersaoRussa){
							$charid_subclass = $this->info_table("character_subclasses","charid");
							$charid_raidpoints = $this->info_table("raidboss_points","charid");
							$records = $this->gameConn->prepare("SELECT c.*, (SELECT SUM(points) FROM raidboss_points WHERE ".$charid_raidpoints." = c.".$charid_characters.") AS raid_points, (SELECT class_id FROM character_subclasses WHERE ".$charid_subclass." = c.".$charid_characters." AND isBase = '1') AS base_class, IF((SELECT name FROM clan_subpledges WHERE clan_id = c.clanid AND type = '0') IS NULL, 'n/a', (SELECT name FROM clan_subpledges WHERE clan_id = c.clanid AND type = '0')) AS clan FROM characters AS c WHERE c.".$accesslevel_characters." = '0' ORDER BY raid_points DESC, char_name ASC LIMIT ".$limit);
						}elseif($this->L2jVersaoClassic){
							$records = $this->gameConn->prepare("SELECT c.*, (raidbossPoints) AS raid_points, IF((SELECT clan_name FROM clan_data WHERE clan_id = c.clanid) IS NULL, 'n/a', (SELECT clan_name FROM clan_data WHERE clan_id = c.clanid)) AS clan FROM characters AS c WHERE c.".$accesslevel_characters." = '0' ORDER BY raidbossPoints DESC, char_name ASC LIMIT ".$limit);
						}else{
							$charid_raidpoints = $this->info_table("character_raid_points","charid");
							$records = $this->gameConn->prepare("SELECT c.*, (SELECT SUM(points) FROM character_raid_points WHERE ".$charid_raidpoints." = c.".$charid_characters.") AS raid_points, IF((SELECT clan_name FROM clan_data WHERE clan_id = c.clanid) IS NULL, 'n/a', (SELECT clan_name FROM clan_data WHERE clan_id = c.clanid)) AS clan FROM characters AS c WHERE c.".$accesslevel_characters." = '0' ORDER BY raid_points DESC, char_name ASC LIMIT ".$limit);
						}
						$records->execute();
						if($records->rowCount() > 0){
							$y=1;
							while ($row = $records->fetchObject()) {
								array_push($rank, array("RPointsPosition" => $y, "RPointsName" => $row->char_name, "RPointsClass" => $this->classe_name($row->base_class), "RPointsClan" => $row->clan, "RPointsCount" => number_format($row->raid_points,0,".",".")));
								$y++;
							}
						}
						if($limit > 0){
							if($records->rowCount() < $limit){
								for($x=1;$x<=($limit - $records->rowCount());$x++){
									array_push($rank, array("RPointsPosition" => $x, "RPointsName" => "-", "RPointsClass" => "-", "RPointsClan" => "-", "RPointsCount" => "-"));
								}
							}
						}
					}else{
						if($limit > 0){
							for($x=1;$x<=$limit;$x++){
								array_push($rank, array("RPointsPosition" => $x, "RPointsName" => "-", "RPointsClass" => "-", "RPointsClan" => "-", "RPointsCount" => "-"));
							}
						}
					}
				}else{
					// L2OFF SCRIPTS
				}
			}else{
				if($limit > 0){
					for($x=1;$x<=$limit;$x++){
						array_push($rank, array("RPointsPosition" => $x, "RPointsName" => "-", "RPointsClass" => "-", "RPointsClan" => "-", "RPointsCount" => "-"));
					}
				}
			}
			return $rank;
		}
		
		public function topOly() {
			$rank = array();
			if($this->ENABLE_TOP_OLY){
				if($this->db_type){
					$charid_oly = $this->info_table("olympiad_nobles","charid");
					$charid_characters = $this->info_table("characters","charid");
					$accesslevel_characters = $this->info_table("characters","accesslevel");
					if($this->L2jVersaoRussa){
						$records = $this->gameConn->prepare("SELECT o.*, (SELECT char_name FROM characters WHERE ".$charid_characters." = o.".$charid_oly.") AS char_name, IF((SELECT name FROM clan_subpledges WHERE clan_id = (SELECT clanid FROM characters WHERE ".$charid_characters." = o.".$charid_oly.") AND type = '0') IS NULL, 'n/a', (SELECT name FROM clan_subpledges WHERE clan_id = (SELECT clanid FROM characters WHERE ".$charid_characters." = o.".$charid_oly.") AND type = '0')) AS clan FROM olympiad_nobles AS o WHERE (SELECT ".$accesslevel_characters." FROM characters WHERE ".$charid_characters." = o.".$charid_oly.") = '0' AND o.competitions_done > '8' ORDER BY o.class_id ASC, o.olympiad_points DESC, o.competitions_done ASC, char_name ASC");
					}else{
						$records = $this->gameConn->prepare("SELECT o.*, (SELECT char_name FROM characters WHERE ".$charid_characters." = o.".$charid_oly.") AS char_name, IF((SELECT clan_name FROM clan_data WHERE clan_id = (SELECT clanid FROM characters WHERE ".$charid_characters." = o.".$charid_oly.")) IS NULL, 'n/a', (SELECT clan_name FROM clan_data WHERE clan_id = (SELECT clanid FROM characters WHERE ".$charid_characters." = o.".$charid_oly."))) AS clan FROM olympiad_nobles AS o WHERE (SELECT ".$accesslevel_characters." FROM characters WHERE ".$charid_characters." = o.".$charid_oly.") = '0' AND o.competitions_done > '8' ORDER BY o.class_id ASC, o.olympiad_points DESC, o.competitions_done ASC, char_name ASC");
					}
				}else{
					$records = $this->gameConn->prepare("SELECT u.char_name, (u.subjob0_class) AS class_id, oly.point as olympiad_points, oly.match_count AS competitions_done, cl.name as clan FROM olympiad_result AS oly INNER JOIN user_data AS u on u.char_id=oly.char_id LEFT JOIN pledge AS cl ON u.pledge_id = cl.pledge_id OR cl.pledge_id IS NULL ORDER BY class_id ASC, olympiad_points DESC, competitions_done ASC, u.char_name ASC");
				}
				$records->execute();
				if($records->rowCount() > 0){
					$y = 1;
					$z = 1;
					$classId = 1;
					while ($row = $records->fetchObject()) {
						$y = $classId == $row->class_id ? $y : 1;
						array_push($rank, array("olyCssPosition" => $z, "olyPosition" => $y, "olyName" => $row->char_name, "olyClan" => $row->clan, "olyPoints" => number_format($row->olympiad_points,0,".","."), "olyFights" => number_format($row->competitions_done,0,".","."), "olyClass" => $this->classe_name($row->class_id)));
						$classId = $row->class_id;
						$y++;
						$z++;
					}
				}
			}
			return $rank;
		}
		
		public function topHero($limit){
			$rank = array();
			if($this->ENABLE_TOP_HERO){
				if($this->db_type){
					$charid_heroes = $this->info_table("heroes","charid");
					$charid_characters = $this->info_table("characters","charid");
					$accesslevel_characters = $this->info_table("characters","accesslevel");
					if($this->L2jVersaoRussa){
						$charid_subclass = $this->info_table("character_subclasses","charid");
						if($limit > 0){
							$records = $this->gameConn->prepare("SELECT h.count, (SELECT class_id FROM character_subclasses WHERE ".$charid_subclass." = h.".$charid_heroes." AND isBase = '1') AS base, (SELECT char_name FROM characters WHERE ".$charid_characters." = h.".$charid_heroes.") AS char_name, IF((SELECT name FROM clan_subpledges WHERE clan_id = (SELECT clanid FROM characters WHERE ".$charid_characters." = h.".$charid_heroes.") AND type = '0') IS NULL, 'n/a', (SELECT name FROM clan_subpledges WHERE clan_id = (SELECT clanid FROM characters WHERE ".$charid_characters." = h.".$charid_heroes.") AND type = '0')) AS clan, IF((SELECT ally_name FROM ally_data WHERE ally_id = (SELECT ally_id FROM clan_data WHERE clan_id = (SELECT clanid FROM characters WHERE ".$charid_characters." = h.".$charid_heroes."))) IS NULL, 'n/a', (SELECT ally_name FROM ally_data WHERE ally_id = (SELECT ally_id FROM clan_data WHERE clan_id = (SELECT clanid FROM characters WHERE ".$charid_characters." = h.".$charid_heroes.")))) AS ally FROM heroes AS h WHERE (SELECT ".$accesslevel_characters." FROM characters WHERE ".$charid_characters." = h.".$charid_heroes.") = '0' ORDER BY h.count DESC, char_name ASC LIMIT ".$limit);
						}else{
							$records = $this->gameConn->prepare("SELECT h.count, (SELECT class_id FROM character_subclasses WHERE ".$charid_subclass." = h.".$charid_heroes." AND isBase = '1') AS base, (SELECT char_name FROM characters WHERE ".$charid_characters." = h.".$charid_heroes.") AS char_name, IF((SELECT name FROM clan_subpledges WHERE clan_id = (SELECT clanid FROM characters WHERE ".$charid_characters." = h.".$charid_heroes.") AND type = '0') IS NULL, 'n/a', (SELECT name FROM clan_subpledges WHERE clan_id = (SELECT clanid FROM characters WHERE ".$charid_characters." = h.".$charid_heroes.") AND type = '0')) AS clan, IF((SELECT ally_name FROM ally_data WHERE ally_id = (SELECT ally_id FROM clan_data WHERE clan_id = (SELECT clanid FROM characters WHERE ".$charid_characters." = h.".$charid_heroes."))) IS NULL, 'n/a', (SELECT ally_name FROM ally_data WHERE ally_id = (SELECT ally_id FROM clan_data WHERE clan_id = (SELECT clanid FROM characters WHERE ".$charid_characters." = h.".$charid_heroes.")))) AS ally FROM heroes AS h WHERE h.played='1' AND (SELECT ".$accesslevel_characters." FROM characters WHERE ".$charid_characters." = h.".$charid_heroes.") = '0' ORDER BY h.count DESC, char_name ASC");
						}
					}else{
						if($limit > 0){
							$records = $this->gameConn->prepare("SELECT h.count, (SELECT base_class FROM characters WHERE ".$charid_characters." = h.".$charid_heroes.") AS base, (SELECT char_name FROM characters WHERE ".$charid_characters." = h.".$charid_heroes.") AS char_name, IF((SELECT clan_name FROM clan_data WHERE clan_id = (SELECT clanid FROM characters WHERE ".$charid_characters." = h.".$charid_heroes.")) IS NULL, 'n/a', (SELECT clan_name FROM clan_data WHERE clan_id = (SELECT clanid FROM characters WHERE ".$charid_characters." = h.".$charid_heroes."))) AS clan, IF((SELECT ally_name FROM clan_data WHERE clan_id = (SELECT clanid FROM characters WHERE ".$charid_characters." = h.".$charid_heroes.")) IS NULL, 'n/a', (SELECT ally_name FROM clan_data WHERE clan_id = (SELECT clanid FROM characters WHERE ".$charid_characters." = h.".$charid_heroes."))) AS ally FROM heroes AS h WHERE (SELECT ".$accesslevel_characters." FROM characters WHERE ".$charid_characters." = h.".$charid_heroes.") = '0' ORDER BY h.count DESC, char_name ASC LIMIT ".$limit);
						}else{
							$records = $this->gameConn->prepare("SELECT h.count, (SELECT base_class FROM characters WHERE ".$charid_characters." = h.".$charid_heroes.") AS base, (SELECT char_name FROM characters WHERE ".$charid_characters." = h.".$charid_heroes.") AS char_name, IF((SELECT clan_name FROM clan_data WHERE clan_id = (SELECT clanid FROM characters WHERE ".$charid_characters." = h.".$charid_heroes.")) IS NULL, 'n/a', (SELECT clan_name FROM clan_data WHERE clan_id = (SELECT clanid FROM characters WHERE ".$charid_characters." = h.".$charid_heroes."))) AS clan, IF((SELECT ally_name FROM clan_data WHERE clan_id = (SELECT clanid FROM characters WHERE ".$charid_characters." = h.".$charid_heroes.")) IS NULL, 'n/a', (SELECT ally_name FROM clan_data WHERE clan_id = (SELECT clanid FROM characters WHERE ".$charid_characters." = h.".$charid_heroes."))) AS ally FROM heroes AS h WHERE h.played='1' AND (SELECT ".$accesslevel_characters." FROM characters WHERE ".$charid_characters." = h.".$charid_heroes.") = '0' ORDER BY base ASC");
						}
					}
				}else{
					if($limit > 0){
						$records = $this->gameConn->prepare("SELECT TOP ".$limit." c.char_name, c.subjob0_class, cl.name as clan, h.win_count as count, (SELECT name FROM Alliance WHERE id = c.pledge_id) AS ally FROM user_data AS c LEFT JOIN user_nobless AS h ON c.char_id = h.char_id LEFT JOIN pledge AS cl ON c.pledge_id = cl.pledge_id OR cl.pledge_id IS NULL WHERE h.hero_type in (1,2) AND c.builder='0' ORDER BY count DESC, c.char_name ASC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					}else{
						$records = $this->gameConn->prepare("SELECT c.char_name, c.subjob0_class, cl.name as clan, h.win_count as count, (SELECT name FROM Alliance WHERE id = c.pledge_id) AS ally FROM user_data AS c LEFT JOIN user_nobless AS h ON c.char_id = h.char_id LEFT JOIN pledge AS cl ON c.pledge_id = cl.pledge_id OR cl.pledge_id IS NULL WHERE h.hero_type in (1,2) AND c.builder='0' ORDER BY c.subjob0_class ASC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					}
				}
				$records->execute();
				if($records->rowCount() > 0){
					$y=1;
					while ($row = $records->fetchObject()) {
						array_push($rank, array("heroPosition" => $y, "heroName" => $row->char_name, "heroClan" => $row->clan, "heroAlly" => $row->ally, "heroClass" => $this->classe_name($row->base), "heroCount" => number_format($row->count,0,".",".")));
						$y++;
					}
					if($limit > 0){
						if($records->rowCount() < $limit){
							for($x=1;$x<=($limit - $records->rowCount());$x++){
								array_push($rank, array("heroPosition" => $records->rowCount()+$x, "heroName" => "-", "heroClan" => "-", "heroAlly" => "-", "heroClass" => "-", "heroCount" => "-"));
							}
						}
					}
				}else{
					if($limit > 0){
						for($x=1;$x<=$limit;$x++){
							array_push($rank, array("heroPosition" => $x, "heroName" => "-", "heroClan" => "-", "heroAlly" => "-", "heroClass" => "-", "heroCount" => "-"));
						}
					}
				}
			}else{
				if($limit > 0){
					for($x=1;$x<=$limit;$x++){
						array_push($rank, array("heroPosition" => $x, "heroName" => "-", "heroClan" => "-", "heroAlly" => "-", "heroClass" => "-", "heroCount" => "-"));
					}
				}
			}
			return $rank;
		}
		
		public function topClan($limit,$topPvp=false){
			$rank = array();
			if($limit > 0){
				if($this->ENABLE_TOP_CLAN){
					if($this->db_type){
						$accesslevel_characters = $this->info_table("characters","accesslevel");
						$charid_characters = $this->info_table("characters","charid");
						$order = $topPvp ? "toppvp DESC, c.clan_level DESC, clan_name ASC" : "c.clan_level DESC, c.reputation_score DESC, clan_name ASC";
						if($this->L2jVersaoRussa){
							$records = $this->gameConn->prepare("SELECT c.clan_level, c.reputation_score, (SELECT name FROM clan_subpledges WHERE clan_id = c.clan_id AND type='0') AS clan_name, IF((SELECT ally_name FROM ally_data WHERE ally_id = c.ally_id) IS NULL, 'n/a', (SELECT ally_name FROM ally_data WHERE ally_id = c.ally_id)) AS ally_name, (SELECT (SELECT char_name FROM characters WHERE ".$charid_characters." = cs.leader_id) AS leadername FROM clan_subpledges AS cs WHERE cs.clan_id = c.clan_id AND type = '0') AS leader, (SELECT SUM(pvpkills) FROM characters WHERE clanid = c.clan_id) AS toppvp FROM clan_data AS c WHERE (SELECT (SELECT ".$accesslevel_characters." FROM characters WHERE ".$charid_characters." = cs.leader_id) AS accesslvl FROM clan_subpledges AS cs WHERE cs.clan_id = c.clan_id AND type = '0') = '0' ORDER BY ".$order." LIMIT ".$limit);
						}else{
							$records = $this->gameConn->prepare("SELECT c.clan_name, c.clan_level, c.reputation_score, IF((c.ally_name) IS NULL, 'n/a', (c.ally_name)) AS ally_name, (SELECT char_name FROM characters WHERE ".$charid_characters." = c.leader_id) AS leader, (SELECT SUM(pvpkills) FROM characters WHERE clanid = c.clan_id) AS toppvp FROM clan_data AS c WHERE (SELECT ".$accesslevel_characters." FROM characters WHERE ".$charid_characters." = c.leader_id) = '0' ORDER BY ".$order." LIMIT ".$limit);
						}
					}else{
						$order = $topPvp ? "toppvp DESC, c.skill_level DESC, c.name ASC" : "c.skill_level DESC, reputation_score DESC, c.name ASC";
						$records = $this->gameConn->prepare("SELECT TOP ".$limit." (c.name) AS clan_name, (c.skill_level) AS clan_level, (SELECT reputation_points FROM pledge_ext WHERE pledge_id = c.pledge_id) AS reputation_score, CASE WHEN c.alliance_id > '0' THEN (SELECT name FROM Alliance WHERE pledge_id = c.pledge_id) ELSE 'n/a' END AS ally_name, (SELECT char_name FROM user_data WHERE char_id = c.ruler_id) AS leader, (SELECT SUM(DUEL) FROM user_data WHERE pledge_id = c.pledge_id) AS toppvp FROM Pledge AS c WHERE (SELECT builder FROM user_data WHERE char_id = c.ruler_id) = '0' ORDER BY ".$order, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					}
					$records->execute();
					if($records->rowCount() > 0){
						$y=1;
						while ($row = $records->fetchObject()) {
							array_push($rank, array("clanPosition" => $y, "clanName" => $row->clan_name, "clanLevel" => $row->clan_level, "clanReputation" => number_format($row->reputation_score,0,'.','.'), "clanAllyance" => $row->ally_name, "clanLeader" => $row->leader, "clanPvps" => $row->toppvp));
							$y++;
						}
						if($records->rowCount() < $limit){
							for($x=1;$x<=($limit - $records->rowCount());$x++){
								array_push($rank, array("clanPosition" => $records->rowCount()+$x, "clanName" => "-", "clanLevel" => "-", "clanReputation" => "-", "clanAllyance" => "-", "clanLeader" => "-", "clanPvps" => "-"));
							}
						}
					}else{
						for($x=1;$x<=$limit;$x++){
							array_push($rank, array("clanPosition" => $x, "clanName" => "-", "clanLevel" => "-", "clanReputation" => "-", "clanAllyance" => "-", "clanLeader" => "-", "clanPvps" => "-"));
						}
					}
				}else{
					for($x=1;$x<=$limit;$x++){
						array_push($rank, array("clanPosition" => $x, "clanName" => "-", "clanLevel" => "-", "clanReputation" => "-", "clanAllyance" => "-", "clanLeader" => "-", "clanPvps" => "-"));
					}
				}
			}
			return $rank;
		}
		
		public function topOnline($limit){
			$rank = array();
			if($limit > 0){
				if($this->ENABLE_TOP_ONLINE){
					if($this->db_type){
						$accesslevel_characters = $this->info_table("characters","accesslevel");
						if($this->L2jVersaoRussa){
							$records = $this->gameConn->prepare("SELECT c.char_name, c.onlinetime, IF((SELECT name FROM clan_subpledges WHERE clan_id = c.clanid AND type = '0') IS NULL, 'n/a', (SELECT name FROM clan_subpledges WHERE clan_id = c.clanid AND type = '0')) AS clan FROM characters AS c WHERE c.".$accesslevel_characters." = '0' AND c.onlinetime > '0' ORDER BY c.onlinetime DESC, c.char_name ASC LIMIT ".$limit);
						}else{
							$records = $this->gameConn->prepare("SELECT c.char_name, c.onlinetime, IF((SELECT clan_name FROM clan_data WHERE clan_id = c.clanid) IS NULL, 'n/a', (SELECT clan_name FROM clan_data WHERE clan_id = c.clanid)) AS clan FROM characters AS c WHERE c.".$accesslevel_characters." = '0' AND c.onlinetime > '0' ORDER BY c.onlinetime DESC, c.char_name ASC LIMIT ".$limit);
						}
					}else{
						$records = $this->gameConn->prepare("SELECT TOP ".$limit." c.char_name, (c.use_time) AS onlinetime, CASE WHEN c.pledge_id > '0' THEN (SELECT name FROM Pledge WHERE pledge_id = c.pledge_id) ELSE 'n/a' END AS clan FROM user_data AS c WHERE c.builder = '0' AND c.use_time > '0' ORDER BY c.use_time DESC, c.char_name ASC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					}
					$records->execute();
					if($records->rowCount() > 0){
						$y=1;
						while ($row = $records->fetchObject()) {
							array_push($rank, array("onlinePosition" => $y, "onlineName" => $row->char_name, "onlineClan" => $row->clan, "onlineTime" => $this->remainingTime($row->onlinetime,true)));
							$y++;
						}
						if($records->rowCount() < $limit){
							for($x=1;$x<=($limit - $records->rowCount());$x++){
								array_push($rank, array("onlinePosition" => $records->rowCount()+$x, "onlineName" => "-", "onlineClan" => "-", "onlineTime" => "-"));
							}
						}
					}else{
						for($x=1;$x<=$limit;$x++){
							array_push($rank, array("onlinePosition" => $x, "onlineName" => "-", "onlineClan" => "-", "onlineTime" => "-"));
						}
					}
				}else{
					for($x=1;$x<=$limit;$x++){
						array_push($rank, array("onlinePosition" => $x, "onlineName" => "-", "onlineClan" => "-", "onlineTime" => "-"));
					}
				}
			}
			return $rank;
		}
		
		public function topAdena($limit){
			$rank = array();
			if($limit > 0){
				if($this->ENABLE_TOP_ADENA){
					ini_set('max_execution_time', 0);
					$topAdena = array();
					if($this->db_type){
						$accesslevel_characters = $this->info_table("characters","accesslevel");
						$charid_characters = $this->info_table("characters","charid");
						if($this->L2jVersaoRussa && $this->chronicle == "Interlude")
							$records = $this->gameConn->prepare("SELECT c.char_name, CASE WHEN (SELECT SUM(amount) FROM items WHERE owner_id = c.".$charid_characters." AND item_type = '3470') > '0' THEN (SELECT SUM(amount) FROM items WHERE owner_id = c.".$charid_characters." AND item_type = '3470') ELSE '0' END AS gold_bar, CASE WHEN (SELECT SUM(amount) FROM items WHERE owner_id = c.".$charid_characters." AND item_type = '57' AND location = 'INVENTORY') > '0' THEN (SELECT SUM(amount) FROM items WHERE owner_id = c.".$charid_characters." AND item_type = '57' AND location = 'INVENTORY') ELSE '0' END AS adena_inv, CASE WHEN (SELECT SUM(amount) FROM items WHERE owner_id = c.".$charid_characters." AND item_type = '57' AND location = 'WAREHOUSE') > '0' THEN (SELECT SUM(amount) FROM items WHERE owner_id = c.".$charid_characters." AND item_type = '57' AND location = 'WAREHOUSE') ELSE '0' END AS adena_war FROM characters AS c WHERE c.".$accesslevel_characters." = '0' ORDER BY gold_bar DESC, adena_inv DESC, adena_war DESC LIMIT ".$limit);
						else
							$records = $this->gameConn->prepare("SELECT c.char_name, CASE WHEN (SELECT SUM(count) FROM items WHERE owner_id = c.".$charid_characters." AND item_id = '3470') > '0' THEN (SELECT SUM(count) FROM items WHERE owner_id = c.".$charid_characters." AND item_id = '3470') ELSE '0' END AS gold_bar, CASE WHEN (SELECT SUM(count) FROM items WHERE owner_id = c.".$charid_characters." AND item_id = '57' AND loc = 'INVENTORY') > '0' THEN (SELECT SUM(count) FROM items WHERE owner_id = c.".$charid_characters." AND item_id = '57' AND loc = 'INVENTORY') ELSE '0' END AS adena_inv, CASE WHEN (SELECT SUM(count) FROM items WHERE owner_id = c.".$charid_characters." AND item_id = '57' AND loc = 'WAREHOUSE') > '0' THEN (SELECT SUM(count) FROM items WHERE owner_id = c.".$charid_characters." AND item_id = '57' AND loc = 'WAREHOUSE') ELSE '0' END AS adena_war FROM characters AS c WHERE c.".$accesslevel_characters." = '0' ORDER BY gold_bar DESC, adena_inv DESC, adena_war DESC LIMIT ".$limit);
					}else{
						$records = $this->gameConn->prepare("SELECT TOP ".$limit." c.char_name, CASE WHEN (SELECT SUM(amount) FROM user_item WHERE char_id = c.char_id AND item_type = '3470') > '0' THEN (SELECT SUM(amount) FROM user_item WHERE char_id = c.char_id AND item_type = '3470') ELSE '0' END AS gold_bar, CASE WHEN (SELECT SUM(amount) FROM user_item WHERE char_id = c.char_id AND item_type = '57' AND warehouse = '0') > '0' THEN (SELECT SUM(amount) FROM user_item WHERE char_id = c.char_id AND item_type = '57' AND warehouse = '0') ELSE '0' END AS adena_inv, CASE WHEN (SELECT SUM(amount) FROM user_item WHERE char_id = c.char_id AND item_type = '57' AND warehouse = '1') > '0' THEN (SELECT SUM(amount) FROM user_item WHERE char_id = c.char_id AND item_type = '57' AND warehouse = '1') ELSE '0' END AS adena_war FROM user_data AS c WHERE c.builder = '0' ORDER BY gold_bar DESC, adena_inv DESC, adena_war DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					}
					$records->execute();
					if($records->rowCount() > 0){
						while ($row = $records->fetchObject()) {
							$adenas = $row->adena_inv + $row->adena_war;
							$adenaTotal = ($row->gold_bar * $this->goldbar) + $adenas;
							array_push($topAdena, array('name' => $row->char_name, 'adena' => $adenas, 'gb' => $row->gold_bar, 'totaladena' => $adenaTotal));
						}
					}
					foreach ($topAdena as $key => $rows) {
						$name[$key]  = $rows['name'];
						$adena[$key] = $rows['adena'];
						$gb[$key] = $rows['gb'];
						$totaladena[$key] = $rows['totaladena'];
					}
					array_multisort($totaladena, SORT_DESC, $name, SORT_ASC, $topAdena);
					for($y=0;$y<count($topAdena);$y++){
						array_push($rank, array("adenaPosition" => $y+1, "adenaName" => $topAdena[$y]["name"], "adenaCount" => number_format($topAdena[$y]["adena"],0,".","."), "adenaGoldbar" => number_format($topAdena[$y]["gb"],0,".","."), "adenaTotal" => number_format($topAdena[$y]["totaladena"],0,".",".")));
					}
					if($records->rowCount() < $limit){
						for($x=1;$x<=($limit - $records->rowCount());$x++){
							array_push($rank, array("adenaPosition" => $records->rowCount()+$x, "adenaName" => "-", "adenaCount" => "-", "adenaGoldbar" => "-", "adenaTotal" => "-"));
						}
					}
				}else{
					for($x=1;$x<=$limit;$x++){
						array_push($rank, array("adenaPosition" => $x, "adenaName" => "-", "adenaCount" => "-", "adenaGoldbar" => "-", "adenaTotal" => "-"));
					}
				}
			}
			return $rank;
		}
		
		function rankClanHall(){
			$rank = array();
			if($this->ENABLE_TOP_CLAN_HALLS){
				if($this->db_type){
					if($this->L2jVersaoRussa){
						$records = $this->gameConn->prepare("SELECT ch.id, IF((SELECT (SELECT name FROM clan_subpledges WHERE clan_id = cd.clan_id AND type='0') AS cname FROM clan_data AS cd WHERE cd.hasHideout = ch.id) IS NULL, '-', (SELECT (SELECT name FROM clan_subpledges WHERE clan_id = cd.clan_id AND type='0') AS cname FROM clan_data AS cd WHERE cd.hasHideout = ch.id)) AS clan_name, IF((SELECT (SELECT ally_name FROM ally_data WHERE ally_id = cd.ally_id) AS aname FROM clan_data AS cd WHERE cd.hasHideout = ch.id) IS NULL, '-', (SELECT (SELECT ally_name FROM ally_data WHERE ally_id = cd.ally_id) AS aname FROM clan_data AS cd WHERE cd.hasHideout = ch.id)) AS ally_name FROM clanhall AS ch WHERE ch.id != '21' AND ch.id != '34' AND ch.id != '35' AND ch.id != '62' AND ch.id != '63' AND ch.id != '64' ORDER BY ch.id ASC");
						$records->execute();
						if($records->rowCount() > 0){
							while ($row = $records->fetchObject()) {
								array_push($rank, array("clanHallName" => $this->clanHallName($row->id), "clanHallLoc" => $this->clanHallLoc($row->id), "clanHallOwnerClan" => $row->clan_name, "clanHallOwnerAlly" => $row->ally_name));
							}
						}
					}elseif($this->L2jVersaoClassic){
						$clanHalls = array(22,23,24,25,65,66,67,68,26,27,28,29,30,31,32,33,69,70,71,72,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,73,74);
						for($x=0;$x<count($clanHalls);$x++){
							$records = $this->gameConn->prepare("SELECT IF((SELECT clan_name FROM clan_data WHERE clan_id = ch.owner_id) IS NULL, '-', (SELECT clan_name FROM clan_data WHERE clan_id = ch.owner_id)) AS clan_name, IF((SELECT ally_name FROM clan_data WHERE clan_id = ch.owner_id) IS NULL, '-', (SELECT ally_name FROM clan_data WHERE clan_id = ch.owner_id)) AS ally_name FROM clanhall AS ch WHERE ch.id = '".$clanHalls[$x]."'");
							$records->execute();
							if($records->rowCount() > 0){
								while ($row = $records->fetchObject()) {
									array_push($rank, array("clanHallName" => $this->clanHallName($clanHalls[$x]), "clanHallLoc" => $this->clanHallLoc($clanHalls[$x]), "clanHallOwnerClan" => $row->clan_name, "clanHallOwnerAlly" => $row->ally_name));
								}
							}else{
								array_push($rank, array("clanHallName" => $this->clanHallName($clanHalls[$x]), "clanHallLoc" => $this->clanHallLoc($clanHalls[$x]), "clanHallOwnerClan" => "-", "clanHallOwnerAlly" => "-"));
							}
						}
					}else{
						$records = $this->gameConn->prepare("SELECT ch.id, IF((SELECT clan_name FROM clan_data WHERE clan_id = ch.ownerId) IS NULL, '-', (SELECT clan_name FROM clan_data WHERE clan_id = ch.ownerId)) AS clan_name, IF((SELECT ally_name FROM clan_data WHERE clan_id = ch.ownerId) IS NULL, '-', (SELECT ally_name FROM clan_data WHERE clan_id = ch.ownerId)) AS ally_name FROM clanhall AS ch WHERE ch.id != '21' AND ch.id != '34' AND ch.id != '35' AND ch.id != '62' AND ch.id != '63' AND ch.id != '64' ORDER BY ch.id ASC");
						$records->execute();
						if($records->rowCount() > 0){
							while ($row = $records->fetchObject()) {
								array_push($rank, array("clanHallName" => $this->clanHallName($row->id), "clanHallLoc" => $this->clanHallLoc($row->id), "clanHallOwnerClan" => $row->clan_name, "clanHallOwnerAlly" => $row->ally_name));
							}
						}
					}
				}else{
					$records = $this->gameConn->prepare("SELECT ch.id, CASE WHEN ch.pledge_id > '0' THEN (SELECT name FROM Pledge WHERE pledge_id = ch.pledge_id) ELSE '-' END AS clan_name, CASE WHEN ch.pledge_id > '0' THEN (SELECT name FROM Alliance WHERE master_pledge_id = ch.pledge_id) ELSE '-' END AS ally_name FROM agit AS ch WHERE ch.id != '20' AND ch.id != '21' AND ch.id != '34' AND ch.id != '35' AND ch.id != '62' AND ch.id != '63' AND ch.id != '64' ORDER BY ch.id ASC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$records->execute();
					if($records->rowCount() > 0){
						while ($row = $records->fetchObject()) {
							array_push($rank, array("clanHallName" => $this->clanHallName($row->id), "clanHallLoc" => $this->clanHallLoc($row->id), "clanHallOwnerClan" => $row->clan_name, "clanHallOwnerAlly" => $row->ally_name));
						}
					}
				}
			}
			return $rank;
		}
		
		public function miniRank(){
			$rank = array();
			$topPvp = $this->PvP_Pk("pvpkills",1);
			$topPk = $this->PvP_Pk("pkkills",1);
			$topOnline = $this->topOnline(1);
			$topClan = $this->topClan(1);
			array_push($rank, array("miniTopPvp" => $topPvp[0]["playerName"], "miniTopPk" => $topPk[0]["playerName"], "miniTopOnline" => $topOnline[0]["onlineName"], "miniTopClan" => $topClan[0]["clanName"]));
			return $rank;
		}
		
		public function miniBossStatus(){
			$rank = array();
			$bigBosses = $this->Bosses(true);
			if(count($bigBosses) > 0){
				$x = rand(0,(count($bigBosses)-1));
				array_push($rank, array("miniBossName" => $bigBosses[$x]["bossName"], "miniBossLevel" => $bigBosses[$x]["bossLevel"], "miniBossStatus" => $bigBosses[$x]["bossStatus"], "miniBossRespawn" => $bigBosses[$x]["bossRespawn"]));
			}
			return count($rank) == 0 ? array(array("miniBossName" => "-", "miniBossLevel" => "-", "miniBossStatus" => "-", "miniBossRespawn" => "-")) : $rank;
		}
		
		public function miniCastle(){
			$rank = array();
			$castles = $this->Castles();
			if(count($castles) > 0){
				$x = rand(0,(count($castles)-1));
				array_push($rank, array("miniCastleName" => $castles[$x]["castleName"], "miniCastleOwner" => $castles[$x]["castleOwner"], "miniCastleClan" => $castles[$x]["castleClan"], "miniCastleAlly" => $castles[$x]["castleAlly"], "miniCastleDate" => $castles[$x]["castleDate"], "miniCastleTax" => $castles[$x]["castleTax"], "miniCastleDefenders" => $castles[$x]["castleDefenders"], "miniCastleAttackers" => $castles[$x]["castleAttackers"]));
			}
			return count($rank) == 0 ? array(array("miniCastleName" => "-", "miniCastleOwner" => "-", "miniCastleClan" => "-", "miniCastleAlly" => "-", "miniCastleDate" => "-", "miniCastleTax" => "-", "miniCastleDefenders" => "-", "miniCastleAttackers" => "-")) : $rank;
		}
		
		public function olyPeriod($period){
			if($period == 30){
				$olyDay = date("t") - date("d");
				$olyPeriod = $olyDay == 0 ? 100 : intval(((date("t") - $olyDay) * 100) / date("t"));
			}elseif($period == 15){
				$olyDay = date("d") < 16 ? 15 - date("d") : 15 - (date("t") - date("d"));
				$olyPeriod = $olyDay == 0 ? 100 : intval(((15 - $olyDay) * 100) / 15);
			}elseif($period == 7){
				if(date("d") < 8){
					$olyDay = 7 - date("d");
					$olyDays = 7 - $olyDay;
				}elseif(date("d") > 7 && date("d") < 16){
					$olyDay = 15 - date("d");
					$olyDays = 8 - $olyDay;
				}elseif(date("d") > 15 && date("d") < 23){
					$olyDay = 22 - date("d");
					$olyDays = 7 - $olyDay;
				}elseif(date("d") > 22 && date("d") < date("t")){
					$olyDay = date("t") - date("d");
					$olyDays = (date("t") - 22) - $olyDay;
				}
				$olyPeriod = $olyDays == 0 ? 100 : intval(($olyDays * 100) / 7);
			}else{
				$olyDay = 0;
				$olyPeriod = 0;
			}
			return array(array("olyPeriodPercent" => $olyPeriod, "olyPeriodDays" => $olyDay));
		}
		
		public function showScreenshots($status, $sort, $limit, $index = true){
			$images = array();
			if($this->ENABLE_SCREENSHOTS_GALLERY){
				if($this->db_type){
					if(!empty($limit)){
						$records = $this->gameConn->prepare("SELECT * FROM icp_gallery_screenshots WHERE status = '".$status."' ORDER BY ".$sort." LIMIT ".$limit);
					}else{
						$records = $this->gameConn->prepare("SELECT * FROM icp_gallery_screenshots WHERE status = '".$status."' ORDER BY ".$sort);
					}
				}else{
					if(!empty($limit)){
						if(is_numeric($limit))
							$records = $this->gameConn->prepare("SELECT TOP ".$limit." * FROM icp_gallery_screenshots WHERE status = '".$status."' ORDER BY ".$sort, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
						else
							$records = $this->gameConn->prepare("SELECT * FROM icp_gallery_screenshots WHERE status = '".$status."' ORDER BY ".$sort." OFFSET ".str_replace(","," ROWS FETCH NEXT", $limit)." ROWS ONLY", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					}else{
						$records = $this->gameConn->prepare("SELECT * FROM icp_gallery_screenshots WHERE status = '".$status."' ORDER BY ".$sort, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					}
				}
				$records->execute();
				if($records->rowCount() > 0){
					$y=1;
					while ($row = $records->fetchObject()) {
						array_push($images, array("screenshotId" => $row->id, "screenshotAuthor" => $row->author, "screenshotLegend" => $row->legend, "screenshotDate" => $row->date, "screenshotImg" => $row->screenshot, "screenshotNum" => $y));
						$y++;
					}
					if(count($images) < $limit && $index){
						for($x=count($images);$x<$limit;$x++){
							array_push($images, array("screenshotId" => "-", "screenshotAuthor" => "-", "screenshotLegend" => "-", "screenshotDate" => date("d/m/Y"), "screenshotImg" => "noimage.jpg", "screenshotNum" => $x+1));
						}
					}
				}else{
					if($index){
						for($x=0;$x<$limit;$x++){
							array_push($images, array("screenshotId" => "-", "screenshotAuthor" => "-", "screenshotLegend" => "-", "screenshotDate" => date("d/m/Y"), "screenshotImg" => "noimage.jpg", "screenshotNum" => $x+1));
						}
					}
				}
			}else{
				if($index){
					for($x=0;$x<$limit;$x++){
						array_push($images, array("screenshotId" => "-", "screenshotAuthor" => "-", "screenshotLegend" => "-", "screenshotDate" => date("d/m/Y"), "screenshotImg" => "noimage.jpg", "screenshotNum" => $x+1));
					}
				}
			}
			return $images;
		}
		
		public function showVideos($status, $sort, $limit, $index = true){
			$videos = array();
			if($this->ENABLE_VIDEOS_GALLERY){
				if($this->db_type){
					if(!empty($limit)){
						$records = $this->gameConn->prepare("SELECT * FROM icp_gallery_videos WHERE status = '".$status."' ORDER BY ".$sort." LIMIT ".$limit);
					}else{
						$records = $this->gameConn->prepare("SELECT * FROM icp_gallery_videos WHERE status = '".$status."' ORDER BY ".$sort);
					}
				}else{
					if(!empty($limit)){
						if(is_numeric($limit))
							$records = $this->gameConn->prepare("SELECT TOP ".$limit." * FROM icp_gallery_videos WHERE status = '".$status."' ORDER BY ".$sort, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
						else
							$records = $this->gameConn->prepare("SELECT * FROM icp_gallery_videos WHERE status = '".$status."' ORDER BY ".$sort." OFFSET ".str_replace(","," ROWS FETCH NEXT", $limit)." ROWS ONLY", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					}else{
						$records = $this->gameConn->prepare("SELECT * FROM icp_gallery_videos WHERE status = '".$status."' ORDER BY ".$sort, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					}
				}
				$records->execute();
				if($records->rowCount() > 0){
					$y=1;
					while ($row = $records->fetchObject()) {
						array_push($videos, array("videosId" => $row->id, "videosAuthor" => $row->author, "videosLegend" => $row->legend, "videosDate" => $row->date, "videosLink" => $row->link, "videosImg" => $row->photo, "videosNum" => $y, "videosUrl" => $row->url));
						$y++;
					}
					if($records->rowCount() < $limit && $index){
						for($x=0;$x<($limit - $records->rowCount());$x++){
							array_push($videos, array("videosId" => "-", "videosAuthor" => "-", "videosLegend" => "-", "videosDate" => date("d/m/Y"), "videosLink" => "<iframe width='560' height='315' src='https://www.youtube.com/embed/qDeMdjTmKck' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>", "videosImg" => "http://i1.ytimg.com/vi/qDeMdjTmKck/default.jpg;;https://www.youtube.com/watch?v=qDeMdjTmKck", "videosNum" => $x+1, "videosUrl" => "https://www.youtube.com/embed/qDeMdjTmKck"));
						}
					}
				}else{
					if($index){
						for($x=0;$x<$limit;$x++){
							array_push($videos, array("videosId" => "-", "videosAuthor" => "-", "videosLegend" => "-", "videosDate" => date("d/m/Y"), "videosLink" => "<iframe width='560' height='315' src='https://www.youtube.com/embed/qDeMdjTmKck' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>", "videosImg" => "http://i1.ytimg.com/vi/qDeMdjTmKck/default.jpg;;https://www.youtube.com/watch?v=qDeMdjTmKck", "videosNum" => $x+1, "videosUrl" => "https://www.youtube.com/embed/qDeMdjTmKck"));
						}
					}
				}
			}else{
				if($index){
					for($x=0;$x<$limit;$x++){
						array_push($videos, array("videosId" => "-", "videosAuthor" => "-", "videosLegend" => "-", "videosDate" => date("d/m/Y"), "videosLink" => "<iframe width='560' height='315' src='https://www.youtube.com/embed/qDeMdjTmKck' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>", "videosImg" => "http://i1.ytimg.com/vi/qDeMdjTmKck/default.jpg;;https://www.youtube.com/watch?v=qDeMdjTmKck", "videosNum" => $x+1, "videosUrl" => "https://www.youtube.com/embed/qDeMdjTmKck"));
					}
				}
			}
			return $videos;
		}
		
	}
	
}