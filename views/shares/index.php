<?php redirect('shares');?>
<div>
    <a class="btn btn-success mt-2 mb-2" href="<?= ROOT_URL; ?>shares/add">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
            <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
        </svg>
        Share
    </a>
    <?php if (!empty($viewModel)): foreach ($viewModel as $item):;?>
    <div class="bg-light">
        <h4><?= $item['title'];?></h4>
        <small><?= $item['create_date'];?></small>
        <hr>
        <p><?= $item['body'];?></p>
        <br>
        <a href="<?= $item['link'] ;?>" class="btn btn-outline-success">Go To Link</a>
        <?php if (isset($_COOKIE['userRights']) && $_COOKIE['userRights'] === "ADMIN"):;?>
        <form method="post" action="<?php ROOT_URL;?>shares/delete" class="mt-5">
            <input type="hidden" value="<?= $item['id'];?>" name="id">
			<input class="btn btn-danger" name="delete" value="Delete" type="submit">
		</form>
        <?php endif;?>
    </div><br>
    <?php endforeach;endif?>
</div>
