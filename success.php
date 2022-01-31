<?php
if (isset( $_SESSION['success']) && !empty( $_SESSION['success'])){
    foreach ($_SESSION['success'] as $error):;?>
        <div class='alert alert-success' role='alert'>
            <span ><?= $error ?? [];?></span>
        </div>
    <?php endforeach;unset($_SESSION['success'])?>
<?php };?>