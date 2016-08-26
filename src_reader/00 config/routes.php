<?php

/* Root */

$app->get('/reader', function ($request, $response, $args) {

  $sidebar=new sidebar();
  return $this->view->render($response, 'reader\reader.twig',$sidebar->data);

});

/* Sidebar */

$app->get('/reader/all/page/{page}', function ($request, $response, $args) {
  $content=new content('all',0,$args['page']);
  return $this->view->render($response, 'reader\content.twig',$content->getData());
});

$app->get('/reader/category/{id}/page/{page}', function ($request, $response, $args) {
  $content=new content('category',$args['id'],$args['page']);
  return $this->view->render($response, 'reader\content.twig',$content->getData());
});

$app->get('/reader/tracker/{id}/page/{page}', function ($request, $response, $args) {
  $content=new content('tracker',$args['id'],$args['page']);
  return $this->view->render($response, 'reader\content.twig',$content->getData());
});

/* Content */

$app->post('/getItemDetail', function ($request, $response, $args) {
  $data=$request->getParsedBody();

  //$data['idItem'];
});

//gotoPage
