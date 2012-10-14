<h2>Viewing #<?php echo $post->id; ?></h2>

<p>
	<strong>Serial dive no:</strong>
	<?php echo $post->serial_dive_no; ?></p>
<p>
	<strong>Date:</strong>
	<?php echo $post->date; ?></p>
<p>
	<strong>Location:</strong>
	<?php echo $post->location; ?></p>
<p>
	<strong>Point:</strong>
	<?php echo $post->point; ?></p>
<p>
	<strong>Point type:</strong>
	<?php echo $post->point_type; ?></p>
<p>
	<strong>Purpose of dive:</strong>
	<?php echo $post->purpose_of_dive; ?></p>
<p>
	<strong>Diving shop:</strong>
	<?php echo $post->diving_shop; ?></p>
<p>
	<strong>Entry:</strong>
	<?php echo $post->entry; ?></p>
<p>
	<strong>Exit:</strong>
	<?php echo $post->exit; ?></p>
<p>
	<strong>Water temp top:</strong>
	<?php echo $post->water_temp_top; ?></p>
<p>
	<strong>Water temp bottom:</strong>
	<?php echo $post->water_temp_bottom; ?></p>
<p>
	<strong>Depth of water ave:</strong>
	<?php echo $post->depth_of_water_ave; ?></p>
<p>
	<strong>Depth of water max:</strong>
	<?php echo $post->depth_of_water_max; ?></p>
<p>
	<strong>Pressure start:</strong>
	<?php echo $post->pressure_start; ?></p>
<p>
	<strong>Pressure end:</strong>
	<?php echo $post->pressure_end; ?></p>
<p>
	<strong>Dive time:</strong>
	<?php echo $post->dive_time; ?></p>
<p>
	<strong>Weather:</strong>
	<?php echo $post->weather; ?></p>
<p>
	<strong>Air temp:</strong>
	<?php echo $post->air_temp; ?></p>
<p>
	<strong>Wind:</strong>
	<?php echo $post->wind; ?></p>
<p>
	<strong>Wind type:</strong>
	<?php echo $post->wind_type; ?></p>
<p>
	<strong>Wave:</strong>
	<?php echo $post->wave; ?></p>
<p>
	<strong>Suit:</strong>
	<?php echo $post->suit; ?></p>
<p>
	<strong>Weight:</strong>
	<?php echo $post->weight; ?></p>
<p>
	<strong>Computer:</strong>
	<?php echo $post->computer; ?></p>
<p>
	<strong>Tank:</strong>
	<?php echo $post->tank; ?></p>
<p>
	<strong>Tank cap:</strong>
	<?php echo $post->tank_cap; ?></p>
<p>
	<strong>Visibility:</strong>
	<?php echo $post->visibility; ?></p>
<p>
	<strong>Impression:</strong>
	<?php echo $post->impression; ?></p>
<p>
	<strong>Buddy:</strong>
	<?php echo $post->buddy; ?></p>
<p>
	<strong>Instructor and guide:</strong>
	<?php echo $post->instructor_and_guide; ?></p>
<p>
	<strong>Report:</strong>
	<?php echo $post->report; ?></p>
<p>
	<strong>Comment:</strong>
	<?php echo $post->comment; ?></p>
<p>
	<strong>Status:</strong>
	<?php echo $post->status; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $post->user_id; ?></p>

<?php echo Html::anchor('admin/posts/edit/'.$post->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/posts', 'Back'); ?>