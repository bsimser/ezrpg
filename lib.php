<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

//Requires

//Config
require_once(CUR_DIR . '/config.php');
//Functions
require_once(LIB_DIR . '/func.log.php');
require_once(LIB_DIR . '/func.rand.php');
require_once(LIB_DIR . '/func.text.php');
require_once(LIB_DIR . '/func.player.php');
//require_once(LIB_DIR . '/function_error.php');
//require_once(LIB_DIR . '/function_forum.php');
//require_once(LIB_DIR . '/function_pagination.php');
//require_once(LIB_DIR . '/function_player.php');

//Classes
require_once(LIB_DIR . '/class.dbfactory.php');
require_once(LIB_DIR . '/class.imagebar.php');
require_once(LIB_DIR . '/class.module.php');

//Exceptions
require_once(LIB_DIR . '/exception.db.php');

//Constants
require_once(LIB_DIR . '/const.errors.php');

//Items
require_once(LIB_DIR . '/items/class.Item.php');
require_once(LIB_DIR . '/items/class.EquipItem.php');
require_once(LIB_DIR . '/items/class.UsableItem.php');
require_once(LIB_DIR . '/items/class.UselessItem.php');
require_once(LIB_DIR . '/items/class.OneHealingItem.php');
require_once(LIB_DIR . '/items/class.MultiHealingItem.php');
require_once(LIB_DIR . '/items/class.Weapon.php');


//External Libraries
//HTML Purifier
require_once(EXT_DIR . '/htmlpurifier/HTMLPurifier.auto.php');
require_once(EXT_DIR . '/htmlpurifier/HTMLPurifier/Filter/ExtractStyleBlocks.php');
//CSS Tidy
require_once(EXT_DIR . '/csstidy/class.csstidy.php');
require_once(EXT_DIR . '/csstidy/class.csstidy_print.php');
//Smarty
require_once(EXT_DIR . '/smarty/Smarty.class.php');
?>