<?php
defined('IN_EZRPG') or exit;

/*
  Class: Hooks
  A class to handle adding/running hooks
*/
class Hooks
{
    /*
      Variable: $db
      Contains the database object.
    */
    protected $db;
    
    /*
      Variable: $tpl
      The smarty template object.
    */
    protected $tpl;
    
    /*
      Variable: $player
      The currently logged in player. Value is 0 if no user is logged in.
    */
    protected $player;
    
    /*
      Variable: $hooks
      An array of all hooks, ordered by priority.
    */
    protected $hooks;
    
    /*
      Function: __construct
      The constructor takes in database, template and player variables to pass onto any hook functions called.
      
      Parameters:
      $db - An instance of the database class.
      $tpl - A smarty object.
      $player - A player result set from the database, or 0 if not logged in.
    */
    public function __construct(&$db, &$tpl, &$player = 0)
    {
        $this->db = &$db;
        $this->tpl = &$tpl;
        $this->player = &$player;
        
        $this->hooks = array();
    }
    
    /*
      Function: add_hook
      Adds a function to the list of hooks.
      
      Parameters:
      $hook_name - The name of the hook to add the function to.
      $function_name - The name of the hook function, minus the hook_ prefix.
      $priority - The priority of the hook function. Higher priority (0) gets called first. Default is 5.
      
      Example:
      This adds a hook to check the user session data to the 'login' hook, with priority 0 so it will run first.
      add_hook('login', 'check_session', 0);
    */
    public function add_hook($hook_name, $function_name, $priority = 5)
    {
        $this->hooks[$hook_name][$priority][] = $function_name;
    }
    
    /*
      Function: run_hooks
      This will run all the functions added to a particular hook. Functions called are ordered by priority.
      
      Parameters:
      $hook_name - The name of the hook to run functions for.
      $ret - A return value that will be passed to the hook function then returned at the end.
    */
    public function run_hooks($hook_name, $ret = '')
    {
        //This hook doesn't exist!
        if (!array_key_exists($hook_name, $this->hooks))
            return;
        
        foreach($this->hooks[$hook_name] as $priority)
        {
            //Sort by priority
            sort($priority);
            
            //Call each hook function separately
            foreach($priority as $key=>$hook_function)
            {
                //Debug mode? Show what's going on
                if (DEBUG_MODE == 1)
                    echo 'Calling hook: ', $hook_function, '<br />';
                
                //Call the function
                if ($ret != '')
                {
                    //Hook should have a return value
                    $ret = call_user_func('hook_' . $hook_function, $this->db, $this->tpl, $this->player, $ret);
                }
                else
                {
                    //No return value needed
                    $ret = call_user_func('hook_' . $hook_function, $this->db, $this->tpl, $this->player);
                }
            }
        }
        
        return $ret;
    }
}
?>