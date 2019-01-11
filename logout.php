<?php
unset($_SESSION['admin_id']);
unset($_SESSION['pharmacist_id']);
unset($_SESSION['cashier_id']);
unset($_SESSION['manager_id']);
unset($_SESSION['first_name']);
unset($_SESSION['last_name']);
unset($_SESSION['staff_id']);
unset($_SESSION['username']);
unset($_SESSION['userid']);
$_SESSION=array();
session_destroy();
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php");
?><?php
session_start();
unset($_SESSION['userid']);
if(session_destroy())
{
header("Location: login.php");
}
?><?php
session_start();
unset($_SESSION['userid']);
session_destroy();

header("Location: login.php");
exit;
?><script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type = "text/javascript" >
        function preventBack() { window.history.forward(1); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
        var url = window.location.href;
window.history.go(-window.history.length);
window.location.href = url;
</script>