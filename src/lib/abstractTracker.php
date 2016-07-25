<?php

abstract class abstractTracker extends baseDO {
    protected $id;
    protected $name;
    protected $url;
    protected $type;
    protected $state;
    protected $pid;
    protected $start_at;
    protected $last_listen;
    protected $active;
    protected $event;
    protected $created_at;
    protected $updated_at;
    // Not in model
    protected $logger;
    protected $ends_at;
    protected $stopped;

    public function __construct() {
      $this->state=0;
      $this->logger=new logger();
      $this->stopped=false;
      $this->configuration = parse_ini_file('/config/config.ini',1);
    }

    public function run() {

        switch ($this->state) {
          case 0:
            $this->start_at=date('Y-m-d H:i:s');
            $this->pid=getmypid();
            $this->changeState(0,1);
            //addJobTracker
            $script='php "'.$this->configuration['cron']['execRunTracker'].'" '.$this->id;
            $log=str_replace(' ', '', $this->name).".txt";
            $crontab=new crontab();
            $crontab->addJob($this->event." ".$script." >> ".$this->configuration['cron']['log_path'].$log." 2>&1");
            break;
          case 1:
          case 2:
          case 3:
          case 4:
            $this->stopped=true;
            break;
          case 5:
            if (!$this->stopped) {
              $this->changeState(5,1);
            }
            break;
          default:
            break;
        }
        if (!$this->stopped) {
          $this->changeState(1,2);
        }
        if (!$this->stopped) {
          $this->changeState(2,3);
        }
        if (!$this->stopped) {
          $this->changeState(3,4);
        }
        if (!$this->stopped) {
          $this->changeState(4,5);
        }

    }

    public function stop() {
      $this->changeState ($this->state,0);
    }

    abstract protected function load_items ();

    abstract protected function verify_items ();

    abstract protected function analize_items ();

    abstract protected function save_items ();

    private function changeState ($from,$to){
      //echo ORM::get_db()->beginTransaction();
      switch ($to) {
        case 0: //NOT STARTED
          $this->state=0;
          $this->pid=0;
          $this->ends_at=date('Y-m-d H:i:s');
          $this->stopped=true;
          $this->last_listen='0000-00-00 00:00:00';
          $this->start_at='0000-00-00 00:00:00';
          $this->logger->set_message('STOPPED');
          //removeJobTracker
          $script='php "'.$this->configuration['cron']['execRunTracker'].'" '.$this->id;
          $log=str_replace(' ', '', $this->name).".txt";
          $crontab=new crontab();
          $crontab->removeJob($this->event." ".$script." >> ".$this->configuration['cron']['log_path'].$log." 2>&1");
          break;
        case 1: //LOADING
          $this->last_listen='0000-00-00 00:00:00';
          $items_loaded=$this->load_items();
          $this->logger->set_loaded($items_loaded);
          break;
        case 2: //VERIFIYING
          $items_verified=$this->verify_items();
          $this->logger->set_verified($items_verified['verified']);
          $this->logger->set_duplicated($items_verified['duplicated']);
          break;
        case 3: // ANALIZING
          $items_analized=$this->analize_items();
          $this->logger->set_analized($items_analized);
          break;
        case 4: // SAVING
          $items_saved=$this->save_items();
          $this->logger->set_saved($items_saved);
          break;
        case 5: // WAITING
          $this->pid=0;
          $this->ends_at=date('Y-m-d H:i:s');
          $this->logger->set_message('END OK');
          break;
        case 99: // ERROR
          break;
        default:
          break;
      }
      $this->state=$to;
      $this->update();
      $this->save_logger();

      if (!$this->stopped) {
        $this->listen();
      }
      //ORM::get_db()->commit();
      //echo "Commit!";
    }

    private function update() {
        $rss_ReaderMapper=new Rss_ReaderMapper();
        $rss_ReaderMapper->update($this);
    }

