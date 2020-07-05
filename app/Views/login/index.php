<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fonts/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fonts/ionicons.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/-Login-form-Page-BS4-.css'); ?>">    
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css'); ?>">
</head>

<body>
    <div class="container-fluid">
        <div class="row mh-100vh">
            <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
                <div class="m-auto w-lg-75 w-xl-50">
                    <h2 class="text-info font-weight-light"><i class="fa fa-diamond"></i>E-kantin</h2>
                    <p>Make canteen transaction easier</p>
                    <form>
                        <div class="form-group">
                            <label class="text-secondary">Username</label>
                            <input class="form-control" type="text" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,15}$" autofocus>
                        </div>
                        <div class="form-group">
                            <label class="text-secondary">Password</label>
                            <input class="form-control" type="password" required="">
                        </div>
                        <button class="btn btn-info mt-2" type="submit">Log In</button>
                    </form>
                    <!-- <p class="mt-3 mb-0"><a class="text-info small" href="">Doesen't have an account? Registr now!</a></p> -->
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-end aladin" id="bg-block">
                <!-- <p class="ml-auto small text-dark mb-2"><em>Photo by&nbsp;</em><a class="text-dark" href="https://unsplash.com/photos/v0zVmWULYTg?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText" target="_blank"><em>Aldain Austria</em></a><br></p> -->
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url("assets/js/jquery.nicescroll.min.js"); ?>"></script>
</body>

</html>