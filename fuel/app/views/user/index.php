<?php if ($users): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>id</th>
			<th>username</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $user): ?>		<tr>

			<td><?php echo $user->id; ?></td>
            <td><?php echo $user->username; ?></td>
            <td>
                <?php echo Html::anchor('user/'.$user->username, 'View'); ?>
            </td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No users.</p>

<?php endif; ?><p>

</p>
