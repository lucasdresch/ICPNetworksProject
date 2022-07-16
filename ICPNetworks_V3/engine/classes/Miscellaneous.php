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
namespace ICPNetworks\Miscs {
	
	class Suport {
		
		public function __construct($db_type, $loginServerConnect, $gameServerConnect, $config) {
			$this->db_type = $db_type;
			$this->loginConn = $loginServerConnect;
			$this->gameConn = $gameServerConnect;
			$this->L2jVersaoRussa = $config["L2jVersaoRussa"];
			$this->L2jVersaoClassic = $config["L2jVersaoClassic"];
			$this->L2jVersaoAcis = $config["L2jVersaoAcis"];
			$this->ENABLE_PRIME_SHOP = $config["ENABLE_PRIME_SHOP"];
			$this->ENABLE_CHARACTER_BROKER = $config["ENABLE_CHARACTER_BROKER"];
			$this->ENABLE_ITEM_BROKER = $config["ENABLE_ITEM_BROKER"];
			$this->ITEM_BROKER_LOC_PLACE = $config["ITEM_BROKER_LOC_PLACE"];
			$this->ALLOW_ITEM_BROKER_SALE_COMBO_ITEMS = $config["ALLOW_ITEM_BROKER_SALE_COMBO_ITEMS"];
			$this->ALLOW_ITEM_BROKER_SALE_PVP_ITEMS = $config["ALLOW_ITEM_BROKER_SALE_PVP_ITEMS"];
			$this->ALLOW_ITEM_BROKER_SALE_AUGMENTED_ITEMS = $config["ALLOW_ITEM_BROKER_SALE_AUGMENTED_ITEMS"];
			$this->ALLOW_AUCTION_CHARACTER_BROKER = $config["ALLOW_AUCTION_CHARACTER_BROKER"];
			$this->ALLOW_AUCTION_ITEM_BROKER = $config["ALLOW_AUCTION_ITEM_BROKER"];
			$this->AUCTION_CHARACTER_BROKER_DAYS = $config["AUCTION_CHARACTER_BROKER_DAYS"];
			$this->AUCTION_ITEM_BROKER_DAYS = $config["AUCTION_ITEM_BROKER_DAYS"];
			$this->MAX_ENCHANT = $config["MAX_ENCHANT"];
			$this->goldbar = $config["GOLDBAR_VALUE"];
			$this->ENABLE_REWARD_SYSTEM = $config["ENABLE_REWARD_SYSTEM"];
			$this->FAKE_PLAYERS_ENABLED = $config["enable_fake_players"];
			$this->FAKE_PLAYERS_NUMBER = $config["fake_players_number"];
			$this->ENABLE_TOP_PVP = $config["enable_top_pvp"];
			$this->ENABLE_TOP_CLASS_PVP = $config["enable_top_class_pvp"];
			$this->ENABLE_TOP_PK = $config["enable_top_pk"];
			$this->ENABLE_TOP_CLASS_PK = $config["enable_top_class_pk"];
			$this->ENABLE_TOP_ONLINE = $config["enable_top_online"];
			$this->ENABLE_TOP_ADENA = $config["enable_top_adena"];
			$this->ENABLE_TOP_CLAN = $config["enable_top_clan"];
			$this->ENABLE_TOP_CLAN_HALLS = $config["enable_clan_halls"];
			$this->ENABLE_TOP_OLY = $config["enable_top_oly"];
			$this->ENABLE_TOP_HERO = $config["enable_top_hero"];
			$this->ENABLE_TOP_RAID = $config["enable_top_raid"];
			$this->ENABLE_BOSS_STATUS = $config["enable_bosses"];
			$this->ENABLE_CASTLE_SIEGES = $config["enable_castles"];
			$this->ENABLE_VIDEOS_GALLERY = $config["enable_videos"];
			$this->ENABLE_SCREENSHOTS_GALLERY = $config["enable_screenshots"];
			$this->ENABLE_NEWS = $config["enable_news"];
			$this->ALLOW_SERVER_STATS = $config["allow_server_stats"];
			$this->ENABLE_SAFE_ENCHANT_SYSTEM = $config["ENABLE_SAFE_ENCHANT_SYSTEM"];
			$this->enable_messages = $config["enable_messages"];
			$this->chronicle = $config["CHRONICLE"];
		}
		
		public function select_Timezone($selected = '') {
			$OptionsArray = timezone_identifiers_list();
			$select= '<select class="form-select form-select-sm" form="configs" id="serverTimezone" name="timezone">';
			foreach($OptionsArray as $key => $val){
				$select .='<option value="'.$val.'"';
				$select .= ($val == $selected ? ' selected' : null);
				$select .= '>'.$val.'</option>';
			}
			$select.='</select>';
			return $select;
		}
		
		public function showDir($dir, $selected = ''){
			if(!is_dir($dir))
				return null;
			$scan = scandir($dir);
			$select = null;
			foreach($scan as $key => $val){
				if($val[0] == "."){ continue; }
				$select .= '<option value="'.$val.'"';
				$select .= ($val == $selected ? ' selected' : null);
				$select .= '>'.$val.'</option>';
			}
			return $select;
		}
		
		public function chronicle($selected = ''){
			$chronicles = array("Interlude","Hellbound","Kamael","Gracia PT1","Gracia PT2","Gracia Final","Epilogue","Freya","High Five","Classic");
			$select = null;
			foreach($chronicles as $key => $val){
				$select .= '<option value="'.$val.'"';
				$select .= ($val == $selected ? ' selected' : null);
				$select .= '>'.$val.'</option>';
			}
			return $select;
		}
		
