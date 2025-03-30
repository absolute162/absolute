<?php

    require_once 'config.php';

    if (isset($_POST['query'])) {
        $inputText = $_POST['query'];
        $sql = "SELECT fname FROM shooting_game WHERE fname LIKE :name";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['name' => '%' . $inputText . '%' ]);
        $result = $stmt->fetchAll();

        if ($result) {
            foreach($result as $row) {
                echo '<a class="list-group-item list-group-item-action border-1">' . $row['fname'] . '</a>';
            }
        } else {
            echo '<p class="list-group-item border-1">ไม่พบข้อมูล</p>';
        }
    }

?>