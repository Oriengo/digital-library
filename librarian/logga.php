<?php 
   function logg($logg){
    if(!file_exists('bookslogs.txt')){
  file_put_contents('bookslogs.txt','');
    }
      $ip_address = $_SERVER['REMOTE_ADDR'];
      date_default_timezone_set('AFRICA/NAIROBI');
      $time = date('d/m/y h:iA', time());

      $contents = file_get_contents('bookslogs.txt');
      $contents.="$ip_address\t $time\t $logg\r";
      file_put_contents('bookslogs.txt', $contents);

   }



?>
