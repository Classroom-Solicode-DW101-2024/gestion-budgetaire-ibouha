<?php
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Redirect to login or landing page
header("Location: ../views/landing.php");
exit;
