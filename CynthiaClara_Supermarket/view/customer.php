<?php
include 'header.php';
if (!isset($_SESSION['user'])) { header('Location: index.php'); }
include '../model/item.php';
$data = new Item();
$items = $data->allItems();
?>

<div class="container mt-3 mx-auto mb-3">
    <table id="items" class="display table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item) : ?>
            <tr>
                <script>
                    $(document).ready(function() {
                        $('#items').DataTable();
                    });

                    $('#view<?= $item['item_id'] ?>').on('shown.bs.modal', () => {
                        $('#view').trigger('focus');
                    });
                </script>
                <td><?= $item['item_name'] ?></td>
                <td><?= $item['item_price'] ?></td>
                <td><?= $item['item_stock'] > 5 ? $item['item_stock'] > 15 ? 'Tersedia' : 'Terbatas' : 'Hampir habis' ?></td>
                <td>
                    <button id="view" class="btn btn-info" data-toggle="modal" data-target="#view<?= $item['item_id'] ?>">VIEW MORE</button>
                    <div class="modal fade" id="view<?= $item['item_id'] ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?=$item['item_name']?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">ID <span class="badge badge-primary badge-pill"><?= $item['item_id'] ?></span></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Name <span class="badge badge-primary badge-pill"><?= $item['item_name'] ?></span></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Stock <span class="badge badge-primary badge-pill"><?= $item['item_stock'] ?></span></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Price <span class="badge badge-primary badge-pill"><?= $item['item_price'] ?></span></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Description <span class="badge badge-primary badge-pill"><?= $item['item_desc'] ?></span></li>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-dismiss="modal">Okay</a>
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
                <th>Name</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>

