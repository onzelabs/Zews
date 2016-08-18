$(document).ready(function() {

  $('[data-toggle=offcanvas]').click(function() {
    $('.oz-sidebar').toggleClass('active');
    $('#content').toggleClass('pull-right');
  });

  $('#content').height($(window).height()-$('.navbar').height()-1);

  /*
  content_height=$('#main').height();
  console.log(content_height);
  $('#content-list').height(content_height);
  */
  console.log($('.navbar').height());
  console.log($(window).height());
  console.log($(window).height()-$('.navbar').height());
  console.log($('#content').height());
});

$(window).resize(function() {

  if ($(this).width()<767) {

  }

  console.log($('.navbar').height());
  console.log($(window).height());
  console.log($(window).height()-$('.navbar').height());
  $('#content').height($(window).height()-$('.navbar').height()-1);
});
