<!-- Modal -->
    <div class="modal fade show" id="userModalUpdate" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Update Account</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="UserController/update">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputFirstName" name="inputFirstName" type="text" value="<?php echo $first_name ?>" placeholder="Enter your first name" />
                                    <label for="inputFirstName">First name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input class="form-control" id="inputLastName" name="inputLastName" type="text" value="<?php echo $last_name ?>" placeholder="Enter your last name" />
                                    <label for="inputLastName">Last name</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputEmail" type="email" name="inputEmail" value="<?php echo $email ?>" placeholder="name@example.com" readonly/>
                            <label for="inputEmail">Email address</label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputPassword" type="password" name="inputPassword" value="<?php echo $password ?>" placeholder="Create a password" />
                                    <label for="inputPassword">Password</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="inputRol">
                                    <option selected value="">Open to select rol user</option>
                                    <?php
                                    foreach ($roles as $value) {
                                        if ($value->id == $id_rol) {
                                            echo "<option selected='selected' value='" . $value->id . "'>" . $value->rol_description . "</option>";
                                        } else {
                                            echo "<option value='" . $value->id . "'>" . $value->rol_description . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>