<?php

function open() {
    $servername = "103.145.78.83";
    $username = "admin";
    $password = "1234@Abcd";
    $dbname = "recruitment";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("connect fail: " . $conn->connect_error);
    }
    return $conn;
}

function close($conn){
    return $conn->close();
}


function select($conn, $sql) {
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = [];
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } else {
        return [];
    }
}

?>