<?

require_once 'config.php';

$connect = mysqli_connect($config_database['host'], $config_database['user'], $config_database['password'], $config_database['database']);

if (!$connect) {
   die(mysqli_connect_errno());
}

?>