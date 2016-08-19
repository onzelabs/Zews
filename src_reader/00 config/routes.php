<?php

/* Root */

$app->get('/reader', function ($request, $response, $args) {
  $sidebar=new sidebar();
  return $this->view->render($response, 'reader\reader.twig',$sidebar->data);
});

/* Sidebar */

$app->post('/reader/all', function ($request, $response, $args) {
  $body=$request->getParsedBody();
  $uri=$request->getUri();
  $content=new content('all',$body['id'],$body['page']);

  return $this->view->render($response, 'reader\content.twig',$content->getData());
});

$app->post('/reader/category/{id}', function ($request, $response, $args) {
  $body=$request->getParsedBody();
  $uri=$request->getUri();

  $content=new content('category',$body['id'],$body['page']);
  return $this->view->render($response, 'reader\content.twig',$content->getData());
});


$app->post('/reader/tracker/{id}', function ($request, $response, $args) {
  $body=$request->getParsedBody();
  $uri=$request->getUri();

  $content=new content('tracker',$body['id'],$body['page']);
  return $this->view->render($response, 'reader\content.twig',$content->getData());
});


$app->get('/reader/tracker/{id}/page/{page}', function ($request, $response, $args) {
  $body=$request->getParsedBody();
  $uri=$request->getUri();

  $content=new content('tracker',$args['id'],$args['page']);
  return $this->view->render($response, 'reader\content.twig',$content->getData());
});
/* Content */

$app->post('/getItemDetail', function ($request, $response, $args) {
  $data=$request->getParsedBody();

  //$data['idItem'];
});

//gotoPage
