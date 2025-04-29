<?php
$conn = pg_connect("host=db dbname=php_site user=postgres password=password")
   or die("Connection error: " . pg_last_error());
?>