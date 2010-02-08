<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
  Class: Module_Login
  This module handles user authentication.
*/
class Module_Login
{
    /*
      Function: __construct
      Checks player details to login the player.
	
      If successful, a new session is generated and the user is redirected to the game.
	
      On failure, session data is cleared and the user is redirected back to the login page.
	
      Parameters:
      The parameters are passed by reference so that all modules and other code use the same objects.
	
      $db - An instance of the database class.
      $tpl - A Smarty object.
      $player - A player result set from the database, or 0 if not logged in.
    */
    public function __construct(&$db, &$tpl, &$player=0)
    {
        $error = 0; //Error count
        $errors = Array();

        if (empty($_POST['username']))
        {
            $errors[] = 'Please enter your username!';
            $error = 1;
        }
        
        if (empty($_POST['password']))
        {
            $errors[] = 'Please enter your password!';
            $error = 1;
        }
        
        $query = $db->execute('SELECT id, username, password, secret_key FROM <ezrpg>players WHERE username=?', array($_POST['username']));
        if ($db->numRows($query) == 0)
        {
            $errors[] = 'Please check your username/password!';
            $error = 1;
        }
        else
        {
            $player = $db->fetch($query);
            $check = sha1(sha1($player->secret_key . $_POST['password'] . SECRET_KEY2) . SECRET_KEY);
            if ($check != $player->password)
            {
                $errors[] = 'Please check your username/password!';
                $error = 1;
            }
        }
        
        if ($error == 0)
        {
            $query = $db->execute('UPDATE <ezrpg>players SET last_login=? WHERE id=?', array(time(), $player->id));
            $hash = sha1($player->id . $_SERVER['REMOTE_ADDR'] . SECRET_KEY);
            $_SESSION['userid'] = $player->id;
            $_SESSION['hash'] = $hash;
            
            header('Location: index.php');
            exit;
        }
        else
        {
            if (isset($_SESSION['hash']))
                unset($_SESSION['hash']);
            
            if (isset($_SESSION['userid']))
                unset($_SESSION['userid']);
            
            $msg = 'Sorry, you could not login:<br />';
            $msg .= '<ul>';
            foreach($errors as $errmsg)
            {
                $msg .= '<li>' . $errmsg . '</li>';
            }
            $msg .= '</ul>';
            
            header('Location: index.php?msg=' . urlencode($msg));
            exit;
        }
    }
}
?>