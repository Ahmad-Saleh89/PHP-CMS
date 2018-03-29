<?php 
$file = "example.txt";

// fopen() opens a file or URL and it takes 2 parameters
$handle = fopen($file, 'w');
fclose($handle);

?>