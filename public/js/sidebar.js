$(window).load(function() {

  $('.list-all').click( function() {

    $('#content').data('option','all');

    $.ajax({
        url     : "./reader/all/page/1",
        type    : "GET",
        contentType:"application/json; charset=utf-8",
        dataType: "html",
        success : function( data ) {
                    $('#content-list').html (data);
                    $('#content-list').data('page',1);
                    $('#content').scrollTop(0);
                  },
        error   : function(jqXHR, textStatus, errorThrown){
                    console.log(errorThrown);
                  }
    });
  });


  $('.list-category').click( function() {


    $('.oz-category-selected').removeClass('oz-category-selected');
    $(this).addClass('oz-category-selected');

    $('#content').data('option','category');

    $(this).children("i").toggleClass('glyphicon-chevron-down glyphicon-chevron-up');

    $.ajax({
        url     : "./reader/category/"+$(this).attr('data-category-id')+"/page/1",
        type    : "GET",
        contentType:"application/json; charset=utf-8",
        dataType: "html",
        success : function( data ) {
                    $('#content-list').html (data);
                    $('#content-list').data('page',1);
                    $('#content').scrollTop(0);
                  },
        error   : function(jqXHR, textStatus, errorThrown){
                    console.log(errorThrown);
                  }
    });

  });

  $('.list-tracker').click( function() {

    $('.oz-tracker-selected').removeClass('oz-tracker-selected');
    $(this).addClass('oz-tracker-selected');

    $('#content').data('option','tracker');

    $.ajax({
        url     : "./reader/tracker/"+$(this).attr('data-tracker-id')+"/page/1",
        type    : "GET",
        contentType:"application/json; charset=utf-8",
        dataType: "html",
        success : function( data ) {
                    $('#content-list').html (data);
                    $('#content-list').data('page',1);
                    $('#content').scrollTop(0);
                  },
        error   : function(jqXHR, textStatus, errorThrown){
                    console.log(errorThrown);
                  }
    });

  });

});
