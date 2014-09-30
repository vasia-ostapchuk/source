<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of events
 *
 * @author Mr White
 */
class Events {
    public static $even = array(
        0=>array(
            'title'=>'Basta',
            'style'=>'R&B',
            'address'=>'Львів',
            'price'=>'120',
            'date'=>'2014-11-01',
            'time'=>'20:00:00',
            'image'=>'https://upload.wikimedia.org/wikipedia/commons/1/13/Basta_and_Guf_at_Green_Theatre_100721.jpg',
            'popularity'=>10,
        ),
        1=>array(
            'title'=>'Guf',
            'style'=>'R&B',
            'address'=>'street X',
            'price'=>'10$',
            'date'=>'2014-10-02',
            'time'=>'21:00:00',
            'image'=>'http://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/Guf2.jpg/220px-Guf2.jpg',
            'popularity'=>1,
        ),
        2=>array(
            'title'=>'Guf',
            'style'=>'R&B',
            'address'=>'м.Львів',
            'price'=>'20$',
            'date'=>'2014-10-11',
            'time'=>'19:00:00',
            'image'=>'http://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/Guf2.jpg/220px-Guf2.jpg',
            'popularity'=>14,
        ),
        3=>array(
            'title'=>'Guf',
            'style'=>'R&B',
            'address'=>'Warshawa',
            'price'=>'50$',
            'date'=>'2014-09-27',
            'time'=>'21:00:00',
            'image'=>'http://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/Guf2.jpg/220px-Guf2.jpg',
            'popularity'=>15,
        ),
        4=>array(
            'title'=>'Madonna',
            'style'=>'Данс-поп',
            'address'=>'Warshawa',
            'price'=>'200$',
            'date'=>'2014-09-30',
            'time'=>'22:30:00',
            'image'=>'https://lh5.googleusercontent.com/hcnOcT_OE8PC0J8Lkmd32CVge0xlj6kEBamKlrOxr6by=s552-no',
            'popularity'=>40,
        ),
        5=>array(
            'title'=>'Madonna',
            'style'=>'Данс-поп',
            'address'=>'Хелм',
            'price'=>'250$',
            'date'=>'2014-10-04',
            'time'=>'21:30:00',
            'image'=>'https://lh6.googleusercontent.com/-zWt8QpFbthg/T4WhP8THgzI/AAAAAAAANvE/Kwcv0tIscJs/s552-no/app-promo.jpg',
            'popularity'=>31,
        ),
        6=>array(
            'title'=>'T-killah',
            'style'=>'Данс-поп',
            'address'=>'Хелм',
            'price'=>'10$',
            'date'=>'2014-10-07',
            'time'=>'',
            'image'=>'http://cs616725.vk.me/v616725799/1569c/nbLCEJUZOvc.jpg',
            'popularity'=>15,
        ),
    );
    
    public static function sortByDate($a,$b){
        //error_log(1);
        if ($a['date'] > $b['date'])
            return 1;
    }
    
    public static function sortByPopularity($a,$b){
        //error_log(2);
        if ($a['popularity'] < $b['popularity'])
            return 1;
    }
}
