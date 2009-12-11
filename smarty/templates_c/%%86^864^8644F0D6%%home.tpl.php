<?php /* Smarty version 2.6.18, created on 2009-07-02 22:57:02
         compiled from home.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'home.tpl', 9, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('TITLE' => 'Home')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1>Home</h1>

<div class="left">
<p>
<strong>Username</strong>: <?php echo $this->_tpl_vars['player']->username; ?>
<br />
<strong>Email</strong>: <?php echo $this->_tpl_vars['player']->email; ?>
<br />
<strong>Registered</strong>: <?php echo ((is_array($_tmp=$this->_tpl_vars['player']->registered)) ? $this->_run_mod_handler('date_format', true, $_tmp, '%B %e, %Y %l:%M %p') : smarty_modifier_date_format($_tmp, '%B %e, %Y %l:%M %p')); ?>
<br />
<strong>Kills/Deaths</strong>: <?php echo $this->_tpl_vars['player']->kills; ?>
/<?php echo $this->_tpl_vars['player']->deaths; ?>
<br />
<br />
<?php if ($this->_tpl_vars['player']->stat_points > 0): ?>
You have stat points left over!<br />
<a href="index.php?mod=StatPoints"><strong>Spend them now!</strong></a>
<?php else: ?>
You have no extra stat points to spend.
<?php endif; ?>
</p>
</div>


<div class="right">
<p>
<strong>Level</strong>: <?php echo $this->_tpl_vars['player']->level; ?>
<br />
<strong>Gold</strong>: <?php echo $this->_tpl_vars['player']->money; ?>
<br />
<strong>Weight Limit</strong>: <?php echo $this->_tpl_vars['player']->weight_limit; ?>
<br />
<br />
<strong>Strength</strong>: <?php echo $this->_tpl_vars['player']->strength; ?>
<br />
<strong>Vitality</strong>: <?php echo $this->_tpl_vars['player']->vitality; ?>
<br />
<strong>Agility</strong>: <?php echo $this->_tpl_vars['player']->agility; ?>
<br />
<strong>Dexterity</strong>: <?php echo $this->_tpl_vars['player']->dexterity; ?>
<br />
</p>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>