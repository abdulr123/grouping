<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">

            <?php foreach ($subMenu as $sm) : ?>

                <form action="<?= base_url('menu/update_submenu'); ?>" method="post">
                    <div class="form-group">

                        <label> ID </label>
                        <input type="hidden" name="id" class="form-control" value="<?= $sm->id ?>">

                        <label> Menu ID </label>
                        <input type="text" name="menu_id" class="form-control" value="<?= $sm->menu_id ?>">

                        <label> Menu Title </label>
                        <input type="text" name="title" class="form-control" value="<?= $sm->title ?>">

                        <label> Menu URL </label>
                        <input type="text" name="url" class="form-control" value="<?= $sm->url ?>">

                        <label> Menu ICON </label>
                        <input type="text" name="icon" class="form-control" value="<?= $sm->icon ?>">

                        <label> Menu Active ? </label>
                        <input type="text" name="is_active" class="form-control" value="<?= $sm->is_active ?>">

                    </div>

                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('menu/submenu'); ?>" class="btn btn-success"> Back</a>

                </form>


            <?php endforeach ?>

        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->