<h1 class="text-center mt-lg-2 mt-2">Shopping Cart</h1>
    <section class="d-lg-flex justify-content-lg-center justify-content-xxl-center align-items-xxl-center mx-lg-5 mx-xxl-5 my-xxl-4 my-lg-4 mt-lg-0">
        <div class="mt-lg-5">
            <div class="container">
                <?php foreach($cartItems as $cartItem) { ?>
                <div class="row">
                    <div class="col-md-12 px-xxl-3 mx-xxl-0 mx-md-2 me-lg-0 pe-lg-0" style="padding: op;">
                        <div class="card my-md-3 my-3">
                            <div class="card-body d-md-flex py-md-0 px-md-0 my-sm-2">
                                <div><img class="rounded img-fluid mb-3 mb-md-0 ms-md-2" src="<?php echo $cartItem["image"]?>" height="100%"></div>
                                <div class="px-lg-4 px-md-2 product-details pe-md-5 mx-md-3">
                                    <h4 class="text-center justify-content-md-center align-items-md-center"><?php echo $product["name"]?></h4>
                                    <h6 class="text-muted mb-2"><?php echo $cartItem["price"]?></h6>
                                    <p style="width: 300px;"><?php echo $cartItem["detail"]?></p>
                                    <div class="d-inline-flex justify-content-md-center  align-items-md-center">
                                        <button  id ="plus<?php echo $cartItem["id"]?>" onclick="plus<?php echo $cartItem['id'] ?>()" class="btn btn-dark fw-bold border rounded mx-md-2 me-1 me-md-1" type="button" style="width: 33.3px;padding: 0px;height: 29px;">+</button>
                                        <input  id = "amount<?php echo $cartItem["id"]?>" type="text" class="me-1" value="<?php echo $cartItem["amount"]; ?>" disabled/>
                                        <button id="minus<?php echo $cartItem["id"]?>" onclick="minus<?php echo $cartItem['id']?>()"class="btn btn-dark fw-bold border rounded" type="button" style="margin: 0px;padding: 0px;width: 33px;height: 30px;">-</button></div>
                                </div>
                            </div><a class="fw-bold text-center link-danger" href="cart?rId=<?php echo $cartItem["id"]?>" style="background: #eee9e3;">Remove</a>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="row mt-xxl-5 my-md-4 ps-lg-0">
                    <div class="col-md-12 pe-md-4 me-md-0 my-md-3 my-sm-2">
                        <h1 class="text-center">Summary</h1>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                    </tr>
                                    <tr>
                                        <td>Text</td>
                                        <td>Cell 3</td>
                                        <td>Cell 4</td>
                                    </tr>
                                    <tr></tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="fw-bold">Total</p>
                        <div class="d-grid"><button class="btn btn-dark" type="button">Check Out</button></div>
                    </div>
                </div>
            </div>
        </div>
        <script>

                <?php foreach($cartItems as $cartItem) { $id = $cartItem["id"]; ?>
                    let amount<?php echo $id?> = document.getElementById("amount<?php echo $id;?>");
                    console.log(amount<?php echo $id?>);
                    function plus<?php echo $id?>()
                    {
                        if( amount<?php echo $id?>.value < <?php echo $cartItem["in_stock"]?> )
                            amount<?php echo $id?>.value ++; 
                    }
                    function minus<?php echo $id?>()
                    {
                        if(amount<?php echo $id?>.value >1 )
                        {
                            amount<?php echo $id?>.value--;                             
                        }

                    }


                <?php }?>
        </script>
    </section>