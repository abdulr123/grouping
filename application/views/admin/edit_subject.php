<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">


            <?php foreach ($EditSubject as $ed) : ?>

                <form action="<?= base_url('admin/update_subject'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" value="<?= $ed->id ?>">
                    </div>

                    <div class="form-group">
                        <label> Code Subject</label>
                        <input type="text" name="code_subject" class="form-control" value="<?= $ed->code_subject ?>">
                    </div>

                    <div class="form-group">
                        <label> Name Subject</label>
                        <input type="text" name="name_subject" class="form-control" value="<?= $ed->name_subject ?>">
                    </div>

                    <div class="form-group">
                        <label class="small"> Please Select Semester </label>
                        <select name="semester" id="semester" class="form-control">

                            <?php foreach ($semester as $m) : ?>
                                <option value="<?= $m['semester'] ?>"> <?= $m['semester']; ?></option>
                            <?php endforeach; ?>

                        </select>
                        <?= form_error('semester', '<small class="text-danger pl-3">', '</small>'); ?>
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
                        <label class="small"> Please Select Class </label>
                        <select name="class_name" id="class_name" class="form-control">

                            <?php foreach ($class as $m) : ?>
                                <option value="<?= $m['class_name'] ?>"> <?= $m['class_name']; ?></option>
                            <?php endforeach; ?>

                        </select>
                        <?= form_error('class_name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>



                    <div class="form-group">
                        <label class="small"> Please Select Lecturer </label>
                        <select name="lecturer" id="lecturer" class="form-control">

                            <?php foreach ($lecturer as $m) : ?>
                                <option value="<?= $m['name'] ?>"> <?= $m['name']; ?></option>
                            <?php endforeach; ?>

                        </select>
                        <?= form_error('lecturer', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label> Status Class, 0 = Not Active, 1 = Active</label>
                        <input type="text" name="is_active" class="form-control" value="<?= $ed->is_active ?>">
                    </div>

                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('admin/subject'); ?>" class="btn btn-success"> Back</a>

                </form>


            <?php endforeach ?>

        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->