<div id="content-wrapper">

  <div class="space"></div>

    <div id="content" class="left">
       
      <div id="content-center" class="left">
         
        <h1>Raid Bosses</h1>
             
          <div class="linha1"></div>
             
          <div style="width:650px;">
            
            <div>Aqui você poderá visualizar se o desejado Raid Boss esta online ou não.
            <br /><br />
          
          
          </div>
         
           
       </div>
	   

<div style="width:650px;margin:0 auto;margin-top:10px;">

<div style="width:635px; margin:0 auto;">
	<div id="rank_borda" style="width:249px;">
		Nome
	</div>
	<div id="rank_borda" style="width:70px;">
		Level
	</div>
	<div id="rank_borda" style="width:70px;">
		Status
	</div>
	<div id="rank_borda" style="width:140px;">
		Respawn
	</div>
<?php
$raid_boss = mysql_query("SELECT r.*, (SELECT name FROM npc WHERE id = r.boss_id) AS rboss_name, (SELECT level FROM npc WHERE id = r.boss_id) AS rboss_level FROM raidboss_spawnlist AS r ORDER BY rboss_level DESC") or die(mysql_error());
while($rboss = mysql_fetch_array($raid_boss)){
	if(($rboss["respawn_time"] / 1000) > time()){
		$respawn2 = date('d/m/Y H:i:s',($rboss["respawn_time"] / 1000));
		$status2 = "<span style='color:#FFA54F; font-weight:bold; text-shadow:1px 1px #000;'>Morto</span>";
	}else{
		$status2 = "<span style='color:#009966; font-weight:bold;'>Vivo</span>";
		$respawn2 = "Online";
	}
	if(!empty($rboss["rboss_name"])){
?>
	<div id="rank_borda" style="width:249px; overflow:hidden; font-size:12px; color:#777;">
		<?php echo"$rboss[rboss_name]"; ?>
	</div>
	<div id="rank_borda" style="width:70px; overflow:hidden; font-size:12px; color:#777;">
		<?php echo"$rboss[rboss_level]"; ?>
	</div>
	<div id="rank_borda" style="width:70px; overflow:hidden; font-size:12px; color:#777;">
		<?php echo"$status2"; ?>
	</div>
	<div id="rank_borda" style="width:140px; overflow:hidden; font-size:12px; color:#777;">
		<?php echo"$respawn2"; ?>
	</div>
<?php
	}
}
?>
</div>
           
    </div>
       
</div>

</div>