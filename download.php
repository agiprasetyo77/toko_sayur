<?php
// Require composer autoload
require_once 'vendor/autoload.php';

// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:
$html = 'Hello World';

// Set content type
header('Content-Type: application/pdf');

// Set filename for download
header('Content-Disposition: attachment; filename="output.pdf"');

// Output PDF to the browser
$mpdf->WriteHTML($html);
$mpdf->Output();

// Exit to prevent additional output
exit();
?>