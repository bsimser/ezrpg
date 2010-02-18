<?php
define('IN_EZRPG', true);

require_once 'init.php';

$default_mod = 'Index';

$module_name = ( (isset($_GET['mod']) && ctype_alnum($_GET['mod']))  ? $_GET['mod'] : $default_mod );

$module = ModuleFactory::factory($db, $tpl, $player, $module_name);

$module->start();
?>