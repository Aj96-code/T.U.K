
<h1 class="text-center mt-2">Users</h1>
<div class="container mt-5 mb-5">
    <div class ="d-grid">
        <a class="btn btn-outline-dark fw-semibold  mb-2" href="/user-form">
            Add <i class="bi bi-plus-circle "></i>
        </a>
    </div>
    <table class="table table-light table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID#</th>
                <th scope="col" class="text-center">Username</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="align-middle" >
            <?php while($obj = $users->fetch(PDO::FETCH_ASSOC)) {?>
            <tr>
                <th scope="row"><?php echo $obj["id"]?></th>
                <td class="text-center"><?php echo $obj["username"]?></td>
                <td class="text-center"><?php echo $obj["email"]?></td>
                <td class="d-flex justify-content-center">
                    <a class="btn btn-outline-warning m-1" href="/user-edit-form?id=<?php echo $obj["id"] ?>">Edit</a>
                    <a class="btn btn-outline-danger m-1" 
                        onclick="return confirm('Are you sure you want to delete item')"
                     href="/user-delete?id=<?php echo $obj["id"] ?>">Delete</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>