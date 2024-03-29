<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-warning" style="float: right"> Tambah Kelompok</button></h1>
    <div class="row">
        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Data Kelompok</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kelompok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 
            <form action="<?php echo base_url('kelompok/setGroup/'.$id) ?>" method="POST">

        <div class="form-group">
          <label for="usr">Nama Kelompok</label>
          <input type="text" class="form-control" id="usr" name="nama_kelompok">
        </div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
       </form>
    </div>
  </div>
</div>