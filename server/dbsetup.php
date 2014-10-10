<?php

// File: dbsetup.php
// Purpose: load PEAR DB library and initialize
// Modified: 2014-02-20
//echo phpinfo();
$dbtype = 'mysql';
$dbuser = 'tlithrtw';
$dbpass = 'qweasz';
$dbname = 'tlithrtw_test';
$dbhost = 'localhost';
$dsn = "$dbtype:host=$dbhost;dbname=$dbname";

$curhost = php_uname('n');

try {
    $db = new PDO($dsn, $dbuser, $dbpass);
}
catch (PDOException $e) {
    echo "Connection Error! (" . $e->getMessage() . ")</p>";
    die();
}


?>
