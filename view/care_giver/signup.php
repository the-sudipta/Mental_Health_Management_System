<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="../css/main.css" rel="stylesheet">

</head>

<body>

    <div class="main pt-5 pb-5">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 offset-lg-2 offset-md-0">
                        <div class="signup-content box bg-white d-lg-flex justify-content-between align-items-center p-5 border shadow-sm p-3 mb-5 bg-body rounded cust-box-shadow">
                            <div class="signup-form w-100 mb-2">
                                <h2 class="form-title mb-3">Sign up</h2>
                                <form method="POST" class="register-form" id="register-form">
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Full Name</label>
                                        <input type="text" name="name" class="form-control" id="name" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="number" class="form-label">Number</label>
                                        <input type="number" name="number" class="form-control" id="email" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-select" name="gender" aria-label="Default select example">
                                            <option selected>Select</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                              
                                    <div class="form-group mb-3">
                                        <label for="pass" class="form-label">Password</label>
                                        <input type="password" name="pass" class="form-control" id="pass" />
                                    </div>


                                    <div class="form-group form-button">
                                        <input type="submit" name="signup" id="signup" class="form-submit btn-primary btn mt-3 w-100" value="Register" />
                                        <a href="../login.php" class="mt-3 d-block">Already a member? Sign in</a>

                                    </div>
                                </form>
                            </div>
                            <div class="signup-image text-center w-100">
                                <figure><img src="../../img/signup.png" class="img-fluid" alt="sing up image"></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

</body>

</html>
