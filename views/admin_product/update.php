<?php include ROOT . '/views/admin_header.php'; ?>
<div  class="container">
    <div class="row">
        <div class="breadcrumbs">
            <ol class="breadcrumb bg-dark">
                <li class="list-group-item  bg-dark"><a class="btn btn-outline-info text-white" href="/admin">Administrator panel</a></li>
                <li class="list-group-item bg-dark"><a class="btn btn-outline-info text-white" href="/admin/product">Product Management</a></li>
                <li class="list-group-item bg-dark"><a class="btn btn-outline-info active" href="#">Update Product</a></li>
            </ol>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Edit Product -> <?php echo $id; ?> Name -> <?php echo $product['name'];  ?></h5>
                    <div class="form-signin">
                        <form  action="" method="post" enctype="multipart/form-data">
                            <div class="form-label-group">
                                <label for="title">Name Product</label>

                                <input type="text" name="name" id="title"  class="form-control" value="<?php echo $product['name']; ?>">
                            </div>
                            <br>

                            <div class="form-label-group mt-2">
                                <label for="price">Price, $</label>

                                <input type="text" name="price" id="price" class="form-control" value="<?php echo $product['price']; ?>" placeholder="">
                            </div>
                            <br>

                            <div class="form-label-group mt-2">
                                <label for="price">Discount, %</label>

                                <input type="text" name="discount" id="discount" class="form-control" value="<?php echo $product['discount']; ?>" placeholder="">
                            </div>
                            <br>
                            <div class="form-label-group mt-2">
                                <label for="quantity">Quantity</label>

                                <input type="text" name="quantity" id="quantity" class="form-control" value="<?php echo $product['quantity']; ?>" placeholder="">
                            </div>
                            <br>
                            <div class="form-label-group mt-2">
                                <label for="code">Vendor code</label>
                                <input type="text" name="code" id="code" class="form-control" value="<?php echo  $product['code']; ?>" placeholder="">
                            </div>
                            <br>
                            <div class="form-label-group mt-2">
                                <label>Current Product Image</label>
                                <?php
                                $pro = Product::getImage($product['id']);
                                ?>
                                <img src="/upload/images/<?= $pro[0]['images_preview']; ?>" width="200" alt="" />
                            </div>
                            <div class="form-label-group mt-2">
                                <label for="thumb">Product Image</label>
                                <input type="file" name="files[]" class="form-control btn btn-lg" id="files" accept="image/*" multiple/>

                            </div>
                            <br>
                            <div class="form-label-group mt-2">
                                <label>Category</label>
                                <select name="category_id">
                                    <?php if (is_array($categoriesList)): ?>
                                        <?php foreach ($categoriesList as $category): ?>
                                            <option value="<?php echo $category['id']; ?>"
                                                <?php if ($product['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                                <?php echo $category['name']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <br>
                            <div class="form-label-group mt-2">
                                <label  for="brand" >Manufacturer</label>
                                <input class="form-control" id="brand" type="text" name="brand" placeholder="" value="<?php echo $product['brand']; ?>">
                            </div>
                            <br>
                            <div class="form-label-group mt-2">
                                <label  for="description" >Detailed description</label>
                                <textarea rows="5" cols="50" id="description" name="description"><?php echo $product['description']; ?></textarea>
                            </div>
                            <br>

                            <div class="form-label-group mt-2">
                                <label for="availability">Stock availability</label>
                                <select name="availability">
                                    <option id="availability" value="1" <?php if ($product['availability'] == 1) echo ' selected="selected"'; ?>>Yes</option>
                                    <option id="availability" value="0" <?php if ($product['availability'] == 0) echo ' selected="selected"'; ?>>No</option>
                                </select>
                            </div>
                            <br>

                            <div class="form-label-group mt-2">
                                <label>New</label>
                                <select name="is_new">
                                    <option value="1" <?php if ($product['is_new'] == 1) echo ' selected="selected"'; ?>>Yes</option>
                                    <option value="0" <?php if ($product['is_new'] == 0) echo ' selected="selected"'; ?>>No</option>
                                    <option value="2" <?php if ($product['is_new'] == 2) echo ' selected="selected"'; ?>>sale</option>
                                </select>
                            </div>
                            <br>

                            <div class="form-label-group mt-2">
                                <label>Featured</label>
                                <select name="is_recommended">
                                    <option value="1" <?php if ($product['is_recommended'] == 1) echo ' selected="selected"'; ?>>Yes</option>
                                    <option value="0" <?php if ($product['is_recommended'] == 0) echo ' selected="selected"'; ?>>No</option>
                                </select>
                            </div>
                            <br>

                            <div class="form-label-group mt-2">
                                <label>Status</label>
                                <select name="status">
                                    <option value="1" <?php if ($product['status'] == 1) echo ' selected="selected"'; ?>>Is displayed</option>
                                    <option value="0" <?php if ($product['status'] == 0) echo ' selected="selected"'; ?>>Is hidden</option>
                                </select>
                            </div>
                            <br>

                            <input type="submit" name="submit" class="btn btn-lg btn-info btn-block mt-4" value="Save">
                            <a href="/admin/product" class="btn btn-lg btn-dark btn-block mt-4">
                                Cancel
                            </a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include ROOT . '/views/admin_footer.php'; ?>
