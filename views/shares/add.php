<?php redirect('add');?>
<div class="panel panel-default bg-light mt-5">
    <div class="panel-heading">
        <h5 class="panel-heading"><i>Share your Ideas</i></h5>
    </div>
    <div class="panel-body">
        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ;?>">
            <div class="form-group">
                <label>The Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label>The Body</label>
                <textarea name="body" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>The Link</label>
                <input type="text" name="link" class="form-control">
            </div>
            <input class="btn btn-primary mt-2" name="submit" type="submit" value="Submit">
        </form>
        <a class="btn btn-danger mt-2" href="<?= ROOT_URL; ?>shares">Cancel</a>
    </div>
</div>