<?php
session_start();
session_destroy();
header("Location: https://daks.stud.vts.su.ac.rs/index.php");
exit;
?>
