//$(".js-fade").animate({'position': 'relative', 'left': 'auto'}, {duration: 1000, easing : 'easeOutElastic'});

$(".toleft").hide().show(500);

const options = {
    animationSelector: '[class*="swup-"]'
};
const swup = new Swup(options);

$(document).ready(function(){

	var pageName = document.location.href.split('/').reverse()[1];
	const req = new XMLHttpRequest();


////////////////////////////////////////////////////////////////////
///////////////////////// NAV //////////////////////////////////////
////////////////////////////////////////////////////////////////////

///////////////// OUVERTURE /////////////////
	$('.nav-condensed-btn').on('touchstart click',function(){

		if($('.nav-condensed').hasClass('nav-hide')){
			$('.nav-condensed').show(500);
			$('.filtre').fadeIn(500);
			setTimeout(function(){
				$('.nav-condensed').removeClass('nav-hide');
				$('body').addClass('bodyfix');

			}, 500);
		}

	});


///////////////// FERMETURE /////////////////
	$('.filtre').on('touchstart click',function(){

		if(!$('.nav-condensed').hasClass('nav-hide')){
			$('.nav-condensed').hide(500);
			$('.filtre').fadeOut(500);
			setTimeout(function(){
				$('.nav-condensed').addClass('nav-hide');
				$('body').removeClass('bodyfix');

			}, 500);
		}

	});


///////////////// REDIMENTIONEMENT /////////////////
	$(window).resize(function(){
		if(document.body.clientWidth > 940){
			if($('.nav-condensed').hasClass('nav-hide')){
				$('.nav-condensed').show(0);
				$('.filtre').hide(0);
				$('.nav-condensed').addClass('nav-hide');
				$('body').removeClass('bodyfix');
			}
			$('nav').removeClass('hamburger');
		}else{
			if(!$('nav').hasClass('hamburger')){
				$('.nav-condensed').hide(0);
				$('.filtre').hide(0);
				$('.nav-condensed').addClass('nav-hide');
				$('body').removeClass('bodyfix');
			}
			$('nav').addClass('hamburger');
		}
	});


///////////////// PAR DEFAUT /////////////////
	if(document.body.clientWidth > 940){
		if($('.nav-condensed').hasClass('nav-hide')){
			$('.nav-condensed').show(0);
			$('.filtre').hide(0);
			$('.nav-condensed').addClass('nav-hide');
			$('body').removeClass('bodyfix');
		}
		$('nav').removeClass('hamburger');
	}else{
		if(!$('nav').hasClass('hamburger')){
			$('.nav-condensed').hide(0);
			$('.filtre').hide(0);
			$('.nav-condensed').addClass('nav-hide');
			$('body').removeClass('bodyfix');
		}
		$('nav').addClass('hamburger');
	}

////////////////////////////////////////////////////////////////////
///////////////////////// AUTRE ////////////////////////////////////
////////////////////////////////////////////////////////////////////

	///////////////// COPY /////////////////
	$('.copy').on('touchstart click',function(){
		$('.copy').select();
		document.execCommand('copy');
		return false;
	});

	///////////////// BACKGROUND /////////////////
	function getRandomInt(max) {
  		return Math.floor(Math.random() * Math.floor(max));
	}
	$('header').addClass('back-' + getRandomInt(5));

////////////////////////////////////////////////////////////////////
///////////////////////// ACCEUIL //////////////////////////////////
////////////////////////////////////////////////////////////////////

	if(pageName == 'tntgun.fr'){

		$('header .title .subtitle .js-inc').fadeOut(0);

		$.ajax({
			url : 'include/acceuil.inc.php',
			type : 'POST',
			dataType : 'html',

			success : function(html, status){

				$('header .title .subtitle .js-inc').append(html);
			   	$('header .title .subtitle .js-inc').fadeIn(500);

			}

		});


	}

////////////////////////////////////////////////////////////////////
///////////////////////// JOUEURS //////////////////////////////////
////////////////////////////////////////////////////////////////////
	else if(pageName == 'joueurs'){

/////////////////////////////////// REFRESH EVENTS ///////////////////////////////////

		var lastValue = '';
		$("#ord-lst").on('change', function(){

			refreshPage();
		});
		$("#flt-lst").on('change', function(){

			refreshPage();
		});
		$("#rch-txt").on('change keyup paste', function(){

			var eventValue = document.getElementById("rch-txt").value;

			setTimeout(function(){
				var value = document.getElementById("rch-txt").value;
				if(value == eventValue && lastValue != eventValue){

					lastValue = value;
					refreshPage();

				}

			}, 1000);
		});

		$('main .player form').on('submit', function(e){

			e.preventDefault();
			refreshPage();

		});

/////////////////////////////////// REFRESH FONCTION ///////////////////////////////////

		function refreshPage(){

			var rch = document.getElementById("rch-txt").value;
			if(rch == '') var value = 'ord=' + document.getElementById("ord-lst").value + '&flt=' + document.getElementById("flt-lst").value;
			else var value = 'ord=' + document.getElementById("ord-lst").value + '&flt=' + document.getElementById("flt-lst").value + '&rch=' + rch;


			$.ajax({
				url : '../include/joueurs.inc.php',
				type : 'POST',
				data : value,
				dataType : 'html',

				success : function(html, status){

					$('main .player tbody').fadeOut(0);
					$('main .player tbody').children().remove();
			   		$('main .player tbody').append(html);
			   		$('main .player tbody').fadeIn(500);

				}
			});
		}

		refreshPage();







////////////////////////////// REFRESH TOUTES LES 100 SECONDES //////////////////////////////

		setInterval(function(){

			refreshPage();

		}, 100000);

	}
////////////////////////////////////////////////////////////////////
///////////////////////// SUPPORT //////////////////////////////////
////////////////////////////////////////////////////////////////////

	if(pageName == 'support'){

//////////////////////////////// INCLUDES PAR DÉFAUT ////////////////////////////////

		$.ajax({
			url : '../include/support-form.inc.php',
			type : 'POST',
			dataType : 'html',

			success : function(html, status){

				$('body .support form').append(html);

			}
		});

		$.ajax({
			url : '../include/support.inc.php',
			type : 'POST',
			dataType : 'html',

			success : function(html, status){

				$('main .support tbody').append(html);

						setTimeout(function(){

							document.getElementById('support').scrollTop = document.getElementById('support').scrollHeight + document.getElementById('support').clientHeight;

						}, 300);

			}
		});

//////////////////////////////// SUBMIT ////////////////////////////////



		$("body .support form").on('submit', function(e){
			e.preventDefault();
			if(document.getElementById("mdp-txt") == null){

				var value = document.getElementById("send-txt").value;
				if(e.which == 13 && value == null){

					document.getElementById("send-txt").value = null;
					$.ajax({
						url : '../include/support.inc.php',
						type : 'POST',
						data : 'msg=' + value,
						dataType : 'html',

						success : function(html, status){

							$('main .support tbody').append(html);
							$('main .support .support-table').scrollTop(9999999999999);
						}
					});
				}

			}else{

				$.ajax({
					url : '../include/support-form.inc.php',
					type : 'POST',
					data : 'psd=' + document.getElementById("psd-txt").value + '&mdp='  + document.getElementById("mdp-txt").value,
					dataType : 'html',
          async: true,

					success : function(html, status){

						$('body .support form').children().remove();
						$('body .support form').append(html);

					}
				});

			}
		});

///////////////////////// SEND MESSAGE WITH ENTRY ///////////////////////////

		$('body').keydown(function(e){
			if(e.which == 13 && document.getElementById("mdp-txt") == null){
				e.preventDefault();
				var value = document.getElementById("send-txt").value;
				if(value != ''){

					document.getElementById("send-txt").value = null;
					$.ajax({
						url : '../include/support.inc.php',
						type : 'POST',
						data : 'msg=' + value,
						dataType : 'html',

						success : function(html, status){

							$('main .support tbody').append(html);
							$('main .support .support-table').scrollTop(9999999999999);

						}
					});
				}
			}
		});


//////////////////////////////// REFRESH DES MESSAGES ////////////////////////////////

		setInterval(function(){

			$.ajax({
				url : '../include/support.inc.php',
				type : 'POST',
				dataType : 'html',

				success : function(html, status){

          if($('main .support tbody').html().replace(/\n|\r/g,'').trim() != html.replace(/\n|\r/g,'').trim()){
            $('main .support tbody').children().remove();
  					$('main .support tbody').append(html);
  					if(document.getElementById('support').scrollHeight - document.getElementById('support').scrollTop - document.getElementById('support').clientHeight <= 370){
              document.getElementById('support').scrollTop = document.getElementById('support').scrollHeight + document.getElementById('support').clientHeight;
  					}
          }
				}
			});

		}, 6000);

/////////////////////////// SCROLL LEVEL PAR DÉFAUT ///////////////////////////


		$(window).bind('beforeunload', function(){
    		$.ajax({
				url : '../include/support-form.inc.php',
				type : 'POST',
				data : 'dec=1',
				dataType : 'html'
			});
		});

	}
});
