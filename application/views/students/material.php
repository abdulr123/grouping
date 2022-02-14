<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">

            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Class</th>
                        <th scope="col">Lecturer</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($subject as $c) : ?>
                        <?php if ($c['class_name'] ===  $user['class_name']) { ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td>
                                    <?php echo $c['name_subject']; ?>
                                </td>
                                <td>
                                    <?php echo $c['class_name']; ?>
                                </td>
                                <td>
                                    <?php echo $c['lecturer']; ?>
                                </td>
                                <td>
                                    <a href=" <?php echo base_url('students/detailSubject/') . $c['id'] ?> ">View </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal Tambah-->
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel"> Add New Material</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?= base_url('materi'); ?>" method="post">
                <div class="modal-body">

                    <div class="mb-3">

                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Material name">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>

        </div>
    </div>
</div>