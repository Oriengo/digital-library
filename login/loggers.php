<?php 
   function logger($log){
    if(!file_exists('logs.txt')){
    file_put_contents('logs.txt','');
    }
      $ip_address = $_SERVER['REMOTE_ADDR'];
      $browser = $_SERVER['HTTP_USER_AGENT'];
      $user_agent = $_SERVER['HTTP_USER_AGENT'];
      date_default_timezone_set('AFRICA/NAIROBI');
      $time = date('d/m/Y h:iA', time());

      $contents = file_get_contents('logs.txt');
      $contents.="$ip_address\t $time\t   $log\r";
      file_put_contents('logs.txt', $contents);

   }



?>