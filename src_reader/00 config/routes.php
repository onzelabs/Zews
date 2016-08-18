<?php

/* Root */

$app->get('/reader', function ($request, $response, $args) {
  $sidebar=new sidebar();
  return $this->view->render($response, 'reader\reader.twig',$sidebar->data);
});

$app->get('/reader3', function ($request, $response, $args) {
  $sidebar=new sidebar();
  return $this->view->render($response, 'reader\reader3.twig',$sidebar->data);
});


/* Sidebar */

$app->post('/reader/all', function ($request, $response, $args) {
  $body=$request->getParsedBody();
  $uri=$request->getUri();
  $content=new content($uri->getPath(),$body['id'],$body['page']);

  return $this->view->render($response, 'reader\content.twig',$content->getData());
});

$app->post('/reader/category/{id}', function ($request, $response, $args) {
  $data=$request->getParsedBody();

  //$data['idItem'];
});

$app->post('/reader/tracker/{id}', function ($request, $response, $args) {
  $data=$request->getParsedBody();

  //$data['idItem'];
});


$app->post('/getItemsbyCategory', function ($request, $response, $args) {
  $body=$request->getParsedBody();
  $uri=$request->getUri();
  $content=new content($uri->getPath(),$body['idCategory'],1);

  return $this->view->render($response, 'reader\content.twig',$content->data);
});

$app->post('/getItemsbyTracker', function ($request, $response, $args) {
  $body=$request->getParsedBody();
  $uri=$request->getUri();
  $content=new content($uri->getPath(),$body['idTracker'],$body['page']);

  return $this->view->render($response, 'reader\content.twig',$content->data);
});

/* Content */

$app->post('/getItemDetail', function ($request, $response, $args) {
  $data=$request->getParsedBody();

  //$data['idItem'];
});

//gotoPage
