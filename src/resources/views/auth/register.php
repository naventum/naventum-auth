<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?= __('/assets/css/bootstrap.min.css') ?>" />
</head>

<body>

    <form action="" method="POST" class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="text-center mb-4">
                    <h2><?= __(config('app')->name) ?></h2>
                </div>

                <div class="card">
                    <div class="card-header">
                        Register
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <?php foreach (session()->getFlashData('errors', []) as $error) : ?>
                                <div class="text-danger"><?= __($error) ?></div>
                            <?php endforeach ?>
                        </div>
                        <div class="mb-4">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" />
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" />
                        </div>
                        <div class="mb-4">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" />
                        </div>
                        <div class="mb-4 text-end">
                            <a href="/auth/login">I already have an account</a>
                        </div>
                        <button class="btn btn-primary text-light">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="<?= __('/assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>