<?php /* Smarty version 2.6.18, created on 2009-07-03 02:46:01
         compiled from log.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'log.tpl', 13, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('TITLE' => 'City')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['logs']): ?>
	<form method="post" action="index.php?mod=EventLog&act=clear">
	<input type="submit" value="Clear Messages" />
	</form>

	<span class="space"></span>

	<?php $_from = $this->_tpl_vars['logs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['log']):
?>
		<div class="block">
		<?php if ($this->_tpl_vars['log']->status == 0): ?>
			<span class="red"><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['log']->time)) ? $this->_run_mod_handler('date_format', true, $_tmp, '%B %e, %Y %l:%M %p') : smarty_modifier_date_format($_tmp, '%B %e, %Y %l:%M %p')); ?>
</strong></span>
		<?php else: ?>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['log']->time)) ? $this->_run_mod_handler('date_format', true, $_tmp, '%B %e, %Y %l:%M %p') : smarty_modifier_date_format($_tmp, '%B %e, %Y %l:%M %p')); ?>

		<?php endif; ?>
		<span class="space"></span>
		<?php echo $this->_tpl_vars['log']->message; ?>

		<span class="space"></span>
		</div>
	<?php endforeach; endif; unset($_from); ?>
<?php else: ?>
	<p>
	<strong>You have no log messages!</strong>
	</p>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>