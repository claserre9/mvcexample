<?php require APPROOT . '/views/inc/header.php';
if (isset($data['title'])) {
    echo '<h1>' . $data['title'] . '</h1>';
}
require APPROOT . '/views/inc/footer.php';
