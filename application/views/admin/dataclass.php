<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Students Class</h1>
    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <a href="" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#newClassModal"> Add New Class</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Class Name</th>
                        <th scope="col">Class Year</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($class as $c) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $c['class_name']; ?></td>
                            <td><?= $c['year'] . "/" . ($c['year'] + 1) ?></td>
                            <td><?= $c['semester']; ?></td>
                            <td><?= $c['is_active']; ?></td>
                            <td>
                                <a href="<?php echo base_url('admin/edit_dataclass/') . $c['id'] ?>"><i class="fas fa-edit"></i></a>
                                <a href="<?php echo base_url('admin/hapus_dataclass/') . $c['id'] ?> "><i class="fas fa-trash-alt"></i></a>
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
                <h5 class="modal-title" iClassLabel"> Add New Class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/dataclass'); ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <input type="text" class="form-control" id="class_name" name="class_name" placeholder="Class name">
                        </div>
                        <div class="form-group">
                            <label class="small"> Please Select Year </label>
                            <select name="year" id="year" class="form-control">
                                <?php foreach ($year as $m) : ?>
                                    <option value="<?= $m['year'] ?>"> <?= $m['year']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('year', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="small"> Please Select Semester </label>
                            <select name="semester" id="semester" class="form-control">
                                <?php foreach ($semester as $s) : ?>
                                    <option value="<?= $s['semester']; ?>"> <?= $s['semester']; ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('semester', '<small class="text-danger pl-3">', '</small>'); ?>
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