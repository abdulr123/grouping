<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">


            <?php foreach ($UserActivation as $dm) : ?>

                <form action="<?= base_url('admin/update_datamahasiswa'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" value="<?= $dm->id ?>">
                    </div>

                    <div class="form-group">
                        <label> Note : 0 = Not Activated, 1 = Activated</label>
                        <input type="text" name="is_active" class="form-control" value="<?= $dm->is_active ?>">
                    </div>

                    <div class="form-group">
                        <label> Note : 1 = Administrator, 2 = Students, 3 = Lecturer</label>
                        <input type="text" name="role_id" class="form-control" value="<?= $dm->role_id ?>">
                    </div>



                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('admin/datamahasiswa'); ?>" class="btn btn-success"> Back</a>

                </form>


            <?php endforeach ?>

        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->