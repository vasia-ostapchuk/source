<div class="events-sorting">
        <span>Сортувати по:</span>
        <!-- <ul>
            <li><a href="">даті</a></li>
             <li><a href="">популярності</a></li>
              <li><a href="">відвідуваності</a></li>
               <li><a href="">коментаріями</a></li>
                <li><a href="">алфавіту</a></li>  
        </ul> -->
        <nav>
            <?php echo CHtml::ajaxButton('Інвестиції',  
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
            );?>
            <a href="">Популярне</a>
        </nav>
    </div>
    <?php for($i=0;$i<count($parameters);$i++) { ?>
    <div class="event">
<<<<<<< HEAD
        <span><?php echo $parameters[$i]['title']; ?></span>
        <br/>
        <img class="event-photo" src="<?php echo $parameters[$i]['image']; ?>">
        <a href=""><br/><?php echo $parameters[$i]['date']; ?><br/><?php echo $parameters[$i]['time']; ?>
            <br/><?php echo $parameters[$i]['address']; ?><br/><?php echo $parameters[$i]['style']; ?><br/><?php echo $parameters[$i]['price']; ?></a> 
        <div class="knopka01" >
            <a href="">Купити</a>
        </div>    
    </div> 
    <?php } ?>
    <!--<div class="event">
        <span>Американський папа</span>
        <br/>
        <img class="event-photo" src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg">
        <a href=""><br/>14.09.2014<br/>19.00
            <br/>Львів<br/>шансон,романс<br/>150-500</a> 
        <div class="knopka01" >
            <a href="">Купити</a>
        </div>    
    </div> 
     <div class="event">
        <span>Американський папа</span>
        <br/>
        <img class="event-photo" src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg">
        <a href=""><br/>14.09.2014<br/>19.00
            <br/>Львів<br/>шансон,романс<br/>150-500</a> 
        <div class="knopka01" >
            <a href="">Купити</a>
        </div>     
    </div> 
     <div class="event">
        <span>Американський папа</span>
        <br/>
        <img class="event-photo" src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg">
        <a href=""><br/>14.09.2014<br/>19.00
            <br/>Львів<br/>шансон,романс<br/>150-500</a> 
       <div class="knopka01" >
            <a href="">Купити</a>
        </div>   
    </div> 
     <div class="event">
        <span>Американський папа</span>
        <br/>
        <img class="event-photo" src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg">
        <a href=""><br/>14.09.2014<br/>19.00
            <br/>Львів<br/>шансон,романс<br/>150-500</a> 
        <div class="knopka01" >
            <a href="">Купити</a>
        </div>    
    </div> 
     <div class="event">
        <span>Американський папа</span>
        <br/>
        <img class="event-photo" src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg">
        <a href=""><br/>14.09.2014<br/>19.00
            <br/>Львів<br/>шансон,романс<br/>150-500</a> 
        <div class="knopka01" >
            <a href="">Купити</a>
        </div>    
    </div> 
     <div class="event">
        <span>Американський папа</span>
        <br/>
        <img class="event-photo" src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg">
        <a href=""><br/>14.09.2014<br/>19.00
            <br/>Львів<br/>шансон,романс<br/>150-500</a> 
        <div class="knopka01" >
            <a href="">Купити</a>
        </div>     
    </div> 
     <div class="event">
        <span>Американський папа</span>
        <br/>
        <img class="event-photo" src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg">
        <a href=""><br/>14.09.2014<br/>19.00
            <br/>Львів<br/>шансон,романс<br/>150-500</a> 
        <div class="knopka01" >
            <a href="">Купити</a>
        </div>    
    </div> 
     <div class="event">
        <span>Американський папа</span>
        <br/>
        <img class="event-photo" src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg">
        <a href=""><br/>14.09.2014<br/>19.00
            <br/>Львів<br/>шансон,романс<br/>150-500</a> 
        <div class="knopka01" >
            <a href="">Купити</a>
        </div>    
    </div> -->