    private function save_logger () {
        $this->logger->set_tracker_ix($this->id);
        $this->logger->set_state($this->state);
        $this->logger->set_pid($this->pid);
        $this->logger->set_created_at(date('Y-m-d H:i:s'));
        $this->logger->set_updated_at($this->ends_at);
        $this->logger->save();
    }

    private function process_message($message) {
        $exit=false;
        switch ($message->get_message()) {
          case 'STOP':
            switch ($this->state) {
              case 2:
                $message->set_is_read(1);
                $tracker_messageMapper=new tracker_messageMapper();
                $tracker_messageMapper->update($message);
                $this->stop();
                $exit=true;
                break;
              default:
                break;
            }
            break;
          default:
            break;
        }
        return $exit;
    }

    private function listen() {

        $sql  = 'SELECT id, tracker_ix, message, is_read, created_at, updated_at FROM tracker_message WHERE tracker_ix='.$this->id;
        $sql .= ' AND message="STOP"';
        $sql .= ' AND is_read=0';
        /*
        if ($this->last_listen==='0000-00-00 00:00:00') {
          $sql .= ' AND created_at>=STR_TO_DATE("'.$this->start_at.'", "%Y-%m-%d %H:%i:%s")';
        } else {
          $sql .= ' AND created_at>=STR_TO_DATE("'.$this->last_listen.'", "%Y-%m-%d %H:%i:%s")';
        }
        */
        $sql .= ' AND created_at>=STR_TO_DATE("'.$this->start_at.'", "%Y-%m-%d %H:%i:%s")';
        $sql .= ' ORDER BY created_at';

        $tracker_messageMapper=new tracker_messageMapper();
        $tracker_messages=$tracker_messageMapper->get_by_query($sql);

        $total_messages=sizeof($tracker_messages);
        if ($total_messages>0) {
          if ($total_messages===1) {
              print_r($tracker_messages);
              $exit=$this->process_message($tracker_messages);
          } else {
            $exit=false;
            $position=0;
            do {
              $message=$tracker_messages[$position];
              $exit=$this->process_message($message);
              $position +=1;
            } while ($position<$total_messages && !$exit);
          }
        }

        $this->last_listen=date('Y-m-d H:i:s');
        $this->update();
        //sleep (5);
    }

    /* Overwrite 'get_properties' to unset propierties that are not in the model, but are in the domain object for bussiness */

    public function get_properties () {
        $class_vars=get_class_vars(get_class($this));
        unset($class_vars["logger"]);
        unset($class_vars["ends_at"]);
        unset($class_vars["stopped"]);
        return $class_vars;
    }

    /* Getters & Setters */

    public function get_id(){
        return $this->id;
    }

    public function set_id($id){
        $this->id = $id;
    }

    public function get_name(){
        return $this->name;
    }

    public function set_name($name){
        $this->name = $name;
    }

    public function get_url(){
        return $this->url;
    }

    public function set_url($url){
        $this->url = $url;
    }

    public function get_type(){
        return $this->type;
    }

    public function set_type($type){
        $this->type = $type;
    }

    public function get_state(){
        return $this->state;
    }

    public function set_state($state){
        $this->state = $state;
    }

    public function get_pid(){
        return $this->pid;
    }

    public function set_pid($pid){
        $this->pid = $pid;
    }

    public function get_start_at(){
        return $this->start_at;
    }

    public function set_start_at($start_at){
        $this->start_at = $start_at;
    }

    public function get_last_listen(){
        return $this->last_listen;
    }

    public function set_last_listen($last_listen){
        $this->last_listen = $last_listen;
    }

    public function get_active(){
        return $this->active;
    }

    public function set_active($active){
        $this->active = $active;
    }

    public function get_event(){
        return $this->event;
    }

    public function set_event($event){
        $this->event = $event;
    }

    public function get_created_at(){
        return $this->created_at;
    }

    public function set_created_at($created_at){
        $this->created_at = $created_at;
    }

    public function get_updated_at(){
        return $this->updated_at;
    }

    public function set_updated_at($updated_at){
        $this->updated_at = $updated_at;
    }

}


?>
