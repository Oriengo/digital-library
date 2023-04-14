<?php

class Common
{
  public function uploadData($connection,$book_id,$book_name,$author,$title, $publication, $copies, $section, $price, $status)
  {
      $mainQuery = "INSERT INTO  books_details SET book_id='$book_id',book_name='$book_name',author='$author', title ='$title', publication='$publication',copies='$copies', sections='$section', price = '$price', status='$status' ";
      $result1 = $connection->query($mainQuery) or die("Error in main Query".$connection->error);
      return $result1;
  }
}
