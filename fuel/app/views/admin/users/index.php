<h2>Listing Posts</h2>
<br>
<?php if ($posts): ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>username</th>
            <th>email</th>
            <th>login</th>
            <th>create at</th>
            <th>name</th>
            <th>img</th>
            <th>website</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post): ?>		<tr>

            <td><a href="<?php echo $post->profiles->twitter; ?>"><?php echo $post->username ?></a></td>
            <td><?php echo $post->email ?></td>
            <td><?php echo date('Y-m-d H:i:s', $post->last_login) ?></td>
            <td><?php echo date('Y-m-d H:i:s', $post->created_at) ?></td>
            <td><?php echo $post->profiles->full_name; ?></td>
            <td><img src="<?php echo $post->profiles->image; ?>"></td>
            <td><a href="<?php echo $post->profiles->website; ?>"><?php echo $post->profiles->website; ?></a></td>
            <td>
                <?php echo Html::anchor('admin/users/view/'.$post->id, 'View'); ?> |
                <?php echo Html::anchor('admin/users/edit/'.$post->id, 'Edit'); ?> |
                <?php echo Html::anchor('admin/users/delete/'.$post->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

            </td>
        </tr>
        <?php endforeach; ?>	</tbody>
</table>
<?=$pager ?>
<?php else: ?>
<p>No Users.</p>

<?php endif; ?><p>
