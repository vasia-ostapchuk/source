<script>
    $(document).ready(function(){

    // При наведении на ссылку
    $(".link_test").mouseover
    (function(){
        //alert(1);
    // Получаем ID блока, который нужно показать
    //var title = $(this).attr("title");

    // Показываем блок
    //$(this).append( $(title) );
    $("#title_for_first_link").fadeIn();
    });

    // При уходе мышки со ссылки
    $(".link_test").mouseout
    (function(){

    // Получаем ID блока, который нужно показать
    //var title = $(this).attr("title");

    // Скрываем блок
    $("#title_for_first_link").fadeOut();

    });
    });
</script>
<style>
        .link_test
        {
          //position:relative;
            }
        
        .title
        {
          display:none; height:100px; width:200px; background:#fffed2; border:1px solid #838231; padding:5px; position:absolute;
          margin-left:120px; top:5px; z-index:100;
            }
        .index
        {
          position:absolute; height:20px; width:30px; background:red; left:-5px;
            }
    </style>
<div class="singer_page">
  
    <div class="singer_left_block">
        <a href="">		</a>
            <div class="singer_poster">
               
                <?php echo CHtml::image('../../../images/2poster.jpg','назва',
                            array(
                            'class'=>'link_test poster_singer','onclick'=>"", 'title'=>"Постер Друга ріка" 
                        )); ?> 
                </div>
        
    <div class="singer_name">  
        <div id="title_for_first_link" class="title">
            <div class="index"></div>
            Тут какой-нибудь HTML код для первой ссылки
        </div>
   <?php echo CHtml::TextField('Text', 'Друга ріка',
    array('class'=>'name_poster','class'=>'singer_name')); ?>

  </div>
		<div class="singer_style"> 
                    <p><span class="style_singer">Стилі</span></p>
                    <ul>
                        <li>Джаз</li>
                        <li>Блюз</li>
                        <li>Реп</li>
                        <li>Поп</li>
                    </ul>
                </div>
		<div class="singer_description"> 
                    <form name="myform" action="index.php" method="post">

                        <textarea name="mybox"  class="description_singer">
Групу заснували Віктор Скуратовський, Валерій Харчишин та Олександр Барановський 1995 року. Перші репетиції групи, який отримав назву «Second River», проходили в приміщенні Житомирського педадогічного інституту, де й відбувся їх перший виступ. У 1998 році, під час підготовки до фестивалю «Червона рута—1999» назву було змінено на «Друга Ріка».
</textarea>
                </div>
		<div class="singer_site"> 
                <?php echo CHtml::TextField('Text', 'Сайт',
    array('disabled'=>'disabled','class'=>'site_singer')); ?>

                </div>
         
    </div>
		<div class="singer_right_block">   
                    <div class="singer_video">  <a href=" " >video</a> </div>
			<div class="q1">  <iframe width="245" height="160" src="//www.youtube.com/embed/1-HHNZYIGI0" frameborder="0" allowfullscreen></iframe> </div>
			<div class="q2">  <iframe width="245" height="160" src="//www.youtube.com/embed/1-HHNZYIGI0" frameborder="0" allowfullscreen></iframe>  </div>
                        <div class="singer_album">  <a href="">альбом</a>  </div>
                        <div class="q11"> <img src="../../../images/g11.jpg" style="max-width: 250px;"/></div>
                        <div class="q22"> <img src="../../../images/g22.jpg" style="max-width: 200px;"/> </div>
                        <div class="singer_repertyar"> <a href="">репертуар</a>   </div>
                        <div class="singer_song1">  <img src="../../../images/music.png" style="max-width: 12px;"/> Вже не сам  </div>
			<div class="singer_song2"> <img src="../../../images/music.png" style="max-width: 12px;"/> Вже не сам    </div>
			<div class="singer_song3"> <img src="../../../images/music.png" style="max-width: 12px;"/> Вже не сам  </div>
			</div>
	</div>