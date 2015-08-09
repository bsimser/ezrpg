

# Introduction #

Hooks provide a way for you to add code which will run in certain parts of the ezRPG core code, or at certain times.

For example, if you wanted to update certain player data when the player logs in, and only when the player logs in, it would be bad practice to edit the Login module. Why?

If you wanted to distribute this modification, anybody else who wants to use it would also need to edit code in the Login module.

If ezRPG is upgraded and the user upgrades their version of ezRPG, the modified Login code would be overwritten and you would need to edit the code again.

Hooks are the solution. Instead of modifying the login code, you can add a '**login hook**'. In the login module, there is a line that will call a list of login hook functions. All you need to do is add _your_ login function to this list.

# Register your hook function #
First you start off by creating a file in the _hooks/_ folder. All the files in here will be automatically included, and you should only use this folder for hook functions.

The first thing your hook file should do is register the hook function with a particular hook. Continuing with our login example, here's how to register a hook function for logging in:

```
$hooks->add_hook('login', 'your_function', 3);
```

The first parameter/argument is the name of the hook - 'login' because we want our function to hook into the login process.

The second argument is the name of your hook function. Actually, your function will have a  hook`_` prefix and be called hook`_`your`_`function. Here you want to pass the name of your function without the hook`_` prefix.

The last argument is optional - you can leave it empty if you like. This is the 'priority' of your hook function. If you want your hook function to run first in line, give it a priority of 0. The default priority is 5.

# Create your hook function #
In the same file, you add your hook function:

```
function hook_your_function(&$db, &$tpl, &$player, $args = 0)
{
    //Do your stuff here
    return $args;
}
```

Your hook function will always have the first three parameters so you can access the database, add template variables, and use player data.

The last parameter may or may not be there, depending on the hook. It may also be an array in order to use more than one parameter.

The last line of your hook function **must** return the hook argument.

# A Real Example #
Here's a real example of a hook function used in ezRPG. This is the hook function that updates the count of online players.

Some extra comments have been added so you can see what's going on:

```
<?php
defined('IN_EZRPG') or exit;

//Register the function to the header hook, with default priority
$hooks->add_hook('header', 'online_players');

function hook_online_players(&$db, &$tpl, &$player, $args = 0)
{
    //Query the database for online player counts
    $query = $db->fetchRow('SELECT COUNT(`id`) AS `count` FROM `<ezrpg>players` WHERE `last_active`>?', array(time() - (60*5)));

    //Assign the player count as a template variable
    $tpl->assign('ONLINE', $query->count);
    
    //Return the argument
    return $args;
}
?>
```

Note that the function does **not** require the extra argument (which, for the header hook, is the current module name). Whether or not your function modified the argument will depend on exactly what your hook is doing, but this particular module should always run no matter what the module name is, so it isn't used at all.

In the end, the module name argument is returned without being changed, so it can be used in other hook functions and after the hook has finished running.

For a list of hooks and their parameters, see the [Hooks](Hooks.md) article.

# Remember #
All hook files go in the _hook/_ folder, and they will be included by ezRPG automatically.

If an argument is passed to your hook function, **always remember** to return this argument at the end of the function, whether you've modified it or not. If you forget to do this you could break the entire game!

Hook functions have the same function signature. This is so you have access to the template, database and player variables, and any arguments passed along.