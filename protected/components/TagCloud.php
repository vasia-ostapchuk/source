<?php

class TagCloud extends CWidget {
    
    public $limit = 20;
    
    public function run() {
        $tags = Style::model()->findStyleWeights($this->limit);
        foreach($tags as $tag=>$options)
        {
            //$color = '#'.dechex(rand(100, 255)).dechex(rand(0, 200)).dechex(rand(50, 100));
            $text = CHtml::encode($tag);
            //$id_hidden = CHtml::hiddenField('style_'.$options['id'], $options['id']);
            //$content = $link.$id_hidden;
            echo CHtml::tag('span', array(
                'id'=>$options['id'],
                'style'=>"font-size:{$options['weight']}pt; color: #2E3CA3; cursor: pointer;",
            ), $text)."\n";
        }
    }
}