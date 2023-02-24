<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="sign-outer-wrapper row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="sign-wrapper signin-wrapper card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row p-lg-5 p-3 py-lg-5 py-5">
                        <div class="img-login col-lg-6 px-4 d-lg-flex d-none">
                            <img class="img-fluid" src="<?=assets("img/undraw_posting_photo.svg")?>" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="right-side-content">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Selamat Datang di Sistem Pembayaran SPP</h1>
                                </div>
                                <form method="post" action="<?=baseurl?>auth/login" class="user">
                                    <div class="form-group">
                                        <label for="InputUsername">Username</label>
                                        <input type="text" name="username" class="form-control form-control-user"
                                               id="InputUsername" aria-describedby="usernameHelp"
                                               placeholder="Enter username..">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputPassword">Password</label>
                                        <input type="password" name="password" class="form-control form-control-user"
                                               id="InputPassword" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
