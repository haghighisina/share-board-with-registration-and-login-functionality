<div>
    <a class="btn btn-success mt-2 mb-2" href="<?= ROOT_PATH; ?>shares/add">Share</a>
    <?php foreach ($viewModel as $item):;?>
    <div class="well">
        <h4><?= $item['title'];?></h4>
        <small><?= $item['create_date'];?></small>
        <hr>
        <p><?= $item['body'];?></p>
        <br>
        <a class="btn btn-default" href="<?= $item['link'];?>" target="_blank">Return to Home</a>
    </div>
    <?php endforeach;?>
</div>
