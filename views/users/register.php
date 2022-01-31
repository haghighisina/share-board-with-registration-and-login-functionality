<?php require_once __DIR__.'/../../error.php';?>
<div class="panel panel-default bg-light mt-5">
    <div class="panel-heading">
        <h5 class="panel-heading"><i>Registration</i></h5>
    </div>
    <div class="panel-body">
        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ;?>">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="email" type="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <input class="btn btn-primary mt-2" name="submit" type="submit" value="Submit">
        </form>
    </div>
</div>