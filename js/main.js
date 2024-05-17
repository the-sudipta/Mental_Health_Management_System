 $(document).ready(function () {
     $('.appointment').click(function (event) {
         var details = $(this).find('.appointment-details');
         var shortDetails = $(this).find('.appointment-short-details');
         var angleDown = $(this).find('.fa-angle-down');
         if (!$(event.target).closest('.appointment-details').length) {
             details.toggleClass('active');
             shortDetails.toggleClass('appointment-short-details-active');
             angleDown.toggleClass('active');
             angleDown.toggleClass('rotate', details.hasClass('active'));
         }
     });
 });


 $(document).ready(function () {
     $("#sidebarToggler").click(function () {
         $(".sidebar-part").toggleClass("show-sidebar");
     });
 });
 $(document).ready(function ($) {
     function animateElements() {
         $('.progressbar').each(function () {
             var elementPos = $(this).offset().top;
             var topOfWindow = $(window).scrollTop();
             var percent = $(this).find('.circle').attr('data-percent');
             var animate = $(this).data('animate');
             if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
                 $(this).data('animate', true);
                 $(this).find('.circle').circleProgress({
                     // startAngle: -Math.PI / 2,
                     value: percent / 100,
                     size: 400,
                     thickness: 15,
                     fill: {
                         color: '#3977eb'
                     }
                 }).stop();
             }
         });
     }

     animateElements();
     $(window).scroll(animateElements);
 });



