<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Dive No', 'serial_dive_no'); ?>

			<div class="input">
				<?php echo Form::input('serial_dive_no', Input::post('serial_dive_no', isset($post) ? $post->serial_dive_no : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Date', 'date'); ?>

			<div class="input">
				<?php echo Form::input('date', Input::post('date', isset($post) ? $post->date : ''), array('class' => 'span4 datepicker', 'data-date-format' => 'yyyy-mm-dd')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Location', 'location'); ?>

			<div class="input">
				<?php echo Form::input('location', Input::post('location', isset($post) ? $post->location : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Dive Point', 'point'); ?>

			<div class="input">
				<?php echo Form::input('point', Input::post('point', isset($post) ? $post->point : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<div class="input">
                <?php echo Form::select('point_type', Input::post('point_type', isset($post) ? $post->point_type : ''), Model_Lookup::items('post_point_type'), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Diving Shop', 'diving_shop'); ?>

			<div class="input">
				<?php echo Form::input('diving_shop', Input::post('diving_shop', isset($post) ? $post->diving_shop : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Entry', 'entry'); ?>

			<div class="input">
				<?php echo Form::input('entry', Input::post('entry', isset($post) ? $post->entry : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Exit', 'exit'); ?>

			<div class="input">
				<?php echo Form::input('exit', Input::post('exit', isset($post) ? $post->exit : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Water temp', 'water_temp_bottom'); ?>

			<div class="input-append">
				<?php echo Form::input('water_temp_bottom', Input::post('water_temp_bottom', isset($post) ? $post->water_temp_bottom : ''), array('class' => 'span2')); ?>
                <span class="add-on">℃</span>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Ave', 'depth_of_water_ave'); ?>

			<div class="input-append">
				<?php echo Form::input('depth_of_water_ave', Input::post('depth_of_water_ave', isset($post) ? $post->depth_of_water_ave : ''), array('class' => 'span2')); ?>
                <span class="add-on">m</span>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Max', 'depth_of_water_max'); ?>

			<div class="input-append">
				<?php echo Form::input('depth_of_water_max', Input::post('depth_of_water_max', isset($post) ? $post->depth_of_water_max : ''), array('class' => 'span2')); ?>
                <span class="add-on">m</span>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Pressure start', 'pressure_start'); ?>

			<div class="input-append">
				<?php echo Form::input('pressure_start', Input::post('pressure_start', isset($post) ? $post->pressure_start : ''), array('class' => 'span2')); ?>
                <span class="add-on">bar</span>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Pressure end', 'pressure_end'); ?>

			<div class="input-append">
				<?php echo Form::input('pressure_end', Input::post('pressure_end', isset($post) ? $post->pressure_end : ''), array('class' => 'span2')); ?>
                <span class="add-on">bar</span>

			</div>
        </div>
        <div class="clearfix">
			<?php echo Form::label('Weather', 'weather'); ?>

			<div class="input">
                <?php echo Form::select('weather', Input::post('weather', isset($post) ? $post->weather : ''), Model_Lookup::items('post_weather'), array('class' => 'span4')); ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Air temp', 'air_temp'); ?>

			<div class="input-append">
				<?php echo Form::input('air_temp', Input::post('air_temp', isset($post) ? $post->air_temp : ''), array('class' => 'span2')); ?>
                <span class="add-on">℃</span>

			</div>
		</div>

        <div class="clearfix">
			<?php echo Form::label('Suit', 'suit'); ?>

			<div class="input">
                <?php echo Form::select('suit', Input::post('suit', isset($post) ? $post->suit : ''), Model_Lookup::items('post_suit'), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<div class="input-append">
				<?php echo Form::input('suit_thickness', Input::post('suit_thickness', isset($post) ? $post->suit_thickness : ''), array('class' => 'span2')); ?>
                <span class="add-on">mm</span>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Weight', 'weight'); ?>

			<div class="input-append">
				<?php echo Form::input('weight', Input::post('weight', isset($post) ? $post->weight : ''), array('class' => 'span2')); ?>
                <span class="add-on">kg</span>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Tank', 'tank'); ?>

			<div class="input">
                <?php echo Form::select('tank', Input::post('tank', isset($post) ? $post->tank : ''), Model_Lookup::items('post_tank'), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">

			<div class="input-append">
                <?php echo Form::input('tank_cap', Input::post('tank_cap', isset($post) ? $post->tank_cap : ''), array('class' => 'span2')); ?>
                <span class="add-on">リットル</span>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Visibility', 'visibility'); ?>

			<div class="input-append">
				<?php echo Form::input('visibility', Input::post('visibility', isset($post) ? $post->visibility : ''), array('class' => 'span2')); ?>
                <span class="add-on">m</span>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Buddy', 'buddy'); ?>

			<div class="input">
				<?php echo Form::input('buddy', Input::post('buddy', isset($post) ? $post->buddy : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Instructor and guide', 'instructor_and_guide'); ?>

			<div class="input">
				<?php echo Form::input('instructor_and_guide', Input::post('instructor_and_guide', isset($post) ? $post->instructor_and_guide : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Report', 'report'); ?>

			<div class="input">
				<?php echo Form::textarea('report', Input::post('report', isset($post) ? $post->report : ''), array('class' => 'span8', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Comment', 'comment'); ?>

			<div class="input">
				<?php echo Form::textarea('comment', Input::post('comment', isset($post) ? $post->comment : ''), array('class' => 'span8', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Status', 'status'); ?>

            <div class="input">
                <?php echo Form::select('status', Input::post('status', isset($post) ? $post->status : ''), Model_Lookup::items('post_status'), array('class' => 'span4')); ?>
			</div>
        </div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>
