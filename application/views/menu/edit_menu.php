<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">


            <?php foreach ($menu as $m) : ?>

                <form action="<?= base_url('menu/update_menu'); ?>" method="post">
                    <div class="form-group">
                        <label> Menu </label>
                        <input type="hidden" name="id" class="form-control" value="<?= $m->id ?>">
                        <input type="text" name="menu" class="form-control" value="<?= $m->menu ?>">
                    </div>

                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('menu'); ?>" class="btn btn-success"> Back</a>

                </form>


            <?php endforeach ?>

        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->