<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Students Major</h1>
    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <a href="" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#newClassModal"> Add New Major</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Code Major</th>
                        <th scope="col">Major</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($major as $c) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $c['idMajor']; ?></td>
                            <td><?= $c['major']; ?></td>
                            <td><?= $c['is_active']; ?></td>
                            <td>
                                <a href="<?php echo base_url('admin/edit_major/') . $c['idMajor'] ?>"><i class="fas fa-edit"></i></a>
                                <a href="<?php echo base_url('admin/hapus_major/') . $c['idMajor'] ?> "><i class="fas fa-trash-alt"></i></a>
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

<!-- Modal Tambah-->
<div class="modal fade" id="newClassModal" tabindex="-1" aria-labelledbClassLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" iClassLabel"> Add New Major</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?= base_url('admin/major'); ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <input type="text" class="form-control" id="idMajor" name="idMajor" placeholder="Code Major">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="major" name="major" placeholder="Major">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                <label class="form-check-label" for="is_active">
                                    Active?
                                </label>
                            </div>
                        </div>
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