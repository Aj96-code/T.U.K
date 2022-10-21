<div class="container">

    <section class="d-lg-flex">
            <div class="pt-0 my-4 mx-4 mx-md-0 my-md-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 container-column">
                            <img class="img-fluid d-xl-inline-flex my-md-5 column-img ms-xl-4 me-xl-0"
                             src="<?php echo $product["image"] ?>" style="max-width: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="mx-lg-0 px-lg-0 ms-xl-0">
                <div class="container">
                    <div class="row pt-lg-0 my-lg-4 px-xxl-5">
                        <div class="col-md-12 col-xxl-12 my-lg-3 mx-4 mx-sm-3 mx-md-2 px-lg-0">
                        <h1 class="my-lg-3 ps-lg-0 pe-lg-0"><?php echo $product["name"]?></h1>
                            <p><strong class="text-muted">Price:</strong>&nbsp;<?php echo $product["price"]?></p>
                            <p><strong class="text-muted">Size:&nbsp;</strong><?php echo $product["product_size_id"]?></p>
                            <p><strong class="text-muted">Color:&nbsp;</strong><?php echo $product["color"]?></p>
                            <div class="d-grid">
                                <a href="/cart?id=<?php echo $product["id"]?>" class="btn btn-dark fw-semibold my-md-4 mt-md-3 mx-xl-4 mx-lg-3 mx-4 my-2" 
                                type="button">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>