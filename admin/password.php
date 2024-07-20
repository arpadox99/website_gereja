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
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header text-bg-danger">
                        <h3 class="text-center text-light fw-bold my-4"> Change Password </h3>
                    </div>
                    <div class="card-body">
                        <div class="small mb-3 text-muted"> Enter username. </div>
                        <form action="index.php?page=passwordcheck" method="POST">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="username" name="username" type="text" placeholder="name@example.com" />
                                <label for="username"> Username </label>
                            </div>
                            <div class="text-center mt-4 mb-0">
                                <button class="btn btn-primary" type="submit"> Reset Password </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>