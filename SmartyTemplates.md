# Smarty Template Basics #
If you want to develop modules or make your own custom theme, you are going to know how to deal with smarty modules.
To begin with in this tutorial, I will show you the basic stuff, and hopefully by time you leave this thread you will know how to customize/make .tpl files.

## **When making a module:** ##
It is a good idea to include your header.tpl, header.tpl is basically the whole design of the content wrapped around all modules. To include another tpl use this syntax:

```
{include file="FileName" TITLE="PageTitle"}
```

That will include the design of any file needed. Just replace "filename" with "header.tpl", and PageTitle to whatever you want it to be.
Example:

```
{include file="header.tpl" TITLE="Stats"}
```

Next, you should include your footer.tpl, with footer.tpl all that is displayed is copyright information, and possible some links.
```
{include file="footer.tpl"}
```
Notice we did not add the TITLE parameter to this? That is because we only do that when including the header.

Now all you need in between is your HTML, and possibly some variables.

Some variables you can use in your smarty templates:
`$player->username` 'displays the player's name.
`$player->bank` 'displays the amount of money in the player's bank
`$player->money` 'displays the amount of money the player has
`$player->energy` 'displays the amount of energy of the player
`$player->hp` 'displays the player's health
`$player->damage` 'displays the player's damage
and several more are available, just look in the source!

What? You want more then just ezRPG? SIMPLE! all you have to do is assign your variable like so:
```
$str = "Something";
$this->tpl->assign('Name', $str);
```
ezRPG will automatically be able to use these variables in whichever tpl you display!

## **Editing modules, prettying up:** ##
If you want to include your own design, it is super easy with ezRPG(hence the "ez" part of the name).

All you have to do is edit your header.tpl file, and create your own or edit the existing style.css file. Your modules will all use your header's colors unless otherwise specified.

A program that makes my HTML programming fun is Microsoft Expression.