		public function percentageFakePlayers($selected = ''){
			$fakeNum = array("5" => 1.05, "10" => 1.1, "15" => 1.15, "20" => 1.2, "25" => 1.25, "30" => 1.3, "35" => 1.35, "40" => 1.4, "45" => 1.45, "50" => 1.5, "55" => 1.55, "60" => 1.6, "65" => 1.65, "70" => 1.7, "75" => 1.75, "80" => 1.8, "85" => 1.85, "90" => 1.9, "95" => 1.95, "100" => 2);
			$select = null;
			foreach($fakeNum as $key => $val){
				$select .= '<option value="'.$val.'"';
				$select .= ($val == $selected ? ' selected' : null);
				$select .= '>'.$key.'%</option>';
			}
			return $select;
		}
		
		public function depositLoc($selected = ''){
			$deposit = array("INVENTORY","WAREHOUSE");
			$select = null;
			foreach($deposit as $key => $val){
				$select .= '<option value="'.$val.'"';
				$select .= ($val == $selected ? ' selected' : null);
				$select .= '>'.$val.'</option>';
			}
			return $select;
		}
		
		public function olympiadsPeriod($selected = ''){
			$periods = array(7,15,30);
			$select = null;
			foreach($periods as $key => $val){
				$select .= '<option value="'.$val.'"';
				$select .= ($val == $selected ? ' selected' : null);
				$select .= '>'.$val.' days</option>';
			}
			return $select;
		}
		
		public function currency($id = ''){
			if($id == "BRL")
				$currency_id = "R$";
			elseif($id == "EUR")
				$currency_id = "€";
			elseif($id == "VES")
				$currency_id = "Bs.";
			elseif($id == "PEN")
				$currency_id = "S/";
			else
				$currency_id = "$";
			return $currency_id;
		}
		
