<?php
$app->get('/list', function ($request, $response, $args) {
  return $this->view->render($response, 'reader\list.twig',[]);
});
