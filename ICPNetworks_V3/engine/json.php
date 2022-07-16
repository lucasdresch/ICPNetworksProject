<?php
if(!empty($_GET["json"])){
	if($_GET["json"] == "informer"){
		$searchInformer = $gameServer->prepare("SELECT itemId AS id, itemName AS name, 'Item' as type FROM icp_icons WHERE itemName LIKE CONCAT('%',?,'%') UNION SELECT idTemplate AS id, name, 'NPC' as type FROM icp_npc WHERE name LIKE CONCAT('%',?,'%') ORDER BY type DESC, name ASC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
		$searchInformer-> execute([$_GET["term"],$_GET["term"]]);
		if($searchInformer->rowCount() > 0){
			echo "{\"informer\":{";
			$x=1;
			while ($row = $searchInformer->fetchObject()) {
				$virgula = $x == $searchInformer->rowCount() ? null : ",";
				echo "\"".$row->type." - ".$row->name."\":\"".$row->name."\"".$virgula;
				$x++;
			}
			echo "}}";
		}else{
			echo "{\"informer\":{}}";
		}
	}
	if($_GET["json"] == "accounts"){
		$table = $db_type ? "accounts" : "user_auth";
		$colLogin = $db_type ? "login" : "account";
		$searchAccounts = $loginServer->prepare("SELECT ".$colLogin." FROM ".$table." WHERE ".$colLogin." LIKE CONCAT(?,'%') ORDER BY ".$colLogin." ASC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
		$searchAccounts-> execute([$_GET["term"]]);
		if($searchAccounts->rowCount() > 0){
			echo "{\"accounts\":{";
			$x=1;
			while ($row = $searchAccounts->fetchObject()) {
				$virgula = $x == $searchAccounts->rowCount() ? null : ",";
				echo "\"".$row->{$colLogin}."\":\"".$row->{$colLogin}."\"".$virgula;
				$x++;
			}
			echo "}}";
		}else{
			echo "{\"accounts\":{}}";
		}
	}
	exit;
}