		protected $noPvpItems = " AND i.item_id != '21923' AND i.item_id != '21924' AND i.item_id != '21925' AND i.item_id != '21926' AND i.item_id != '21931' AND i.item_id != '21932' AND i.item_id != '21933' AND i.item_id != '21934' AND i.item_id != '21936' AND i.item_id != '21938' AND i.item_id != '21943' AND i.item_id != '21944' AND i.item_id != '21945' AND i.item_id != '21946' AND i.item_id != '21951' AND i.item_id != '21952' AND i.item_id != '21953' AND i.item_id != '21954' AND i.item_id != '21956' AND i.item_id != '21958' AND i.item_id != '21963' AND i.item_id != '21964' AND i.item_id != '21965' AND i.item_id != '21970' AND i.item_id != '21971' AND i.item_id != '21972' AND i.item_id != '10752' AND i.item_id != '10753' AND i.item_id != '10754' AND i.item_id != '10755' AND i.item_id != '10756' AND i.item_id != '10757' AND i.item_id != '10758' AND i.item_id != '16134' AND i.item_id != '10759' AND i.item_id != '16135' AND i.item_id != '10760' AND i.item_id != '16136' AND i.item_id != '10761' AND i.item_id != '16137' AND i.item_id != '10762' AND i.item_id != '16138' AND i.item_id != '10763' AND i.item_id != '16139' AND i.item_id != '10764' AND i.item_id != '16140' AND i.item_id != '10765' AND i.item_id != '16141' AND i.item_id != '10766' AND i.item_id != '16142' AND i.item_id != '10767' AND i.item_id != '16143' AND i.item_id != '10768' AND i.item_id != '16144' AND i.item_id != '10769' AND i.item_id != '16145' AND i.item_id != '10770' AND i.item_id != '16146' AND i.item_id != '10771' AND i.item_id != '16147' AND i.item_id != '10772' AND i.item_id != '10773' AND i.item_id != '16149' AND i.item_id != '10774' AND i.item_id != '10775' AND i.item_id != '16151' AND i.item_id != '10776' AND i.item_id != '10777' AND i.item_id != '16153' AND i.item_id != '10778' AND i.item_id != '10779' AND i.item_id != '14363' AND i.item_id != '16155' AND i.item_id != '10780' AND i.item_id != '14364' AND i.item_id != '10781' AND i.item_id != '14365' AND i.item_id != '16157' AND i.item_id != '10782' AND i.item_id != '14366' AND i.item_id != '10783' AND i.item_id != '14367' AND i.item_id != '16159' AND i.item_id != '10784' AND i.item_id != '14368' AND i.item_id != '10785' AND i.item_id != '14369' AND i.item_id != '10786' AND i.item_id != '14370' AND i.item_id != '10787' AND i.item_id != '14371' AND i.item_id != '10788' AND i.item_id != '14372' AND i.item_id != '10789' AND i.item_id != '14373' AND i.item_id != '10790' AND i.item_id != '14374' AND i.item_id != '10791' AND i.item_id != '14375' AND i.item_id != '10792' AND i.item_id != '14376' AND i.item_id != '16168' AND i.item_id != '10793' AND i.item_id != '14377' AND i.item_id != '15913' AND i.item_id != '16169' AND i.item_id != '10794' AND i.item_id != '14378' AND i.item_id != '15914' AND i.item_id != '16170' AND i.item_id != '10795' AND i.item_id != '14379' AND i.item_id != '15915' AND i.item_id != '16171' AND i.item_id != '10796' AND i.item_id != '14380' AND i.item_id != '15916' AND i.item_id != '16172' AND i.item_id != '10797' AND i.item_id != '14381' AND i.item_id != '15917' AND i.item_id != '16173' AND i.item_id != '10798' AND i.item_id != '14382' AND i.item_id != '15918' AND i.item_id != '16174' AND i.item_id != '10799' AND i.item_id != '14383' AND i.item_id != '15919' AND i.item_id != '16175' AND i.item_id != '10800' AND i.item_id != '14384' AND i.item_id != '15920' AND i.item_id != '16176' AND i.item_id != '10801' AND i.item_id != '14385' AND i.item_id != '15921' AND i.item_id != '10802' AND i.item_id != '14386' AND i.item_id != '15922' AND i.item_id != '10803' AND i.item_id != '14387' AND i.item_id != '15923' AND i.item_id != '16179' AND i.item_id != '10804' AND i.item_id != '12852' AND i.item_id != '14388' AND i.item_id != '15924' AND i.item_id != '16180' AND i.item_id != '10805' AND i.item_id != '12853' AND i.item_id != '14389' AND i.item_id != '15925' AND i.item_id != '16181' AND i.item_id != '10806' AND i.item_id != '12854' AND i.item_id != '14390' AND i.item_id != '15926' AND i.item_id != '16182' AND i.item_id != '10807' AND i.item_id != '12855' AND i.item_id != '14391' AND i.item_id != '15927' AND i.item_id != '16183' AND i.item_id != '10808' AND i.item_id != '12856' AND i.item_id != '14392' AND i.item_id != '15928' AND i.item_id != '16184' AND i.item_id != '10809' AND i.item_id != '12857' AND i.item_id != '14393' AND i.item_id != '15929' AND i.item_id != '16185' AND i.item_id != '10810' AND i.item_id != '12858' AND i.item_id != '14394' AND i.item_id != '15930' AND i.item_id != '16186' AND i.item_id != '10811' AND i.item_id != '12859' AND i.item_id != '14395' AND i.item_id != '15931' AND i.item_id != '16187' AND i.item_id != '10812' AND i.item_id != '12860' AND i.item_id != '14396' AND i.item_id != '15932' AND i.item_id != '16188' AND i.item_id != '10813' AND i.item_id != '12861' AND i.item_id != '14397' AND i.item_id != '15933' AND i.item_id != '16189' AND i.item_id != '10814' AND i.item_id != '12862' AND i.item_id != '14398' AND i.item_id != '15934' AND i.item_id != '16190' AND i.item_id != '10815' AND i.item_id != '12863' AND i.item_id != '14399' AND i.item_id != '15935' AND i.item_id != '16191' AND i.item_id != '10816' AND i.item_id != '12864' AND i.item_id != '14400' AND i.item_id != '15936' AND i.item_id != '16192' AND i.item_id != '10817' AND i.item_id != '12865' AND i.item_id != '14401' AND i.item_id != '15937' AND i.item_id != '16193' AND i.item_id != '10818' AND i.item_id != '12866' AND i.item_id != '14402' AND i.item_id != '15938' AND i.item_id != '16194' AND i.item_id != '10819' AND i.item_id != '12867' AND i.item_id != '14403' AND i.item_id != '15939' AND i.item_id != '16195' AND i.item_id != '10820' AND i.item_id != '12868' AND i.item_id != '14404' AND i.item_id != '15940' AND i.item_id != '16196' AND i.item_id != '10821' AND i.item_id != '12869' AND i.item_id != '14405' AND i.item_id != '15941' AND i.item_id != '16197' AND i.item_id != '10822' AND i.item_id != '12870' AND i.item_id != '14406' AND i.item_id != '15942' AND i.item_id != '16198' AND i.item_id != '10823' AND i.item_id != '12871' AND i.item_id != '14407' AND i.item_id != '15943' AND i.item_id != '16199' AND i.item_id != '10824' AND i.item_id != '12872' AND i.item_id != '14408' AND i.item_id != '15944' AND i.item_id != '16200' AND i.item_id != '10825' AND i.item_id != '12873' AND i.item_id != '14409' AND i.item_id != '15945' AND i.item_id != '16201' AND i.item_id != '10826' AND i.item_id != '12874' AND i.item_id != '14410' AND i.item_id != '15946' AND i.item_id != '16202' AND i.item_id != '10827' AND i.item_id != '12875' AND i.item_id != '14411' AND i.item_id != '15947' AND i.item_id != '16203' AND i.item_id != '10828' AND i.item_id != '12876' AND i.item_id != '14412' AND i.item_id != '15948' AND i.item_id != '16204' AND i.item_id != '10829' AND i.item_id != '12877' AND i.item_id != '14413' AND i.item_id != '15949' AND i.item_id != '16205' AND i.item_id != '10830' AND i.item_id != '12878' AND i.item_id != '14414' AND i.item_id != '15950' AND i.item_id != '16206' AND i.item_id != '10831' AND i.item_id != '12879' AND i.item_id != '14415' AND i.item_id != '15951' AND i.item_id != '16207' AND i.item_id != '10832' AND i.item_id != '12880' AND i.item_id != '14416' AND i.item_id != '15952' AND i.item_id != '16208' AND i.item_id != '10833' AND i.item_id != '12881' AND i.item_id != '14417' AND i.item_id != '15953' AND i.item_id != '16209' AND i.item_id != '10834' AND i.item_id != '12882' AND i.item_id != '14418' AND i.item_id != '15954' AND i.item_id != '16210' AND i.item_id != '10835' AND i.item_id != '12883' AND i.item_id != '14419' AND i.item_id != '15955' AND i.item_id != '16211' AND i.item_id != '12884' AND i.item_id != '14420' AND i.item_id != '15956' AND i.item_id != '16212' AND i.item_id != '12885' AND i.item_id != '14421' AND i.item_id != '15957' AND i.item_id != '16213' AND i.item_id != '12886' AND i.item_id != '14422' AND i.item_id != '15958' AND i.item_id != '16214' AND i.item_id != '12887' AND i.item_id != '14423' AND i.item_id != '15959' AND i.item_id != '16215' AND i.item_id != '12888' AND i.item_id != '14424' AND i.item_id != '15960' AND i.item_id != '16216' AND i.item_id != '12889' AND i.item_id != '14425' AND i.item_id != '15961' AND i.item_id != '16217' AND i.item_id != '12890' AND i.item_id != '14426' AND i.item_id != '15962' AND i.item_id != '16218' AND i.item_id != '12891' AND i.item_id != '14427' AND i.item_id != '15963' AND i.item_id != '16219' AND i.item_id != '12892' AND i.item_id != '14428' AND i.item_id != '15964' AND i.item_id != '16220' AND i.item_id != '12893' AND i.item_id != '14429' AND i.item_id != '15965' AND i.item_id != '12894' AND i.item_id != '14430' AND i.item_id != '15966' AND i.item_id != '12895' AND i.item_id != '14431' AND i.item_id != '15967' AND i.item_id != '12896' AND i.item_id != '14432' AND i.item_id != '15968' AND i.item_id != '12897' AND i.item_id != '14433' AND i.item_id != '15969' AND i.item_id != '12898' AND i.item_id != '14434' AND i.item_id != '15970' AND i.item_id != '12899' AND i.item_id != '14435' AND i.item_id != '15971' AND i.item_id != '12900' AND i.item_id != '14436' AND i.item_id != '15972' AND i.item_id != '12901' AND i.item_id != '14437' AND i.item_id != '15973' AND i.item_id != '12902' AND i.item_id != '14438' AND i.item_id != '15974' AND i.item_id != '12903' AND i.item_id != '14439' AND i.item_id != '15975' AND i.item_id != '12904' AND i.item_id != '14440' AND i.item_id != '15976' AND i.item_id != '12905' AND i.item_id != '14441' AND i.item_id != '15977' AND i.item_id != '12906' AND i.item_id != '14442' AND i.item_id != '15978' AND i.item_id != '12907' AND i.item_id != '14443' AND i.item_id != '15979' AND i.item_id != '12908' AND i.item_id != '14444' AND i.item_id != '15980' AND i.item_id != '12909' AND i.item_id != '14445' AND i.item_id != '15981' AND i.item_id != '12910' AND i.item_id != '14446' AND i.item_id != '15982' AND i.item_id != '12911' AND i.item_id != '14447' AND i.item_id != '15983' AND i.item_id != '12912' AND i.item_id != '14448' AND i.item_id != '15984' AND i.item_id != '12913' AND i.item_id != '14449' AND i.item_id != '15985' AND i.item_id != '12914' AND i.item_id != '14450' AND i.item_id != '15986' AND i.item_id != '12915' AND i.item_id != '14451' AND i.item_id != '15987' AND i.item_id != '12916' AND i.item_id != '14452' AND i.item_id != '15988' AND i.item_id != '12917' AND i.item_id != '14453' AND i.item_id != '15989' AND i.item_id != '12918' AND i.item_id != '14454' AND i.item_id != '15990' AND i.item_id != '12919' AND i.item_id != '14455' AND i.item_id != '15991' AND i.item_id != '12920' AND i.item_id != '14456' AND i.item_id != '15992' AND i.item_id != '12921' AND i.item_id != '14457' AND i.item_id != '15993' AND i.item_id != '12922' AND i.item_id != '14458' AND i.item_id != '15994' AND i.item_id != '12923' AND i.item_id != '14459' AND i.item_id != '15995' AND i.item_id != '12924' AND i.item_id != '14460' AND i.item_id != '15996' AND i.item_id != '12925' AND i.item_id != '14461' AND i.item_id != '15997' AND i.item_id != '12926' AND i.item_id != '14462' AND i.item_id != '15998' AND i.item_id != '12927' AND i.item_id != '14463' AND i.item_id != '15999' AND i.item_id != '12928' AND i.item_id != '14464' AND i.item_id != '16000' AND i.item_id != '12929' AND i.item_id != '14465' AND i.item_id != '16001' AND i.item_id != '12930' AND i.item_id != '14466' AND i.item_id != '16002' AND i.item_id != '12931' AND i.item_id != '14467' AND i.item_id != '16003' AND i.item_id != '12932' AND i.item_id != '14468' AND i.item_id != '16004' AND i.item_id != '12933' AND i.item_id != '14469' AND i.item_id != '16005' AND i.item_id != '12934' AND i.item_id != '14470' AND i.item_id != '16006' AND i.item_id != '12935' AND i.item_id != '14471' AND i.item_id != '16007' AND i.item_id != '12936' AND i.item_id != '14472' AND i.item_id != '16008' AND i.item_id != '12937' AND i.item_id != '14473' AND i.item_id != '16009' AND i.item_id != '12938' AND i.item_id != '14474' AND i.item_id != '16010' AND i.item_id != '12939' AND i.item_id != '14475' AND i.item_id != '16011' AND i.item_id != '12940' AND i.item_id != '14476' AND i.item_id != '16012' AND i.item_id != '12941' AND i.item_id != '14477' AND i.item_id != '16013' AND i.item_id != '12942' AND i.item_id != '14478' AND i.item_id != '16014' AND i.item_id != '12943' AND i.item_id != '14479' AND i.item_id != '16015' AND i.item_id != '12944' AND i.item_id != '14480' AND i.item_id != '16016' AND i.item_id != '12945' AND i.item_id != '14481' AND i.item_id != '16017' AND i.item_id != '12946' AND i.item_id != '14482' AND i.item_id != '16018' AND i.item_id != '12947' AND i.item_id != '14483' AND i.item_id != '16019' AND i.item_id != '12948' AND i.item_id != '14484' AND i.item_id != '16020' AND i.item_id != '12949' AND i.item_id != '14485' AND i.item_id != '16021' AND i.item_id != '12950' AND i.item_id != '14486' AND i.item_id != '16022' AND i.item_id != '12951' AND i.item_id != '14487' AND i.item_id != '16023' AND i.item_id != '12952' AND i.item_id != '14488' AND i.item_id != '16024' AND i.item_id != '12953' AND i.item_id != '14489' AND i.item_id != '12954' AND i.item_id != '14490' AND i.item_id != '12955' AND i.item_id != '14491' AND i.item_id != '12956' AND i.item_id != '14492' AND i.item_id != '12957' AND i.item_id != '14493' AND i.item_id != '12958' AND i.item_id != '14494' AND i.item_id != '12959' AND i.item_id != '14495' AND i.item_id != '12960' AND i.item_id != '14496' AND i.item_id != '12961' AND i.item_id != '14497' AND i.item_id != '12962' AND i.item_id != '14498' AND i.item_id != '12963' AND i.item_id != '14499' AND i.item_id != '12964' AND i.item_id != '14500' AND i.item_id != '12965' AND i.item_id != '14501' AND i.item_id != '12966' AND i.item_id != '14502' AND i.item_id != '12967' AND i.item_id != '14503' AND i.item_id != '12968' AND i.item_id != '14504' AND i.item_id != '12969' AND i.item_id != '14505' AND i.item_id != '12970' AND i.item_id != '14506' AND i.item_id != '10667' AND i.item_id != '12971' AND i.item_id != '14507' AND i.item_id != '10668' AND i.item_id != '12972' AND i.item_id != '14508' AND i.item_id != '10669' AND i.item_id != '12973' AND i.item_id != '14509' AND i.item_id != '10670' AND i.item_id != '12974' AND i.item_id != '14510' AND i.item_id != '10671' AND i.item_id != '12975' AND i.item_id != '14511' AND i.item_id != '10672' AND i.item_id != '12976' AND i.item_id != '14512' AND i.item_id != '10673' AND i.item_id != '12977' AND i.item_id != '14513' AND i.item_id != '10674' AND i.item_id != '14514' AND i.item_id != '10675' AND i.item_id != '14515' AND i.item_id != '10676' AND i.item_id != '14516' AND i.item_id != '10677' AND i.item_id != '14517' AND i.item_id != '10678' AND i.item_id != '14518' AND i.item_id != '10679' AND i.item_id != '14519' AND i.item_id != '10680' AND i.item_id != '14520' AND i.item_id != '10681' AND i.item_id != '14521' AND i.item_id != '10682' AND i.item_id != '14522' AND i.item_id != '10683' AND i.item_id != '14523' AND i.item_id != '10684' AND i.item_id != '14524' AND i.item_id != '10685' AND i.item_id != '14525' AND i.item_id != '10686' AND i.item_id != '10687' AND i.item_id != '10688' AND i.item_id != '14528' AND i.item_id != '10689' AND i.item_id != '14529' AND i.item_id != '10690' AND i.item_id != '10691' AND i.item_id != '10692' AND i.item_id != '10693' AND i.item_id != '10694' AND i.item_id != '10695' AND i.item_id != '10696' AND i.item_id != '10697' AND i.item_id != '10698' AND i.item_id != '10699' AND i.item_id != '10700' AND i.item_id != '10701' AND i.item_id != '10702' AND i.item_id != '10703' AND i.item_id != '10704' AND i.item_id != '10705' AND i.item_id != '10706' AND i.item_id != '10707' AND i.item_id != '10708' AND i.item_id != '10709' AND i.item_id != '10710' AND i.item_id != '10711' AND i.item_id != '10712' AND i.item_id != '10713' AND i.item_id != '10714' AND i.item_id != '10715' AND i.item_id != '10716' AND i.item_id != '10717' AND i.item_id != '10718' AND i.item_id != '14558' AND i.item_id != '10719' AND i.item_id != '10720' AND i.item_id != '10721' AND i.item_id != '10722' AND i.item_id != '10723' AND i.item_id != '10724' AND i.item_id != '10725' AND i.item_id != '10726' AND i.item_id != '10727' AND i.item_id != '10728' AND i.item_id != '10729' AND i.item_id != '10730' AND i.item_id != '10731' AND i.item_id != '10732' AND i.item_id != '10733' AND i.item_id != '10734' AND i.item_id != '10735' AND i.item_id != '10736' AND i.item_id != '10737' AND i.item_id != '10738' AND i.item_id != '10739' AND i.item_id != '10740' AND i.item_id != '10741' AND i.item_id != '10742' AND i.item_id != '10743' AND i.item_id != '10744' AND i.item_id != '10745' AND i.item_id != '10746' AND i.item_id != '10747' AND i.item_id != '10748' AND i.item_id != '10749' AND i.item_id != '10750' AND i.item_id != '10751'";
		
