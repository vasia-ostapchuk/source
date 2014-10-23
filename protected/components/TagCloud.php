<?php

class TagCloud extends CWidget {
    
    public $limit = 20;
    
    public function run() {
        $tags = Style::model()->findStyleWeights($this->limit);
        foreach($tags as $tag=>$weight)
        {
            $color = '#'.dechex(rand(100, 255)).dechex(rand(0, 200)).dechex(rand(50, 100));
            $link=CHtml::link(CHtml::encode($tag), array('post/index','tag'=>$tag),array("style"=>"text-decoration: none; color:".$color));
            echo CHtml::tag('span', array(
                'class'=>'tag',
                'style'=>"font-size:{$weight}pt; ",
            ), $link)."\n";
        }
    }
}