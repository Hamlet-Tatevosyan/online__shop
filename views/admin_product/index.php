<?php include ROOT . '/views/admin_header.php';

?>

<section>
    <br/>
    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <ol class="breadcrumb bg-dark">
                    <li class="list-group-item  bg-dark"><a class="btn btn-outline-info text-white" href="/admin">Administrator panel</a></li>
                    <li class="list-group-item bg-dark"><a class="btn btn-outline-info active" href="#">Product Management</a></li>
                </ol>
            </div>
        </div>
    </div>
    <p class="text-center">
        <a href="/admin/product/create" class="btn btn-default back">
            <button type="button" class="btn btn-primary"><i class="fa fa-plus mr-1"></i>Creat Product</button>
        </a>
    </p>
    <br/>
    <h4 class="text-center text-white">Product List</h4>
        <div class="container">
            <div class="row">
            <br/>
            <table class="table table-bordered table-dark">
                <thead>
                <tr>
                    <th scope="col">ID Product</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Name Product</th>
                    <th scope="col">Quantity Product</th>
                    <th scope="col">Price Product</th>
                    <th scope="col">Edit Product</th>
                    <th scope="col">Delete Product</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($productsList as $product): ?>
                    <?php
//var_dump($product['id']);
                    $pro = Product::getImage($product['id']);
//var_dump($pro[0]['images_preview']);

                    ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td class="image-prod">
                            <a href="/product/<?php echo $product['id'];?>">
                                <!--<div class="img" style="background-image:url(<?/*= $product['preview']; */?>);"></div>-->
                                <img src="/upload/images/<?= $pro[0]['images_preview']; ?>" style="width:100px" class="w3-margin-top">
                            </a>
                        </td>
                        <td><?php echo $product['name']; ?></td>
                        <?php if (!$product['quantity']):?>
                        <td class="text-center text-danger"> <?php echo $product['quantity']; ?></td>
                        <?php else:?>
                        <td class="text-center"> <?php echo $product['quantity']; ?></td>
                        <?php endif;?>

                        <td>$ <?php echo $product['price']; ?></td>
                        <td class="text-center"><a href="/admin/product/update/<?php echo $product['id']; ?>" title="Edit"><i class="fa fa-pencil-square-o p-3 mb-2 bg-success text-white"></i><?php Product::getProductById($product['id']); ?></a></td>
                        <td class="text-center"><a href="/admin/product/delete/<?php echo $product['id']; ?>"  title="Delete"><i class="fa fa-times p-3 mb-2 bg-danger text-white "></i></a></td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include ROOT . '/views/admin_footer.php'; ?>

