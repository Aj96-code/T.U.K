<h1 class="text-center mt-md-2">Log in</h1>
    <section class="d-md-flex justify-content-md-center align-items-md-center position-relative py-4 py-xl-5">
        <div class="container d-md-flex justify-content-md-center">
            <div class="card d-md-flex justify-content-md-center align-items-md-center mb-5">
                <div class="card-body d-flex flex-column align-items-center">
                    <div class="bs-icon-xl bs-icon-circle bs-icon-primary bg-dark bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                        </svg></div>
                    <form class="text-center" action="/auth" method="post">
                        <div class="mb-3"><input class="form-control" type="text" required name="username" placeholder="User Name"></div>
                        <div class="mb-3"><input class="form-control" type="password" required name="password" placeholder="Password"></div>
                        <div class="mb-3"><button class="btn btn-dark d-block w-100" type="submit">Login</button></div>

                        <a href="/registration"> Create an Account<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="margin-left: 10px;">
                            <path d="M15.4857 20H19.4857C20.5903 20 21.4857 19.1046 21.4857 18V6C21.4857 4.89543 20.5903 4 19.4857 4H15.4857V6H19.4857V18H15.4857V20Z" fill="currentColor"></path>
                            <path d="M10.1582 17.385L8.73801 15.9768L12.6572 12.0242L3.51428 12.0242C2.96199 12.0242 2.51428 11.5765 2.51428 11.0242C2.51429 10.4719 2.962 10.0242 3.51429 10.0242L12.6765 10.0242L8.69599 6.0774L10.1042 4.6572L16.4951 10.9941L10.1582 17.385Z" fill="currentColor"></path>
                        </svg></a>
                    </form>
                </div>
            </div>
        </div>
    </section>