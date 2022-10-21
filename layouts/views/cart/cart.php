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
                                    <h6 class="text-muted mb-2" id="price<?php echo $cartItem["id"]?>"><?php echo $cartItem["price"]?></h6>
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
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php foreach($cartItems as $cartItem) { ?>
                                    <tr>
                                        <td><?php echo $cartItem["name"]?></td>
                                        <td id="qty<?php echo $cartItem["id"]?>">1</td>
                                        <td></td>
                                        <td id="total<?php echo $cartItem["id"] ?>"></td>
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-grid"><button class="btn btn-dark" type="button">Check Out</button></div>
                    </div>
                </div>
            </div>
        </div>
        <script>

                <?php foreach($cartItems as $cartItem) { $id = $cartItem["id"]; ?>
                    let amount<?php echo $id?> = document.getElementById("amount<?php echo $id;?>");
                    let price<?php echo $id?> = document.getElementById("price<?php echo $id;?>");
                    let sum<?php echo $id?>;
                    let total<?php echo $id?> = document.getElementById("total<?php echo $id?>");
                    let qty<?php echo $id?> = document.getElementById("qty<?php echo $id?>");
                    function plus<?php echo $id?>()
                    {
                        if( amount<?php echo $id?>.value < <?php echo $cartItem["in_stock"]?> )
                        {
                            amount<?php echo $id?>.value ++;  
                            qty<?php echo $id?>.innerHTML = amount<?php echo $id?>.value;
                            price<?php echo $id?>.innerText = ("<?php echo $cartItem["price"]?>").replace("$","")* amount<?php echo $id?>.value;
                            sum<?php echo $id?> = price<?php echo $id?>.innerText;  
                            total<?php echo $id?>.innerHTML = sum<?php echo $id?>;
                        }
                    }
                    function minus<?php echo $id?>()
                    {
                        if(amount<?php echo $id?>.value >1 )
                        {
                            amount<?php echo $id?>.value--;                             
                            qty<?php echo $id?>.innerHTML = amount<?php echo $id?>.value;
                            price<?php echo $id?>.innerText =  price<?php echo $id?>.innerText - ("<?php echo $cartItem["price"]?>").replace("$","");
                            sum<?php echo $id?> = price<?php echo $id?>.innerText;  
                            total<?php echo $id?>.innerHTML =  sum<?php echo $id?>;
                        }

                    }



                <?php }?>
        </script>
    </section>