<?php if ($posts): ?>
<table class="table table-striped responsive">
    <thead>
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>Location</th>
            <th>Point</th>
            <th>Entry</th>
            <th>Exit</th>
            <th>Ave</th>
            <th>Max</th>
            <th>Dive Time</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post): ?>
        <tr>
            <td><?php echo $post->serial_dive_no; ?></td>
            <td><a href="/log/view/<?= $post->id?>"><?php echo $post->date; ?></a></td>
            <td><?php echo $post->location; ?></td>
            <td><?php echo $post->point; ?></td>
            <td><?php echo $post->entry; ?></td>
            <td><?php echo $post->exit; ?></td>
            <td><?php echo $post->depth_of_water_ave; ?></td>
            <td><?php echo $post->depth_of_water_max; ?></td>
            <td><?php echo ($post->dive_time) ? $post->dive_time . ' min': ''; ?></td>
        </tr>
<?php endforeach; ?>
    </tbody>
</table>
<?= $pager ?>

<?php else: ?>
<p>ログがまだ登録されていません｡
<?php if (Auth::check()):?>
<br><a href="/log/create">初めてのダイビングのログを登録しませんか？</a>
<?php endif;?>
</p>
<?php endif; ?>
