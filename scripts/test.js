$(document).ready(function(){
	
	$('#reservierung').submit(function(event) {
		event.preventDefault(); // Prevent the form from submitting via the browser
	});
	
	$('select').selectBox({
		mobile: true,
		menuSpeed: 'fast',
		menuTransition: 'slide'
	});
	
    // initialize datepair
    $('#e .time').timepicker({
        'showDuration': true,
        'timeFormat': 'H:i'
    });

    $('#e .date').datepicker({
        'format': 'd/m/yyyy',
        'autoclose': true,
		language: "de-DE"
    });
	
    // initialize datepair
    $('#e').datepair();
	
	$('#button').click(function(){
	
		var milliseconds = $('#e').datepair('getTimeDiff');
		var datumBeginn =$('#date-start').val();
		var datumEnde =$('#date-end').val();
		var zeitBeginn=$('#time-start').val();
		var zeitEnde=$('#time-end').val();
		var minutes = ((milliseconds/1000)/60);
		var hours=(minutes/60);
		var days=Math.ceil((hours/24));
		
		var value=$.trim($("#date-start").val());
		
		var selectedText = $('.selectBox-label').text();
		var hourlyRate =parseInt($("select").val(), 10);
		var price =hours*hourlyRate;
		var pricePerDay=days*hourlyRate;
		
		if(isNaN(price)){
			$('#feld-leer').removeClass('hide');
		}else{
			$('#reservierung').addClass('hide');
			$('.kauf-info').removeClass('hide');
			$('#ajax-contact-form').removeClass('hide');
			$('#back-button').click(function(){
				location.reload(true);
				/*$('#reservierung').removeClass('hide');
				$('.kauf-info').addClass('hide');
				$('#ajax-contact-form').addClass('hide');
				$(".notification_ok").hide();*/
			});
			if(hours == 1){
				$('#leihdauer').html( hours + ' Stunde');	
				$('#kosten').html(hourlyRate+'€');
				$('#bepreisung').val(hourlyRate);
			}else if(hours==24){
				$('#leihdauer').html( days + ' Tag');
				$('#kosten').html(hourlyRate+'€');
				$('#bepreisung').val(hourlyRate);
			}else{
				$('#leihdauer').html( (days) + ' Tage');
				$('#kosten').html(pricePerDay+'€');
				$('#bepreisung').val(pricePerDay);
			}
			$('.objekt').html( selectedText );
			$('#objekt').val(selectedText);
			$('#zeit-beginn').val(zeitBeginn);
			$('#datum-beginn').val(datumBeginn);
			$('#zeit-ende').val(zeitEnde);
			$('#datum-ende').val(datumEnde);
			$('#rate').val(hourlyRate);
		}
	});
	
	$("#ajax-contact-form").submit(function() {
		var str = $(this).serialize();
		
		$.ajax({
			type: "POST",
			url: "scripts/contact-process.php",
			data: str, 
			beforeSend: function(){
				$('#button-weg').val(' ');
				$('.load').removeClass('hide');
			},
			success: function(msg) {
    			
    			if(msg == 'OK'){
    				result = '<div class="notification_ok"><h3>Danke für Ihre Reservierung.</h3><h3> Sie erhalten umgehend eine Bestätigung.</h3></div>';
    				$("#fields").hide();
    			}else{
					$('.load').addClass('hide');
					$('#button-weg').val('Abschicken');
    				result = msg;
    			}
    			$('#note').html(result);
			}
		});
		return false;
	});
	
	var random = Math.floor(Math.random() * $('.comment-li').length);
	$(".comment-li").eq(random).addClass("active-slide");
	
	$('.zitat').click(function() {
		var currentSlide = $('.active-slide');
		var nextSlide = currentSlide.next();

		if(nextSlide.length === 0) {
			nextSlide = $('.comment-li').first();
		}

		currentSlide.fadeOut(600).removeClass('active-slide');
		nextSlide.fadeIn(600).addClass('active-slide');
    });
	
	$("#object-a-open-box").click(function(){
		$("#object-a-wenig-info").addClass("hide");
		$("#object-a-open-box").addClass("hide");
		$("#object-a-mehr-info").removeClass("hide");
		$("#object-a-close-box").removeClass("hide");
		$('.bxslider1').bxSlider({
			buildPager: function(slideIndex){
				switch(slideIndex){
				case 0:
				return '<img src="img/pic1t.jpg">';
				case 1:
				return '<img src="img/pic2t.jpg">';
				case 2:
				return '<img src="img/pic3t.jpg">';
				case 3:
				return '<img src="img/pic4t.jpg">';
				case 4:
				return '<img src="img/pic5t.jpg">';
				case 5:
				return '<img src="img/pic6t.jpg">';
				case 6:
				return '<img src="img/pic7t.jpg">';
				}
			}
		});
		var slider = $('.bxslider1').bxSlider({
			adaptiveHeight:true,
			useCSS: false
		});
		slider.reloadSlider();
	});

	$("#object-a-close-box").click(function(){
		$("#object-a-mehr-info").addClass("hide");
		$("#object-a-close-box").addClass("hide");
		$("#object-a-wenig-info").removeClass("hide");
		$("#object-a-open-box").removeClass("hide");
	});
	
	$("#object-b-open-box").click(function(){
	$("#object-b-wenig-info").addClass("hide");
	$("#object-b-open-box").addClass("hide");
	$("#object-b-mehr-info").removeClass("hide");
	$("#object-b-close-box").removeClass("hide");
	$('.bxslider2').bxSlider({
		buildPager: function(slideIndex){
			switch(slideIndex){
			case 0:
			return '<img src="img/pac1t.jpg">';
			case 1:
			return '<img src="img/pac2t.jpg">';
			case 2:
			return '<img src="img/pac3t.jpg">';
			case 3:
			return '<img src="img/pac4t.jpg">';
			case 4:
			return '<img src="img/pac5t.jpg">';
			case 5:
			return '<img src="img/pac6t.jpg">';
			}
		}
	});	
		$('.bxslider2').bxSlider({
			adaptiveHeight:true
		});
	});

	$("#object-b-close-box").click(function(){
		$("#object-b-mehr-info").addClass("hide");
		$("#object-b-close-box").addClass("hide");
		$("#object-b-wenig-info").removeClass("hide");
		$("#object-b-open-box").removeClass("hide");
	});
	
	$("#object-c-open-box").click(function(){
	$("#object-c-wenig-info").addClass("hide");
	$("#object-c-open-box").addClass("hide");
	$("#object-c-mehr-info").removeClass("hide");
	$("#object-c-close-box").removeClass("hide");
	});

	$("#object-c-close-box").click(function(){
		$("#object-c-mehr-info").addClass("hide");
		$("#object-c-close-box").addClass("hide");
		$("#object-c-wenig-info").removeClass("hide");
		$("#object-c-open-box").removeClass("hide");
	});
	
	$("#object-d-open-box").click(function(){
	$("#object-d-wenig-info").addClass("hide");
	$("#object-d-open-box").addClass("hide");
	$("#object-d-mehr-info").removeClass("hide");
	$("#object-d-close-box").removeClass("hide");
	});

	$("#object-d-close-box").click(function(){
		$("#object-d-mehr-info").addClass("hide");
		$("#object-d-close-box").addClass("hide");
		$("#object-d-wenig-info").removeClass("hide");
		$("#object-d-open-box").removeClass("hide");
	});
	
	$("#object-e-open-box").click(function(){
	$("#object-e-wenig-info").addClass("hide");
	$("#object-e-open-box").addClass("hide");
	$("#object-e-mehr-info").removeClass("hide");
	$("#object-e-close-box").removeClass("hide");
	});

	$("#object-e-close-box").click(function(){
		$("#object-e-mehr-info").addClass("hide");
		$("#object-e-close-box").addClass("hide");
		$("#object-e-wenig-info").removeClass("hide");
		$("#object-e-open-box").removeClass("hide");
	});
	
	$("#object-f-open-box").click(function(){
	$("#object-f-wenig-info").addClass("hide");
	$("#object-f-open-box").addClass("hide");
	$("#object-f-mehr-info").removeClass("hide");
	$("#object-f-close-box").removeClass("hide");
	});

	$("#object-f-close-box").click(function(){
		$("#object-f-mehr-info").addClass("hide");
		$("#object-f-close-box").addClass("hide");
		$("#object-f-wenig-info").removeClass("hide");
		$("#object-f-open-box").removeClass("hide");
	});
	
	$("#object-g-open-box").click(function(){
	$("#object-g-wenig-info").addClass("hide");
	$("#object-g-open-box").addClass("hide");
	$("#object-g-mehr-info").removeClass("hide");
	$("#object-g-close-box").removeClass("hide");
	});

	$("#object-g-close-box").click(function(){
		$("#object-g-mehr-info").addClass("hide");
		$("#object-g-close-box").addClass("hide");
		$("#object-g-wenig-info").removeClass("hide");
		$("#object-g-open-box").removeClass("hide");
	});
	
	$("#object-h-open-box").click(function(){
	$("#object-h-wenig-info").addClass("hide");
	$("#object-h-open-box").addClass("hide");
	$("#object-h-mehr-info").removeClass("hide");
	$("#object-h-close-box").removeClass("hide");
	});

	$("#object-h-close-box").click(function(){
		$("#object-h-mehr-info").addClass("hide");
		$("#object-h-close-box").addClass("hide");
		$("#object-h-wenig-info").removeClass("hide");
		$("#object-h-open-box").removeClass("hide");
	});
	
	$("#object-i-open-box").click(function(){
	$("#object-i-wenig-info").addClass("hide");
	$("#object-i-open-box").addClass("hide");
	$("#object-i-mehr-info").removeClass("hide");
	$("#object-i-close-box").removeClass("hide");
	});

	$("#object-i-close-box").click(function(){
		$("#object-i-mehr-info").addClass("hide");
		$("#object-i-close-box").addClass("hide");
		$("#object-i-wenig-info").removeClass("hide");
		$("#object-i-open-box").removeClass("hide");
	});
});