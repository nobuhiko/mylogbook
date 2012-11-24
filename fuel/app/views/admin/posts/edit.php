<?php echo render('admin/posts/_form'); ?>
<ul class="pager">
    <li><?php echo Html::anchor('admin/posts/view/'.$post->id, 'View'); ?></li>
    <li><?php echo Html::anchor('admin/posts', 'Back'); ?></li>
</ul>
