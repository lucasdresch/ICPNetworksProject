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
	
	class ICP_Panel extends Suport {
		
		public function resposta($msg,$title=null,$type=null,$redirect=null){
			echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js\" type=\"text/javascript\"></script><script src=\"//cdn.jsdelivr.net/npm/sweetalert2@10\"></script><script type=\"text/javascript\">$(document).ready(function(){Swal.fire({ title: '".$title."', html: '".$msg."', icon: '".$type."'".(!empty($redirect) ? ", confirmButtonText: 'Ok', preConfirm: () => { return [ window.location.href = '".$redirect."' ] } })" : "})")."})</script>";
		}
		
		public function activateAcc($hash) {
			$acc_id = preg_replace("/(\D)/i" , "" , $hash);
			if($acc_id > 0){
				$records = $this->loginConn->prepare('SELECT login FROM icp_accounts WHERE acc_id = ? AND status = "0"', array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				$records->execute([$acc_id]);
				if($records->rowCount() == 1){
					while ($row = $records->fetchObject()) {
						$up_acc = $this->loginConn->prepare('UPDATE icp_accounts SET status = "1" WHERE acc_id = ? AND status = "0"');
						$up_acc->execute([$acc_id]);
						if($this->db_type){
							$accesslevel_accounts = $this->info_table("accounts","accesslevel");
							$up_icp = $this->loginConn->prepare('UPDATE accounts SET '.$accesslevel_accounts.' = "0" WHERE login = ? AND '.$accesslevel_accounts.' = "-1"');
						}else{
							$up_icp = $this->loginConn->prepare('UPDATE user_account SET pay_stat = "1" WHERE account = ? AND pay_stat = "0"');
						}
						$up_icp->execute([$row->login]);
						return true;
					}
				}else{
					return false;
				}
			}
			return false;
		}
		
		private function quest_name($quest_id){
			switch ($quest_id){
				case 1:
					$quest_name = "_letters_of_love"; break;
				case 2:
					$quest_name = "_what_women_want"; break;
				case 3:
					$quest_name = "_will_the_seal_be_broken"; break;
				case 4:
					$quest_name = "_long_live_the_paagrio_lord"; break;
				case 5:
					$quest_name = "_miners_favor"; break;
				case 6:
					$quest_name = "_step_into_the_future"; break;
				case 7:
					$quest_name = "_a_trip_begins"; break;
				case 8:
					$quest_name = "_an_adventure_begins"; break;
				case 9:
					$quest_name = "_into_the_city_of_humans"; break;
				case 10:
					$quest_name = "_into_the_world"; break;
				case 11:
					$quest_name = "_secret_meeting_with_ketra_orcs"; break;
				case 12:
					$quest_name = "_secret_meeting_with_varka_silenos"; break;
				case 13:
					$quest_name = "_parcel_delivery"; break;
				case 14:
					$quest_name = "_whereabouts_of_the_archaeologist"; break;
				case 15:
					$quest_name = "_sweet_whispers"; break;
				case 16:
					$quest_name = "_the_coming_darkness"; break;
				case 17:
					$quest_name = "_light_and_darkness"; break;
				case 18:
					$quest_name = "_meeting_with_the_golden_ram"; break;
				case 19:
					$quest_name = "_go_to_the_pastureland"; break;
				case 20:
					$quest_name = "_bring_up_with_love"; break;
				case 21:
					$quest_name = "_hidden_truth"; break;
				case 22:
					$quest_name = "_tragedy_in_von_hellmann_forest"; break;
				case 23:
					$quest_name = "_lidias_heart"; break;
				case 24:
					$quest_name = "_inhabitants_of_the_forest_of_the_dead"; break;
				case 25:
					$quest_name = "_hiding_behind_the_truth"; break;
				case 27:
					$quest_name = "_chest_caught_with_a_bait_of_wind"; break;
				case 28:
					$quest_name = "_chest_caught_with_a_bait_of_icy_air"; break;
				case 29:
					$quest_name = "_chest_caught_with_a_bait_of_earth"; break;
				case 30:
					$quest_name = "_chest_caught_with_a_bait_of_fire"; break;
				case 31:
					$quest_name = "_secret_buried_in_the_swamp"; break;
				case 32:
					$quest_name = "_an_obvious_lie"; break;
				case 33:
					$quest_name = "_make_a_pair_of_dress_shoes"; break;
				case 34:
					$quest_name = "_in_search_of_cloth"; break;
				case 35:
					$quest_name = "_find_glittering_jewelry"; break;
				case 36:
					$quest_name = "_make_a_sewing_kit"; break;
				case 37:
					$quest_name = "_make_formal_wear"; break;
				case 38:
					$quest_name = "_dragon_fangs"; break;
				case 39:
					$quest_name = "_red-eyed_invaders"; break;
				case 42:
					$quest_name = "_help_the_uncle"; break;
				case 43:
					$quest_name = "_help_the_sister"; break;
				case 44:
					$quest_name = "_help_the_son"; break;
				case 45:
					$quest_name = "_to_talking_island"; break;
				case 46:
					$quest_name = "_once_more_in_the_arms_of_the_mother_tree"; break;
				case 47:
					$quest_name = "_into_the_dark_forest"; break;
				case 48:
					$quest_name = "_to_the_immortal_plateau"; break;
				case 49:
					$quest_name = "_the_road_home"; break;
				case 50:
					$quest_name = "_lanoscos_special_bait"; break;
				case 51:
					$quest_name = "_ofulles_special_bait"; break;
				case 52:
					$quest_name = "_willies_special_bait"; break;
				case 53:
					$quest_name = "_linnaeus_special_bait"; break;
				case 70:
					$quest_name = "_succession_to_the_legend_phoenix_knight"; break;
				case 71:
					$quest_name = "_succession_to_the_legend_evas_templar"; break;
				case 72:
					$quest_name = "_succession_to_the_legend_sword_muse"; break;
				case 73:
					$quest_name = "_succession_to_the_legend_duelist"; break;
				case 74:
					$quest_name = "_succession_to_the_legend_dreadnoughts"; break;
				case 75:
					$quest_name = "_succession_to_the_legend_titan"; break;
				case 76:
					$quest_name = "_succession_to_the_legend_grand_khavatari"; break;
				case 77:
					$quest_name = "_succession_to_the_legend_dominator"; break;
				case 78:
					$quest_name = "_succession_to_the_legend_doomcryer"; break;
				case 79:
					$quest_name = "_succession_to_the_legend_adventurer"; break;
				case 80:
					$quest_name = "_succession_to_the_legend_wind_rider"; break;
				case 81:
					$quest_name = "_succession_to_the_legend_ghost_hunter"; break;
				case 82:
					$quest_name = "_succession_to_the_legend_sagittarius"; break;
				case 83:
					$quest_name = "_succession_to_the_legend_moonlight_sentinel"; break;
				case 84:
					$quest_name = "_succession_to_the_legend_ghost_sentinel"; break;
				case 85:
					$quest_name = "_succession_to_the_legend_cardinal"; break;
				case 86:
					$quest_name = "_succession_to_the_legend_hierophant"; break;
				case 87:
					$quest_name = "_succession_to_the_legend_evas_saint"; break;
				case 88:
					$quest_name = "_succession_to_the_legend_archmage"; break;
				case 89:
					$quest_name = "_succession_to_the_legend_mystic_muse"; break;
				case 90:
					$quest_name = "_succession_to_the_legend_storm_screamer"; break;
				case 91:
					$quest_name = "_succession_to_the_legend_arcana_lord"; break;
				case 92:
					$quest_name = "_succession_to_the_legend_elemental_master"; break;
				case 93:
					$quest_name = "_succession_to_the_legend_spectral_master"; break;
				case 94:
					$quest_name = "_succession_to_the_legend_soultaker"; break;
				case 95:
					$quest_name = "_succession_to_the_legend_hell_knight"; break;
				case 96:
					$quest_name = "_succession_to_the_legend_spectral_dancer"; break;
				case 97:
					$quest_name = "_succession_to_the_legend_shillien_templar"; break;
				case 98:
					$quest_name = "_succession_to_the_legend_shillien_saint"; break;
				case 99:
					$quest_name = "_succession_to_the_legend_fortune_seeker"; break;
				case 100:
					$quest_name = "_succession_to_the_legend_maestro"; break;
				case 101:
					$quest_name = "_sword_of_solidarity"; break;
				case 102:
					$quest_name = "_sea_of_spores_fever"; break;
				case 103:
					$quest_name = "_spirit_of_craftsman"; break;
				case 104:
					$quest_name = "_spirit_of_mirrors"; break;
				case 105:
					$quest_name = "_skirmish_with_the_orcs"; break;
				case 106:
					$quest_name = "_forgotten_truth"; break;
				case 107:
					$quest_name = "_merciless_punishment"; break;
				case 108:
					$quest_name = "_jumble_tumble_diamond_fuss"; break;
				case 118:
					$quest_name = "_to_lead_and_be_led"; break;
				case 151:
					$quest_name = "_cure_for_fever_disease"; break;
				case 152:
					$quest_name = "_shards_of_golem"; break;
				case 153:
					$quest_name = "_deliver_goods"; break;
				case 154:
					$quest_name = "_sacrifice_to_the_sea"; break;
				case 155:
					$quest_name = "_find_sir_windawood"; break;
				case 156:
					$quest_name = "_millennium_love"; break;
				case 157:
					$quest_name = "_recover_smuggled_goods"; break;
				case 158:
					$quest_name = "_seed_of_evil"; break;
				case 159:
					$quest_name = "_protect_the_water_source"; break;
				case 160:
					$quest_name = "_nerupas_request"; break;
				case 161:
					$quest_name = "_fruit_of_the_mothertree"; break;
				case 162:
					$quest_name = "_curse_of_the_underground_fortress"; break;
				case 163:
					$quest_name = "_legacy_of_the_poet"; break;
				case 164:
					$quest_name = "_blood_fiend"; break;
				case 165:
					$quest_name = "_shilens_hunt"; break;
				case 166:
					$quest_name = "_mass_of_darkness"; break;
				case 167:
					$quest_name = "_dwarven_kinship"; break;
				case 168:
					$quest_name = "_deliver_supplies"; break;
				case 169:
					$quest_name = "_offspring_of_nightmares"; break;
				case 170:
					$quest_name = "_dangerous_seduction"; break;
				case 171:
					$quest_name = "_acts_of_evil"; break;
				case 211:
					$quest_name = "_trial_of_the_challenger"; break;
				case 212:
					$quest_name = "_trial_of_duty"; break;
				case 213:
					$quest_name = "_trial_of_the_seeker"; break;
				case 214:
					$quest_name = "_trial_of_the_scholar"; break;
				case 215:
					$quest_name = "_trial_of_the_pilgrim"; break;
				case 216:
					$quest_name = "_trial_of_the_guildsman"; break;
				case 217:
					$quest_name = "_testimony_of_trust"; break;
				case 218:
					$quest_name = "_testimony_of_life"; break;
				case 219:
					$quest_name = "_testimony_of_fate"; break;
				case 220:
					$quest_name = "_testimony_of_glory"; break;
				case 221:
					$quest_name = "_testimony_of_prosperity"; break;
				case 222:
					$quest_name = "_test_of_the_duelist"; break;
				case 223:
					$quest_name = "_test_of_the_champion"; break;
				case 224:
					$quest_name = "_test_of_sagittarius"; break;
				case 225:
					$quest_name = "_test_of_the_searcher"; break;
				case 226:
					$quest_name = "_test_of_the_healer"; break;
				case 227:
					$quest_name = "_test_of_the_reformer"; break;
				case 228:
					$quest_name = "_test_of_magus"; break;
				case 229:
					$quest_name = "_test_of_witchcraft"; break;
				case 230:
					$quest_name = "_test_of_the_summoner"; break;
				case 231:
					$quest_name = "_test_of_the_maestro"; break;
				case 232:
					$quest_name = "_test_of_the_lord"; break;
				case 233:
					$quest_name = "_test_of_the_war_spirit"; break;
				case 234:
					$quest_name = "_fates_whisper"; break;
				case 235:
					$quest_name = "_mimirs_elixir"; break;
				case 241:
					$quest_name = "_possessor_of_a_precious_soul_-_1"; break;
				case 242:
					$quest_name = "_possessor_of_a_precious_soul_-_2"; break;
				case 246:
					$quest_name = "_possessor_of_a_precious_soul_-_3"; break;
				case 247:
					$quest_name = "_possessor_of_a_precious_soul_-_4"; break;
				case 255:
					$quest_name = "_tutorial"; break;
				case 257:
					$quest_name = "_the_guard_is_busy"; break;
				case 258:
					$quest_name = "_bring_wolf_pelts"; break;
				case 259:
					$quest_name = "_ranchers_plea"; break;
				case 260:
					$quest_name = "_hunt_the_orcs"; break;
				case 261:
					$quest_name = "_collectors_dream"; break;
				case 262:
					$quest_name = "_trade_with_the_ivory_tower"; break;
				case 263:
					$quest_name = "_orc_subjugation"; break;
				case 264:
					$quest_name = "_keen_claws"; break;
				case 265:
					$quest_name = "_chains_of_slavery"; break;
				case 266:
					$quest_name = "_pleas_of_pixies"; break;
				case 267:
					$quest_name = "_wrath_of_verdure"; break;
				case 271:
					$quest_name = "_proof_of_valor"; break;
				case 272:
					$quest_name = "_wrath_of_ancestors"; break;
				case 273:
					$quest_name = "_invaders_of_the_holy_land"; break;
				case 274:
					$quest_name = "_skirmish_with_the_werewolves"; break;
				case 275:
					$quest_name = "_dark_winged_spies"; break;
				case 276:
					$quest_name = "_totem_of_the_hestui"; break;
				case 277:
					$quest_name = "_gatekeepers_offering"; break;
				case 291:
					$quest_name = "_revenge_of_the_redbonnet"; break;
				case 292:
					$quest_name = "_brigands_sweep"; break;
				case 293:
					$quest_name = "_the_hidden_veins"; break;
				case 294:
					$quest_name = "_covert_business"; break;
				case 295:
					$quest_name = "_dreaming_of_the_skies"; break;
				case 296:
					$quest_name = "_tarantulas_spider_silk"; break;
				case 297:
					$quest_name = "_gatekeepers_favor"; break;
				case 298:
					$quest_name = "_lizardmens_conspiracy"; break;
				case 299:
					$quest_name = "_gather_ingredients_for_pie"; break;
				case 300:
					$quest_name = "_hunting_leto_lizardman"; break;
				case 303:
					$quest_name = "_collect_arrowheads"; break;
				case 306:
					$quest_name = "_crystals_of_fire_and_ice"; break;
				case 313:
					$quest_name = "_collect_spores"; break;
				case 316:
					$quest_name = "_destroy_plague_carriers"; break;
				case 317:
					$quest_name = "_catch_the_wind"; break;
				case 319:
					$quest_name = "_scent_of_death"; break;
				case 320:
					$quest_name = "_bones_tell_the_future"; break;
				case 324:
					$quest_name = "_sweetest_venom"; break;
				case 325:
					$quest_name = "_grim_collector"; break;
				case 326:
					$quest_name = "_vanquish_remnants"; break;
				case 327:
					$quest_name = "_recover_the_farmland"; break;
				case 328:
					$quest_name = "_sense_for_business"; break;
				case 329:
					$quest_name = "_curiosity_of_a_dwarf"; break;
				case 330:
					$quest_name = "_adept_of_taste"; break;
				case 331:
					$quest_name = "_arrow_of_vengeance"; break;
				case 333:
					$quest_name = "_hunt_of_the_black_lion"; break;
				case 334:
					$quest_name = "_the_wishing_potion"; break;
				case 335:
					$quest_name = "_song_of_the_hunter"; break;
				case 336:
					$quest_name = "_coin_of_magic"; break;
				case 337:
					$quest_name = "_audience_with_the_land_dragon"; break;
				case 338:
					$quest_name = "_alligator_hunter"; break;
				case 340:
					$quest_name = "_subjugation_of_lizardmen"; break;
				case 341:
					$quest_name = "_hunting_for_wild_beasts"; break;
				case 343:
					$quest_name = "_under_the_shadow_of_the_ivory_tower"; break;
				case 344:
					$quest_name = "_1000_years_the_end_of_lamentation"; break;
				case 345:
					$quest_name = "_method_to_raise_the_dead"; break;
				case 347:
					$quest_name = "_go_get_the_calculator"; break;
				case 348:
					$quest_name = "_an_arrogant_search"; break;
				case 350:
					$quest_name = "_enhance_your_weapon"; break;
				case 351:
					$quest_name = "_black_swan"; break;
				case 352:
					$quest_name = "_help_rood_raise_a_new_pet"; break;
				case 353:
					$quest_name = "_power_of_darkness"; break;
				case 354:
					$quest_name = "_conquest_of_alligator_island"; break;
				case 355:
					$quest_name = "_family_honor"; break;
				case 356:
					$quest_name = "_dig_up_the_sea_of_spores"; break;
				case 357:
					$quest_name = "_warehouse_keepers_ambition"; break;
				case 358:
					$quest_name = "_illegitimate_child_of_a_goddess"; break;
				case 359:
					$quest_name = "_for_sleepless_deadmen"; break;
				case 360:
					$quest_name = "_plunder_their_supplies"; break;
				case 362:
					$quest_name = "_bards_mandolin"; break;
				case 363:
					$quest_name = "_sorrowful_sound_of_flute"; break;
				case 364:
					$quest_name = "_jovial_accordion"; break;
				case 365:
					$quest_name = "_devils_legacy"; break;
				case 366:
					$quest_name = "_silver_haired_shaman"; break;
				case 367:
					$quest_name = "_electrifying_recharge"; break;
				case 368:
					$quest_name = "_trespassing_into_the_sacred_area"; break;
				case 369:
					$quest_name = "_collector_of_jewels"; break;
				case 370:
					$quest_name = "_a_wiseman_sows_seeds"; break;
				case 371:
					$quest_name = "_shriek_of_ghosts"; break;
				case 372:
					$quest_name = "_legacy_of_insolence"; break;
				case 373:
					$quest_name = "_supplier_of_reagents"; break;
				case 374:
					$quest_name = "_whisper_of_dreams_part_1"; break;
				case 375:
					$quest_name = "_whisper_of_dreams_part_2"; break;
				case 376:
					$quest_name = "_exploration_of_giants_cave_part_1"; break;
				case 377:
					$quest_name = "_exploration_of_giants_cave_part_2"; break;
				case 378:
					$quest_name = "_magnificent_feast"; break;
				case 379:
					$quest_name = "_fantasy_wine"; break;
				case 380:
					$quest_name = "_bring_out_the_flavor_of_ingredients"; break;
				case 381:
					$quest_name = "_lets_become_a_royal_member"; break;
				case 382:
					$quest_name = "_kails_magic_coin"; break;
				case 383:
					$quest_name = "_searching_for_treasure"; break;
				case 384:
					$quest_name = "_warehouse_keepers_pastime"; break;
				case 385:
					$quest_name = "_yoke_of_the_past"; break;
				case 386:
					$quest_name = "_stolen_dignity"; break;
				case 401:
					$quest_name = "_path_to_a_warrior"; break;
				case 402:
					$quest_name = "_path_to_a_human_knight"; break;
				case 403:
					$quest_name = "_path_to_a_rogue"; break;
				case 404:
					$quest_name = "_path_to_a_human_wizard"; break;
				case 405:
					$quest_name = "_path_to_a_cleric"; break;
				case 406:
					$quest_name = "_path_to_an_elven_knight"; break;
				case 407:
					$quest_name = "_path_to_an_elven_scout"; break;
				case 408:
					$quest_name = "_path_to_an_elven_wizard"; break;
				case 409:
					$quest_name = "_path_to_an_elven_oracle"; break;
				case 410:
					$quest_name = "_path_to_a_palus_knight"; break;
				case 411:
					$quest_name = "_path_to_an_assassin"; break;
				case 412:
					$quest_name = "_path_to_a_dark_wizard"; break;
				case 413:
					$quest_name = "_path_to_a_shillien_oracle"; break;
				case 414:
					$quest_name = "_path_to_an_orc_raider"; break;
				case 415:
					$quest_name = "_path_to_a_monk"; break;
				case 416:
					$quest_name = "_path_to_an_orc_shaman"; break;
				case 417:
					$quest_name = "_path_to_become_a_scavenger"; break;
				case 418:
					$quest_name = "_path_to_an_artisan"; break;
				case 419:
					$quest_name = "_get_a_pet"; break;
				case 420:
					$quest_name = "_little_wing"; break;
				case 421:
					$quest_name = "_little_wings_big_adventure"; break;
				case 422:
					$quest_name = "_repent_your_sins"; break;
				case 426:
					$quest_name = "_quest_for_fishing_shot"; break;
				case 431:
					$quest_name = "_wedding_march"; break;
				case 432:
					$quest_name = "_birthday_party_song"; break;
				case 501:
					$quest_name = "_proof_of_clan_alliance"; break;
				case 503:
					$quest_name = "_pursuit_of_clan_ambition"; break;
				case 504:
					$quest_name = "_competition_for_the_bandit_stronghold"; break;
				case 505:
					$quest_name = "_blood_offering"; break;
				case 508:
					$quest_name = "_a_clan_s_reputation"; break;
				case 509:
					$quest_name = "_the_clan_s_prestigue"; break;
				case 601:
					$quest_name = "_watching_eyes"; break;
				case 602:
					$quest_name = "_shadow_of_light"; break;
				case 603:
					$quest_name = "_daimon_the_white-eyed_-_part_1"; break;
				case 604:
					$quest_name = "_daimon_the_white-eyed_-_part_2"; break;
				case 605:
					$quest_name = "_alliance_with_ketra_orcs"; break;
				case 606:
					$quest_name = "_war_with_varka_silenos"; break;
				case 607:
					$quest_name = "_prove_your_courage"; break;
				case 608:
					$quest_name = "_slay_the_enemy_commander"; break;
				case 609:
					$quest_name = "_magical_power_of_water_-_part_1"; break;
				case 610:
					$quest_name = "_magical_power_of_water_-_part_2"; break;
				case 611:
					$quest_name = "_alliance_with_varka_silenos"; break;
				case 612:
					$quest_name = "_war_with_ketra_orcs"; break;
				case 613:
					$quest_name = "_prove_your_courage"; break;
				case 614:
					$quest_name = "_slay_the_enemy_commander"; break;
				case 615:
					$quest_name = "_magical_power_of_fire_-_part_1"; break;
				case 616:
					$quest_name = "_magical_power_of_fire_-_part_2"; break;
				case 617:
					$quest_name = "_gather_the_flames"; break;
				case 618:
					$quest_name = "_into_the_flame"; break;
				case 619:
					$quest_name = "_relics_of_the_old_empire"; break;
				case 620:
					$quest_name = "_four_goblets"; break;
				case 621:
					$quest_name = "_egg_delivery"; break;
				case 622:
					$quest_name = "_delivery_of_special_liquor"; break;
				case 623:
					$quest_name = "_the_finest_food"; break;
				case 624:
					$quest_name = "_the_finest_ingredients_-_part_1"; break;
				case 625:
					$quest_name = "_the_finest_ingredients_-_part_2"; break;
				case 626:
					$quest_name = "_a_dark_twilight"; break;
				case 627:
					$quest_name = "_heart_in_search_of_power"; break;
				case 628:
					$quest_name = "_hunt_of_the_golden_ram_mercenary_force"; break;
				case 629:
					$quest_name = "_clean_up_the_swamp_of_screams"; break;
				case 631:
					$quest_name = "_delicious_top_choice_meat"; break;
				case 632:
					$quest_name = "_necromancers_request"; break;
				case 633:
					$quest_name = "_in_the_forgotten_village"; break;
				case 634:
					$quest_name = "_in_search_of_fragments_of_dimension"; break;
				case 635:
					$quest_name = "_in_the_dimension_rift"; break;
				case 636:
					$quest_name = "_truth_beyond_the_gate"; break;
				case 637:
					$quest_name = "_through_the_gate_once_more"; break;
				case 638:
					$quest_name = "_seekers_of_the_holy_grail"; break;
				case 640:
					$quest_name = "_the_zero_hour"; break;
				case 642:
					$quest_name = "_a_powerful_primeval_creature"; break;
				case 643:
					$quest_name = "_rise_and_fall_of_the_elroki_tribe"; break;
				case 647:
					$quest_name = "_influx_of_the_machines"; break;
				case 648:
					$quest_name = "_an_ice_merchant_dream"; break;
				case 662:
					$quest_name = "_a_game_of_cards"; break;
				case 663:
					$quest_name = "_seductive_whispers"; break;
				case 688:
					$quest_name = "_defeat_the_elrokian_raiders"; break;
				default:
					$quest_name = "_quest_name_error"; break;
			}
			return $quest_name;
		}
		
		public function accDetails($username) {
			$acc = array();
			$table = $this->db_type ? "characters" : "user_data";
			$records = $this->gameConn->prepare("SELECT COUNT(*) AS chars FROM ".$table." AS c WHERE c.account_name = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			$records->execute([$username]);
			if($records->rowCount() == 1){
				while ($row = $records->fetchObject()) {
					$screenshots = $this->gameConn->prepare("SELECT COUNT(*) AS screenshots FROM icp_gallery_screenshots WHERE status = '1' AND account = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$screenshots->execute([$username]);
					$screenshot = $screenshots->fetch(\PDO::FETCH_ASSOC);
					$videos = $this->gameConn->prepare("SELECT COUNT(*) AS videos FROM icp_gallery_videos WHERE status = '1' AND account = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$videos->execute([$username]);
					$video = $videos->fetch(\PDO::FETCH_ASSOC);
					array_push($acc, array("totalChars" => $row->chars, "totalScreenshots" => $screenshot["screenshots"], "totalVideos" => $video["videos"]));
				}
			}else{
				array_push($acc, array("totalChars" => 0, "totalScreenshots" => 0, "totalVideos" => 0));
			}
			return $acc;
		}
		
		public function donateDetails($username) {
			$acc = array();
			if($this->db_type){
				$records = $this->gameConn->prepare("SELECT d.*, CASE WHEN (SELECT DISTINCT currency FROM icp_donate_history WHERE account = d.login AND (status = 'Completed' || status = 'Aprovado') LIMIT 1) IS NULL THEN '$' ELSE (SELECT DISTINCT currency FROM icp_donate_history WHERE account = d.login AND (status = 'Completed' || status = 'Aprovado') LIMIT 1) END AS currency, CASE WHEN (SELECT SUM(price) FROM icp_donate_history WHERE account = d.login AND (status = 'Completed' || status = 'Aprovado')) > '0' THEN (SELECT SUM(price) FROM icp_donate_history WHERE account = d.login AND (status = 'Completed' || status = 'Aprovado')) ELSE '0' END AS totalDonate FROM icp_donate AS d WHERE d.login = ?");
			}else{
				$records = $this->gameConn->prepare("SELECT d.*, CASE WHEN (SELECT DISTINCT TOP 1 currency FROM icp_donate_history WHERE account = d.login AND (status = 'Completed' OR status = 'Aprovado')) IS NULL THEN '$' ELSE (SELECT DISTINCT TOP 1 currency FROM icp_donate_history WHERE account = d.login AND (status = 'Completed' OR status = 'Aprovado')) END AS currency, CASE WHEN (SELECT SUM(price) FROM icp_donate_history WHERE account = d.login AND (status = 'Completed' OR status = 'Aprovado')) > '0' THEN (SELECT SUM(price) FROM icp_donate_history WHERE account = d.login AND (status = 'Completed' OR status = 'Aprovado')) ELSE '0' END AS totalDonate FROM icp_donate AS d WHERE d.login = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			}
			$records->execute([$username]);
			if($records->rowCount() > 0){
				while ($row = $records->fetchObject()) {
					array_push($acc, array("currency" => $row->currency, "totalDonate" => number_format($row->totalDonate, 2), "totalCoins" => $row->total, "totalUsed" => $row->used, "totalBalance" => $row->total - $row->used));
				}
			}else{
				array_push($acc, array("currency" => "$", "totalDonate" => "0.00", "totalCoins" => 0, "totalUsed" => 0, "totalBalance" => 0));
			}
			return $acc;
		}
		
		public function donateHistory($login){
			$result = array();
			$records =$this->gameConn->prepare("SELECT * FROM icp_donate_history WHERE account = ? ORDER BY date DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			$records->execute([$login]);
			if($records->rowCount() > 0){
				while ($row = $records->fetchObject()) {
					array_push($result, array("currency" => $row->currency, "status" => $row->status, "method" => $row->method, "amount" => $row->amount, "price" => number_format($row->price, 2), "date" => $row->date));
				}
			}
			return $result;
		}
		
		public function donateLog($login){
			$result = array();
			$records = $this->gameConn->prepare("SELECT * FROM icp_donate_log WHERE account = ? ORDER BY date DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			$records->execute([$login]);
			if($records->rowCount() > 0){
				while ($row = $records->fetchObject()) {
					array_push($result, array("date" => $row->date, "description" => $row->description, "cost" => $row->cost));
				}
			}
			return $result;
		}
		
		public function donateBalance($login){
			$doacao = $this->gameConn->prepare('SELECT (total - used) AS credit FROM icp_donate WHERE login = ?', array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			$doacao->execute([$login]);
			if($doacao->rowCount() == 1){
				while ($row = $doacao->fetchObject()) {
					return $row->credit;
				}
			}
			return 0;
		}
		
		public function logIP($username) {
			$ip = array();
			if($this->db_type)
				$records = $this->loginConn->prepare("SELECT * FROM icp_accounts_ip WHERE login = ? ORDER BY id DESC LIMIT 5", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			else
				$records = $this->loginConn->prepare("SELECT TOP 5 * FROM icp_accounts_ip WHERE login = ? ORDER BY id DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			$records->execute([$username]);
			if($records->rowCount() > 0){
				while ($row = $records->fetchObject()) {
					array_push($ip, array("logIpDate" => $row->date, "logIpNumber" => $row->ip));
				}
				for($x=0;$x<(5-$records->rowCount());$x++)
					array_push($ip, array("logIpDate" => "-", "logIpNumber" => "-"));
			}else{
				for($x=0;$x<5;$x++)
					array_push($ip, array("logIpDate" => "-", "logIpNumber" => "-"));
			}
			return $ip;
		}
		
		public function charStatus($login,$charId=0){
			$result = array();
			$clan_name = "n/a";
			$clan_leader = "n/a";
			$clan_ally = "n/a";
			$hero = "No";
			$oly_fights = 0;
			$oly_points = 0;
			$int = 0;
			$str = 0;
			$con = 0;
			$men = 0;
			$dex = 0;
			$wit = 0;
			if($this->db_type){
				$charid_characters = $this->info_table("characters","charid");
				$charid_hennas = $this->info_table("character_hennas","charid");
				if(!$this->L2jVersaoRussa){
					if(!empty($charId)){
						$records = $this->gameConn->prepare("SELECT *, ('0') AS charBroker FROM characters WHERE ".$charid_characters." = ? AND account_name = ?");
						$records->execute([$charId,$login]);
					}else{
						$records = $this->gameConn->prepare("SELECT *, ('0') AS charBroker FROM characters WHERE account_name = ?");
						$records->execute([$login]);
					}
					if($records->rowCount() > 0){
						while ($row = $records->fetchObject()) {
							if(!empty($row->clanid)){
								$records2 = $this->gameConn->prepare("SELECT * FROM clan_data WHERE clan_id = '".$row->clanid."'");
								$records2->execute();
								$results2 = $records2->fetch(\PDO::FETCH_ASSOC);
								if($results2){
									$clan_name = empty($results2["clan_name"]) ? $clan_name : $results2["clan_name"];
									$clan_ally = empty($results2["ally_name"]) ? $clan_ally : $results2["ally_name"];
								}
							}
							if($row->nobless == 1){
								$charid_heroes = $this->info_table("heroes","charid");
								$records3 = $this->gameConn->prepare("SELECT * FROM heroes WHERE played = '1' AND ".$charid_heroes." = '".$row->{$charid_characters}."'");
								$records3->execute();
								if($records3->rowCount() > 0){
									$hero = "Yes";
								}
							}
							$sex = $row->sex == 0 ? "Male" : "Female";
							$nobless = $row->nobless == 1 ? "Yes" : "No";
							$subClassArr = explode(";",$this->showSubClasses($row->{$charid_characters},$login));
							array_push($result, array("baseClass" => $this->classe_name($row->base_class), "subClass" => count($subClassArr) > 2 ? "Yes, ".(count($subClassArr)-2)."." : "None.", "nobles" => $nobless, "hero" => $hero, "karma" => $row->karma ?? 0, "baseLevel" => $row->level, "sex" => $sex, "onlineTime" => $this->remainingTime($row->onlinetime,true), "lastAccess" => date("Y-m-d", ($row->lastAccess / 1000)), "clan" => $clan_name, "allyance" => $clan_ally, "pvp" => $row->pvpkills, "pk" => $row->pkkills, "loc" => $this->charLoc($row->x,$row->y), "char_id" => $row->{$charid_characters}, "char_name" => $row->char_name, "char_image" => $this->showFace($row->race,$row->base_class,$row->sex), "char_inStore" => $row->charBroker));
						}
					}
				}else{
					$oly_table = $this->L2jVersaoClassic ? "olympiad_participants" : "olympiad_nobles";
					$oly_base = $this->L2jVersaoClassic ? "type" : "isBase";
					$charid_oly = $this->info_table($oly_table,"charid");
					$charid_subclass = $this->info_table("character_subclasses","charid");
					if(!empty($charId)){
						$records = $this->gameConn->prepare("SELECT c.*, ('0') AS charBroker, (SELECT CONCAT(class_id, ';', level) FROM character_subclasses WHERE ".$charid_subclass." = c.".$charid_characters." AND ".$oly_base." = 1) AS base_class, IF((SELECT ".$charid_oly." FROM ".$oly_table." WHERE ".$charid_oly." = c.".$charid_characters.") IS NULL, 0, 1) AS nobless FROM characters AS c WHERE c.".$charid_characters." = ? AND c.account_name = ?");
						$records->execute([$charId,$login]);
					}else{
						$records = $this->gameConn->prepare("SELECT c.*, ('0') AS charBroker, (SELECT CONCAT(class_id, ';', level) FROM character_subclasses WHERE ".$charid_subclass." = c.".$charid_characters." AND ".$oly_base." = 1) AS base_class, IF((SELECT ".$charid_oly." FROM ".$oly_table." WHERE ".$charid_oly." = c.".$charid_characters.") IS NULL, 0, 1) AS nobless FROM characters AS c WHERE c.account_name = ?");
						$records->execute([$login]);
					}
					if($records->rowCount() > 0){
						while ($row = $records->fetchObject()) {
							if(!empty($row->clanid)){
								$charid_allydata = $this->info_table("ally_data","charid");
								$records2 = $this->gameConn->prepare("SELECT cd.*, (SELECT ally_name FROM ally_data WHERE ".$charid_allydata." = (SELECT ally_id FROM clan_data WHERE clan_id = cd.clan_id)) AS ally_name FROM clan_subpledges AS cd WHERE cd.clan_id = '".$row->clanid."' AND cd.type = '0'");
								$records2->execute();
								$results2 = $records2->fetch(\PDO::FETCH_ASSOC);
								if($results2){
									$clan_name = empty($results2["name"]) ? $clan_name : $results2["name"];
									$clan_ally = empty($results2["ally_name"]) ? $clan_ally : $results2["ally_name"];
								}
							}
							if($row->nobless == 1){
								$charid_heroes = $this->info_table("heroes","charid");
								$records3 = $this->gameConn->prepare("SELECT * FROM heroes WHERE played = '1' AND ".$charid_heroes." = '".$row->{$charid_characters}."'");
								$records3->execute();
								if($records3->rowCount() > 0)
									$hero = "Yes";
							}
							$base_level = explode(";", $row->base_class);
							$sex = $row->sex == 0 ? "Male" : "Female";
							$nobless = $row->nobless == 1 ? "Yes" : "No";
							$subClassArr = explode(";",$this->showSubClasses($row->{$charid_characters},$login));
							$raca = 0;
							if($base_level[0] >= 88 and $base_level[0] <= 98){ $raca = 0; }
							elseif($base_level[0] >= 99 and $base_level[0] <= 105){ $raca = 1; }
							elseif($base_level[0] >= 106 and $base_level[0] <= 112){ $raca = 2; }
							elseif($base_level[0] >= 113 and $base_level[0] <= 116){ $raca = 3; }
							elseif($base_level[0] >= 117 and $base_level[0] <= 118){ $raca = 4; }
							array_push($result, array("baseClass" => $this->classe_name($base_level[0]), "subClass" => count($subClassArr) > 2 ? "Yes, ".(count($subClassArr)-2)."." : "None.", "nobles" => $nobless, "hero" => $hero, "karma" => $row->karma, "baseLevel" => $base_level[1], "sex" => $sex, "onlineTime" => $this->remainingTime($row->onlinetime,true), "lastAccess" => date("Y-m-d", $row->lastAccess), "clan" => $clan_name, "allyance" => $clan_ally, "pvp" => $row->pvpkills, "pk" => $row->pkkills, "loc" => $this->charLoc($row->x,$row->y), "char_id" => $row->{$charid_characters}, "char_name" => $row->char_name, "char_image" => $this->showFace($raca,$base_level[0],$row->sex), "char_inStore" => $row->charBroker));
						}
					}
				}
			}else{
				$nobless = "No";
				if(!empty($charId)){
					$records = $this->gameConn->prepare("SELECT c.*, CASE WHEN (SELECT count(*) FROM icp_shop_chars WHERE owner_id = c.char_id AND account = c.account_name) > '0' THEN '1' ELSE '0' END AS charBroker, CASE WHEN c.subjob1_class != '-1' THEN (SELECT level FROM user_subjob WHERE char_id = c.char_id AND subjob_id = '0') ELSE c.Lev END AS level FROM user_data AS c WHERE c.char_id = ? AND c.account_name = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$records->execute([$charId,$login]);
				}else{
					$records = $this->gameConn->prepare("SELECT c.*, CASE WHEN (SELECT count(*) FROM icp_shop_chars WHERE owner_id = c.char_id AND account = c.account_name) > '0' THEN '1' ELSE '0' END AS charBroker, CASE WHEN c.subjob1_class != '-1' THEN (SELECT level FROM user_subjob WHERE char_id = c.char_id AND subjob_id = '0') ELSE c.Lev END AS level FROM user_data AS c WHERE c.account_name = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$records->execute([$login]);
				}
				if($records->rowCount() > 0){
					while ($row = $records->fetchObject()) {
						if(!empty($row->pledge_id)){
							$records2 = $this->gameConn->prepare("SELECT cd.*, (SELECT name FROM Alliance WHERE id = cd.pledge_id) AS ally_name FROM Pledge AS cd WHERE cd.pledge_id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
							$records2->execute([$row->pledge_id]);
							$results2 = $records2->fetch(\PDO::FETCH_ASSOC);
							if($results2){
								$clan_name = empty($results2["name"]) ? $clan_name : $results2["name"];
								$clan_ally = empty($results2["ally_name"]) ? $clan_ally : $results2["ally_name"];
							}
						}
						$records3 = $this->gameConn->prepare("SELECT * FROM user_nobless WHERE char_id = ?");
						$records3->execute([$row->char_id]);
						$results3 = $records3->fetch(\PDO::FETCH_ASSOC);
						if($results3){
							$nobless = "Yes";
							$hero = $results3["hero_type"] > 0 ? "Yes" : $hero;
						}
						$sex = $row->gender == 0 ? "Male" : "Female";
						$subClassArr = explode(";",$this->showSubClasses($row->char_id,$login));
						array_push($result, array("baseClass" => $this->classe_name($row->subjob0_class), "subClass" => count($subClassArr) > 2 ? "Yes, ".(count($subClassArr)-2)."." : "None.", "nobles" => $nobless, "hero" => $hero, "karma" => $row->align, "baseLevel" => $row->level, "sex" => $sex, "onlineTime" => $this->remainingTime($row->use_time,true), "lastAccess" => date("Y-m-d", strtotime($row->login)), "clan" => $clan_name, "allyance" => $clan_ally, "pvp" => $row->Duel, "pk" => $row->PK, "loc" => $this->charLoc($row->xloc,$row->yloc), "char_id" => $row->char_id, "char_name" => $row->char_name, "char_image" => $this->showFace($row->race,$row->subjob0_class,$row->gender), "char_inStore" => $row->charBroker));
					}
				}
			}
			return $result;
		}
		
		private function charLoc($x,$y){
			if($x > 75036 and $x < 91268 and $y > 141868 and $y < 154763){
				$loc = 'Giran Town';
			}elseif($x > 111704 and $x < 119254 and $y > 142606 and $y < 147705){
				$loc = 'Giran Castle';
			}elseif($x > 140294 and $x < 154452 and $y > 14829 and $y < 32579){
				$loc = 'Aden Town';
			}elseif($x > 141528 and $x < 153145 and $y > -28 and $y < 14829){
				$loc = 'Aden Castle';
			}elseif($x > 142547 and $x < 152714 and $y > -61724 and $y < -52009){
				$loc = 'Goddard Town';
			}elseif($x > 142666 and $x < 152714 and $y > -52097 and $y < -43995){
				$loc = 'Goddard Castle';
			}elseif($x > 32202 and $x < 47239 and $y > -53161 and $y < -41825){
				$loc = 'Rune Town';
			}elseif($x > 6822 and $x < 21361 and $y > -55812 and $y < -43506){
				$loc = 'Rune Castle';
			}elseif($x > 14631 and $x < 21917 and $y > 140991 and $y < 148056){
				$loc = 'Dion Town';
			}elseif($x > 18035 and $x < 25879 and $y > 155491 and $y < 164028){
				$loc = 'Dion Castle';
			}elseif($x > 75963 and $x < 86192 and $y > 47465 and $y < 61930){
				$loc = 'Oren Town';
			}elseif($x > 77723 and $x < 85693 and $y > 34672 and $y < 40106){
				$loc = 'Oren Castle';
			}elseif($x > -17167 and $x < -10729 and $y > 120243 and $y < 127434){
				$loc = 'Gludio Town';
			}elseif($x > -20782 and $x < -15353 and $y > 106447 and $y < 114258){
				$loc = 'Gludio Castle';
			}elseif($x > 80531 and $x < 93071 and $y > -148982 and $y < -135883){
				$loc = 'Schuttgart Town';
			}elseif($x > 72068 and $x < 84483 and $y > -155479 and $y < -146970){
				$loc = 'Schuttgart Castle';
			}elseif($x > 101509 and $x < 120955 and $y > 213891 and $y < 229923){
				$loc = 'Heine';
			}elseif($x > 113197 and $x < 118888 and $y > 244173 and $y < 252229){
				$loc = 'Innadril Castle';
			}elseif($x > -85665 and $x < -77001 and $y > 148085 and $y < 156642){
				$loc = 'Gludin Village';
			}elseif($x > 111612 and $x < 123698 and $y > 73431 and $y < 81450){
				$loc = 'Hunters Village';
			}elseif($x > -125454 and $x < -65999 and $y > 211377 and $y < 259892){
				$loc = 'Talking Island Village';
			}elseif($x > 110391 and $x < 126001 and $y > -190059 and $y < -176019){
				$loc = 'Dwarven Village';
			}elseif($x > -53946 and $x < -30142 and $y > -127853 and $y < -104236){
				$loc = 'Orc Village';
			}elseif($x > 607 and $x < 24570 and $y > 6203 and $y < 24532){
				$loc = 'Dark Elf Village';
			}elseif($x > 30366 and $x < 61592 and $y > 42314 and $y < 60601){
				$loc = 'Elven Village';
			}elseif($x > -127744 and $x < -102187 and $y > 30449 and $y < 54659){
				$loc = 'Kamael Village';
			}else{
				$loc = 'Out of town';
			}
			return $loc;
		}
		
		private function showBaseClasse($charid,$login){
			$result = null;
			if($this->db_type){
				$charid_characters = $this->info_table("characters","charid");
				if(!$this->L2jVersaoRussa){
					$records = $this->gameConn->prepare("SELECT (base_class) AS class_id FROM characters WHERE ".$charid_characters." = ? AND account_name = ?");
				}else{
					$charid_subclass = $this->info_table("character_subclasses","charid");
					$records = $this->gameConn->prepare("SELECT cs.class_id FROM character_subclasses AS cs, characters AS c WHERE cs.".$charid_subclass." = ? AND cs.".$charid_subclass." = c.".$charid_characters." AND c.account_name = ? AND isBase = '1'");
				}
			}else{
				$records = $this->gameConn->prepare("SELECT (subjob0_class) AS class_id FROM user_data WHERE char_id = ? AND account_name = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			}
			$records->execute([$charid,$login]);
			if($records->rowCount() > 0){
				while ($row = $records->fetchObject()) {
					$result .= $row->class_id;
				}
			}
			return $result;
		}
		
		public function showSubClasses($charid,$login){
			$result = null;
			$result .= $this->showBaseClasse($charid,$login).";";
			if($this->db_type){
				$charid_characters = $this->info_table("characters","charid");
				$charid_subclass = $this->info_table("character_subclasses","charid");
				if(!$this->L2jVersaoRussa){
					$records = $this->gameConn->prepare("SELECT c.class_id FROM character_subclasses AS c WHERE c.".$charid_subclass." = ? AND (SELECT account_name FROM characters WHERE ".$charid_characters." = c.".$charid_subclass.") = ? AND class_index != '0'");
				}else{
					$records = $this->gameConn->prepare("SELECT c.class_id FROM character_subclasses AS c WHERE c.".$charid_subclass." = ? AND (SELECT account_name FROM characters WHERE ".$charid_characters." = c.".$charid_subclass.") = ? AND isBase = '0'");
				}
			}else{
				$records = $this->gameConn->prepare("SELECT subjob1_class, subjob2_class, subjob3_class FROM user_data WHERE char_id = ? AND account_name = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			}
			$records->execute([$charid,$login]);
			if($records->rowCount() > 0){
				while ($row = $records->fetchObject()) {
					if($this->db_type){
						$result .= $row->class_id.";";
					}else{
						$sub1 = $row->subjob1_class > 0 ? $row->subjob1_class.";" : null;
						$sub2 = $row->subjob2_class > 0 ? $row->subjob2_class.";" : null;
						$sub3 = $row->subjob3_class > 0 ? $row->subjob3_class.";" : null;
						$result .= $sub1.$sub2.$sub3;
					}
				}
			}
			return $result;
		}
		
		protected function showFace($race,$class,$sex){
			if($race == 0){
				if($class >= 0 && $class <= 9 || $class >= 88 && $class <= 93){
					$img = $sex == 0 ? "human_fighter_male.png" : "human_fighter_female.png";
				}elseif($class >= 10 && $class <= 17 || $class >= 94 && $class <= 98){
					$img = $sex == 0 ? "human_mage_male.png" : "human_mage_female.png";
				}
			}elseif($race == 1){
				if($class >= 18 && $class <= 24 || $class >= 99 && $class <= 102){
					$img = $sex == 0 ? "elf_fighter_male.png" : "elf_fighter_female.png";
				}elseif($class >= 25 && $class <= 30 || $class >= 103 && $class <= 105){
					$img = $sex == 0 ? "elf_mage_male.png" : "elf_mage_female.png";
				}
			}elseif($race == 2){
				if($class >= 31 && $class <= 37 || $class >= 108 && $class <= 109){
					$img = $sex == 0 ? "darkelf_fighter_male.png" : "darkelf_fighter_female.png";
				}elseif($class >= 38 && $class <= 43 || $class >= 110 && $class <= 112){
					$img = $sex == 0 ? "darkelf_mage_male.png" : "darkelf_mage_female.png";
				}
			}elseif($race == 3){
				if($class >= 44 && $class <= 48 || $class >= 113 && $class <= 114){
					$img = $sex == 0 ? "orc_fighter_male.png" : "orc_fighter_female.png";
				}elseif($class >= 49 && $class <= 52 || $class >= 115 && $class <= 116){
					$img = $sex == 0 ? "orc_mage_male.png" : "orc_mage_female.png";
				}
			}elseif($race == 4){
				if($class >= 53 && $class <= 57 || $class >= 117 && $class <= 118){
					$img = $sex == 0 ? "dwarf_fighter_male.png" : "dwarf_fighter_female.png";
				}
			}elseif($race == 5){
				if($class >= 123 && $class <= 136){
					$img = $sex == 0 ? "kamael_fighter_male.png" : "kamael_fighter_female.png";
				}
			}
			return empty($img) ? "noimage.jpg" : $img;
		}
		
		public function showCharQuests($charid,$login){
			$result = array();
			if($this->db_type){
				$charid_characters = $this->info_table("characters","charid");
				$charid_quests = $this->info_table("character_quests","charid");
				$records = $this->gameConn->prepare("SELECT c.*, (SELECT char_name FROM characters WHERE ".$charid_characters." = c.".$charid_quests.") AS char_name FROM character_quests AS c WHERE c.".$charid_quests." = ? AND (SELECT account_name FROM characters WHERE ".$charid_characters." = c.".$charid_quests.") = ? AND value in (SELECT MAX(value) FROM character_quests WHERE ".$charid_quests." = c.".$charid_quests." GROUP by name)");
				$records->execute([$charid,$login]);
				if($records->rowCount() > 0){
					while ($row = $records->fetchObject()) {
						$pieces = preg_split('/(?=[A-Z])/', str_replace("_"," ", $row->name));
						$name = null;
						if(count($pieces) > 1){
							for($y=1;$y<count($pieces);$y++){
								$name .= $pieces[$y];
								$name .= $y != (count($pieces)-1) ? " " : null;
							}
						}else{
							$pieces = explode("_", $row->name);
							for($y=1;$y<count($pieces);$y++){
								$name .= ucfirst($pieces[$y]);
								$name .= $y != (count($pieces)-1) ? " " : null;
							}
						}
						array_push($result, array("questName" => $name, "questValue" => $row->value, "questOwner" => $row->char_name));
					}
				}
			}else{
				$records = $this->gameConn->prepare("SELECT c.*, (SELECT char_name FROM user_data WHERE char_id = c.char_id) AS char_name FROM quest AS c WHERE c.char_id = ? AND (SELECT account_name FROM user_data WHERE char_id = c.char_id) = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				$records->execute([$charid,$login]);
				$results = $records->fetch(\PDO::FETCH_ASSOC);
				if($results){
					for($x=1;$x<27;$x++){
						$pieces = preg_split('/(?=[A-Z])/', str_replace("_"," ", $this->quest_name($results["q".$x])));
						$name = null;
						if(count($pieces) > 1){
							for($y=1;$y<count($pieces);$y++){
								$name .= $pieces[$y];
								$name .= $y != (count($pieces)-1) ? " " : null;
							}
						}else{
							$pieces = explode("_", str_replace("_"," ", $this->quest_name($results["q".$x])));
							for($y=1;$y<count($pieces);$y++){
								$name .= ucfirst($pieces[$y]);
								$name .= $y != (count($pieces)-1) ? " " : null;
							}
						}
						if(!empty($name))
							array_push($result, array("questName" => $results["q".$x] > 0 ? $name : null, "questValue" => $results["q".$x] > 0 ? "Started" : null, "questOwner" => $results["char_name"]));
					}
				}
			}
			return $result;
		}

		function showCharSkills($class,$charid,$login){
			$result = array();
			if($this->db_type){
				$charid_characters = $this->info_table("characters","charid");
				$charid_skills = $this->info_table("character_skills","charid");
				$records = $this->gameConn->prepare("SELECT c.*, s.name, s.level, (SELECT char_name FROM characters WHERE ".$charid_characters." = c.".$charid_skills.") AS char_name FROM character_skills AS c, icp_skills AS s WHERE c.skill_id = s.skill_id AND c.".$charid_skills." = ? AND (SELECT account_name FROM characters WHERE ".$charid_characters." = c.".$charid_skills.") = ? AND c.class_index = '".$class."'");
			}else{
				$records = $this->gameConn->prepare("SELECT c.*, (c.skill_lev) AS skill_level, s.name, s.level, (SELECT char_name FROM user_data WHERE char_id = c.char_id) AS char_name FROM user_skill AS c, icp_skills AS s WHERE c.skill_id = s.skill_id AND c.char_id = ? AND (SELECT account_name FROM user_data WHERE char_id = c.char_id) = ? AND c.subjob_id = '".$class."'", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			}
			$records->execute([$charid,$login]);
			if($records->rowCount() > 0){
				while ($row = $records->fetchObject()) {
					$img = "<img src=\"".(file_exists("images/icons/skill".str_pad((int) $row->skill_id,4,"0",STR_PAD_LEFT).".png") ? "images/icons/skill".(str_pad((int) $row->skill_id,4,"0",STR_PAD_LEFT).".png") : "images/icons/404.png")."\" style=\"width:32px; height:32px;\">";
					$skill_enchant = $row->skill_level > 100 ? ceil(preg_replace("/(\D)/i" , "" , substr($row->skill_level,-2))) : null;
					$skill_level = $row->skill_level > 100 ? $row->level : $row->skill_level;
					$skillNameLevel = "<strong>".$row->name."</strong> <span style='color:#b09979;'>Lv ".$skill_level."</span>";
					$skillEnchanted = !empty($skill_enchant) ? "<br>Enchanted <span style='color:#ffd969;'>+".$skill_enchant."</span>" : null;
					array_push($result, array("skillImg" => $img, "skillDetails" => $skillNameLevel.$skillEnchanted, "skillOwner" => $row->char_name));
				}
			}
			return $result;
		}
		
		private function getAugElem($itemid){
			$result = null;
			$augment = 0;
			$attrubutes = ",,,,,,";
			$fire = null;
			$water = null;
			$wind = null;
			$earth = null;
			$holy = null;
			$unholy = null;
			if($this->L2jVersaoClassic){
				$charid_itematt = $this->info_table("item_variations","charid");
				$records3 = $this->gameConn->prepare("SELECT * FROM item_variations WHERE ".$charid_itematt." = ?");
				$records3->execute([$itemid]);
				if($records3->rowCount() > 0){
					while ($row3 = $records3->fetchObject()) {
						$augment = $row3->itemId > 0 ? 1 : $augment;
					}
				}
				$charid_elematt = $this->info_table("item_elementals","charid");
				$records2 = $this->gameConn->prepare("SELECT GROUP_CONCAT(elemType, ';', elemValue) AS elements FROM item_elementals WHERE ".$charid_elematt." = ?");
				$records2->execute([$itemid]);
				if($records2->rowCount() > 0){
					while ($row2 = $records2->fetchObject()) {
						$el = explode(",", $row2->elements);
						for($x=0;$x<(count($el)-1);$x++){
							$element = explode(";", $el[$x]);
							$fire = $element[0] == 0 ? $element[1] : null;
							$water = $element[0] == 1 ? $element[1] : null;
							$wind = $element[0] == 2 ? $element[1] : null;
							$earth = $element[0] == 3 ? $element[1] : null;
							$holy = $element[0] == 4 ? $element[1] : null;
							$unholy = $element[0] == 5 ? $element[1] : null;
						}
					}
					$attrubutes = $fire.",".$water.",".$wind.",".$earth.",".$holy.",".$unholy.",";
				}
			}else{
				$tables = $this->gameConn->prepare("SHOW TABLES");
				$tables->execute();
				if(in_array("item_attributes", $tables->fetchAll(\PDO::FETCH_COLUMN))){
					$charid_itematt = $this->info_table("item_attributes","charid");
					$records = $this->gameConn->prepare("SELECT * FROM item_attributes WHERE ".$charid_itematt." = ?");
					$records->execute([$itemid]);
					if($records->rowCount() > 0){
						while ($row = $records->fetchObject()) {
							if(isset($row->elemType)){
								$fire = $row->elemType == 0 ? $row->elemValue : null;
								$water = $row->elemType == 1 ? $row->elemValue : null;
								$wind = $row->elemType == 2 ? $row->elemValue : null;
								$earth = $row->elemType == 3 ? $row->elemValue : null;
								$holy = $row->elemType == 4 ? $row->elemValue : null;
								$unholy = $row->elemType == 5 ? $row->elemValue : null;
							}else{
								$charid_elematt = $this->info_table("item_elementals","charid");
								$records2 = $this->gameConn->prepare("SELECT GROUP_CONCAT(elemType, ';', elemValue) AS elements FROM item_elementals WHERE ".$charid_elematt." = ?");
								$records2->execute([$itemid]);
								if($records2->rowCount() > 0){
									while ($row2 = $records2->fetchObject()) {
										$el = explode(",", $row2->elements);
										for($x=0;$x<(count($el)-1);$x++){
											$element = explode(";", $el[$x]);
											$fire = $element[0] == 0 ? $element[1] : null;
											$water = $element[0] == 1 ? $element[1] : null;
											$wind = $element[0] == 2 ? $element[1] : null;
											$earth = $element[0] == 3 ? $element[1] : null;
											$holy = $element[0] == 4 ? $element[1] : null;
											$unholy = $element[0] == 5 ? $element[1] : null;
										}
									}
								}
							}
							$attrubutes = $fire.",".$water.",".$wind.",".$earth.",".$holy.",".$unholy.",";
							$augment = $row->augAttributes > 0 ? 1 : $augment;
						}
					}
				}elseif(in_array("augmentations", $tables->fetchAll(\PDO::FETCH_COLUMN))){
					$charid_augment = $this->info_table("augmentations","charid");
					$records4 = $this->gameConn->prepare("SELECT * FROM augmentations WHERE ".$charid_augment." = ?");
					$records4->execute([$itemid]);
					if($records4->rowCount() > 0){
						while ($row4 = $records4->fetchObject()) {
							$augment = $row4->attributes > 0 ? 1 : $augment;
						}
					}
				}
			}
			return $attrubutes.$augment.",";
		}
		
		public function showCharacterItems($loc,$charid,$login,$enchant=false,$pvpItems=false){
			if($enchant && !$this->ENABLE_SAFE_ENCHANT_SYSTEM)
				return $this->resposta("The Safe Enchant system is disabled","Oops...","error");
			$result = array();
			if($enchant){
				$noPvpItems = !$this->db_type ? str_replace("i.item_id","i.item_type",$this->noPvpItems) : $this->noPvpItems;
				$wherePvP = !$pvpItems ? $noPvpItems : null;
				if($this->db_type){
					$charid_characters = $this->info_table("characters","charid");
					if($this->L2jVersaoRussa && $this->chronicle == "Interlude")
						$records = $this->gameConn->prepare("SELECT *, (i.amount) AS count, (i.enchant) AS enchant_level, SUBSTRING_INDEX(m.itemIcon, '.', -1) AS itemIcons, (SELECT char_name FROM characters WHERE ".$charid_characters." = i.owner_id) AS char_name FROM items AS i, icp_icons AS m WHERE i.item_type=m.itemId AND i.owner_id = ? AND (SELECT account_name FROM characters WHERE ".$charid_characters." = i.owner_id) = ? AND (SELECT online FROM characters WHERE ".$charid_characters." = i.owner_id) = '0' AND m.itemType IN('Armor','Weapon') AND i.location IN('PAPERDOLL','INVENTORY','WAREHOUSE') AND m.itemDrop='true' AND m.itemSell='true' AND m.itemTrade='true' AND enchant >= '0' AND itemGrade != ''".$wherePvP." AND i.location IN('".$loc."') ORDER BY m.itemId ASC");
					else
						$records = $this->gameConn->prepare("SELECT *, SUBSTRING_INDEX(itemIcon, '.', -1) AS itemIcons, (SELECT char_name FROM characters WHERE ".$charid_characters." = i.owner_id) AS char_name FROM items AS i, icp_icons AS m WHERE i.item_id=m.itemId AND i.owner_id = ? AND (SELECT account_name FROM characters WHERE ".$charid_characters." = i.owner_id) = ? AND (SELECT online FROM characters WHERE ".$charid_characters." = i.owner_id) = '0' AND m.itemType IN('Armor','Weapon') AND i.loc IN('PAPERDOLL','INVENTORY','WAREHOUSE') AND m.itemDrop='true' AND m.itemSell='true' AND m.itemTrade='true' AND enchant_level >= '0' AND itemGrade != ''".$wherePvP." AND i.loc IN('".$loc."') ORDER BY m.itemId ASC");
				}else{
					$inStore = null;
					$records_store = $this->gameConn->prepare("SELECT item_id FROM icp_shop_items WHERE owner_id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$records_store->execute([$charid]);
					if($records_store->rowCount() > 0){
						while ($row1 = $records_store->fetchObject()) {
							$itemStoreId = explode(";",$row1->item_id);
							for($x=0;$x<(count($itemStoreId)-1);$x++){
								$inStoreSeparator = $x < (count($itemStoreId)-2) ? "," : null;
								$inStore .= "'".$itemStoreId[$x]."'".$inStoreSeparator;
							}
						}
					}
					$inStore = empty($inStore) ? "''" : $inStore;
					if($loc == "WAREHOUSE")
						$records = $this->gameConn->prepare("SELECT i.*, m.*, (i.amount) AS count, (i.enchant) AS enchant_level, (SELECT char_name FROM user_data WHERE char_id = i.char_id) AS char_name FROM user_item AS i, icp_icons AS m, user_data AS u WHERE i.item_type=m.itemId AND i.char_id=u.char_id AND i.char_id = ? AND u.account_name = ? AND u.login < u.logout AND m.itemType IN ('Armor','Weapon') AND i.warehouse = '1' AND m.itemDrop='true' AND m.itemSell='true' AND m.itemTrade='true' AND i.enchant >= '0' AND m.itemGrade != ''".$wherePvP." AND i.item_id NOT IN(".$inStore.") ORDER BY m.itemName ASC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					else{
						$records = $this->gameConn->prepare("SELECT i.*, m.*, (i.amount) AS count, (i.enchant) AS enchant_level, (SELECT char_name FROM user_data WHERE char_id = i.char_id) AS char_name FROM user_item AS i, icp_icons AS m, user_data AS u WHERE i.item_type=m.itemId AND i.char_id=u.char_id AND i.char_id = ? AND u.account_name = ? AND u.login < u.logout AND m.itemType IN ('Armor','Weapon') AND i.warehouse = '0' AND m.itemDrop='true' AND m.itemSell='true' AND m.itemTrade='true' AND i.enchant >= '0' AND m.itemGrade != ''".$wherePvP." AND CASE WHEN i.item_id IN(u.ST_underware,u.ST_right_ear,u.ST_left_ear,u.ST_neck,u.ST_right_finger,u.ST_left_finger,u.ST_head,u.ST_right_hand,u.ST_left_hand,u.ST_gloves,u.ST_chest,u.ST_legs,u.ST_feet,u.ST_back,u.ST_both_hand,u.ST_hair,u.ST_hair_deco,u.ST_hair_all) THEN 'PAPERDOLL' ELSE 'INVENTORY' END = '".$loc."' AND i.item_id NOT IN(".$inStore.") ORDER BY m.itemName ASC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					}
				}
			}else{
				if($this->db_type){
					$charid_characters = $this->info_table("characters","charid");
					if($this->L2jVersaoRussa && $this->chronicle == "Interlude")
						$records = $this->gameConn->prepare("SELECT *, (i.amount) AS count, (i.enchant) AS enchant_level, (SELECT char_name FROM characters WHERE ".$charid_characters." = i.owner_id) AS char_name FROM items AS i, icp_icons AS m WHERE i.item_type = m.itemId AND i.owner_id = ? AND i.location IN('".$loc."') AND (SELECT account_name FROM characters WHERE ".$charid_characters." = i.owner_id) = ? ORDER BY m.itemId ASC");
					else
						$records = $this->gameConn->prepare("SELECT *, (SELECT char_name FROM characters WHERE ".$charid_characters." = i.owner_id) AS char_name FROM items AS i, icp_icons AS m WHERE i.item_id = m.itemId AND owner_id = ? AND i.loc IN('".$loc."') AND (SELECT account_name FROM characters WHERE ".$charid_characters." = i.owner_id) = ? ORDER BY m.itemId ASC");
				}else{
					$inStore = null;
					$records_store = $this->gameConn->prepare("SELECT item_id FROM icp_shop_items WHERE owner_id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$records_store->execute([$charid]);
					if($records_store->rowCount() > 0){
						while ($row1 = $records_store->fetchObject()) {
							$itemStoreId = explode(";",$row1->item_id);
							for($x=0;$x<(count($itemStoreId)-1);$x++){
								$inStoreSeparator = $x < (count($itemStoreId)-2) ? "," : null;
								$inStore .= "'".$itemStoreId[$x]."'".$inStoreSeparator;
							}
						}
					}
					$inStore = empty($inStore) ? "''" : $inStore;
					if($loc == "WAREHOUSE")
						$records = $this->gameConn->prepare("SELECT i.*, m.*, (i.amount) AS count, (i.enchant) AS enchant_level, (SELECT char_name FROM user_data WHERE char_id = i.char_id) AS char_name FROM user_item AS i, icp_icons AS m, user_data AS u WHERE i.item_type = m.itemId AND i.char_id = u.char_id AND i.char_id = ? AND i.warehouse = '1' AND u.account_name = ? AND i.item_id NOT IN(".$inStore.") ORDER BY m.itemId ASC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					else
						$records = $this->gameConn->prepare("SELECT i.*, m.*, u.*, (i.amount) AS count, (i.enchant) AS enchant_level, (SELECT char_name FROM user_data WHERE char_id = i.char_id) AS char_name FROM user_item AS i, icp_icons AS m, user_data AS u WHERE i.item_type = m.itemId AND i.char_id = u.char_id AND i.char_id = ? AND i.warehouse = '0' AND u.account_name = ? AND CASE WHEN i.item_id IN(u.ST_underware,u.ST_right_ear,u.ST_left_ear,u.ST_neck,u.ST_right_finger,u.ST_left_finger,u.ST_head,u.ST_right_hand,u.ST_left_hand,u.ST_gloves,u.ST_chest,u.ST_legs,u.ST_feet,u.ST_back,u.ST_both_hand,u.ST_hair,u.ST_hair_deco,u.ST_hair_all) THEN 'PAPERDOLL' ELSE 'INVENTORY' END = '".$loc."' AND i.item_id NOT IN(".$inStore.") ORDER BY m.itemId ASC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				}
			}
			$records->execute([$charid,$login]);
			if($records->rowCount() > 0){
				while ($row = $records->fetchObject()) {
					$augment = null;
					$fire = null;
					$water = null;
					$wind = null;
					$earth = null;
					$holy = null;
					$unholy = null;
					if($this->db_type){
						$charid_items = $this->info_table("items","charid");
						if($this->L2jVersaoRussa && $this->chronicle != "Interlude"){
							$fire = empty($row->attribute_fire) ? $fire : $row->attribute_fire;
							$water = empty($row->attribute_water) ? $water : $row->attribute_water;
							$wind = empty($row->attribute_wind) ? $wind : $row->attribute_wind;
							$earth = empty($row->attribute_earth) ? $earth : $row->attribute_earth;
							$holy = empty($row->attribute_holy) ? $holy : $row->attribute_holy;
							$unholy = empty($row->attribute_unholy) ? $unholy : $row->attribute_unholy;
							$augment = $row->augmentation_id > 0 ? "Augmented " : $augment;
						}else{
							$augElem = explode(",", $this->getAugElem($row->{$charid_items}));
							$fire = empty($augElem[0]) ? $fire : $augElem[0];
							$water = empty($augElem[1]) ? $water : $augElem[1];
							$wind = empty($augElem[2]) ? $wind : $augElem[2];
							$earth = empty($augElem[3]) ? $earth : $augElem[3];
							$holy = empty($augElem[4]) ? $holy : $augElem[4];
							$unholy = empty($augElem[5]) ? $unholy : $augElem[5];
							$augment = empty($augElem[6]) ? $augment : "Augmented ";
						}
					}else{
						$charid_items = "item_id";
						$augment = $row->augmentation > 0 ? "Augmented " : $augment;
					}
					$attrubutes = array($fire,$water,$wind,$earth,$holy,$unholy);
					if($this->ENABLE_ITEM_BROKER){
						$buttonSell = $row->itemType == "Armor" && $row->enchant_level != "" && $row->itemGrade != "" || $row->itemType == "Weapon" && $row->enchant_level != "" && $row->itemGrade != "" ? "<input type=\"checkbox\" form=\"itemSale\" class=\"form-check-input shadow\" name=\"items[]\" value=\"".$row->{$charid_items}."\">" : "<input type=\"checkbox\" class=\"form-check-input\" style=\"opacity:0.3;\" disabled>";
					}else{
						$buttonSell = null;
					}
					$buttonEnchant = $row->itemType == "Armor" && $row->itemGrade != "" && $row->enchant_level != "" && $row->enchant_level < $this->MAX_ENCHANT && $row->enchant_level >= 0 || $row->itemType == "Weapon" && $row->itemGrade != "" && $row->enchant_level != "" && $row->enchant_level < $this->MAX_ENCHANT && $row->enchant_level >= 0 ? "<form action=\"\" method=\"post\" style=\"margin:0px; padding:0px;\" id=\"".$row->{$charid_items}."\"><input type=\"hidden\" name=\"itemId\" value=\"".$row->{$charid_items}."\"><input type=\"hidden\" name=\"submitEnchantItem\" value=\"enchant\"></form><button class=\"btn btn-primary btn-sm w-100\" onclick=\"Swal.fire({ text: 'Are you sure you want to enchant this item?', showDenyButton: true, showCancelButton: false, confirmButtonText: `Yes, do it!`, denyButtonText: `Cancel`, allowOutsideClick: false }).then((result) => { if(result.isConfirmed){ Swal.fire({ title: 'Processing', text: 'Please wait...', allowOutsideClick: false, showDenyButton: false, showCloseButton: false, showCancelButton: false, showConfirmButton: false}); document.getElementById('".$row->{$charid_items}."').submit(); } else if (result.isDenied) { Swal.fire('Canceled', '', 'info'); } });\">+".($row->enchant_level + 1)."</button>" : null;
					$item = array($row->count,$row->enchant_level,...$attrubutes,$row->itemId,$augment.str_replace("{","{{_}",$row->itemName),$row->itemType,$row->itemTypeName,$row->itemWeight,$row->itemGrade,$row->itemBodyPart,$row->itemPAD,$row->itemMAD,$row->itemSS,$row->itemBSS,strtolower(str_replace("icon.","",$row->itemIcon)));
					array_push($result, array("itemImg" => file_exists("images/icons/".strtolower(str_replace("icon.","",$row->itemIcon)).".png") ? strtolower(str_replace("icon.","",$row->itemIcon)) : 404, "itemName" => $augment.str_replace("{","{{_}",$row->itemName), "itemEnchant" => $row->enchant_level, "itemDetails" => $this->showItemDetails($item), "buttonSell" => $buttonSell, "buttonEnchant" => $buttonEnchant, "itemOwnerId" => $charid, "itemOwnerName" => $row->char_name));
				}
			}
			return $result;
		}
		
		private function showItemDetails($item, $combo = false){
			$html = null;
			$grade = !empty($item[13]) ? "<img src='images/miscs/".$item[13]."-grade.png' border='0' height='10'>" : null;
			switch ($item[14]){
				case "head":
					$bodypart = "Headgear"; break;
				case "chest":
					$bodypart = "Upper Body"; break;
				case "onepiece":
					$bodypart = "Upper and Lower Body"; break;
				case "legs":
					$bodypart = "Lower Body"; break;
				case "gloves":
					$bodypart = "Gloves"; break;
				case "feet":
					$bodypart = "Boots"; break;
				case "back":
					$bodypart = "Cloak"; break;
				case "underwear":
					$bodypart = "Underwear"; break;
				case "waist":
					$bodypart = "Belt"; break;
				case "rhand":
					$bodypart = "One Handed"; break;
				case "lhand":
					$bodypart = "One Handed"; break;
				case "lrhand":
					$bodypart = "Two Handed"; break;
				case "rfinger;lfinger":
					$bodypart = "Ring"; break;
				case "neck":
					$bodypart = "Necklace"; break;
				case "rear;lear":
					$bodypart = "Earring"; break;
				case "rbracelet":
					$bodypart = "Bracelet"; break;
				case "lbracelet":
					$bodypart = "Bracelet"; break;
				default:
					$bodypart = null; break;
			}
			if($item[10] == 'Armor' && !empty($bodypart)){
				$item[1] = empty($item[1]) ? 0 : $item[1];
				if($bodypart == 'Ring' or $bodypart == 'Earring' or $bodypart == 'Necklace'){
					$description = "<span class='specification'>[ Jewelry Specification ]</span>";
					$legend = "<span class='specification_legend'>".$bodypart."</span>";
				}else{
					$description = "<span class='specification'>[ Armor Specification ]</span>";
					$legend = "<span class='specification_legend'>".$bodypart;
					$legend .= !empty($item[11]) ? " / ".ucfirst($item[11]) : null;
					$legend .= "</span>";
				}
				if($item[15] > 0){
					if($item[1] > 0 and $item[1] < 4){
						$padt = (1 * $item[1]) + $item[15];
					}elseif($item[1] > 3){
						$padt = ((3 * 1) + (3 * ($item[1] - 3))) + $item[15];
					}else{
						$padt = $item[15];
					}
					$pad = "P. Def. : <span class='attribute'>".$padt."</span><br />";
				}else{
					$pad = null;
				}
				if($item[16] > 0){
					if($item[1] > 0 and $item[1] < 4){
						$madt = (1 * $item[1]) + $item[16];
					}elseif($item[1]> 3){
						$madt = ((3 * 1) + (3 * ($item[1] - 3))) + $item[16];
					}else{
						$madt = $item[16];
					}
					$mad = "M. Def. : <span class='attribute'>".$madt."</span><br />";
				}else{
					$mad = null;
				}
			}elseif($item[10] == 'Weapon' && !empty($bodypart)){
				$item[1] = empty($item[1]) ? 0 : $item[1];
				$description = "<span class='specification'>[ Weapon Specification ]</span>";
				$legend = "<span class='specification_legend'>".ucfirst($item[11])." / ".$bodypart."</span>";
				if($item[15] > 0){
					if($item[1] > 0 and $item[1] < 4){
						$padt = (4 * $item[1]) + $item[15];
					}elseif($item[1] > 3){
						$padt = ((3 * 4) + (8 * ($item[1] - 3))) + $item[15];
					}else{
						$padt = $item[15];
					}
					$pad = "P. Atk. : <span class='attribute'>".$padt."</span><br />";
				}else{
					$pad = null;
				}
				if($item[16] > 0){
					if($item[1] > 0 and $item[1] < 4){
						$madt = (3 * $item[1]) + $item[16];
					}elseif($item[1] > 3){
						$madt = ((3 * 3) + (6 * ($item[1] - 3))) + $item[16];
					}else{
						$madt = $item[16];
					}
					$mad = "M. Atk. : <span class='attribute'>".$madt."</span><br />";
				}else{
					$mad = null;
				}
			}else{
				$mad = null;
				$pad = null;
				$legend = null;
				$description = $combo ? "<br><span class='specification'>[ Item Specification ]</span>" : "<span class='specification'>[ Item Specification ]</span>";
			}
			$legend = !empty($legend) ? $legend."<br />" : null;
			$description = !empty($description) ? $description."<br />" : null;
			if($item[17] > 0){
				$ss = "<br />Soulshot Used : <span class='attribute'>X ".$item[17]."</span>";
			}else{
				$ss = null;
			}
			if($item[18] > 0){
				$bss = "<br />Spiritshot Used : <span class='attribute'>X ".$item[18]."</span>";
			}else{
				$bss = null;
			}
			if($combo){
				$foto = file_exists("images/icons/".$item[19].".png") ? $item[19] : 404;
				$img = "<div class='item-details".(strpos($item[9], '{{_}PvP}') !== false ? " pvp" : null)."'></div><img src='images/icons/".$foto.".png' style='border:1px solid #666; width:32px; height:32px; margin:2px 5px 0px 0px; float:left;' align='top'>";
			}else{
				$img = null;
			}
			$enchant = $item[10] != 'EtcItem' ?  !empty($bodypart) ? "<span class='attribute' style='margin-right:3px;'>+".$item[1]."</span>" : null : null;
			$itemname = explode(" - ", $item[9]);
			$itemname2 = null;
			if(($item[8] >= 10870 && $item[8] <= 11604) || ($item[8] >= 12852 && $item[8] <= 13001) || ($item[8] >= 14412 && $item[8] <= 14460) || ($item[8] >= 14526 && $item[8] <= 14529) || ($item[8] >= 16042 && $item[8] <= 16097) || ($item[8] >= 16134 && $item[8] <= 16159) || ($item[8] >= 16168 && $item[8] <= 16176) || ($item[8] >= 16179 && $item[8] <= 16220) || ($item[8] >= 16289 && $item[8] <= 16356) || ($item[8] >= 16369 && $item[8] <= 16380)){
				for($c=0;$c<count($itemname);$c++){
					$itemDivisor = $c == (count($itemname) - 1) ? null : " - ";
					$itemname2 .= $c == (count($itemname) - 1) && $c != 0 ? "<font color='#ffd969'>".$itemname[$c]."</font>" : "<span style='color:yellow;'>".$itemname[$c].$itemDivisor."</span>";
				}
			}else{
				if(count($itemname) == 1)
					$itemname2 = $item[9];
				else{
					for($c=0;$c<count($itemname);$c++){
						$itemDivisor = $c == (count($itemname) - 1) ? null : " - ";
						$itemname2 .= $c == (count($itemname) - 1) && $c != 0 ? "<font color='#ffd969'>".$itemname[$c]."</font>" : $itemname[$c].$itemDivisor;
					}
				}
			}
			$itemname = $item[10] == 'EtcItem' || $itemname[0] == "Common Item" ? $item[9] : $itemname2;
			$html .= "<span style='text-shadow:1px 1px #444;'>".$itemname."</span><span> ".$grade;
			$html .= $item[10] == 'EtcItem' ? " [".number_format($item[0],0,'.','.')."]" : null;
			$html .= "</span><br />".$legend."<br />".$description.$pad.$mad."Weight : <span class='attribute'>";
			$html .= !empty($item[12]) ? $item[12] : 0;
			$html .= "</span>".$ss.$bss;
			$att = 0;
			if($item[10] == 'Weapon'){
				$attItem = $this->attrWeapons($item[2],"fire").$this->attrWeapons($item[3],"water").$this->attrWeapons($item[4],"wind").$this->attrWeapons($item[5],"earth").$this->attrWeapons($item[6],"holy").$this->attrWeapons($item[7],"dark");
				$attItem = explode("|", $attItem);
				for($k=0;$k<count($attItem);$k++){
					$attSubItem = explode(";", $attItem[$k]);
					if(!empty($attSubItem[0])){
						$att++;
						if($att == 1)
							$html .= "<br /><br /><span class='specification'>[ Element Specification ]</span><br />";
						$html .= "<span class=attribute>".ucfirst($attSubItem[4])."</span> Lv <span class='attribute'>".$attSubItem[1]."</span> (<span class=attribute>".ucfirst($attSubItem[4])."</span> P. Atk. <span class='attribute'>".$attSubItem[0]."</span>)<br /><span style='background:url(images/miscs/bar_".$attSubItem[4]."_1.png) no-repeat;width:140px;height:7px;display:block;'><img src='images/miscs/bar_".$attSubItem[4]."_2.png' border='0' width='".@((($attSubItem[0] - $attSubItem[2]) / ($attSubItem[3] - $attSubItem[2])) * 100)."%' height='7'></span>";
					}
				}
			}elseif($item[10] == 'Armor'){
				$attItem = $this->attrArmors($item[2],"fire").$this->attrArmors($item[3],"water").$this->attrArmors($item[4],"wind").$this->attrArmors($item[5],"earth").$this->attrArmors($item[6],"holy").$this->attrArmors($item[7],"dark");
				$attItem = explode("|", $attItem);
				for($l=0;$l<count($attItem);$l++){
					$attSubItem = explode(";", $attItem[$l]);
					if(!empty($attSubItem[0])){
						$att++;
						if($att == 1)
							$html .= "<br /><br /><span class='specification'>[ Element Specification ]</span><br />";
						if($attSubItem[4] == 'fire')
							$elemento = 'Water';
						elseif($attSubItem[4] == 'water')
							$elemento = 'Fire';
						elseif($attSubItem[4] == 'wind')
							$elemento = 'Earth';
						elseif($attSubItem[4] == 'earth')
							$elemento = 'Wind';
						elseif($attSubItem[4] == 'holy')
							$elemento = 'Dark';
						elseif($attSubItem[4] == 'dark')
							$elemento = 'Holy';
						else
							$elemento = null;
						$html .= "<span class=attribute>".$elemento."</span> Lv <span class='attribute'>".$attSubItem[1]."</span> (<span class=attribute>".ucfirst($attSubItem[4])."</span> P. Def. <span class='attribute'>".$attSubItem[0]."</span>)<br /><span style='background:url(images/miscs/bar_".$attSubItem[4]."_1.png) no-repeat;width:140px;height:7px;display:block;'><img src='images/miscs/bar_".$attSubItem[4]."_2.png' border='0' width='".@((($attSubItem[0] - $attSubItem[2]) / ($attSubItem[3] - $attSubItem[2])) * 100)."%' height='7'></span>";
					}
				}
			}
			return "<div class='itemDetails'>".$img.$enchant.$html."</div>";
		}
		
		private function attrWeapons($att,$color){
			$level = 0;
			$level = $att > 0 && $att <= 24 ? 1 : $level;
			$level = $att > 24  && $att <= 79 ? 2 : $level;
			$level = $att > 79 && $att <= 149 ? 3 : $level;
			$level = $att > 149 && $att <= 174 ? 4 : $level;
			$level = $att > 174 && $att <= 224 ? 5 : $level;
			$level = $att > 224 && $att <= 299 ? 6 : $level;
			$level = $att >= 300 ? 7 : $level;
			$bar_min = 0;
			$bar_min = $level == 1 ? 0 : $bar_min;
			$bar_min = $level == 2 ? 25 : $bar_min;
			$bar_min = $level == 3 ? 80 : $bar_min;
			$bar_min = $level == 4 ? 150 : $bar_min;
			$bar_min = $level == 5 ? 175 : $bar_min;
			$bar_min = $level == 6 ? 225 : $bar_min;
			$bar_min = $level == 7 ? 300 : $bar_min;
			$bar_max = 0;
			$bar_max = $level == 1 ? 24 : $bar_max;
			$bar_max = $level == 2 ? 79 : $bar_max;
			$bar_max = $level == 3 ? 149 : $bar_max;
			$bar_max = $level == 4 ? 174 : $bar_max;
			$bar_max = $level == 5 ? 224 : $bar_max;
			$bar_max = $level == 6 ? 299 : $bar_max;
			$bar_max = $level == 7 ? 300 : $bar_max;
			return $att.";".$level.";".$bar_min.";".$bar_max.";".$color."|";
		}
		
		private function attrArmors($att,$color){
			$level = 0;
			$level = $att > 0 && $att <= 11 ? 1 : $level;
			$level = $att > 11  && $att <= 29 ? 2 : $level;
			$level = $att > 29 && $att <= 59 ? 3 : $level;
			$level = $att > 59 && $att <= 71 ? 4 : $level;
			$level = $att > 71 && $att <= 89 ? 5 : $level;
			$level = $att > 89 && $att <= 119 ? 6 : $level;
			$level = $att >= 120 ? 7 : $level;
			$bar_min = 0;
			$bar_min = $level == 1 ? 0 : $bar_min;
			$bar_min = $level == 2 ? 12 : $bar_min;
			$bar_min = $level == 3 ? 30 : $bar_min;
			$bar_min = $level == 4 ? 60 : $bar_min;
			$bar_min = $level == 5 ? 72 : $bar_min;
			$bar_min = $level == 6 ? 90 : $bar_min;
			$bar_min = $level == 7 ? 120 : $bar_min;
			$bar_max = 0;
			$bar_max = $level == 1 ? 11 : $bar_max;
			$bar_max = $level == 2 ? 29 : $bar_max;
			$bar_max = $level == 3 ? 59 : $bar_max;
			$bar_max = $level == 4 ? 71 : $bar_max;
			$bar_max = $level == 5 ? 89 : $bar_max;
			$bar_max = $level == 6 ? 119 : $bar_max;
			$bar_max = $level == 7 ? 120 : $bar_max;
			return $att.";".$level.";".$bar_min.";".$bar_max.";".$color."|";
		}
		
		public function myCharList($login,$store=false){
			$result = array();
			$charid_characters = $this->db_type ? $this->info_table("characters","charid") : "char_id";
			if($this->db_type){
				$records = $this->gameConn->prepare("SELECT char_name, ".$charid_characters.", online FROM characters WHERE account_name = '".$login."' AND ".$charid_characters." >= '0'");
			}else{
				$records = $this->gameConn->prepare("SELECT char_name, char_id, CASE WHEN login > logout THEN '1' ELSE '0' END AS online FROM user_data WHERE account_name = '".$login."' AND char_id >= '0'", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			}
			$records->execute();
			if($records->rowCount() > 0){
				while($row = $records->fetch(\PDO::FETCH_ASSOC)){
					if(!$this->db_type && $store){
						$checkStore = $this->gameConn->prepare("SELECT * FROM icp_shop_chars WHERE owner_id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
						$checkStore->execute([$row["char_id"]]);
						if($checkStore->rowCount() == 0)
							array_push($result, array("charName" => $row["char_name"], "charId" => $row["char_id"], "charOnline" => $row["online"]));
					}else
						array_push($result, array("charName" => $row["char_name"], "charId" => $row["{$charid_characters}"], "charOnline" => $row["online"]));
				}
			}
			return $result;
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
		
		public function showMyScreenshots($status, $sort, $limit, $login){
			if(!$this->ENABLE_SCREENSHOTS_GALLERY)
				return $this->resposta("The ScreenShots system is disabled","Oops...","error");
			$images = array();
			if($this->db_type){
				if(!empty($limit)){
					$records = $this->gameConn->prepare("SELECT * FROM icp_gallery_screenshots WHERE status = ? AND account = ? ORDER BY ".$sort." LIMIT ".$limit);
				}else{
					$records = $this->gameConn->prepare("SELECT * FROM icp_gallery_screenshots WHERE status = ? AND account = ?");
				}
			}else{
				if(!empty($limit)){
					$records = $this->gameConn->prepare("SELECT * FROM icp_gallery_screenshots WHERE status = ? AND account = ? ORDER BY ".$sort." OFFSET ".str_replace(","," ROWS FETCH NEXT", $limit)." ROWS ONLY", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				}else{
					$records = $this->gameConn->prepare("SELECT * FROM icp_gallery_screenshots WHERE status = ? AND account = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				}
			}
			$records->execute([$status,$login]);
			if($records->rowCount() > 0){
				while ($row = $records->fetchObject()) {
					array_push($images, array("screenshotId" => $row->id, "screenshotAuthor" => $row->author, "screenshotLegend" => $row->legend, "screenshotDate" => $row->date, "screenshotImg" => $row->screenshot));
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
		
		public function showMyVideos($status, $sort, $limit, $login){
			if(!$this->ENABLE_VIDEOS_GALLERY)
				return $this->resposta("The Video system is disabled","Oops...","error");
			$videos = array();
			if($this->db_type){
				if(!empty($limit)){
					$records = $this->gameConn->prepare("SELECT * FROM icp_gallery_videos WHERE status = ? AND account = ? ORDER BY ".$sort." LIMIT ".$limit);
				}else{
					$records = $this->gameConn->prepare("SELECT * FROM icp_gallery_videos WHERE status = ? AND account = ?");
				}
			}else{
				if(!empty($limit)){
					$records = $this->gameConn->prepare("SELECT * FROM icp_gallery_videos WHERE status = ? AND account = ? ORDER BY ".$sort." OFFSET ".str_replace(","," ROWS FETCH NEXT", $limit)." ROWS ONLY", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				}else{
					$records = $this->gameConn->prepare("SELECT * FROM icp_gallery_videos WHERE status = ? AND account = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				}
			}
			$records->execute([$status,$login]);
			if($records->rowCount() > 0){
				while ($row = $records->fetchObject()) {
					array_push($videos, array("videoId" => $row->id, "videoAuthor" => $row->author, "videoLegend" => $row->legend, "videoDate" => $row->date, "videoImg" => $row->photo, "videosUrl" => $row->url));
				}
			}
			return $videos;
		}
		
		function primeShop($id=0,$limit=0){
			if(!$this->ENABLE_PRIME_SHOP)
				return $this->resposta("Prime shop is disabled","Oops...","error");
			$result = array();
			if(!empty($limit)){
				if($this->db_type)
					$records = $this->gameConn->prepare("SELECT * FROM icp_prime_shop ORDER BY id DESC LIMIT ".$limit, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				else
					$records = $this->gameConn->prepare("SELECT * FROM icp_prime_shop ORDER BY id DESC OFFSET ".str_replace(","," ROWS FETCH NEXT", $limit)." ROWS ONLY", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			}else{
				$where = !empty($id) ? " WHERE id = '".preg_replace("/(\D)/i" , "" , $id)."'" : null;
				$records = $this->gameConn->prepare("SELECT * FROM icp_prime_shop".$where." ORDER BY id DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			}
			$records->execute();
			if($records->rowCount() > 0){
				while ($row = $records->fetchObject()) {
					$item = explode(",", $row->item_id);
					$count = explode(",", $row->count);
					$enchant = explode(",", $row->enchant);
					$attribute_fire = explode(",", $row->attribute_fire);
					$attribute_water = explode(",", $row->attribute_water);
					$attribute_wind = explode(",", $row->attribute_wind);
					$attribute_earth = explode(",", $row->attribute_earth);
					$attribute_holy = explode(",", $row->attribute_holy);
					$attribute_unholy = explode(",", $row->attribute_unholy);
					$itemDetails = null;
					$itemName = null;
					$itemIcon = null;
					for($z=0;$z<(count($count)-1);$z++){
						$records2 = $this->gameConn->prepare("SELECT * FROM icp_icons WHERE itemId = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
						$records2->execute([$item[$z]]);
						if($records2->rowCount() > 0){
							while ($row2 = $records2->fetchObject()) {
								if(empty($id))
									$itemDetails .= $this->showItemDetails(array($count[$z],$enchant[$z],$attribute_fire[$z],$attribute_water[$z],$attribute_wind[$z],$attribute_earth[$z],$attribute_holy[$z],$attribute_unholy[$z],$row2->itemId,str_replace("{","{{_}",$row2->itemName),$row2->itemType,$row2->itemTypeName,$row2->itemWeight,$row2->itemGrade,$row2->itemBodyPart,$row2->itemPAD,$row2->itemMAD,$row2->itemSS,$row2->itemBSS,strtolower(str_replace("icon.","",$row2->itemIcon))), count($count) > 2 ? true : false);
								else
									$itemDetails = $this->showItemDetails(array($count[$z],$enchant[$z],$attribute_fire[$z],$attribute_water[$z],$attribute_wind[$z],$attribute_earth[$z],$attribute_holy[$z],$attribute_unholy[$z],$row2->itemId,str_replace("{","{{_}",$row2->itemName),$row2->itemType,$row2->itemTypeName,$row2->itemWeight,$row2->itemGrade,$row2->itemBodyPart,$row2->itemPAD,$row2->itemMAD,$row2->itemSS,$row2->itemBSS,strtolower(str_replace("icon.","",$row2->itemIcon))));
								if($z == 0){
									$itemName = str_replace("{","{{_}",$row2->itemName);
									$itemIcon = strtolower(str_replace("icon.","",$row2->itemIcon));
								}
								if(!empty($id))
									array_push($result, array("itemAmount" => $count[$z], "itemEnchant" => $enchant[$z], "itemName" => str_replace("{","{{_}",$row2->itemName), "itemImg" => strtolower(str_replace("icon.","",$row2->itemIcon)), "itemPrice" => $row->price, "itemDetails" => $itemDetails, "itemId" => ltrim($row->id, "0")));
							}
						}
					}
					if(empty($id))
						array_push($result, array("itemAmount" => $count[0], "itemEnchant" => $enchant[0], "itemName" => $itemName, "itemImg" => $itemIcon, "itemPrice" => $row->price, "itemDetails" => $itemDetails, "itemId" => ltrim($row->id, "0")));
				}
			}
			return $result;
		}
		
		public function charBroker($id=0,$login=null,$type=null,$my=null,$limit=null){
			if(!$this->ENABLE_CHARACTER_BROKER)
				return $this->resposta("Character Broker is disabled.","Oops...","error");
			$result = array();
			$timeAuction = $this->AUCTION_CHARACTER_BROKER_DAYS * 86400;
			if($this->db_type){
				$charid_characters = $this->info_table("characters","charid");
				if($my == "sales"){
					$records = $this->gameConn->prepare("SELECT s.*, (SELECT char_name FROM characters WHERE ".$charid_characters." = s.owner_id) AS char_name, CASE WHEN s.type = '2' THEN (SELECT MAX(value) FROM icp_shop_chars_auction WHERE bidId = s.id) END AS price_auction FROM icp_shop_chars AS s WHERE s.status = '1' AND s.account = '".$login."' ORDER BY s.id DESC");
				}elseif($my == "bids"){
					$records = $this->gameConn->prepare("SELECT s.*, (SELECT char_name FROM characters WHERE ".$charid_characters." = s.owner_id) AS char_name, (SELECT MAX(value) FROM icp_shop_chars_auction WHERE bidId = s.id) AS price_auction FROM icp_shop_chars AS s WHERE s.type = '2' AND s.status = '1' AND (SELECT COUNT(*) FROM icp_shop_chars_auction WHERE bidId = s.id AND account = '".$login."') > 0 ORDER BY s.id DESC");
				}else{
					$where = !empty($id) ? " AND s.id = '".ltrim(preg_replace("/(\D)/i" , "" , $id), "0")."'" : null;
					$where = !empty($type) ? " AND s.type = '".ltrim(preg_replace("/(\D)/i" , "" , $type), "0")."'" : $where;
					if(empty($limit))
						$records = $this->gameConn->prepare("SELECT s.*, (SELECT char_name FROM characters WHERE ".$charid_characters." = s.owner_id) AS char_name, CASE WHEN s.type = '2' THEN (SELECT MAX(value) FROM icp_shop_chars_auction WHERE bidId = s.id) END AS price_auction FROM icp_shop_chars AS s WHERE IF(s.type = '2', (UNIX_TIMESTAMP(s.date) + '".$timeAuction."') > '".time()."', '1'='1') AND s.status = '1'".$where." ORDER BY s.id DESC");
					else
						$records = $this->gameConn->prepare("SELECT s.*, (SELECT char_name FROM characters WHERE ".$charid_characters." = s.owner_id) AS char_name, CASE WHEN s.type = '2' THEN (SELECT MAX(value) FROM icp_shop_chars_auction WHERE bidId = s.id) END AS price_auction FROM icp_shop_chars AS s WHERE IF(s.type = '2', (UNIX_TIMESTAMP(s.date) + '".$timeAuction."') > '".time()."', '1'='1') AND s.status = '1'".$where." ORDER BY s.id DESC LIMIT ".$limit);
				}
				$records->execute();
				if($records->rowCount() > 0){
					while ($row = $records->fetchObject()) {
						$price = !empty($row->price_auction) ? $row->price_auction : $row->price;
						array_push($result, array("charId" => ltrim($row->id, "0"), "charPrice" => $price, "charInitialPrice" => $row->price, "charType" => $row->type, "charAuctionTime" => date("Y-m-d H:i:s", (strtotime($row->date) + $timeAuction)), "charAuctionPrice" => $row->price_auction, "charDetails" => $this->charStatus($row->has_account,$row->owner_id), "charAccount" => $row->has_account));
					}
				}
			}else{
				if($my == "sales"){
					$records = $this->gameConn->prepare("SELECT s.*, (SELECT char_name FROM user_data WHERE char_id = s.owner_id) AS char_name, CASE WHEN s.type = '2' THEN (SELECT MAX(value) FROM icp_shop_chars_auction WHERE bidId = s.id) END AS price_auction FROM icp_shop_chars AS s WHERE s.status = '1' AND s.account = '".$login."' ORDER BY s.id DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				}elseif($my == "bids"){
					$records = $this->gameConn->prepare("SELECT s.*, (SELECT char_name FROM user_data WHERE char_id = s.owner_id) AS char_name, (SELECT MAX(value) FROM icp_shop_chars_auction WHERE bidId = s.id) AS price_auction FROM icp_shop_chars AS s WHERE s.type = '2' AND s.status = '1' AND (SELECT COUNT(*) FROM icp_shop_chars_auction WHERE bidId = s.id AND account = '".$login."') > 0 ORDER BY s.id DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				}else{
					$where = !empty($id) ? " AND s.id = '".ltrim(preg_replace("/(\D)/i" , "" , $id), "0")."'" : null;
					$where = !empty($type) ? " AND s.type = '".ltrim(preg_replace("/(\D)/i" , "" , $type), "0")."'" : $where;
					if(empty($limit))
						$records = $this->gameConn->prepare("SELECT s.*, (SELECT char_name FROM user_data WHERE char_id = s.owner_id) AS char_name, CASE WHEN s.type = '2' THEN (SELECT MAX(value) FROM icp_shop_chars_auction WHERE bidId = s.id) END AS price_auction FROM icp_shop_chars AS s WHERE CASE WHEN s.type = '2' THEN CASE WHEN DATEADD(DAY,".$this->AUCTION_CHARACTER_BROKER_DAYS.",s.date) > '".date("Y-m-d H:i:s")."' THEN '0' ELSE '1' END ELSE '0' END = '0' AND s.status = '1'".$where." ORDER BY s.id DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					else
						$records = $this->gameConn->prepare("SELECT s.*, (SELECT char_name FROM user_data WHERE char_id = s.owner_id) AS char_name, CASE WHEN s.type = '2' THEN (SELECT MAX(value) FROM icp_shop_chars_auction WHERE bidId = s.id) END AS price_auction FROM icp_shop_chars AS s WHERE CASE WHEN s.type = '2' THEN CASE WHEN DATEADD(DAY,".$this->AUCTION_CHARACTER_BROKER_DAYS.",s.date) > '".date("Y-m-d H:i:s")."' THEN '0' ELSE '1' END ELSE '0' END = '0' AND s.status = '1'".$where." ORDER BY s.id DESC OFFSET ".str_replace(","," ROWS FETCH NEXT", $limit)." ROWS ONLY", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				}
				$records->execute();
				if($records->rowCount() > 0){
					while ($row = $records->fetchObject()) {
						$price = !empty($row->price_auction) ? $row->price_auction : $row->price;
						array_push($result, array("charId" => ltrim($row->id, "0"), "charPrice" => $price, "charInitialPrice" => $row->price, "charType" => $row->type, "charAuctionTime" => date("Y-m-d H:i:s", (strtotime($row->date) + $timeAuction)), "charAuctionPrice" => $row->price_auction, "charDetails" => $this->charStatus($row->account,$row->owner_id), "charAccount" => $row->account));
					}
				}
			}
			return $result;
		}
		
		function itemBroker($id=0,$login=null,$type=null,$my=null,$limit=null){
			if(!$this->ENABLE_ITEM_BROKER)
				return $this->resposta("Item Broker is disabled.","Oops...","error");
			$result = array();
			$timeAuction = $this->AUCTION_ITEM_BROKER_DAYS * 86400;
			if($this->db_type){
				$charid_characters = $this->info_table("characters","charid");
				if($my == "sales"){
					$records = $this->gameConn->prepare("SELECT s.*, (SELECT char_name FROM characters WHERE ".$charid_characters." = s.owner_id) AS char_name, CASE WHEN s.type > '2' THEN (SELECT MAX(value) FROM icp_shop_items_auction WHERE bidId = s.id) END AS price_auction FROM icp_shop_items AS s WHERE s.status = '1' AND (SELECT account_name FROM characters WHERE ".$charid_characters." = s.owner_id) = '".$login."' ORDER BY s.id DESC");
				}elseif($my == "bids"){
					$records = $this->gameConn->prepare("SELECT s.*, (SELECT char_name FROM characters WHERE ".$charid_characters." = s.owner_id) AS char_name, (SELECT MAX(value) FROM icp_shop_items_auction WHERE bidId = s.id) AS price_auction FROM icp_shop_items AS s WHERE s.type > '2' AND s.status = '1' AND (SELECT COUNT(*) FROM icp_shop_items_auction WHERE bidId = s.id AND account = '".$login."') > 0 ORDER BY s.id DESC");
				}else{
					$where = !empty($id) ? " AND s.id = '".ltrim(preg_replace("/(\D)/i" , "" , $id), "0")."'" : null;
					$where = !empty($type) ? " AND s.type = '".ltrim(preg_replace("/(\D)/i" , "" , $type), "0")."'" : $where;
					if(empty($limit))
						$records = $this->gameConn->prepare("SELECT s.*, (SELECT char_name FROM characters WHERE ".$charid_characters." = s.owner_id) AS char_name, CASE WHEN s.type > '2' THEN (SELECT MAX(value) FROM icp_shop_items_auction WHERE bidId = s.id) END AS price_auction FROM icp_shop_items AS s WHERE IF(s.type > '2', (UNIX_TIMESTAMP(s.date) + '".$timeAuction."') > '".time()."', '1'='1') AND s.status = '1'".$where." ORDER BY s.id DESC");
					else
						$records = $this->gameConn->prepare("SELECT s.*, (SELECT char_name FROM characters WHERE ".$charid_characters." = s.owner_id) AS char_name, CASE WHEN s.type > '2' THEN (SELECT MAX(value) FROM icp_shop_items_auction WHERE bidId = s.id) END AS price_auction FROM icp_shop_items AS s WHERE IF(s.type > '2', (UNIX_TIMESTAMP(s.date) + '".$timeAuction."') > '".time()."', '1'='1') AND s.status = '1'".$where." ORDER BY s.id DESC LIMIT ".$limit);
				}
				$records->execute();
				if($records->rowCount() > 0){
					while ($row = $records->fetchObject()) {
						$price = !empty($row->price_auction) ? $row->price_auction : $row->price;
						$itemid = explode(";", $row->item_id);
						$count = explode(";", $row->count);
						$enchant = explode(";", $row->enchant);
						$augment = explode(";", $row->augmented);
						$attribute_fire = explode(";", $row->fire);
						$attribute_water = explode(";", $row->water);
						$attribute_wind = explode(";", $row->wind);
						$attribute_earth = explode(";", $row->earth);
						$attribute_holy = explode(";", $row->holy);
						$attribute_unholy = explode(";", $row->unholy);
						$itemDetails = null;
						$itemIcon = null;
						for($x=0;$x<(count($count)-1);$x++){
							$items_info = $this->gameConn->prepare("SELECT *, SUBSTRING_INDEX(itemIcon, '.', -1) AS itemIcons FROM icp_icons WHERE itemId = '".$itemid[$x]."'");
							$items_info->execute();
							while ($row2 = $items_info->fetchObject()) {
								$augmented = $augment[$x] > 0 ? "Augmented " : null;
								if(empty($id))
									$itemDetails .= $this->showItemDetails(array($count[$x],$enchant[$x],$attribute_fire[$x],$attribute_water[$x],$attribute_wind[$x],$attribute_earth[$x],$attribute_holy[$x],$attribute_unholy[$x],$row2->itemId,$augmented.str_replace("{","{{_}",$row2->itemName),$row2->itemType,$row2->itemTypeName,$row2->itemWeight,$row2->itemGrade,$row2->itemBodyPart,$row2->itemPAD,$row2->itemMAD,$row2->itemSS,$row2->itemBSS,strtolower($row2->itemIcons)), count($count) > 2 ? true : false);
								else
									$itemDetails = $this->showItemDetails(array($count[$x],$enchant[$x],$attribute_fire[$x],$attribute_water[$x],$attribute_wind[$x],$attribute_earth[$x],$attribute_holy[$x],$attribute_unholy[$x],$row2->itemId,$augmented.str_replace("{","{{_}",$row2->itemName),$row2->itemType,$row2->itemTypeName,$row2->itemWeight,$row2->itemGrade,$row2->itemBodyPart,$row2->itemPAD,$row2->itemMAD,$row2->itemSS,$row2->itemBSS,strtolower($row2->itemIcons)));
								if($x == 0){
									$itemName = $augmented.str_replace("{","{{_}",$row2->itemName);
									$itemIcon = strtolower($row2->itemIcons);
								}
								if(!empty($id))
									array_push($result, array("itemAmount" => $count[$x], "itemEnchant" => $enchant[$x], "itemName" => $augmented.str_replace("{","{{_}",$row2->itemName), "itemImg" => strtolower($row2->itemIcons), "itemPrice" => $price, "itemInitialPrice" => $row->price, "itemDetails" => $itemDetails, "itemId" => ltrim($row->id, "0"), "itemCharName" => $row->char_name, "itemType" => $row->type, "itemAuctionTime" => date("Y-m-d H:i:s", (strtotime($row->date) + $timeAuction)), "itemAuctionPrice" => $row->price_auction));
							}
						}
						if(empty($id))
							array_push($result, array("itemAmount" => $count[0], "itemEnchant" => $enchant[0], "itemName" => $itemName, "itemImg" => $itemIcon, "itemId" => ltrim($row->id, "0"), "itemCharName" => $row->char_name, "itemType" => $row->type, "itemAuctionTime" => date("Y-m-d H:i:s", (strtotime($row->date) + $timeAuction)), "itemPrice" => $price, "itemInitialPrice" => $row->price, "itemDetails" => $itemDetails, "itemAuctionPrice" => $row->price_auction));
					}
				}
			}else{
				if($my == "sales"){
					$records = $this->gameConn->prepare("SELECT s.*, (SELECT char_name FROM user_data WHERE char_id = s.owner_id) AS char_name, CASE WHEN s.type > '2' THEN (SELECT MAX(value) FROM icp_shop_items_auction WHERE bidId = s.id) END AS price_auction FROM icp_shop_items AS s WHERE s.status = '1' AND (SELECT account_name FROM user_data WHERE char_id = s.owner_id) = '".$login."' ORDER BY s.id DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				}elseif($my == "bids"){
					$records = $this->gameConn->prepare("SELECT s.*, (SELECT char_name FROM user_data WHERE char_id = s.owner_id) AS char_name, (SELECT MAX(value) FROM icp_shop_items_auction WHERE bidId = s.id) AS price_auction FROM icp_shop_items AS s WHERE s.type > '2' AND s.status = '1' AND (SELECT COUNT(*) FROM icp_shop_items_auction WHERE bidId = s.id AND account = '".$login."') > 0 ORDER BY s.id DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				}else{
					$where = !empty($id) ? " AND s.id = '".ltrim(preg_replace("/(\D)/i" , "" , $id), "0")."'" : null;
					$where = !empty($type) ? " AND s.type = '".ltrim(preg_replace("/(\D)/i" , "" , $type), "0")."'" : $where;
					if(empty($limit))
						$records = $this->gameConn->prepare("SELECT s.*, (SELECT char_name FROM user_data WHERE char_id = s.owner_id) AS char_name, CASE WHEN s.type > '2' THEN (SELECT MAX(value) FROM icp_shop_items_auction WHERE bidId = s.id) END AS price_auction FROM icp_shop_items AS s WHERE CASE WHEN s.type > '2' THEN CASE WHEN DATEADD(DAY,".$this->AUCTION_ITEM_BROKER_DAYS.",s.date) > '".date("Y-m-d H:i:s")."' THEN '0' ELSE '1' END ELSE '0' END = '0' AND s.status = '1'".$where." ORDER BY s.id DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					else
						$records = $this->gameConn->prepare("SELECT s.*, (SELECT char_name FROM user_data WHERE char_id = s.owner_id) AS char_name, CASE WHEN s.type > '2' THEN (SELECT MAX(value) FROM icp_shop_items_auction WHERE bidId = s.id) END AS price_auction FROM icp_shop_items AS s WHERE CASE WHEN s.type > '2' THEN CASE WHEN DATEADD(DAY,".$this->AUCTION_ITEM_BROKER_DAYS.",s.date) > '".date("Y-m-d H:i:s")."' THEN '0' ELSE '1' END ELSE '0' END = '0' AND s.status = '1'".$where." ORDER BY s.id DESC OFFSET ".str_replace(","," ROWS FETCH NEXT", $limit)." ROWS ONLY", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				}
				$records->execute();
				if($records->rowCount() > 0){
					while ($row = $records->fetchObject()) {
						$price = !empty($row->price_auction) ? $row->price_auction : $row->price;
						$itemid = explode(";", $row->item_id);
						$count = count($itemid);
						$itemDetails = null;
						$itemIcon = null;
						for($x=0;$x<($count-1);$x++){
							$items_info = $this->gameConn->prepare("SELECT * FROM icp_icons AS c, user_item AS i WHERE c.itemId = i.item_type AND i.item_id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
							$items_info->execute([$itemid[$x]]);
							while ($row2 = $items_info->fetchObject()) {
								$augmented = $row2->augmentation > 0 ? "Augmented " : null;
								$attributes = array("","","","","","");
								if(empty($id))
									$itemDetails .= $this->showItemDetails(array($row2->amount,$row2->enchant,...$attributes,$row2->itemId,$augmented.str_replace("{","{{_}",$row2->itemName),$row2->itemType,$row2->itemTypeName,$row2->itemWeight,$row2->itemGrade,$row2->itemBodyPart,$row2->itemPAD,$row2->itemMAD,$row2->itemSS,$row2->itemBSS,str_replace("icon.","",strtolower($row2->itemIcon))), $count > 2 ? true : false);
								else
									$itemDetails = $this->showItemDetails(array($row2->amount,$row2->enchant,...$attributes,$row2->itemId,$augmented.str_replace("{","{{_}",$row2->itemName),$row2->itemType,$row2->itemTypeName,$row2->itemWeight,$row2->itemGrade,$row2->itemBodyPart,$row2->itemPAD,$row2->itemMAD,$row2->itemSS,$row2->itemBSS,str_replace("icon.","",strtolower($row2->itemIcon))));
								if($x == 0){
									$itemName = $augmented.str_replace("{","{{_}",$row2->itemName);
									$itemIcon = str_replace("icon.","",strtolower($row2->itemIcon));
									$itemCount = strtolower($row2->amount);
									$itemEnchant = strtolower($row2->enchant);
								}
								if(!empty($id))
									array_push($result, array("itemAmount" => $row2->amount, "itemEnchant" => $row2->enchant, "itemName" => $augmented.str_replace("{","{{_}",$row2->itemName), "itemImg" => str_replace("icon.","",strtolower($row2->itemIcon)), "itemPrice" => $price, "itemInitialPrice" => $row->price, "itemDetails" => $itemDetails, "itemId" => ltrim($row->id, "0"), "itemCharName" => $row->char_name, "itemType" => $row->type, "itemAuctionTime" => date("Y-m-d H:i:s", (strtotime($row->date) + $timeAuction)), "itemAuctionPrice" => $row->price_auction));
							}
						}
						if(empty($id))
							array_push($result, array("itemAmount" => $itemCount, "itemEnchant" => $itemEnchant, "itemName" => $itemName, "itemImg" => $itemIcon, "itemId" => ltrim($row->id, "0"), "itemCharName" => $row->char_name, "itemType" => $row->type, "itemAuctionTime" => date("Y-m-d H:i:s", (strtotime($row->date) + $timeAuction)), "itemPrice" => $price, "itemInitialPrice" => $row->price, "itemDetails" => $itemDetails, "itemAuctionPrice" => $row->price_auction));
					}
				}
			}
			return $result;
		}
		
		public function ownerAuction($auctionId,$login,$itemBroker=false){
			$table = !$itemBroker ? "icp_shop_items_auction" : "icp_shop_chars_auction";
			if($this->db_type)
				$records = $this->gameConn->prepare("SELECT account FROM ".$table." WHERE bidId = ? ORDER BY id DESC LIMIT 1");
			else
				$records = $this->gameConn->prepare("SELECT TOP 1 account FROM ".$table." WHERE bidId = ? ORDER BY id DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			$records->execute([$auctionId]);
			if($records->rowCount() > 0){
				while ($row = $records->fetchObject()) {
					if($row->account == $login){
						return true;
					}else{
						return false;
					}
				}
			}else{
				return false;
			}
		}
		
		function itemBidHistory($id,$itemBroker=true){
			if($itemBroker && !$this->ALLOW_AUCTION_ITEM_BROKER || !$itemBroker && !$this->ALLOW_AUCTION_CHARACTER_BROKER)
				return $this->resposta("Auctions is disabled.","Oops...","error");
			$result = array();
			$table = $itemBroker ? "icp_shop_items_auction" : "icp_shop_chars_auction";
			$records = $this->gameConn->prepare("SELECT * FROM ".$table." WHERE bidId = ? ORDER BY id DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			$records->execute([$id]);
			if($records->rowCount() > 0){
				while ($row = $records->fetchObject()) {
					array_push($result, array("bidDate" => $row->date, "bidAccount" => $row->account, "bidValue" => $row->value));
				}
			}
			return $result;
		}
		
		public function reward($login){
			if(!$this->ENABLE_REWARD_SYSTEM)
				return "0;0;0";
			if($this->db_type){
				$reward = $this->gameConn->prepare("SELECT SUM(c.onlinetime) AS online_time, SUM(c.pvpkills) AS pvp, SUM(c.pkkills) AS pk, IF((SELECT COUNT(*) FROM icp_rewards WHERE account = c.account_name) > 0, (SELECT CONCAT(onlinetime, ';', pvpkills, ';', pkkills) FROM icp_rewards WHERE account = c.account_name), '0;0;0') AS reward_records FROM characters AS c WHERE c.account_name = ?");
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
				$reward1 = $this->gameConn->prepare("SELECT CONCAT(onlinetime, ';', pvpkills, ';', pkkills) AS reward_records FROM icp_rewards WHERE account = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				$reward1->execute([$login]);
				$results = $reward1->fetch(\PDO::FETCH_ASSOC);
				$reward_records = explode(";", $results ? $results["reward_records"] : "0;0;0");
				$reward2 = $this->gameConn->prepare("SELECT SUM(c.use_time) AS online_time, SUM(c.Duel) AS pvp, SUM(c.PK) AS pk FROM user_data AS c WHERE c.account_name = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
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
		
		public function getItemName($itemId){
			$item = $this->gameConn->prepare("SELECT itemName FROM icp_icons WHERE itemId = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			$item->execute([$itemId]);
			$results = $item->fetch(\PDO::FETCH_ASSOC);
			if($results){
				return $results["itemName"];
			}else{
				return "No_name";
			}
		}
		
		public function showStaff($login=null){
			$result = array();
			if(!empty($login)){
				$records = $this->gameConn->prepare("SELECT * FROM icp_staff WHERE login = ? ORDER BY id ASC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				$records->execute([$login]);
			}else{
				$records = $this->gameConn->prepare("SELECT * FROM icp_staff ORDER BY id ASC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				$records->execute();
			}
			if($records->rowCount() > 0){
				while ($row = $records->fetchObject()) {
					array_push($result, array("gmName" => $row->name, "gmEmail" => $row->email, "gmImg" => $row->img));
				}
			}
			return $result;
		}
		
		public function getAccessLevel($login){
			$access = $this->loginConn->prepare("SELECT accessLevel FROM icp_accounts WHERE login = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			$access->execute([$login]);
			if($access->rowCount() == 1){
				$level = $access->fetch(\PDO::FETCH_ASSOC);
				 return $level["accessLevel"];
			}else{
				return 0;
			}
		}
		
		public function getNumMessages($login=null){
			if($this->enable_messages){
				if(empty($login)){
					if($this->db_type)
						$msg = $this->gameConn->prepare("SELECT t.* FROM icp_tickets AS t WHERE t.status = '1' AND (SELECT answered FROM icp_tickets_msgs WHERE msg_id = t.id AND status = '1' ORDER BY id DESC LIMIT 1) = t.sender ORDER BY t.id DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					else
						$msg = $this->gameConn->prepare("SELECT t.* FROM icp_tickets AS t WHERE t.status = '1' AND (SELECT TOP 1 answered FROM icp_tickets_msgs WHERE msg_id = t.id AND status = '1' ORDER BY id DESC) = t.sender ORDER BY t.id DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$msg->execute();
				}else{
					if($this->db_type)
						$msg = $this->gameConn->prepare("SELECT t.* FROM icp_tickets AS t WHERE t.status = '1' AND (SELECT answered FROM icp_tickets_msgs WHERE msg_id = t.id AND status = '1' ORDER BY id DESC LIMIT 1) != t.sender AND t.sender = ? ORDER BY t.id DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					else
						$msg = $this->gameConn->prepare("SELECT t.* FROM icp_tickets AS t WHERE t.status = '1' AND (SELECT TOP 1 answered FROM icp_tickets_msgs WHERE msg_id = t.id AND status = '1' ORDER BY id DESC) != t.sender AND t.sender = ? ORDER BY t.id DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$msg->execute([$login]);
				}
				return $msg->rowCount();
			}
		}
		
		public function showMsgs($limit=0,$login=null){
			$result = array();
			if($this->enable_messages){
				if(empty($login)){
					if(empty($limit)){
						if($this->db_type)
							$msg = $this->gameConn->prepare("SELECT t.title, t.sender, t.id, t.status, m.answered, m.date, (SELECT COUNT(*) FROM icp_tickets_msgs WHERE status = '1' AND msg_id = t.id) AS repliesCount, (m.id) AS replyId FROM icp_tickets AS t, icp_tickets_msgs AS m WHERE t.status < '2' AND m.id = (SELECT id FROM icp_tickets_msgs WHERE msg_id = t.id AND status = '1' ORDER BY id DESC LIMIT 1) ORDER BY m.date DESC");
						else
							$msg = $this->gameConn->prepare("SELECT t.title, t.sender, t.id, t.status, m.answered, m.date, (SELECT COUNT(*) FROM icp_tickets_msgs WHERE status = '1' AND msg_id = t.id) AS repliesCount, (m.id) AS replyId FROM icp_tickets AS t, icp_tickets_msgs AS m WHERE t.status < '2' AND m.id = (SELECT TOP 1 id FROM icp_tickets_msgs WHERE msg_id = t.id AND status = '1' ORDER BY id DESC) ORDER BY m.date DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					}else{
						if($this->db_type)
							$msg = $this->gameConn->prepare("SELECT t.title, t.sender, t.id, t.status, m.answered, m.date, (SELECT COUNT(*) FROM icp_tickets_msgs WHERE status = '1' AND msg_id = t.id) AS repliesCount, (m.id) AS replyId FROM icp_tickets AS t, icp_tickets_msgs AS m WHERE t.status < '2' AND m.id = (SELECT id FROM icp_tickets_msgs WHERE msg_id = t.id AND status = '1' ORDER BY id DESC LIMIT 1) ORDER BY m.date DESC LIMIT ".$limit);
						else
							$msg = $this->gameConn->prepare("SELECT t.title, t.sender, t.id, t.status, m.answered, m.date, (SELECT COUNT(*) FROM icp_tickets_msgs WHERE status = '1' AND msg_id = t.id) AS repliesCount, (m.id) AS replyId FROM icp_tickets AS t, icp_tickets_msgs AS m WHERE t.status < '2' AND m.id = (SELECT TOP 1 id FROM icp_tickets_msgs WHERE msg_id = t.id AND status = '1' ORDER BY id DESC) ORDER BY m.date DESC OFFSET ".str_replace(","," ROWS FETCH NEXT", $limit)." ROWS ONLY", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					}
					$msg->execute();
				}else{
					if(empty($limit)){
						if($this->db_type)
							$msg = $this->gameConn->prepare("SELECT t.title, t.sender, t.id, t.status, m.answered, m.date, (SELECT COUNT(*) FROM icp_tickets_msgs WHERE status = '1' AND msg_id = t.id) AS repliesCount, (m.id) AS replyId FROM icp_tickets AS t, icp_tickets_msgs AS m WHERE t.status < '2' AND m.id = (SELECT id FROM icp_tickets_msgs WHERE msg_id = t.id AND status = '1' ORDER BY id DESC LIMIT 1) AND t.sender = ? ORDER BY m.date DESC");
						else
							$msg = $this->gameConn->prepare("SELECT t.title, t.sender, t.id, t.status, m.answered, m.date, (SELECT COUNT(*) FROM icp_tickets_msgs WHERE status = '1' AND msg_id = t.id) AS repliesCount, (m.id) AS replyId FROM icp_tickets AS t, icp_tickets_msgs AS m WHERE t.status < '2' AND m.id = (SELECT TOP 1 id FROM icp_tickets_msgs WHERE msg_id = t.id AND status = '1' ORDER BY id DESC) AND t.sender = ? ORDER BY m.date DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					}else{
						if($this->db_type)
							$msg = $this->gameConn->prepare("SELECT t.title, t.sender, t.id, t.status, m.answered, m.date, (SELECT COUNT(*) FROM icp_tickets_msgs WHERE status = '1' AND msg_id = t.id) AS repliesCount, (m.id) AS replyId FROM icp_tickets AS t, icp_tickets_msgs AS m WHERE t.status < '2' AND m.id = (SELECT id FROM icp_tickets_msgs WHERE msg_id = t.id AND status = '1' ORDER BY id DESC LIMIT 1) AND t.sender = ? ORDER BY m.date DESC LIMIT ".$limit);
						else
							$msg = $this->gameConn->prepare("SELECT t.title, t.sender, t.id, t.status, m.answered, m.date, (SELECT COUNT(*) FROM icp_tickets_msgs WHERE status = '1' AND msg_id = t.id) AS repliesCount, (m.id) AS replyId FROM icp_tickets AS t, icp_tickets_msgs AS m WHERE t.status < '2' AND m.id = (SELECT TOP 1 id FROM icp_tickets_msgs WHERE msg_id = t.id AND status = '1' ORDER BY id DESC) AND t.sender = ? ORDER BY m.date DESC OFFSET ".str_replace(","," ROWS FETCH NEXT", $limit)." ROWS ONLY", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					}
					$msg->execute([$login]);
				}
				if($msg->rowCount() > 0){
					while ($row = $msg->fetchObject()) {
						array_push($result, array("msgTitle" => $row->title, "msgAuthor" => $row->sender, "msgAnswered" => $row->answered, "msgDate" => $row->date, "msgId" => $row->id, "repliesCount" => ($row->repliesCount-1), "replyId" => $row->replyId, "msgStatus" => $row->status));
					}
				}
			}
			return $result;
		}
		
		public function showMsg($id=0,$limit=null,$login=null){
			$result = array();
			if($this->enable_messages){
				if(empty($login)){
					$msg = $this->gameConn->prepare("SELECT * FROM icp_tickets WHERE status < '2' AND id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$msg->execute([$id]);
				}else{
					$msg = $this->gameConn->prepare("SELECT * FROM icp_tickets WHERE status < '2' AND id = ? AND sender = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$msg->execute([$id,$login]);
				}
				if($msg->rowCount() > 0){
					while ($row = $msg->fetchObject()) {
						if(empty($limit))
							$msgs = $this->gameConn->prepare("SELECT * FROM icp_tickets_msgs WHERE msg_id = ? AND status = '1' ORDER BY id ASC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
						else{
							if($this->db_type)
								$msgs = $this->gameConn->prepare("SELECT * FROM icp_tickets_msgs WHERE msg_id = ? AND status = '1' ORDER BY id ASC LIMIT ".$limit, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
							else
								$msgs = $this->gameConn->prepare("SELECT * FROM icp_tickets_msgs WHERE msg_id = ? AND status = '1' ORDER BY id ASC OFFSET ".str_replace(","," ROWS FETCH NEXT", $limit)." ROWS ONLY", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
						}
						if($msgs->execute([$row->id])){
							while ($row2 = $msgs->fetchObject()) {
								array_push($result, array("msgTitle" => $row->title, "msgText" => $row2->message, "msgAuthor" => $row->sender, "msgAnswered" => $row2->answered, "msgDate" => $row2->date, "replyId" => $row2->id, "msgId" => $row->id, "msgStatus" => $row->status, "msgAttachment" => $row2->attach));
							}
						}
					}
				}
			}
			return $result;
		}
		
		public function deleteReplyMsg($id=0,$reply=0,$senderPrivId){
			if($this->enable_messages){
				if($senderPrivId > 5){
					$msg = $this->gameConn->prepare("UPDATE icp_tickets_msgs SET status = '2' WHERE msg_id = ? AND id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					if($msg->execute([$id,$reply])){
						return $this->resposta("Message successfully deleted.","Success!","success","?icp=panel&show=adm-messages&id=".$id);
					}else{
						return $this->resposta("An error occurred while trying to delete the message.","Oops...","error","?icp=panel&show=adm-messages&id=".$id);
					}
				}else{
					return $this->resposta("You are not allowed to do this.","Oops...","error","?icp=panel&show=adm-messages");
				}
			}
		}
		
		public function deleteMsg($id=0,$senderPrivId){
			if($this->enable_messages){
				if($senderPrivId > 5){
					$msg = $this->gameConn->prepare("UPDATE icp_tickets SET status = '2' WHERE id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					if($msg->execute([$id])){
						return $this->resposta("Message successfully deleted.","Success!","success","?icp=panel&show=adm-messages");
					}else{
						return $this->resposta("An error occurred while trying to delete the message.","Oops...","error","?icp=panel&show=adm-messages&id=".$id);
					}
				}else{
					return $this->resposta("You are not allowed to do this.","Oops...","error","?icp=panel&show=adm-messages");
				}
			}
		}
		
		public function lockMsg($id=0,$senderPrivId){
			if($this->enable_messages){
				if($senderPrivId > 5){
					$msg = $this->gameConn->prepare("UPDATE icp_tickets SET status =  CASE WHEN status = '1' THEN '0' ELSE '1' END WHERE status = '0' OR status = '1' AND id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					if($msg->execute([$id])){
						return $this->resposta("Message successfully locked/unlocked.","Success!","success","?icp=panel&show=adm-messages&id=".$id);
					}else{
						return $this->resposta("An error occurred while trying to lock/unlock the message.","Oops...","error","?icp=panel&show=adm-messages&id=".$id);
					}
				}else{
					return $this->resposta("You are not allowed to do this.","Oops...","error","?icp=panel&show=adm-messages");
				}
			}
		}
		
		public function informer($name,$type=null){
			$result = array();
			if(!$this->db_type)
				$droplist = "icp_droplist_interlude";
			elseif($this->L2jVersaoRussa)
				$droplist = "icp_droplist_russo";
			elseif($this->L2jVersaoClassic)
				$droplist = "icp_droplist_classic";
			elseif($this->L2jVersaoAcis)
				$droplist = "icp_droplist_acis";
			else
				$droplist = "droplist";
			if($type == "NPC" || empty($type)){
				if(!empty($name)){
					if(is_numeric($name))
						$records = $this->gameConn->prepare("SELECT i.name, i.id, CASE WHEN (SELECT COUNT(*) FROM ".$droplist." WHERE mobId=i.id) > '0' THEN 'true' ELSE 'false' END AS droplist, CASE WHEN (SELECT COUNT(*) FROM icp_spawnlist WHERE npc_id=i.id) > '0' THEN 'true' ELSE 'false' END AS spawn FROM icp_npc AS i WHERE (SELECT COUNT(*) FROM ".$droplist." WHERE mobId=i.id AND itemId = ? AND itemId != '57') > '0' ORDER BY i.name ASC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					else
						$records = $this->gameConn->prepare("SELECT i.name, i.id, CASE WHEN (SELECT COUNT(*) FROM ".$droplist." WHERE mobId=i.id) > '0' THEN 'true' ELSE 'false' END AS droplist, CASE WHEN (SELECT COUNT(*) FROM icp_spawnlist WHERE npc_id=i.id) > '0' THEN 'true' ELSE 'false' END AS spawn FROM icp_npc AS i WHERE i.name LIKE CONCAT('%',?,'%') ORDER BY i.name ASC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$records->execute([$name]);
					if($records->rowCount() > 0){
						while ($row = $records->fetchObject()){
							if($row->droplist == 'true' || $row->spawn == 'true'){
								array_push($result, array("npcName" => $row->name, "npcId" => $row->id, "npcDroplist" => $row->droplist, "npcSpawn" => $row->spawn, "type" => "NPC"));
							}
						}
					}
				}
			}
			if($type == "Item" || empty($type)){
				if(!empty($name)){
					$records = $this->gameConn->prepare("SELECT i.*, CASE WHEN (SELECT COUNT(*) FROM ".$droplist." WHERE itemId=i.itemId) > 0 THEN 'true' ELSE 'false' END AS droplist FROM icp_icons AS i WHERE i.itemName LIKE CONCAT('%',?,'%') ORDER BY i.itemName ASC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
					$records->execute([$name]);
					if($records->rowCount() > 0){
						while ($row = $records->fetchObject()){
							if($row->droplist == 'true'){
								$item = array(1,0,0,0,0,0,0,0,$row->itemId,str_replace("{","{{_}",$row->itemName),$row->itemType,$row->itemTypeName,$row->itemWeight,$row->itemGrade,$row->itemBodyPart,$row->itemPAD,$row->itemMAD,$row->itemSS,$row->itemBSS,strtolower(str_replace("icon.","",$row->itemIcon)));
								array_push($result, array("itemImg" => file_exists("images/icons/".strtolower(str_replace("icon.","",$row->itemIcon)).".png") ? strtolower(str_replace("icon.","",$row->itemIcon)) : 404, "itemName" => str_replace("{","{{_}",$row->itemName), "itemDetails" => $this->showItemDetails($item), "itemDroplist" => strtolower($name) == "adena" ? "false" : $row->droplist, "type" => "Item", "itemId" => $row->itemId));
							}
						}
					}
				}
			}
			return $result;
		}
		
		public function informerNpcDetails($npc_id){
			$result = array();
			$records = $this->gameConn->prepare("SELECT n.name, n.id, CASE WHEN (SELECT COUNT(*) FROM icp_spawnlist WHERE npc_id=n.id) > 0 THEN 'true' END AS spawn FROM icp_npc AS n WHERE n.id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
			$records->execute([$npc_id]);
			if($records->rowCount() > 0){
				while ($row = $records->fetchObject()){
					array_push($result, array("npcName" => $row->name, "npcSpawn" => $row->spawn, "npcId" => $row->id));
				}
			}
			return $result;
		}
		
		public function informerDroplist($npc_id){
			$result = array();
			if(!empty($npc_id)){
				if(!$this->db_type)
					$droplist = "icp_droplist_interlude";
				elseif($this->L2jVersaoRussa)
					$droplist = "icp_droplist_russo";
				elseif($this->L2jVersaoClassic)
					$droplist = "icp_droplist_classic";
				elseif($this->L2jVersaoAcis)
					$droplist = "icp_droplist_acis";
				else
					$droplist = "droplist";
				$sweep = $this->L2jVersaoRussa || $this->L2jVersaoClassic ? ", (d.sweep) AS sweep" : ", (d.category) AS sweep";
				$order = $this->L2jVersaoRussa || $this->L2jVersaoClassic ? "d.sweep ASC" : "d.category DESC";
				$records = $this->gameConn->prepare("SELECT * ".$sweep." FROM ".$droplist." AS d, icp_icons AS i WHERE d.itemId = i.itemId AND mobId = ? ORDER BY ".$order.", d.chance DESC", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				$records->execute([$npc_id]);
				if($records->rowCount() > 0){
					while ($row = $records->fetchObject()){
						$item = array(1,0,0,0,0,0,0,0,$row->itemId,str_replace("{","{{_}",$row->itemName),$row->itemType,$row->itemTypeName,$row->itemWeight,$row->itemGrade,$row->itemBodyPart,$row->itemPAD,$row->itemMAD,$row->itemSS,$row->itemBSS,strtolower(str_replace("icon.","",$row->itemIcon)));
						if($this->L2jVersaoRussa || $this->L2jVersaoClassic){
							$dropType = empty($row->sweep) ? "Drop" : "Spoil";
						}else{
							$dropType = $row->sweep >= 0 ? "Drop" : "Spoil";
						}
						array_push($result, array("itemImg" => file_exists("images/icons/".strtolower(str_replace("icon.","",$row->itemIcon)).".png") ? strtolower(str_replace("icon.","",$row->itemIcon)) : 404, "itemName" => str_replace("{","{{_}",$row->itemName), "itemDetails" => $this->showItemDetails($item), "itemCount" => $row->min == $row->max ? $row->max : $this->kkk($row->min)." / ".$this->kkk($row->max), "itemChance" => $this->L2jVersaoClassic ? (($row->chance/100)*100)."%" : (($row->chance/1000000)*100)."%", "itemType" => $dropType, "itemId" => $row->itemId, "itemDroplist" => strtolower($row->itemName) == "adena" ? "false" : "true"));
					}
				}
			}
			return $result;
		}
		
		public function informerSpawn($npc_id){
			$result = array();
			if(!empty($npc_id)){
				if($this->db_type){
					$records = $this->gameConn->prepare("SELECT i.name, i.level, (SELECT GROUP_CONCAT(x,';',y) FROM icp_spawnlist WHERE npc_id = i.id) AS loc FROM icp_npc AS i WHERE i.id = ?");
				}else{
					$records = $this->gameConn->prepare("SELECT i.name, i.level, STUFF((SELECT ',' + CONVERT(VARCHAR, x) + ';' + CONVERT(VARCHAR, y) FROM icp_spawnlist WHERE npc_id = i.id FOR XML PATH('')),1,1,'') AS loc FROM icp_npc AS i WHERE i.id = ?", array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
				}
				$records->execute([$npc_id]);
				if($records->rowCount() > 0){
					while ($row = $records->fetchObject()) {
						$xy = explode(",",$row->loc);
						$name = $row->name;
						$level = $row->level;
						for($z=0;$z<count($xy);$z++){
							$xyz = explode(";",$xy[$z]);
							$x = (116  + ($xyz[0] + 107823) / 200);
							$y = (2580 + ($xyz[1] - 255420) / 200);
							array_push($result, array("npcName" => $row->name, "npcLevel" => $row->level, "npcLocX" => $x, "npcLocY" => $y));
						}
					}
				}
			}
			return $result;
		}
		
	}
	
}