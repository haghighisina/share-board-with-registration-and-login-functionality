<?php require_once __DIR__ . '/../../success.php';?>
<div>
    <h1><i>if You have something to share, here is the best place for you :)<i/></h1>
    <?php if (isset($_COOKIE['user_id']) && !empty($_COOKIE['user_id'])):;?>
        <a class="btn btn-primary text-center" href="<?= ROOT_URL;?>shares">Shares</a>
    <?php elseif (!isset($_COOKIE['user_id']) && empty($_COOKIE['user_id'])):;?>
        <h1><i>if You want to share your idea you must login first ;)<i/></h1>
    <?php endif;?>
</div>