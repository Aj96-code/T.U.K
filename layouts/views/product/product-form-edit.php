<section>
        <form class="my-md-3 mb-4" method="post" action="/product-edit" enctype="multipart/form-data">
            <h1 class="text-center mb-md-3">Product Form</h1>
            <?php 
                session_start();
                if(isset($_SESSION["errorMessage"]))
                {
                    $errorMessage = $_SESSION["errorMessage"];
                    unset($_SESSION["errorMessage"]);
                    require_once("./layouts/shared/error.php");
                }
            ?>
            <input hidden name="id" value="<?php echo $product["id"] ?>"/>
            <div class="mx-md-5 my-md-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"><label class="col-form-label ms-md-3" for="name">Name:&nbsp;</label></div>
                        <div class="col-md-7"><input class="form-control my-md-1"  required  value="<?php echo $product["name"]?>"
                            type="text" name="name"></div>
                    </div>
                </div>
            </div>
            <div class="mx-md-5 my-md-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"><label class="col-form-label ms-md-3" for="price">price:&nbsp;</label></div>
                        <div class="col-md-7"><input class="form-control my-md-1" type="text"  required  
                            value="<?php echo $product["price"]?>" name="price"></div>
                    </div>
                </div>
            </div>
            <div class="mx-md-5 my-md-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"><label class="col-form-label ms-md-3" for="color">Color:&nbsp;</label></div>
                        <div class="col-md-7"><input class="form-control my-md-1" type="text"  required   value="<?php echo $product["color"]?>" 
                            name="color"></div>
                    </div>
                </div>
            </div>
            <div class="mx-md-5 my-md-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="col-form-label ms-md-3" for="type">Type:&nbsp;</label>
                        </div>
                        <div class="col-md-7">
                            <select id="type" name="type" class="form-select form-select-sm my-md-1">
                                <?php while($obj = $result->fetch(PDO::FETCH_ASSOC)){?>
                                    <option value=<?php echo $obj["id"];?>
                                    <?php 
                                        if($obj["id"] === $product["product_type_id"])
                                            echo "selected";
                                    ?> >
                                    <?php echo ucfirst($obj["type"]);?>
                                    </option> 
                                <?php }?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-md-5 my-md-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="col-form-label ms-md-3" for="size">Size:&nbsp;</label>
                        </div>
                        <div class="col-md-7">
                            <select id="type" name="size" class="form-select form-select-sm my-md-1">
                                <?php while($obj = $sizes->fetch(PDO::FETCH_ASSOC)){?>
                                    <option value=<?php echo $obj["id"];?>
                                    <?php 
                                        if($obj["id"] === $product["product_size_id"])
                                            echo "selected";
                                    ?> >
                                    <?php echo ucfirst($obj["size"]);?>
                                    </option> 
                                <?php }?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-md-5 my-md-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"><label class="col-form-label ms-md-3" for="inStock">In Stock:&nbsp;</label></div>
                        <div class="col-md-7"><input class="form-control my-md-1"  required   value="<?php echo $product["in_stock"]?>" type="number" min="0" name="inStock"></div>
                    </div>
                </div>
            </div>
            <div class="mx-md-5 my-md-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"><label class="col-form-label ms-md-3" for="image">Image:</label></div>
                        <div class="col-md-7"><input class="form-control form-control-sm mt-md-1"
                          type="file" name="image"></div>
                    </div>
                </div>
            </div>
            <div class="mx-md-5 my-md-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"><label class="col-form-label mt-md-3 ms-md-3" for="detail">Details:</label></div>
                        <div class="col-md-7"><textarea class="form-control form-control-lg mb-3 fs-6" required  
                            name="detail"><?php echo $product["detail"]?></textarea></div>
                    </div>
                </div>
            </div>
            <div class="mx-md-0">
                <div class="container d-grid px-md-5">
                    <button name="submit" class="btn btn-dark fw-semibold mx-md-5 my-md-2 ms-md-0" type="submit">Save</button>
                </div>
            </div>
        </form>
    </section>