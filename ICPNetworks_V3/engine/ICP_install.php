<?php
#|======================================================================|#
#|  ## ####### #######                                                  |#
#|  ## ##      ##   ##                                                  |#
#|  ## ##      ## ####  |)  | |¯¯¯ ¯¯|¯¯ |     | |¯¯¯| |¯¯¯| | ) |¯¯¯|  |#
#|  ## ##      ##       | | | |--    |    ) . (  | | | | |_| |<   ¯|_   |#
#|  ## ####### ##       |  (| |___   |     V V   |___| | | ) | ) |___|  |#
#| -------------------------------------------------------------------- |#
#|    Brazillian Developer / WebSite: http://www.icpnetworks.com.br     |#
#|                Email & Skype: ivan1507@gmail.com.br                  |#
#|======================================================================|#

if(file_exists("config/userConfig.php")){
	header("Location: index.php");
	exit;
}
if(file_exists("../config/userConfig.php") || strpos($_SERVER['REQUEST_URI'], 'ICP_install') !== false){
	header("Location: ../index.php");
	exit;
}
function resposta($msg,$title=null,$type=null,$redirect=null){
	echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js\" type=\"text/javascript\"></script><script src=\"//cdn.jsdelivr.net/npm/sweetalert2@10\"></script><script type=\"text/javascript\">$(document).ready(function(){Swal.fire({ title: '".$title."', html: '".$msg."', icon: '".$type."'".(!empty($redirect) ? ", confirmButtonText: 'Ok', preConfirm: () => { return [ window.location.href = '".$redirect."' ] } })" : "})")."})</script>";
}
if(isset($_POST["install"])){
	require_once("engine/classes/ICP_Connect.php");
	$login = !empty($_POST["db_login_server"]) ? ICPConnect::connect("login", $_POST["db_ip"],$_POST["db_login_server"],$_POST["db_user"],$_POST["db_pass"]) : true;
	$game = ICPConnect::connect("game", $_POST["db_ip"],$_POST["db_game_server"],$_POST["db_user"],$_POST["db_pass"]);
	if($login && $game){
		$pag = "";
		$conteudo = str_replace("icp_game", $_POST["db_game_server"], str_replace("icp_login", $_POST["db_login_server"], (str_replace("icp_pass", $_POST["db_pass"], (str_replace("icp_user", $_POST["db_user"], (str_replace("icp_ip", $_POST["db_ip"], $_POST["pag"]))))))));
		$html = "<?php\n";
		$html .= $conteudo;
		$html .= "\n?>";
		$pag_config = fopen("config/userConfig.php", "w");
		fwrite($pag_config, $html);
		fclose($pag_config);
		if(empty($_POST["installTables"] ?? "")){
			echo resposta("Panel successfully installed!","Success!","success","?icp=panel");
			exit;
		}
	}else{
		echo resposta("The connection failed.<br>Incorrect data or the database user does not have permission.<br>Try again.","Oops...","error");
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
	<head>
		<title>ICPNetworks V3 - Instalation</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="col-md-6 text-center mt-2" style="margin:0 auto;">
				<a href="http://www.icpnetworks.com.br" target="_blank"><img src="images/miscs/icpnetworks.png" width="70%" style="max-width:100%;"></a>
			</div>
			<?php
			if(file_exists("config/userConfig.php")){
				ini_set('max_execution_time', 0);
				require_once("config/userConfig.php");
				require_once("engine/connect.php");
				if($db_type){
					require_once("engine/sql/l2j/icp_accounts.php");
					require_once("engine/sql/l2j/icp_accounts_ip.php");
					require_once("engine/sql/l2j/icp_configs.php");
					require_once("engine/sql/l2j/icp_donate.php");
					require_once("engine/sql/l2j/icp_donate_history.php");
					require_once("engine/sql/l2j/icp_donate_log.php");
					require_once("engine/sql/l2j/icp_droplist_acis.php");
					require_once("engine/sql/l2j/icp_droplist_classic.php");
					require_once("engine/sql/l2j/icp_droplist_russo.php");
					require_once("engine/sql/l2j/icp_gallery_screenshots.php");
					require_once("engine/sql/l2j/icp_gallery_videos.php");
					require_once("engine/sql/l2j/icp_hennas.php");
					require_once("engine/sql/l2j/icp_icons.php");
					require_once("engine/sql/l2j/icp_news.php");
					require_once("engine/sql/l2j/icp_npc.php");
					require_once("engine/sql/l2j/icp_prime_shop.php");
					require_once("engine/sql/l2j/icp_rewards.php");
					require_once("engine/sql/l2j/icp_shop_chars.php");
					require_once("engine/sql/l2j/icp_shop_chars_auction.php");
					require_once("engine/sql/l2j/icp_shop_items.php");
					require_once("engine/sql/l2j/icp_shop_items_auction.php");
					require_once("engine/sql/l2j/icp_skills.php");
					require_once("engine/sql/l2j/icp_spawnlist.php");
					require_once("engine/sql/l2j/icp_staff.php");
					require_once("engine/sql/l2j/icp_tickets.php");
					require_once("engine/sql/l2j/icp_tickets_ban.php");
					require_once("engine/sql/l2j/icp_tickets_msgs.php");
				}else{
					require_once("engine/sql/l2off/icp_accounts.php");
					require_once("engine/sql/l2off/icp_accounts_ip.php");
					require_once("engine/sql/l2off/icp_configs.php");
					require_once("engine/sql/l2off/icp_donate.php");
					require_once("engine/sql/l2off/icp_donate_history.php");
					require_once("engine/sql/l2off/icp_donate_log.php");
					require_once("engine/sql/l2off/icp_droplist_interlude.php");
					require_once("engine/sql/l2off/icp_gallery_screenshots.php");
					require_once("engine/sql/l2off/icp_gallery_videos.php");
					require_once("engine/sql/l2off/icp_hennas.php");
					require_once("engine/sql/l2off/icp_icons.php");
					require_once("engine/sql/l2off/icp_news.php");
					require_once("engine/sql/l2off/icp_npc.php");
					require_once("engine/sql/l2off/icp_prime_shop.php");
					require_once("engine/sql/l2off/icp_rewards.php");
					require_once("engine/sql/l2off/icp_shop_chars.php");
					require_once("engine/sql/l2off/icp_shop_chars_auction.php");
					require_once("engine/sql/l2off/icp_shop_items.php");
					require_once("engine/sql/l2off/icp_shop_items_auction.php");
					require_once("engine/sql/l2off/icp_skills.php");
					require_once("engine/sql/l2off/icp_spawnlist.php");
					require_once("engine/sql/l2off/icp_staff.php");
					require_once("engine/sql/l2off/icp_tickets.php");
					require_once("engine/sql/l2off/icp_tickets_ban.php");
					require_once("engine/sql/l2off/icp_tickets_msgs.php");
				}
				function remainingTime($date,$abbreviate = false) {
					$diff = time() - (time() - $date);
					$calc1 = ($diff % 86400);
					$calc2 = ($diff % 3600);
					$days  = floor($diff / 86400);
					$hours = floor($calc1 / 3600);
					$minutes = floor($calc2 / 60);
					$seconds = ($calc2 % 60);
					$return = null;
					$return .= $days > 0 ? "<strong>".$days."</strong>" : null;
					$return .= $days > 0 ? $abbreviate ? "d, " : " day(s), " : null;
					$return .= $hours > 0 ? "<strong>".$hours."</strong>" : null;
					$return .= $hours > 0 ? $abbreviate ? "h, " : " hour(s), " : null;
					$return .= $minutes > 0 ? "<strong>".$minutes."</strong>" : null;
					$return .= $minutes > 0 ? $abbreviate ? "m, " : " minute(s), " : null;
					$return .= $seconds >= 0 ? "<strong>".$seconds."</strong>" : null;
					$return .= $seconds >= 0 ? $abbreviate ? "s." : " second(s)." : null;
					return $return;
				}
				?>
				<div class="card m-3">
					<div class="card">
						<div class="card-header text-center">
							ICPNetworks Panel install
						</div>
						<div class="card-body m-0 p-0" style="font-size:12px;">
							<div class="row m-0 mb-3 p-0 pr-3">
								<?php
								for($y=0;$y<count($tableName);$y++){
									?>
									<div class="col-sm-3 m-0 p-0" style="min-width:250px;">
										<div class="card mb-0 ml-3 mt-3 mr-0">
											<div class="card-header">
												Instaling table <?php echo $tableName[$y]; ?>
											</div>
											<div class="card-body pb-0">
												<div class="progress">
													<div class="progress-bar progress-bar-striped progress-bar-animated" id="successBar<?php echo $y; ?>" style="width:0%">
														<span id="percentBar<?php echo $y; ?>"></span>
													</div>
												</div>
												<p class="m-0">Records: <span id="information<?php echo $y; ?>">0</span> of <?php echo number_format(count($columnsValue[$y]),0,'.','.'); ?></p>
												<p>Estimated time: <span id="time<?php echo $y; ?>">?</span></p>
											</div>
										</div>
									</div>
									<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
			<p class="mt-4 text-muted text-center"><a href="http://www.icpnetworks.com.br" target="_blank">ICPNetworks &copy; 2010–2030</a></p>
			<p class="text-muted text-center">All rights reserved</p>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>
				<?php
				$totalTables = count($tableName);
				for($z=0;$z<$totalTables;$z++){
					$time_start = microtime(true);
					$loginTables = array("icp_accounts","icp_accounts_ip");
					$conn = in_array($tableName[$z],$loginTables) ? $loginServer : $gameServer;
					if($db_type)
						$deleteTable = $conn->prepare("DROP TABLE IF EXISTS `".$tableName[$z]."`");
					else
						$deleteTable = $conn->prepare("DROP TABLE ".$tableName[$z]);
					$deleteTable->execute();
					$newTable = $conn->prepare($createTable[$z]);
					$newTable->execute();
					$totalRows = count($columnsValue[$z]);
					$ok = true;
					$timeLeft = 1;
					for($i=0;$i<$totalRows;$i++){
						try{
							$install = $conn->prepare("INSERT INTO ".$tableName[$z]." VALUES (".implode(",",$columnsValue[$z][$i]).")");
							$install->execute();
							$percent = intval(($totalRows > 1 ? $i : 1)/($totalRows > 1 ? ($totalRows-1) : $totalRows) * 100)."%";
							echo '<script language="javascript">
							document.getElementById("percentBar'.$z.'").innerHTML="'.$percent.'";
							document.getElementById("successBar'.$z.'").style.width = "'.$percent.'";
							document.getElementById("information'.$z.'").innerHTML = "'.number_format(($i+1),0,'.','.').'";
							</script>';
							if(str_replace("%","",$percent) == $timeLeft){
								$timeLeft = str_replace("%","",$percent) + 1;
								echo '<script language="javascript">
								document.getElementById("time'.$z.'").innerHTML="'.remainingTime(((microtime(true) - $time_start)/str_replace("%","",$percent))*(100 - str_replace("%","",$percent)),true).'";
								</script>';
							}
						}catch(Exception $e){
							$i = $totalRows;
							$ok = false;
						}
						@ob_flush();
						@flush();
					}
					if($totalRows == 0){
						for($w=1;$w<=100;$w++){
							$percent = intval($w/100 * 100)."%";
							usleep(10000);
							echo '<script language="javascript">document.getElementById("percentBar'.$z.'").innerHTML="'.$percent.'";document.getElementById("successBar'.$z.'").style.width="'.$percent.'";</script>';
							if( str_replace("%","",$percent) == $timeLeft){
								$timeLeft = str_replace("%","",$percent) + 1;
								echo '<script language="javascript">
								document.getElementById("time'.$z.'").innerHTML="'.remainingTime(((microtime(true) - $time_start)/str_replace("%","",$percent))*(100 - str_replace("%","",$percent)),true).'";
								</script>';
							}
							@ob_flush();
							@flush();
						}
					}
					echo $ok ? '<script language="javascript">document.getElementById("successBar'.$z.'").classList.add("bg-success");document.getElementById("percentBar'.$z.'").innerHTML=document.getElementById("percentBar'.$z.'").innerHTML+" completed";</script>' : '<script language="javascript">document.getElementById("successBar'.$z.'").classList.add("bg-danger");document.getElementById("percentBar'.$z.'").innerHTML=document.getElementById("percentBar'.$z.'").innerHTML+" error";</script>';
					echo '<script language="javascript">document.getElementById("time'.$z.'").innerHTML="'.remainingTime(0,true).'";</script>';
					sleep(1);
				}
				echo '<script language="javascript">alert("Panel successfully installed!");window.location = "?icp=panel";</script>';
			}else{
				?>
				<div class="col-md-6 shadow rounded mt-4 p-0" style="margin:0 auto;">
					<div class="card">
						<div class="card-header text-center">
							Instalation
						</div>
						<div class="card-body">
							<form action="" method="post" style="margin:0px; padding:0px;">
								<label class="sr-only" for="databaseIp">IP</label>
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<div class="input-group-text">Database</div>
									</div>
									<input type="text" class="form-control" id="databaseIp" name="db_ip" placeholder="IP" autocomplete="off" required>
								</div>
								<label class="sr-only" for="databaseLogin">Login server name</label>
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<div class="input-group-text">Database</div>
									</div>
									<input type="text" class="form-control" id="databaseLogin" name="db_login_server" placeholder="Login server name" autocomplete="off">
								</div>
								<label class="sr-only" for="databaseGame">Game server name</label>
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<div class="input-group-text">Database</div>
									</div>
									<input type="text" class="form-control" id="databaseGame" name="db_game_server" placeholder="Game server name" autocomplete="off" required>
								</div>
								<label class="sr-only" for="databaseUser">User</label>
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<div class="input-group-text">Database</div>
									</div>
									<input type="text" class="form-control" id="databaseUser" name="db_user" placeholder="User" autocomplete="off" required>
								</div>
								<label class="sr-only" for="databasePass">Password</label>
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<div class="input-group-text">Database</div>
									</div>
									<input type="password" class="form-control" id="databasePass" name="db_pass" placeholder="Password" autocomplete="off">
								</div>
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<div class="input-group-text">Database</div>
									</div>
									<span class="form-control" style="padding-left:0px;">
										<div class="form-check">
											<input type="checkbox" name="installTables" id="databaseTables">
											<label class="form-check-label" for="databaseTables">Install tables</label>
										</div>
									</span>
								</div>
								<input type="hidden" name="pag" value='#|======================================================================|#
#|  ## ####### #######                                                  |#
#|  ## ##      ##   ##                                                  |#
#|  ## ##      ## ####  |)  | |¯¯¯ ¯¯|¯¯ |     | |¯¯¯| |¯¯¯| | ) |¯¯¯|  |#
#|  ## ##      ##       | | | |--    |    ) . (  | | | | |_| |<   ¯|_   |#
#|  ## ####### ##       |  (| |___   |     V V   |___| | | ) | ) |___|  |#
#| -------------------------------------------------------------------- |#
#|    Brazillian Developer / WebSite: http://www.icpnetworks.com.br     |#
#|                Email & Skype: ivan1507@gmail.com.br                  |#
#|======================================================================|#

$db_conn["db_ip"] = "icp_ip";
$db_conn["username"] = "icp_user";
$db_conn["password"] = "icp_pass";
$db_conn["db_login_server"] = "icp_login";
$db_conn["db_game_server"] = "icp_game";'>
								<input type="submit" class="btn btn-primary btn-sm w-100" name="install" value="Install">
							</form>
						</div>
					</div>
				</div>
			<p class="mt-4 text-muted text-center"><a href="http://www.icpnetworks.com.br" target="_blank">ICPNetworks &copy; 2010–2030</a></p>
			<p class="text-muted text-center">All rights reserved</p>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>
				<?php
			}
			?>