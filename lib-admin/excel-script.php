<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kisumu University</title>
</head>

<body>

</body>

</html>
<?php
include  "config.php";
include_once  "Common.php";


if ($_FILES['excelDoc']['name']) {
    $arrFileName = explode('.', $_FILES['excelDoc']['name']);
    if ($arrFileName[1] == 'csv') {
        $handle = fopen($_FILES['excelDoc']['tmp_name'], "r");
        $count = 0;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $count++;
            if ($count == 1) {
                continue; // skip the heading header of sheet
            }
            $book_id = $connection->real_escape_string($data[0]);
            $book_name = $connection->real_escape_string($data[1]);
            $author = $connection->real_escape_string($data[2]);
            $title = $connection->real_escape_string($data[3]);
            $publication = $connection->real_escape_string($data[4]);
            $copies = $connection->real_escape_string($data[5]);
            $section = $connection->real_escape_string($data[6]);
            $price = $connection->real_escape_string($data[7]);
            $status = $connection->real_escape_string($data[8]);

            $common = new Common();
            $SheetUpload = $common->uploadData($connection, $book_id, $book_name, $author, $title, $publication, $copies, $section, $price, $status);
        }
        if ($SheetUpload) {
            echo "<script>alert('Books details has been uploaded successfully !');window.location.href='register-books.php';</script>";
        } else {
            echo "<script>alert('ooks details has not been uploaded successfully ! Kindly check file again');window.location.href='register-books.php';</script>";
        }
    }
}
