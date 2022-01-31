<?php
if (isset( $_SESSION['error']) && !empty( $_SESSION['error'])){
    foreach ($_SESSION['error'] as $error):;?>
        <div class='alert alert-danger' role='alert'>
            <span ><?= $error ?? '';?></span>
        </div>
    <?php endforeach;unset($_SESSION['error'])?>
<?php };?>