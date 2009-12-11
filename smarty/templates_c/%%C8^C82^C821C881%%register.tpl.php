<?php /* Smarty version 2.6.26, created on 2009-07-08 15:07:50
         compiled from register.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('TITLE' => 'Register')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1>Register</h1>

<p>
Want to join the fun? Fill out the form below to register!
</p>

<form method="POST" action="index.php?mod=Register">

<label>Username</label>
<input type="text" size="40" name="username"<?php if ($this->_tpl_vars['GET_USERNAME'] != ""): ?> value="<?php echo $this->_tpl_vars['GET_USERNAME']; ?>
"<?php endif; ?> />

<label>Password</label>
<input type="password" size="40" name="password" />

<label>Verify Password</label>
<input type="password" size="40" name="password2" />

<label>Email</label>
<input type="text" size="40" name="email"<?php if ($this->_tpl_vars['GET_EMAIL'] != ""): ?> value="<?php echo $this->_tpl_vars['GET_EMAIL']; ?>
"<?php endif; ?> />

<label>Verify Email</label>
<input type="text" size="40" name="email2"<?php if ($this->_tpl_vars['GET_EMAIL2'] != ""): ?> value="<?php echo $this->_tpl_vars['GET_EMAIL2']; ?>
"<?php endif; ?> />

<label>Enter The Code</label>
<img src="./captcha.php" /><br />
<input type="text" size="40" name="reg_verify" autocomplete="off" />

<br />
<input name="register" type="submit" value="Register!" class="button" />
</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>