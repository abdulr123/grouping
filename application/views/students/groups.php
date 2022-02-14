<style type="text/css">
    .current_group{
            color: #0d2a81;
            font-weight: 700;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

                    <?php
                        $iduser =  $this->session->userdata('id');
                     ?>
                    <?php foreach ($dataclass as $dc) : ?>
                                        <?php foreach ($kelompok as $kb) : ?>
                                                   <tr>
                                                         <td class="child">
                                                            <h3 class="h3 text-gray-800"><?= $kb['nama_kelompok']; ?></h3>
                                                                <!-- list nama -->
                                                                 <table class="table table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">Data Kelompok</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php foreach ($kelompok_belajar as $s) : ?>
                                                                        <?php if ($s['nm_k'] == $kb['nama_kelompok'] && $dc['class_name'] == $s['cname'] ) { ?>     
                                                                            <tr <?php if($iduser == $s['uid']){ ?> class="current_group"<?php }?>
                                                                                >
                                                                                <td style="padding: .40rem">
                                                                                     <?= $s['nm']; ?>  

                                                                                      <?php if($iduser == $s['uid']){ ?>
                                                                                        | <a href=""> Tugas Individu </a> | <a href=""> Tugas Kelompok </a>
                                                                                        <?php }?>

                                                                                </td>
                            
                                                                            </tr>
                                                                        <?php }?>
                                                                    <?php endforeach ?>
                                                                    </tbody>
                                                                 </table>
                                                            </td>
                                                     </tr>

                                          <?php endforeach ?>
                      <?php endforeach ?>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

