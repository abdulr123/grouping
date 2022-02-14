<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <?php
             $no =1;
            foreach($siswa as $s) {?>
            <?php foreach($tbase as $t) {?>
              <?php if($s['email'] == $t['student_id']) {?>
             <div class="row">   
                <div class="col-sm-8">
                    <h5 class="h5 mb-4 text-gray-800">#<?php echo $no++; ?>. <?php echo 'Nama : ' .$s['name'] . ' || Email : '. $t['student_id']; ?> </h5> 
                </div>
                <div class="col-sm-4">
                    <form action="<?= base_url('user/performaReset/' .$t['student_id'] ); ?>">
                        <button type="submit" class="btn btn-warning" style="float:right" >Reset</button>
                    </form>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">AGE</th>
                        <th scope="col">GENDER</th>
                        <th scope="col">EMI</th>
                        <th scope="col">GS</th>
                        <th scope="col">TN</th>
                        <th scope="col">HW</th>
                        <th scope="col">MTG</th>
                        <th scope="col">FG</th>
                        <th scope="col">BOBOT</th>  
                        <th scope="col">Similarity</th>
                        <th scope="col">CATEGORY</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                    $i =1;
                    foreach($rbase as $r) {?>
                        <?php if($r['student_id'] == $t['student_id']) {?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $r['age'];?></td>
                            <td><?php echo $r['gender'];?></td>
                            <td><?php echo $r['emi'];?></td>
                            <td><?php echo $r['gs'];?></td>
                            <td><?php echo $r['tn'];?></td>
                            <td><?php echo $r['hw'];?></td>
                            <td><?php echo $r['mtg'];?></td>
                            <td><?php echo $r['fg'];?></td>
                            <td><?php echo $r['bobot'];?></td>
                            <td><?php echo $r['similarity'];?></td>
                            <td><?php echo $r['kategory'];?></td>
                        </tr>
                        <?php }?>
                    <?php }?>
                </tbody>
            </table>
            <?php }?>
           <?php }?>
         <?php }?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
