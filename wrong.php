<?php

// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['username'])) {
        header('Location: appoinment.php');
}

?>
<html>

<head>
  <title>Doctor's Login</title>
  <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>

<body>
<div id='head'><div id='head-title'><img src="css/images/jmi.jpg"></div>
</div>
<div id='outerDiv2' style='height:450'>
    <p>The username or password given is not Correct please try again</p>
<div class='login-input'><center>
<form method="POST" class="colours" action="loginproc.php">

<fieldset>
<table border="0">
<legend>Doctor's Login</legend>
<tr><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;</td><td></tr>
<tr><td><p><label for="username">Doctor's ID</label></p></td><td>&nbsp;&nbsp;&nbsp;</td><td><input type="text" name="username" size="20"></td></tr>

<tr><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;</td><td></tr>
<tr><td><label for="password"><p>Password</p></label></td><td>&nbsp;&nbsp;&nbsp;</td><td><input type="password" name="password" size="20"></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;</td><td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;</td><td><p class="submit"><input type="submit" value="Login" style='width:99px;height:40;'></p></td></tr>
</table>
</fieldset>

</form></center>
</div>
</div>

</body>
</html>