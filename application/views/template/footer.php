           <!-- Footer -->
           <footer class="sticky-footer bg-white">
               <div class="container my-auto">
                   <div class="copyright text-center my-auto">
                       <span>Copyright &copy; Student Grouping System <?= date('Y') ?></span>
                   </div>
               </div>
           </footer>
           <!-- End of Footer -->

           </div>
           <!-- End of Content Wrapper -->

           </div>
           <!-- End of Page Wrapper -->

           <!-- Scroll to Top Button-->
           <a class="scroll-to-top rounded" href="#page-top">
               <i class="fas fa-angle-up"></i>
           </a>

           <!-- Logout Modal-->
           <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                           <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">×</span>
                           </button>
                       </div>
                       <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                       <div class="modal-footer">
                           <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                           <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                       </div>
                   </div>
               </div>
           </div>




           <!-- Bootstrap core JavaScript-->
           <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
           <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

           <!-- Core plugin JavaScript-->
           <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

           <!-- Custom scripts for all pages-->
           <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
 
           <script>
               $('.form-check-input').on('click', function() {
                   const menuId = $(this).data('menu');
                   const roleId = $(this).data('role');

                   $.ajax({
                       url: "<?= base_url('admin/changeaccess'); ?>",
                       type: 'post',
                       data: {
                           menuId: menuId,
                           roleId: roleId
                       },
                       success: function() {
                           document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                       }
                   });

               });
           </script>

           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
   <?php 
                
     if($this->session->userdata('role_id') == 2){ ?>
                   
                  
      <?php $this->load->view('template/perform');?>
 <script>
 $( document ).ready(function() {
    $('#btn_rolebase').hide();
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('User/checkExistingPerform'); ?>",
        success: function(data) {
            console.log(data);
            if(data == 0){
                $('#perfom').modal('show');
            }
        }
    });
});


$('.age').on('keyup', function() {
    checkbutton();
});
$('.gender').on('keyup', function() {
    checkbutton();
});

$('.emi').on('keyup', function() {
    checkbutton();
});

$('.gs').on('keyup', function() {
    checkbutton();
});

$('.tn').on('keyup', function() {
    checkbutton();
});

$('.hw').on('keyup', function() {
    checkbutton();
});
$('.mtg').on('keyup', function() {
    checkbutton();
});

$('.fg').on('keyup', function() {
    checkbutton();
});



function checkbutton(){
    if( 
        $('.age').val() != '' &&  
        $('.gender').val() != '' &&
        $('.emi').val() != '' &&
        $('.gs').val() != '' &&
        $('.tn').val() != '' &&
        $('.hw').val() != '' &&
        $('.mtg').val() != ''  &&
        $('.fg').val() != ''
        ) {
        console.log('test');
        $('#btn_rolebase').show();
    }
}





    
    //Save Rolebase
       $('#btn_rolebase').on('click',function(){
           console.log('test');
        var p_age        = $('.age').val();
        var p_gender     = $('.gender').val();
        var p_emi        = $('.emi').val();
        var p_gs         = $('.gs').val();
        var p_tn         = $('.tn').val();
        var p_hw         = $('.hw').val();
        var p_mtg        = $('.mtg').val();
        var p_fg         = $('.fg').val();

        $.ajax({
            type : "POST",
            url  : "<?php echo site_url('User/Hitung')?>",
            dataType : "JSON",
            data : {
                        age:p_age, 
                        gender:p_gender, 
                        emi:p_emi,
                        gs:p_gs,
                        tn:p_tn,
                        hw:p_hw,
                        mtg:p_mtg,
                        fg:p_fg,
                        kategory:'Very Bad'
                    },
            success: function(data){

                console.log(data);
            }
        });
        $.ajax({
            type : "POST",
            url  : "<?php echo site_url('User/Hitung')?>",
            dataType : "JSON",
            data : {
                        age:p_age, 
                        gender:p_gender, 
                        emi:p_emi,
                        gs:p_gs,
                        tn:p_tn,
                        hw:p_hw,
                        mtg:p_mtg,
                        fg:p_fg,
                        kategory:'Bad'
                    },
            success: function(data){

                console.log(data);
            }
        });
        $.ajax({
            type : "POST",
            url  : "<?php echo site_url('User/Hitung')?>",
            dataType : "JSON",
            data : {
                        age:p_age, 
                        gender:p_gender, 
                        emi:p_emi,
                        gs:p_gs,
                        tn:p_tn,
                        hw:p_hw,
                        mtg:p_mtg,
                        fg:p_fg,
                        kategory:'Average'
                    },
            success: function(data){

                console.log(data);
            }
        });
        $.ajax({
            type : "POST",
            url  : "<?php echo site_url('User/Hitung')?>",
            dataType : "JSON",
            data : {
                        age:p_age, 
                        gender:p_gender, 
                        emi:p_emi,
                        gs:p_gs,
                        tn:p_tn,
                        hw:p_hw,
                        mtg:p_mtg,
                        fg:p_fg,
                        kategory:'Good'
                    },
            success: function(data){

                console.log(data);
            }
        });
        $.ajax({
            type : "POST",
            url  : "<?php echo site_url('User/Hitung')?>",
            dataType : "JSON",
            data : {
                        age:p_age, 
                        gender:p_gender, 
                        emi:p_emi,
                        gs:p_gs,
                        tn:p_tn,
                        hw:p_hw,
                        mtg:p_mtg,
                        fg:p_fg,
                        kategory:'Excelent'
                    },
            success: function(data){

                console.log(data);
            }
        });
        $('.age').val("");
        $('.gender').val("");
        $('.emi').val("");
        $('.gs').val("");
        $('.tn').val("");
        $('.hw').val("");
        $('.mtg').val("");
        $('.fg').val("");
        $('#perfom').modal('hide')

    });


 </script>
<?php }?>

           </body>

           </html>