<?php

// WARNING: MAKE SURE WEB SERVER HAS PERMISSIONS TO WRITE IN LOG FILE

// open file
$fd = fopen("log.txt", "a") or die("Unable to open file!");

// get data
$to_write = "nothing received :(";
if (isset($_GET['data']) && !empty($_GET['data']))
    $to_write = $_GET['data'];
$to_write .= "\n";

// write data in file
fwrite($fd, $to_write);

// close file
fclose($fd);

?> 