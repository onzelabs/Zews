<?php
$app->get('/reader', function ($request, $response, $args) {
  $sidebar=new sidebar();
  return $this->view->render($response, 'reader\reader.twig',$sidebar->data);
});

/* Sidebar */

$app->post('/getItemsbyCategory', function ($request, $response, $args) {
  $body=$request->getParsedBody();
  $uri=$request->getUri();
  $content=new content($uri->getPath(),$body['idCategory'],1);

  return $this->view->render($response, 'reader\content.twig',$content->data);
});

$app->post('/getItemsbyTracker', function ($request, $response, $args) {
  $body=$request->getParsedBody();
  $uri=$request->getUri();
  $content=new content($uri->getPath(),$body['idTracker'],1);

  return $this->view->render($response, 'reader\content.twig',$content->data);
});

/* Content */

$app->post('/getItemDetail', function ($request, $response, $args) {
  $data=$request->getParsedBody();

  //$data['idItem'];
});

//gotoPage
