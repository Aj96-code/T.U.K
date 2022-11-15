<?php
    $type = new ProductType($pdo);
    $types = array();
    $result = $type->getTypes();
    while($obj = $result->fetch(PDO::FETCH_ASSOC))
    {
        array_push($types,$obj);
    }

    function getElement($value,$arr)
    {
        foreach($arr as $elem)
        {
            if($elem["id"] === $value )
                return $elem;
            else
                continue;
        }
    }
?>
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
                <td class="text-center"><?php echo ucfirst( getElement($obj["product_type_id"],$types)["type"])?></td>
                <td class="d-flex justify-content-center">
                    <a class="btn btn-outline-warning m-1" href="/product-form-edit?id=<?php echo $obj["id"] ?>">Edit</a>
                    <a class="btn btn-outline-danger m-1" 
                        onclick="return confirm('Are you sure you want to delete item')"
                     href="/product-delete?id=<?php echo $obj["id"] ?>">Delete</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