		public function filter($value, $string = false) {
			return $string ? str_replace("\'", "&apos;", addslashes(trim($value))) : preg_replace("/(\D)/i" , "" , $value);
		}
		
		public function classe_name($classe_id){
			switch ($classe_id){
				case 0:
					$class = "Fighter"; break;
				case 1:
					$class = "Warrior"; break;
				case 2:
					$class = "Gladiator"; break;
				case 3:
					$class = "Warlord"; break;
				case 4:
					$class = "Knight"; break;
				case 5:
					$class = "Paladin"; break;
				case 6:
					$class = "Dark Avenger"; break;
				case 7:
					$class = "Rogue"; break;
				case 8:
					$class = "Treasure Hunter"; break;
				case 9:
					$class = "Hawkeye"; break;
				case 10:
					$class = "Mage"; break;
				case 11:
					$class = "Wizard"; break;
				case 12:
					$class = "Sorceror"; break;
				case 13:
					$class = "Necromancer"; break;
				case 14:
					$class = "Warlock"; break;
				case 15:
					$class = "Cleric"; break;
				case 16:
					$class = "Bishop"; break;
				case 17:
					$class = "Prophet"; break;
				case 18:
					$class = "Fighter"; break;
				case 19:
					$class = "Knight"; break;
				case 20:
					$class = "Temple Knight"; break;
				case 21:
					$class = "Sword Singer"; break;
				case 22:
					$class = "Scout"; break;
				case 23:
					$class = "PlainsWalker"; break;
				case 24:
					$class = "SilverRanger"; break;
				case 25:
					$class = "Mage"; break;
				case 26:
					$class = "Wizard"; break;
				case 27:
					$class = "Spell Singer"; break;
				case 28:
					$class = "Elemental Summoner"; break;
				case 29:
					$class = "Oracle"; break;
				case 30:
					$class = "Elder"; break;
				case 31:
					$class = "Fighter"; break;
				case 32:
					$class = "Paulus Knight"; break;
				case 33:
					$class = "Shillien Knight"; break;
				case 34:
					$class = "Blade Dancer"; break;
				case 35:
					$class = "Assassin"; break;
				case 36:
					$class = "Abyss Walker"; break;
				case 37:
					$class = "Phantom Ranger"; break;
				case 38:
					$class = "Mage"; break;
				case 39:
					$class = "Dark Wizard"; break;
				case 40:
					$class = "Spellhowler"; break;
				case 41:
					$class = "Phantom Summoner"; break;
				case 42:
					$class = "Shillien Oracle"; break;
				case 43:
					$class = "Shillien Elder"; break;
				case 44:
					$class = "Fighter"; break;
				case 45:
					$class = "Raider"; break;
				case 46:
					$class = "Destroyer"; break;
				case 47:
					$class = "Monk"; break;
				case 48:
					$class = "Tyrant"; break;
				case 49:
					$class = "Mage"; break;
				case 50:
					$class = "Shaman"; break;
				case 51:
					$class = "Overlord"; break;
				case 52:
					$class = "Warcryer"; break;
				case 53:
					$class = "Fighter"; break;
				case 54:
					$class = "Scavenger"; break;
				case 55:
					$class = "BountyHunter"; break;
				case 56:
					$class = "Artisan"; break;
				case 57:
					$class = "Warsmith"; break;
				case 88:
					$class = "Duelist"; break;
				case 89:
					$class = "Dreadnought"; break;
				case 90:
					$class = "Phoenix Knight"; break;
				case 91:
					$class = "Hell Knight"; break;
				case 92:
					$class = "Sagittarius"; break;
				case 93:
					$class = "Adventurer"; break;
				case 94:
					$class = "Archmage"; break;
				case 95:
					$class = "Soultaker"; break;
				case 96:
					$class = "Arcana Lord"; break;
				case 97:
					$class = "Cardinal"; break;
				case 98:
					$class = "Hierophant"; break;
				case 99:
					$class = "Eva Templar"; break;
				case 100:
					$class = "Sword Muse"; break;
				case 101:
					$class = "Wind Rider"; break;
				case 102:
					$class = "Moonlight Sentinel"; break;
				case 103:
					$class = "Mystic Muse"; break;
				case 104:
					$class = "Elemental Master"; break;
				case 105:
					$class = "Eva Saint"; break;
				case 106:
					$class = "Shillien Templar"; break;
				case 107:
					$class = "Spectral Dancer"; break;
				case 108:
					$class = "Ghost Hunter"; break;
				case 109:
					$class = "Ghost Sentinel"; break;
				case 110:
					$class = "Storm Screamer"; break;
				case 111:
					$class = "Spectral Master"; break;
				case 112:
					$class = "Shillien Saint"; break;
				case 113:
					$class = "Titan"; break;
				case 114:
					$class = "Grand Khauatari"; break;
				case 115:
					$class = "Dominator"; break;
				case 116:
					$class = "Doomcryer"; break;
				case 117:
					$class = "Fortune Seeker"; break;
				case 118:
					$class = "Maestro"; break;
				case 123:
					$class = "Male Soldier"; break;
				case 124:
					$class = "Female Soldier"; break;
				case 125:
					$class = "Trooper"; break;
				case 126:
					$class = "Warder"; break;
				case 127:
					$class = "Berserker"; break;
				case 128:
					$class = "Male Soulbreaker"; break;
				case 129:
					$class = "Female Soulbreaker"; break;
				case 130:
					$class = "Arbalester"; break;
				case 131:
					$class = "Doombringer"; break;
				case 132:
					$class = "Male Soulhound"; break;
				case 133:
					$class = "Female Soulhound"; break;
				case 134:
					$class = "Trickster"; break;
				case 135:
					$class = "Inspector"; break;
				case 136:
					$class = "Judicator"; break;
				default:
					$class = "n/a"; break;
			}
			return $class;
		}
		
