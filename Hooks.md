

# Introduction #
If you require help on using hooks, see this article: [UsingHooks](UsingHooks.md).

# Available Hooks #

| **Hook name** | **Arguments/Parameters** | **Called in** |
|:--------------|:-------------------------|:--------------|
| player        | $player - The player object | _init.php_    |
| header        | $module`_`name - The name of the current module | _index.php_   |
| footer        | $module`_`name - The name of the current module | _index.php_   |
| admin\_header | $module`_`name - The name of the current admin module | _admin/index.php_ |
| admin\_header | $module`_`name - The name of the current admin module | _admin/index.php_ |
| login         | $player - The new player object | _modules/Login/index.php_ |
| login`_`after | $player - The new player object | _modules/Login/index.php_ |
| register      | $insert - The new player array to insert | _modules/Register/index.php_ |
| register`_`after | $new\_player - The new player's ID | _modules/Register/index.php_ |
| logout        | -                        | _modules/Logout/index.php_ |

Remember to return the arguments passed to your hook function so they can be used in the next hook function and after hooks are called!

## player ##
The player hook is called when setting the $player variable used globally throughout the script. It is the first hook to be called, and the highest priority existing hook is the one that checks the current user's session data and grabs the player data from the database.

Use this hook if you need to modify player data before the page begins (an example would be the level-up hook).

## header ##
The header hook is called just before a module is instantiated. Use this hook if you need to perform any global operations such as regular database updates.

Since it passes along the module name as a parameter, you can also use this hook if you need to intercept a particular module from being called. This could be useful for 'jailing' a player and preventing access to certain modules at the lowest level.

## footer ##
Same as the header hook but called after the module has been started and after all output. Passes along the module name for reference, but is not used after the hook is called.

## admin`_`header and admin`_`footer ##
Same as header and footer but for the admin modules in the _/admin_ folder.

## login ##
Called before any session data is set, but after the user login has been confirmed. Use this hook if you want to perform any actions upon user login, or if you want to intercept the user at the login stage.

## login`_`after ##
Called after session data is set. The user is now truly logged in. Use this hook if you want to intercept the user before being redirected to the homepage (for example if you wanted to redirect the user to another module after login instead).

## register and register\_after ##
Similar to _login_ and _login`_`after_ except during the registration process. _$insert_ for the register hook contains the info that will be inserted to the database. You can modify this to insert extra player data for example.

The _register`_`after_ hook has the _$new`_`player_ parameter which is the new player's id. Use this hook if you want to insert new data into a separate table that requires the player's ID.

## logout ##
Called after the session data is cleared and the user is logged out after clicking on the Logout button.