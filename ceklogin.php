<html><head></head><body>
<?php
	echo $_POST["password"];
    if (strcmp($_POST["password"],"abc") == 0) {
        header("Location: index.html");
        die();
    } else {
        header("Location: login.html?wrongpassword");
        die();
    }
?>
</body>
<html>