		function clanHallName($id){
			switch ($id){
				case 21:
					$name = "Fortress of Resistance"; break;
				case 22:
					$name = "Moonstone Hall"; break;
				case 23:
					$name = "Onyx Hall"; break;
				case 24:
					$name = "Topaz Hall"; break;
				case 25:
					$name = "Ruby Hall"; break;
				case 26:
					$name = "Crystal Hall"; break;
				case 27:
					$name = "Onyx Hall"; break;
				case 28:
					$name = "Sapphire Hall"; break;
				case 29:
					$name = "Moonstone Hall"; break;
				case 30:
					$name = "Emerald Hall"; break;
				case 31:
					$name = "The Atramental Barracks"; break;
				case 32:
					$name = "The Scarlet Barracks"; break;
				case 33:
					$name = "The Viridian Barracks"; break;
				case 34:
					$name = "Devastated Castle"; break;
				case 35:
					$name = "Bandit Stronghold"; break;
				case 36:
					$name = "The Golden Chamber"; break;
				case 37:
					$name = "The Silver Chamber"; break;
				case 38:
					$name = "The Mithril Chamber"; break;
				case 39:
					$name = "Silver Manor"; break;
				case 40:
					$name = "Gold Manor"; break;
				case 41:
					$name = "The Bronze Chamber"; break;
				case 42:
					$name = "The Golden Chamber"; break;
				case 43:
					$name = "The Silver Chamber"; break;
				case 44:
					$name = "The Mithril Chamber"; break;
				case 45:
					$name = "The Bronze Chamber"; break;
				case 46:
					$name = "Silver Manor"; break;
				case 47:
					$name = "Moonstone Hall"; break;
				case 48:
					$name = "Onyx Hall"; break;
				case 49:
					$name = "Emerald Hall"; break;
				case 50:
					$name = "Sapphire Hall"; break;
				case 51:
					$name = "Mont Chamber"; break;
				case 52:
					$name = "Astaire Chamber"; break;
				case 53:
					$name = "Aria Chamber"; break;
				case 54:
					$name = "Yiana Chamber"; break;
				case 55:
					$name = "Roien Chamber"; break;
				case 56:
					$name = "Luna Chamber"; break;
				case 57:
					$name = "Traban Chamber"; break;
				case 58:
					$name = "Eisen Hall"; break;
				case 59:
					$name = "Heavy Metal Hall"; break;
				case 60:
					$name = "Molten Ore Hall"; break;
				case 61:
					$name = "Titan Hall"; break;
				case 62:
					$name = "Rainbow Springs"; break;
				case 63:
					$name = "Beast Farm"; break;
				case 64:
					$name = "Fortress of the Dead"; break;
				case 65:
					$name = "Emerald Hall"; break;
				case 66:
					$name = "Crystal Hall"; break;
				case 67:
					$name = "Sapphire Hall"; break;
				case 68:
					$name = "Aquamarine Hall"; break;
				case 69:
					$name = "Blue Barracks"; break;
				case 70:
					$name = "Brown Barracks"; break;
				case 71:
					$name = "Yellow Barracks"; break;
				case 72:
					$name = "White Barracks"; break;
				case 73:
					$name = "Black Barracks"; break;
				case 74:
					$name = "Green Barracks"; break;
				default:
					$name = "n/a"; break;
			}
			return $name;
		}
		
