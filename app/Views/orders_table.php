<?php if(count($items ?? []) > 0): ?>
<table>
    <thead>
        <tr>
            <th style="width: 1px">#</th>
            <th style="width: 1px">Name</th>
            <th style="width: 150px">Contacts</th>
            <th>Items</th>
            <th style="width: 150px">Total</th>
            <th style="width: 1px">Status</th>
            <th style="width: 1px"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $item): ?>
            <tr>
                <td class="text_center small">
                    <?= $item['id'] ?>
                </td>
                <td class="text_center small" style="white-space: nowrap;">
                    <?= $item['name'] ?>
                </td>
                <td>
                    <div class="d-flex column small">
                        <?= $item['phone'] ?>
                        <a href="mailto:<?= $item['email'] ?>"><?= $item['email'] ?></a>
                    </div>
                </td>
                <td>
                    <?= $item['items'] ?>
                </td>
                <td class="text_center small" style="white-space: nowrap;">
                    <?= $item['total'] ?>
                </td>
                <td class="text_center small" style="white-space: nowrap;">
                    <?= $item['isPaid'] ?>
                </td>
                <td class="text_center small" style="white-space: nowrap;">
                    <button onclick="location.href='/order/<?= $item['id'] ?>'">open</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <center>No data</center>
<?php endif; ?>
