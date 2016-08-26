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
            url='./reader/all/page/'+page;
            break;
          case 'category':
            url="./reader/category/"+$('.oz-category-selected').attr('data-category-id-id')+"/page/"+page;;
            break;
          case 'tracker':
            url="./reader/tracker/"+$('.oz-tracker-selected').attr('data-tracker-id')+"/page/"+page;
            break;
          default:
            break;

        }

        $.ajax({
            url     : url,
            type    : "GET",
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
