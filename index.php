<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>

<body class="bg-dark">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 offset-md-4 mt-5 bg-light shadow p-5 rounded rounded-lg">
                <div class="text-center mb-3">
                    <img src="./assets/img/logo.png" width="150" alt="">
                </div>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control bg-dark text-light">
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control bg-dark text-light">
                    </div>
                    <button class="btn btn-primary" type="submit" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>