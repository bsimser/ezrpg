<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
Title: Player Functions
This file contains functions that deal with players.
*/

/*
Function: requireLogin()
Checks if the player is logged in. If not, the user is redirected back to the home page.

Parameters:
$msg - An optional message to show the user after they are redirected.

Example Usage:
Just call the requireLogin() function in a module's constructor *once*, if the module requires a user to be logged in.

The function must be called before any output is made (so before templates have been displayed).
*/
function requireLogin($msg='')
{
		if (!LOGGED_IN)
		{
			if (!empty($msg))
				header('Location: index.php?msg=' . urlencode($msg));
			else
				header('Location: index.php');
			
			exit;
		}
}
?>