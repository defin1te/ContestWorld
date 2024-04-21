<?php
setcookie("test", "Working", time() + 3600, "/"); 
?>
<?php
if(isset($_COOKIE['test'])) {
    echo "Cookies are enabled. Value: " . $_COOKIE['test'];
} else {
    echo "Cookies are not enabled.";
}
?>
