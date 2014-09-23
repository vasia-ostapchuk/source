<div class="services">
	<ul class="auth-services clear">
		<?php
		foreach ($services as $name => $service) {
			echo '<li class="auth-service ' . $service->id . '">';
			$html = '<span class="auth-icon ' . $service->id . '"><i></i></span>';
                        $html = CHtml::link($html, array($action, 'service' => $name), array(
				'class' => 'auth-link ' . $service->id,
			));
			echo $html;
			echo '</li>';
		}
		?>
	</ul>
</div>

<?php
/*
$html = CHtml::link($html, array($action, 'service' => $name), array(
				'class' => 'auth-link ' . $service->id,
			)); 
 
                        $url = Yii::app()->createUrl($action.'&'.'service='.$name);
			$html = CHtml::ajaxlink($html, $url,
                                array('dataType'=>'json',
                                    'type' => 'post', 
                                    'update' => '.user_reg_buttons',
                                    'success'=>"function(data) {
                                        alert(data);   
                                            }",
                                ),
                                array( 'class' => 'auth-link ' . $service->id, //$('.events').html(data);
                                    'href' => $url,
			));*/
?>