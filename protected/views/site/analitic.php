<div class="analitic-content-site">
<div class="analitic-contet-left">
        <div class="analitic_filters"> 
        
         <?php
            echo CHtml::dropDownList('analitic-country', '', array('Країна'),array());

            ?>
          
            <?php
            echo CHtml::dropDownList('analitic-citi', '', array('Місто'),array());
            ?>
          
            <?php

            echo CHtml::dropDownList('analitic-style', '', array('Стиль'),array());
            ?>
            
            <?php
            echo CHtml::dropDownList('analitic-substyle', '', array('Підстиль'),array());
            ?>
        
        
        </div>
         
    <div class="analitic-calendar">

 <table id="analitic-calendar">
  <thead>
    <tr><td>‹<td colspan="5"><td>›
    <tr><td>Пн<td>Вт<td>Ср<td>Чт<td>Пт<td>Сб<td>Вс
  <tbody>
</table>

<script>
function Calendar2(id, year, month) {
var Dlast = new Date(year,month+1,0).getDate(),
    D = new Date(year,month,Dlast),
    DNlast = new Date(D.getFullYear(),D.getMonth(),Dlast).getDay(),
    DNfirst = new Date(D.getFullYear(),D.getMonth(),1).getDay(),
    calendar = '<tr>',
    month=["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"];
if (DNfirst != 0) {
  for(var  i = 1; i < DNfirst; i++) calendar += '<td>';
}else{
  for(var  i = 0; i < 6; i++) calendar += '<td>';
}
for(var  i = 1; i <= Dlast; i++) {
  if (i == new Date().getDate() && D.getFullYear() == new Date().getFullYear() && D.getMonth() == new Date().getMonth()) {
    calendar += '<td class="today">' + i;
  }else{
    calendar += '<td>' + i;
  }
  if (new Date(D.getFullYear(),D.getMonth(),i).getDay() == 0) {
    calendar += '<tr>';
  }
}
for(var  i = DNlast; i < 7; i++) calendar += '<td>&nbsp;';
document.querySelector('#'+id+' tbody').innerHTML = calendar;
document.querySelector('#'+id+' thead td:nth-child(2)').innerHTML = month[D.getMonth()] +' '+ D.getFullYear();
document.querySelector('#'+id+' thead td:nth-child(2)').dataset.month = D.getMonth();
document.querySelector('#'+id+' thead td:nth-child(2)').dataset.year = D.getFullYear();
if (document.querySelectorAll('#'+id+' tbody tr').length < 6) {  // чтобы при перелистывании месяцев не "подпрыгивала" вся страница, добавляется ряд пустых клеток. Итог: всегда 6 строк для цифр
    document.querySelector('#'+id+' tbody').innerHTML += '<tr><td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;';
}
}
Calendar2("analitic-calendar", new Date().getFullYear(), new Date().getMonth());
// переключатель минус месяц
document.querySelector('#analitic-calendar thead tr:nth-child(1) td:nth-child(1)').onclick = function() {
  Calendar2("analitic-calendar", document.querySelector('#calendar2 thead td:nth-child(2)').dataset.year, parseFloat(document.querySelector('#analitic-calendar thead td:nth-child(2)').dataset.month)-1);
}
// переключатель плюс месяц
document.querySelector('#calendar2 thead tr:nth-child(1) td:nth-child(3)').onclick = function() {
  Calendar2("analitic-calendar", document.querySelector('#analitic-calendar thead td:nth-child(2)').dataset.year, parseFloat(document.querySelector('#analitic-calendar thead td:nth-child(2)').dataset.month)+1);
}
</script>   
    </div>
    
    <?php 
    echo CHtml::link('Звіти по параметрах',array('controller/action')); 
    ?>
    
    </div> 
 
   
    </div>
      
        
    </div>
    <div class="analitic-navigator">
        <div class="analitic-navigator-search">
        
        <form class="form-search-analitic" method="post" action="index.php?r=site/search">
            <input type="search" name="search" placeholder="пошук" value=""/>
            <input id="link" type="hidden" name ="id" value="google" />
            <input type="submit" value=""/>
        </form>
        <script>  
            $(document).ready(function(){ //відбувається після завантаження сторінки

                /*if($("#ProfileMenu").dialog().focusout()) {
                    $(document).click(function(event) { //автоматичне закриття діалогових вікон
                      if ($(event.target).closest('#ProfileMenu').length  || $(event.target).closest('#ProfileMenu').length) return;
                      $('#ProfileMenu').dialog('close');
                      event.stopPropagation();
                    });
                }*/

                $('.form-search').submit(function(e){ //обробка форми пошуку
                e.preventDefault();
                var m_method=$(this).attr('method');
                var m_action=$(this).attr('action');
                var m_data=$(this).serialize();
                    $.ajax({
                        type: m_method,
                        url: m_action,
                        data: m_data,
                        dataType: 'json',
                        success: function(data){
                            $('.events').html(data);
                        }
                    });
                });
            });
        </script>
    </div>
        </div>
    <div class="analitic-sorting">
        <?php echo CHtml::TextField('analitic-sorting-name', 'Cортувати по:',
                    array('disabled'=>'disabled','class'=>'analitic-sorting-name')); ?>
        <label id="analitic_sorting_label" title="Сортувати"> 
