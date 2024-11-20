<div class="container">
    <div class="row">
        <div class="col">
            <div class="d-grid gap-2 d-md-flex justify-content-between">
                <button class="btn btn-primary" onclick="location.href='/orders'">Orders</button>
            </div>

        </div>
    </div>
    <div class="row" style="margin-top: 15px;">
        <div class="col">
            <h1><?= $name ?></h1>
            <br>
            <h5>Email:</h5>
            <p><?= $email ?></p>
            <br>
            <h5>Phone:</h5>
            <p><?= $phone ?></p>
            <br>
            <h5>Orders:</h5>
            <?php require VIEWS . '/orders_table.php';?>

            <br>
            <h5>Total:</h5>
            <p><?= $total['sum'] ?> RUB.</p>
            <p> -paid <?= $total['paid'] ?> RUB.</p>
            <p> -unpaid <?= $total['unpaid'] ?> RUB.</p>

        </div>
    </div>
<div>
