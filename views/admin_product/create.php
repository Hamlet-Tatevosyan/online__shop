<?php include ROOT . '/views/admin_header.php'; ?>
<br/>
<div  class="container">
    <div class="row">
        <div class="breadcrumbs">
            <ol class="breadcrumb bg-dark">
                <li class="list-group-item  bg-dark"><a class="btn btn-outline-info text-white" href="/admin">Administrator panel</a></li>
                <li class="list-group-item bg-dark"><a class="btn btn-outline-info text-white" href="/admin/product">Product Management</a></li>
                <li class="list-group-item bg-dark"><a class="btn btn-outline-info active" href="#">Product Edit</a></li>
            </ol>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Creat Product</h5>
                    <div class="form-signin">
                        <form  action="" method="post" enctype="multipart/form-data">

                            <div class="form-label-group">
                                <label for="title">Name Product</label>

                                <input type="text" name="name" id="title"  class="form-control" value="">
                            </div>
                            <br>

                            <div class="form-label-group mt-2">
                                <label for="price">Price, $</label>

                                <input type="text" name="price" id="price" class="form-control" value="" placeholder="">
                            </div>
                            <div class="form-label-group mt-2">
                                <label for="price">Quantity</label>

                                <input type="text" name="quantity" id="quantity" class="form-control" value="" placeholder="">
                            </div>
                            <br>
                            <div class="form-label-group mt-2">
                                <label for="code">Vendor code</label>
                                <input type="text" name="code" id="code" class="form-control" value="" placeholder="">
                            </div>
                            <br>
                            <div class="form-label-group mt-2">
                                <label for="thumb">Product Image</label>
                                <input type="file" name="files[]" class="form-control btn btn-lg" id="files" accept="image/*"  multiple/>

                            </div>
                            <br>
                            <div class="form-label-group mt-2">
                                <label>Category</label>
                                <select name="category_id">
                                    <?php if (is_array($categoriesList)): ?>
                                        <?php foreach ($categoriesList as $category): ?>
                                            <option value="<?php echo $category['id']; ?>">
                                                <?php echo $category['name']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <br>
                            <div class="form-label-group mt-2">
                                <label  for="brand" >Manufacturer</label>
                                <input class="form-control" id="brand" type="text" name="brand" placeholder="" value="">
                            </div>
                            <br>
                            <div class="form-label-group mt-2">
                                <label  for="description" >Detailed description</label>
                                <textarea rows="5" cols="40" id="description" name="description"></textarea>
                            </div>
                            <br>

                            <div class="form-label-group mt-2">
                                <label for="availability">Stock availability</label>
                                <select name="availability">
                                    <option id="availability" value="1" selected="selected">Yes</option>
                                    <option id="availability" value="0" >No</option>
                                </select>
                            </div>
                            <br>

                            <div class="form-label-group mt-2">
                                <label>New</label>
                                <select name="is_new">
                                    <option value="1" selected="selected">Yes</option>
                                    <option value="0" >No</option>
                                </select>
                            </div>
                            <br>

                            <div class="form-label-group mt-2">
                                <label>Featured</label>
                                <select name="is_recommended">
                                    <option value="1" selected="selected">Yes</option>
                                    <option value="0" >>No</option>
                                </select>
                            </div>
                            <br>

                            <div class="form-label-group mt-2">
                                <label>Status</label>
                                <select name="status">
                                    <option value="1" selected="selected">Is displayed</option>
                                    <option value="0" >Is hidden</option>
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

