<?php
define('IN_EZRPG', true);

require_once('init.php');

if (ctype_alnum($_GET['mod']))
    $module = new Module($db, $tpl, $player, $_GET['mod']);
else
    $module = new Module($db, $tpl, $player);
?>