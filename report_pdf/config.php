<?php
      /*
	  $host="127.0.0.1";
	  $us="root";
	  $ps="1234";
	  $DB="kkhp";
	  */
	  
	  /*   
Database:
hmprecru_kkhp
Host:
localhost
Username:
hmprecru_kkhp
Password:
hmprecru1234
*/
        
	  $host="localhost";
	  $us="hmprecru_kkhp";
	  $ps="hmprecru1234";
	  $DB="hmprecru_kkhp";


	  $connect=mysql_connect($host,$us,$ps) or die("Can't conect MYSQL server!!!");
	  if( !$connect )
	  {
	      echo "Can't conect MYSQL server!!!";  
	  }
	  mysql_select_db($DB);
	  mysql_query("SET NAMES UTF8");

?>
