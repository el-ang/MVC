<?php
    require_once "../app/init.php";
    new App($_GET["url"] ?? "");
?>