		function clanHallLoc($id){
			if($id >= 22 && $id <= 25)
				$loc = "Gludio";
			elseif($id >= 26 && $id <= 30)
				$loc = "Gludin";
			elseif($id >= 31 && $id <= 33)
				$loc = "Dion";
			elseif($id >= 36 && $id <= 41)
				$loc = "Aden";
			elseif($id >= 42 && $id <= 46)
				$loc = "Giran";
			elseif($id >= 47 && $id <= 50)
				$loc = "Goddard";
			elseif($id >= 51 && $id <= 57)
				$loc = "Rune";
			elseif($id >= 58 && $id <= 61)
				$loc = "Schuttgart";
			elseif($id >= 65 && $id <= 68)
				$loc = "Gludio";
			elseif($id >= 69 && $id <= 72)
				$loc = "Dion";
			elseif($id >= 73 && $id <= 74)
				$loc = "Floran";
			else
				$loc = null;
			return $loc;
		}
		
		public function remainingTime($data,$abrevia = false) {
			$diff = time() - (time() - $data);
			$calc1 = ($diff % 86400);
			$calc2 = ($diff % 3600);
			$dias  = floor($diff / 86400);
			$horas = floor($calc1 / 3600);
			$minut = floor($calc2 / 60);
			$segun = ($calc2 % 60);
			$return = null;
			$return .= $dias > 0 ? "<strong>".$dias."</strong>" : null;
			$return .= $dias > 0 ? $abrevia ? "d, " : " day(s), " : null;
			$return .= $horas > 0 ? "<strong>".$horas."</strong>" : null;
			$return .= $horas > 0 ? $abrevia ? "h, " : " hour(s), " : null;
			$return .= $minut > 0 ? "<strong>".$minut."</strong>" : null;
			$return .= $minut > 0 ? $abrevia ? "m, " : " minute(s), " : null;
			$return .= $segun >= 0 ? "<strong>".$segun."</strong>" : null;
			$return .= $segun >= 0 ? $abrevia ? "s." : " second(s)." : null;
			return $return;
		}
		
