<?php
// Require composer autoload
require_once __DIR__ . '../../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:
$mpdf->WriteHTML( "
<h1> Kisumu University</h2>
My name is Michael Onyango Oriengo
<br>
This is my first pdf file I am trying to make. 
</p>");
 
// Output a PDF file directly to the browser
$mpdf->Output("1.pdf",'D' );