// $(document).ready(function() {
//     $('.icon').on('click', function() {
//         var x = document.getElementById('navitesti');
//         if (x.className === 'navigation') {
//             x.className += ' responsive';
//         } else {
//             x.className = 'navigation';
//         }
//     });

//     $('#reservierung').submit(function(event) {
//         event.preventDefault(); // Prevent the form from submitting via the browser
//     });

//     $('select').selectBox({
//         mobile: true,
//         menuSpeed: 'fast',
//         menuTransition: 'slide'
//     });

//     // initialize datepair
//     $('#e .time').timepicker({
//         showDuration: true,
//         timeFormat: 'H:i',
//         orientation: 'tr',
//         appendTo: function($eel) {
//             return $eel.parent();
//         }
//     });

//     $('#e .date').datepicker({
//         format: 'd/m/yyyy',
//         autoclose: true,
//         language: 'de-DE',
//         container: '#testi'
//     });

//     $('#button').click(function() {
//         var milliseconds = $('#e').datepair('getTimeDiff');
//         var datumBeginn = $('#date-start').val();
//         var datumEnde = $('#date-end').val();
//         var zeitBeginn = $('#time-start').val();
//         var zeitEnde = $('#time-end').val();
//         var minutes = milliseconds / 1000 / 60;
//         var hours = Math.ceil(minutes / 60);
//         var days = Math.ceil(hours / 24);
//         var weeks = Math.ceil(days / 7);

//         var value = $.trim($('#date-start').val());

//         var selectedText = $('.selectBox-label').text();
//         var hourlyRate = parseFloat($('select').val(), 10).toFixed(2);
//         var price = (Math.round((hours * hourlyRate + 0.00001) * 100) / 100).toFixed(2);
//         var pricePerDay = days * hourlyRate;

//         if (isNaN(price)) {
//             $('#feld-leer').removeClass('hide');
//         } else if (price < 0) {
//             $('#vergangenheit').removeClass('hide');
//         } else {
//             $('#reservierung').addClass('hide');
//             $('.kauf-info').removeClass('hide');
//             $('#ajax-contact-form').removeClass('hide');
//             $('#back-button').click(function() {
//                 location.reload(true);
//             });
//             if (
//                 (hours == 1) &
//                 !(selectedText == 'Palettenhubwagen' || selectedText == 'Schmutzwasserpumpe')
//             ) {
//                 $('#leihdauer').html(hours + ' Stunde');
//                 $('#kosten').html(hourlyRate + '€');
//                 $('#bepreisung').val(hourlyRate);
//             } else if (hours == 24) {
//                 $('#leihdauer').html(days + ' Tag');
//                 $('#kosten').html(hourlyRate + '€');
//                 $('#bepreisung').val(hourlyRate);
//             } else if ((selectedText == 'Übersiedlungsservice') & (hours > 1)) {
//                 $('#leihdauer').html(hours + ' Stunden');
//                 $('#kosten').html(price + '€');
//                 $('#bepreisung').val(hourlyRate);
//             } else if ((selectedText == 'Palettenhubwagen') & (hours <= 4)) {
//                 $('#leihdauer').html('4 Stunden');
//                 $('#kosten').html(8 + '€');
//                 $('#bepreisung').val(8);
//             } else if ((selectedText == 'Schmutzwasserpumpe') & (hours <= 4)) {
//                 $('#leihdauer').html('4 Stunden');
//                 $('#kosten').html(10 + '€');
//                 $('#bepreisung').val(10);
//             } else if ((selectedText == 'Palettenhubwagen') & (weeks == 1)) {
//                 $('#leihdauer').html('1 Woche');
//                 $('#kosten').html(30 + '€');
//                 $('#bepreisung').val(30);
//             } else if ((selectedText == 'Schmutzwasserpumpe') & (weeks == 1)) {
//                 $('#leihdauer').html('1 Woche');
//                 $('#kosten').html(32 + '€');
//                 $('#bepreisung').val(32);
//             } else if ((selectedText == 'Palettenhubwagen') & (weeks > 1)) {
//                 $('#leihdauer').html(weeks + ' Wochen');
//                 $('#kosten').html(30 * weeks + '€');
//                 $('#bepreisung').val(30);
//             } else if ((selectedText == 'Schmutzwasserpumpe') & (weeks > 1)) {
//                 $('#leihdauer').html(weeks + ' Wochen');
//                 $('#kosten').html(32 * weeks + '€');
//                 $('#bepreisung').val(32);
//             } else {
//                 $('#leihdauer').html(days + ' Tage');
//                 $('#kosten').html(pricePerDay + '€');
//                 $('#bepreisung').val(pricePerDay);
//             }
//             $('.objekt').html(selectedText);
//             $('#objekt').val(selectedText);
//             $('#zeit-beginn').val(zeitBeginn);
//             $('#datum-beginn').val(datumBeginn);
//             $('#zeit-ende').val(zeitEnde);
//             $('#datum-ende').val(datumEnde);
//             $('#rate').val(hourlyRate);
//         }
//     });

//     $('#ajax-contact-form').submit(function() {
//         var str = $(this).serialize();

//         $.ajax({
//             type: 'POST',
//             url: 'scripts/contact-process.php',
//             data: str,
//             beforeSend: function() {
//                 $('#button-weg').val(' ');
//                 $('.load').removeClass('hide');
//             },
//             success: function(msg) {
//                 if (msg == 'OK') {
//                     result =
//                         '<div class="notification_ok"><h3>Danke für Ihre Reservierung.</h3><h3> Sie erhalten umgehend eine Bestätigung.</h3></div>';
//                     $('#fields').hide();
//                 } else {
//                     $('.load').addClass('hide');
//                     $('#button-weg').val('Abschicken');
//                     result = msg;
//                 }
//                 $('#note').html(result);
//             }
//         });
//         return false;
//     });

//     //settings for slider
//     var animationSpeed = 1000;
//     var pause = 3000;

//     //cache DOM elements
//     var $slider = $('.zitat');
//     var interval;
//     var random = Math.floor(Math.random() * $('.comment').length);

//     $('.comment')
//         .eq(random)
//         .addClass('active-slide');

//     function startSlider() {
//         interval = setInterval(function() {
//             $slider.animate(animationSpeed, function() {
//                 var currentSlide = $('.active-slide');
//                 var nextSlide = currentSlide.next();

//                 if (nextSlide.length === 0) {
//                     nextSlide = $('.comment').first();
//                 }

//                 currentSlide.removeClass('active-slide');
//                 nextSlide.addClass('active-slide');
//             });
//         }, pause);
//     }
//     function pauseSlider() {
//         clearInterval(interval);
//     }

//     $slider.on('mouseenter', pauseSlider).on('mouseleave', startSlider);

//     startSlider();

//     $('.open-box').click(function() {
//         $(this)
//             .parent()
//             .find('.mehr-info')
//             .removeClass('hide');
//         $(this)
//             .parent()
//             .find('.wenig-info')
//             .addClass('hide');
//         $(this).addClass('hide');
//         $(this)
//             .parent()
//             .find('.close-box')
//             .removeClass('hide');
//     });
//     $('.close-box').click(function() {
//         $(this)
//             .parent()
//             .find('.mehr-info')
//             .addClass('hide');
//         $(this)
//             .parent()
//             .find('.wenig-info')
//             .removeClass('hide');
//         $(this).addClass('hide');
//         $(this)
//             .parent()
//             .find('.open-box')
//             .removeClass('hide');
//     });
// });
