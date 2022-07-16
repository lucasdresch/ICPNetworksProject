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

popBoxWaitImage.src = "../images/spinner40.gif";
popBoxRevertImage = "../images/magminus.gif";
popBoxPopImage = "../images/magplus.gif";

// Popup videos
$(function() {
	function launch() {
			$('#sign_up').lightbox_me({centered: true, onLoad: function() { $('#sign_up').find('input:first').focus()}});
	}
	
	$('#try-1').click(function(e) {
		$("#sign_up").lightbox_me({centered: true, onLoad: function() {
			$("#sign_up").find("input:first").focus();
		}});

		e.preventDefault();
	});
	
	$('table tr:nth-child(even)').addClass('stripe');
});
// Popup videos

$(function() {
	$('.loading').hide();
	$('.msg').hide();
	$('.alvo').hide();
	$('.loading_home').hide();
	$('.items_premium').hide();
	$('.players_store_chars').hide();
	$('.players_store').hide();
	$('.players_store_auction').hide();
});

function DonationPayment(val){
	document.getElementById('donation_type').value = val;
}

function logar(){
	$('button[id=3]').attr('disabled', 'disabled');
	setTimeout(function(){
		$('button[id=3]').removeAttr('disabled');
	}, 4000);
	$(function(){
		$.post('./check.php', { logar: 'logar', login: $('input[id=1]').val(), senha: $('input[id=2]').val() }, function(data){
			$('.alvo').fadeIn('slow').html(data);
		});
	});
	$('.loading').fadeIn('slow');
};

function abre(file){
	$('button[id=12]').attr('disabled', 'disabled');
	setTimeout(function(){
		$('button[id=12]').removeAttr('disabled');
	}, 4000);
	$('#centro-center').fadeOut('slow', function(){
		$('#centro-center').load('templates/desktop/icp%20v2/links.php?icp=' + file.replace(/\&/g,"&amp;"), function(){
			$('#centro-center').fadeIn('slow');
		});
	});
};

function admUserPanel(panel){
	setTimeout(function(){
		$.post('./pags/painel.php', { admUser: panel }, function(data){
			$('#panel').fadeIn('slow').html(data);
		});
	}, 3000);
	$('.loading').fadeIn('slow');
};

function giveCoins(){
	$('.loading').fadeOut('slow');
	$('.answer').fadeOut('slow');
	setTimeout(function(){
		$.post('./check.php', { giveCoins: 'true', donateAccount: $('#giveAccount').val(), donateCoins: $('#giveCoins').val() }, function(data){
			$('.alvo').fadeIn('slow').html(data);
		});
	}, 1000);
	$('.loading').fadeIn('slow');
};

