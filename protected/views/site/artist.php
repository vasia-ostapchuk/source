<div class="singer_page">
    <div class="singer_left_block">
		<div class="singer_poster">
                <?php echo CHtml::image('../../../images/2poster.jpg','назва',
array(
'class'=>'poster_singer',
)); ?>           
                </div>
    <div class="singer_name">  

   <?php echo CHtml::textField('Text', 'Друга ріка',
    array('disabled'=>'disabled','class'=>'name_poster')); ?>

  </div>
		<div class="singer_style"> 
       
                </div>
		<div class="singer_description"> 
                    <?php echo CHtml::textField('Text', 'В розробці',
    array('disabled'=>'disabled','class'=>'description_poster')); ?>
                </div>
		<div class="singer_site"> <?php echo CHtml::textField('Text', 'Сайт',
    array('disabled'=>'disabled','class'=>'site_singer')); ?>  </div>
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