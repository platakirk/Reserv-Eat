<?php
    require_once 'phpqrcode/qrlib.php';
    
    // outputs image directly into browser, as PNG stream
    $id = $_GET["id"];
    QRcode::png("https://isproj2b.benilde.edu.ph/ReservEat/res-select.php?id=$id");
?>