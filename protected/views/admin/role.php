<div id="content-role">    
    <div id="add-role">
            <button>Add</button>
    </div>
    <div id="role">
        <?php for($i=0;$i<7;$i++) { ?>
        <form class="role-form">
            <input type="text" value="alias">
            <input type="text" value="module">
            <select id="perssimisions-list">
                <option value="0">None</option>
            </select>
            <div class="invisible">&nbsp;</div>
           <!-- <input class="button-perm" type="submit" value="Perm">
            <input class="button-del" type="submit" value="Del"> -->
            <?php echo CHtml::ajaxButton('Права',
                CController::createUrl('/admin/ajax'),   
                    array('dataType'=>'json',
                            'type' => 'post',
                            'data' => array ('view'=>'role_perssimision'),
                            'success'=>"function(data) {
                                        $('#content-admin').html(data);
                                    }",
                        ),
                    array( 'style'=>'height: 35px; width:50px; margin: 0;',
                        'id'=>'role_perssimision-bnt'.$i,
                        //'live' => false
                         )
                ); 
            ?>
            <input class="button-del" type="submit" value="Del">
        </form>
        <?php } ?>
    </div>
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

