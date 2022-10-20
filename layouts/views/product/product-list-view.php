<h1 class="text-center mt-2">Products</h1>
<div class="container mt-5 mb-5">
    <div class ="d-grid">
        <a class="btn btn-outline-dark fw-semibold  mb-2" href="/product-form">
            Add <i class="bi bi-plus-circle "></i>
        </a>
    </div>
    <table class="table table-light table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID#</th>
                <th scope="col" class="text-center">Product</th>
                <th scope="col" class="text-center">Type</th>
                <th scope="col" class="text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="align-middle" >
            <?php while($obj = $products->fetch(PDO::FETCH_ASSOC)) {?>
            <tr>
                <th scope="row"><?php echo $obj["id"]?></th>
                <td class="text-center"><?php echo $obj["name"]?></td>
                <td class="text-center"><?php echo $obj["product_type_id"]?></td>
                <td class="d-flex justify-content-center">
                    <a class="btn btn-outline-warning m-1" href="/product-form-edit?id=<?php echo $obj["id"] ?>">Edit</a>
                    <a class="btn btn-outline-danger m-1"  href="/product-form-delete?id=<?php echo $obj["id"] ?>">Delete</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
