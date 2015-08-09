

# Introduction #

If you're writing a module that should require human verification (a captcha), you can use the built-in ezRPG captcha if you want! This is the same one that is used in the Register module to make sure you don't get bots signing up to your game.

# Template file #
First you need to add a captcha form. If you already have a form, all you need to do is display the captcha image, then add an input field for the player to input the code:

```
<label>Enter The Code</label>
<img src="./captcha.php" /><br />
<input type="text" size="40" name="captcha" autocomplete="off" />
```

The **name** of the input field is important, you will need to remember it for your code.

# Checking the captcha #
The following code can be inserted to where you are checking the form and any other input fields. It is pretty much a copy of the same code used in the Register module.

```
//Check verification code
if (empty($_POST['captcha']))
{
    $errors[] = 'You didn\'t enter the verification code!';
    $error = 1;
}
else if ($_SESSION['captcha'] != sha1(strtoupper($_POST['captcha']) . SECRET_KEY))
{
    $errors[] = 'You didn\'t enter the correct verification code!';
    $error = 1;
}

//session data must NOT be used again.
unset($_SESSION['captcha']);
```

You may want to change the error messages or error handling as you may have done it differently.

The last line of unsetting the session data is **important**, you must remember to unset the captcha session after you use it. This is important for security so that each captcha image can only be used once.