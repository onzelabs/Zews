<?php
/**
 Based on http://www.kavoir.com/2011/10/php-crontab-class-to-add-and-remove-cron-jobs.html.
 Adapted to write crontab.txt file
*/


class crontab {

    // In this class, array instead of string would be the standard input / output format.

    // Legacy way to add a job:
    // $output = shell_exec('(crontab -l; echo "'.$job.'") | crontab -');

    //const DIR="C:/Temp/";
    const CRONFILE="crontab.txt";

    private $cron_dir;
    private $dir;
    private $cronfile;
    private $semaphore;

    public function __construct() {
      $this->dir="C:/Temp/";
      $this->cron_dir="C:/cygwin/bin/";
      $this->cronfile="cron-".date_create()->format('YmdHis').".txt";
    }

    private function stringToArray($jobs = '') {
        //$array = explode("\r\n", trim($jobs)); // trim() gets rid of the last \r\n
        $array = explode("\n", trim($jobs)); // trim() gets rid of the last \n
        foreach ($array as $key => $item) {
            if ($item == '') {
                unset($array[$key]);
            }
        }
        return $array;
    }

    private function saveCronFile($jobs = array()) {
        $string = implode("\r\n", $jobs)."\r\n";
        print_r ($string);
        file_put_contents ($this->dir.$this->cronfile,$string);
    }

    public function getJobs() {
        $output = shell_exec($this->cron_dir.'crontab.exe -l');
        $lines=$this->stringToArray($output);
        $jobs=array();
        // Exclude comment lines
        foreach ($lines as $line) {
          if ($line[0]!='#') {
            $jobs[]=$line;
          }
        }
        return $jobs;
    }

    public function saveJobs($jobs = array()) {
        $this->saveCronFile($jobs);
        shell_exec ($this->cron_dir.'crontab.exe '.$this->dir.$this->cronfile);
    }

    public function doesJobExist($job = '') {
        $jobs = $this->getJobs();
        if (in_array($job, $jobs)) {
            return true;
        } else {
            return false;
        }
    }

    public function addJob($job = '') {
        if ($this->doesJobExist($job)) {
            return false;
        } else {
            $jobs = $this->getJobs();
            $jobs[] = $job;
            return $this->saveJobs($jobs);
        }
    }

    public function removeJob($job = '') {
        if ($this->doesJobExist($job)) {
            $jobs = $this->getJobs();
            unset($jobs[array_search($job, $jobs)]);
            return $this->saveJobs($jobs);
        } else {
            return false;
        }
    }

}

?>
