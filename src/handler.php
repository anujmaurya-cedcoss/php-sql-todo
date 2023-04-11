<?php
// $conn = mysqli_connect("mysql-server", "root", "secret", "todo");
include('config.php');
$type = $_POST['type'];

function displayComplete($conn)
{
    $sql = "SELECT * FROM todoList WHERE `position` = 'inactive'";
    $result = mysqli_query($conn, $sql);
    $res = "";
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $res .= "<li class=\"list-group-item d-flex justify-content-between border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2\">
                        <div class=\"d-flex\">
                            <input class=\"form-check-input me-2 toggle-item\" type=\"checkbox\" checked id = '$row[id]'
                                />
                        </div>
                        <input type=\"text\" id = '$row[id]' class = 'ip' name=\"lname\" disabled value = '$row[title]'>
                        <button class = \"delete-btn btn-danger\" id = '$row[id]'>X</button>
                    </li>";
        }
    }
    return $res;
}

function displayIncomplete($conn)
{
    include_once('config.php');
    $sql = "SELECT * FROM todoList WHERE `position` = 'active'";
    $result = mysqli_query($conn, $sql);
    $res = "";
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $res .= "<li class=\"list-group-item d-flex justify-content-between border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2\">
                        <div class=\"d-flex\">
                            <input class=\"form-check-input me-2 toggle-item\" type=\"checkbox\" id = '$row[id]'
                                />
                        </div>
                        <input type=\"text\" id = '$row[id]' class = 'ip' name=\"lname\" value = '$row[title]'>
                        <button class = \"delete-btn btn-danger\" id = '$row[id]'>X</button>
                    </li>";
        }
    }
    return $res;
}
switch ($type) {
    case 'add':
        // date is yet not added
        $title = $_POST['title'];
        $dt = $_POST['date'];
        $sql = "INSERT INTO todoList (`title`, `ex_date`) 
                    VALUES ('$title', '$dt')";
        $result = mysqli_query($conn, $sql);
        echo "<pre></pre>";
        print_r($sql);
        break;
    case 'display':
        $param = $_POST['param'];
        switch ($param) {
            case 'complete':
                echo displayComplete($conn);
                break;

            case 'incomplete':
                echo displayIncomplete($conn);
                break;

            default:
                echo displayIncomplete($conn);
                echo displayComplete($conn);
                break;
        }

    case 'toggle':
        // echo "<pre></pre>";
        // print_r($_POST);
        if (isset($_POST['id'])) {
            $idx = $_POST['id'];
            $sql = "SELECT `position` FROM todoList WHERE `id` = '$idx'";
            $res = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($res);
            $curr_status = $row['position'];
            $dest = "active";
            if ($curr_status == 'active') {
                $dest = 'inactive';
            }
            $sql = "UPDATE todoList SET `position` = '$dest' WHERE `id` = '$idx'";
            $res = mysqli_query($conn, $sql);
        }
        break;

    case 'delete':
        $id = $_POST['id'];
        $sql = "DELETE FROM `todoList` WHERE `id` = '$id'";
        $res = mysqli_query($conn, $sql);
        echo "<pre></pre>";
        print_r($_POST);
        echo $id;
        break;

    case 'clear_completed':
        $sql = "DELETE FROM `todoList` WHERE `position` = 'inactive'";
        $res = mysqli_query($conn, $sql);
    default:
        # code...
        break;
}

?>