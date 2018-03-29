<?php 
$file = "example.txt";

if($handle = fopen($file, 'r')){
    echo $content = fread($handle, 8); // 8 stands for 10 bytes
    // you can use filesize() to read the entire file:
    echo "<br>" . $content .= fread($handle, filesize($file));
    fclose($handle);
}else {
    echo "The application is unable to read the file";
}
?>