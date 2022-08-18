<?php
session_start();
session_unset();
session_destroy();
header("location: /onforum/index.php?loggedout=true");
exit;
?>