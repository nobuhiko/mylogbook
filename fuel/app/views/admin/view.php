<h2>Viewing #<?php echo $post->id; ?></h2>

<table class="table table-striped">
    <?php foreach($post as $k => $v): ?>
    <tr>
        <th><?=$k?></th>
        <td><?=$v?></td>
    </tr>
    <?php endforeach;?>
</table>
