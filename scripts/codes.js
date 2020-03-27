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

document.addEventListener('DOMContentLoaded', () => {
  const sideNavsDom = document.querySelectorAll('.sidenav');
  M.Sidenav.init(sideNavsDom, { edge: 'right' });
});
