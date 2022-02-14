<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
        </div>
    </div>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"> <b><?= $user['name']; ?></b></h5>
                    <label>
                        <?php
                        if ($user['role_id'] == 2) {
                            echo 'Nomor Induk Mahasiswa';
                        } else {
                            echo 'Nomor Induk Dosen Nasional';
                        }
                        ?>
                        <p class="card-text">
                            <?php
                            if ($user) {
                                $data = [
                                    'email' => $user['email'],
                                    'role_id' => $user['role_id']
                                ];
                                $this->session->set_userdata($data);
                                if ($user['role_id'] == 2) {
                                    echo $user['nim'];
                                } else {
                                    echo $user['nidn'];
                                }
                            }
                            ?>
                        </p>
                    </label>
                    <br>
                    <label>
                        <?php
                        if ($user['role_id'] == 2) {
                            echo 'Kelas ';
                            if ($user['role_id'] == 2) {
                                echo $user['class_name'];
                            } else {
                                echo $user[''];
                            }
                        }
                        if ($user['role_id'] == 2) {
                            echo ', Jurusan ';
                            if ($user['role_id'] == 2) {
                                echo $user['major'];
                            } else {
                                echo $user[''];
                            }
                        }
                        ?>
                        <p class="card-text"> Username <?= $user['email']; ?></p>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->