=======
        <div class="title">
            Американський папа
        </div>
        <div class="event-photo"><img src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg" width="110" height="260"> </div>
        <div class="date"><a href="">Date</a> </div>
        <div class="time"> <a href="">time</a> </div>
        <div class="city"><a href="">city</a> </div>
        <div class="price"><a href="">price</a> </div>
        <div class="buy"> <a href="">buy</a> </div>
          
    </div> 
 <div class="event">
        <div class="title">
            Американський папа
        </div>
        <div class="event-photo"><img src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg" width="110" height="260"> </div>
        <div class="date"><a href="">Date</a> </div>
        <div class="time"> <a href="">time</a> </div>
        <div class="city"><a href="">city</a> </div>
        <div class="price"><a href="">price</a> </div>
        <div class="buy"> <a href="">buy</a> </div>
          
    </div>
 <div class="event">
        <div class="title">
            Американський папа
        </div>
        <div class="event-photo"><img src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg" width="110" height="260"> </div>
        <div class="date"><a href="">Date</a> </div>
        <div class="time"> <a href="">time</a> </div>
        <div class="city"><a href="">city</a> </div>
        <div class="price"><a href="">price</a> </div>
        <div class="buy"> <a href="">buy</a> </div>
          
    </div>
 <div class="event">
        <div class="title">
            Американський папа
        </div>
        <div class="event-photo"><img src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg" width="110" height="260"> </div>
        <div class="date"><a href="">Date</a> </div>
        <div class="time"> <a href="">time</a> </div>
        <div class="city"><a href="">city</a> </div>
        <div class="price"><a href="">price</a> </div>
        <div class="buy"> <a href="">buy</a> </div>
          
    </div>
 <div class="event">
        <div class="title">
            Американський папа
        </div>
        <div class="event-photo"><img src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg" width="110" height="260"> </div>
        <div class="date"><a href="">Date</a> </div>
        <div class="time"> <a href="">time</a> </div>
        <div class="city"><a href="">city</a> </div>
        <div class="price"><a href="">price</a> </div>
        <div class="buy"> <a href="">buy</a> </div>
          
    </div>
 <div class="event">
        <div class="title">
            Американський папа
        </div>
        <div class="event-photo"><img src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg" width="110" height="260"> </div>
        <div class="date"><a href="">Date</a> </div>
        <div class="time"> <a href="">time</a> </div>
        <div class="city"><a href="">city</a> </div>
        <div class="price"><a href="">price</a> </div>
        <div class="buy"> <a href="">buy</a> </div>
          
    </div>
 <div class="event">
        <div class="title">
            Американський папа
        </div>
        <div class="event-photo"><img src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg" width="110" height="260"> </div>
        <div class="date"><a href="">Date</a> </div>
        <div class="time"> <a href="">time</a> </div>
        <div class="city"><a href="">city</a> </div>
        <div class="price"><a href="">price</a> </div>
        <div class="buy"> <a href="">buy</a> </div>
          
    </div>
 <div class="event">
        <div class="title">
            Американський папа
        </div>
        <div class="event-photo"><img src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg" width="110" height="260"> </div>
        <div class="date"><a href="">Date</a> </div>
        <div class="time"> <a href="">time</a> </div>
        <div class="city"><a href="">city</a> </div>
        <div class="price"><a href="">price</a> </div>
        <div class="buy"> <a href="">buy</a> </div>
          
    </div>
 <div class="event">
        <div class="title">
            Американський папа
        </div>
        <div class="event-photo"><img src="http://s3.dotua.org/fsua_items/cover/00/34/68/2/00346841.jpg" width="110" height="260"> </div>
        <div class="date"><a href="">Date</a> </div>
        <div class="time"> <a href="">time</a> </div>
        <div class="city"><a href="">city</a> </div>
        <div class="price"><a href="">price</a> </div>
        <div class="buy"> <a href="">buy</a> </div>
          
    </div>
    
>>>>>>> origin/master
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
    <?php echo $test1; ?>
     <?php $pages=new CPagination(10); $pages->pageSize=10; $this->widget('CLinkPager',array(
             'pages'=>$pages, 
             'maxButtonCount' => 5, 
             'header' => '<b>'.Yii::t("main", "Перейти к странице:").'</b><br><br>',
     )); ?>