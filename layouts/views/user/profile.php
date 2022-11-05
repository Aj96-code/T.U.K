<form action="/update-profile" method="post" enctype="multipart/form-data">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="<?php echo $user["image"]?>">
                <span class="font-weight-bold"><?php echo $user["username"]?></span>
                <span class="text-black-50"><?php echo $user["email"]?></span><span> </span></div>
        </div>
        <div class="col">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 >Profile Settings</h4>
                <?php 
                    session_start();
                    if(isset($_SESSION["errorMessage"]))
                    {
                        $errorMessage = $_SESSION["errorMessage"];
                        require_once("./layouts/shared/error.php");
                    }
                ?>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstName" value="<?php echo $user["first_name"]?>" >
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lastName" value="<?php echo $user["last_name"]?>" >
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 mb-2">
                        <label class="labels">Username</label>
                        <input type="text" class="form-control" name="username"  value="<?php echo $user["username"]?>">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="labels">Gender</label>
                        <select class="form-select form-select-sm" name="gender" aria-label="Default select example">
                            <option <?php if($user["gender"] === "Male" ) echo "selected";?> >Male</option>
                            <option <?php if($user["gender"] === "Female" ) echo "selected";?> >Female</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="labels">Email</label>
                        <input type="text" class="form-control" name="email"  value="<?php echo $user["email"]?>">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="labels">Upload Image</label>
                        <input type="file" name="image" class="form-control form-control-sm" >
                    </div>
                </div>
                <div class="d-grid mt-5 text-center">
                    <button class="btn btn-dark "name="submit" type="submit">Save Profile</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</form>