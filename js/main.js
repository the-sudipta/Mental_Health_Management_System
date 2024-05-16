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



 document.addEventListener("DOMContentLoaded", function () {
     // Fetch modal content from progresstrackingmodal.html
     fetch('progresstrackingmodal.html')
         .then(response => response.text())
         .then(data => {
             // Inject modal content into the modalContainer div
             document.getElementById('modalContainer').innerHTML = data;
         })
         .catch(error => console.error(error));
 });
 // JavaScript to toggle visibility of details
 document.addEventListener('DOMContentLoaded', function () {
     const toggleLinks = document.querySelectorAll('.toggle-details');

     toggleLinks.forEach(function (link) {
         link.addEventListener('click', function (event) {
             event.preventDefault(); // Prevent default link behavior
             const details = this.nextElementSibling; // Get the next sibling div
             details.style.display = (details.style.display === 'none' || details.style.display === '') ? 'block' : 'none'; // Toggle display
         });
     });
 });
