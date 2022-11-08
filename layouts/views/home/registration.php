    <section>
        <div class="container">
            <section class="position-relative py-4 py-xl-5">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 col-xl-6 text-center mx-auto">
                            <h2>Registration</h2>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                            <?php
                                session_start();
                                    if(isset($_SESSION["errorMessage"]))
                                    {
                                        $errorMessage = $_SESSION["errorMessage"];
                                        require_once("./layouts/shared/error.php");
                                        unset($_SESSION["errorMessage"]);
                                    }
                            ?>

                        <div class="col-md-11 col-lg-8 col-xl-8 col-xxl-8">
                            <div class="card mb-5">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div class="bs-icon-xl bs-icon-circle bs-icon-primary text-bg-dark bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                        </svg></div>
                                    <form class="text-center" action="/addUser" method="post" enctype="multipart/form-data" >
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col">
                                                     <input class="form-control" type="text" name="firstName" required placeholder="First Name">
                                                </div>
                                                <div class="col">
                                                    <input class="form-control" type="text" name="lastName" required placeholder="Last Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <select class="form-select form-select-sm" name="gender" >
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                        <div class="mb-3"><input class="form-control form-control-sm mt-md-1" type="file" placeholder="Profile Image" name="image"></div>
                                        <div class="mb-3"><input class="form-control" type="text" name="username" required placeholder="User Name"></div>
                                        <div class="mb-3"><input class="form-control" type="email" name="email" required placeholder="Email"></div>
                                        <div class="mb-3"><input class="form-control" type="password" name="password" required placeholder="Password"></div>
                                        <div class="mb-3"><input class="form-control" type="password" name="confirmPassword" required placeholder="Confirm Password"></div>
                                        <div class="mb-3"><button class="btn btn-dark fw-semibold d-block w-100" name="submit" type="submit">Register</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>