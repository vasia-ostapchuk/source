<div class="event-link">
    <li><?php echo CHtml::link('Підписані', array('controller/action')); ?></li>
    <li><?php echo CHtml::link('Друзі', array('controller/action')); ?></li>
</div>
<div class="eventsUsers">
    <div class="checkbox">
        <?php echo CHtml::CheckBox('checkbox',false, array (
            'value'=>'on',
        )); ?>
        <span>Купили квиток</span>
    </div>
    <div class="user-data">
        <div class="avatar">
            <?php echo CHtml::image('../../../images/testAvatar.jpg','назва',
                array(
                'class'=>'avatar',
            )); ?>           
        </div>
        <span class='user-name'></span>
    </div>
</div>