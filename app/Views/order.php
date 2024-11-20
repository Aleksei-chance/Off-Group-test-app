<div class="container">
    <div class="row">
        <div class="col">
            <div class="d-grid gap-2 d-md-flex justify-content-between">
                <button class="btn btn-primary" onclick="location.href='/orders'">Orders</button>
                <button class="btn btn-primary" onclick="location.href='/client/<?= $client_id ?>'"><?= $client ?></button>
            </div>

        </div>
    </div>
    <div class="row" style="margin-top: 15px;">
        <div class="col">
            <h1>Order: #<?= $id ?></h1>
            <br>
            <h5>Receiver:</h5>
            <p><?= $receiver ?></p>
            <br>
            <h5>Contact phone:</h5>
            <p><?= $receiver_phone ?></p>
            <br>
            <h5>Items list:</h5>
            <p><?= $items ?></p>
            <br>
            <h5>Order amount:</h5>
            <p><?= number_format($total, 2) ?> RUB. - <?= $isPaid ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="d-grid gap-2 d-md-flex justify-content-between">
                <?php if($isPaid_id): ?>
                    <button class="btn btn-secondary" onclick="order_set_value_text(<?= $id ?>, 'isPaid', 0)">Set status - unpaid</button>
                <?php else: ?>
                    <button class="btn btn-secondary" onclick="order_set_value_text(<?= $id ?>, 'isPaid', 1)">Set status - paid</button>
                <?php endif; ?>
                <button class="btn btn-danger" onclick="order_set_value_text(<?= $id ?>, 'hidden', 1)">Delete</button>
            </div>

        </div>
    </div>
<div>
