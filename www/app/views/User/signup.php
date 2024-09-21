<?php
    $login = h($_SESSION['form_data']['login'] ?? '');
    $name = h($_SESSION['form_data']['name'] ?? '');
    $email = h($_SESSION['form_data']['email'] ?? '');
?>

<h2>Sign up</h2>
<div class="row">
    <div class="col-md-6">
        <form action="/user/signup" method="post">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" name="login" class="form-control" id="login" placeholder="Login" value="<?= $login ?>">
            </div>
            <div class="form-group">
                <label for="pasword">Password</label>
                <input type="password" name="password" class="form-control" id="pasword" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?= $name ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?= $email ?>">
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>
        </form>
        <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']) ?>
    </div>
</div>













