<?

class Post {
    static public function getData() {
        global $connect;
        $query = mysqli_query($connect, "SELECT * FROM `posts`");
    
        $result = [];
    
        while($data = mysqli_fetch_assoc($query)) {
            $result[] = $data;
        }
    
        if (empty($result)) {
            http_response_code(400);
    
            $result = [
                'message' => 'Not found'
            ];
        }
    
        echo json_encode($result);
    }
    
    static public function getOne($id) {
        global $connect;
        $query = mysqli_query($connect, "SELECT * FROM `posts` WHERE `id` = '$id'");
    
        $result = mysqli_fetch_assoc($query);
    
        if (empty($result)) {
            http_response_code(400);
    
            $result = [
                'message' => 'Not found'
            ];
        }
    
        echo json_encode($result);
    }
    
    static public function createData($array_data) {
        global $connect;
        $id = (integer) $array_data['id'];
        $title = htmlspecialchars(addslashes($array_data['title']));
        $body = htmlspecialchars(addslashes($array_data['body']));
    
        $query = mysqli_query($connect, "INSERT INTO `posts` (`id`,`title`, `body`) VALUES ('$id', '$title', '$body')");
    
        $res = [
            'message' => 'Created'
        ];
    
        if (!$query) {
            $res = [
                'message' => 'Has not been created'
            ];
        }
    
        echo json_encode($res);
    }
    
    static public function updateData($array_data, $id) {
        global $connect;
        $title = htmlspecialchars(addslashes($array_data['title']));
        $body = htmlspecialchars(addslashes($array_data['body']));
    
        $query = mysqli_query($connect, "UPDATE `posts` SET `title` = '$title', `body` = '$body' WHERE `id` = '$id'");
    
        $res = [
            'message' => 'Updated'
        ];
    
        if (!$query) {
            $res = [
                'message' => 'Has not been updated'
            ];
        }
    
        echo json_encode($res);
    }
    
    static public function deleteData($id) {
        global $connect;
        $query = mysqli_query($connect, "DELETE FROM `posts` WHERE `id` = '$id'");
    
        $res = [
            'message' => 'Post deleted'
        ];
    
        if (!$query) {
            $res = [
                'message' => 'Post has not been deleted'
            ];
        }
    
        echo json_encode($res);
    }
}

?>