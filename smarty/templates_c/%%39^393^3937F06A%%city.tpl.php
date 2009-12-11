<?php /* Smarty version 2.6.18, created on 2009-07-02 23:49:13
         compiled from city.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('TITLE' => 'City')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1>City</h1>

<div class="left">

<h3>Player</h3>
<p>
<a href="index.php">Home</a><br />
<a href="index.php?mod=EventLog">Event Log</a><br />
<a href="index.php?mod=Mail">Mail Box</a><br />
<a href="index.php?mod=Items">Inventory</a><br />
<a href="index.php?mod=Account">Account Settings</a><br />
</p>

</div>
<div class="right">

<h3>World</h3>
<p>
<a href="index.php?mod=Members">Members List</a><br />
<a href="index.php?mod=Rankings">Top Players</a><br />
<a href="index.php?mod=Statistics">Game Statistics</a><br />
<a href="index.php?mod=Forum">Forum</a><br />
</p>


<h3>City</h3>
<p>
<a href="index.php?mod=Battle">Battle</a><br />
<a href="index.php?mod=Shop">Item Shop</a><br />
</p>

</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>