		protected function info_table($tabela,$coluna){
			$tabela = strtolower($tabela);
			$coluna = strtolower($coluna);
			if($this->db_type){
				$stmt = $this->gameConn->prepare('SHOW COLUMNS FROM '.$tabela);
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
		
		public function kkk($qtd){
			$qtdk = null;
			if($qtd >= 1000){
				$ponto = null;
				$qtd = number_format($qtd,0,'.','.');
				$qt = explode(".", $qtd);
				for($k=0;$k<(count($qt)-1);$k++){
					if((count($qt) - 1) != '0'){
						$qtdk .= 'K';
					}else{
						$qtdk .= null;
					}
					$p = $k;
				}
				for($pt=0;$pt<$p;$pt++){
					$ponto .= '.';
				}
				$qtda = substr(str_replace("0", "", $qtd), 0, 3);
				if($qtda == substr(str_replace("0", "", $qtd), 0, 1)."." and strlen(preg_replace("/(\D)/i" , "" , $qtd."'")) == 6){
					$qtda = substr(str_replace("0", "", $qtd), 0, 1)."00";
				}elseif($qtda == substr(str_replace("0", "", $qtd), 0, 1)."." and strlen(preg_replace("/(\D)/i" , "" , $qtd."'")) == 5){
					$qtda = substr(str_replace("0", "", $qtd), 0, 1)."0";
				}elseif($qtda == substr(str_replace("0", "", $qtd), 0, 1)."."){
					$qtda = substr(str_replace("0", "", $qtd), 0, 1);
				}elseif($qtda == substr(str_replace("0", "", $qtd), 0, 1).".." and strlen(preg_replace("/(\D)/i" , "" , $qtd."'")) == 9){
					$qtda = substr(str_replace("0", "", $qtd), 0, 1)."00";
				}elseif($qtda == substr(str_replace("0", "", $qtd), 0, 1).".." and strlen(preg_replace("/(\D)/i" , "" , $qtd."'")) == 8){
					$qtda = substr(str_replace("0", "", $qtd), 0, 1)."0";
				}elseif($qtda == substr(str_replace("0", "", $qtd), 0, 1).".."){
					$qtda = substr(str_replace("0", "", $qtd), 0, 1);
				}elseif($qtda == substr(str_replace("0", "", $qtd), 0, 1)){
					$qtda = substr(str_replace("0", "", $qtd), 0, 1);
				}elseif($qtda == substr(str_replace("0", "", $qtd), 0, 2).$ponto and strlen(preg_replace("/(\D)/i" , "" , $qtd."'").$ponto) == 6){
					$qtda = substr(str_replace("0", "", $qtd), 0, 2)."0";
				}elseif($qtda == substr(str_replace("0", "", $qtd), 0, 2).$ponto and strlen(preg_replace("/(\D)/i" , "" , $qtd."'").$ponto) == 5){
					$qtda = substr(str_replace("0", "", $qtd), 0, 2);
				}elseif($qtda == substr(str_replace("0", "", $qtd), 0, 2).$ponto and strlen(preg_replace("/(\D)/i" , "" , $qtd."'").$ponto) == 10){
					$qtda = substr(str_replace("0", "", $qtd), 0, 2)."0";
				}elseif($qtda == substr(str_replace("0", "", $qtd), 0, 2).$ponto and strlen(preg_replace("/(\D)/i" , "" , $qtd."'").$ponto) == 9){
					$qtda = substr(str_replace("0", "", $qtd), 0, 2);
				}
			}else{
				$qtda = $qtd;
			}
			return $qtda.$qtdk;
		}
		
		public function pagination($num_page, $registers){
			$url = explode("?", $_SERVER['REQUEST_URI']);
			$url2 = explode("&", $url[1]);
			$link = null;
			for($y=0;$y<count($url2);$y++){
				$url3 = explode("=", $url2[$y]);
				if($url3[0] != "page"){
					$link .= $y == 0 ? "?" : "&";
					$link .= $url3[0]."=".$url3[1];
				}
			}
			$pagination = null;
			if($registers > 0){
				if($num_page > 0){
					$pagination .= "<a href=\"index.php".$link."&page=".($num_page-1)."\" class=\"pag\"><b>&laquo; Previous</b></a>";
				}else{
					$pagination .= "<a onclick='return false;' class=\"desatived\">&laquo; Previous</a>";
				}
				for($x=1;$x<=$registers;$x++){
					if($num_page == ($x-1)){
						$pagination .= "&nbsp;<a onclick='return false;' class=\"atual\">[".$x."]</a>&nbsp;";
					}else{
						$pagination .= "&nbsp;<a href=\"index.php".$link."&page=".($x-1)."\" class=\"pag\"><b>".$x."</b></a>&nbsp;";
					}
				}
				if(($num_page+1) < $registers){
					$pagination .= "<a href=\"index.php".$link."&page=".($num_page+1)."\" class=\"pag\"><b>Next &raquo;</b></a>";
				}else{
					$pagination .= "<a onclick='return false;' class=\"desatived\">Next &raquo;</a>";
				}
			}
			return $pagination;
		}
		
		public function paginationPanel($num_page, $registers){
			$url = explode("?", $_SERVER['REQUEST_URI']);
			$url2 = explode("&", $url[1]);
			$link = null;
			for($y=0;$y<count($url2);$y++){
				$url3 = explode("=", $url2[$y]);
				if($url3[0] != "page"){
					$link .= $y == 0 ? "?" : "&";
					$link .= $url3[0]."=".$url3[1];
				}
			}
			$pagination = null;
			if($registers > 0){
				if($num_page > 0){
					$pagination .= "<li class=\"page-item\"><a href=\"index.php".$link."&page=".($num_page-1)."\" class=\"page-link\"><b>&laquo; Previous</b></a></li>";
				}else{
					$pagination .= "<li class=\"page-item disabled\"><a onclick='return false;' class=\"page-link\" tabindex=\"-1\">&laquo; Previous</a></li>";
				}
				for($x=1;$x<=$registers;$x++){
					if($num_page == ($x-1)){
						$pagination .= "<li class=\"page-item active\"><span class=\"page-link\"><span class=\"sr-only\">".$x."</span></span></li>";
					}else{
						$pagination .= "<li class=\"page-item\"><a href=\"index.php".$link."&page=".($x-1)."\" class=\"page-link\"><b>".$x."</b></a></li>";
					}
				}
				if(($num_page+1) < $registers){
					$pagination .= "<li class=\"page-item\"><a href=\"index.php".$link."&page=".($num_page+1)."\" class=\"page-link\"><b>Next &raquo;</b></a></li>";
				}else{
					$pagination .= "<li class=\"page-item disabled\"><a onclick='return false;' class=\"page-link\">Next &raquo;</a></li>";
				}
			}
			return $pagination;
		}

	}

}