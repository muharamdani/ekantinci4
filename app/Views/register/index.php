<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ekantin</title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fonts/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fonts/ionicons.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/Registration-Form-with-Photo.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css'); ?>">
</head>

<body>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form method="post">
                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username"></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                <div class="form-group"><input class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)"></div>
                <div class="form-group">
                    <select class="form-control">
                        <option value="pedagang">Pedagang</option>
                        <option value="pembeli">Pembeli</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox">I agree to the license terms.</label></div>
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Sign Up</button></div><a class="already" href="<?= base_url(); ?>">You already have an account? Login here.</a></form>
        </div>
    </div>
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url("assets/js/jquery.nicescroll.min.js"); ?>"></script>
</body>

</html>