<?php echo CHtml::dropDownList('analitic_sorting_label', 'analitic_sorting_label', 
array('сортувати' => 'Сортувати',  'Сортувати' => 'Сщртувати'),
array('class' => 'language')
);
?>
</label>
    </div>
    <div class="analitic-content">
        <div class="analitic-content-description">
            <div class="analitic-singer">
                <?php echo CHtml::TextField('analitic-singer-name', 'Виконавець',
                    array('class'=>'analitic-singer-name')); ?>
            </div>
            <div class="analitic-style">
                <?php echo CHtml::TextField('analitic-singer-style', 'Стиль',
                    array('class'=>'analitic-singer-style')); ?>
            </div>
            <div class="analitic-jut">
                <?php echo CHtml::TextField('analitic-singer-name', 'Виступи',
                    array('class'=>'analitic-singer-jut')); ?>
            </div>
            <div class="analitic-visitors">
                <?php echo CHtml::TextField('analitic-singer-name', 'Відвідувачі',
                    array('class'=>'analitic-singer-visitors')); ?>
            </div>
            <div class="analitic-check">
                <?php echo CHtml::TextField('analitic-singer-name', 'Середній чек',
                    array('class'=>'analitic-singer-name')); ?>
            </div>
            <div class="analitic-content-button">
            
                <?php echo CHtml::button('Деталі',
                    array(
                        'id'=>'analitic-content-button',
                        'title'=>"",
                        'onclick'=>""
                        )); ?>
            </div>
        </div>
         <div class="analitic-content-description">
            <div class="analitic-singer">
                <?php echo CHtml::TextField('analitic-singer-name', 'Виконавець',
                    array('class'=>'analitic-singer-name')); ?>
            </div>
            <div class="analitic-style">
                <?php echo CHtml::TextField('analitic-singer-style', 'Стиль',
                    array('class'=>'analitic-singer-style')); ?>
            </div>
            <div class="analitic-jut">
                <?php echo CHtml::TextField('analitic-singer-name', 'Виступи',
                    array('class'=>'analitic-singer-jut')); ?>
            </div>
            <div class="analitic-visitors">
                <?php echo CHtml::TextField('analitic-singer-name', 'Відвідувачі',
                    array('class'=>'analitic-singer-visitors')); ?>
            </div>
            <div class="analitic-check">
                <?php echo CHtml::TextField('analitic-singer-name', 'Середній чек',
                    array('class'=>'analitic-singer-name')); ?>
            </div>
            <div class="analitic-content-button">
            
                <?php echo CHtml::button('Деталі',
                    array(
                        'id'=>'analitic-content-button',
                        'title'=>"",
                        'onclick'=>""
                        )); ?>
            </div>
        </div>
         <div class="analitic-content-description">
            <div class="analitic-singer">
                <?php echo CHtml::TextField('analitic-singer-name', 'Виконавець',
                    array('class'=>'analitic-singer-name')); ?>
            </div>
            <div class="analitic-style">
                <?php echo CHtml::TextField('analitic-singer-style', 'Стиль',
                    array('class'=>'analitic-singer-style')); ?>
            </div>
            <div class="analitic-jut">
                <?php echo CHtml::TextField('analitic-singer-name', 'Виступи',
                    array('class'=>'analitic-singer-jut')); ?>
            </div>
            <div class="analitic-visitors">
                <?php echo CHtml::TextField('analitic-singer-name', 'Відвідувачі',
                    array('class'=>'analitic-singer-visitors')); ?>
            </div>
            <div class="analitic-check">
                <?php echo CHtml::TextField('analitic-singer-name', 'Середній чек',
                    array('class'=>'analitic-singer-name')); ?>
            </div>
            <div class="analitic-content-button">
            
                <?php echo CHtml::button('Деталі',
                    array(
                        'id'=>'analitic-content-button',
                        'title'=>"",
                        'onclick'=>""
                        )); ?>
            </div>
        </div>
         <div class="analitic-content-description">
            <div class="analitic-singer">
                <?php echo CHtml::TextField('analitic-singer-name', 'Виконавець',
                    array('class'=>'analitic-singer-name')); ?>
            </div>
            <div class="analitic-style">
                <?php echo CHtml::TextField('analitic-singer-style', 'Стиль',
                    array('class'=>'analitic-singer-style')); ?>
            </div>
            <div class="analitic-jut">
                <?php echo CHtml::TextField('analitic-singer-name', 'Виступи',
                    array('class'=>'analitic-singer-jut')); ?>
            </div>
            <div class="analitic-visitors">
                <?php echo CHtml::TextField('analitic-singer-name', 'Відвідувачі',
                    array('class'=>'analitic-singer-visitors')); ?>
            </div>
            <div class="analitic-check">
                <?php echo CHtml::TextField('analitic-singer-name', 'Середній чек',
                    array('class'=>'analitic-singer-name')); ?>
            </div>
            <div class="analitic-content-button">
            
                <?php echo CHtml::button('Деталі',
                    array(
                        'id'=>'analitic-content-button',
                        'title'=>"",
                        'onclick'=>""
                        )); ?>
            </div>
        </div>
        <div class="analitic-pagination-link">  
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
    

</div>

    