<?php
if($_SERVER['HTTP_HOST'] == "localhost")
{
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_DATABASE', 'student-web-app');
    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
}
elseif($_SERVER['HTTP_HOST'] == "mysql.cms.gre.ac.uk"){
    define('DB_SERVER', 'mysql.cms.gre.ac.uk');
    define('DB_USERNAME', 'eo5426c');
    define('DB_PASSWORD', 'eo5426c');
    define('DB_DATABASE', 'mdb_eo5426c');
    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
}
else{
    die("Check DatabaseConfig.php for hostname");
}
?>