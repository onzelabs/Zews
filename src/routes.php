<?php
// Routes

$app->get('/hello/{name}', function ($request, $response, $args) {
    return $this->view->render($response, 'hello.twig', [
        'name' => $args['name']
    ]);
});

$app->get('/planner', function ($request, $response, $args) {

    $trackerMapper=new trackerMapper();
    $trackers=$trackerMapper->get_all();

    $data['trackers']=array();

    foreach ($trackers as $tracker) {
      $tracker_array=$tracker->get_values();
      switch ($tracker_array['state']) {
          case 0:
              $tracker_array['state']='Not Started';
              $tracker_array['label_state']='label-notstarted';
              $tracker_array['btn_run_disabled']='';
              $tracker_array['btn_stop_disabled']='disabled';
              break;
          case 1:
              $tracker_array['state']='Loading';
              $tracker_array['label_state']='label-loading';
              $tracker_array['btn_run_disabled']='disabled';
              $tracker_array['btn_stop_disabled']='';
              break;
          case 2:
              $tracker_array['state']='Verifiying';
              $tracker_array['label_state']='label-verifiying';
              $tracker_array['btn_run_disabled']='disabled';
              $tracker_array['btn_stop_disabled']='';
              break;
          case 3:
              $tracker_array['state']='Analizing';
              $tracker_array['label_state']='label-analizing';
              $tracker_array['btn_run_disabled']='disabled';
              $tracker_array['btn_stop_disabled']='';
              break;
          case 4:
              $tracker_array['state']='Saving';
              $tracker_array['label_state']='label-saving';
              $tracker_array['btn_run_disabled']='disabled';
              $tracker_array['btn_stop_disabled']='';
              break;
          case 5:
              $tracker_array['state']='Waiting';
              $tracker_array['label_state']='label-waiting';
              $tracker_array['btn_run_disabled']='disabled';
              $tracker_array['btn_stop_disabled']='';
              break;
          case 99:
              $tracker_array['state']='Error';
              $tracker_array['label_state']='label-error';
              $tracker_array['btn_run_disabled']='disabled';
              $tracker_array['btn_stop_disabled']='disabled';
              break;
      }
      array_push($data['trackers'], $tracker_array);
    }

    //print_r($data);

    return $this->view->render($response, 'planner.twig', $data);
});
