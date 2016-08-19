$(document).ready(function() {

  /* offcanvas */
  $('[data-toggle="offcanvas"]').click(function () {
    $('.row-offcanvas').toggleClass('active')
  });

  $('#content').height($(window).height()-$('.navbar').outerHeight(true));

});

$(window).resize(function() {
  $('#content').height($(window).height()-$('.navbar').outerHeight(true));
});
