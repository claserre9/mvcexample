<?php require APPROOT . '/views/inc/header.php';
if (isset($data['title'])) {
    echo '<h1>' . $data['title'] . '</h1>';
}

if (isset($data['posts'])) {
    echo '<ul>' ?>
    <?php foreach ($data['posts'] as $p) {
        echo '<li>' . $p->title . '</li>';
    } ?>
    <?php echo '</ul>';

}
require APPROOT . '/views/inc/footer.php';

