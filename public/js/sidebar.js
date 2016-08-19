$(window).load(function() {


  var dataString = '{';
  dataString=dataString + '"id":"0"';
  dataString=dataString + ',"page":"1"';
  dataString=dataString + '}';

  $('.list-all').click( function() {

    $('#content').data('option','all');

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


    $('.oz-category-selected').removeClass('oz-category-selected');
    $(this).addClass('oz-category-selected');

    /*
    $('#content').removeClass('oz-byTracker');
    $('#content').addClass('oz-byCategory');
    */

    $('#content').data('option','category');

    $(this).children("i").toggleClass('glyphicon-chevron-down glyphicon-chevron-up');

    var dataString = '{';
    dataString=dataString + '"id":"' + $(this).attr('data-category-id')+'"';
    dataString=dataString + ',"page":"1"';
    dataString=dataString + '}';
    console.log (dataString);

    $.ajax({
        url     : "./reader/category/"+$(this).attr('data-category-id'),
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


    $('.oz-tracker-selected').removeClass('oz-tracker-selected');
    $(this).addClass('oz-tracker-selected');

    /*
    $('#content').removeClass('oz-byCategory');
    $('#content').addClass('oz-byTracker');
    */

    $('#content').data('option','tracker');

    var dataString = '{';
    dataString=dataString + '"id":"' + $(this).attr('data-tracker-id')+'"';
    dataString=dataString + ',"page":"1"';
    dataString=dataString + '}';
    console.log (dataString);

    $.ajax({
        /*
        url     : "./reader/tracker/"+$(this).attr('data-tracker-id')+"/page/1",
        type    : "GET",
        */
        url     : "./reader/tracker/"+$(this).attr('data-tracker-id'),
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
