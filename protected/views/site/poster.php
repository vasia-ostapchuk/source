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