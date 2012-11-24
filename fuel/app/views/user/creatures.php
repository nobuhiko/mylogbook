<?php echo Asset::js(array('jquery.fastLiveFilter.js'));?>
<script>
$(function() {
    $('#search_input').fastLiveFilter('#search_list', {
        timeout: 200,
        callback: function(total) { $('#num_results').html(total); }
    });
});
</script>
<input type="text" class="input-medium search-query" id="search_input" placeholder="Type to filter">
<hr>
<p>
Total: <strong id="num_results"></strong>
</p>
<?php if ($reports): ?>

<ul class="thumbnails" id="search_list">
    <?php foreach ($reports as $report): ?>
    <li class="span2">
    <span class="badge badge-info"><?= $report['postcount']; ?></span><?= $report['name']; ?>
    </li>
    <?php endforeach; ?>
</ul>
<?php else: ?>
<p>生き物の登録がまだありません。</p>
<?php endif; ?><p>
