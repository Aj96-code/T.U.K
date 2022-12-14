
<section class="mt-5">
            <h1 class="text-center mb-md-5">User Form</h1>
        <form class="my-md-3 mb-4 was-validated" method="post" action="/user-edit" enctype="multipart/form-data">
            <?php 
                session_start();
                if(isset($_SESSION["errorMessage"]))
                {
                    $errorMessage = $_SESSION["errorMessage"];
                    unset($_SESSION["errorMessage"]);
                    require_once("./layouts/shared/error.php");
                }
            ?>
            <?php 
                session_start();
                if(isset($_SESSION["success"]))
                {
                    $successMessage = $_SESSION["success"];
                    unset($_SESSION["success"]);
                    require_once("./layouts/shared/success.php");
                }
            ?>
            <input hidden name="id" value="<?php echo $userdb["id"] ?>"/>
            <input hidden name="email" value="<?php echo $userdb["email"] ?>"/>
            <div class="mx-md-5 my-md-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"><label class="col-form-label ms-md-3" for="username">Username:&nbsp;</label></div>
                        <div class="col-md-7"><input class="form-control my-md-1" required  value="<?php echo $userdb["username"]?>"
                            type="text" name="username"></div>
                    </div>
                </div>
            </div>
            <div class="mx-md-5 my-md-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"><label class="col-form-label ms-md-3" for="firstName">First Name:&nbsp;</label></div>
                        <div class="col-md-7"><input class="form-control my-md-1"  required  value="<?php echo $userdb["first_name"]?>"
                            type="text" name="firstName"></div>
                    </div>
                </div>
            </div>
            <div class="mx-md-5 my-md-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"><label class="col-form-label ms-md-3" for="lastName">Last Name:&nbsp;</label></div>
                        <div class="col-md-7"><input class="form-control my-md-1"  required  value="<?php echo $userdb["last_name"]?>"
                            type="text" name="lastName"></div>
                    </div>
                </div>
            </div>
            <div class="mx-md-5 my-md-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"><label class="col-form-label ms-md-3" for="password">Password:&nbsp;</label></div>
                        <div class="col-md-7"><input class="form-control my-md-1" type="password"  required   name="password"></div>
                    </div>
                </div>
            </div>
            <div class="mx-md-5 my-md-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="col-form-label ms-md-3" for="gender">Gender:&nbsp;</label>
                        </div>
                        <div class="col-md-7">
                            <select id="type" name="gender" class="form-select form-select-sm my-md-1">
                                <option <?php if($userdb["gender"] === "Male") echo "selected" ?> >Male</option>
                                <option <?php if($userdb["gender"] === "Female") echo "selected" ?> >Female</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div >
                <div class="container d-grid px-md-5">
                    <button name="submit" class="btn btn-dark fw-semibold mx-md-5 my-md-2 ms-md-0" type="submit">Save</button>
                </div>
            </div>
        </form>
    </section>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>