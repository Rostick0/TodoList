<?

require_once './include/connect.php';
require_once 'functions.php';
require_once 'post.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *, Authorization');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json; charset=utf-8');

$q = addslashes($_GET['q']);
$param = explode('/', $q);
$id = (integer) $param[1];

$http_method = $_SERVER['REQUEST_METHOD'];

interaction($param[0], $http_method, $id)

?>