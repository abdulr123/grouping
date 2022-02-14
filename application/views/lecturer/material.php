<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php $i = 1; ?>
                    <?php foreach ($sb as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $s['name_subject']; ?>  <?= $s['class_name']; ?> <?= $s['semester']; ?> <?= $s['year'] . "/" . ($s['year'] + 1) ?></td>
                            <td>
                                <a href="<?php echo base_url('lecturer/detail_material/') . $s['id'] ?> ">Add Material</a> &nbsp;
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
