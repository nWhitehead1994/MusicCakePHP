<h1>Blog Music</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Artist</th>
        
    </tr>

    <!-- Here is where we iterate through our $music query object, printing out article info -->

    <?php foreach ($music as $music): ?>
    <tr>
        <td><?= $music->id ?></td>
        <td>
            <?= $this->Html->link($music->artist, ['action' => 'view', $music->id]) ?>
        </td>
        <td>
            <?= $this->Html->link('Edit Music', ['action' => 'edit', $music->id])?>
        </td>
        <td>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $music->id],
                ['confirm' => 'Are you sure?'])
                ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?= $this->Html->link('Add Music', ['action' => 'add']) ?>