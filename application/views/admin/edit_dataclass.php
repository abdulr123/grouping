<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?php foreach ($EditClass as $ed) : ?>
                <form action="<?= base_url('admin/update_dataclass'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" value="<?= $ed->id ?>">
                    </div>
                    <div class="form-group">
                        <label> Class Name</label>
                        <input type="text" name="class_name" class="form-control" value="<?= $ed->class_name ?>">
                    </div>
                    <div class="form-group">
                        <label> Class Year</label>
                        <input type="text" name="year" class="form-control" value="<?= $ed->year ?>">
                    </div>
                    <div class="form-group">
                        <label> Please Select Semester </label>
                        <select name="semester" id="semester" class="form-control">
                            <?php foreach ($semester as $s) : ?>
                                <option value="<?= $s['semester']; ?>"> <?= $s['semester']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('semester', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label> Status Class, 0 = Not Active, 1 = Active</label>
                        <input type="text" name="is_active" class="form-control" value="<?= $ed->is_active ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('admin/dataclass'); ?>" class="btn btn-success"> Back</a>
                </form>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>