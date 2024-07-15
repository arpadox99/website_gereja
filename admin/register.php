<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Create Account</h3>
                    </div>
                    <div class="card-body">
                        <form class="register-form" action="index.php?page=addaccount" method="POST">
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="InputUsername" type="text" name="username" placeholder="Enter your username" required="" autocomplete="off">
                                            <label for="InputUsername"> Username</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="InputFullname" type="text" name="full_name" placeholder="Enter your full name" required="" autocomplete="off">
                                            <label for="InputFullname"> Full Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Enter your password" required="" autocomplete="off">
                                            <label for="inputPassword"> Password</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="login" class="btn btn-primary">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>