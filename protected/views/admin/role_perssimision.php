<div id="role-perssimision-list">
    <?php for($i=0;$i<10;$i++) { ?>
    <div class="role-perssimision-check">
        <input id="check<?php echo $i; ?>" type="checkbox" value="<?php echo ($i+1); ?>">
        <label for="check<?php echo $i; ?>">Perssimision <?php echo $i; ?></label>
    </div>
    <?php } ?>
    <div class="pagination-link">  
        <ul>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href="">5</a></li>
            <li><a href="">6</a></li>
            <li><a href="">7</a></li>
        </ul>
     </div>
</div>

