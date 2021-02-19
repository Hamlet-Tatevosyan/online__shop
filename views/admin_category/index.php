<?php include ROOT . '/views/admin_header.php'; ?>

<section>
    <br/>
    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <ol class="breadcrumb bg-dark">
                    <li class="list-group-item  bg-dark"><a class="btn btn-outline-info text-white" href="/admin">Administrator panel</a></li>
                    <li class="list-group-item bg-dark"><a class="btn btn-outline-info active" href="#">Category Management</a></li>
                </ol>
            </div>
        </div>
    </div>
    <p class="text-center">
        <a href="/admin/category/create" class="btn btn-default back">
            <button type="button" class="btn btn-primary"><i class="fa fa-plus mr-1"></i>Creat Category</button>
        </a>
    </p>
    <br/>
    <h4 class="text-center text-white">Category List</h4>
    <div class="container">
        <div class="row">
            <br/>
            <table class="table table-bordered table-dark">
                <thead>
                <tr>
                    <th scope="col">ID Category</th>
                    <th scope="col">Images Category</th>
                    <th scope="col">Name of category</th>
                    <th scope="col">Sort Order</th>
                    <th scope="col">Status</th>
                    <th scope="col">Edit Product</th>
                    <th scope="col">Delete Product</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($categoriesList as $category): ?>
                    <tr>
                        <td class="text-center"><?php echo $category['id']; ?></td>
                        <td class="image-prod">
                                <!--<div class="img" style="background-image:url(<?/*= $product['preview']; */?>);"></div>-->
                                <img src="<?= '/upload/images/category/'.$category['img_preview']; ?>" style="width:100px" class="w3-margin-top">
                        </td>
                        <td class="text-center"><?php echo $category['name']; ?></td>
                        <td class="text-center"><?php echo $category['sort_order']; ?></td>
                        <td class="text-center" ><?php echo Category::getStatusText($category['status']); ?></td>
                        <td class="text-center">
                            <a href="/admin/category/update/<?php echo $category['id']; ?>" title="Edit">
                                <i class="fa fa-pencil-square-o p-3 mb-2 bg-success text-white"></i>
                                <?php Category::getCategoryById($category['id']); ?>
                            </a>
                        </td>
                        <td class="text-center"><a href="/admin/category/delete/<?php echo $category['id']; ?>"  title="Delete"><i class="fa fa-times p-3 mb-2 bg-danger text-white "></i></a></td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

</section>

<?php include ROOT . '/views/admin_footer.php'; ?>

