<?php
//This can be used without error string, or can redirect to error page.
$connect_error = 'Sorry we are experiencing connection problems';
mysql_connect('localhost', 'root', 'at7370jarrlato' );
mysql_select_db('lr') or die($connect_error);

?>