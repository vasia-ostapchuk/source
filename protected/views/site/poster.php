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
            <a href="">За датою</a>
            <a href="">Популярне</a>
        </nav>
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