$( "#content" ).scroll(function() {
//$( window ).scroll(function() {

      scrolltop = $(this).scrollTop();
      docheight = $("#content-list").height(); 
      divheight = $(this).height();

      console.log('ST:'+scrolltop);
      console.log('DH:'+docheight);
      console.log('DiH:'+divheight);
      console.log('Diff:'+(docheight-divheight));

      if ( (scrolltop/(docheight-divheight))>0.95 && $('#content').data('loading')=='off') {

        $('#content').data('loading','on');
        $('#content-list').append('<div class="oz-loading"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></div>');


        /*
        if ($(this).hasClass("oz-byCategory")) {
          url="./getItemsbyCategory";
          var dataString = '{"idCategory":"' + $(this).attr('data-category-id') +'"}';
        } else {
          url="./getItemsbyTracker";
          page=$('#content-list').data('page')+1;
          var dataString = '{';
          dataString=dataString + '"idTracker":"' + $('.oz-feed-selected').attr('data-tracker-id')+'"';
          dataString=dataString + ',"page":"'+page+'"';
          dataString=dataString + '}';
        }
        */
        page=$('#content').data('page')+1;
        switch ($('#content').data('option')) {
          case 'all':
            dataString = '{';
            dataString=dataString + '"id":"0"';
            dataString=dataString + ',"page":"'+page+'"';
            dataString=dataString + '}';
            url='./reader/all';
            break;
          default:

        }

        $.ajax({
            url     : url,
            type    : "POST",
            data    : dataString,
            contentType:"application/json; charset=utf-8",
            dataType: "html",
            success : function( data ) {
                        $('#content-list').append (data);
                        $('#content').data('loading','off');
                        $('.oz-loading').remove();
                        if (data!='') {
                          $('#content').data('page',page);
                          console.log('PAGE:'+page);
                        }
                      },
            error   : function(jqXHR, textStatus, errorThrown){
                        console.log(errorThrown);
                      }
        });
      }
});
