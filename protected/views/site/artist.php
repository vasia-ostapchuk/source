<script type="text/javascript">
  
    $(document).ready(function(){
        $('.singer_poster').mouseenter(function(){ //висовушка
            $('.singer_poster_upload').fadeIn();
        }).mouseleave(function(){
            $('.singer_poster_upload').fadeOut();
        });
        
        $('.singer_poster_upload').click(function(){ // імітуєм відкриття вибору файлу
            $('#singer_poster_upload_field').trigger('click');
        });
        
        $('#style_add').on('click', function(){//add style window
            $('#TagCloud').dialog('open');
        });
        
         $('#TagCloud span').on('click', function(){ //виділяєм стиль
            $(this).toggleClass('styleSelected');
        });
        
        $('#TagCloud > .ui-dialog-buttonset').on('click', function(){ //відправляєм стилі
            alert('123');
            var styles = '';
            $('#TagCloud span').each(function() {
                if ($(this).hasClass('styleSelected'))
                    styles += $(this).attr('id') + ',';
            });
            updateSinger('style','id', styles.slice(0,-1), false);
        });
        
        $('#singer_poster_upload_field').on('change', function(){//poster
            if(!$(this)[0].files[0]) { //no file selected
                return;
            }
            else 
                updateSinger('poster',$(this).attr('name'), $(this)[0].files[0], false);
        });
       
        $('.singer_name').on('change', function(){//singer name
            if($(this).val() == '') { //no data, error
                addBorder($(this).attr('id'),'red');
                return;
            }
            else
                updateSinger('name', 'name', $(this).val(), $(this).attr('id'));
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
        
        function collectStyle() {
            alert('123');
            var styles = '';
            $('#TagCloud span').each(function() {
                if ($(this).hasClass('styleSelected'))
                    styles += $(this).attr('id') + ',';
            });
            updateSinger('style','id', styles.slice(0,-1), false);
        }
        
        var singer_id = '<?php echo (isset($singer_id)) ? $singer_id : 'false'; ?>'; //глобальна змінна
        function updateSinger(object, name, field, id) {
            var fd = new FormData();
            fd.append('object',object);
            if(name)
                fd.append(name,field);
            fd.append('singer_id',singer_id);
            
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
                        singer_id = data.singer_id;
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

<!-- модель модального вікна стилів -->

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'TagCloud',
    'options'=>array(
        'title'=>'Виберіть стиль',
        'autoOpen'=>false,
        'buttons'=>array(
             array(
                'text' => 'OK',
                'click' => 'js:function(){$(this).dialog("close"); $("#TagCloud > .ui-dialog-buttonset").trigger("click");}',
                'id' => 'styleOK',
            ),
             array(
                'text' => 'Cancel',
                'click' => 'js:function(){$(this).dialog("close");}'
            ),
        ),
    ),
));
    $this->widget('StyleCloud', array('limit' => 50, 'singer_id' => (isset($singer_id)) ? $singer_id : 'false'));
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<!-- невидиме поле для загрузки постера -->
<?php echo CHtml::activeFileField($poster, 'image',array('id'=>'singer_poster_upload_field','style'=>'display: none;')); 
if(!isset($exist['path']))
    echo "<script type='text/javascript'>
        $('.singer_poster').click(function(){ // імітуєм відкриття вибору файлу
            $('#singer_poster_upload_field').trigger('click');
        });
        </script>";
?>

<div class="singer_page">

    <div class="singer_left_block">
    <div class="singer_poster">
        <?php $path = (isset($exist['path'])) ? $exist['path'] : 'empty.png';
            echo CHtml::image('/images/singer/'.$path,'постер',
            array(
                'class'=>'singer_poster_image', 'title'=>"Постер Друга ріка" 
            )); ?>
        <div class='singer_poster_upload'>
            <img  src="/images/arrow.jpg"style="max-width: 15px; margin-right: 10px;"/>Завантажити нове фото
        </div>
    </div>
    <div class="singer_name">
        <?php echo CHtml::TextField('singer_name', (isset($exist['name'])) ? $exist['name'] : 'noname',
            array('class'=>'singer_name')); ?>
    </div>
    <div class="singer_style">
    <p><span class="style_singer">Стилі</span></p>
    <?php $this->widget('zii.widgets.CMenu', array(
        'id' => 'singer_style',
        'encodeLabel'=>false,
        'items'=>array(
            array('label'=>'Блюз'),
            array('label'=>'Джаз'),
            array('label'=>'Рок'),
            array('label'=>'Поп'),
            array('label'=>"<img  style=' width: 20px; height: 20px;' src='../../../images/add.png' /> Додати", 'itemOptions'=>array('id' => 'style_add', 'style'=>'text-align: center; cursor: pointer; border-radius: 3px; background: #F48686;')))
        ));
    ?>
    </div>
    <div class="singer_description"> 
        <textarea id="singer_description"  class="description_singer">
            <?php echo (isset($exist['description'])) ? $exist['description'] : ''; ?>
        </textarea>
    </div>
    <div class="singer_site"> 
        <?php echo CHtml::TextField('singer_site', (isset($exist['site'])) ? $exist['site'] : 'noname',
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