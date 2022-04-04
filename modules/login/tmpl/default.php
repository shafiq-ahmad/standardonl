<?php
defined('_MEXEC') or die ('Restricted Access');
global $v_view;
$class = '';

?>
<dl class="sideBoxTop">
<dd class="sideBoxCont">
	<h3 class="loginIcon">Login Now</h3>
	<form action="index.php?option=users&view=login" class="loginFrm" method="post">
		<p><label>User name</label><input id="username" type="text" class="typeInput" name="username" /></p>
		<p><label>Password</label><input id="password" type="password" class="typeInput" name="password" /></p>
		<p><a href="index.php?option=users&view=forget" class="forgetTxt">Forget password?</a></p>
		<p><input type="submit" class="subBotton" value="Login" name="login" /></p>
	</form>

</dd>
</dl>