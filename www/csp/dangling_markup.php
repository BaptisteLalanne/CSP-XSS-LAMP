<?php

header("Content-Security-Policy:".
    "connect-src 'none'; ".
    "font-src 'none'; ".
    "frame-src 'none'; ".
    "img-src 'self'; ".
    "manifest-src 'none'; ".
    "media-src 'none'; ".
    "object-src 'none'; ".
    "script-src 'none'; ".
    "worker-src 'none'; ".
    "style-src 'self'; ".
    "frame-ancestors 'none'; ".
    "block-all-mixed-content;");
    
?>

