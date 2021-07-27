<?php
include 'header.php';
if (!isset($_SESSION['user'])) { header('Location: index.php'); }
include '../model/item.php';
$data = new item();
$items = $data->allItems();
?>

<?php
    if (isset($_SESSION['respond']))
    {
        if ($_SESSION['modal'] == 'edit')
        {
            echo
            "
            <script>
            $(document).ready(() => {
                $('#edit" . $_SESSION['last'] . "').modal('show');
                $('#edit" . $_SESSION['last'] . "').find('.modal-footer').prepend('<p>" . $_SESSION['respond'] . "</p>');
            });
            </script>
            ";
        }
        else if ($_SESSION['modal'] == 'insert')
        {
            echo
            "
            <script>
            $(document).ready(() => {
                $('#insert').modal('show');
            });
            </script>
            ";
        }
    }
?>

<div class="container mt-3 mb-3">
    <div class="row mx-auto">
        <div class="col-1 order-last">
            <button class="btn btn-success" data-toggle="modal" data-target="#insert">ADD NEW</button>
            <div class="modal fade" id="insert" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="../controller/create.item.php" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col pt-2">
                                        <label for="item_id">Item ID</label>
                                        <div class="input-group">
                                            <input type="text" name="item_id" id="item_id" class="form-control" placeholder="1111" value="<?= $data->latest() ?>" required>
                                        </div>
                                    </div>
                                    <div class="col pt-2">
                                        <label for="item_name">Item Name</label>
                                        <div class="input-group">
                                            <input type="text" name="item_name" id="item_name" class="form-control" placeholder="Product Name" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col pt-2">
                                        <label for="item_stock">Item Stock</label>
                                        <div class="input-group">
                                            <input type="text" name="item_stock" id="item_stock" class="form-control" placeholder="100" value="" required>
                                        </div>
                                    </div>
                                    <div class="col pt-2">
                                        <label for="item_price">Item Price</label>
                                        <div class="input-group">
                                            <input type="text" name="item_price" id="item_price" class="form-control" placeholder="9000" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <label class="pt-2" for="item_desc">Description</label>
                                <div class="input-group">
                                    <textarea class="form-control" name="item_desc" rows="3" maxlength="200" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <p><?php if (isset($_SESSION['respond'])) { if ($_SESSION['modal'] == 'insert') { echo $_SESSION['respond']; } } ?></p>
                                <input type="submit" name="create" class="btn btn-primary float-right" value="Create">
                                <button class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-11 order-first">
            <table id="items" class="display table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Stock</th>
                        <th>Harga Barang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item) : ?>
                    <tr>
                        <script>
                            $(document).ready(function() {
                                $('#items').DataTable();
                            } );

                            $('#remove<?= $item['item_id'] ?>').on('shown.bs.modal', () => {
                                $('#delete').trigger('focus');
                            });

                            $('#edit<?= $item['item_id'] ?>').on('shown.bs.modal', () => {
                                $('#update').trigger('focus');
                            });

                            $('#insert').on('shown.bs.modal', () => {
                                $('#create').trigger('focus');
                            });
                        </script>
                        <td><?= $item['item_id'] ?></td>
                        <td><?= $item['item_name'] ?></td>
                        <td><?= $item['item_stock'] ?></td>
                        <td><?= $item['item_price'] ?></td>
                        <td>
                            <button id="update" class="btn btn-info" data-toggle="modal" data-target="#edit<?= $item['item_id'] ?>">VIEW</button>
                            <div class="modal fade" id="edit<?= $item['item_id'] ?>" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit item <?=$item['item_id']?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="../controller/update.item.php?id=<?= $item['item_id'] ?>" method="post">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col pt-2">
                                                        <label for="item_id">Item ID</label>
                                                        <div class="input-group">
                                                            <input type="text" name="item_id" id="item_id" class="form-control" placeholder="1111" value="<?= $item['item_id'] ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col pt-2">
                                                        <label for="item_name">Item Name</label>
                                                        <div class="input-group">
                                                            <input type="text" name="item_name" id="item_name" class="form-control" placeholder="Name" value="<?= $item['item_name'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col pt-2">
                                                        <label for="item_stock">Item Stock</label>
                                                        <div class="input-group">
                                                            <input type="text" name="item_stock" id="item_stock" class="form-control" placeholder="100" value="<?= $item['item_stock'] ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col pt-2">
                                                        <label for="item_price">Item Price</label>
                                                        <div class="input-group">
                                                            <input type="text" name="item_price" id="item_price" class="form-control" placeholder="9000" value="<?= $item['item_price'] ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label class="pt-2" for="item_desc">Description</label>
                                                <div class="input-group">
                                                    <textarea class="form-control" name="item_desc" rows="3" maxlength="200" required><?= $item['item_desc'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                
                                                <input type="submit" class="btn btn-primary" name="update" value="Save Changes">
                                                <button class="btn btn-danger" data-dismiss="modal">Cancel</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <button id="delete" class="btn btn-danger" data-toggle="modal" data-target="#remove<?= $item['item_id'] ?>">DELETE</button>
                            <div class="modal fade" id="remove<?= $item['item_id'] ?>" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete item <?= $item['item_id'] ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure  to delete <?= $item['item_name'] ?>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger" href="../controller/delete.item.php?id=<?= $item['item_id'] ?>">Yes <i class="fad fa-trash-alt"></i></a>
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
                        <th>Nama Barang</th>
                        <th>Stock</th>
                        <th>Harga Barang</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


