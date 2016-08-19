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

        page=$('#content').data('page')+1;
        switch ($('#content').data('option')) {
          case 'all':
            dataString = '{';
            dataString=dataString + '"id":"0"';
            dataString=dataString + ',"page":"'+page+'"';
            dataString=dataString + '}';
            url='./reader/all';
            break;
          case 'category':
            dataString = '{';
            dataString=dataString + '"id":"' + $('.oz-category-selected').attr('data-tracker-id')+'"';
            dataString=dataString + ',"page":"'+page+'"';
            dataString=dataString + '}';
            url="./reader/category/"+$('.oz-category-selected').attr('data-category-id-id');
            break;
          case 'tracker':
            dataString = '{';
            dataString=dataString + '"id":"' + $('.oz-tracker-selected').attr('data-tracker-id')+'"';
            dataString=dataString + ',"page":"'+page+'"';
            dataString=dataString + '}';
            url="./reader/tracker/"+$('.oz-tracker-selected').attr('data-tracker-id');
            break;
          default:
            break;

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
