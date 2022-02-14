<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> <a href="<?php echo site_url('Kelompok/CreateGroup/'.$id); ?>" class="btn btn-warning" style="float: right"> Tambah Kelompok</a></h1>

    <div class="row">


    <div class="col-sm-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Data Siswa</th>
                        <th scope="col">Kelompok</th>
                    </tr>
                </thead>
                <tbody>

                <?php $i = 1; ?>
                    <?php foreach ($dataclass as $dc) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td class="parent"><?= $dc['class_name']; ?> <?= $dc['semester']; ?> <?= $dc['year'] . "/" . ($dc['year'] + 1) ?> <br/>
                                      <table>
                                         <?php foreach ($siswa as $s) : ?>
                                            <?php if ($dc['class_name'] === $s['class_name'] ) {?>
                                                        <tr>
                                                                <td class="child" style="padding: .40rem;">
                                                                   <?= $s['name']; ?> 
                                                                   <span name="<?= $s['email']; ?>">

                                                                   </span>
                                                                </td>

                                                                 <script>
                                                                 $(document).ready(function() {
                                                                    console.log('test');
                                                                    $.ajax({
                                                                        type: "POST",
                                                                        url: "<?php echo site_url('Kelompok/GetBobotByEmail'); ?>",
                                                                        dataType : "JSON",
                                                                        data : {
                                                                                    mail:'<?= $s['email']; ?>', 

                                                                                },
                                                                        success: function(data) {
                                                                            if(data != 0){
                                                                            if (data[0].kategory == "Very Bad") {
                                                                                var btn = "btn-danger";
                                                                            }else if(data[0].kategory == "Bad"){
                                                                                var btn = "btn-warning";
                                                                            }else if(data[0].kategory == "Average"){
                                                                                var btn = "btn-secondary";
                                                                            }else if(data[0].kategory == "Good"){
                                                                                 var btn = "btn-primary";
                                                                             }else if(data[0].kategory == "Excelent"){
                                                                                var btn = "btn-success";
                                                                             }



                                                                            var  b = '<button class="btn '+btn+'">'+data[0].kategory+ '</button>'
                                                                            var id = '<?= $s['email']; ?>';
                                                                            $('span[name="<?= $s['email']; ?>"]').html(b);
                                                                        }

                                                                        }
                                                                    }); 

                                                                });
                                                                </script>

                                                                <!-- ------------------------------------------------------------------------- -->
                                                                    <form action="<?php echo base_url('kelompok/setGroup/') ?>" method="POST">
                                                                <td style="padding: .40rem;">
                                                                        <input hidden type="text" name="student" value="<?= $s['id']; ?>"> 
                                                                        <input hidden type="text" name="dosen" value="<?= $this->session->userdata('id') ?>"> 
                                                                        <input hidden type="text" name="kelas" value="<?= $dc['id']; ?>"> 
                                                                          <select class="form-control" id="kelompok" name="kelompok">
                                                                            <?php if ($s['nama_kelompok'] != '') { ?>
                                                                                 <option  selected  value="<?= $s['kid']; ?>">
                                                                                    <span style="color: #2001c1;font-weight: 600;">
                                                                                        <?= $s['nama_kelompok']; ?>
                                                                                    </span>
                                                                                    </option>
                                                                            <?php }else {?>
                                                                                <option>--</option>
                                                                           <?php }?>
                                                                             <?php foreach ($kelompok as $k) : ?>

                                                                                 <option  value="<?= $k['id_kelompok']; ?>"> <?= $k['nama_kelompok']; ?></option>
                                                                              <?php endforeach ?>
                                                                          </select>
                                                                </td>   
                                                                <td style="padding: .40rem;">
                                                                     <button type="submit" class="btn btn-primary"> Set Kelompok</button>
                                                                </td>
                                                                </form>
                                                            </tr>  
                                                     
                                         <?php }?>
                                         <?php endforeach ?>
                                     </table>

                            </td>

                            <td class="parent">
                                    <table>
                                          <?php foreach ($kelompok as $kb) : ?>
                                                   <tr>
                                                         <td class="child">
                                                            <h3 class="h3 text-gray-800"><?= $kb['nama_kelompok']; ?></h3>
                                                                <!-- list nama -->
                                                                 <table>
                                                                    <?php foreach ($kelompok_belajar as $s) : ?>
                                                                        <?php if ($s['nm_k'] == $kb['nama_kelompok'] && $dc['class_name'] == $s['cname'] ) { ?>     
                                                                            <tr>
                                                                                <td style="padding: .40rem">
                                                                                     <?= $s['nm']; ?>
                                                                                </td>
                                                                            </tr>
                                                                        <?php }?>
                                                                    <?php endforeach ?>
                                                                 </table>
                                                            </td>
                                                     </tr>

                                          <?php endforeach ?>

                                    </table>
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
