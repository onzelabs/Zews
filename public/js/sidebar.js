$(window).load(function() {

  $('.list-category').click( function() {

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
                    $('#content').html (data);
                  },
        error   : function(jqXHR, textStatus, errorThrown){
                    console.log(errorThrown);
                  }
    });

  });

    $('.list-tracker').click( function() {

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
                      $('#content').html (data);
                    },
          error   : function(jqXHR, textStatus, errorThrown){
                      console.log(errorThrown);
                    }
      });

    });

});
