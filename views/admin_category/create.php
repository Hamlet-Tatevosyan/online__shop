<?php include ROOT . '/views/admin_header.php'; ?>
<br/>
<div  class="container">
    <div class="row">
        <div class="breadcrumbs">
            <ol class="breadcrumb bg-dark">
                <li class="list-group-item  bg-dark"><a class="btn btn-outline-info text-white" href="/admin">Administrator panel</a></li>
                <li class="list-group-item bg-dark"><a class="btn btn-outline-info text-white" href="/admin/category">Category Management</a></li>
                <li class="list-group-item bg-dark"><a class="btn btn-outline-info active" href="#">Add category</a></li>
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
                    <h5 class="card-title text-center">Creat New Category</h5>
                    <div class="form-signin">
                        <form  action="" method="post" enctype="multipart/form-data">

                            <div class="form-label-group">
                                <label for="title">Title Category</label>

                                <input type="text" name="name" id="title"  class="form-control" value="">
                            </div>
                            <br>

                            <div class="form-label-group mt-2">
                                <label for="sort_order">Sort Order</label>
                                <input type="text" name="sort_order"  class="form-control" value="" placeholder="">
                            </div>
                            <div class="form-label-group mt-2">
                                <label for="thumb">Product Image</label>
                                <input type="file" name="image" class="form-control btn btn-lg" accept="image/*" id="thumb" />

                            </div>
                            <br>
                            <div class="form-label-group mt-2">
                                <label for="code">Status</label>
                                <select name="status">
                                    <option value="1" selected="selected">Is displayed</option>
                                    <option value="0">Hidden</option>
                                </select>
                            </div>
                            <br>

                            <input type="submit" name="submit" class="btn btn-lg btn-info btn-block mt-4" value="Save">
                            <a href="/admin/category" class="btn btn-lg btn-dark btn-block mt-4">
                                Cancel
                            </a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/order">Управление категориями</a></li>
                    <li class="active">Добавить категорию</li>
                </ol>
            </div>


            <h4>Добавить новую категорию</h4>

            <br/>

            <?php /*if (isset($errors) && is_array($errors)): */?>
                <ul>
                    <?php /*foreach ($errors as $error): */?>
                        <li> - <?php /*echo $error; */?></li>
                    <?php /*endforeach; */?>
                </ul>
            <?php /*endif; */?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="">

                        <p>Порядковый номер</p>
                        <input type="text" name="sort_order" placeholder="" value="">

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыта</option>
                        </select>

                        <br><br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>-->

<?php include ROOT . '/views/admin_footer.php'; ?>
