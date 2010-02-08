<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
  Class: DbException
  Extends Exception class to specify a database error.

  Example (throwing an exception):
  > throw new DbException('tablename', DATABASE_ERROR);
  > throw new DbException($this->db, SERVER_ERROR);
  > throw new DbException($query, SQL_ERROR);

  See Also:
  - <DbFactory>
  - <Error Codes>
*/
class DbException extends Exception
{
    /*
      Function: __toString
      Formats and returns the error file, line and message.
	
      Uses die() to print the formatted error message and to stop further execution of any code.
	
      Example Usage:
      > try
      > {
      >     //Failed sql query
      > }
      > catch (DbException $e)
      > {
      >     $e->__toString(); //Display the error page. This will stop further execution of the script.
      > }
    */
    public function __toString()
    {
        switch($this->code)
        {
          case DRIVER_ERROR: //Could not connect to server
              $this->message = 'Could not find driver: ' . $this->message;
              break;
          case SERVER_ERROR: //Could not connect to server
              $this->message = 'Could not connect to database server!';
              break;
          case DATABASE_ERROR: //Could not select database
              $this->message = 'Could not select database: ' . $this->message;
              break;
          case SQL_ERROR: //SQL error
              break;
          default:
              break;
        }
		
        $ret = '<html>';
        $ret .= '<head>';
        $ret .= '<title>ezRPG Error!</title>';
        $ret .= '<style>';
        $ret .= '#error { width: 50%; margin: auto; font: 0.8em  Verdana, Arial, Sans-serif; color: #666; padding: 10px; border: 1px solid #3182C0; }';
        $ret .= '</style>';
        $ret .= '</head>';
        $ret .= '<body>';
        $ret .= '<div id="error">';
        $ret .= '<h1>ezRPG</h1>';
        $ret .= '<p><strong>Error: ' . __CLASS__ . '!</strong><br />';
        $ret .= '<strong>File</strong>: ' . $this->file . '<br />';
        $ret .= '<strong>Line</strong>: ' . $this->line . '<br /><br />';
        $ret .= $this->message;
        $ret .= '<br /><br />';
        $ret .= '<strong>Stack Trace:</strong><br />';
        $ret .= nl2br($this->getTraceAsString());
        $ret .= '</p></div>';
        $ret .= '</body></html>';
		
        die($ret);
    }
}
?>