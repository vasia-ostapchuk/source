<div id="users-role-list">
    <?php for($i=0;$i<10;$i++) { ?>
    <div class="users-role-check">
        <input id="check<?php echo $i; ?>" type="checkbox" value="<?php echo ($i+1); ?>">
        <label for="check<?php echo $i; ?>">Perssimision <?php echo $i; ?></label>
    </div>
    <?php } ?>
</div>