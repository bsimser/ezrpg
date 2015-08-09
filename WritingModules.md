

# Introduction #

Modules are located in the sub-folder _/modules_. Everything you see on ezRPG is a module - login, register, logout, members list, account settings, etc.

Before you start writing modules, you may want to turn on SHOW\_ERRORS in your config.php file. Set it to **true** to have your game start displaying error messages if something goes wrong.

You can see the most basic code for a module in _/modules/skeleton.php_:
```
defined('IN_EZRPG') or exit;

class Module_Skeleton extends Base_Module
{
    public function start()
    {
        requireLogin();
    }
}
```

This might be the best place to start whenever you write a new module - just copy the code in skeleton.php and work from there.

# Rules #

There are some rules that you need to follow when writing modules for them to integrate properly with ezRPG:

  1. Modules go in their own _/modules/ModuleName_ sub-folder. Always. Admin modules go in the _/admin/ModuleName_ sub-folder.
  1. Module class names must begin with the Module`_` prefix, followed by the module name.
  1. Modules are accessed by their class name, minus the Module`_` prefix. For example, Module\_Blabla will be accessed through index.php?mod=Blabla.
  1. Modules must extend the Base\_Module class in order to access database, template and player objects.
  1. Modules must have a public start() method. This is the method that will be called when your module is viewed by a player.

# Class Variables #
In every module, there are three class variables available to you, as well as global functions and constants:

  * **$this->db** - This is the database object. Check out the documentation for the database class to see what kind of stuff you can do!

> Example of writing a database query:
```
//Count the number of players
$result = $this->db->fetchRow('SELECT COUNT(`id`) AS `count` FROM `<ezrpg>players`');

echo $result->count; //Display the result
```

  * **$this->tpl** - This is the smarty template object. Check out the included modules to see how you can display templates or assign variables!

> For example, to display a template you can use **$this->tpl->display('example.tpl');**.

  * **$this->player** - This is the player object. It contains all player data as class variables.

> For example, to access the player's username, you can use **$this->player->username;**.

# Other Files #
If you add template files, they belong in _/smarty/templates_. If you are adding many template files for your mod, you can place them in their own sub-folder.

If you add files like images or CSS stylesheets, they belong in _/static_.

If you want to add your own global functions, place the files in _/lib_.
After they have been put in the lib folder, you can add an include to that file in /init.php and it will be included globally in the game.

If you need to run code on every page load, or you need to modify the $player variable, or you need to edit other parts of the core code - **don't**! Use [Hooks](Hooks.md) instead.

# Examples #
For examples of how real modules are used, check out the source code! All the modules included in ezRPG are completely usable, and demonstrate different ways of writing different types of modules.

If you want to know how distributable modules are coded (with a module installer/uninstaller), download a free module from the [forum](http://www.ezrpgproject.com/forum) and view its source!