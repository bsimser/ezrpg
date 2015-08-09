# Introduction #

In this tutorial I will go through the process of coding a Bank module.

The bank will allow players to deposit and withdraw money from their bank account.

# SQL #

First, we need to go into the database and add a new column to the player database. Add a new column called 'bank', with integer type:

```
ALTER TABLE  `players` ADD  `bank` INT NOT NULL DEFAULT  '0' AFTER  `money`;
```

Don't forget to change the table name in the query if you added a table prefix when you installed ezRPG!

# Starting Code #
We will begin with the code from _modules/skeleton.php_. _skeleton.php_ is the most basic module possible, without actually doing or displaying anything. It is a perfect place to start when writing any module:

```
<?php
defined('IN_EZRPG') or exit;
class Module_Skeleton extends Base_Module
{
    public function start()
    {
        requireLogin();
    }
}
?>
```

The **start()** function is the function that will be called when somebody visits the bank page on _index.php?mod=Bank_.

We need to rename the module so that the URL will work and bring up the correct module. If we want the player to access the module through _index.php?mod=Bank_, then we need to rename the class **Module\_Bank**. If we wanted _index.php?mod=Bla_, then the class would be called **Module\_Bla**. Get it now?

Every module must have a different name, so be very careful if you are creating a module and you name it something that's already been taken! Feel free to give your module its own unique name like ZBank or SuperBank!

Just as the name of the PHP class needs to match the name of the module, so does the folder that the file goes in. This module will go in _/modules/Bank/index.php_. The file name must always be index.php, and the folder it is in is the module name.

# Extending the Code and Adding a Template #

Next, we will define two class functions - withdraw() and deposit() for the two possible actions the player can make. We will fill those in later. We'll work on displaying a bank page first before adding any functionality.

We keep the requireLogin() line because our module is not a public module, it should only be seen by players who are logged in.

In ezRPG, to display any output, we use template files. Templates separate design from code so you can easily change the design of any page or of your entire game without having to go through any code. All templates files are stored in _/smarty/templates_. We will call our bank template file **bank.tpl**, and use the template object to display the template:

```
defined('IN_EZRPG') or exit;

class Module_Bank extends Base_Module
{
    public function start()
    {
        requireLogin();
        
        //Display the bank template file
        $this->tpl->display('bank.tpl');
    }
    
    private function withdraw()
    {
    }
    
    private function deposit()
    {
    }
}
```

# The Template File #
We haven't created a template file yet so this doesn't do anything yet. Let's create a template file for the bank.

Create a file called **bank.tpl** in the _/smarty/templates_ folder:

```
{include file="header.tpl" TITLE="Bank"}

<h1>Bank</h1>

<p>
  Welcome, <strong>{$player->username}</strong>!
  <br />
  You have <strong>{$player->bank}</strong> money in your bank!
</p>

<div class="left">
  <h2>Deposit</h2>
  <form method="post" action="index.php?mod=Bank&act=deposit">
  <label>Amount to Deposit</label>
  <input type="text" name="amount" value="{$player->money}" />
  <br />
  <input type="submit" value="Deposit" />
  </form>
</div>

<div class="right">
  <h2>Withdraw</h2>
  <form method="post" action="index.php?mod=Bank&act=withdraw">
  <label>Amount to Withdraw</label>
  <input type="text" name="amount" value="{$player->bank}" />
  <br />
  <input type="submit" value="Withdraw" />
  </form>
</div>

{include file="footer.tpl"}
```

The first and last lines in the template file include the header and footer templates, so that you only ever need to put the code for the layout once. This helps separate the design from the content of the game. Most of your templates should have an include header, the content, then an include footer to integrate with the game.

You can see I added an introduction paragraph showing the player the amount of money he has in the bank and demonstrating the use of template variables. I used **{$player->username}** to display the player's username in the template. You cannot use normal PHP or variables! To have your template use a variable, you need to call **$this->tpl->assign('variablename', $variable);** before you display the template. We don't need to do this for bank.tpl because the $player variable is already assigned by default to every template file.

Beneath the introduction I added two standard forms for withdrawal/deposit that submit to _index.php?mod=Bank_.

If you visit _index.php?mod=Bank_ right now, you can see your bank mod! If everything went correctly so far, you will be able to see the introduction paragraph and the deposit/withdraw forms. They don't do anything yet, but at least the design is done!

Finally, edit **city.tpl** so there is a link to the bank that players can click on!