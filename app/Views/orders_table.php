<?php if(count($items ?? []) > 0): ?>
<div class="table-responsive">
    <table class="table table-striped table-hover text-center">
        <thead class="">
            <tr class="table-primary">
                <th scope="col">#</th>
                <th scope="col">Receiver</th>
                <th scope="col">Items</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item): ?>
            <tr style="vertical-align: middle;">
                <td scope="row">
                    <?= $item['id'] ?>
                </td>
                <td style="white-space: nowrap;">
                    <?= $item['receiver'] ?>
                    <?php if($item['receiver_phone']): ?>
                    <br>
                    <a href="tel:<?= $item['receiver_phone'] ?>"><?= $item['receiver_phone'] ?></a>
                    <?php endif; ?>
                </td>
                <td>
                    <?= $item['items'] ?>
                </td>
                <td style="white-space: nowrap;">
                    <?= $item['total'] ?>
                </td>
                <td style="white-space: nowrap;">
                    <?= $item['isPaid'] ?>
                </td>
                <td style="white-space: nowrap;">
                    <button class="btn btn-secondary btn-sm" onclick="location.href='/order/<?= $item['id'] ?>'">open</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php else: ?>
    <center>No data</center>
<?php endif; ?>
