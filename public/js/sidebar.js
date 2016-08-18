$(window).load(function() {


  var dataString = '{';
  dataString=dataString + '"id":"0"';
  dataString=dataString + ',"page":"1"';
  dataString=dataString + '}';

  $('.list-all').click( function() {
    $.ajax({
        url     : "./reader/all",
        type    : "POST",
        data    : dataString,
        contentType:"application/json; charset=utf-8",
        dataType: "html",
        success : function( data ) {
                    $('#content-list').html (data);
                  },
        error   : function(jqXHR, textStatus, errorThrown){
                    console.log(errorThrown);
                  }
    });
  });


  $('.list-category').click( function() {

    $('.oz-feed-selected').removeClass('oz-feed-selected');
    $(this).addClass('oz-feed-selected');

    $('#content').removeClass('oz-byTracker');
    $('#content').addClass('oz-byCategory');

    $(this).children("i").toggleClass('glyphicon-chevron-down glyphicon-chevron-up');

    var dataString = '{"idCategory":"' + $(this).attr('data-category-id') +'"}';
    console.log (dataString);

    $.ajax({
        url     : "./getItemsbyCategory",
        type    : "POST",
        data    : dataString,
        contentType:"application/json; charset=utf-8",
        dataType: "html",
        success : function( data ) {
                    $('#content-list').html (data);
                  },
        error   : function(jqXHR, textStatus, errorThrown){
                    console.log(errorThrown);
                  }
    });

  });

    $('.list-tracker').click( function() {

      $('.oz-feed-selected').removeClass('oz-feed-selected');
      $(this).addClass('oz-feed-selected');

      $('#content').removeClass('oz-byCategory');
      $('#content').addClass('oz-byTracker');

      var dataString = '{';
      dataString=dataString + '"idTracker":"' + $(this).attr('data-tracker-id')+'"';
      dataString=dataString + ',"page":"1"';
      dataString=dataString + '}';
      console.log (dataString);

      $.ajax({
          url     : "./getItemsbyTracker",
          type    : "POST",
          data    : dataString,
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

});
