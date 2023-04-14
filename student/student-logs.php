<?php 
   function logger($log){
    if(!file_exists('studet_logs.txt')){
  file_put_contents('studet_logs.txt','');
    }
      $ip_address = $_SERVER['REMOTE_ADDR'];
      date_default_timezone_set('AFRICA/NAIROBI');
      $time = date('d/m/y h:iA', time());

      $contents = file_get_contents('studet_logs.txt');
      $contents.="$ip_address\t $time\t $log\r";
      file_put_contents('studet_logs.txt', $contents);

   }



?>