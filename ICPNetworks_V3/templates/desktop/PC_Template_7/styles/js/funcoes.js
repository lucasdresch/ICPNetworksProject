// JavaScript de todas as funções em jquery do site - by Hugo Felipe

// Funções Carrousel

$(document).ready(function(){  
    $('#carousel').cycle({  
        fx:         'fade',  
        prev:       '#prev',  
        next:       '#next'  
    });  
  
});  

// Funções JqDock


	$(function(){
			var jqDockOpts = {align: 'left', duration: 200, labels: 'tc', size: 48, distance: 85};
			$('#jqDock').jqDock(jqDockOpts);
		});

// Funções do menu horizontal

function mainmenu(){
$(" #navigation ul").css({display: "none"}); // Opera Fix
$(" #navigation li").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(400);
		},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
		});
}

$(document).ready(function(){					
	mainmenu();
});

// Funções para o menu funfar no ie6 - 8

over = function() {
	var sfEls = document.getElementById("navigation").
getElementsByTagName("LI");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" over";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.
replace(new RegExp(" over\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", over);


