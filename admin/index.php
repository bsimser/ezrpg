<?php
define('IN_EZRPG', true);

require_once '../init.php';

//Require admin rank
if ($player->rank < 5)
{
    header('Location: ../index.php');
    exit;
}

$default_mod = 'Index';

$module_name = ( (isset($_GET['mod']) && ctype_alnum($_GET['mod'])) ? $_GET['mod'] : $default_mod );

$module = ModuleFactory::adminFactory($db, $tpl, $player, $module_name);

$module->start();
?>