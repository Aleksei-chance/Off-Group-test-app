<div class="modal" id="add_order" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="width: 70%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add order</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <h5>Client:</h5>
                    <select style="margin-bottom: 15px;" id="client_id" onchange="add_order_valid();">
                        <option value="0" selected>need select</option>
                        <?php foreach($clients as $item): ?>
                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <h5>Receiver</h5>
                    <input class="form-control" type="text" placeholder="name" id="name" oninput="add_order_valid();">
                </div>

                <div class="form-group">
                    <h5>Phone</h5>
                    <input class="form-control" type="text" placeholder="phone" id="phone" oninput="add_order_valid();">
                </div>

                <div class="form-group">
                    <h5>Items</h5>
                    <textarea placeholder="items" id="items" oninput="add_order_valid();"></textarea>
                </div>

                <div class="form-group">
                    <h5>Total</h5>
                    <input class="form-control" type="number" placeholder="total" id="total" oninput="add_order_valid();">
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" disabled class="btn btn-primary disabled" id="btn" onclick="add_order()">Add</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#add_order').modal('show');
    // $('#add_order').on('hidden.bs.modal', function (e) {
    //     orders_load();
    // })
</script>
