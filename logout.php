<?php 
session_start();
session_unset();
session_destroy();

header("Location: login.php");
setcookie("username","",time()-60);
setcookie("userid","",time()-60);

?>