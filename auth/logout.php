<?php

session_destroy();
setcookie('login', '', time() - 3600);
header("Location: index.php");