function postNews(){
	$('.loading_home').fadeOut('slow');
	$('.answer').fadeOut('slow');
	setTimeout(function(){
		$.post('./check.php', { postNews: 'true', newsTitle: $('#news_title').val(), newsText: $('#news_text').val(), newsEdit: $('#news_edit').val() }, function(data){
			$('.answer').fadeIn('slow').html(data);
		});
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function editNews(id){
	$('.loading_home').fadeOut('slow');
	setTimeout(function(){
		$.post('./check.php', { editNews: 'true', newsId: id }, function(data){
			var result = data.split("|")
			$('#news_title').fadeIn('slow').val(result[0]);
			$('#news_text').fadeIn('slow').val(result[1]);
			$('#news_edit').fadeIn('slow').val(result[2]);
			$('#sendNews').fadeIn('slow').html('Editar notícia');
		});
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function deleteNews(id){
	$('.loading_home').fadeOut('slow');
	if (confirm('Are you sure you want to delete this news?')) {
		setTimeout(function(){
			$.post('./check.php', { deleteNews: 'true', newsId: id }, function(data){
				if(data == "true")
					postedNews();
			});
		}, 1000);
		$('.loading_home').fadeIn('slow');
	}
};

function postedNews(){
	$('.loading_home').fadeOut('slow');
	$('.old_news').fadeOut('slow').html();
	setTimeout(function(){
		$('.old_news').html('').fadeIn('slow').load('./links.php?icp=painel&amp;pagina=_adm_news_posted');
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function addPrimeShop(){
	$('.loading_home').fadeOut('slow');
	$('.answer').fadeOut('slow');
	setTimeout(function(){
		$.post('./check.php', {
			addPrime: 'true',
			primeItem: $("input[name='itemId[]']").map(function(){return $(this).val();}).get(),
			itemCount: $("input[name='itemCount[]']").map(function(){return $(this).val();}).get(),
			itemEnchant: $("input[name='itemEnchant[]']").map(function(){return $(this).val();}).get(),
			itemFire: $("input[name='itemFire[]']").map(function(){return $(this).val();}).get(),
			itemWater: $("input[name='itemWater[]']").map(function(){return $(this).val();}).get(),
			itemWind: $("input[name='itemWind[]']").map(function(){return $(this).val();}).get(),
			itemEarth: $("input[name='itemEarth[]']").map(function(){return $(this).val();}).get(),
			itemHoly: $("input[name='itemHoly[]']").map(function(){return $(this).val();}).get(),
			itemDark: $("input[name='itemDark[]']").map(function(){return $(this).val();}).get(),
			itemPrice: $("#itemPrice").val()
		}, function(data){
			$('.answer').fadeIn('slow').html(data);
		});
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function deletePrimeShop(id){
	$('.loading_home').fadeOut('slow');
	if (confirm('Are you sure you want to delete this item?')) {
		setTimeout(function(){
			$.post('./check.php', { deletePrimeShop: 'true', itemId: id }, function(data){
				if(data == "true")
					abre('painel&pagina=_adm_prime_shop');
			});
		}, 1000);
		$('.loading_home').fadeIn('slow');
	}
};

function deleteProfile(){
	$('.loading_home').fadeOut('slow');
	if (confirm('Are you sure you want to delete this profile?')) {
		setTimeout(function(){
			$.post('./check.php', { deleteProfile: 'true' }, function(data){
				if(data == "true"){
					$("#profileImg1").attr('src', './images/screenshots/noimage.jpg');
					$('#profile_name').html('GM Anonymous');
					$('#profile_employ').html('Game Master');
					$('#profile_email').html('-');
					$('#btn_profile').html('Create profile');
					abre('painel&pagina=_adm_profile');
				}
			});
		}, 1000);
		$('.loading_home').fadeIn('slow');
	}
};

function staffProfile(){
	$(".loading_home")
	.ajaxStart(function(){
		$(this).show();
	})
	.ajaxComplete(function(){
		$(this).hide();
	});
	$.ajaxFileUpload({
		url:'./check.php',
		secureuri:false,
		fileElementId:'fileToUpload',
		dataType: 'json',
		data:{ staffProfile: 'true', staffName: $("#gm_name").val(), staffOffice: $("#gm_office").val(), staffEmail: $("#gm_email").val() },
		success: function (data, status)
		{
			if(typeof(data.error) != 'undefined')
			{
				if(data.error != '')
				{
					alert(data.error);
				}else
				{
					$("#profileImg1").attr('src', data.img);
					$("#profileImg2").attr('src', data.img);
					if($('#gm_name').val() != '')
						$('#profile_name').html($('#gm_name').val());
					if($('#gm_office').val() != '')
						$('#profile_employ').html($('#gm_office').val());
					if($('#gm_email').val() != '')
						$('#profile_email').html($('#gm_email').val());
					$('#btn_staff').html('Editar profile');
					$('#btn_profile').html('Edit profile');
					$('#fileToUpload').val('');
					alert(data.msg);
				}
			}
		},
		error: function (data, status, e)
		{
			alert(e);
		}
	});
	return false;
};

function editScreenshot(id){
	$('.loading_home').fadeOut('slow');
	setTimeout(function(){
		$.post('./check.php', { editScreenshot: 'true', screenshotId: id }, function(data){
			if(data == "true")
				abre('painel&pagina=_adm_screenshots');
		});
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function deleteScreenshot(id){
	$('.loading_home').fadeOut('slow');
	if (confirm('Are you sure you want to delete this screenshot?')) {
		setTimeout(function(){
			$.post('./check.php', { deleteScreenshot: 'true', screenshotId: id }, function(data){
				if(data == "true")
					abre('painel&pagina=_adm_screenshots');
			});
		}, 1000);
		$('.loading_home').fadeIn('slow');
	}
};

function editVideo(id){
	$('.loading_home').fadeOut('slow');
	setTimeout(function(){
		$.post('./check.php', { editVideo: 'true', videoId: id }, function(data){
			if(data == "true")
				abre('painel&pagina=_adm_videos');
		});
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function deleteVideo(id){
	$('.loading_home').fadeOut('slow');
	if (confirm('Are you sure you want to delete this video?')) {
		setTimeout(function(){
			$.post('./check.php', { deleteVideo: 'true', videoId: id }, function(data){
				if(data == "true")
					abre('painel&pagina=_adm_videos');
			});
		}, 1000);
		$('.loading_home').fadeIn('slow');
	}
};

function itemPremiumDetails(item){
	$('.loading_home').fadeOut('slow');
	$('.items_premium').fadeOut('slow');
	setTimeout(function(){
		$.post('./links.php?icp=painel&amp;pagina=premiumDetails', { item_id: item.id }, function(data){
			$('.items_premium').fadeIn('slow').html(data);
		});
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function charStoreDetails(charid){
	$('.loading_home').fadeOut('slow');
	$('.players_store_chars').fadeOut('slow');
	setTimeout(function(){
		$.post('./links.php?icp=painel&amp;pagina=charStoreDetails', { char_store_id: charid }, function(data){
			$('.players_store_chars').fadeIn('slow').html(data);
		});
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function itemStoreDetails(item){
	$('.loading_home').fadeOut('slow');
	$('.players_store').fadeOut('slow');
	setTimeout(function(){
		$.post('./links.php?icp=painel&amp;pagina=itemStoreDetails', { item_id: item.id }, function(data){
			$('.players_store').fadeIn('slow').html(data);
		});
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function itemStoreAuctionReceive(item){
	$('.loading_home').fadeOut('slow');
	$('.players_store_auction').fadeOut('slow');
	setTimeout(function(){
		$.post('./links.php?icp=painel&amp;pagina=itemStoreAuctionReceive', { item_id: item.id }, function(data){
			$('.players_store_auction').fadeIn('slow').html(data);
		});
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function charStoreAuctionReceive(charid){
	$('.loading_home').fadeOut('slow');
	$('.answer').fadeOut('slow');
	setTimeout(function(){
		$.post('./check.php', { char_auction_buy: "true", charid: charid }, function(data){
			$('.answer').fadeIn('slow').html(data);
		});
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function itemStoreCancel(item){
	$('.loading_home').fadeOut('slow');
	$('.answer').fadeOut('slow');
	setTimeout(function(){
		$.post('./check.php', { itemStoreCancel: 'true', item_id: item.id }, function(data){
			$('.answer').fadeIn('slow').html(data);
		});
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function charStoreCancel(id){
	$('.loading_home').fadeOut('slow');
	$('.answer').fadeOut('slow');
	setTimeout(function(){
		$.post('./check.php', { charStoreCancel: 'true', char_store_id: id }, function(data){
			$('.answer').fadeIn('slow').html(data);
		});
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function orderItemStore(id){
	$('.loading_home').fadeOut('slow');
	$('.item_store_list').fadeOut('slow');
	setTimeout(function(){
		$.post('./links.php?icp=painel&amp;pagina=itemStoreList', { order_by: id }, function(data){
			$('.item_store_list').fadeIn('slow').html(data);
		});
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function orderCharStore(id){
	$('.loading_home').fadeOut('slow');
	$('.char_store_list').fadeOut('slow');
	setTimeout(function(){
		$.post('./links.php?icp=painel&amp;pagina=charStoreList', { order_by: id }, function(data){
			$('.char_store_list').fadeIn('slow').html(data);
		});
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function bid(id,store=0){
	$('.loading_home').fadeOut('slow');
	$('.answer').fadeOut('slow');
	setTimeout(function(){
		$.post('./check.php', { post_bid: 'true', itemid: id, bid: $('#bid_value').val(), charstore: store }, function(data){
			$('.answer').fadeIn('slow').html(data);
		});
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function buyItem(id,loc){
	$('.loading_home').fadeOut('slow');
	$('.answer').fadeOut('slow');
	setTimeout(function(){
		if(loc == 'store'){
			$.post('./check.php', { store_buy: 'true', itemid: id, charid: $('#owner').val() }, function(data){
				$('.answer').fadeIn('slow').html(data);
			});
		}else if(loc == 'auction'){
			$.post('./check.php', { auction_buy: 'true', itemid: id, charid: $('#owner').val() }, function(data){
				$('.answer').fadeIn('slow').html(data);
			});
		}else if(loc == 'prime'){
			$.post('./check.php', { prime_buy: 'true', itemid: id, charid: $('#owner').val() }, function(data){
				$('.answer').fadeIn('slow').html(data);
			});
		}else if(loc == 'characters'){
			$.post('./check.php', { char_store_buy: 'true', charid: id }, function(data){
				$('.answer').fadeIn('slow').html(data);
			});
		}
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function linkPlayerStore(page){
	$('.loading_home').fadeOut('slow');
	$('.items_store').fadeOut('slow');
	setTimeout(function(){
		$('.items_store').html('').fadeIn('slow').load('./links.php?icp=painel&amp;pagina=' + page);
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function sellItem(){
	$('.loading_home').fadeOut('slow');
	$(function(){
		$.post('./check.php', { playerStore_items: 'true', playerStore_charid: $('#charid').val() }, function(data){
			$('.answer').fadeIn('slow').html(data);
		});
	});
	$('.loading_home').fadeIn('slow');
};

function sellChar(){
	$('.loading_home').fadeOut('slow');
	$(function(){
		$.post('./check.php', { playerStore_chars: 'true', playerStore_charid: $('#charid').val(), playerStore_price: $('#value').val(), playerStore_type: $('#type').val() }, function(data){
			$('.answer').fadeIn('slow').html(data);
		});
	});
	$('.loading_home').fadeIn('slow');
};

function sell(){
	var items = $("input[name='items[]']:checked").map(function(){return $(this).val();}).get();
	if(items != ''){
		if(items.length > 0 && items.length < 25){
			var value = Number($("#value").val()).toString();
			if(value != '' && value != 0 && value > 0){
				if($("#type").val() == 0 || $("#type").val() == 1){
					if($("#charid").val() != ''){
						$('.loading_home').fadeOut('slow');
						$(function(){
							$.post('./check.php', { sellItem: 'true', ownerid: $('#charid').val(), itemsSell: items, price: $('#value').val(), type: $('#type:checked').val() }, function(data){
								$('.answer2').fadeIn('slow').html(data);
							});
						});
						$('.loading_home').fadeIn('slow');
					}else
						alert("Character not found.");
				}else
					alert("Invalid sale type.");
			}else
				alert("Invalid price.\nChoose the price.");
		}else
			alert("Maximum limit of 24 items.");
	}else
		alert("Select one or more items.");
};

function accountChar(){
	$('.loading_home').fadeOut('slow');
	$('.info_char').fadeOut('slow').html();
	$('.stats_char').fadeOut('slow').html();
	setTimeout(function(){
		$.post('./links.php?icp=painel&amp;pagina=accountChar', { char_id: $('#stat_select').val() }, function(data){
			$('.info_char').fadeIn('slow').html(data);
		});
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function informer(type,id){
	$('.loading_home').fadeOut('slow');
	$('.informer').fadeOut('slow').html();
	setTimeout(function(){
		if(type == 'informer_npc_by_npc_name'){
			$.post('./check.php', { informer_npc_by_npc_name: $('input[id="informer_npc_name"]').val() },
			function(data){
				$('.informer').css("height","auto");
				$('.informer').fadeIn('slow').html(data);
			});
		}else if(type == 'informer_npc_by_item_name'){
			$.post('./check.php', { informer_npc_by_item_name: id },
			function(data){
				$('.informer').css("height","auto");
				$('.informer').fadeIn('slow').html(data);
			});
		}else if(type == 'informer_item_by_item_name'){
			$.post('./check.php', { informer_item_by_item_name: $('input[id="informer_item_name"]').val() },
			function(data){
				$('.informer').css("height","auto");
				$('.informer').fadeIn('slow').html(data);
			});
		}else if(type == 'npc_drop'){
			$.post('./check.php', { informer_npc_drop: id },
			function(data){
				$('.informer').css("height","auto");
				$('.informer').fadeIn('slow').html(data);
			});
		}else if(type == 'npc_map'){
			$.post('./check.php', { informer_npc_map: id },
			function(data){
				$('.informer').css("height","470");
				$('.informer').fadeIn('slow').html(data);
			});
		}
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function statsChar(page, id, login){
	$('.loading_home').fadeOut('slow');
	$('.stats_char').fadeOut('slow').html();
	setTimeout(function(){
		$.post('./links.php?icp=painel&amp;pagina=' + page, { char_id: id, login: login }, function(data){
			$('.stats_char').fadeIn('slow').html(data);
		});
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function closeWindow(div){
	$('.' + div).fadeOut('slow').html('');
}

function unlock(){
	$('.loading_home').fadeOut('slow');
	$('input[id="unlock"]').attr('disabled', 'disabled');
	setTimeout(function(){
		$('input[id="unlock"]').removeAttr('disabled');
	}, 4000);
	$(function(){
		$.post('./check.php', { unlock_charid: $('#unlock_charid').val() }, function(data){
			$('.unlock').fadeIn('slow').html(data);
		});
	});
	$('.loading_home').fadeIn('slow');
};

function base_change(){
	$('.loading_home').fadeOut('slow');
	$('input[id="base_change"]').attr('disabled', 'disabled');
	setTimeout(function(){
		$('input[id="base_change"]').removeAttr('disabled');
	}, 4000);
	$(function(){
		$.post('./check.php', { base_charid: $('#charid').val(), new_base_id: $('#new_base').val() }, function(data){
			$('.answer').fadeIn('slow').html(data);
		});
	});
	$('.loading_home').fadeIn('slow');
};

function nick_change(){
	$('.loading_home').fadeOut('slow');
	$('input[id="nick_change"]').attr('disabled', 'disabled');
	setTimeout(function(){
		$('input[id="nick_change"]').removeAttr('disabled');
	}, 4000);
	$(function(){
		$.post('./check.php', { nick_charid: $('#charid').val(), new_nick: $('#new_nick').val() }, function(data){
			$('.answer').fadeIn('slow').html(data);
		});
	});
	$('.loading_home').fadeIn('slow');
};

function sex_change(){
	$('.loading_home').fadeOut('slow');
	$('input[id="sex_change"]').attr('disabled', 'disabled');
	setTimeout(function(){
		$('input[id="sex_change"]').removeAttr('disabled');
	}, 4000);
	$(function(){
		$.post('./check.php', { sex_charid: $('#charid').val(), sex: $('#sex').val() }, function(data){
			$('.answer').fadeIn('slow').html(data);
		});
	});
	$('.loading_home').fadeIn('slow');
};

function account_change(){
	$('.loading_home').fadeOut('slow');
	$('input[id="account_change"]').attr('disabled', 'disabled');
	setTimeout(function(){
		$('input[id="account_change"]').removeAttr('disabled');
	}, 4000);
	$(function(){
		$.post('./check.php', { account_charid: $('#charid').val(), new_account: $('#new_account').val() }, function(data){
			$('.answer').fadeIn('slow').html(data);
		});
	});
	$('.loading_home').fadeIn('slow');
};

function enchant_char(){
	$('.loading_home').fadeOut('slow');
	$(function(){
		$.post('./check.php', { enchant_charid: $('#enchant_charid').val() }, function(data){
			$('.answer').fadeIn('slow').html(data);
		});
	});
	$('.loading_home').fadeIn('slow');
};

function getReward(){
	$('.loading_home').fadeOut('slow');
	$(function(){
		$.post('./check.php', { reward: 'true', online_reward: $('#online_rwrd:checked').val(), pvp_reward: $('#pvp_rwrd:checked').val(), pk_reward: $('#pk_rwrd:checked').val(), charid: $('#charid').val() }, function(data){
			$('.answer').html(data);
		});
	});
	$('.loading_home').fadeIn('slow');
};

function enchant(item,charid,itemid){
	$('.loading_home').fadeOut('slow');
	var msg = 'Do you really want to enchant this item of +' + item[0].value + ' to +' + item.value + '?';
	if (confirm(msg)) {
		$(function(){
			$.post('./check.php', { enchant_char_id: charid, enchant_item_id: itemid, enchant_level: item.value }, function(data){
				$('.answer2').fadeIn('slow').html(data);
				if(data == "no_credit"){
					$('.answer2').html('');
					item.value = item[0].value;
					alert('You do not have enough currencies to perform this action.\nMake a donation and increase your balance.');
				}else if(data == "aug_forbiden"){
					$('.answer2').html('');
					item.value = item[0].value;
					alert('Enchanting augmented items is prohibited!');
				}else if(data == "over_enchant"){
					$('.answer2').html('');
					item.value = item[0].value;
					alert('Value higher than allowed!');
				}else{
					for(i='0'+item[0].value;i<item.value;i++){
						item.remove(0);
					}
				}
			});
		});
		$('.loading_home').fadeIn('slow');
	}else{
		item.value = item[0].value;
	}
};

function sair(){
	$('button[id=0]').attr('disabled', 'disabled');
	setTimeout(function(){
		$('button[id=0]').removeAttr('disabled');
	}, 4000);
	$(function(){
		$.post('./check.php', {sair: $('button[id=0]').val()}, function(data){
			$('.alvo').fadeIn('slow').html(data);
		});
	});
	$('.loading').fadeIn('slow');
};

function contact(){
	$('button[id=btn_contact]').attr('disabled', 'disabled');
	setTimeout(function(){
		$('button[id=btn_contact]').removeAttr('disabled');
	}, 4000);
	$(function(){
		$.post('./check.php', {contact: 'true', contact_name: $('#contact_name').val(), contact_email: $('#contact_email').val(), contact_subject: $('#contact_subject').val(), contact_msg: $('#contact_msg').val()}, function(data){
			$('.alvo').fadeIn('slow').html(data);
		});
	});
	$('.loading').fadeIn('slow');
};

function cadastro(){
	$('button[id=8]').attr('disabled', 'disabled');
	setTimeout(function(){
		$('button[id=8]').removeAttr('disabled');
	}, 4000);
	$(function(){
		$.post('./check.php', {cadastrar: 'cadastrar', login: $('input[id=4]').val(), email: $('input[id=5]').val(), senha1: $('input[id=6]').val(), senha2: $('input[id=7]').val()}, function(data){
			$('.alvo').fadeIn('slow').html(data);
		});
	});
	$('.loading').fadeIn('slow');
};

function remember(){
	$('button[id=11]').attr('disabled', 'disabled');
	setTimeout(function(){
		$('button[id=11]').removeAttr('disabled');
	}, 4000);
	$(function(){
		$.post('./check.php', {recuperacao: 'remember', login: $('input[id=9]').val(), email: $('input[id=10]').val()}, function(data){
			$('.alvo').fadeIn('slow').html(data);
		});
	});
	$('.loading').fadeIn('slow');
};

function t_senha(){
	$('.msg').fadeOut('slow');
	$('button[id=39]').attr('disabled', 'disabled');
	setTimeout(function(){
		$('button[id=39]').removeAttr('disabled');
	}, 4000);
	$(function(){
		$.post('./check.php', {t_senha: "t_senha",senha1: $('input[id=36]').val(),senha2: $('input[id=37]').val(),senha3: $('input[id=38]').val()}, function(data){
			$('.alvo').fadeIn('slow').html(data);
		});
	});
	$('.loading_home').fadeIn('slow');
};

function emailChange(){
	$('.loading_home').fadeOut('slow');
	$('button[id=changeEmail]').attr('disabled', 'disabled');
	setTimeout(function(){
		$('button[id=changeEmail]').removeAttr('disabled');
	}, 4000);
	$(function(){
		$.post('./check.php', { email1: $('#email1').val(), email2: $('#email2').val() }, function(data){
			$('.answer').fadeIn('slow').html(data);
		});
	});
	$('.loading').fadeIn('slow');
};

function pagination(target, pag, post){
	$('.loading_home').fadeOut('slow');
	$(target).fadeOut('slow').html();
	setTimeout(function(){
		$.post('./links.php?icp='+pag.replace(/\&/g,"&amp;"), { page: post }, function(data){
			$(target).fadeIn('slow').html(data);
		});
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function sendVideo(){
	$('.loading_home').fadeOut('slow');
	setTimeout(function(){
		$.post('./check.php', { videos: 'true', author: $('#charname').val(), linkVideo: $('#link').val(), legend: $('#legend').val() }, function(data){
			$('.answer').fadeIn('slow').html(data);
		});
	}, 1000);
	$('.loading_home').fadeIn('slow');
};

function ajaxFileUpload(){
	$(".loading_home")
	.ajaxStart(function(){
		$(this).show();
	})
	.ajaxComplete(function(){
		$(this).hide();
	});
	$.ajaxFileUpload({
		url:'./check.php',
		secureuri:false,
		fileElementId:'fileToUpload',
		dataType: 'json',
		data:{ screenshot: 'true', legend: $('#legend').val(), author: $('#charname').val() },
		success: function (data, status)
		{
			if(typeof(data.error) != 'undefined')
			{
				if(data.error != '')
				{
					alert(data.error);
				}else
				{
					alert(data.msg);
					$('#legend').val('');
					$('#fileToUpload').val('');
				}
			}
		},
		error: function (data, status, e)
		{
			alert(e);
		}
	});
	return false;
};

function openMenuSubclass(e, subclassName) {
	var i, skillsContent, subclassLink;
	skillsContent = document.getElementsByClassName("skillsContent");
	for (i = 0; i < skillsContent.length; i++) {
		skillsContent[i].style.display = "none";
	}
	subclassLink = document.getElementsByClassName("subclassLink");
	for (i = 0; i < subclassLink.length; i++) {
		subclassLink[i].className = subclassLink[i].className.replace(" active", "");
	}
	document.getElementById(subclassName).style.display = "block";
	e.currentTarget.className += " active";
}

$(document).ready(function(){
	$(document).ajaxStop(function(){
		$('.loading_home').fadeOut('slow');
		$('.loading').fadeOut('slow');
		$('.msg').fadeOut('slow');
	});
});

jQuery(document).ready(function(){
	jQuery("#goTop").hide();
	jQuery('a#goTop').click(function () {
		jQuery('body,html').animate({
		scrollTop: 0
		}, 800);
		return false;
	});
	jQuery(window).scroll(function () {
		if (jQuery(this).scrollTop() > 600) {
			jQuery('#goTop').fadeIn();
		} else {
			jQuery('#goTop').fadeOut();
		}
	});
});