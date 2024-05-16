<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="css/main.css" rel="stylesheet">

</head>

<body>

    <div class="main pt-5 pb-5">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 offset-lg-2 offset-md-0">
                        <div class="signup-content box bg-white d-lg-flex justify-content-between p-5 border shadow-sm p-3 mb-5 bg-body rounded cust-box-shadow">
                            <div class="signin-image text-center w-100">
                                <figure><img src="img/signin-image.jpg" class="img-fluid" alt="sing up image"></figure>
                            </div>

                            <div class="signin-form w-100">
                                <h2 class="form-title mb-3">Sign In</h2>
                                <form method="POST" class="register-form" id="login-form">
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="pass" class="form-label">Password</label>
                                        <input type="password" name="pass" class="form-control" id="pass" />
                                    </div>
                                    <div class="form-group form-button">
                                        <input type="submit" name="singin" id="singin" class="form-submit btn-primary btn mt-3 w-100" value="Sign In" />
                                        <a href="register.html" class="mt-3 d-block">Create an account</a>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

</body>

</html>
