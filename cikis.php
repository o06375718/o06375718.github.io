<?php
    require 'php/fonksiyonlar.php';

    session_start();
    session_destroy();
    yonlenVeDur('index.php');


?>