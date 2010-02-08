<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
  Class: Module_Example
  An example of a module. Use the <Module_Skeleton> module as a starting framework for writing new modules.

  For the most basic module possible, see the Index module.
*/
class Module_Example
{
    /*
      Variable: $db
      Contains the database object.
    */
    private $db;
	
    /*
      Variable: $tpl
      The smarty object.
    */
    private $tpl;
	
    /*
      Variable: $player
      The currently logged in player. Value is 0 if no user is logged in.
    */
    private $player;
	
    /*
      Function: __construct
      Saves the db, tpl and player variables so they can be used elsewhere in the module.
	
      Then displays a page using another class method.
	
      Parameters:
      The parameters are passed by reference so that all modules and other code use the same objects.
	
      $db - An instance of the database class.
      $tpl - A Smarty object.
      $player - A player result set from the database, or 0 if not logged in.
	
      See Also:
      - <render>
      - <boo>
    */
    public function __construct(&$db, &$tpl, &$player=0)
    {
        $this->db = $db;
        $this->tpl = $tpl;
        $this->player = $player;
		
        switch($_GET['act'])
        {
          case 'boo':
              $this->boo();
              break;
          default:
              $this->render();
              break;
        }
    }
	
    /*
      Function: render
      An example of using the passed variables of $tpl and $player, then renders index.tpl.
    */
    private function render()
    {
        $this->tpl->assign('player', $this->player);
        $this->tpl->display('index.tpl');
    }
	
    /*
      Function: boo
      This function/method is called when the user accessed the URL index.php?mod=Example&act=boo
    */
    private function boo()
    {
        //Do something here!
		
        //Such as query the database for the number of players!
        $c = $this->db->fetchRow("SELECT COUNT(*) AS count FROM players");
		
        //Divide it by two!
        $c = $c / 2;
		
        //Then assign that variable to be displayed in a template!
        $this->tpl->assign('half_players', $c);
		
        //Display a template
        $this->tpl->display('index.tpl');
    }
}
?>