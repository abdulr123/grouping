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
                        <th scope="col">Data Class</th>
                        <th scope="col">Activity</th>
                    </tr>
                </thead>
                <tbody>

                <?php $i = 1; ?>
                    <?php foreach ($dataclass as $dc) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $dc['class_name']; ?> <?= $dc['semester']; ?> <?= $dc['year'] . "/" . ($dc['year'] + 1) ?></td>
                            <td>
                                <a class="btn btn-warning" href="<?php echo base_url('user/rolebase/') . $dc['class_name'] ?> ">Performa</a> |
                                <a class="btn btn-info" href="<?php echo base_url('kelompok/class/') . $dc['id'] ?> ">Group</a> |
                                <a class="btn btn-success" href="<?php echo base_url('user/nilai') . $dc['id'] ?> ">Nilai</a> |
                                <a class="btn btn-danger" href="<?php echo base_url('user/tugas/') . $dc['id'] ?> ">Task</a>
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
