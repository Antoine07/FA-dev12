<?php if(!empty($pattern)) : ?>
<div class="graph">
    <?php foreach ($pattern as $line) : ?>
        <div class="line">
            <?php foreach ($line as $column) : ?>
                <div class="column <?php echo ($column==1)? 'node' : 'empty'  ?>">
                    <?php echo  $column==0?: ++$cpt ; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
<?php else: ?>
    No graph
<?php endif; ?>