<?php

require 'header.php';
include 'config.php';

$mac = $_SESSION["mac"];
$post = $_SESSION['post'];

if ($_SESSION["user_type"] == "new") {
    $email = $_POST['email'];

    mysqli_query($con,"INSERT INTO `$table_name` (email, mac, last_updated) VALUES ('$email', '$mac', NOW())");
}

mysqli_close($con);

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>
      <?php echo htmlspecialchars($business_name); ?> WiFi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="assets/styles/bulma.min.css"/>
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/all.css"/>
    <meta http-equiv="refresh" content="2;url=<?php echo htmlspecialchars($url); ?>" />
    <link rel="icon" type="image/png" href="assets/images/favicomatic/favicon-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png" href="assets/images/favicomatic/favicon-16x16.png" sizes="16x16"/>
    <link rel="stylesheet" href="assets/styles/style.css"/>
</head>
<body>
<div class="page">

    <div class="head">
        <br>
        <figure id="logo">
            <img src="assets/images/logo.png">
        </figure>
    </div>

    <div class="main">
        <section class="section">
            <div class="container">
                <div id="margin_zero" class="content has-text-centered is-size-6">Please wait, you are being</div>
                <div id="margin_zero" class="content has-text-centered is-size-6">authorized on the network</div>
            </div>
        </section>
    </div>

</div>

<form id="form1" name="form1" method=POST action="https://<?php echo htmlspecialchars($post); ?>/cgi-bin/login">
        <input name=user value="user1" type="hidden">
        <input name=password value="pass1" type="hidden">
        <input name=cmd value="authenticate" type="hidden">
        <input name=session_timeout value="3600" type="hidden">
</form>

<script type="text/javascript">
    window.onload = function () {
        window.setTimeout(function () {
            document.form1.submit();
        }, 2000);
    };
</script>

</body>
</html>
