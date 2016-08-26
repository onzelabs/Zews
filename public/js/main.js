$(document).ready(function() {

  /* offcanvas */
  $('[data-toggle="offcanvas"]').click(function () {
    $('.row-offcanvas').toggleClass('active')
  });

  $('#content').height($(window).height()-$('.navbar').outerHeight(true));
  $('#sidebar').height($(window).height()-$('.navbar').outerHeight(true));


  $('#content').data('option','all');

  $.ajax({
      url     : "./reader/all/page/1",
      type    : "GET",
      contentType:"application/json; charset=utf-8",
      dataType: "html",
      success : function( data ) {
                  $('#content-list').html (data);
                  $('#content-list').data('page',1);
                },
      error   : function(jqXHR, textStatus, errorThrown){
                  console.log(errorThrown);
                }
  });

});

$(window).resize(function() {
  $('#content').height($(window).height()-$('.navbar').outerHeight(true));
  $('#sidebar').height($(window).height()-$('.navbar').outerHeight(true));
});
