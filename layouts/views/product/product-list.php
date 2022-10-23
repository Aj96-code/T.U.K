<section>
        <div class="container d-flex d-sm-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center my-3">
            <form class="d-inline-flex" method="post"><input class="form-control form-control-sm me-1 search-input" name="search-phrase" type="text" placeholder="Search ..."><button class="btn btn-dark px-2 py-0" type="submit" style="padding: 0px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-search fs-5 text-light px-0 pe-0">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                    </svg></button></form>
        </div>

        <?php 
            if($_POST["search-phrase"] != null)
                echo "<h4 class='text-center m-3'> Search Results for - ".$_POST["search-phrase"]."</h4>";
        ?>
        <div class="container d-flex justify-content-md-end align-items-md-center">
            <p class="fs-5 fw-semibold me-lg-2 my-lg-2 my-md-2 mx-md-1">Sort By</p>
            <div class="dropdown"><button class="btn btn-light dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">Type</button>
                <div class="dropdown-menu">
                    <?php while($obj = $result->fetch(PDO::FETCH_ASSOC)){?>
                    <a class="dropdown-item" href="/products?id=<?php echo $obj["id"]?>"><?php echo ucfirst($obj["type"])?></a>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="container d-md-flex flex-row justify-content-md-center align-items-md-center align-content-md-center flex-md-wrap py-5 px-4 container-product-list">
        <?php if($products->rowCount()  > 0) {?>    
        <?php while($obj = $products->fetch(PDO::FETCH_ASSOC)) {?>
            <div class="card me-md-4 my-md-4 my-2 product" style="width: auto;height: auto;max-width: 400px;">
                <div class="card-body mx-md-0 me-md-0" style="max-width: 500px;">
                    <div><img src="<?php echo $obj["image"]?>" style="max-width: 100%;max-height: 244px;"></div>
                    <div>
                        <h4><?php echo $obj["name"]?></h4>
                        <h5 class="fw-bold text-muted mb-2">Price: &nbsp;<?php echo $obj["price"]?></h5>
                        <div class="d-grid"><a class="btn btn-dark fw-semibold" href="/product?id=<?php echo $obj["id"] ?>" type="button">View</a></div>
                    </div>
                </div>
            </div>
            <?php }?>
            <?php }
                else {
            ?>
                <h1 class=" text-center text-muted"style=" font-size: 5em;">Nothing Found ....</h1>
            <?php }?>
        </div> 
    </section>