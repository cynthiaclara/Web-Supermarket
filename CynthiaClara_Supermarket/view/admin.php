<?php
include 'header.php';
if (!isset($_SESSION['user'])) { header('Location: index.php'); }
include '../model/user.php';
$data = new User();
$users = $data->allUsers();
?>

<div class="container mt-3 mb-3">
    <div class="row mx-auto">
        <div class="col-1 order-last">
            <button class="btn btn-success" data-toggle="modal" data-target="#insert">ADD NEW</button>
            <div class="modal fade" id="insert" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="../controller/add.user.php" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col pt-2">
                                        <label for="user_id">User ID</label>
                                        <div class="input-group">
                                            <input type="text" name="user_id" id="user_id" class="form-control" placeholder="01234567890" value="<?= $data->latest() ?>" required>
                                        </div>
                                    </div>
                                    <div class="col pt-2">
                                        <label for="password">Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="" class="form-control passcode" placeholder="••••••••" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col pt-2">
                                        <label for="nama">Nama</label>
                                        <div class="input-group">
                                            <input type="text" name="nama" id="nama" class="form-control" placeholder="John" value="" required>
                                        </div>
                                    </div>
                                    <div class="col pt-2">
                                        <label for="role_id">Role</label>
                                        <div class="input-group">
                                            <select name="role_id" id="role" class="form-control">
                                                <option value="1">Admin</option>
                                                <option value="2">Manager</option>
                                                <option value="3">Kasir</option>
                                                <option value="4">Pembeli</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <label class="pt-2" for="address">Address</label>
                                <div class="input-group">
                                    <textarea class="form-control" name="address" rows="3" maxlength="200" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="submit" class="btn btn-primary float-right" value="Create">
                                <button class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-11 order-first">
            <table id="users" class="display table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                    <tr>
                        <script>
                            $(document).ready(function() {
                                $('#users').DataTable();
                            } );

                            $('#remove<?= $user['user_id'] ?>').on('shown.bs.modal', () => {
                                $('#delete').trigger('focus');
                            });

                            $('#edit<?= $user['user_id'] ?>').on('shown.bs.modal', () => {
                                $('#update').trigger('focus');
                            });

                            $('#insert').on('shown.bs.modal', () => {
                                $('#create').trigger('focus');
                            });
                        </script>
                        <td><?= $user['user_id'] ?></td>
                        <td><?= $user['first_name'] . " " . $user['last_name'] ?></td>
                        <td><?= $data->role($user['role_id']) ?></td>
                        <td>
                            <button id="update" class="btn btn-info" data-toggle="modal" data-target="#edit<?= $user['user_id'] ?>">EDIT</button>
                            <div class="modal fade" id="edit<?= $user['user_id'] ?>" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit User <?=$user['user_id']?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="../controller/edit.user.php?id=<?= $user['user_id'] ?>" method="post">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col pt-2">
                                                        <label for="user_id">User ID</label>
                                                        <div class="input-group">
                                                            <input type="text" name="user_id" id="user_id" class="form-control" placeholder="01234567890" value="<?= $user['user_id'] ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col pt-2">
                                                        <label for="password">Password</label>
                                                        <div class="input-group">
                                                            <input type="password" name="password" id="" class="form-control passcode" placeholder="••••••••" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">    
                                                    <div class="col pt-2">
                                                        <label for="nama">Name</label>
                                                        <div class="input-group">
                                                            <input type="text" name="nama" id="nama" class="form-control" placeholder="John" value="<?= $user['last_name'] == '' ? $user['first_name'] : $user['first_name'] . " " . $user['last_name'] ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col pt-2">
                                                        <label for="role_id">Role</label>
                                                        <div class="input-group">
                                                            <select name="role_id" id="role" class="form-control">
                                                                <option value="1" <?= $data->role($user['role_id']) == "Admin" ? "selected" : "" ?>>Admin</option>
                                                                <option value="2" <?= $data->role($user['role_id']) == "Manager" ? "selected" : "" ?>>Manager</option>
                                                                <option value="3" <?= $data->role($user['role_id']) == "Kasir" ? "selected" : "" ?>>Kasir</option>
                                                                <option value="4" <?= $data->role($user['role_id']) == "Pembeli"  ? "selected" : "" ?>>Pembeli</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label class="pt-2" for="address">Address</label>
                                                <div class="input-group">
                                                    <textarea class="form-control" name="address" rows="3" maxlength="200" required><?= $user['address'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="submit" class="btn btn-primary float-right" value="Edit">
                                                <button class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <button id="delete" class="btn btn-danger" data-toggle="modal" data-target="#remove<?= $user['user_id'] ?>">DELETE</button>
                            <div class="modal fade" id="remove<?= $user['user_id'] ?>" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete User <?= $user['user_id'] ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure  to delete <?= $user['first_name'] ?>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger" href="../controller/remove.user.php?id=<?= $user['user_id'] ?>">Yes <i class="fad fa-dumpster"></i></a>
                                            <button class="btn btn-secondary" data-dismiss="modal">No</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


