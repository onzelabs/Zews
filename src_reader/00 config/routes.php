<?php
$app->get('/reader', function ($request, $response, $args) {
  $sidebar=new sidebar();
  return $this->view->render($response, 'reader\reader.twig',$sidebar->data);
});

/* Sidebar */

$app->post('/getItemsbyCategory', function ($request, $response, $args) {
  $data=$request->getParsedBody();

  return $data['idCategory'];
});

$app->post('/getItemsbyTracker', function ($request, $response, $args) {
  $data=$request->getParsedBody();

  return $data['idTracker'];
});

/* Content */

$app->post('/getItemDetail', function ($request, $response, $args) {
  $data=$request->getParsedBody();

  //$data['idItem'];
});

//gotoPage
