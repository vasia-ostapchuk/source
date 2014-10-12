
<div class="events-sorting">
        <table class="sorting">
            <tr>
                <td><span>Сортувати по:</span></td>
                <td>
                    <a id="sortbydate" href="#">За датою</a>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $("#sortbydate").click(function(e){
                                //e.preventDefault();
                                $.ajax({
                                    type: "POST",
                                    url: "index.php?r=filter/sortbydate",
                                    success: function(jdata){
                                        var data = $.parseJSON(jdata);
                                        $(".events").html(data.ajaxData);
                                    }
                                });
                                return false;
                            });
                        });
                    </script>
                </td>
                <td><a id="sortbypopularity" href="#">Популярне</a>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $("#sortbypopularity").click(function(e){
                                $.ajax({
                                    type: "POST",
                                    url: "index.php?r=filter/sortbypopularity",
                                    success: function(jdata){
                                        var data = $.parseJSON(jdata);
                                        $(".events").html(data.ajaxData);
                                    }
                                });
                                return false;
                            });
                        });
                    </script>
                </td>
            </tr>
        </table>
        <div class="TandL">
            <a href="">T</a>
            <a href="">L</a> 
        </div>
</div>
<?php foreach($parameters as $value){ ?>
<div class="event">
<div class="title">
            <?php echo $value['title']; ?>
        </div>
    <div class="event-photo"><img src="<?php echo $value['image']; ?>" style="max-width: 110px;height: 209px;"> </div>
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