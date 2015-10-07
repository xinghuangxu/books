<?php

/* 
 * Redirect to a different page in the current directory that was requested 
 */
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'a_book_about_me';  // change accordingly

header("Location: http://$host$uri/$extra");
exit;