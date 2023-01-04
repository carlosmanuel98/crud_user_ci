<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
</head>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Table Users</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="welcome">Welcome</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Table Users
                </div>
                <!-- Button trigger modal -->
                <div class="d-flex justify-content-end container-fluid px-3 mt-2">
                    <button type="button" class="btn btn-primary col-md-2" data-toggle="modal" data-target="#userModal" id="addUser">Register User
                    </button>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Date creation</th>
                                <th>Rol</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Date creation</th>
                                <th>Rol</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <?php
                                foreach ($users as $value) {
                                    echo "<tr>
                                            <td>$value->id</td>
                                            <td>$value->first_name</td>
                                            <td>$value->last_name</td>
                                            <td>$value->email</td>
                                            <td>$value->date_creation</td>
                                            <td>$value->rol_description</td>
                                            <td><button type='button' class='btn btn-primary updateUser' id='" . $value->id . "'>Edit</td>                                                    </td>
                                            <td><button type='button' class='btn btn-danger deleteUser' id='" . $value->id . "'>Delete</td>                                                    </td>
                                            </tr>";
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <div id="responseModal"></div>

    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Create Account</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="UserController/register">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputFirstName" name="inputFirstName" type="text" placeholder="Enter your first name" required/>
                                    <label for="inputFirstName">First name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input class="form-control" id="inputLastName" name="inputLastName" type="text" placeholder="Enter your last name"/>
                                    <label for="inputLastName">Last name</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputEmail" type="email" name="inputEmail" placeholder="name@example.com" required/>
                            <label for="inputEmail">Email address</label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputPassword" type="password" name="inputPassword" placeholder="Create a password" required/>
                                    <label for="inputPassword">Password</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="inputRol" required>
                                    <option selected value="">Open to select rol user</option>
                                    <?php
                                    foreach ($roles as $value) {
                                        echo  "<option value='$value->id'>$value->rol_description</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</html>