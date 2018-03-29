<?php 
$file = "example.txt";

if($handle = fopen($file, 'w')){
    fwrite($handle, 'I love PHP and I want to become better at it');

    fclose($handle);
}else {
    echo "The application is unable to write on the file";
}
?>