<?php
session_start();
// untuk mendestroy session jadi akan meminta login lagi.
session_destroy();
    
// Redirect ke halaman login
header("location: ../index.php");
?>