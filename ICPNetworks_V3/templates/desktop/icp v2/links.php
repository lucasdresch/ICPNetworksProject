<?php
//=======================================================================\\
//  ## ####### #######                                                   \\
//  ## ##      ##   ##                                                   \\
//  ## ##      ## ####  |\  | |¯¯¯ ¯¯|¯¯ \      / |¯¯¯| |¯¯¯| | / |¯¯¯|  \\
//  ## ##      ##       | \ | |--    |    \    /  | | | | |_| |<   ¯\_   \\
//  ## ####### ##       |  \| |___   |     \/\/   |___| | |\  | \ |___|  \\
// --------------------------------------------------------------------- \\
//       Brazillian Developer / WebSite: http://www.icpfree.com.br       \\
//                 Email & Skype: ivan1507@gmail.com.br                  \\
//=======================================================================\\
session_start();

require_once("../../../config/userConfig.php");
require_once("../../../engine/connect.php");
require_once("../../../engine/engine.php");

date_default_timezone_set($config["TIME_ZONE"]);

$currentTemplate = isset($config["PC_TEMPLATE"]) && !empty($config["PC_TEMPLATE"]) ? $config["PC_TEMPLATE"] : null;

if(isset($currentTemplate) && !empty($currentTemplate)){
	$pasta = "../../../templates/desktop/".$currentTemplate."/pags/"; // Caminho da pasta onde estão os seus arquivos PHP
	$home = "home"; // Página principal
	$pagina = !empty(trim($_GET["icp"])) ? trim($_GET["icp"]) : $home;
	require_once("../../../engine/classes/Template.php");
	if(file_exists($pasta."index.html")){
		$tpl = new raelgc\view\Template($pasta."index.html");
		if($tpl->exists("PAGES"))
			$tpl->addFile("PAGES", $pasta.$pagina.".html");
		if($tpl->exists("TEMPLATE"))
			$tpl->TEMPLATE = "templates/desktop/".$currentTemplate."/";
		$vars = $tpl->getVars();
		for($x=0;$x<count($vars);$x++){
			if($vars[$x] != "TEMPLATE" && $vars[$x] != "PAGES"){
				if(isset($config[$vars[$x]]) && !empty($config[$vars[$x]])){
					if($vars[$x] == "SITE_TITLE" && isset($pagina) && strtolower($pagina) != $home)
						$tpl->{$vars[$x]} = "<script>document.title = '".ucwords(strtolower(str_replace("_"," ",str_replace("-"," ",$pagina))))." - ".$config[$vars[$x]]."'</script>";
					else{
						if($vars[$x] == "SITE_TITLE" && isset($pagina) && strtolower($pagina) == $home)
							$tpl->{$vars[$x]} = "<script>document.title = '".$config[$vars[$x]]."'</script>";
						else
							$tpl->{$vars[$x]} = $config[$vars[$x]];
					}
				}
			}
		}
		require_once("../../../engine/classes/Miscellaneous.php");
		require_once("../../../engine/module_server_status.php");
		require_once("../../../engine/module_rankings.php");
		if($tpl->exists("BLOCK_ICP_PANEL_CONNECTED",true)){
			if(isset($_SESSION["ICP_UserName"])){
				$tpl->block("BLOCK_ICP_PANEL_CONNECTED");
			}else{
				if($tpl->exists("BLOCK_ICP_PANEL_DISCONNECTED",true))
					$tpl->block("BLOCK_ICP_PANEL_DISCONNECTED");
			}
		}
		$tpl->show();
	}else{
		echo "ERROR: Invalid template!";
	}
}else{
	echo "ERROR: Invalid template!";
}
?>