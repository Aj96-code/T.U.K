<nav class="navbar navbar-light navbar-expand-md sticky-top py-3">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span class="fw-bold">T.U.K</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1" style="border-style: none;border-color: #dfe3e7;">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link active" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="/products">Products</a></li>
                <?php if($_SESSION["loggedIn"]){  ?>
                    <li class="nav-item"><a class="nav-link" href="/profile">Profile</a></li>
                <?php }?>
                <?php if($_SESSION["role"] === "admin"){  ?>
                    <li class="nav-item"><a class="nav-link" href="/dashboard">DashBoard</a></li>
                
                <?php }?> 
            </ul>
                <?php if($_SESSION["role"] === "admin"){  ?>
                    <p class="mt-2 m-2 fw-semibold " >Welcome Admin</p>
                
                <?php }?> 
            <a class="btn bg-white" type="button" style="margin-right: 14px;" href="cart">Cart<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20" fill="none" style="margin-left: 14px;">
                    <path d="M3 1C2.44772 1 2 1.44772 2 2C2 2.55228 2.44772 3 3 3H4.21922L4.52478 4.22224C4.52799 4.23637 4.5315 4.25039 4.5353 4.26429L5.89253 9.69321L4.99995 10.5858C3.74002 11.8457 4.63235 14 6.41416 14H15C15.5522 14 16 13.5523 16 13C16 12.4477 15.5522 12 15 12L6.41417 12L7.41416 11H14C14.3788 11 14.725 10.786 14.8944 10.4472L17.8944 4.44721C18.0494 4.13723 18.0329 3.76909 17.8507 3.47427C17.6684 3.17945 17.3466 3 17 3H6.28078L5.97014 1.75746C5.85885 1.3123 5.45887 1 5 1H3Z" fill="currentColor"></path>
                    <path d="M16 16.5C16 17.3284 15.3284 18 14.5 18C13.6716 18 13 17.3284 13 16.5C13 15.6716 13.6716 15 14.5 15C15.3284 15 16 15.6716 16 16.5Z" fill="currentColor"></path>
                    <path d="M6.5 18C7.32843 18 8 17.3284 8 16.5C8 15.6716 7.32843 15 6.5 15C5.67157 15 5 15.6716 5 16.5C5 17.3284 5.67157 18 6.5 18Z" fill="currentColor"></path>
                </svg></a>
                
                <?php if($_SESSION["loggedIn"]){?>
                <a class="btn btn-dark" type="button" href="logout">Log out<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="margin-left: 10px;">
                    <path d="M15.4857 20H19.4857C20.5903 20 21.4857 19.1046 21.4857 18V6C21.4857 4.89543 20.5903 4 19.4857 4H15.4857V6H19.4857V18H15.4857V20Z" fill="currentColor"></path>
                    <path d="M10.1582 17.385L8.73801 15.9768L12.6572 12.0242L3.51428 12.0242C2.96199 12.0242 2.51428 11.5765 2.51428 11.0242C2.51429 10.4719 2.962 10.0242 3.51429 10.0242L12.6765 10.0242L8.69599 6.0774L10.1042 4.6572L16.4951 10.9941L10.1582 17.385Z" fill="currentColor"></path>
                </svg></a>
               <?php }else{ ?> 
                    <a class="btn btn-dark" type="button" href="login">Login<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="margin-left: 10px;">
                    <path d="M15.4857 20H19.4857C20.5903 20 21.4857 19.1046 21.4857 18V6C21.4857 4.89543 20.5903 4 19.4857 4H15.4857V6H19.4857V18H15.4857V20Z" fill="currentColor"></path>
                    <path d="M10.1582 17.385L8.73801 15.9768L12.6572 12.0242L3.51428 12.0242C2.96199 12.0242 2.51428 11.5765 2.51428 11.0242C2.51429 10.4719 2.962 10.0242 3.51429 10.0242L12.6765 10.0242L8.69599 6.0774L10.1042 4.6572L16.4951 10.9941L10.1582 17.385Z" fill="currentColor"></path>
                    </svg></a>
                <?php }?>

        </div>
    </div>
</nav>