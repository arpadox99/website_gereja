<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-image: url('../img/bgad.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header text-bg-warning">
                        <h3 class="text-center text-light fw-bold my-4"> Create Account </h3>
                    </div>
                    <div class="card-body">
                        <form class="register-form" action="index.php?page=addaccount" method="POST">
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="InputUsername" type="text" name="username" placeholder="Enter your username" required="" autocomplete="off">
                                            <label for="InputUsername"> Username </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="InputFullname" type="text" name="full_name" placeholder="Enter your full name" required="" autocomplete="off">
                                            <label for="InputFullname"> Full Name </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Enter your password" required="" autocomplete="off">
                                            <label for="inputPassword"> Password </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="Role" type="role" name="role" value="ADMIN">
                                            <label for="Role"> Role </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="login" class="btn btn-primary"> Create Account </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>