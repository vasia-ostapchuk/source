<div class="events-sorting">
        
        <!-- <ul>
            <li><a href="">даті</a></li>
             <li><a href="">популярності</a></li>
              <li><a href="">відвідуваності</a></li>
               <li><a href="">коментаріями</a></li>
                <li><a href="">алфавіту</a></li>  
        </ul> -->

        <nav>
            <?php /*echo CHtml::ajaxButton('Інвестиції',  
                CController::createUrl('/site/ajax'),   
                array('dataType'=>'json',
                    'type' => 'post', 
                    'update' => '.events',
                    'data' => array ('id'=>'investment'),
                    'success'=>"function(data) {
                                $('.events').html(data);
                            }",
                ),
                array('class'=>'button',
                    'type' => 'submit',
                     'style'=>'float:left; left:40px;'
                )
            );*/?>
            <a href="">Популярне</a>
            <a href="">Популярне</a>
        </nav>
    </div>          


        <div class="sorting">
            <span>Сортувати по:</span>
            <a href="">За датою</a>
            <a href="">Популярне</a>
        </div>
        <div class="TandL">
            <a href="">T</a>
            <a href="">L</a>
        </div>
<?php foreach($parameters as $value){ ?>
<div class="event">
<div class="title">
            <?php echo $value['title']; ?>
        </div>
    <div class="event-photo"><img src="<?php echo $value['image']; ?>" style="max-width: 105px;"> </div>
        <div class="date"><a href=""><?php echo $value['date'];?></a> </div>
        <div class="time"> <a href=""><?php echo $value['time'];?></a> </div>
        <div class="city"><a href=""><?php echo $value['address'];?></a> </div>
        <div class="price"><a href=""><?php echo $value['price'];?></a> </div>
        <div class="buy"> <a href="">buy</a> </div>
          
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
    <?php $pages=new CPagination(10); $pages->pageSize=10; $this->widget('CLinkPager',array(
             'pages'=>$pages, 
             'maxButtonCount' => 5, 
             'header' => '<b>'.Yii::t("main", "Перейти к странице:").'</b><br><br>',
     )); ?>