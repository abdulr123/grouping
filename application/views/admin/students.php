<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Email</th>
                        <th scope="col">Class</th>
                        <th scope="col">Major</th>
                    </tr>
                </thead>
                <tbody>

                <?php $i = 1; ?>
                    <?php foreach ($userr as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><img src="../assets/img/profile/<?php echo $s["image"] ?>" class="img-thumbnail" width="100"></td>
                            <td><?= $s['name']; ?></td>
                            <td> <?= $s['nim']; ?></td>
                            <td><?= $s['email']; ?></td>
                            <td><?= $s['class_name']; ?></td>
                            <td><?= $s['major']; ?></td>
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
