$( "#content" ).scroll(function() {

  //console.log($(this).scrollTop()+' '+$(this).height()+' '+$(this).offsetTop);

      var wintop = $(this).scrollTop();
      docheight = $("#content-full").height();
      winheight = $(this).height();
      var  scrolltrigger = 0.95;

      console.log('wintop='+wintop);
      //console.log('docheight='+docheight);
      //console.log('winheight='+winheight);
      //console.log(wintop+'=='+(docheight-winheight));
      //console.log(wintop==(docheight-winheight));
      //console.log(docheight-winheight);
      console.log('%scrolled='+(wintop/(docheight-winheight))*100);

});
