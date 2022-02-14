    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" placeholder="Full Name" name="name" value="<?= set_value('name'); ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>

                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" placeholder="Email Address" name="email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>

                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nim" placeholder="NIM" name="nim">
                                    <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>


                                <div class="form-group">
                                    <label class="small"> Please Select Class </label>
                                    <select name="class_name" id="class_name" class="form-control">

                                        <?php foreach ($class as $m) : ?>
                                            <option value="<?= $m['class_name']; ?>"> <?= $m['class_name']; ?> - <?= $m['semester'] . " " . $m['year'] . "/" . ($m['year'] + 1) ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                    <?= form_error('class_name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label class="small"> Please Select Major </label>
                                    <select name="major" id="major" class="form-control">

                                        <?php foreach ($major as $m) : ?>
                                            <option value="<?= $m['major']; ?>"> <?= $m['major']; ?> </option>
                                        <?php endforeach; ?>

                                    </select>
                                    <?= form_error('major', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>


                                <button type="submit" name="registration" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>