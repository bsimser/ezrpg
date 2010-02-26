<?php
//This page cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

//Start Session
session_start();

//Headers
//header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
//header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past

require_once 'config.php';

//Show errors?
(SHOW_ERRORS == 0)?error_reporting(0):error_reporting(E_ALL);

//Constants
define('CUR_DIR', realpath(dirname(__FILE__)));
define('MOD_DIR', CUR_DIR . '/modules');
define('ADMIN_DIR', CUR_DIR . '/admin');
define('LIB_DIR', CUR_DIR . '/lib');
define('EXT_DIR', LIB_DIR . '/ext');

define('TODAY', date('d F'));

require_once(CUR_DIR . '/lib.php');

//HTML Purifier Config
$purifier_config = HTMLPurifier_Config::createDefault();
$purifier_config->set('HTML.Allowed', 'b,a[href],i,br,em,strong,ul,li');
$purifier_config->set('URI.Base', $_SERVER['DOCUMENT_ROOT']);
$purifier_config->set('URI.MakeAbsolute', true);

//Variables
$purifier = new HTMLPurifier($purifier_config);
$tpl = new Smarty();

try
{
    $db = DbFactory::factory($config_driver, $config_server, $config_username, $config_password, $config_dbname);
}
catch (DbException $e)
{
    $e->__toString();
}

//Database password no longer needed, unset variable
unset($config_password);

//Smarty
$tpl->template_dir = CUR_DIR . '/smarty/templates/';
$tpl->compile_dir  = CUR_DIR . '/smarty/templates_c/';
$tpl->config_dir   = CUR_DIR . '/smarty/configs/';
$tpl->cache_dir    = CUR_DIR . '/smarty/cache/';

//Messages for the user
if (isset($_GET['msg']))
{
    $_msg = trim(stripslashes($_GET['msg']));
    $_msg = $purifier->purify($_msg);
    if (!empty($_msg))
        $tpl->assign('GET_MSG', $_msg);
}

$player = 0;

if (isset($_SESSION['userid']) && isset($_SESSION['hash']))
{
    //Check if user logged in
    $session_check = sha1($_SESSION['userid'] . $_SERVER['REMOTE_ADDR'] . SECRET_KEY);
    
    if ($_SESSION['hash'] == $session_check)
    {
        //Select player details
        $player = $db->fetchRow('SELECT * FROM `<ezrpg>players` WHERE `id`=?', array($_SESSION['userid']));
        $tpl->assign('player', $player);
        
        //Set logged in flag
        define('LOGGED_IN', true);
        $tpl->assign('LOGGED_IN', 'TRUE');
        
        //Update last_active value for the player
        if ($player->last_active <= (time() - 300)) //Only update last_active if 5 minutes have passed since last update
            $query = $db->execute('UPDATE `<ezrpg>players` SET `last_active`=? WHERE `id`=?', array(time(), $player->id));
        
        //Check for new log messages and send to template
        $tpl->assign('new_logs', checkLog($player->id, $db));
    }
    else
    {
        if (isset($_SESSION['hash']))
            unset($_SESSION['hash']);
        
        if (isset($_SESSION['userid']))
            unset($_SESSION['userid']);
        
        define('LOGGED_IN', false);
    }
}
else
{
    define('LOGGED_IN', false);
}

//Online players
$query = $db->fetchRow('SELECT COUNT(`id`) AS `count` FROM `<ezrpg>players` WHERE `last_active`>?', array((time()-(60*5))));
$online = $query->count;

$tpl->assign('ONLINE', $online);
?>