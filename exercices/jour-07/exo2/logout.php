<?php
session_start();

/* Destruction complète de la session */
session_unset();
session_destroy();

/* Redirection vers login */
header('Location: login.php');
exit;
