<?php
session_start();
// Logika untuk logout mengahpus semua session yang ada
session_unset();
session_destroy();

header("Location: login.php");
exit();
?>
