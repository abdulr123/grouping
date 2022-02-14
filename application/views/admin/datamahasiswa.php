<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">



            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Login As</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($user as $u) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $u['name']; ?></td>
                            <td><?= $u['email']; ?></td>
                            <td><?= $u['role_id']; ?></td>
                            <td><?= $u['is_active']; ?></td>
                            <td>
                                <a href="<?php echo base_url('admin/edit_datamahasiswa/') . $u['id'] ?>"><i class="fas fa-key"></i></a> &nbsp
                                <a href="<?php echo base_url('admin/hapus_datamahasiswa/') . $u['id'] ?>"> <i class="fas fa-trash-alt"></i></a>
                            </td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>


                </tbody>
            </table>

        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->