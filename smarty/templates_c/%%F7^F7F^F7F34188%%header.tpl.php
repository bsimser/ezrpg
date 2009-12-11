<?php /* Smarty version 2.6.26, created on 2009-07-08 15:44:56
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'header.tpl', 10, false),array('modifier', 'date_format', 'header.tpl', 18, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta name="Description" content="ezRPG Project, the free, open source browser-based game engine!" />
<meta name="Keywords" content="ezrpg, game, game engine, pbbg, browser game, browser games, rpg, ezrpg project" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Robots" content="index,follow" />
<link rel="stylesheet" href="static/default/style.css" type="text/css" />	
<title>ezRPG :: <?php echo ((is_array($_tmp=@$this->_tpl_vars['TITLE'])) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, "")); ?>
</title>
</head>
<body>

<div id="wrapper">

<div id="header">
	<span id="title">ezRPG</span>
	<span id="time"><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%A %T') : smarty_modifier_date_format($_tmp, '%A %T')); ?>

	<br />
	<strong>Players Online</strong>: <?php echo $this->_tpl_vars['ONLINE']; ?>
</span>
</div>

<div id="nav">
	<ul>
	<?php if ($this->_tpl_vars['LOGGED_IN'] == 'TRUE'): ?>
	<li><a href="index.php">Home</a></li>
	<li><a href="index.php?mod=EventLog">Log</a></li>
	<li><a href="index.php?mod=Items">Inventory</a></li>
	<li><a href="index.php?mod=City">City</a></li>
	<li><a href="index.php?mod=Members">Members</a></li>
	<li><a href="index.php?mod=Account">Account</a></li>
	<li><a href="index.php?mod=Logout">Log Out</a></li>
	<?php else: ?>
	<li><a href="index.php">Home</a></li>
	<li><a href="index.php?mod=Register">Register</a></li>
	<?php endif; ?>
	</ul>
</div>

<span class="space"></span>

<?php if ($this->_tpl_vars['LOGGED_IN'] == 'TRUE'): ?>
<div id="sidebar">
<strong>Level</strong>: <?php echo $this->_tpl_vars['player']->level; ?>
<br />
<strong>Gold</strong>: <?php echo $this->_tpl_vars['player']->money; ?>
<br />

<img src="bar.php?width=140&type=exp" alt="EXP: <?php echo $this->_tpl_vars['player']->exp; ?>
 / <?php echo $this->_tpl_vars['player']->max_exp; ?>
" /><br />
<img src="bar.php?width=140&type=hp" alt="HP: <?php echo $this->_tpl_vars['player']->hp; ?>
 / <?php echo $this->_tpl_vars['player']->max_hp; ?>
" /><br />
<img src="bar.php?width=140&type=energy" alt="Energy: <?php echo $this->_tpl_vars['player']->energy; ?>
 / <?php echo $this->_tpl_vars['player']->max_energy; ?>
" /><br />

<?php if ($this->_tpl_vars['new_logs'] > 0): ?>
<a href="index.php?mod=EventLog" class="red"><strong><?php echo $this->_tpl_vars['new_logs']; ?>
 New Log Events!</strong></a>
<?php endif; ?>
</div>
<?php endif; ?>

<div id="<?php if ($this->_tpl_vars['LOGGED_IN'] == 'TRUE'): ?>gamebody<?php else: ?>body<?php endif; ?>">
	<?php if ($this->_tpl_vars['GET_MSG'] != ''): ?><div class="msg">
	<span class="red"><strong><?php echo $this->_tpl_vars['GET_MSG']; ?>
</strong></span>
	</div>
	<span class="space"></span><?php endif; ?>