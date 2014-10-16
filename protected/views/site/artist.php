<script type="text/javascript">
  
    $(document).ready(function(){
        
        $('.singer_poster_image').mouseover(function(){ //висовушка
            $('.singer_poster_upload').fadeIn();
        }).mouseout(function(){
            if(!$('.singer_poster_upload:hover').length)
                $('.singer_poster_upload').fadeOut();
        });
        $('.singer_poster_upload').mouseout(function(){
            if(!$('.singer_poster_image:hover').length)
                $(this).fadeOut();
        });
        $('.singer_poster_upload').click(function(){ // імітуєм відкриття вибору файлу
            $('#singer_poster_upload_field').trigger('click');
        });
        $('#singer_poster_upload_field').on('change', function(){
            /*alert('1');
            $('#singer_poster_upload_form').trigger('submit');
        });
        $('#singer_poster_upload_form').submit(function(e){
           e.preventDefault();*/
           if(!$("#singer_poster_upload_field")[0].files[0]) //no file selected
               return;
           var fd = new FormData();
           fd.append('object','poster');
           fd.append($("#singer_poster_upload_field").attr('name'), $("#singer_poster_upload_field")[0].files[0]);
           $.ajax({
                url: '<?php echo Yii::app()->createAbsoluteUrl('site/artist_edit'); ?>',
                cache: false,
                data: fd,
                dataType: "json",
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data){
                    if(data.status == 'error') {
                    }
                    else {
                        $('.singer_poster_image').replaceWith(data.status);
                    }
                },
                error: function(xhr){
                    alert(xhr.responseText);
                }
            });
        });
    });
</script>

<!-- невидиме поле для загрузки постера -->
<?php /*$form=$this->beginWidget('CActiveForm', array(
	'id'=>'singer_poster_upload_form',
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data','style'=>'display: none;'),
));

$this->endWidget(); */?>
<?php echo CHtml::activeFileField($model, 'image',array('id'=>'singer_poster_upload_field','style'=>'display: none;')); ?>

<div class="singer_page">
    <div class="singer_left_block">
    <div class="singer_poster">
        <?php echo CHtml::image('../../../images/2poster.jpg','назва',
            array(
                'class'=>'singer_poster_image', 'title'=>"Постер Друга ріка" 
            )); ?>
        <div class='singer_poster_upload'>
            <img  src="../../../images/arrow.jpg"style="max-width: 15px; margin-right: 10px;"/>Завантажити нове фото
        </div>
    </div>
    <div class="singer_name">
        <?php echo CHtml::TextField('Text', 'Друга ріка',
            array('class'=>'name_poster','class'=>'singer_name')); ?>
    </div>
    <div class="singer_style"> 
    <p><span class="style_singer">Стилі</span></p>
    <ul>
        <li>Блюз</li>
        <li>Реп</li>
        <li>Джаз</li>
        <li>Поп</li>
        <li>Поп</li>
    </ul>
    </div>
    <div class="singer_description"> 
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
        <div class="singer_video">  
            <a href=" " >video</a> 
        </div>
        <div class="q1">  
            <iframe width="245" height="160" src="//www.youtube.com/embed/1-HHNZYIGI0" frameborder="0" allowfullscreen></iframe> 
        </div>
        <div class="q2">  
            <iframe width="245" height="160" src="//www.youtube.com/embed/1-HHNZYIGI0" frameborder="0" allowfullscreen></iframe>  
        </div>
        <div class="singer_album">  
            <a href="">альбом</a>  
        </div>
        <div class="q11"> 
            <img src="../../../images/g11.jpg" style="max-width: 250px;"/>
        </div>
        <div class="q22"> 
            <img src="../../../images/g22.jpg" style="max-width: 200px;"/> 
        </div>
        <div class="singer_repertyar"> 
            <a href="">репертуар</a>   
        </div>
        <div class="singer_song1">  
            <img src="../../../images/music.png" style="max-width: 12px;"/> Вже не сам  
        </div>
        <div class="singer_song2"> 
            <img src="../../../images/music.png" style="max-width: 12px;"/> Вже не сам    
        </div>
        <div class="singer_song3"> 
            <img src="../../../images/music.png" style="max-width: 12px;"/> Вже не сам  
        </div>
    </div>
</div>