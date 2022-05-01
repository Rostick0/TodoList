<?

require_once './include/connect.php';

function interaction($param, $http_method, $id) {
    $param = ucfirst($param);
    $param = rtrim($param, 's');

    switch ($http_method) {
        case 'GET':
            if (empty($id)) {
                $param::getData();
            } else {
                $param::getOne($id);
            }
            break;
        case 'POST':
            if (empty($id)) {
                $param::createData($_POST);
            } else {
                $param::updateData($_POST, $id);
            }
            break;
        case 'DELETE':
            $param::deleteData($id);
            break;
    }
}

?>