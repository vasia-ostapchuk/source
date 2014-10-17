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
        $('#singer_poster_upload_field').on('change', function(){//poster
            if(!$(this)[0].files[0]) { //no file selected
                return;
            }
            else 
                updateSinger('poster',$(this).attr('name'), $(this)[0].files[0], false);
        });
        $('#singer_name').on('change', function(){//singer name
            if($(this).val() == '') { //no data, error
                addBorder($(this).attr('id'),'red');
                return;
            }
            else
                updateSinger('name', false, false,$(this).attr('id'));
        });
        $('#singer_description').on('change', function(){//singer description
            if($(this).val() == '') { //no data, error
                addBorder($(this).attr('id'),'red');
                return;
            }
            else {
                updateSinger('description', 'description', $(this).val(), $(this).attr('id'));
            }
        });
        $('#singer_site').on('change', function(){//singer site
            if($(this).val() == '') { //no data, error
                addBorder($(this).attr('id'),'red');
                return;
            }
            else {
                updateSinger('site', 'site', $(this).val(), $(this).attr('id'));
            }
        });
        function updateSinger(object, name, field, id) {
            var fd = new FormData();
            fd.append('object',object);
            if(name)
                fd.append(name,field);
            fd.append('name',$('#singer_name').val());
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
                        if(id)
                            addBorder('#'+id,'red');
                    }
                    else {
                        if(name == 'Image[image]') {
                            $('.singer_poster_image').replaceWith(data.part);
                        }
                        if(id)
                            addBorder('#'+id,'green');
                    }
                },
                error: function(xhr){
                    alert(xhr.responseText);
                }
            });
        }
        function addBorder(selector, color) {
            switch (color) {
                case (color = 'red'):
                    color = '0 0 15px rgba(255, 60, 0, 1)';
                    break;
                case (color = 'green'):
                    color = '0 0 15px rgba(0, 255, 60, 1)';
                    break;
            }
            $(selector).css('box-shadow',color);
            $(selector).css('-webkit-box-shadow',color);
            $(selector).css('-moz-box-shadow',color);
        }
    });
</script>

<!-- невидиме поле для загрузки постера -->
<?php /*$form=$this->beginWidget('CActiveForm', array(
	'id'=>'singer_poster_upload_form',
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data','style'=>'display: none;'),
));

$this->endWidget(); */?>
<?php echo CHtml::activeFileField($poster, 'image',array('id'=>'singer_poster_upload_field','style'=>'display: none;')); ?>

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
        <?php echo CHtml::TextField('singer_name', 'Друга ріка',
            array('class'=>'singer_name')); ?>
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
        <textarea id="singer_description"  class="description_singer">
            Групу заснували Віктор Скуратовський, Валерій Харчишин та Олександр Барановський 1995 року. Перші репетиції групи, який отримав назву «Second River», проходили в приміщенні Житомирського педадогічного інституту, де й відбувся їх перший виступ. У 1998 році, під час підготовки до фестивалю «Червона рута—1999» назву було змінено на «Друга Ріка».
        </textarea>
    </div>
    <div class="singer_site"> 
        <?php echo CHtml::TextField('singer_site', 'Сайт',
            array('class'=>'site_singer')); ?>
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