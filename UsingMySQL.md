

# Introduction #

Even though you may be familiar with MySQL, you might not be able to see immediately how the database is communicated with in ezRPG.

That's because ezRPG uses its own database class that wraps many native mysql functions so it is easier for you to use! Within modules, you will use the object **$this->db** to communicate with the database.

# The Database #

Each ezRPG game installation may choose their own table name prefix. So instead of having a table named `````**players**`````, a game might have a table named `````**ezrpg\_players**````` or `````**game\_players**`````.

You can deal with this problem by prefixing the table name in your queries with **`<`ezrpg`>`**, for example `````**`<`ezrpg`>`players**`````.

The database class will automatically replace **`<`ezrpg`>`** with the prefix stored in the configuration file.

# Executing Queries #

Here's an example of executing a simple query on the database:

```
$this->db->execute('UPDATE `<ezrpg>players` SET `money`=100 WHERE `id`=1');
```

This is a pretty straightforward query for when you don't care about the result set, such as updating a row.

Here is an introduction to parameter binding, an easy way to use variables in your query and protecting your query from SQL injections at the same time:

```
$this->db->execute('UPDATE `<ezrpg>players` SET `money`=? WHERE `id`=?', array($money, $this->player->id));
```

The question marks in the query represent where you want to insert a variable. This is called binding a variable to a query. The question marks will be replaced by the variables you passed in the array as the next parameter.

The order of the question marks will match the order of the variables in the array.

The above function will produce a query like this:

```
UPDATE `prefix_players` SET `money`=15 WHERE `id`=1
```

Note that you do not need to surround the question mark symbols with quotation marks. If the variable bound to that particular symbol is a string, then that string will be formatted correctly for your query without causing any syntax errors.

# Retrieving Rows #

## Getting a single row ##

```
$result = $this->db->fetchRow('SELECT `id`, `username` FROM `<ezrpg>players` WHERE `id`=0');

echo $result->id; //prints 0
echo $result->username; //print the player's username
```

**$this->db->fetchRow()** will fetch a single row and return an object. With this object you can access all the column data you selected in the query.

## Selecting many rows ##

This is an example of how to select more than one row at a time, then looping over them individually.

```
//Select the first 5 members
$query = $this->db->execute('SELECT `id`, `username` FROM `<ezrpg>players` WHERE `id`<=5');

//Loop through each result
while ($row = $this->db->fetch($query)
{
    echo $row->id; //prints 0
    echo $row->username; //print the player's username
}
```

# Inserting Data #

You can insert data by simply executing a query, but there is also a more intuitive method of inserting data with arrays!

```
$insert = Array(); //Create a new array

//Add the data you want to insert to the array
$insert['username'] = 'Andy';
$insert['password'] = 'a9629b9e1cd5792effb62';
$insert['email'] = 'email@domain.com';
$insert['registered'] = time();

$new_player = $this->db->insert('<ezrpg>players', $insert);
```

As you can see, the insert array should be a direct map to the table you are inserting to. Make sure you add all the data that you need, and do not add data that does not have a corresponding column in the table!

# More Info #

The database class also contains some more useful functions that you might want to take advantage of. For more information on the database class, check out the [documentation](http://ezrpg.googlecode.com/hg/Docs/files/lib/db-mysql-php.html) for the mysql driver.

There are examples for most of the methods in the class, and you can always take a look at the existing modules if you want to see a real application of the database class.