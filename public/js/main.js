$(document).ready(function() {
  $('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
    $('#content').toggleClass('pull-right');
  });

  /*
  content_height=$('#main').height();
  console.log(content_height);
  $('#content-list').height(content_height);
  */
  console.log($(window).height());
});

$(window).resize(function() {

  if ($(this).width()<767) {
    $('#content').toggleClass('pull-right');
  }

  console.log($('#site-header').height());
  console.log($('#main').height());
  console.log($('.navbar').height());
});
