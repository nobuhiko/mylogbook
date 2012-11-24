
<div class="row">
    <div class="span6">

        <table class="table table-striped">
            <?php if ($post->serial_dive_no): ?>
            <tr>
                <th>Dive No:</th>
                <td><?php echo $post->serial_dive_no; ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($post->date): ?>
            <tr>
                <th>Date:</th>
                <td><?php echo $post->date; ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($post->location): ?>
            <tr>
                <th>Location:</th>
                <td><?php echo $post->location; ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($post->point): ?>
            <tr>
                <th>Point:</th>
                <td><?php echo $post->point; ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($post->point_type): ?>
            <tr>
                <th></th>
                <td><?php echo Model_Lookup::item('post_point_type', $post->point_type); ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($post->diving_shop): ?>
            <tr>
                <th>Diving Shop:</th>
                <td><?php echo $post->diving_shop; ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($post->dive_time): ?>
            <tr>
                <th>Dive Time:</th>
                <td><?php echo $post->dive_time; ?>min</td>
            </tr>
            <?php endif; ?>
            <?php if ($post->entry): ?>
            <tr>
                <th>Entry:</th>
                <td><?php echo $post->entry; ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($post->pressure_start): ?>
            <tr>
                <th></th>
                <td><?php echo $post->pressure_start; ?>bar</td>
            </tr>
            <?php endif; ?>
            <?php if ($post->exit): ?>
            <tr>
                <th>Exit:</th>
                <td><?php echo $post->exit; ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($post->pressure_end): ?>
            <tr>
                <th></th>
                <td><?php echo $post->pressure_end; ?>bar</td>
            </tr>
            <?php endif; ?>
            <?php if ($post->depth_of_water_ave): ?>
            <tr>
                <th>Ave:</th>
                <td><?php echo $post->depth_of_water_ave; ?>m</tr>
            </tr>
            <?php endif; ?>
            <?php if ($post->depth_of_water_max): ?>
            <tr>
                <th>Max:</th>
                <td><?php echo $post->depth_of_water_max; ?>m</tr>
            </tr>
            <?php endif; ?>
            <?php if ($post->water_temp_bottom): ?>
            <tr>
                <th>Water temp:</th>
                <td><?php echo $post->water_temp_bottom; ?>℃</tr>
            </tr>
            <?php endif; ?>
            <?php if ($post->air_temp): ?>
            <tr>
                <th>Air temp:</th>
                <td><?php echo $post->air_temp; ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($post->air_temp): ?>
            <tr>
                <th>Weather:</th>
                <td><?php echo Model_Lookup::item('post_weather', $post->weather); ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($post->wind): ?>
            <tr>
                <th>Wind:</th>
                <td><?php echo $post->wind; ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($post->wind_type): ?>
            <tr>
                <th>Wind type:</th>
                <td><?php echo $post->wind_type; ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($post->wave): ?>
            <tr>
                <th>Wave:</th>
                <td><?php echo $post->wave; ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($post->suit): ?>
            <tr>
                <th>Suit:</th>
                <td><?php echo Model_Lookup::item('post_suit', $post->suit); ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($post->suit_thickness): ?>
            <tr>
                <th></th>
                <td><?php echo $post->suit_thickness; ?>mm</td>
            </tr>
            <?php endif; ?>
            <?php if ($post->weight): ?>
            <tr>
                <th>Weight:</th>
                <td><?php echo $post->weight; ?>kg</td>
            </tr>
            <?php endif; ?>
            <?php if ($post->computer): ?>
            <tr>
                <th>Computer:</th>
                <td><?php echo $post->computer; ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($post->tank): ?>
            <tr>
                <th>Tank:</th>
                <td><?php echo Model_Lookup::item('post_tank', $post->tank); ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($post->tank_cap): ?>
            <tr>
                <th></th>
                <td><?php echo $post->tank_cap; ?>リットル</td>
            </tr>
            <?php endif; ?>
            <?php if ($post->visibility): ?>
            <tr>
                <th>Visibility:</th>
                <td><?php echo $post->visibility; ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($post->impression): ?>
            <tr>
                <th>Impression:</th>
                <td><?php echo $post->impression; ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($post->buddy): ?>
            <tr>
                <th>Buddy:</th>
                <td><?php echo $post->buddy; ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($post->instructor_and_guide): ?>
            <tr>
                <th>Instructor and guide:</th>
                <td><?php echo $post->instructor_and_guide; ?></td>
            </tr>
            <?php endif; ?>

        </table>
    </div>
    <div class="span6">
        <table class="table table-striped">
            <?php if ($post->report): ?>
            <tr>
                <th>Report:</th>
                <td><?php echo $post->report; ?></td>
            </tr>
            <?php endif; ?>
            <?php if ($post->comment): ?>
            <tr>
                <th>Comment:</th>
                <td><?php echo nl2br($post->comment); ?></td>
            </tr>
            <?php endif; ?>
        </table>
    </div>
</div>

<ul class="pager">
    <li><?php echo Html::anchor('log/edit/'.$post->id, 'Edit'); ?></li>
    <li><?php echo Html::anchor('log/delete/'.$post->id, 'Delete'); ?></li>
</ul>
