<h1 class="text-center mt-3 mb-3">Welcome <?php session_start(); echo ucfirst($_SESSION["role"])?></h1>
<?php 
    require_once("./db/conn/conn.php");
    $product = new Product($pdo);
    $user = new User($pdo);
    $productCount = $product->getProductsAsNum()
    ;
    $userCount = $user->getUsersAsNum();
?>
<div class="container d-md-flex flex-row justify-content-md-center align-items-md-center align-content-md-center flex-md-wrap py-5 px-4 container-product-list">
    <div class="card m-2" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Products</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">Current Products Count [ <?php echo $productCount->fetch(PDO::FETCH_ASSOC)["num"]?> ]</p>
            <a href="product-list-view" class="btn btn-dark">Product Table</a>
        </div>
    </div>
    <div class="card m-2" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Users</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">Current Users Count [ <?php echo $userCount->fetch(PDO::FETCH_ASSOC)["num"]?> ]</p>
            <a href="user-list-view" class="btn btn-dark">User Table</a>
        </div>
    </div>
</div>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>