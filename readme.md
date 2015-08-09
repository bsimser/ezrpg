How to Install
---

1. Extract all the files from the archive into a folder on your web host.
2. Go into PHPMyAdmin or any other database manager, and create a database for the game.
Remember the table name and username/password.
3. Edit config.php to match your database settings.
4. Open sql.txt and copy and paste the SQL queries into your database manager, or upload the file to automatically create the tables.
5. Move the cron folder to somewhere where your users can't access it (such as the root folder)
or change the folder name and file names.
6. Go into your control panel to set the cron tab for the cron files.
Set reset.php to once a day, and revive.php to once every few hours (your choice of how often).
If you can't use cron tabs, than just visit these files in your web browser manually every day.
7. Check to make sure the game works and that you followed all the instructions correctly.

Good luck in entering the world of browser-based games!

Add weapons/armour
---

1. Go into your database manager and open the 'blueprint_items' table (NOT the 'items' table!)
2. Insert a new row, and fill in the values for 'name', 'description', 'type', 'effectiveness', and 'price'.
  * 'name' - The name of the item
  * 'description' - A description of the item
  * 'type' - Either 'weapon' or 'armour'
  * 'effectiveness' - The power of the item
  * 'price' - how much it costs
