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
	
	class GameServer {
		
		private $noPvpItems = " AND i.item_id != '21923' AND i.item_id != '21924' AND i.item_id != '21925' AND i.item_id != '21926' AND i.item_id != '21931' AND i.item_id != '21932' AND i.item_id != '21933' AND i.item_id != '21934' AND i.item_id != '21936' AND i.item_id != '21938' AND i.item_id != '21943' AND i.item_id != '21944' AND i.item_id != '21945' AND i.item_id != '21946' AND i.item_id != '21951' AND i.item_id != '21952' AND i.item_id != '21953' AND i.item_id != '21954' AND i.item_id != '21956' AND i.item_id != '21958' AND i.item_id != '21963' AND i.item_id != '21964' AND i.item_id != '21965' AND i.item_id != '21970' AND i.item_id != '21971' AND i.item_id != '21972' AND i.item_id != '10752' AND i.item_id != '10753' AND i.item_id != '10754' AND i.item_id != '10755' AND i.item_id != '10756' AND i.item_id != '10757' AND i.item_id != '10758' AND i.item_id != '16134' AND i.item_id != '10759' AND i.item_id != '16135' AND i.item_id != '10760' AND i.item_id != '16136' AND i.item_id != '10761' AND i.item_id != '16137' AND i.item_id != '10762' AND i.item_id != '16138' AND i.item_id != '10763' AND i.item_id != '16139' AND i.item_id != '10764' AND i.item_id != '16140' AND i.item_id != '10765' AND i.item_id != '16141' AND i.item_id != '10766' AND i.item_id != '16142' AND i.item_id != '10767' AND i.item_id != '16143' AND i.item_id != '10768' AND i.item_id != '16144' AND i.item_id != '10769' AND i.item_id != '16145' AND i.item_id != '10770' AND i.item_id != '16146' AND i.item_id != '10771' AND i.item_id != '16147' AND i.item_id != '10772' AND i.item_id != '10773' AND i.item_id != '16149' AND i.item_id != '10774' AND i.item_id != '10775' AND i.item_id != '16151' AND i.item_id != '10776' AND i.item_id != '10777' AND i.item_id != '16153' AND i.item_id != '10778' AND i.item_id != '10779' AND i.item_id != '14363' AND i.item_id != '16155' AND i.item_id != '10780' AND i.item_id != '14364' AND i.item_id != '10781' AND i.item_id != '14365' AND i.item_id != '16157' AND i.item_id != '10782' AND i.item_id != '14366' AND i.item_id != '10783' AND i.item_id != '14367' AND i.item_id != '16159' AND i.item_id != '10784' AND i.item_id != '14368' AND i.item_id != '10785' AND i.item_id != '14369' AND i.item_id != '10786' AND i.item_id != '14370' AND i.item_id != '10787' AND i.item_id != '14371' AND i.item_id != '10788' AND i.item_id != '14372' AND i.item_id != '10789' AND i.item_id != '14373' AND i.item_id != '10790' AND i.item_id != '14374' AND i.item_id != '10791' AND i.item_id != '14375' AND i.item_id != '10792' AND i.item_id != '14376' AND i.item_id != '16168' AND i.item_id != '10793' AND i.item_id != '14377' AND i.item_id != '15913' AND i.item_id != '16169' AND i.item_id != '10794' AND i.item_id != '14378' AND i.item_id != '15914' AND i.item_id != '16170' AND i.item_id != '10795' AND i.item_id != '14379' AND i.item_id != '15915' AND i.item_id != '16171' AND i.item_id != '10796' AND i.item_id != '14380' AND i.item_id != '15916' AND i.item_id != '16172' AND i.item_id != '10797' AND i.item_id != '14381' AND i.item_id != '15917' AND i.item_id != '16173' AND i.item_id != '10798' AND i.item_id != '14382' AND i.item_id != '15918' AND i.item_id != '16174' AND i.item_id != '10799' AND i.item_id != '14383' AND i.item_id != '15919' AND i.item_id != '16175' AND i.item_id != '10800' AND i.item_id != '14384' AND i.item_id != '15920' AND i.item_id != '16176' AND i.item_id != '10801' AND i.item_id != '14385' AND i.item_id != '15921' AND i.item_id != '10802' AND i.item_id != '14386' AND i.item_id != '15922' AND i.item_id != '10803' AND i.item_id != '14387' AND i.item_id != '15923' AND i.item_id != '16179' AND i.item_id != '10804' AND i.item_id != '12852' AND i.item_id != '14388' AND i.item_id != '15924' AND i.item_id != '16180' AND i.item_id != '10805' AND i.item_id != '12853' AND i.item_id != '14389' AND i.item_id != '15925' AND i.item_id != '16181' AND i.item_id != '10806' AND i.item_id != '12854' AND i.item_id != '14390' AND i.item_id != '15926' AND i.item_id != '16182' AND i.item_id != '10807' AND i.item_id != '12855' AND i.item_id != '14391' AND i.item_id != '15927' AND i.item_id != '16183' AND i.item_id != '10808' AND i.item_id != '12856' AND i.item_id != '14392' AND i.item_id != '15928' AND i.item_id != '16184' AND i.item_id != '10809' AND i.item_id != '12857' AND i.item_id != '14393' AND i.item_id != '15929' AND i.item_id != '16185' AND i.item_id != '10810' AND i.item_id != '12858' AND i.item_id != '14394' AND i.item_id != '15930' AND i.item_id != '16186' AND i.item_id != '10811' AND i.item_id != '12859' AND i.item_id != '14395' AND i.item_id != '15931' AND i.item_id != '16187' AND i.item_id != '10812' AND i.item_id != '12860' AND i.item_id != '14396' AND i.item_id != '15932' AND i.item_id != '16188' AND i.item_id != '10813' AND i.item_id != '12861' AND i.item_id != '14397' AND i.item_id != '15933' AND i.item_id != '16189' AND i.item_id != '10814' AND i.item_id != '12862' AND i.item_id != '14398' AND i.item_id != '15934' AND i.item_id != '16190' AND i.item_id != '10815' AND i.item_id != '12863' AND i.item_id != '14399' AND i.item_id != '15935' AND i.item_id != '16191' AND i.item_id != '10816' AND i.item_id != '12864' AND i.item_id != '14400' AND i.item_id != '15936' AND i.item_id != '16192' AND i.item_id != '10817' AND i.item_id != '12865' AND i.item_id != '14401' AND i.item_id != '15937' AND i.item_id != '16193' AND i.item_id != '10818' AND i.item_id != '12866' AND i.item_id != '14402' AND i.item_id != '15938' AND i.item_id != '16194' AND i.item_id != '10819' AND i.item_id != '12867' AND i.item_id != '14403' AND i.item_id != '15939' AND i.item_id != '16195' AND i.item_id != '10820' AND i.item_id != '12868' AND i.item_id != '14404' AND i.item_id != '15940' AND i.item_id != '16196' AND i.item_id != '10821' AND i.item_id != '12869' AND i.item_id != '14405' AND i.item_id != '15941' AND i.item_id != '16197' AND i.item_id != '10822' AND i.item_id != '12870' AND i.item_id != '14406' AND i.item_id != '15942' AND i.item_id != '16198' AND i.item_id != '10823' AND i.item_id != '12871' AND i.item_id != '14407' AND i.item_id != '15943' AND i.item_id != '16199' AND i.item_id != '10824' AND i.item_id != '12872' AND i.item_id != '14408' AND i.item_id != '15944' AND i.item_id != '16200' AND i.item_id != '10825' AND i.item_id != '12873' AND i.item_id != '14409' AND i.item_id != '15945' AND i.item_id != '16201' AND i.item_id != '10826' AND i.item_id != '12874' AND i.item_id != '14410' AND i.item_id != '15946' AND i.item_id != '16202' AND i.item_id != '10827' AND i.item_id != '12875' AND i.item_id != '14411' AND i.item_id != '15947' AND i.item_id != '16203' AND i.item_id != '10828' AND i.item_id != '12876' AND i.item_id != '14412' AND i.item_id != '15948' AND i.item_id != '16204' AND i.item_id != '10829' AND i.item_id != '12877' AND i.item_id != '14413' AND i.item_id != '15949' AND i.item_id != '16205' AND i.item_id != '10830' AND i.item_id != '12878' AND i.item_id != '14414' AND i.item_id != '15950' AND i.item_id != '16206' AND i.item_id != '10831' AND i.item_id != '12879' AND i.item_id != '14415' AND i.item_id != '15951' AND i.item_id != '16207' AND i.item_id != '10832' AND i.item_id != '12880' AND i.item_id != '14416' AND i.item_id != '15952' AND i.item_id != '16208' AND i.item_id != '10833' AND i.item_id != '12881' AND i.item_id != '14417' AND i.item_id != '15953' AND i.item_id != '16209' AND i.item_id != '10834' AND i.item_id != '12882' AND i.item_id != '14418' AND i.item_id != '15954' AND i.item_id != '16210' AND i.item_id != '10835' AND i.item_id != '12883' AND i.item_id != '14419' AND i.item_id != '15955' AND i.item_id != '16211' AND i.item_id != '12884' AND i.item_id != '14420' AND i.item_id != '15956' AND i.item_id != '16212' AND i.item_id != '12885' AND i.item_id != '14421' AND i.item_id != '15957' AND i.item_id != '16213' AND i.item_id != '12886' AND i.item_id != '14422' AND i.item_id != '15958' AND i.item_id != '16214' AND i.item_id != '12887' AND i.item_id != '14423' AND i.item_id != '15959' AND i.item_id != '16215' AND i.item_id != '12888' AND i.item_id != '14424' AND i.item_id != '15960' AND i.item_id != '16216' AND i.item_id != '12889' AND i.item_id != '14425' AND i.item_id != '15961' AND i.item_id != '16217' AND i.item_id != '12890' AND i.item_id != '14426' AND i.item_id != '15962' AND i.item_id != '16218' AND i.item_id != '12891' AND i.item_id != '14427' AND i.item_id != '15963' AND i.item_id != '16219' AND i.item_id != '12892' AND i.item_id != '14428' AND i.item_id != '15964' AND i.item_id != '16220' AND i.item_id != '12893' AND i.item_id != '14429' AND i.item_id != '15965' AND i.item_id != '12894' AND i.item_id != '14430' AND i.item_id != '15966' AND i.item_id != '12895' AND i.item_id != '14431' AND i.item_id != '15967' AND i.item_id != '12896' AND i.item_id != '14432' AND i.item_id != '15968' AND i.item_id != '12897' AND i.item_id != '14433' AND i.item_id != '15969' AND i.item_id != '12898' AND i.item_id != '14434' AND i.item_id != '15970' AND i.item_id != '12899' AND i.item_id != '14435' AND i.item_id != '15971' AND i.item_id != '12900' AND i.item_id != '14436' AND i.item_id != '15972' AND i.item_id != '12901' AND i.item_id != '14437' AND i.item_id != '15973' AND i.item_id != '12902' AND i.item_id != '14438' AND i.item_id != '15974' AND i.item_id != '12903' AND i.item_id != '14439' AND i.item_id != '15975' AND i.item_id != '12904' AND i.item_id != '14440' AND i.item_id != '15976' AND i.item_id != '12905' AND i.item_id != '14441' AND i.item_id != '15977' AND i.item_id != '12906' AND i.item_id != '14442' AND i.item_id != '15978' AND i.item_id != '12907' AND i.item_id != '14443' AND i.item_id != '15979' AND i.item_id != '12908' AND i.item_id != '14444' AND i.item_id != '15980' AND i.item_id != '12909' AND i.item_id != '14445' AND i.item_id != '15981' AND i.item_id != '12910' AND i.item_id != '14446' AND i.item_id != '15982' AND i.item_id != '12911' AND i.item_id != '14447' AND i.item_id != '15983' AND i.item_id != '12912' AND i.item_id != '14448' AND i.item_id != '15984' AND i.item_id != '12913' AND i.item_id != '14449' AND i.item_id != '15985' AND i.item_id != '12914' AND i.item_id != '14450' AND i.item_id != '15986' AND i.item_id != '12915' AND i.item_id != '14451' AND i.item_id != '15987' AND i.item_id != '12916' AND i.item_id != '14452' AND i.item_id != '15988' AND i.item_id != '12917' AND i.item_id != '14453' AND i.item_id != '15989' AND i.item_id != '12918' AND i.item_id != '14454' AND i.item_id != '15990' AND i.item_id != '12919' AND i.item_id != '14455' AND i.item_id != '15991' AND i.item_id != '12920' AND i.item_id != '14456' AND i.item_id != '15992' AND i.item_id != '12921' AND i.item_id != '14457' AND i.item_id != '15993' AND i.item_id != '12922' AND i.item_id != '14458' AND i.item_id != '15994' AND i.item_id != '12923' AND i.item_id != '14459' AND i.item_id != '15995' AND i.item_id != '12924' AND i.item_id != '14460' AND i.item_id != '15996' AND i.item_id != '12925' AND i.item_id != '14461' AND i.item_id != '15997' AND i.item_id != '12926' AND i.item_id != '14462' AND i.item_id != '15998' AND i.item_id != '12927' AND i.item_id != '14463' AND i.item_id != '15999' AND i.item_id != '12928' AND i.item_id != '14464' AND i.item_id != '16000' AND i.item_id != '12929' AND i.item_id != '14465' AND i.item_id != '16001' AND i.item_id != '12930' AND i.item_id != '14466' AND i.item_id != '16002' AND i.item_id != '12931' AND i.item_id != '14467' AND i.item_id != '16003' AND i.item_id != '12932' AND i.item_id != '14468' AND i.item_id != '16004' AND i.item_id != '12933' AND i.item_id != '14469' AND i.item_id != '16005' AND i.item_id != '12934' AND i.item_id != '14470' AND i.item_id != '16006' AND i.item_id != '12935' AND i.item_id != '14471' AND i.item_id != '16007' AND i.item_id != '12936' AND i.item_id != '14472' AND i.item_id != '16008' AND i.item_id != '12937' AND i.item_id != '14473' AND i.item_id != '16009' AND i.item_id != '12938' AND i.item_id != '14474' AND i.item_id != '16010' AND i.item_id != '12939' AND i.item_id != '14475' AND i.item_id != '16011' AND i.item_id != '12940' AND i.item_id != '14476' AND i.item_id != '16012' AND i.item_id != '12941' AND i.item_id != '14477' AND i.item_id != '16013' AND i.item_id != '12942' AND i.item_id != '14478' AND i.item_id != '16014' AND i.item_id != '12943' AND i.item_id != '14479' AND i.item_id != '16015' AND i.item_id != '12944' AND i.item_id != '14480' AND i.item_id != '16016' AND i.item_id != '12945' AND i.item_id != '14481' AND i.item_id != '16017' AND i.item_id != '12946' AND i.item_id != '14482' AND i.item_id != '16018' AND i.item_id != '12947' AND i.item_id != '14483' AND i.item_id != '16019' AND i.item_id != '12948' AND i.item_id != '14484' AND i.item_id != '16020' AND i.item_id != '12949' AND i.item_id != '14485' AND i.item_id != '16021' AND i.item_id != '12950' AND i.item_id != '14486' AND i.item_id != '16022' AND i.item_id != '12951' AND i.item_id != '14487' AND i.item_id != '16023' AND i.item_id != '12952' AND i.item_id != '14488' AND i.item_id != '16024' AND i.item_id != '12953' AND i.item_id != '14489' AND i.item_id != '12954' AND i.item_id != '14490' AND i.item_id != '12955' AND i.item_id != '14491' AND i.item_id != '12956' AND i.item_id != '14492' AND i.item_id != '12957' AND i.item_id != '14493' AND i.item_id != '12958' AND i.item_id != '14494' AND i.item_id != '12959' AND i.item_id != '14495' AND i.item_id != '12960' AND i.item_id != '14496' AND i.item_id != '12961' AND i.item_id != '14497' AND i.item_id != '12962' AND i.item_id != '14498' AND i.item_id != '12963' AND i.item_id != '14499' AND i.item_id != '12964' AND i.item_id != '14500' AND i.item_id != '12965' AND i.item_id != '14501' AND i.item_id != '12966' AND i.item_id != '14502' AND i.item_id != '12967' AND i.item_id != '14503' AND i.item_id != '12968' AND i.item_id != '14504' AND i.item_id != '12969' AND i.item_id != '14505' AND i.item_id != '12970' AND i.item_id != '14506' AND i.item_id != '10667' AND i.item_id != '12971' AND i.item_id != '14507' AND i.item_id != '10668' AND i.item_id != '12972' AND i.item_id != '14508' AND i.item_id != '10669' AND i.item_id != '12973' AND i.item_id != '14509' AND i.item_id != '10670' AND i.item_id != '12974' AND i.item_id != '14510' AND i.item_id != '10671' AND i.item_id != '12975' AND i.item_id != '14511' AND i.item_id != '10672' AND i.item_id != '12976' AND i.item_id != '14512' AND i.item_id != '10673' AND i.item_id != '12977' AND i.item_id != '14513' AND i.item_id != '10674' AND i.item_id != '14514' AND i.item_id != '10675' AND i.item_id != '14515' AND i.item_id != '10676' AND i.item_id != '14516' AND i.item_id != '10677' AND i.item_id != '14517' AND i.item_id != '10678' AND i.item_id != '14518' AND i.item_id != '10679' AND i.item_id != '14519' AND i.item_id != '10680' AND i.item_id != '14520' AND i.item_id != '10681' AND i.item_id != '14521' AND i.item_id != '10682' AND i.item_id != '14522' AND i.item_id != '10683' AND i.item_id != '14523' AND i.item_id != '10684' AND i.item_id != '14524' AND i.item_id != '10685' AND i.item_id != '14525' AND i.item_id != '10686' AND i.item_id != '10687' AND i.item_id != '10688' AND i.item_id != '14528' AND i.item_id != '10689' AND i.item_id != '14529' AND i.item_id != '10690' AND i.item_id != '10691' AND i.item_id != '10692' AND i.item_id != '10693' AND i.item_id != '10694' AND i.item_id != '10695' AND i.item_id != '10696' AND i.item_id != '10697' AND i.item_id != '10698' AND i.item_id != '10699' AND i.item_id != '10700' AND i.item_id != '10701' AND i.item_id != '10702' AND i.item_id != '10703' AND i.item_id != '10704' AND i.item_id != '10705' AND i.item_id != '10706' AND i.item_id != '10707' AND i.item_id != '10708' AND i.item_id != '10709' AND i.item_id != '10710' AND i.item_id != '10711' AND i.item_id != '10712' AND i.item_id != '10713' AND i.item_id != '10714' AND i.item_id != '10715' AND i.item_id != '10716' AND i.item_id != '10717' AND i.item_id != '10718' AND i.item_id != '14558' AND i.item_id != '10719' AND i.item_id != '10720' AND i.item_id != '10721' AND i.item_id != '10722' AND i.item_id != '10723' AND i.item_id != '10724' AND i.item_id != '10725' AND i.item_id != '10726' AND i.item_id != '10727' AND i.item_id != '10728' AND i.item_id != '10729' AND i.item_id != '10730' AND i.item_id != '10731' AND i.item_id != '10732' AND i.item_id != '10733' AND i.item_id != '10734' AND i.item_id != '10735' AND i.item_id != '10736' AND i.item_id != '10737' AND i.item_id != '10738' AND i.item_id != '10739' AND i.item_id != '10740' AND i.item_id != '10741' AND i.item_id != '10742' AND i.item_id != '10743' AND i.item_id != '10744' AND i.item_id != '10745' AND i.item_id != '10746' AND i.item_id != '10747' AND i.item_id != '10748' AND i.item_id != '10749' AND i.item_id != '10750' AND i.item_id != '10751'";
		
		public function __construct($db_type, $conn, $config, $db_conn) {
			$this->db_type = $db_type;
			$this->conn = $conn;
			$this->L2jVersaoRussa = $config["L2jVersaoRussa"];
			$this->L2jVersaoClassic = $config["L2jVersaoClassic"];
			$this->L2jVersaoAcis = $config["L2jVersaoAcis"];
			$this->serverName = $config["SITE_NAME"];
			$this->ALLOW_CHARACTER_BASE_CLASS_CHANGE = $config["ALLOW_CHARACTER_BASE_CLASS_CHANGE"];
			$this->CHARACTER_BASE_CLASS_CHANGE_PRICE = $config["CHARACTER_BASE_CLASS_CHANGE_PRICE"];
			$this->ALLOW_CHARACTER_NICKNAME_CHANGE = $config["ALLOW_CHARACTER_NICKNAME_CHANGE"];
			$this->CHARACTER_NICKNAME_CHANGE_PRICE = $config["CHARACTER_NICKNAME_CHANGE_PRICE"];
			$this->ALLOW_CHARACTER_SEX_CHANGE = $config["ALLOW_CHARACTER_SEX_CHANGE"];
			$this->CHARACTER_SEX_CHANGE_PRICE = $config["CHARACTER_SEX_CHANGE_PRICE"];
			$this->ALLOW_CHARACTER_ACCOUNT_CHANGE = $config["ALLOW_CHARACTER_ACCOUNT_CHANGE"];
			$this->CHARACTER_ACCOUNT_CHANGE_PRICE = $config["CHARACTER_ACCOUNT_CHANGE_PRICE"];
			$this->ENABLE_SAFE_ENCHANT_SYSTEM = $config["ENABLE_SAFE_ENCHANT_SYSTEM"];
			$this->ENCHANT_SYSTEM_CHANCE = $config["ENCHANT_SYSTEM_CHANCE"];
			$this->ALLOW_ENCHANT_PVP_ITEMS = $config["ALLOW_ENCHANT_PVP_ITEMS"];
			$this->ALLOW_ENCHANT_AUGMENTED_ITEMS = $config["ALLOW_ENCHANT_AUGMENTED_ITEMS"];
			$this->PRICE_D_GRADE_ITEMS = $config["PRICE_D_GRADE_ITEMS"];
			$this->PRICE_C_GRADE_ITEMS = $config["PRICE_C_GRADE_ITEMS"];
			$this->PRICE_B_GRADE_ITEMS = $config["PRICE_B_GRADE_ITEMS"];
			$this->PRICE_A_GRADE_ITEMS = $config["PRICE_A_GRADE_ITEMS"];
			$this->PRICE_S_GRADE_ITEMS = $config["PRICE_S_GRADE_ITEMS"];
			$this->PRICE_S80_GRADE_ITEMS = $config["PRICE_S80_GRADE_ITEMS"];
			$this->PRICE_S84_GRADE_ITEMS = $config["PRICE_S84_GRADE_ITEMS"];
			$this->MAX_ENCHANT = $config["MAX_ENCHANT"];
			$this->ENABLE_CHARACTER_BROKER = $config["ENABLE_CHARACTER_BROKER"];
			$this->ENABLE_ITEM_BROKER = $config["ENABLE_ITEM_BROKER"];
			$this->ITEM_BROKER_LOC_PLACE = $config["ITEM_BROKER_LOC_PLACE"];
			$this->ALLOW_ITEM_BROKER_SALE_COMBO_ITEMS = $config["ALLOW_ITEM_BROKER_SALE_COMBO_ITEMS"];
			$this->ALLOW_ITEM_BROKER_SALE_PVP_ITEMS = $config["ALLOW_ITEM_BROKER_SALE_PVP_ITEMS"];
			$this->ALLOW_ITEM_BROKER_SALE_AUGMENTED_ITEMS = $config["ALLOW_ITEM_BROKER_SALE_AUGMENTED_ITEMS"];
			$this->ALLOW_AUCTION_ITEM_BROKER = $config["ALLOW_AUCTION_ITEM_BROKER"];
			$this->ALLOW_AUCTION_CHARACTER_BROKER = $config["ALLOW_AUCTION_CHARACTER_BROKER"];
			$this->AUCTION_CHARACTER_BROKER_DAYS = $config["AUCTION_CHARACTER_BROKER_DAYS"];
			$this->AUCTION_ITEM_BROKER_DAYS = $config["AUCTION_ITEM_BROKER_DAYS"];
			$this->ENABLE_PRIME_SHOP = $config["ENABLE_PRIME_SHOP"];
			$this->PRIME_SHOP_LOC_PLACE = $config["PRIME_SHOP_LOC_PLACE"];
			$this->DONATE_COIN_NAME = $config["DONATE_COIN_NAME"];
			$this->DB_IP = $db_conn["db_ip"];
			$this->CACHED_PORT = 2012;
			$this->ENABLE_REWARD_SYSTEM = $config["ENABLE_REWARD_SYSTEM"];
			$this->ALLOW_REWARD_ONLINE_TIME = $config["ALLOW_REWARD_ONLINE_TIME"];
			$this->REWARD_ONLINE_TIME_DAYS = $config["REWARD_ONLINE_TIME_DAYS"];
			$this->REWARD_ONLINE_TIME_ITEMS = $config["REWARD_ONLINE_TIME_ITEMS"];
			$this->ALLOW_REWARD_PVP = $config["ALLOW_REWARD_PVP"];
			$this->REWARD_PVP_COUNT = $config["REWARD_PVP_COUNT"];
			$this->REWARD_PVP_ITEMS = $config["REWARD_PVP_ITEMS"];
			$this->ALLOW_REWARD_PK = $config["ALLOW_REWARD_PK"];
			$this->REWARD_PK_COUNT = $config["REWARD_PK_COUNT"];
			$this->REWARD_PK_ITEMS = $config["REWARD_PK_ITEMS"];
			$this->REWARD_SYSTEM_LOC = $config["REWARD_SYSTEM_LOC"];
			$this->ENABLE_SCREENSHOTS = $config["enable_screenshots"];
			$this->ENABLE_VIDEOS = $config["enable_videos"];
			$this->ENABLE_NEWS = $config["enable_news"];
			$this->enable_messages = $config["enable_messages"];
			$this->chronicle = $config["CHRONICLE"];
		}
		
		private function filter($value, $string = false) {
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
		
		public function resposta($msg,$title=null,$type=null,$redirect=null){
			echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js\" type=\"text/javascript\"></script><script src=\"//cdn.jsdelivr.net/npm/sweetalert2@10\"></script><script type=\"text/javascript\">$(document).ready(function(){Swal.fire({ title: '".$title."', html: '".$msg."', icon: '".$type."'".(!empty($redirect) ? ", confirmButtonText: 'Ok', preConfirm: () => { return [ window.location.href = '".$redirect."' ] } })" : "})")."})</script>";
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
		
		public function sendDonate($login,$coins,$type,$admin,$senderPrivId){
			if($senderPrivId >= 9){
				$table = $this->db_type ? "accounts" : "user_auth";
				$colLogin = $this->db_type ? "login" : "account";
				global $loginServer;
				$checkName = $loginServer->prepare("SELECT * FROM ".$table." WHERE ".$colLogin." = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				$checkName->execute([$login]);
				if($checkName->rowCount() == 1){
					$profileName = $this->conn->prepare('SELECT name FROM icp_staff WHERE login = ?', array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$profileName->execute([$admin]);
					if($profileName->rowCount() == 1){
						$results = $profileName->fetch(\PDO::FETCH_ASSOC);
						$admin = $results["name"];
					}
					if(!empty($type) && $type == 1){
						$this->addDonate($coins,$login);
						$this->addDonateLog("The Staff Member ".$admin." added ".$coins." ".$this->DONATE_COIN_NAME." to his account.",0,$login);
						return $this->resposta("Coins successfully sent","Success!","success");
					}elseif(!empty($type) && $type == 2){
						$balance = $this->donateBalance($login);
						if($balance >= $coins){
							$this->debitDonate($coins,$login);
							$this->addDonateLog("The Staff Member ".$admin." removed ".$coins." ".$this->DONATE_COIN_NAME." from his account.",$coins,$login);
							return $this->resposta("Coins successfully removed","Success!","success");
						}else{
							return $this->resposta("The player does not have that amount of coins to remove.","Oops...","error");
						}
					}else
						return $this->resposta("Something went wrong","Oops...","error");
				}else{
					return $this->resposta("Account not found.","Oops...","error");
				}
			}else{
				return $this->resposta("You are not allowed to do this.","Oops...","error");
			}
		}
		
		private function donateBalance($login){
			$doacao = $this->conn->prepare('SELECT (total - used) AS credit FROM icp_donate WHERE login = ?', array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			$doacao->execute([$login]);
			if($doacao->rowCount() == 1){
				while ($row = $doacao->fetchObject()) {
					return $row->credit;
				}
			}
			return 0;
		}
		
		private function addDonate($value,$login){
			$doacao = $this->conn->prepare('SELECT * FROM icp_donate WHERE login = ?', array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			$doacao->execute([$login]);
			if($doacao->rowCount() == 1){
				$adding = $this->conn->prepare("UPDATE icp_donate SET total = (total + ?) WHERE login = ?");
				$adding->execute([$value,$login]);
			}else{
				$adding = $this->conn->prepare("INSERT INTO icp_donate (login, total, used) VALUES (?,?,'0')");
				$adding->execute([$login,$value]);
			}
		}
		
		private function debitDonate($value,$login){
			$debiting = $this->conn->prepare("UPDATE icp_donate SET used = (used + ?) WHERE login = ?");
			$debiting->execute([$value,$login]);
		}
		
		private function addDonateLog($description,$cost,$login){
			$donateLog = $this->conn->prepare("INSERT INTO icp_donate_log (date, description, cost, account) VALUES (?,?,?,?)");
			$donateLog->execute([date("Y-m-d H:i:s"),$description,$cost,$login]);
		}
		
		private function accountHash($numAlpha=25,$numNonAlpha=10){
			$listAlpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
			$listNonAlpha = ':!.$/*-+&@_+./*&$-!';
			return time().str_shuffle(
				substr(str_shuffle($listAlpha),0,$numAlpha) .
				substr(str_shuffle($listNonAlpha),0,$numNonAlpha)
			);
		}
		
		private function teleToTown($x,$y){
			$towns = array(
						array(83229,148614,-3406,'Giran Town'),
						array(146331,25762,-2018,'Aden Town'),
						array(147928,-55273,-2734,'Goddard Town'),
						array(43799,-47727,-798,'Rune Town'),
						array(15670,142983,-2705,'Dion Town'),
						array(82956,53162,-1495,'Oren Town'),
						array(-12672,122776,-3116,'Gludio Town'),
						array(87386,-143246,-1293,'Shuttgart Town'),
						array(111409,219364,-3545,'Heine Town'),
						array(-80826,149775,-3043,'Gludin Village'),
						array(116819,76994,-2714,'Hunters Village'),
						array(-84433,244484,-3728,'Talking Island Village'),
						array(115113,-178212,-901,'Dwarven Village'),
						array(-44836,-112524,-235,'Orc Village'),
						array(9745,15606,-4574,'Dark Elven Village'),
						array(46934,51467,-2977,'Elven Village'),
						array(-117251,46771,360,'Kamael Village')
					);
			$townLoc = null;
			$teleTo = null;
			for($z=0;$z<count($towns);$z++){
				$dist = 2 * asin(sqrt(pow(sin((deg2rad($towns[$z][0]) - deg2rad($x)) / 2), 2) +
				cos(deg2rad($x)) * cos(deg2rad($towns[$z][0])) * pow(sin((deg2rad($towns[$z][1]) - deg2rad($y)) / 2), 2)));
				$townLoc = $z == 0 ? $dist : $townLoc;
				if($townLoc >= $dist){
					$townLoc = $dist;
					$teleTo = array($towns[$z][0],$towns[$z][1],$towns[$z][2],$towns[$z][3]);
				}
			}
			return $teleTo;
		}
		
		private function teleport($char_id,$x,$y,$z){
			$buf=pack("cVVVVV",2,$char_id,1,$x,$y,$z).$this->tounicode("admin");
			$this->sendBuf($buf);
		}
		
		private function kick_char($char_id){
			$buf=pack("cV",5,$char_id).$this->tounicode("admin");
			$this->sendBuf($buf);
		}
		
		private function tounicode($string){
			$rs="";
			for($i=0;$i<strlen($string);$i++) $rs.=$string[$i].chr(0);
			return($rs.chr(0).chr(0));
		}
		
		private function sendBuf($buf){
			$cachedsocket=@fsockopen($this->DB_IP,$this->CACHED_PORT,$errno,$errstr,1);
			fwrite($cachedsocket,pack("s",(strlen($buf)+2)).$buf);
			fclose($cachedsocket);
		}
		
		private function getAugElem($itemid){
			$augment = 0;
			$attrubutes = null;
			$fire = null;
			$water = null;
			$wind = null;
			$earth = null;
			$holy = null;
			$unholy = null;
			if($this->L2jVersaoClassic){
				$charid_itematt = $this->info_table("item_variations","charid");
				$records3 = $this->conn->prepare("SELECT * FROM item_variations WHERE ".$charid_itematt." = ?");
				$records3->execute([$itemid]);
				if($records3->rowCount() > 0){
					while ($row3 = $records3->fetchObject()) {
						$augment = $row3->itemId > 0 ? 1 : $augment;
					}
				}
				$charid_elematt = $this->info_table("item_elementals","charid");
				$records2 = $this->conn->prepare("SELECT GROUP_CONCAT(elemType, ';', elemValue) AS elements FROM item_elementals WHERE ".$charid_elematt." = ?");
				$records2->execute([$itemid]);
				if($records2->rowCount() > 0){
					while ($row2 = $records2->fetchObject()) {
						$el = explode(",", $row2->elements);
						for($x=0;$x<(count($el)-1);$x++){
							$element = explode(";", $el[$x]);
							$fire .= $element[0] == 0 ? $element[1] : null;
							$water .= $element[0] == 1 ? $element[1] : null;
							$wind .= $element[0] == 2 ? $element[1] : null;
							$earth .= $element[0] == 3 ? $element[1] : null;
							$holy .= $element[0] == 4 ? $element[1] : null;
							$unholy .= $element[0] == 5 ? $element[1] : null;
						}
					}
					$attrubutes = $fire.",".$water.",".$wind.",".$earth.",".$holy.",".$unholy.",";
				}
			}else{
				$tables = $this->conn->prepare("SHOW TABLES");
				$tables->execute();
				if(in_array("item_attributes", $tables->fetchAll(\PDO::FETCH_COLUMN))){
					$charid_itematt = $this->info_table("item_attributes","charid");
					$records = $this->conn->prepare("SELECT * FROM item_attributes WHERE ".$charid_itematt." = ?");
					$records->execute([$itemid]);
					if($records->rowCount() > 0){
						while ($row = $records->fetchObject()) {
							if(isset($row->elemType)){
								$fire .= $row->elemType == 0 ? $row->elemValue : null;
								$water .= $row->elemType == 1 ? $row->elemValue : null;
								$wind .= $row->elemType == 2 ? $row->elemValue : null;
								$earth .= $row->elemType == 3 ? $row->elemValue : null;
								$holy .= $row->elemType == 4 ? $row->elemValue : null;
								$unholy .= $row->elemType == 5 ? $row->elemValue : null;
							}
							$augment = $row->augAttributes > 0 ? 1 : $augment;
						}
						$attrubutes = $fire.",".$water.",".$wind.",".$earth.",".$holy.",".$unholy.",";
					}
				}
				if(in_array("item_elementals", $tables->fetchAll(\PDO::FETCH_COLUMN))){
					$charid_elematt = $this->info_table("item_elementals","charid");
					$records2 = $this->conn->prepare("SELECT GROUP_CONCAT(elemType, ';', elemValue) AS elements FROM item_elementals WHERE ".$charid_elematt." = ?");
					$records2->execute([$itemid]);
					if($records2->rowCount() > 0){
						while ($row2 = $records2->fetchObject()) {
							$el = explode(",", $row2->elements);
							for($x=0;$x<(count($el)-1);$x++){
								$element = explode(";", $el[$x]);
								$fire .= $element[0] == 0 ? $element[1] : null;
								$water .= $element[0] == 1 ? $element[1] : null;
								$wind .= $element[0] == 2 ? $element[1] : null;
								$earth .= $element[0] == 3 ? $element[1] : null;
								$holy .= $element[0] == 4 ? $element[1] : null;
								$unholy .= $element[0] == 5 ? $element[1] : null;
							}
						}
						$attrubutes = $fire.",".$water.",".$wind.",".$earth.",".$holy.",".$unholy.",";
					}
				}
				if(in_array("augmentations", $tables->fetchAll(\PDO::FETCH_COLUMN))){
					$charid_augment = $this->info_table("augmentations","charid");
					$records4 = $this->conn->prepare("SELECT * FROM augmentations WHERE ".$charid_augment." = ?");
					$records4->execute([$itemid]);
					if($records4->rowCount() > 0){
						while ($row4 = $records4->fetchObject()) {
							$augment = $row4->attributes > 0 ? 1 : $augment;
						}
					}
				}
			}
			$attrubutes = empty($attrubutes) ? ",,,,,," : $attrubutes;
			return $attrubutes.$augment.",";
		}
		
		public function putCharForSale($charid,$price,$type,$login){
			if(empty(preg_replace("/(\D)/i" , "" , $charid)))
				return $this->resposta("Invalid character ID!","Oops...","error");
			if(!$this->ENABLE_CHARACTER_BROKER)
				return $this->resposta("Character broker is disabled!","Oooh no!","error");
			$checkForSale = $this->conn->prepare("SELECT * FROM icp_shop_items WHERE status='1' AND owner_id = ?");
			$checkForSale->execute([$charid]);
			if($checkForSale->rowCount() > 0)
				return $this->resposta("You cannot sell the character because this character have item(s) is for sale in Item Broker.","Oops...","warning");
			if(empty($type)){
				$type = 1;
			}else{
				if($type == 1)
					$type = 1;
				else{
					if($this->ALLOW_AUCTION_CHARACTER_BROKER)
						$type = 2;
					else
						$type = 1;
				}
			}
			$result = null;
			if($this->db_type){
				$charid_characters = $this->info_table("characters","charid");
				$records = $this->conn->prepare("SELECT * FROM characters WHERE ".$charid_characters." = ? AND account_name = ? AND online = '0'");
			}else{
				$records = $this->conn->prepare("SELECT * FROM user_data WHERE char_id = ? AND account_name = ? AND login < logout", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			}
			$records->execute([$charid,$login]);
			if($records->rowCount() == 1){
				if(preg_replace("/(\D)/i" , "" , $price) > 0){
					if($this->db_type){
						$newacc = $this->accountHash();
						$records2 = $this->conn->prepare("UPDATE characters SET account_name = ? WHERE ".$charid_characters." = ? AND account_name = ?");
						$records2->execute([$newacc,$charid,$login]);
						$records3 = $this->conn->prepare("INSERT INTO icp_shop_chars (owner_id, account, has_account, type, price) VALUES (?,?,?,?,?)");
						$records3->execute([$charid,$login,$newacc,$type,$price]);
					}else{
						$records3 = $this->conn->prepare("INSERT INTO icp_shop_chars (account, owner_id, type, price, date, status) VALUES (?,?,?,?,?,'1')");
						$records3->execute([$login,$charid,$type,$price,date("Y-m-d H:i:s")]);
					}
					if($type == 1)
						$result .= "Character successfully put up for sale.";
					else
						$result .= "The auction was created and the character was successfully put up for sale.";
					return $this->resposta($result,"Good job!","success");
				}else{
					$result .= "Invalid price!";
				}
			}else{
				$result .= "Character not found!<br>Check if the character is offline.";
			}
			return $this->resposta($result,"Oooh no!","error");
		}
		
		function putItemsForSale($charid,$items,$price,$type,$login){
			if(!$this->ENABLE_ITEM_BROKER)
				return $this->resposta("Item Broker is disabled.","Oops...","error");
			if(count($items) == 0)
				return $this->resposta("Select an item!","Oops...","warning");
			if(!$this->ALLOW_ITEM_BROKER_SALE_COMBO_ITEMS && count($items) > 1)
				return $this->resposta("You can sell only one item at a time.","Oops...","warning");
			if(count($items) > 24)
				return $this->resposta("Maximum limit of 24 items.","Oops...","warning");
			if(count(array_unique($items)) != count($items))
				return $this->resposta("An error has happened!","Oops...","error");
			$checkForSale = $this->conn->prepare("SELECT * FROM icp_shop_chars WHERE status='1' AND owner_id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			$checkForSale->execute([$charid]);
			if($checkForSale->rowCount() > 0)
				return $this->resposta("You cannot sell the item because this character is for sale.","Oops...","error");
			if(empty($type)){
				$type = count($items) > 1 ? 2 : 1;
			}else{
				if($this->ALLOW_AUCTION_ITEM_BROKER)
					$type = count($items) > 1 ? 4 : 3;
				else
					$type = count($items) > 1 ? 2 : 1;
			}
			$result = null;
			$item_id = null;
			$noPvpItems = $this->db_type ? $this->L2jVersaoRussa && $this->chronicle == "Interlude" ? str_replace("i.item_id","i.item_type",$this->noPvpItems) : $this->noPvpItems : str_replace("i.item_id","i.item_type",$this->noPvpItems);
			if($this->db_type){
				$count = null;
				$enchant = null;
				$fire = null;
				$water = null;
				$wind = null;
				$earth = null;
				$holy = null;
				$unholy = null;
				$augment = null;
				$augment_ref = null;
				$charid_items = $this->info_table("items","charid");
				$charid_characters = $this->info_table("characters","charid");
				for($x=0;$x<count($items);$x++){
					$wherePvP = !$this->ALLOW_ITEM_BROKER_SALE_PVP_ITEMS ? $noPvpItems : null;
					$records = $this->conn->prepare("SELECT i.* FROM items AS i WHERE i.".$charid_items." = ? AND i.owner_id = ? AND (SELECT online FROM characters WHERE ".$charid_characters." = i.owner_id) = '0' AND (SELECT account_name FROM characters WHERE ".$charid_characters." = i.owner_id) = ?".$wherePvP);
					$records->execute([$items[$x],$charid,$login]);
					if($records->rowCount() == 1){
						while ($row = $records->fetchObject()) {
							if($this->L2jVersaoRussa && $this->chronicle != "Interlude"){
								if($row->augmentation_id > 0 && !$this->ALLOW_ITEM_BROKER_SALE_AUGMENTED_ITEMS)
									return $this->resposta("Augmented item is prohibited!","Oops...","error");
								$fire .= empty($row->attribute_fire) ? "0;" : $row->attribute_fire.";";
								$water .= empty($row->attribute_water) ? "0;" : $row->attribute_water.";";
								$wind .= empty($row->attribute_wind) ? "0;" : $row->attribute_wind.";";
								$earth .= empty($row->attribute_earth) ? "0;" : $row->attribute_earth.";";
								$holy .= empty($row->attribute_holy) ? "0;" : $row->attribute_holy.";";
								$unholy .= empty($row->attribute_unholy) ? "0;" : $row->attribute_unholy.";";
								$augment .= empty($row->augmentation_id) ? "0;" : "1;";
								$augment_ref .= empty($row->attribute_fire) && empty($row->attribute_water) && empty($row->attribute_wind) && empty($row->attribute_earth) && empty($row->attribute_holy) && empty($row->attribute_unholy) && empty($row->augmentation_id) ? "0;" : $row->augmentation_id.";";
							}else{
								$augElem = explode(",", $this->getAugElem($row->{$charid_items}));
								if($augElem[6] > 0 && !$this->ALLOW_ITEM_BROKER_SALE_AUGMENTED_ITEMS)
									return $this->resposta("Augmented item is prohibited!","Oops...","error");
								$fire .= empty($augElem[0]) ? "0;" : $augElem[0].";";
								$water .= empty($augElem[1]) ? "0;" : $augElem[1].";";
								$wind .= empty($augElem[2]) ? "0;" : $augElem[2].";";
								$earth .= empty($augElem[3]) ? "0;" : $augElem[3].";";
								$holy .= empty($augElem[4]) ? "0;" : $augElem[4].";";
								$unholy .= empty($augElem[5]) ? "0;" : $augElem[5].";";
								$augment .= empty($augElem[6]) ? "0;" : "1;";
								$augment_ref .= empty($augElem[0]) && empty($augElem[1]) && empty($augElem[2]) && empty($augElem[3]) && empty($augElem[4]) && empty($augElem[5]) && empty($augElem[6]) ? "0;" : $row->{$charid_items}.";";
							}
							$item_id .= $this->L2jVersaoRussa && $this->chronicle == "Interlude" ? $row->item_type.";" : $row->item_id.";";
							$count .= $this->L2jVersaoRussa && $this->chronicle == "Interlude" ? $row->amount.";" : $row->count.";";
							$enchant .= $this->L2jVersaoRussa && $this->chronicle == "Interlude" ? $row->enchant.";" : $row->enchant_level.";";
						}
					}else{
						return $this->resposta("Character not found!<br>Check if the character is offline.","Oops...","error");
					}
				}
				$records2 = $this->conn->prepare("INSERT INTO icp_shop_items (item_id, owner_id, count, enchant, augmented, augment_ref, fire, water, wind, earth, holy, unholy, type, price) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				$records2->execute([$item_id,$charid,$count,$enchant,$augment,$augment_ref,$fire,$water,$wind,$earth,$holy,$unholy,$type,$price]);
				if($records2->rowCount() == 1){
					for($y=0;$y<count($items);$y++){
						$records3 = $this->conn->prepare("DELETE FROM items WHERE ".$charid_items." = ?");
						$records3->execute([$items[$y]]);
					}
				}
			}else{
				for($x=0;$x<count($items);$x++){
					$wherePvP = !$this->ALLOW_ITEM_BROKER_SALE_PVP_ITEMS ? $noPvpItems : null;
					$records = $this->conn->prepare("SELECT i.* FROM user_item AS i WHERE i.item_id = ? AND i.char_id = ? AND (SELECT CASE WHEN login < logout THEN '0' ELSE '1' END FROM user_data WHERE char_id = i.char_id) = '0' AND (SELECT account_name FROM user_data WHERE char_id = i.char_id) = ?".$wherePvP, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$records->execute([$items[$x],$charid,$login]);
					if($records->rowCount() == 1){
						while ($row = $records->fetchObject()) {
							if($row->augmentation > 0 && $this->ALLOW_ITEM_BROKER_SALE_AUGMENTED_ITEMS)
								return $this->resposta("Augmented item is prohibited!","Oops...","error");
							$item_id .= $row->item_id.";";
						}
					}else{
						return $this->resposta("Character not found!<br>Check if the character is offline.","Oops...","error");
					}
				}
				$records2 = $this->conn->prepare("INSERT INTO icp_shop_items (item_id, owner_id, type, price, date, status) VALUES (?,?,?,?,?,'1')");
				$records2->execute([$item_id,$charid,$type,$price,date("Y-m-d H:i:s")]);
			}
			$result = $type == 1 ? "The item successfully put up for sale." : $result;
			$result = $type == 2 ? "The combo items was created and successfully put up for sale." : $result;
			$result = $type == 3 ? "The auction was created and the item was successfully put up for sale." : $result;
			$result = $type == 4 ? "The auction was created and the combo items was successfully put up for sale." : $result;
			return $this->resposta($result,"Good job!","success");
		}
		
		public function unlock($charid,$login){
			if($this->db_type){
				$charid_characters = $this->info_table("characters","charid");
				if(!$this->L2jVersaoRussa && $this->chronicle == "Classic")
					$records = $this->conn->prepare("SELECT char_name, ('0') AS karma, online, x, y FROM characters WHERE account_name = ? AND ".$charid_characters." = ?");
				else
					$records = $this->conn->prepare("SELECT char_name, karma, online, x, y FROM characters WHERE account_name = ? AND ".$charid_characters." = ?");
				$records->execute([$login,$charid]);
				$results = $records->fetch(\PDO::FETCH_ASSOC);
				if($results){
					if($results["online"] > 0){
						return $this->resposta("The character ".$results["char_name"]." is online!<br>Logout and try again.","Oooh no!","error");
					}elseif($results["karma"] > 0){
						return $this->resposta("The character ".$results["char_name"]." have karma!<br>Unable to unlock character with karma.","Oooh no!","error");
					}else{
						$destravar = $this->teleToTown($results["x"],$results["y"]);
						if(!$this->L2jVersaoRussa){
							$destravando1 = $this->conn->prepare("UPDATE characters SET x='".$destravar[0]."', y='".$destravar[1]."', z='".$destravar[2]."', curHp = maxHP WHERE account_name = ? AND ".$charid_characters." = ?");
						}else{
							$destravando1 = $this->conn->prepare("UPDATE characters SET x='".$destravar[0]."', y='".$destravar[1]."', z='".$destravar[2]."' WHERE account_name = ? AND ".$charid_characters." = ?");
							$charid_subclass = $this->info_table("character_subclasses","charid");
							$destravando6 = $this->conn->prepare("UPDATE character_subclasses SET curHp = maxHP WHERE active = '1' AND ".$charid_subclass." = ?");
							$destravando6->execute([$charid]);
						}
						$destravando1->execute([$login,$charid]);
						if($this->L2jVersaoRussa && $this->chronicle == "Interlude")
							$destravando2 = $this->conn->prepare("UPDATE items SET location='WAREHOUSE', slot='0' WHERE owner_id = ? AND location = 'PAPERDOLL'");
						else
							$destravando2 = $this->conn->prepare("UPDATE items SET loc='WAREHOUSE', loc_data='0' WHERE owner_id = ? AND loc = 'PAPERDOLL'");
						$destravando2->execute([$charid]);
						$charid_skillssave = $this->info_table("character_skills_save","charid");
						$destravando3 = $this->conn->prepare("DELETE FROM character_skills_save WHERE ".$charid_skillssave." = ? AND skill_id = '840'");
						$destravando3->execute([$charid]);
						$destravando4 = $this->conn->prepare("DELETE FROM character_skills_save WHERE ".$charid_skillssave." = ? AND skill_id = '841'");
						$destravando4->execute([$charid]);
						$destravando5 = $this->conn->prepare("DELETE FROM character_skills_save WHERE ".$charid_skillssave." = ? AND skill_id = '842'");
						$destravando5->execute([$charid]);
						return $this->resposta("The character ".$results["char_name"]." has been successfully unlocked!<br>Your character has been teleported to ".$destravar[3].", nearest city.<br>All of your equipped items have been shipped to Warehouse.","Oh yeah!","success");
					}
				}else{
					return $this->resposta("Character not found.","Oops...","error");
				}
			}else{
				$records = $this->conn->prepare("SELECT char_name, (align) AS karma, CASE WHEN login > logout THEN '1' ELSE '0' END AS online, (xloc) AS x, (yloc) AS y FROM user_data WHERE account_name = ? AND char_id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				$records->execute([$login,$charid]);
				if($records->rowCount() > 0){
					while ($row = $records->fetchObject()) {
						if($row->online > 0){
							return $this->resposta("The character ".$row->char_name." is online!<br>Logout and try again.","Oooh no!","error");
						}elseif($row->karma > 0){
							return $this->resposta("The character ".$row->char_name." have karma!<br>Unable to unlock character with karma.","Oooh no!","error");
						}else{
							$this->kick_char($charid);
							$destravar = $this->teleToTown($row->x,$row->y);
							$this->teleport($charid, $destravar[0], $destravar[1], $destravar[2]);
							return $this->resposta("The character ".$row->char_name." has been successfully unlocked!<br>Your character has been teleported to ".$destravar[3].", nearest city.","Oh yeah!","success");
						}
					}
				}else{
					return $this->resposta("Character not found.","Oops...","error");
				}
			}
		}
		
		public function sendScreenshot($legend, $author, $photo, $login){
			$error = null;
			if (!empty($photo["name"])) {
				$height = 1024;
				$width = 1600;
				$weight = 1000000; // 1000000 = 1MB
				$dimensions = getimagesize($photo["tmp_name"]);
				if($dimensions){
					$error .= !in_array($dimensions[2], array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP)) ? "This is not an image.<br>" : null;
					$error .= $dimensions[1] > $height ? "The image height must not exceed ".$height." pixels.<br>" : null;
					$error .= $dimensions[0] > $width ? "The image width must not exceed ".$width." pixels.<br>" : null;
					$error .= $photo["size"] > $weight ? "The image must have a maximum of ".$weight." bytes.<br>" : null;
					if(empty($error)){
						preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $photo["name"], $ext);
						$imgName = md5(uniqid(time())) . "." . $ext[1];
						$imagePath = "images/screenshots/" . $imgName;
						move_uploaded_file($photo["tmp_name"], $imagePath);
						$this->createThumb("images/screenshots/",$imgName,"images/screenshots/thumbs/",$imgName,150,$ext[1]);
						$records = $this->conn->prepare("INSERT INTO icp_gallery_screenshots (legend, author, date, screenshot, account) VALUES (?,?,?,?,?)");
						$records->execute([$legend,$author,date("Y-m-d H:i:s"),$imgName,$login]);
						return $this->resposta("ScreenShot sent!!!<br>Wait for approval from Staff.","Success!","success");
					}else{
						return $this->resposta($error,"Oops...","error");
					}
				}else{
					return $this->resposta("This is not an image.","Oops...","error");
				}
			}
		}
		
		public function sendVideo($legend, $author, $link, $login){
			if(substr(trim($link), 0, 31) == "http://www.youtube.com/watch?v=" || substr(trim($link), 0, 32) == "https://www.youtube.com/watch?v="){
				$id = substr(trim($link), 0, 31) == "http://www.youtube.com/watch?v=" ? substr(trim($link), 31, 11) : substr(trim($link), 32, 11);
				$video = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$id.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
				$photo = "http://img.youtube.com/vi/".$id."/default.jpg";
				$saving = $this->conn->prepare("INSERT INTO icp_gallery_videos (legend, author, date, link, photo, url, account) VALUES (?,?,?,?,?,?,?)");
				$saving->execute([$legend,$author,date("Y-m-d H:i:s"),$video,$photo,str_replace("watch?v=","embed/",$link),$login]);
				return $this->resposta("Video uploaded successfully!<br>Wait for approval from Staff.","Success!","success");
			}else{
				return $this->resposta("The video was not uploaded.<br>Cause: Invalid link!","Oops...","error");
			}
		}
		
		public function buyChar($charid,$login,$userId=null){
			if(!$this->ENABLE_CHARACTER_BROKER)
				return $this->resposta("Character Broker is disabled.","Oops...","error");
			$timeAuction = $this->AUCTION_CHARACTER_BROKER_DAYS * 86400;
			if($this->db_type)
				$records = $this->conn->prepare("SELECT s.*, CASE WHEN s.type = '2' THEN (SELECT CONCAT(account, ';', value) FROM icp_shop_chars_auction WHERE bidId = s.id ORDER BY id DESC LIMIT 1) END AS auction_details FROM icp_shop_chars AS s WHERE s.status = '1' AND s.id = ?");
			else
				$records = $this->conn->prepare("SELECT s.*, CASE WHEN s.type = '2' THEN (SELECT TOP 1 CONCAT(account, ';', value) FROM icp_shop_chars_auction WHERE bidId = s.id ORDER BY id DESC) END AS auction_details FROM icp_shop_chars AS s WHERE s.status = '1' AND s.id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			$records->execute([$charid]);
			if($records->rowCount() == 1){
				while ($row = $records->fetchObject()) {
					if($row->type == 2){
						if(empty($row->auction_details)){
							return $this->resposta("Unable to receive the character.","Oops...","error");
						}else{
							if((strtotime($row->date)+$timeAuction) < time()){
								$last_bid = explode(";",$row->auction_details);
								if($login == $last_bid[0]){
									$this->addDonate($last_bid[1],$row->account);
									$this->addDonateLog($last_bid[1]." ".$this->DONATE_COIN_NAME." added. Character sold at auction on Character Broker. ID: ".ltrim($row->id, "0"),0,$row->account);
									$this->addDonateLog("Character purchase at auction on Character Broker. ID: ".ltrim($row->id, "0"),$last_bid[1],$login);
									if($this->db_type){
										$buying = $this->conn->prepare("UPDATE icp_shop_chars SET status = '0' WHERE id = ?");
										$buying->execute([$charid]);
										$charid_characters = $this->info_table("characters","charid");
										$buying2 = $this->conn->prepare("UPDATE characters SET account_name = ? WHERE ".$charid_characters." = '".$row->owner_id."' AND account_name = '".$row->has_account."'");
										$buying2->execute([$login]);
									}else{
										$buying_a = $this->conn->prepare("DELETE FROM icp_shop_chars_auction WHERE bidId = ?");
										$buying_a->execute([$charid]);
										$buying = $this->conn->prepare("DELETE FROM icp_shop_chars WHERE id = ?");
										$buying->execute([$charid]);
										if($row->account != $login){
											$this->kick_char($row->owner_id);
											$buf=pack("cVV",31,$row->owner_id,$userId).$this->tounicode($login).$this->tounicode("admin");
											$this->sendBuf($buf);
										}
									}
									return $this->resposta("Character successfully purchased!","Oh yeah!","success","?icp=panel&show=character-broker");
								}else{
									return $this->resposta("Old owner not found.","Oops...","error");
								}
							}else{
								return $this->resposta("The auction is in progress yet.","Oops...","error");
							}
						}
					}else{
						$credito = $this->donateBalance($login);
						if($credito >= $row->price){
							$this->addDonate($row->price,$row->account);
							$this->addDonateLog($row->price." ".$this->DONATE_COIN_NAME." added. Character sold on Character Broker. ID: ".ltrim($row->id, "0"),0,$row->account);
							$this->debitDonate($row->price,$login);
							$this->addDonateLog("Character purchase on Character Broker. ID: ".ltrim($row->id, "0"),$row->price,$login);
							if($this->db_type){
								$buying = $this->conn->prepare("UPDATE icp_shop_chars SET status = '0' WHERE id = ?");
								$buying->execute([$charid]);
								$charid_characters = $this->info_table("characters","charid");
								$buying2 = $this->conn->prepare("UPDATE characters SET account_name = ? WHERE ".$charid_characters." = '".$row->owner_id."' AND account_name = '".$row->has_account."'");
								$buying2->execute([$login]);
							}else{
								$buying = $this->conn->prepare("DELETE FROM icp_shop_chars WHERE id = ?");
								$buying->execute([$charid]);
								if($row->account != $login){
									$this->kick_char($row->owner_id);
									$buf=pack("cVV",31,$row->owner_id,$userId).$this->tounicode($login).$this->tounicode("admin");
									$this->sendBuf($buf);
								}
							}
							return $this->resposta("Character successfully purchased!","Oh yeah!","success","?icp=panel&show=character-broker");
						}else{
							return $this->resposta("You do not have ".$this->DONATE_COIN_NAME." enoug.<br>Your current balance is ".$credito." ".$this->DONATE_COIN_NAME.".<br>Make a donation and increase your balance.","Oooh no!","error");
						}
					}
				}
			}
			return $this->resposta("Character not found.","Oops...","error");
		}
		
		public function buyItem($itemid,$charid,$login,$store=true){
			if(!$this->ENABLE_ITEM_BROKER && $store)
				return $this->resposta("Item Broker is disabled.","Oops...","error");
			if(!$this->ENABLE_PRIME_SHOP && !$store)
				return $this->resposta("Prime Shop is disabled.","Oops...","error");
			$timeAuction = $this->AUCTION_ITEM_BROKER_DAYS * 86400;
			if($store){
				if($this->db_type)
					$records = $this->conn->prepare("SELECT s.*, CASE WHEN s.type > '2' THEN (SELECT CONCAT(account, ';', value) FROM icp_shop_items_auction WHERE bidId = s.id ORDER BY id DESC LIMIT 1) END AS auction_details FROM icp_shop_items AS s WHERE s.status = '1' AND s.id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				else
					$records = $this->conn->prepare("SELECT s.*, CASE WHEN s.type > '2' THEN (SELECT TOP 1 CONCAT(account, ';', value) FROM icp_shop_items_auction WHERE bidId = s.id ORDER BY id DESC) END AS auction_details FROM icp_shop_items AS s WHERE s.status = '1' AND s.id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			}else{
				$records = $this->conn->prepare("SELECT * FROM icp_prime_shop WHERE id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			}
			$records->execute([$itemid]);
			if($records->rowCount() == 1){
				while ($row = $records->fetchObject()) {
					if($this->db_type){
						$charid_characters = $this->info_table("characters","charid");
						$owner = $this->conn->prepare("SELECT * FROM characters WHERE ".$charid_characters." = ? AND account_name = ? AND online = '0'");
					}else{
						$owner = $this->conn->prepare("SELECT * FROM user_data WHERE char_id = ? AND account_name = ? AND login < logout", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					}
					$owner->execute([$charid,$login]);
					if($owner->rowCount() == 1){
						$credito = $this->donateBalance($login);
						if($store){
							if($row->type > 0 && $row->type < 3){
								if($credito >= $row->price){
									if($this->db_type)
										$old_owner = $this->conn->prepare("SELECT account_name FROM characters WHERE ".$charid_characters." = ?");
									else
										$old_owner = $this->conn->prepare("SELECT account_name FROM user_data WHERE char_id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
									$old_owner->execute([$row->owner_id]);
									if($old_owner->rowCount() == 1){
										while ($row2 = $old_owner->fetchObject()) {
											$this->addDonate($row->price,$row2->account_name);
											$this->addDonateLog($row->price." ".$this->DONATE_COIN_NAME." added. Item(s) sold on Item Broker. ID: ".ltrim($row->id, "0"),0,$row2->account_name);
											$this->debitDonate($row->price,$login);
											$this->addDonateLog("Item(s) purchase on Item Broker. ID: ".ltrim($row->id, "0"),$row->price,$login);
											if($this->db_type)
												$buying = $this->conn->prepare("UPDATE icp_shop_items SET status = '0' WHERE id = ?");
											else
												$buying = $this->conn->prepare("DELETE FROM icp_shop_items WHERE id = ?");
											$buying->execute([$itemid]);
											$items = explode(";", $row->item_id);
											if($this->db_type){
												$count = explode(";", $row->count);
												$enchant = explode(";", $row->enchant);
												$augment_ref = explode(";", $row->augment_ref);
												$fire = explode(";", $row->fire);
												$water = explode(";", $row->water);
												$wind = explode(";", $row->wind);
												$earth = explode(";", $row->earth);
												$holy = explode(";", $row->holy);
												$unholy = explode(";", $row->unholy);
												$loc = $this->ITEM_BROKER_LOC_PLACE == "INVENTORY" ? "INVENTORY" : "WAREHOUSE";
											}
											for($x=0;$x<(count($items)-1);$x++){
												if($this->db_type){
													if(empty($fire[$x]) && empty($water[$x]) && empty($wind[$x]) && empty($earth[$x]) && empty($holy[$x]) && empty($unholy[$x]) && empty($augment_ref[$x])){
														$augAtt = null;
													}else{
														$augAtt = $fire[$x].",".$water[$x].",".$wind[$x].",".$earth[$x].",".$holy[$x].",".$unholy[$x].",".$augment_ref[$x];
													}
													$this->sendItem($items[$x],$count[$x],$enchant[$x],$loc,$charid,false,$augAtt);
												}else{
													if($row->owner_id != $charid){
														$this->kick_char($row->owner_id);
														$this->kick_char($charid);
														$buf=pack("cVVVV",40,$row->owner_id,$items[$x],$charid,1).$this->tounicode("admin");
														$this->sendBuf($buf);
													}
												}
											}
											return $this->resposta("Successfully purchased item!","Oh yeah!","success","?icp=panel&show=item-broker");
										}
									}else{
										return $this->resposta("Old owner not found.","Oops...","error");
									}
								}else{
									return $this->resposta("You do not have ".$this->DONATE_COIN_NAME." enoug.<br>Your current balance is ".$credito." ".$this->DONATE_COIN_NAME.".<br>Make a donation and increase your balance.","Oooh no!","error");
								}
							}elseif($row->type > 2 && $row->type < 5){
								if(empty($row->auction_details)){
									return $this->resposta("Unable to receive the item(s).","Oops...","error");
								}else{
									if((strtotime($row->date)+$timeAuction) < time()){
										if($this->db_type)
											$old_owner = $this->conn->prepare("SELECT account_name FROM characters WHERE ".$charid_characters." = ?");
										else
											$old_owner = $this->conn->prepare("SELECT account_name FROM user_data WHERE char_id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
										$old_owner->execute([$row->owner_id]);
										if($old_owner->rowCount() == 1){
											while ($row2 = $old_owner->fetchObject()) {
												$last_bid = explode(";",$row->auction_details);
												$this->addDonate($last_bid[1],$row2->account_name);
												$this->addDonateLog($last_bid[1]." ".$this->DONATE_COIN_NAME." added. Item(s) sold at auction on Item Broker. ID: ".ltrim($row->id, "0"),0,$row2->account_name);
												$this->addDonateLog("Item(s) purchase at auction on Item Broker. ID: ".ltrim($row->id, "0"),$last_bid[1],$login);
												if($this->db_type)
													$buying = $this->conn->prepare("UPDATE icp_shop_items SET status = '0' WHERE id = ?");
												else{
													$buying_a = $this->conn->prepare("DELETE FROM icp_shop_items_auction WHERE bidId = ?");
													$buying_a->execute([$itemid]);
													$buying = $this->conn->prepare("DELETE FROM icp_shop_items WHERE id = ?");
												}
												$buying->execute([$itemid]);
												$items = explode(";", $row->item_id);
												if($this->db_type){
													$count = explode(";", $row->count);
													$enchant = explode(";", $row->enchant);
													$augment_ref = explode(";", $row->augment_ref);
													$fire = explode(";", $row->fire);
													$water = explode(";", $row->water);
													$wind = explode(";", $row->wind);
													$earth = explode(";", $row->earth);
													$holy = explode(";", $row->holy);
													$unholy = explode(";", $row->unholy);
													$loc = $this->ITEM_BROKER_LOC_PLACE == "INVENTORY" ? "INVENTORY" : "WAREHOUSE";
												}
												for($x=0;$x<(count($items)-1);$x++){
													if($this->db_type){
														if(empty($fire[$x]) && empty($water[$x]) && empty($wind[$x]) && empty($earth[$x]) && empty($holy[$x]) && empty($unholy[$x]) && empty($augment_ref[$x])){
															$augAtt = null;
														}else{
															$augAtt = $fire[$x].",".$water[$x].",".$wind[$x].",".$earth[$x].",".$holy[$x].",".$unholy[$x].",".$augment_ref[$x];
														}
														$this->sendItem($items[$x],$count[$x],$enchant[$x],$loc,$charid,false,$augAtt);
													}else{
														if($row->owner_id != $charid){
															$this->kick_char($row->owner_id);
															$this->kick_char($charid);
															$buf=pack("cVVVV",40,$row->owner_id,$items[$x],$charid,1).$this->tounicode("admin");
															$this->sendBuf($buf);
														}
													}
												}
												return $this->resposta("Item(s) successfully purchased!","Oh yeah!","success","?icp=panel&show=item-broker");
											}
										}else{
											return $this->resposta("Old owner not found.","Oops...","error");
										}
									}else{
										return $this->resposta("The auction is in progress yet.","Oops...","error");
									}
								}
							}
						}else{
							if($credito >= $row->price){
								$this->debitDonate($row->price,$login);
								$this->addDonateLog("Item(s) purchase on Prime Shop. ID: ".ltrim($row->id, "0"),$row->price,$login);
								$items = explode(",", $row->item_id);
								$count = explode(",", $row->count);
								$enchant = explode(",", $row->enchant);
								$fire = explode(",", $row->attribute_fire);
								$water = explode(",", $row->attribute_water);
								$wind = explode(",", $row->attribute_wind);
								$earth = explode(",", $row->attribute_earth);
								$holy = explode(",", $row->attribute_holy);
								$unholy = explode(",", $row->attribute_unholy);
								$loc = $this->PRIME_SHOP_LOC_PLACE == "INVENTORY" ? "INVENTORY" : "WAREHOUSE";
								for($x=0;$x<(count($items)-1);$x++){
									$stack = true;
									if(empty($fire[$x]) && empty($water[$x]) && empty($wind[$x]) && empty($earth[$x]) && empty($holy[$x]) && empty($unholy[$x])){
										$augAtt = null;
									}else{
										$augAtt = $fire[$x].",".$water[$x].",".$wind[$x].",".$earth[$x].",".$holy[$x].",".$unholy[$x];
									}
									$stackable = $this->conn->prepare("SELECT itemType FROM icp_icons WHERE itemId = '".$items[$x]."'", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
									$stackable->execute();
									if($stackable->rowCount() == 1){
										while ($row2 = $stackable->fetchObject()) {
											$stack = $row2->itemType == "Armor" || $row2->itemType == "Weapon" ? false : $stack;
										}
									}
									$this->sendItem($items[$x],$count[$x],$enchant[$x],$loc,$charid,$stack,$augAtt,$store);
								}
								return $this->resposta("Item(s) successfully purchased!","Oh yeah!","success");
							}else{
								return $this->resposta("You do not have ".$this->DONATE_COIN_NAME." enoug.<br>Your current balance is ".$credito." ".$this->DONATE_COIN_NAME.".<br>Make a donation and increase your balance.","Oooh no!","error");
							}
						}
					}else{
						return $this->resposta("Character not found!<br>Check if the character is offline.","Oops...","error");
					}
				}
			}
			return $this->resposta("Item not found.","Oops...","error");
		}
		
		private function sendItem($itemid,$count,$enchant,$loc,$ownerid,$stackable=true,$augAtt=null,$store=true){
			if($this->db_type){
				if($stackable){
					$records = $this->conn->prepare("SELECT * FROM items WHERE item_id = ? AND owner_id = ? AND loc = ?");
					$records->execute([$itemid,$ownerid,$loc]);
					if($records->rowCount() > 0){
						$updating = $this->conn->prepare("UPDATE items SET count = (count + ?), enchant_level = ? WHERE item_id = ? AND owner_id = ? AND loc = ?");
						$updating->execute([$count,$enchant,$itemid,$ownerid,$loc]);
					}else{
						$charid_items = $this->info_table("items","charid");
						$id_max = $this->conn->prepare("SELECT MAX(".$charid_items.") AS max FROM items");
						$id_max->execute();
						$results = $id_max->fetch(\PDO::FETCH_ASSOC);
						$new_id = 1000 + $results["max"];
						$column = null;
						$colNum = 0;
						$colVal = null;
						$stmt = $this->conn->prepare('SHOW COLUMNS FROM items');
						$defaultZero = array("price_sell", "price_buy", "custom_type1", "custom_type2", "custom_flags", "life_time", "augmentation_id", "attribute_fire", "attribute_water", "attribute_wind", "attribute_earth", "attribute_holy", "attribute_unholy", "agathion_energy", "creator_id", "fish_owner_id", "creation_time", "visual_item_id");
						$defaultNull = array("time_of_use", "data");
						$defaultEmpty = array("attributes", "process");
						$defaultNegative = array("mana_left", "time");
						if($stmt->execute()){
							while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
								if($colNum > 6){
									if(in_array($row["Field"], $defaultZero)){
										$colVal .= "'0'";
									}elseif(in_array($row["Field"], $defaultNull)){
										$colVal .= "NULL";
									}elseif(in_array($row["Field"], $defaultEmpty)){
										$colVal .= "''";
									}elseif(in_array($row["Field"], $defaultNegative)){
										$colVal .= "'-1'";
									}
									$column .= $row["Field"];
									if($colNum < ($stmt->rowCount()-1)){
										$column .= ", ";
										$colVal .= ", ";
									}
								}
								$colNum++;
							}
						}
						$inserting = $this->conn->prepare("INSERT INTO items (owner_id, ".$charid_items.", item_id, count, enchant_level, loc, loc_data, ".$column.") VALUES (?,'".$new_id."',?,?,?,?,'0', ".$colVal.")");
						$inserting->execute([$ownerid,$itemid,$count,$enchant,$loc]);
					}
					return true;
				}else{
					$charid_items = $this->info_table("items","charid");
					$id_max = $this->conn->prepare("SELECT MAX(".$charid_items.") AS max FROM items");
					$id_max->execute();
					$results = $id_max->fetch(\PDO::FETCH_ASSOC);
					$new_id = 1000 + $results["max"];
					$att = null;
					if(!empty($augAtt)){
						$att = explode(",", $augAtt);
						if(!$this->L2jVersaoRussa){
							if($store){
								if($this->L2jVersaoClassic){
									$charid_itematt = $this->info_table("item_variations","charid");
									$records = $this->conn->prepare("UPDATE item_variations SET ".$charid_itematt." = '".$new_id."' WHERE ".$charid_itematt." = ?");
									$records->execute([$att[6]]);
									$charid_elematt = $this->info_table("item_elementals","charid");
									$records2 = $this->conn->prepare("UPDATE item_elementals SET ".$charid_elematt." = '".$new_id."' WHERE ".$charid_elematt." = ?");
									$records2->execute([$att[6]]);
								}else{
									$tables = $this->conn->prepare("SHOW TABLES");
									$tables->execute();
									if(in_array("item_attributes", $tables->fetchAll(\PDO::FETCH_COLUMN))){
										$charid_itematt = $this->info_table("item_attributes","charid");
										$records = $this->conn->prepare("UPDATE item_attributes SET ".$charid_itematt." = '".$new_id."' WHERE ".$charid_itematt." = ?");
										$records->execute([$att[6]]);
									}
									if(in_array("item_elementals", $tables->fetchAll(\PDO::FETCH_COLUMN))){
										$charid_elematt = $this->info_table("item_elementals","charid");
										$records3 = $this->conn->prepare("UPDATE item_elementals SET ".$charid_elematt." = '".$new_id."' WHERE ".$charid_elematt." = ?");
										$records3->execute([$att[6]]);
									}
									if(in_array("augmentations", $tables->fetchAll(\PDO::FETCH_COLUMN))){
										$charid_augment = $this->info_table("augmentations","charid");
										$records2 = $this->conn->prepare("UPDATE augmentations SET ".$charid_augment." = '".$new_id."' WHERE ".$charid_augment." = ?");
										$records2->execute([$att[6]]);
									}
								}
							}else{
								$tables = $this->conn->prepare("SHOW TABLES");
								$tables->execute();
								if(in_array("item_attributes", $tables->fetchAll(\PDO::FETCH_COLUMN))){
									$charid_itematt = $this->info_table("item_attributes","charid");
									for($y=0;$y<6;$y++){
										if(!empty($att[$y])){
											$records3 = $this->conn->prepare("INSERT INTO item_attributes (".$charid_itematt.", augAttributes, augSkillId, augSkillLevel, elemType, elemValue) VALUES ('".$new_id."', '-1', '-1', '-1', '".$y."', ?)");
											$records3->execute([$att[$y]]);
											if($records3->rowCount() == 0){
												$records4 = $this->conn->prepare("INSERT INTO item_attributes (".$charid_itematt.", elemType, elemValue) VALUES ('".$new_id."', '".$y."', ?)");
												$records4->execute([$att[$y]]);
											}
										}
									}
								}
								if(in_array("item_elementals", $tables->fetchAll(\PDO::FETCH_COLUMN))){
									$charid_elematt = $this->info_table("item_elementals","charid");
									for($x=0;$x<6;$x++){
										if(!empty($att[$x])){
											$records2 = $this->conn->prepare("INSERT INTO item_elementals (".$charid_elematt.", elemType, elemValue) VALUES ('".$new_id."', '".$x."', ?)");
											$records2->execute([$att[$x]]);
										}
									}
								}
							}
						}
					}
					$column = null;
					$colNum = 0;
					$colVal = null;
					$stmt = $this->conn->prepare('SHOW COLUMNS FROM items');
					$defaultZero = array("price_sell", "price_buy", "custom_type1", "custom_type2", "custom_flags", "life_time", "augmentation_id", "attribute_fire", "attribute_water", "attribute_wind", "attribute_earth", "attribute_holy", "attribute_unholy", "agathion_energy", "creator_id", "fish_owner_id", "creation_time", "visual_item_id");
					$defaultNull = array("time_of_use", "data");
					$defaultEmpty = array("attributes", "process");
					$defaultNegative = array("mana_left", "time");
					if($stmt->execute()){
						while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
							if($colNum > 6){
								if(in_array($row["Field"], $defaultZero)){
									if(!empty($augAtt) && $this->L2jVersaoRussa){
										if($row["Field"] == "attribute_fire"){
											$colVal .= !empty($att[0]) ? "'".$att[0]."'" : "'0'";
										}elseif($row["Field"] == "attribute_water"){
											$colVal .= !empty($att[1]) ? "'".$att[1]."'" : "'0'";
										}elseif($row["Field"] == "attribute_wind"){
											$colVal .= !empty($att[2]) ? "'".$att[2]."'" : "'0'";
										}elseif($row["Field"] == "attribute_earth"){
											$colVal .= !empty($att[3]) ? "'".$att[3]."'" : "'0'";
										}elseif($row["Field"] == "attribute_holy"){
											$colVal .= !empty($att[4]) ? "'".$att[4]."'" : "'0'";
										}elseif($row["Field"] == "attribute_unholy"){
											$colVal .= !empty($att[5]) ? "'".$att[5]."'" : "'0'";
										}elseif($row["Field"] == "augmentation_id"){
											$colVal .= !empty($att[6]) ? $att[6] > 0 ? "'".$att[6]."'" : "'0'" : "'0'";
										}else{
											$colVal .= "'0'";
										}
									}else{
										$colVal .= "'0'";
									}
								}elseif(in_array($row["Field"], $defaultNull)){
									$colVal .= "NULL";
								}elseif(in_array($row["Field"], $defaultEmpty)){
									$colVal .= "''";
								}elseif(in_array($row["Field"], $defaultNegative)){
									$colVal .= "'-1'";
								}
								$column .= $row["Field"];
								if($colNum < ($stmt->rowCount()-1)){
									$column .= ", ";
									$colVal .= ", ";
								}
							}
							$colNum++;
						}
					}
					if($this->L2jVersaoRussa && $this->chronicle == "Interlude")
						$query_insert = "INSERT INTO items (owner_id, ".$charid_items.", item_type, amount, enchant, location, slot) VALUES (?, '".$new_id."', ?, ?, ?, ?, '0')";
					else
						$query_insert = "INSERT INTO items (owner_id, ".$charid_items.", item_id, count, enchant_level, loc, loc_data, ".$column.") VALUES (?, '".$new_id."', ?, ?, ?, ?, '0', ".$colVal.")";
					$inserting = $this->conn->prepare($query_insert);
					$inserting->execute([$ownerid,$itemid,$count,$enchant,$loc]);
					return true;
				}
			}else{
				$this->kick_char($ownerid);
				$loc = $loc == 'INVENTORY' ? 0 : 1;
				$buf=pack("cVVVVVVVVV",55,$ownerid,$loc,$itemid,$count,$enchant,0,0,0,0).$this->tounicode("admin");
				$this->sendBuf($buf);
				return true;
			}
			return false;
		}
		
		public function bid($id,$value,$login,$itemBroker=false){
			if(!$itemBroker && !$this->ALLOW_AUCTION_CHARACTER_BROKER || $itemBroker && !$this->ALLOW_AUCTION_ITEM_BROKER)
				return $this->resposta("Auctions is disabled.","Oops...","error");
			$table = !$itemBroker ? "icp_shop_items" : "icp_shop_chars";
			$auctionBrokerDays = !$itemBroker ? $this->AUCTION_ITEM_BROKER_DAYS : $this->AUCTION_CHARACTER_BROKER_DAYS;
			if($this->db_type)
				$checkAuction = $this->conn->prepare("SELECT * FROM ".$table." WHERE IF(type > '2', (UNIX_TIMESTAMP(date) + '".($auctionBrokerDays * 86400)."') > '".time()."', '1'='1') AND status = '1' AND id = ?");
			else
				$checkAuction = $this->conn->prepare("SELECT * FROM ".$table." WHERE CASE WHEN type > '2' THEN CASE WHEN DATEADD(DAY,".($auctionBrokerDays * 86400).",s.date) > '".date("Y-m-d H:i:s")."' THEN '0' ELSE '1' END ELSE '0' END = '0' AND status = '1' AND id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			$checkAuction->execute([$id]);
			if($checkAuction->rowCount() > 0){
				$result = null;
				$table2 = !$itemBroker ? "icp_shop_items_auction" : "icp_shop_chars_auction";
				if($this->db_type){
					$records = $this->conn->prepare("SELECT value, account FROM ".$table2." WHERE bidId = ? ORDER BY id DESC LIMIT 1");
				}else{
					$records = $this->conn->prepare("SELECT TOP 1 value, account FROM ".$table2." WHERE bidId = ? ORDER BY id DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				}
				$records->execute([$id]);
				$credito = $this->donateBalance($login);
				if($records->rowCount() > 0){
					while ($row = $records->fetchObject()) {
						if($row->value < $value && $credito > $row->value && $credito >= $value)
							if($this->insertBid($table2,$id,$login,$value,$row->value,$row->account,false))
								$result .= "Bid successfully sent!";
					}
				}else{
					while ($row2 = $checkAuction->fetchObject()) {
						if($row2->price <= $value && $credito >= $row2->price && $credito >= $value)
							if($this->insertBid($table2,$id,$login,$value))
								$result .= "Bid successfully sent!";
					}
				}
				return empty($result) ? $this->resposta("You do not have ".$this->DONATE_COIN_NAME." enoug.<br>Your current balance is ".$credito." ".$this->DONATE_COIN_NAME.".<br>Make a donation and increase your balance.","Oooh no!","error") : $this->resposta($result,"Oooh yeah!","success");
			}else
				return $this->resposta("The auction has ended!","Oooh no!","error");
		}
		
		private function insertBid($table,$id,$login,$value,$lastBidValue=0,$lastBidAccount=null,$firstBid=true){
			$biding = $this->conn->prepare("INSERT INTO ".$table." (bidId, account, value, date) VALUES (?,?,?,?)");
			if($biding->execute([$id,$login,$value,date("Y-m-d H:i:s")])){
				if(!$firstBid){
					$this->addDonate($lastBidValue,$lastBidAccount);
					$this->addDonateLog($lastBidValue." ".$this->DONATE_COIN_NAME." added. Auction bid refund. Auction ID: ".ltrim($id, "0"),0,$lastBidAccount);
				}
				$this->debitDonate($value,$login);
				$this->addDonateLog("Auction bidding. Auction ID: ".ltrim($id, "0"),$value,$login);
				return true;
			}else
				return false;
		}
		
		public function cancelItemBroker($id,$login){
			$timeAuction = $this->AUCTION_ITEM_BROKER_DAYS * 86400;
			$charid_characters = $this->db_type ? $this->info_table("characters","charid") : "char_id";
			$table_characters = $this->db_type ? "characters" : "user_data";
			$records = $this->conn->prepare("SELECT s.* FROM icp_shop_items AS s WHERE s.status = '1' AND (SELECT account_name FROM ".$table_characters." WHERE ".$charid_characters." = s.owner_id) = ? AND CASE WHEN s.type > '2' THEN CASE WHEN (SELECT MAX(value) FROM icp_shop_items_auction WHERE bidId = s.id) IS NULL THEN '0' ELSE '1' END ELSE '0' END = '0' AND s.id = ? ORDER BY s.id DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			$records->execute([$login,$id]);
			if($records->rowCount() == 1){
				if($this->db_type){
					while ($row = $records->fetchObject()) {
						$items = explode(";", $row->item_id);
						$count = explode(";", $row->count);
						$enchant = explode(";", $row->enchant);
						$augment_ref = explode(";", $row->augment_ref);
						$fire = explode(";", $row->fire);
						$water = explode(";", $row->water);
						$wind = explode(";", $row->wind);
						$earth = explode(";", $row->earth);
						$holy = explode(";", $row->holy);
						$unholy = explode(";", $row->unholy);
						$loc = $this->ITEM_BROKER_LOC_PLACE == "INVENTORY" ? "INVENTORY" : "WAREHOUSE";
						for($x=0;$x<(count($items)-1);$x++){
							if(empty($fire[$x]) && empty($water[$x]) && empty($wind[$x]) && empty($earth[$x]) && empty($holy[$x]) && empty($unholy[$x]) && empty($augment_ref[$x])){
								$augAtt = null;
							}else{
								$augAtt = $fire[$x].",".$water[$x].",".$wind[$x].",".$earth[$x].",".$holy[$x].",".$unholy[$x].",".$augment_ref[$x];
							}
							$this->sendItem($items[$x],$count[$x],$enchant[$x],$loc,$row->owner_id,false,$augAtt);
						}
					}
				}
				$deleting = $this->conn->prepare("DELETE FROM icp_shop_items WHERE id = ?");
				$deleting->execute([$id]);
				return $this->resposta("Items returned successfully.","Success!","success");
			}else{
				return $this->resposta("Something went wrong.","Oops...","error");
			}
		}
		
		public function cancelCharacterBroker($id,$login){
			$records = $this->conn->prepare("SELECT s.* FROM icp_shop_chars AS s WHERE CASE WHEN s.type = '2' THEN CASE WHEN (SELECT MAX(value) FROM icp_shop_items_auction WHERE bidId = s.id) IS NULL THEN '0' ELSE '1' END ELSE '0' END = '0' AND s.status = '1' AND s.account = ? AND s.id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			$records->execute([$login,$id]);
			if($records->rowCount() == 1){
				if($this->db_type){
					while ($row = $records->fetchObject()) {
						$charid_characters = $this->info_table("characters","charid");
						$updating = $this->conn->prepare("UPDATE characters SET account_name = '".$row->account."' WHERE account_name = '".$row->has_account."' AND ".$charid_characters." = '".$row->owner_id."'");
						$updating->execute();
					}
				}
				$deleting = $this->conn->prepare("DELETE FROM icp_shop_chars WHERE id = ?");
				$deleting->execute([$id]);
				return $this->resposta("Character returned successfully.","Success!","success");
			}else{
				return $this->resposta("Something went wrong.","Oops...","error");
			}
		}
		
		public function enchantItem($charid,$login,$itemid){
			if(!$this->ENABLE_SAFE_ENCHANT_SYSTEM)
				return $this->resposta("Safe enchant system is disabled.","Oops...","error");
			$noPvpItems = !$this->db_type ? str_replace("i.item_id","i.item_type",$this->noPvpItems) : $this->noPvpItems;
			$wherePvP = !$this->ALLOW_ENCHANT_PVP_ITEMS ? $noPvpItems : null;
			if($this->db_type){
				$charid_characters = $this->info_table("characters","charid");
				$charid_items = $this->info_table("items","charid");
				if($this->L2jVersaoRussa && $this->chronicle == "Interlude")
					$records = $this->conn->prepare("SELECT i.*, (i.enchant) AS enchant_level, (SELECT itemGrade FROM icp_icons WHERE itemId = i.item_type) AS itemGrade FROM items AS i, characters AS c WHERE i.owner_id = c.".$charid_characters." AND i.".$charid_items." = ? AND c.".$charid_characters." = ? AND c.account_name = ?".$wherePvP);
				else
					$records = $this->conn->prepare("SELECT i.*, (SELECT itemGrade FROM icp_icons WHERE itemId = i.item_id) AS itemGrade FROM items AS i, characters AS c WHERE i.owner_id = c.".$charid_characters." AND i.".$charid_items." = ? AND c.".$charid_characters." = ? AND c.account_name = ?".$wherePvP);
			}else{
				$records = $this->conn->prepare("SELECT i.*, (enchant) AS enchant_level, (SELECT itemGrade FROM icp_icons WHERE itemId = i.item_type) AS itemGrade FROM user_item AS i, user_data AS c WHERE i.char_id = c.char_id AND i.item_id = ? AND c.char_id = ? AND c.account_name = ?".$wherePvP, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			}
			$records->execute([$itemid,$charid,$login]);
			if($records->rowCount() == 1){
				while ($row = $records->fetchObject()) {
					if($row->enchant_level >= $this->MAX_ENCHANT)
						return $this->resposta("This item already has the maximum enchants allowed.","Oops...","warning");
					if($this->db_type){
						if($this->L2jVersaoRussa && $this->chronicle != "Interlude"){
							$augment = $row->augmentation_id > 0 ? true : false;
						}else{
							$augElem = explode(",", $this->getAugElem($row->$charid_items));
							$augment = $augElem[6] > 0 ? true : false;
						}
					}else{
						$augment = $row->augmentation > 0 ? true : false;
						$item_type = $row->item_type;
					}
					if($augment && !$this->ALLOW_ENCHANT_AUGMENTED_ITEMS)
						return $this->resposta("Augmented items are prohibited.","Oops...","error");
					switch ($row->itemGrade){
						case "d":
							$price = $this->PRICE_D_GRADE_ITEMS; break;
						case "c":
							$price = $this->PRICE_C_GRADE_ITEMS; break;
						case "b":
							$price = $this->PRICE_B_GRADE_ITEMS; break;
						case "a":
							$price = $this->PRICE_A_GRADE_ITEMS; break;
						case "s":
							$price = $this->PRICE_S_GRADE_ITEMS; break;
						case "s80":
							$price = $this->PRICE_S80_GRADE_ITEMS; break;
						case "s84":
							$price = $this->PRICE_S84_GRADE_ITEMS; break;
						default:
							$price = 1000; break;
					}
					$current_enchant = is_numeric($row->enchant_level) ? $row->enchant_level : 1000000;
					$price = !empty($price) ? $price : 1000000;
					if($current_enchant < 1000000){
						$credito = $this->donateBalance($login);
						if($credito >= $price){
							$chance = $this->ENCHANT_SYSTEM_CHANCE;
							$percent = rand(1,100);
							if($percent <= $chance){
								if($this->db_type){
									$id_max = $this->conn->prepare("SELECT MAX(".$charid_items.") AS max FROM items");
									$id_max->execute();
									$results = $id_max->fetch(\PDO::FETCH_ASSOC);
									$new_id = 1000 + $results["max"];
									if($this->L2jVersaoClassic){
										$charid_itematt = $this->info_table("item_variations","charid");
										$records = $this->conn->prepare("UPDATE item_variations SET ".$charid_itematt." = '".$new_id."' WHERE ".$charid_itematt." = ?");
										$records->execute([$row->{$charid_items}]);
										$charid_elematt = $this->info_table("item_elementals","charid");
										$records2 = $this->conn->prepare("UPDATE item_elementals SET ".$charid_elematt." = '".$new_id."' WHERE ".$charid_elematt." = ?");
										$records2->execute([$row->{$charid_items}]);
									}else{
										$tables = $this->conn->prepare("SHOW TABLES");
										$tables->execute();
										if(in_array("item_attributes", $tables->fetchAll(\PDO::FETCH_COLUMN))){
											$charid_itematt = $this->info_table("item_attributes","charid");
											$records = $this->conn->prepare("UPDATE item_attributes SET ".$charid_itematt." = '".$new_id."' WHERE ".$charid_itematt." = ?");
											$records->execute([$row->{$charid_items}]);
										}
										if(in_array("item_elementals", $tables->fetchAll(\PDO::FETCH_COLUMN))){
											$charid_elematt = $this->info_table("item_elementals","charid");
											$records3 = $this->conn->prepare("UPDATE item_elementals SET ".$charid_elematt." = '".$new_id."' WHERE ".$charid_elematt." = ?");
											$records3->execute([$row->{$charid_items}]);
										}
										if(in_array("augmentations", $tables->fetchAll(\PDO::FETCH_COLUMN))){
											$charid_augment = $this->info_table("augmentations","charid");
											$records2 = $this->conn->prepare("UPDATE augmentations SET ".$charid_augment." = '".$new_id."' WHERE ".$charid_augment." = ?");
											$records2->execute([$row->{$charid_items}]);
										}
									}
									if($this->L2jVersaoRussa && $this->chronicle == "Interlude")
										$enchanting = $this->conn->prepare("UPDATE items SET enchant = ?, ".$charid_items." = '".$new_id."' WHERE ".$charid_items." = ?");
									else
										$enchanting = $this->conn->prepare("UPDATE items SET enchant_level = ?, ".$charid_items." = '".$new_id."' WHERE ".$charid_items." = ?");
									$enchanting->execute([($current_enchant + 1),$itemid]);
								}else{
									$new_id = $row->item_id;
									$this->kick_char($charid);
									$buf=pack("cVVVVVVVVVV",14,$charid,$row->warehouse,$itemid,$item_type,1,($current_enchant + 1),0,0,0,0).$this->tounicode("admin");
									$this->sendBuf($buf);
								}
							}
							$this->debitDonate($price,$login);
							$itemId = $percent > $chance ? $this->db_type ? $row->{$charid_items} : $row->item_id : $new_id;
							$this->addDonateLog($percent <= $chance ? "Enchant item ID[".$itemId."] of +".$current_enchant." to +".($current_enchant + 1)."." : "Enchantment of item ID[".$itemId."] failed",$price,$login);
							$enchanting = $percent > $chance ? "Swal.fire('Oooh no!', 'The enchantment failed.', 'error')" : "Swal.fire('Oh yeah!', 'The enchantment was a success!!!', 'success')";
							$timeJS = 8500;
							$timeSuccess = $timeJS * ($chance / 100);
							$timeFail = $timeJS - $timeSuccess;
							$percentBar1 = $percent > $chance ? $chance : $percent;
							$percentBar2 = $percent > $chance ? $percent - $chance : 0;
							return "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js\" type=\"text/javascript\"></script><script src=\"//cdn.jsdelivr.net/npm/sweetalert2@10\"></script><script type=\"text/javascript\">$(document).ready(function(){ Swal.fire({ title: 'Enchanting', html: '<div class=\"card mt-3 mb-4\"><div class=\"card-header text-center\">Enchanting your item, please wait...</div><div class=\"card-body\"><div class=\"progress mb-2\"><div class=\"progress-bar progress-bar-striped progress-bar-animated bg-success\" id=\"successBar\" style=\"width:0%\"><span id=\"percentBar\"></span></div><div class=\"progress-bar progress-bar-striped progress-bar-animated bg-danger\" id=\"failBar\" style=\"width:0%\"></div></div><div style=\"width:100%;\"><div style=\"width:".$chance."%; float:left; border:1px solid #ccc; border-top:0px; font-size:4px;\">&nbsp;</div><div style=\"width:".(100 - $chance)."%; float:left; border:1px solid #ccc; border-left:0px; border-top:0px; font-size:4px;\">&nbsp;</div><div style=\"width:".$chance."%; float:left; border-left:1px solid #ccc; border-right:1px solid #ccc; font-size:4px;\">&nbsp;</div><div style=\"width:".(100 - $chance)."%; float:left; border-right:1px solid #ccc; font-size:4px;\">&nbsp;</div><div style=\"width:".$chance."%; float:left; font-size:14px; text-align:center; overflow:hidden; margin-top:3px;\"><div style=\"position:relative;top:0px;left:0px;\"><div style=\"position:absolute;top:0px;left:5px;\">0%</div><div style=\"position:absolute;top:0px;right:0px;\">".$chance."%</div></div>&nbsp;</div><div style=\"width:".(100 - $chance)."%; float:left; font-size:14px; text-align:center; overflow:hidden; margin-top:3px;\"><div style=\"position:relative;top:0px;left:0px;\"><div style=\"position:absolute;top:0px;right:0px;\">100%</div></div>&nbsp;</div></div></div></div>', allowOutsideClick: false, showDenyButton: false, showCloseButton: false, showCancelButton: false, showConfirmButton: false }); var percent = 1; var percentBar = document.getElementById('percentBar'); function increment(){ if(percent <= ".$percent.") { percentBar.innerHTML = percent + '%'; } if(percent == ".$percent."){ clearInterval(run); setTimeout(function(){ ".$enchanting." },500); } ++percent; } var run = setInterval(increment, parseInt(".($timeJS-($percent > $chance ? 0 : $timeFail))."/".$percent.")); $(\"#successBar\").animate({ width: \"".$percentBar1."%\" }, ".$timeSuccess."); setTimeout(function(){ $(\"#failBar\").animate({ width: \"".$percentBar2."%\" }, ".$timeFail."); }, ".$timeSuccess."); });</script>";
						}else{
							return $this->resposta("You do not have ".$this->DONATE_COIN_NAME." enoug.<br>Your current balance is ".$credito." ".$this->DONATE_COIN_NAME.".<br>Make a donation and increase your balance.","Oooh no!","error");
						}
					}
				}
			}
			return $this->resposta("Something went wrong.","Oops...","error");
		}
		
		public function accountChange($charid,$login,$account){
			if(empty($charid))
				return $this->resposta("Select a character!","Oops...","error");
			if(empty($account))
				return $this->resposta("Invalid new account!","Oops...","error");
			if(!$this->ALLOW_CHARACTER_NICKNAME_CHANGE)
				return $this->resposta("Account change is disabled.","Oops...","error");
			if($this->db_type){
				$charid_characters = $this->info_table("characters","charid");
				$records = $this->conn->prepare("SELECT * FROM characters WHERE account_name = ? AND ".$charid_characters." = ? AND online='0'");
			}else{
				$records = $this->conn->prepare("SELECT * FROM user_data WHERE account_name = ? AND char_id = ? AND login < logout", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			}
			$records->execute([$login,$charid]);
			$results = $records->fetch(\PDO::FETCH_ASSOC);
			if($results){
				if($this->db_type){
					$nick_check = $this->conn->prepare("SELECT login FROM accounts WHERE login = ?");
				}else{
					global $loginServer;
					$nick_check = $loginServer->prepare("SELECT uid FROM user_account WHERE account = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				}
				$nick_check->execute([$account]);
				if($nick_check->rowCount() == 1){
					$credit = $this->donateBalance($login);
					if($credit >= $this->CHARACTER_ACCOUNT_CHANGE_PRICE){
						$this->debitDonate($this->CHARACTER_ACCOUNT_CHANGE_PRICE,$login);
						$this->addDonateLog("Account changed: ".$results["char_name"]." changed to ".$account.".",$this->CHARACTER_ACCOUNT_CHANGE_PRICE,$login);
						if($this->db_type){
							$acc_changing = $this->conn->prepare("UPDATE characters SET account_name = ? WHERE account_name = ? AND ".$charid_characters." = ? AND online='0'");
							$acc_changing->execute([$account,$login,$charid]);
						}else{
							$this->kick_char($charid);
							$results2 = $nick_check->fetch(\PDO::FETCH_ASSOC);
							$buf=pack("cVV",31,$charid,$results2["uid"]).$this->tounicode($account).$this->tounicode("admin");
							$this->sendBuf($buf);
						}
						return $this->resposta("The character has been successfully transferred to the ".$account." account.","Success!","success");
					}else{
						return $this->resposta("You dont have enough coins to execute this action.<br>Your current balance is ".$credit." ".$this->DONATE_COIN_NAME.".<br>Make a donation and increase your balance.");
					}
				}else{
					return $this->resposta("The account ".$account." does not exist.<br>Try again.","Oops...","error");
				}
			}else{
				return $this->resposta("The character was not found.<br>The character maybe is online!<br>Try again.","Oops","error");
			}
		}
		
		public function classChange($charid,$login,$newBaseId){
			if(empty($charid))
				return $this->resposta("Select a character!","Oops...","error");
			if(!$this->ALLOW_CHARACTER_BASE_CLASS_CHANGE)
				return $this->resposta("Base class change is disabled.","Oops...","error");
			if($newBaseId >= 88 and $newBaseId <= 98){ $raca = 0; }
			elseif($newBaseId >= 99 and $newBaseId <= 105){ $raca = 1; }
			elseif($newBaseId >= 106 and $newBaseId <= 112){ $raca = 2; }
			elseif($newBaseId >= 113 and $newBaseId <= 116){ $raca = 3; }
			elseif($newBaseId >= 117 and $newBaseId <= 118){ $raca = 4; }
			else{ $raca = 100; }
			if($raca != 100){
				if($this->db_type){
					$charid_characters = $this->info_table("characters","charid");
					if($this->L2jVersaoRussa){
						$charid_subclass = $this->info_table("character_subclasses","charid");
						$records = $this->conn->prepare("SELECT c.char_name, (SELECT class_id FROM character_subclasses WHERE ".$charid_subclass." = c.".$charid_characters." AND isBase = '1') AS base_class FROM characters AS c WHERE c.account_name = ? AND c.".$charid_characters." = ? AND c.online='0'");
					}else{
						$records = $this->conn->prepare("SELECT char_name, base_class FROM characters WHERE account_name = ? AND ".$charid_characters." = ? AND online='0'");
					}
				}else{
					$records = $this->conn->prepare("SELECT *, (subjob0_class) AS base_class FROM user_data WHERE account_name = ? AND char_id = ? AND login < logout", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				}
				$records->execute([$login,$charid]);
				$results = $records->fetch(\PDO::FETCH_ASSOC);
				if($results){
					$credit = $this->donateBalance($login);
					if($credit >= $this->CHARACTER_BASE_CLASS_CHANGE_PRICE){
						if($results["base_class"] >= 123 and $results["base_class"] <= 136){
							return $this->resposta("Sorry, the requisition has been canceled!<br>Kamaeis are prohibited of base change.","Oops...","error");
						}else{
							$this->debitDonate($this->CHARACTER_BASE_CLASS_CHANGE_PRICE,$login);
							$this->addDonateLog("Base class changed: ".$results["char_name"]." changed base class ".$this->classe_name($results["base_class"])." to ".$this->classe_name($newBaseId).".",$this->CHARACTER_BASE_CLASS_CHANGE_PRICE,$login);
							if($this->db_type){
								$charid_skills = $this->info_table("character_skills","charid");
								$deleting_skills = $this->conn->prepare("DELETE FROM character_skills WHERE ".$charid_skills." = ?");
								$deleting_skills->execute([$charid]);
								$charid_oly = $this->info_table("olympiad_nobles","charid");
								$updating_oly = $this->conn->prepare("UPDATE olympiad_nobles SET class_id = ?, olympiad_points = '0', competitions_done = '0' WHERE ".$charid_oly." = ?");
								$updating_oly->execute([$newBaseId,$charid]);
								if(!$this->L2jVersaoRussa){
									$charid_heroes = $this->info_table("heroes","charid");
									$updating_hero = $this->conn->prepare("UPDATE heroes SET class_id = ? WHERE ".$charid_heroes." = ?");
									$updating_hero->execute([$newBaseId,$charid]);
								}
								if($this->L2jVersaoRussa){
									$changing_base = $this->conn->prepare("UPDATE character_subclasses AS c SET c.class_id = ? WHERE (SELECT account_name FROM characters WHERE ".$charid_characters." = c.".$charid_subclass." AND online='0') = ? AND ".$charid_subclass." = ?");
									$changing_base->execute([$newBaseId,$login,$charid]);
								}else{
									$changing_base = $this->conn->prepare("UPDATE characters SET base_class = ?, race = ?, classid = ? WHERE account_name = ? AND ".$charid_characters." = ? AND online='0'");
									$changing_base->execute([$newBaseId,$raca,$newBaseId,$login,$charid]);
								}
							}else{
								$this->kick_char($charid);
								$buf=pack("cVVVVVVV",16,$charid,$results["gender"],$raca,$newBaseId,$results["face_index"],$results["hair_shape_index"],$results["hair_color_index"]).$this->tounicode("admin");
								$this->sendBuf($buf);
							}
							return $this->resposta("Base Class of the character has been successfully exchanged!","Success!","success");
						}
					}else{
						return $this->resposta("You do not have ".$this->DONATE_COIN_NAME." enoug.<br>Your current balance is ".$credit." ".$this->DONATE_COIN_NAME.".<br>Make a donation and increase your balance.","Oooh no!","error");
					}
				}else{
					return $this->resposta("The character was not found.<br>The character can be online, log out!<br>Try again.","Oops...","error");
				}
			}else{
				return $this->resposta("An error happened when trying to switch the base class.","Oops...","error");
			}
		}
		
		public function sexChange($charid,$login,$sex){
			if(empty($charid))
				return $this->resposta("Select a character!","Oops...","error");
			if(!$this->ALLOW_CHARACTER_SEX_CHANGE)
				return $this->resposta("Sex change is disabled.","Oops...","error");
			if($this->db_type){
				$charid_characters = $this->info_table("characters","charid");
				$charid_subclass = $this->L2jVersaoRussa ? $this->info_table("character_subclasses","charid") : null;
				$base_class = $this->L2jVersaoRussa ? ", (SELECT class_id FROM character_subclasses WHERE ".$charid_subclass." = c.".$charid_characters." AND isBase = '1') AS base_class" : null;
				$records = $this->conn->prepare("SELECT c.*".$base_class." FROM characters AS c WHERE c.account_name = ? AND c.".$charid_characters." = ? AND c.online='0'");
			}else{
				$records = $this->conn->prepare("SELECT *, (class) AS base_class, (gender) AS sex FROM user_data WHERE account_name = ? AND char_id = ? AND login < logout", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			}
			$records->execute([$login,$charid]);
			$results = $records->fetch(\PDO::FETCH_ASSOC);
			if($results){
				$credit = $this->donateBalance($login);
				if($credit >= $this->CHARACTER_SEX_CHANGE_PRICE){
					if($results["base_class"] >= 123 and $results["base_class"] <= 136){
						return $this->resposta("Sorry, the requisition has been canceled!<br>Kamaeis are prohibited of sex change.","Oops...","error");
					}else{
						$sex = $sex == 1 ? 0 : 1;
						$currentSex = $results["sex"] == 0 ? "Male" : "Female";
						$newSex = $sex == 0 ? "Male" : "Female";
						if($currentSex == $newSex){
							return $this->resposta("You selected ".$newSex.", but your character is already ".$newSex.".<br>This action was canceled and no ".$this->DONATE_COIN_NAME." was used.","Oops...","error");
						}else{
							$this->debitDonate($this->CHARACTER_SEX_CHANGE_PRICE,$login);
							$this->addDonateLog("Sex changed: ".$results["char_name"]." changed sex from ".$currentSex." to ".$newSex.".",$this->CHARACTER_SEX_CHANGE_PRICE,$login);
							if($this->db_type){
								$sex_changing = $this->conn->prepare("UPDATE characters SET sex = ? WHERE account_name = ? AND ".$charid_characters." = ? AND online='0'");
								$sex_changing->execute([$sex,$login,$charid]);
							}else{
								$this->kick_char($charid);
								if($results["base_class"] >= 88 and $results["base_class"] <= 98){ $raca = 0; }
								elseif($results["base_class"] >= 99 and $results["base_class"] <= 105){ $raca = 1; }
								elseif($results["base_class"] >= 106 and $results["base_class"] <= 112){ $raca = 2; }
								elseif($results["base_class"] >= 113 and $results["base_class"] <= 116){ $raca = 3; }
								elseif($results["base_class"] >= 117 and $results["base_class"] <= 118){ $raca = 4; }
								$buf=pack("cVVVVVVV",16,$charid,$sex,$raca,$results["base_class"],$results["face_index"],$results["hair_shape_index"],$results["hair_color_index"]).$this->tounicode("admin");
								$this->sendBuf($buf);
							}
							return $this->resposta("The sex has been successfully changed to ".$newSex.".","Success!","success");
						}
					}
				}else{
					return $this->resposta("You dont have enough coins to execute this action.<br>Your current balance is ".$credit." ".$this->DONATE_COIN_NAME.".<br>Make a donation and increase your balance.","Oooh no!","error");
				}
			}else{
				return $this->resposta("The character was not found.<br>The character maybe is online!<br>Try again.","Oops...","error");
			}
		}
		
		public function nickChange($charid,$login,$nick){
			if(empty($charid))
				return $this->resposta("Select a character!","Oops...","error");
			if(empty($nick))
				return $this->resposta("Invalid new nickname!","Oops...","error");
			if(!$this->ALLOW_CHARACTER_NICKNAME_CHANGE)
				return $this->resposta("Nickname change is disabled.","Oops...","error");
			$charid_characters = $this->db_type ? $this->info_table("characters","charid") : "char_id";
			$tab_characters = $this->db_type ? "characters" : "user_data";
			$where_characters = $this->db_type ? "online='0'" : "login < logout";
			$records = $this->conn->prepare("SELECT * FROM ".$tab_characters." WHERE account_name = ? AND ".$charid_characters." = ? AND ".$where_characters, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			$records->execute([$login,$charid]);
			$results = $records->fetch(\PDO::FETCH_ASSOC);
			if($results){
				$nick_check = $this->conn->prepare("SELECT char_name FROM ".$tab_characters." WHERE char_name = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				$nick_check->execute([$nick]);
				if($nick_check->rowCount() > 0){
					return $this->resposta("This nick name is already in use.<br>Choose another and try again.","Oops...","error");
				}else{
					$credit = $this->donateBalance($login);
					if($credit >= $this->CHARACTER_NICKNAME_CHANGE_PRICE){
						$this->debitDonate($this->CHARACTER_NICKNAME_CHANGE_PRICE,$login);
						$this->addDonateLog("Nickname changed: ".$results["char_name"]." changed nickname to ".$nick.".",$this->CHARACTER_NICKNAME_CHANGE_PRICE,$login);
						if($this->db_type){
							if(!$this->L2jVersaoRussa){
								$olyColumns = $this->conn->prepare("SHOW COLUMNS FROM olympiad_nobles");
								$olyColumns->execute();
								if(in_array("char_name", $olyColumns->fetchAll(\PDO::FETCH_COLUMN))){
									$charid_oly = $this->info_table("olympiad_nobles","charid");
									$update_oly = $this->conn->prepare("UPDATE olympiad_nobles SET char_name = ? WHERE ".$charid_oly." = ?");
									$update_oly->execute([$nick,$charid]);
								}
								$heroColumns = $this->conn->prepare("SHOW COLUMNS FROM heroes");
								$heroColumns->execute();
								if(in_array("char_name", $heroColumns->fetchAll(\PDO::FETCH_COLUMN))){
									$charid_heroes = $this->info_table("heroes","charid");
									$update_hero = $this->conn->prepare("UPDATE heroes SET char_name = ? WHERE ".$charid_heroes." = ?");
									$update_hero->execute([$nick,$charid]);
								}
							}
							$nick_changing = $this->conn->prepare("UPDATE characters SET char_name = ? WHERE account_name = ? AND ".$charid_characters." = ? AND online='0'");
							$nick_changing->execute([$nick,$login,$charid]);
						}else{
							$this->kick_char($charid);
							$buf=pack("cV",4,$charid).$this->tounicode($nick).$this->tounicode("admin");
							$this->sendBuf($buf);
						}
						return $this->resposta("The nick name has been successfully changed to ".$nick.".","Success!","success");
					}else{
						return $this->resposta("You dont have enough coins to execute this action.<br>Your current balance is ".$credit." ".$this->DONATE_COIN_NAME.".<br>Make a donation and increase your balance.","Oooh no!","error");
					}
				}
			}else{
				return $this->resposta("The character was not found.<br>The character maybe is online!<br>Try again.","Oops...","error");
			}
		}
		
		private function getItemName($itemId){
			$item = $this->conn->prepare("SELECT itemName FROM icp_icons WHERE itemId = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			$item->execute([$itemId]);
			$results = $item->fetch(\PDO::FETCH_ASSOC);
			if($results){
				return $results["itemName"];
			}else{
				return "No_name";
			}
		}
		
		private function kkk($qtd){
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
		
		private function remainingTime($data,$abrevia = false) {
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
			$return .= $segun > 0 ? "<strong>".$segun."</strong>" : null;
			$return .= $segun > 0 ? $abrevia ? "s." : " second(s)." : null;
			return $return;
		}
		
		private function reward($login){
			if(!$this->ENABLE_REWARD_SYSTEM)
				return "0;0;0";
			if($this->db_type){
				$reward = $this->conn->prepare("SELECT SUM(c.onlinetime) AS online_time, SUM(c.pvpkills) AS pvp, SUM(c.pkkills) AS pk, IF((SELECT COUNT(*) FROM icp_rewards WHERE account = c.account_name) > 0, (SELECT CONCAT(onlinetime, ';', pvpkills, ';', pkkills) FROM icp_rewards WHERE account = c.account_name), '0;0;0') AS reward_records FROM characters AS c WHERE c.account_name = ?");
				$reward->execute([$login]);
				if($reward->rowCount() == 1){
					while ($row = $reward->fetchObject()) {
						$reward_records = explode(";", $row->reward_records);
						return ($row->online_time - $reward_records[0] ?? 0).";".($row->pvp - $reward_records[1] ?? 0).";".($row->pk - $reward_records[2] ?? 0);
					}
				}else{
					return "0;0;0";
				}
			}else{
				$reward1 = $this->conn->prepare("SELECT CONCAT(onlinetime, ';', pvpkills, ';', pkkills) AS reward_records FROM icp_rewards WHERE account = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				$reward1->execute([$login]);
				$results = $reward1->fetch(\PDO::FETCH_ASSOC);
				$reward_records = explode(";", $results ? $results["reward_records"] : "0;0;0");
				$reward2 = $this->conn->prepare("SELECT SUM(c.use_time) AS online_time, SUM(c.Duel) AS pvp, SUM(c.PK) AS pk FROM user_data AS c WHERE c.account_name = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				$reward2->execute([$login]);
				if($reward2->rowCount() == 1){
					while ($row2 = $reward2->fetchObject()) {
						return ($row2->online_time - $reward_records[0] ?? 0).";".($row2->pvp - $reward_records[1] ?? 0).";".($row2->pk - $reward_records[2] ?? 0);
					}
				}else{
					return "0;0;0";
				}
			}
		}
		
		public function getReward($charid,$online,$pvp,$pk,$login){
			if(!$this->ENABLE_REWARD_SYSTEM || !$this->ALLOW_REWARD_ONLINE_TIME && !$this->ALLOW_REWARD_PVP && !$this->ALLOW_REWARD_PK)
				return $this->resposta("Rewards system is disabled.","Oops...","error");
			$result = null;
			$rewards = explode(";", $this->reward($login));
			$online = !empty($online) ? (floor($rewards[0] / (86400 * $this->REWARD_ONLINE_TIME_DAYS)) * 86400) : 0;
			$pvp = !empty($pvp) ? (floor($rewards[1] / $this->REWARD_PVP_COUNT) * $this->REWARD_PVP_COUNT) : 0;
			$pk = !empty($pk) ? (floor($rewards[2] / $this->REWARD_PK_COUNT) * $this->REWARD_PK_COUNT) : 0;
			if(empty($online) && empty($pvp) && empty($pk)){
				return $this->resposta("You have no rewards to receive.","Oooh no!","error");
			}else{
				if($this->db_type){
					$charid_characters = $this->info_table("characters","charid");
					$online_check = $this->conn->prepare("SELECT * FROM characters WHERE ".$charid_characters." = ? AND account_name = ? AND online = '0'");
				}else{
					$online_check = $this->conn->prepare("SELECT * FROM user_data WHERE char_id = ? AND account_name = ? AND login < logout", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				}
				$online_check->execute([$charid,$login]);
				if($online_check->rowCount() == 1){
					$records = $this->conn->prepare("SELECT * FROM icp_rewards WHERE account = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$records->execute([$login]);
					if($records->rowCount() > 0){
						$updating_reward = $this->conn->prepare("UPDATE icp_rewards SET onlinetime = (onlinetime + ?), pvpkills = (pvpkills + ?), pkkills = (pkkills + ?) WHERE account = ?");
						$updating_reward->execute([$online,$pvp,$pk,$login]);
					}else{
						$inserting_reward = $this->conn->prepare("INSERT INTO icp_rewards (onlinetime, pvpkills, pkkills, account) VALUES (?,?,?,?)");
						$inserting_reward->execute([$online,$pvp,$pk,$login]);
					}
					if($this->ALLOW_REWARD_ONLINE_TIME && $online > 0){
						$result .= "You won: ";
						$onlineItems = explode(";", $this->REWARD_ONLINE_TIME_ITEMS);
						for($x=0;$x<(count($onlineItems)-1);$x++){
							$OI = explode(",", $onlineItems[$x]);
							$OICount = $OI[1] * ($online/86400);
							$result .= $OICount > 999 ? $this->kkk($OICount)." of " : $this->kkk($OICount)." ";
							$result .= $OI[0] == 18000 ? $this->DONATE_COIN_NAME : $this->getItemName($OI[0]);
							if($x==(count($onlineItems)-2))
								$result .= " ";
							elseif($x==(count($onlineItems)-3))
								$result .= " and ";
							else
								$result .= ", ";
							if($OI[0] == 18000){
								$this->addDonate($OICount,$login);
								$this->addDonateLog("Reward System: You won: ".$OICount." ".$this->DONATE_COIN_NAME." for ".str_replace("<strong>", "", str_replace("</strong>", "", str_replace(", ", "", $this->remainingTime($online, false))))." online.",0,$login);
							}else
								$this->sendItem($OI[0],$OICount,0,$this->REWARD_SYSTEM_LOC,$charid);
						}
						$result .= "for ".str_replace("<strong>", "", str_replace("</strong>", "", str_replace(", ", "", $this->remainingTime($online, false))))." online exchanged.<br>";
					}
					if($this->ALLOW_REWARD_PVP && $pvp > 0){
						$result .= "You won: ";
						$pvpItems = explode(";", $this->REWARD_PVP_ITEMS);
						for($z=0;$z<(count($pvpItems)-1);$z++){
							$PI = explode(",", $pvpItems[$z]);
							$PICount = $PI[1] * ($pvp/$this->REWARD_PVP_COUNT);
							$result .= $PICount > 999 ? $this->kkk($PICount)." of " : $this->kkk($PICount)." ";
							$result .= $PI[0] == 18000 ? $this->DONATE_COIN_NAME : $this->getItemName($PI[0]);
							if($z==(count($pvpItems)-2))
								$result .= " ";
							elseif($z==(count($pvpItems)-3))
								$result .= " and ";
							else
								$result .= ", ";
							if($PI[0] == 18000){
								$this->addDonate($PICount,$login);
								$this->addDonateLog("Reward System: You won: ".$PICount." ".$this->DONATE_COIN_NAME." for ".$pvp." PvP(s) points.",0,$login);
							}else
								$this->sendItem($PI[0],$PICount,0,$this->REWARD_SYSTEM_LOC,$charid);
						}
						$result .= "for ".$pvp." PvP\'s points exchanged.<br>";
					}
					if($this->ALLOW_REWARD_PK && $pk > 0){
						$result .= "You won: ";
						$pkItems = explode(";", $this->REWARD_PK_ITEMS);
						for($y=0;$y<(count($pkItems)-1);$y++){
							$PkI = explode(",", $pkItems[$y]);
							$PkICount = $PkI[1] * ($pk/$this->REWARD_PK_COUNT);
							$result .= $PkICount > 999 ? $this->kkk($PkICount)." of " : $this->kkk($PkICount)." ";
							$result .= $PkI[0] == 18000 ? $this->DONATE_COIN_NAME : $this->getItemName($PkI[0]);
							if($y==(count($pkItems)-2))
								$result .= " ";
							elseif($y==(count($pkItems)-3))
								$result .= " and ";
							else
								$result .= ", ";
							if($PkI[0] == 18000){
								$this->addDonate($PkICount,$login);
								$this->addDonateLog("Reward System: You won: ".$PkICount." ".$this->DONATE_COIN_NAME." for ".$pk." Pk(s) points.",0,$login);
							}else
								$this->sendItem($PkI[0],$PkICount,0,$this->REWARD_SYSTEM_LOC,$charid);
						}
						$result .= "for ".$pk." Pk\'s points exchanged.<br>";
					}
				}else{
					return $this->resposta("Character not found.<br>Check if the character is offline and try again.","Oops...","error");
				}
			}
			return empty($result) ? $this->resposta("You have no rewards to receive.","Oooh no!","error") : $this->resposta($result,"Good job!","success");
		}
		
		public function saveConfigs($serverName,$siteTitle,$chronicle,$safeEnchant,$maxEnchant,$xpRate,$spRate,$dropRate,$spoilRate,$russBase,$acisBase,$oldAcis,$pcTemplate,$mbTemplate,$olyPeriod,$timezone,$instagram,$youtube,$facebook,$discord,$maxRankings,$maxIndexRankings,$clientDownload,$systemDownload,$accCreateByEmail,$accRecoveryByEmail,$smtpHost,$smtpPort,$smtpEmail,$smtpPass,$donateCoinName,$enableDeposit,$depositBank,$depositBranch,$depositAccount,$depositType,$depositBeneficiary,$depositCpf,$donateEmail,$enableMercadopago,$mpCurrency,$mpCoins,$mpToken,$enablePagseguro,$psCurrency,$psCoins,$psEmail,$psToken,$enablePaypal,$ppCurrency,$ppCoins,$ppEmail,$enableMessages,$enableNews,$maxNews,$enableScreenshots,$maxScreenshots,$enableVideos,$maxVideos,$enableBosses,$enableCastles,$enableClanHalls,$enableTopPvp,$enableTopClassPvp,$maxClassPvp,$enableTopPk,$enableTopClassPk,$maxClassPk,$enableTopOnline,$enableTopAdena,$goldbarValue,$enableTopClan,$enableTopClanByPvp,$enableTopOly,$enableTopHero,$enableTopRaid,$enableRewardSystem,$rewardSystemLoc,$enableRewardOnline,$rewardOnlineDays,$rewardOnlineItems,$enableRewardPvp,$rewardPvpCount,$rewardPvpItems,$enableRewardPk,$rewardPkCount,$rewardPkItems,$enablePrimeShop,$maxPrimeShop,$primeShopLoc,$enableItemBroker,$allowComboItems,$allowPvpItems,$allowAugmentedItems,$allowAuctionItems,$auctionItemsDay,$auctionRangeItems,$maxItemBroker,$itemBrokerLoc,$enableCharacterBroker,$allowAuctionCharacters,$auctionCharactersDay,$auctionRangeCharacters,$maxCharacterBroker,$enableSafeEnchant,$allowPvpEnchant,$allowAugmentedEnchant,$enchantChance,$enchantDGrade,$enchantCGrade,$enchantBGrade,$enchantAGrade,$enchantSGrade,$enchantS80Grade,$enchantS84Grade,$enableCharacterChanges,$enableBaseChange,$baseChangePrice,$enableSexChange,$sexChangePrice,$enableNickChange,$nickChangePrice,$enableAccChange,$accChangePrice,$enableCheckStatus,$forceLoginOnline,$forceGameOnline,$allowServerStats,$enableFakePlayers,$fakePlayers,$login,$senderPrivId){
			if($senderPrivId == 10){
				$saveConfigs = $this->conn->prepare("INSERT INTO icp_configs (SITE_NAME, SITE_TITLE, CHRONICLE, SAFE_ENCHANT, MAX_ENCHANT, XP_RATE, SP_RATE, DROP_RATE, SPOIL_RATE, L2jVersaoRussa, L2jVersaoAcis, l2jOldAcis, PC_TEMPLATE, MB_TEMPLATE, OLY_PERIOD_DAYS, TIME_ZONE, INSTAGRAM, YOUTUBE, FACEBOOK, DISCORD, MAX_RANKINGS, MAX_INDEX_RANKINGS, CLIENT_DOWNLOAD_LINK, FILES_DOWNLOAD_LINK, CreateAccWithEmail, RecoveryAccWithEmail, SMTP_HOST, SMTP_PORT, SMTP_EMAIL, SMTP_PASS, DONATE_COIN_NAME, enable_deposit, bank_name, bank_branch, bank_account, bank_type, bank_beneficiary, bank_cpf, email_donate_confirmation, enable_mercadopago, mp_currency, mp_amount, mp_token, enable_pagseguro, ps_currency, ps_amount, ps_email, ps_token, enable_paypal, pp_currency, pp_amount, pp_email, enable_messages, enable_news, MAX_NEWS, enable_screenshots, MAX_SCREENSHOTS_GALLERY, enable_videos, MAX_VIDEOS_GALLERY, enable_bosses, enable_castles, enable_clan_halls, enable_top_pvp, enable_top_class_pvp, MAX_RANKING_PVP_BY_CLASSES, enable_top_pk, enable_top_class_pk, MAX_RANKING_PK_BY_CLASSES, enable_top_online, enable_top_adena, GOLDBAR_VALUE, enable_top_clan, TOP_CLAN_BY_PVP, enable_top_oly, enable_top_hero, enable_top_raid, ENABLE_REWARD_SYSTEM, REWARD_SYSTEM_LOC, ALLOW_REWARD_ONLINE_TIME, REWARD_ONLINE_TIME_DAYS, REWARD_ONLINE_TIME_ITEMS, ALLOW_REWARD_PVP, REWARD_PVP_COUNT, REWARD_PVP_ITEMS, ALLOW_REWARD_PK, REWARD_PK_COUNT, REWARD_PK_ITEMS, ENABLE_PRIME_SHOP, MAX_PRIME_SHOP_ITEMS, PRIME_SHOP_LOC_PLACE, ENABLE_ITEM_BROKER, ALLOW_ITEM_BROKER_SALE_COMBO_ITEMS, ALLOW_ITEM_BROKER_SALE_PVP_ITEMS, ALLOW_ITEM_BROKER_SALE_AUGMENTED_ITEMS, ALLOW_AUCTION_ITEM_BROKER, AUCTION_ITEM_BROKER_DAYS, AUCTION_ITEM_RANGES_BID, MAX_ITEM_BROKER_LIST, ITEM_BROKER_LOC_PLACE, ENABLE_CHARACTER_BROKER, ALLOW_AUCTION_CHARACTER_BROKER, AUCTION_CHARACTER_BROKER_DAYS, AUCTION_CHARACTER_RANGES_BID, MAX_CHARACTER_BROKER_LIST, ENABLE_SAFE_ENCHANT_SYSTEM, ALLOW_ENCHANT_PVP_ITEMS, ALLOW_ENCHANT_AUGMENTED_ITEMS, ENCHANT_SYSTEM_CHANCE, PRICE_D_GRADE_ITEMS, PRICE_C_GRADE_ITEMS, PRICE_B_GRADE_ITEMS, PRICE_A_GRADE_ITEMS, PRICE_S_GRADE_ITEMS, PRICE_S80_GRADE_ITEMS, PRICE_S84_GRADE_ITEMS, enable_character_changes, ALLOW_CHARACTER_BASE_CLASS_CHANGE, CHARACTER_BASE_CLASS_CHANGE_PRICE, ALLOW_CHARACTER_SEX_CHANGE, CHARACTER_SEX_CHANGE_PRICE, ALLOW_CHARACTER_NICKNAME_CHANGE, CHARACTER_NICKNAME_CHANGE_PRICE, ALLOW_CHARACTER_ACCOUNT_CHANGE, CHARACTER_ACCOUNT_CHANGE_PRICE, enable_servers_check, force_login_server, force_game_server, allow_server_stats, enable_fake_players, fake_players_number, saved_by, saved_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				if($saveConfigs->execute([$serverName,$siteTitle,$chronicle,$safeEnchant,$maxEnchant,$xpRate,$spRate,$dropRate,$spoilRate,!empty($russBase) ? 1 : $russBase,!empty($acisBase) ? 1 : $acisBase,!empty($oldAcis) ? 1 : $oldAcis,$pcTemplate,$mbTemplate,$olyPeriod,$timezone,$instagram,$youtube,$facebook,$discord,$maxRankings,$maxIndexRankings,empty($clientDownload) ? "#" : $clientDownload,empty($systemDownload) ? "#" : $systemDownload,!empty($accCreateByEmail) ? 1 : $accCreateByEmail,!empty($accRecoveryByEmail) ? 1 : $accRecoveryByEmail,$smtpHost,$smtpPort,$smtpEmail,$smtpPass,$donateCoinName,!empty($enableDeposit) ? 1 : $enableDeposit,$depositBank,$depositBranch,$depositAccount,$depositType,$depositBeneficiary,$depositCpf,$donateEmail,!empty($enableMercadopago) ? 1 : $enableMercadopago,$mpCurrency,$mpCoins,$mpToken,!empty($enablePagseguro) ? 1 : $enablePagseguro,$psCurrency,$psCoins,$psEmail,$psToken,!empty($enablePaypal) ? 1 : $enablePaypal,$ppCurrency,$ppCoins,$ppEmail,!empty($enableMessages) ? 1 : $enableMessages,!empty($enableNews) ? 1 : $enableNews,$maxNews,!empty($enableScreenshots) ? 1 : $enableScreenshots,$maxScreenshots,!empty($enableVideos) ? 1 : $enableVideos,$maxVideos,!empty($enableBosses) ? 1 : $enableBosses,!empty($enableCastles) ? 1 : $enableCastles,!empty($enableClanHalls) ? 1 : $enableClanHalls,!empty($enableTopPvp) ? 1 : $enableTopPvp,!empty($enableTopClassPvp) ? 1 : $enableTopClassPvp,$maxClassPvp,!empty($enableTopPk) ? 1 : $enableTopPk,!empty($enableTopClassPk) ? 1 : $enableTopClassPk,$maxClassPk,!empty($enableTopOnline) ? 1 : $enableTopOnline,!empty($enableTopAdena) ? 1 : $enableTopAdena,$goldbarValue,!empty($enableTopClan) ? 1 : $enableTopClan,!empty($enableTopClanByPvp) ? 1 : $enableTopClanByPvp,!empty($enableTopOly) ? 1 : $enableTopOly,!empty($enableTopHero) ? 1 : $enableTopHero,!empty($enableTopRaid) ? 1 : $enableTopRaid,!empty($enableRewardSystem) ? 1 : $enableRewardSystem,$rewardSystemLoc,!empty($enableRewardOnline) ? 1 : $enableRewardOnline,$rewardOnlineDays,$rewardOnlineItems,!empty($enableRewardPvp) ? 1 : $enableRewardPvp,$rewardPvpCount,$rewardPvpItems,!empty($enableRewardPk) ? 1 : $enableRewardPk,$rewardPkCount,$rewardPkItems,!empty($enablePrimeShop) ? 1 : $enablePrimeShop,$maxPrimeShop,$primeShopLoc,!empty($enableItemBroker) ? 1 : $enableItemBroker,!empty($allowComboItems) ? 1 : $allowComboItems,!empty($allowPvpItems) ? 1 : $allowPvpItems,!empty($allowAugmentedItems) ? 1 : $allowAugmentedItems,!empty($allowAuctionItems) ? 1 : $allowAuctionItems,$auctionItemsDay,$auctionRangeItems,$maxItemBroker,$itemBrokerLoc,!empty($enableCharacterBroker) ? 1 : $enableCharacterBroker,!empty($allowAuctionCharacters) ? 1 : $allowAuctionCharacters,$auctionCharactersDay,$auctionRangeCharacters,$maxCharacterBroker,!empty($enableSafeEnchant) ? 1 : $enableSafeEnchant,!empty($allowPvpEnchant) ? 1 : $allowPvpEnchant,!empty($allowAugmentedEnchant) ? 1 : $allowAugmentedEnchant,$enchantChance,$enchantDGrade,$enchantCGrade,$enchantBGrade,$enchantAGrade,$enchantSGrade,$enchantS80Grade,$enchantS84Grade,!empty($enableCharacterChanges) ? 1 : $enableCharacterChanges,!empty($enableBaseChange) ? 1 : $enableBaseChange,$baseChangePrice,!empty($enableSexChange) ? 1 : $enableSexChange,$sexChangePrice,!empty($enableNickChange) ? 1 : $enableNickChange,$nickChangePrice,!empty($enableAccChange) ? 1 : $enableAccChange,$accChangePrice,!empty($enableCheckStatus) ? 1 : $enableCheckStatus,!empty($forceLoginOnline) ? 1 : $forceLoginOnline,!empty($forceGameOnline) ? 1 : $forceGameOnline,!empty($allowServerStats) ? 1 : $allowServerStats,!empty($enableFakePlayers) ? 1 : $enableFakePlayers,$fakePlayers,$login,date("Y-m-d H:i:s")]))
					return $this->resposta("Settings saved successfully!","Good Job!","success","?icp=panel&show=adm-configs");
				else
					return $this->resposta("Error trying to save settings","Oops...","error");
			}else{
				return $this->resposta("You are not allowed to do this.","Oops...","error");
			}
		}
		
		public function addPrimeShop($itemId=array(),$itemCount=array(),$itemEnchant=array(),$itemFire=array(),$itemWater=array(),$itemWind=array(),$itemEarth=array(),$itemHoly=array(),$itemDark=array(),$itemPrice,$senderPrivId){
			if($senderPrivId >= 9){
				if($this->ENABLE_PRIME_SHOP){
					$item_price = $this->filter($itemPrice) > 0 ? $this->filter($itemPrice) : 1;
					$item_arr = array();
					$item_id = null;
					$item_count = null;
					$item_enchant = null;
					$item_fire = null;
					$item_water = null;
					$item_wind = null;
					$item_earth = null;
					$item_holy = null;
					$item_dark = null;
					$qtd_itens = count($itemId);
					for($x=0;$x<$qtd_itens;$x++){
						$item_id = $this->filter($itemId[$x]) > 0 ? $this->filter($itemId[$x]) : 1;
						$item_count = $this->filter($itemCount[$x]) > 0 ? $this->filter($itemCount[$x]) : 1;
						$item_enchant = $this->filter($itemEnchant[$x]) > 0 ? $this->filter($itemEnchant[$x]) : 0;
						$item_fire = $this->filter($itemFire[$x]) > 0 ? $this->filter($itemFire[$x]) : 0;
						$item_water = $this->filter($itemWater[$x]) > 0 ? $this->filter($itemWater[$x]) : 0;
						$item_wind = $this->filter($itemWind[$x]) > 0 ? $this->filter($itemWind[$x]) : 0;
						$item_earth = $this->filter($itemEarth[$x]) > 0 ? $this->filter($itemEarth[$x]) : 0;
						$item_holy = $this->filter($itemHoly[$x]) > 0 ? $this->filter($itemHoly[$x]) : 0;
						$item_dark = $this->filter($itemDark[$x]) > 0 ? $this->filter($itemDark[$x]) : 0;
						array_push($item_arr, array("id" => $item_id, $item_count, $item_enchant, $item_fire, $item_water, $item_wind, $item_earth, $item_holy, $item_dark));
					}
					foreach ($item_arr as $key => $row) {
						$id[$key]  = $row['id'];
					}
					array_multisort($id, SORT_ASC, $item_arr);
					$item_id = null;
					$item_count = null;
					$item_enchant = null;
					$item_fire = null;
					$item_water = null;
					$item_wind = null;
					$item_earth = null;
					$item_holy = null;
					$item_dark = null;
					for($y=0;$y<count($item_arr);$y++){
						$item_id .= $item_arr[$y]["id"].",";
						$item_count .= $item_arr[$y][0].",";
						$item_enchant .= $item_arr[$y][1].",";
						$item_fire .= $item_arr[$y][2].",";
						$item_water .= $item_arr[$y][3].",";
						$item_wind .= $item_arr[$y][4].",";
						$item_earth .= $item_arr[$y][5].",";
						$item_holy .= $item_arr[$y][6].",";
						$item_dark .= $item_arr[$y][7].",";
					}
					$records = $this->conn->prepare("INSERT INTO icp_prime_shop (item_id,price,count,enchant,attribute_fire,attribute_water,attribute_wind,attribute_earth,attribute_holy,attribute_unholy) VALUES (?,?,?,?,?,?,?,?,?,?)");
					$records->execute([$item_id,$item_price,$item_count,$item_enchant,$item_fire,$item_water,$item_wind,$item_earth,$item_holy,$item_dark]);
					if($records->rowCount() == 1){
						return $this->resposta($qtd_itens > 1 ? "The combo of items was created successfully!" : "The item was created successfully!","Success!","success");
					}else
						return $this->resposta("There was an error adding item.","Oops...","error");
				}else{
					return $this->resposta("The Prime Shop system is disabled.","Oops...","error");
				}
			}else{
				return $this->resposta("You are not allowed to do this.","Oops...","error");
			}
		}
		
		public function deletePrimeShop($id,$senderPrivId){
			if($senderPrivId >= 9){
				if($this->ENABLE_PRIME_SHOP){
					if(empty($id))
						return $this->resposta("Item(s) not found.","Oops...","error");
					$records = $this->conn->prepare("DELETE FROM icp_prime_shop WHERE id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					if($records->execute([$id]))
						return $this->resposta("Item(s) successfully removed.","Success!","success");
					else
						return $this->resposta("There was an error removing the item.","Oops...","error");
				}else{
					return $this->resposta("The Prime Shop system is disabled.","Oops...","error");
				}
			}else{
				return $this->resposta("You are not allowed to do this.","Oops...","error");
			}
		}
		
		public function approveScreenshot($id,$senderPrivId){
			if($senderPrivId >= 7){
				if($this->ENABLE_SCREENSHOTS){
					$records = $this->conn->prepare("UPDATE icp_gallery_screenshots SET status = CASE WHEN status = '0' THEN '1' ELSE '0' END WHERE id = ?");
					if($records->execute([$id]))
						return $this->resposta("Screenshot approved/disapproved successfully.","Success!","success");
					else
						return $this->resposta("There was an error approving/disapproved the screenshot.","Oops...","error");
				}else{
					return $this->resposta("The Screenshot system is disabled.","Oops...","error");
				}
			}else{
				return $this->resposta("You are not allowed to do this.","Oops...","error");
			}
		}
		
		public function deleteScreenshot($id,$senderPrivId){
			if($senderPrivId >= 7){
				if($this->ENABLE_SCREENSHOTS){
					$records = $this->conn->prepare("SELECT screenshot FROM icp_gallery_screenshots WHERE id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$records->execute([$id]);
					if($records->execute([$id])){
						while($row = $records->fetchObject()){
							unlink("images/screenshots/".$row->screenshot);
							unlink("images/screenshots/thumbs/".$row->screenshot);
						}
						$records2 = $this->conn->prepare("DELETE FROM icp_gallery_screenshots WHERE id = ?");
						if($records2->execute([$id])){
							return $this->resposta("Screenshot deleted successfully.","Success!","success");
						}else
							return $this->resposta("There was an error deleting the screenshot.","Oops...","error");
					}else
						return $this->resposta("There was an error deleting the screenshot.","Oops...","error");
				}else{
					return $this->resposta("The Screenshot system is disabled.","Oops...","error");
				}
			}else{
				return $this->resposta("You are not allowed to do this.","Oops...","error");
			}
		}
		
		public function approveVideo($id,$senderPrivId){
			if($senderPrivId >= 7){
				if($this->ENABLE_VIDEOS){
					$records = $this->conn->prepare("UPDATE icp_gallery_videos SET status = CASE WHEN status = '0' THEN '1' ELSE '0' END WHERE id = ?");
					if($records->execute([$id]))
						return $this->resposta("Video approved/disapproved successfully.","Success!","success");
					else
						return $this->resposta("There was an error approving/disapproved the video.","Oops...","error");
				}else{
					return $this->resposta("The Video system is disabled.","Oops...","error");
				}
			}else{
				return $this->resposta("You are not allowed to do this.","Oops...","error");
			}
		}
		
		public function deleteVideo($id,$senderPrivId){
			if($senderPrivId >= 7){
				if($this->ENABLE_VIDEOS){
					$records = $this->conn->prepare("DELETE FROM icp_gallery_videos WHERE id = ?");
					if($records->execute([$id]))
						return $this->resposta("Video deleted successfully.","Success!","success");
					else
						return $this->resposta("There was an error deleting the video.","Oops...","error");
				}else{
					return $this->resposta("The Video system is disabled.","Oops...","error");
				}
			}else{
				return $this->resposta("You are not allowed to do this.","Oops...","error");
			}
		}
		
		public function addNews($title,$news,$edit=0,$login,$senderPrivId){
			if($senderPrivId >= 8){
				if($this->ENABLE_NEWS){
					if(empty($title))
						return $this->resposta("Title is required!","Oops...","error");
					if(empty($news))
						return $this->resposta("News is required!","Oops...","error");
					if($edit > 0){
						$records = $this->conn->prepare("UPDATE icp_news SET news = ?, title = ? WHERE id = ?");
						$records->execute([preg_replace("/\r|\n/","",$news),$title,$edit]);
					}else{
						$records = $this->conn->prepare("INSERT INTO icp_news (news, title, author, date) VALUES (?,?,?,?)");
						$records->execute([preg_replace("/\r|\n/","",$news),$title,$login,date("Y-m-d H:i:s")]);
					}
					if($records->rowCount() == 1)
						return $this->resposta($edit > 0 ? "News successfully edited." : "News successfully posted.","Success!","success","?icp=panel&show=adm-news");
					else
						return $this->resposta("An error occurred while trying to post/edit the news.","Oops...","error","?icp=panel&show=adm-news");
				}else{
					return $this->resposta("The news system is disabled.","Oops...","error");
				}
			}else{
				return $this->resposta("You are not allowed to do this.","Oops...","error");
			}
		}
		
		public function editNews($id,$senderPrivId){
			if($senderPrivId >= 8){
				if($this->ENABLE_NEWS){
					$records = $this->conn->prepare("SELECT * FROM icp_news WHERE id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$records->execute([$id]);
					if($records->rowCount() == 1){
						while($row = $records->fetchObject()){
							return array($row->title,$row->news,$row->id);
						}
					}
				}
			}
		}
		
		public function deleteNews($id,$senderPrivId){
			if($senderPrivId >= 8){
				if($this->ENABLE_NEWS){
					$records = $this->conn->prepare("DELETE FROM icp_news WHERE id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$records->execute([$id]);
					if($records->rowCount() == 1)
						return $this->resposta("News deleted successfully.","Success!","success","?icp=panel&show=adm-news");
					else
						return $this->resposta("An error occurred while trying to delete the news.","Oops...","error","?icp=panel&show=adm-news");
				}else{
					return $this->resposta("The news system is disabled.","Oops...","error");
				}
			}else{
				return $this->resposta("You are not allowed to do this.","Oops...","error");
			}
		}
		
		private function createThumb($imgPath,$imgName,$thumbPath,$thumbName,$thumbWidth,$ext){
			switch($ext){
				case "gif" : $source = imagecreatefromgif($imgPath.$imgName); break;
				case "jpeg" : $source = imagecreatefromjpeg($imgPath.$imgName); break;
				case "png" : $source = imagecreatefrompng($imgPath.$imgName); break;
				case "bmp" : $source = imagecreatefrombmp($imgPath.$imgName); break;
				default: $source = imagecreatefromjpeg($imgPath.$imgName); break;
			}
			$ratio = $thumbWidth / imagesx($source);
			$height = imagesy($source) * $ratio;
			$new_image = imagecreatetruecolor($thumbWidth, $height);
			imagecopyresampled($new_image, $source, 0, 0, 0, 0, $thumbWidth, $height, imagesx($source), imagesy($source));
			switch($ext){
				case "gif" : imagegif($new_image,$thumbPath.$thumbName); break;
				case "jpeg" : imagejpeg($new_image,$thumbPath.$thumbName); break;
				case "png" : imagepng($new_image,$thumbPath.$thumbName); break;
				case "bmp" : imagebmp($new_image,$thumbPath.$thumbName); break;
				default: imagejpeg($new_image,$thumbPath.$thumbName); break;
			}
		}
		
		public function editProfile($name,$email,$photo,$login,$senderPrivId){
			if($senderPrivId >= 6){
				if (!empty($photo["name"])) {
					$error = null;
					$height = 1024;
					$width = 1600;
					$weight = 1000000; // 1000000 = 1MB
					$dimensions = getimagesize($photo["tmp_name"]);
					if($dimensions){
						$error .= !in_array($dimensions[2], array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP)) ? "This is not an image.<br>" : null;
						$error .= $dimensions[1] > $height ? "The image height must not exceed ".$height." pixels.<br>" : null;
						$error .= $dimensions[0] > $width ? "The image width must not exceed ".$width." pixels.<br>" : null;
						$error .= $photo["size"] > $weight ? "The image must have a maximum of ".$weight." bytes.<br>" : null;
						if(empty($error)){
							preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $photo["name"], $ext);
							$imgName = md5(uniqid(time())) . "." . $ext[1];
							$imagePath = "images/profiles/" . $imgName;
							move_uploaded_file($photo["tmp_name"], $imagePath);
							$this->createThumb("images/profiles/",$imgName,"images/profiles/",$imgName,100,$ext[1]);
							$records = $this->conn->prepare("SELECT * FROM icp_staff WHERE login = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
							$records->execute([$login]);
							if($records->rowCount() == 1){
								while($row = $records->fetchObject()){
									if(!empty($row->img))
										if(file_exists("images/profiles/".$row->img))
											unlink("images/profiles/".$row->img);
								}
								$records2 = $this->conn->prepare("UPDATE icp_staff SET name = ?, email = ?, img = ? WHERE login = ?");
							}else{
								$records2 = $this->conn->prepare("INSERT INTO icp_staff (name, email, img, login) VALUES (?,?,?,?)");
							}
							if($records2->execute([$name,$email,$imgName,$login]))
								return $this->resposta("Profile saved successfully.","Success!","success");
							else
								return $this->resposta("An error occurred while trying to edit the profile.","Oops...","error");
						}else{
							return $this->resposta($error,"Oops...","error");
						}
					}else{
						return $this->resposta("This is not an image.","Oops...","error");
					}
				}else{
					$records = $this->conn->prepare("SELECT * FROM icp_staff WHERE login = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$records->execute([$login]);
					if($records->rowCount() == 1){
						$records2 = $this->conn->prepare("UPDATE icp_staff SET name = ?, email = ? WHERE login = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
						$records2->execute([$name,$email,$login]);
					}else{
						$records2 = $this->conn->prepare("INSERT INTO icp_staff (name, email, img, login) VALUES (?,?,?,?)");
						$records2->execute([$name,$email,"",$login]);
					}
					if($records2->rowCount() == 1)
						return $this->resposta("Profile saved successfully.","Success!","success");
					else
						return $this->resposta("An error occurred while trying to edit the profile.","Oops...","error");
				}
			}else{
				return $this->resposta("You are not allowed to do this.","Oops...","error");
			}
		}
		
		public function deleteProfile($login,$senderPrivId){
			if($senderPrivId >= 6){
				$records = $this->conn->prepare("SELECT img FROM icp_staff WHERE login = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				$records->execute([$login]);
				if($records->rowCount() == 1){
					$records2 = $this->conn->prepare("DELETE FROM icp_staff WHERE login = ?");
					$records2->execute([$login]);
					if($records2->rowCount() == 1){
						while ($row = $records->fetchObject()) {
							if(!empty($row->img))
								if(file_exists("images/profiles/".$row->img))
									unlink("images/profiles/".$row->img);
						}
						return $this->resposta("Profile deleted successfully.","Success!","success");
					}
				}
				return $this->resposta("An error occurred while trying to delete the profile.","Oops...","error");
			}else{
				return $this->resposta("You are not allowed to do this.","Oops...","error");
			}
		}
		
		public function sendMsg($title,$msg,$id,$attachment,$recipient,$login,$senderPrivId){
			if($this->enable_messages){
				$records2 = $this->conn->prepare("SELECT * FROM icp_tickets_ban WHERE login = ? AND status = '1'", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				$records2->execute([$login]);
				if($records2->rowCount() > 0){
					return $this->resposta("You are unable to send messages.","Oops...","error");
				}else{
					if (!empty($attachment["name"])) {
						$error = null;
						if($attachment["type"] == "application/pdf"){
							$weight = 1000000; // 1000000 = 1MB
							$error .= $attachment["size"] > $weight ? "The PDF must have a maximum of ".$weight." bytes.<br>" : null;
							if(empty($error)){
								$pdfName = md5(uniqid(time())) . ".pdf";
								$pdfPath = "images/attachment/" . $pdfName;
								move_uploaded_file($attachment["tmp_name"], $pdfPath);
								if(!empty($id)){
									$records = $this->conn->prepare("SELECT * FROM icp_tickets WHERE id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
									$records->execute([$id]);
									if($records->rowCount() == 1){
										while ($row = $records->fetchObject()) {
											if($row->sender == $login || $senderPrivId > 5){
												if($row->status == 1){
													$reply = $this->conn->prepare("INSERT INTO icp_tickets_msgs (msg_id, message, date, answered, attach) VALUES (?,?,?,?,?)", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
													if($reply->execute([$id,strip_tags($msg),date("Y-m-d H:i:s"),$login,$pdfName]))
														return $this->resposta("Posted successfully.","Success!","success");
													else
														return $this->resposta("An error occurred while trying to post.","Oops...","error");
												}else{
													return $this->resposta("The topic has been locked and is unable to receive new messages.","Oops...","error");
												}
											}else{
												return $this->resposta("Posting not allowed.","Oops...","error");
											}
										}
									}else
										return $this->resposta("Message not found.","Oops...","error");
								}else{
									$newMsg = $this->conn->prepare("INSERT INTO icp_tickets (title, sender, status) VALUES (?,?,'1')", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
									if($newMsg->execute([strip_tags($title),!empty($recipient) && $senderPrivId > 5 ? $recipient : $login])){
										$newMsg2 = $this->conn->prepare("INSERT INTO icp_tickets_msgs (msg_id, message, date, answered, attach) VALUES (?,?,?,?,?)", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
										if($newMsg2->execute([$this->conn->lastInsertId(),strip_tags($msg),date("Y-m-d H:i:s"),$login,$pdfName])){
											return $this->resposta("Posted successfully.","Success!","success");
										}else{
											return $this->resposta("An error occurred while trying to post.","Oops...","error");
										}
									}else{
										return $this->resposta("An error occurred while trying to post.","Oops...","error");
									}
								}
							}else{
								return $this->resposta($error,"Oops...","error");
							}
						}else{
							$height = 1024;
							$width = 1600;
							$weight = 1000000; // 1000000 = 1MB
							$dimensions = getimagesize($attachment["tmp_name"]);
							if($dimensions){
								$error .= !in_array($dimensions[2], array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP)) ? "This is not an image.<br>" : null;
								$error .= $dimensions[1] > $height ? "The image height must not exceed ".$height." pixels.<br>" : null;
								$error .= $dimensions[0] > $width ? "The image width must not exceed ".$width." pixels.<br>" : null;
								$error .= $attachment["size"] > $weight ? "The image must have a maximum of ".$weight." bytes.<br>" : null;
								if(empty($error)){
									preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $attachment["name"], $ext);
									$imgName = md5(uniqid(time())) . "." . $ext[1];
									$imagePath = "images/attachment/" . $imgName;
									move_uploaded_file($attachment["tmp_name"], $imagePath);
									if(!empty($id)){
										$records = $this->conn->prepare("SELECT * FROM icp_tickets WHERE id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
										$records->execute([$id]);
										if($records->rowCount() == 1){
											while ($row = $records->fetchObject()) {
												if($row->sender == $login || $senderPrivId > 5){
													if($row->status == 1){
														$reply = $this->conn->prepare("INSERT INTO icp_tickets_msgs (msg_id, message, date, answered, attach) VALUES (?,?,?,?,?)", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
														if($reply->execute([$id,strip_tags($msg),date("Y-m-d H:i:s"),$login,$imgName]))
															return $this->resposta("Posted successfully.","Success!","success");
														else
															return $this->resposta("An error occurred while trying to post.","Oops...","error");
													}else{
														return $this->resposta("The topic has been locked and is unable to receive new messages.","Oops...","error");
													}
												}else{
													return $this->resposta("Posting not allowed.","Oops...","error");
												}
											}
										}else
											return $this->resposta("Message not found.","Oops...","error");
									}else{
										$newMsg = $this->conn->prepare("INSERT INTO icp_tickets (title, sender, status) VALUES (?,?,'1')", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
										if($newMsg->execute([strip_tags($title),!empty($recipient) && $senderPrivId > 5 ? $recipient : $login])){
											$newMsg2 = $this->conn->prepare("INSERT INTO icp_tickets_msgs (msg_id, message, date, answered, attach) VALUES (?,?,?,?,?)", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
											if($newMsg2->execute([$this->conn->lastInsertId(),strip_tags($msg),date("Y-m-d H:i:s"),$login,$imgName])){
												return $this->resposta("Posted successfully.","Success!","success");
											}else{
												return $this->resposta("An error occurred while trying to post.","Oops...","error");
											}
										}else{
											return $this->resposta("An error occurred while trying to post.","Oops...","error");
										}
									}
								}else{
									return $this->resposta($error,"Oops...","error");
								}
							}else{
								return $this->resposta("This is not an image.","Oops...","error");
							}
						}
					}else{
						if(!empty($id)){
							$records = $this->conn->prepare("SELECT * FROM icp_tickets WHERE id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
							$records->execute([$id]);
							if($records->rowCount() == 1){
								while ($row = $records->fetchObject()) {
									if($row->sender == $login || $senderPrivId > 5){
										if($row->status == 1){
											$reply = $this->conn->prepare("INSERT INTO icp_tickets_msgs (msg_id, message, date, answered, attach) VALUES (?,?,?,?,?)", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
											if($reply->execute([$id,strip_tags($msg),date("Y-m-d H:i:s"),$login,/*$attachment*/""]))
												return $this->resposta("Posted successfully.","Success!","success");
											else
												return $this->resposta("An error occurred while trying to post.","Oops...","error");
										}else{
											return $this->resposta("The topic has been locked and is unable to receive new messages.","Oops...","error");
										}
									}else{
										return $this->resposta("Posting not allowed.","Oops...","error");
									}
								}
							}else
								return $this->resposta("Message not found.","Oops...","error");
						}else{
							$newMsg = $this->conn->prepare("INSERT INTO icp_tickets (title, sender, status) VALUES (?,?,'1')", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
							if($newMsg->execute([strip_tags($title),!empty($recipient) && $senderPrivId > 5 ? $recipient : $login])){
								$newMsg2 = $this->conn->prepare("INSERT INTO icp_tickets_msgs (msg_id, message, date, answered, attach) VALUES (?,?,?,?,?)", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
								if($newMsg2->execute([$this->conn->lastInsertId(),strip_tags($msg),date("Y-m-d H:i:s"),$login,/*$attachment*/""])){
									return $this->resposta("Posted successfully.","Success!","success");
								}else{
									return $this->resposta("An error occurred while trying to post.","Oops...","error");
								}
							}else{
								return $this->resposta("An error occurred while trying to post.","Oops...","error");
							}
						}
					}
				}
			}
		}
		
		public function banAccountMsgs($login,$type,$sender,$senderPrivId){
			if($this->enable_messages){
				if($senderPrivId >= 6){
					$table = $this->db_type ? "accounts" : "user_auth";
					$colLogin = $this->db_type ? "login" : "account";
					global $loginServer;
					$checkName = $loginServer->prepare("SELECT * FROM ".$table." WHERE ".$colLogin." = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$checkName->execute([$login]);
					if($checkName->rowCount() == 1){
						$records = $this->conn->prepare("SELECT login FROM icp_tickets_ban WHERE login = ? AND status = '1'", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
						$records->execute([$login]);
						if($records->rowCount() == 1){
							if($type == 1){
								return $this->resposta("This user is already blocked.","Oops...","error");
							}elseif($type == 2){
								$records2 = $this->conn->prepare("UPDATE icp_tickets_ban SET status = ?, unblockedLogin = ?, unblockedDate = ? WHERE login = ? AND status = ?");
								$records2->execute(["0",$sender,date("Y-m-d H:i:s"),$login,"1"]);
								return $records2 ? $this->resposta("Account successfully unblocked.","Success!","success") : $this->resposta("Error unblocking account","Oops...","error");
							}else{
								return $this->resposta("You are not allowed to do this.","Oops...","error");
							}
						}else{
							if($type == 1){
								$records2 = $this->conn->prepare("INSERT INTO icp_tickets_ban (login, blockedLogin, blockedDate, unblockedLogin, unblockedDate, status) VALUES (?,?,?,?,?,?)");
								$records2->execute([$login,$sender,date("Y-m-d H:i:s"),"","","1"]);
								return $records2 ? $this->resposta("Account successfully blocked.","Success!","success") : $this->resposta("Error unblocking account","Oops...","error");
							}elseif($type == 2){
								return $this->resposta("This user is already unblocked.","Oops...","error");
							}else
								return $this->resposta("You are not allowed to do this.","Oops...","error");
						}
					}else
						return $this->resposta("Account not found.","Oops...","error");
				}else{
					return $this->resposta("You are not allowed to do this.","Oops...","error");
				}
			}
		}
		
	}
	
}