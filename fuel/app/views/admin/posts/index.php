<h2>Listing Posts</h2>
<br>
<?php if ($posts): ?>
<table class="table table-striped">
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
			<th>Dive time</th>
			<th>Weather</th>
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($posts as $post): ?>		<tr>

			<td><?php echo $post->serial_dive_no; ?></td>
			<td><?php echo $post->date; ?></td>
			<td><?php echo $post->location; ?></td>
			<td><?php echo $post->point; ?></td>
			<td><?php echo $post->entry; ?></td>
			<td><?php echo $post->exit; ?></td>
			<td><?php echo $post->depth_of_water_ave; ?></td>
			<td><?php echo $post->depth_of_water_max; ?></td>
			<td><?php echo $post->dive_time; ?></td>
			<td><?php echo Model_Lookup::item('post_weather', $post->weather); ?></td>
			<td><?php echo Model_Lookup::item('post_status', $post->status); ?></td>
			<td>
				<?php echo Html::anchor('admin/posts/view/'.$post->id, 'View'); ?> |
				<?php echo Html::anchor('admin/posts/edit/'.$post->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/posts/delete/'.$post->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Posts.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/posts/create', 'Add new Post', array('class' => 'btn btn-success')); ?>

</p>
