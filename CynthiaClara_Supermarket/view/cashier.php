<?php
include 'header.php';
if (!isset($_SESSION['user'])) { header('Location: index.php'); }
include '../model/item.php';
$data = new Item();
$items = $data->allItems();
?>

<?php
    if (isset($_SESSION['respond']))
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
?>

<div class="container mx-auto mt-3 mb-3">
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
                    $(document).ready(() => {
                        $('#items').DataTable();
                    });

                    $('#edit<?= $item['item_id'] ?>').on('shown.bs.modal', () => {
                        $('#edit').trigger('focus');
                    });
                </script>
                    <td><?= $item['item_id'] ?></td>
                    <td><?= $item['item_name'] ?></td>
                    <td><?= $item['item_stock'] ?></td>
                    <td><?= $item['item_price'] ?></td>
                <td>
                    <button id="edit" class="btn btn-info" data-toggle="modal" data-target="#edit<?= $item['item_id'] ?>">VIEW</i></button>
                    <div class="modal fade" id="edit<?= $item['item_id'] ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?=$item['item_id']?> - <?= $item['item_name'] ?></h5>
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
                                                    <input type="text" name="item_name" id="item_name" class="form-control" placeholder="Name" value="<?= $item['item_name'] ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col pt-2">
                                                <label for="item_stock">Item Stock</label>
                                                <div class="input-group">
                                                    <input type="text" name="item_stock" id="warns<?= $item['item_id'] ?>" class="form-control amount" placeholder="100" value="<?= $item['item_stock'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="col pt-2">
                                                <label for="item_price">Item Price</label>
                                                <div class="input-group">
                                                    <input type="text" name="item_price" id="warns<?= $item['item_id'] ?>" class="form-control cost" placeholder="9000" value="<?= $item['item_price'] ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="pt-2" for="item_desc">Description</label>
                                        <div class="input-group">
                                            <textarea class="form-control" name="item_desc" rows="3" maxlength="200" required><?= $item['item_desc'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Save Changes">
                                        <button class="btn btn-danger" data-dismiss="modal">Cancel</a>
                                    </div>
                                </form>
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

