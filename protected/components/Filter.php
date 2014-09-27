<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Filter
 *
 * @author Mr White
 */
class Filter extends CHttpSession {
    
    public static function setCountryId($id){
        //$_SESSION['filter']['country_id']=$id;
        Yii::app()->session['country_id']=$id;
    }

    public static function getCountryId()
    {
        //return isset($_SESSION['filter']['country_id'])? $_SESSION['filter']['country_id'] : FALSE;
        return isset(Yii::app()->session['country_id'])? Yii::app()->session['country_id']:FALSE;
    }
    
    public static function setCityId($id){
        //$_SESSION['filter']['city_id']=$id;
        Yii::app()->session['city_id']=$id;
    }

    public static function getCityId()
    {
        //return isset($_SESSION['filter']['city_id'])? $_SESSION['filter']['city_id'] : FALSE;
        return isset(Yii::app()->session['city_id'])? Yii::app()->session['city_id']:FALSE;
    }
    public static function setStyleId($id){
        //$_SESSION['filter']['style_id']=$id;
        Yii::app()->session['style_id']=$id;
    }

    public static function getStyleId()
    {
        //return isset($_SESSION['filter']['style_id'])? $_SESSION['filter']['style_id'] : FALSE;
        return isset(Yii::app()->session['style_id'])? Yii::app()->session['style_id']:FALSE;
    }
    public static function setGenreId($id){
        //$_SESSION['filter']['genre_id']=$id;
        Yii::app()->session['genre_id']=$id;
    }

    public static function getGenreId()
    {
        //return isset($_SESSION['filter']['genre_id'])? $_SESSION['filter']['genre_id'] : FALSE;
        return isset(Yii::app()->session['genre_id'])? Yii::app()->session['genre_id']:FALSE;
    }
    
    public static function setCalendarDate($date){
        //$_SESSION['filter']['genre_id']=$id;
        Yii::app()->session['calendar_date']=$date;
    }

    public static function getCalendarDate()
    {
        //return isset($_SESSION['filter']['genre_id'])? $_SESSION['filter']['genre_id'] : FALSE;
        return isset(Yii::app()->session['calendar_date'])? Yii::app()->session['calendar_date']:FALSE;
    }
    
    public static function setPriceMax($priceMax){
        //$_SESSION['filter']['genre_id']=$id;
        Yii::app()->session['price_max']=$priceMax;
    }

    public static function getPriceMax()
    {
        //return isset($_SESSION['filter']['genre_id'])? $_SESSION['filter']['genre_id'] : FALSE;
        return isset(Yii::app()->session['price_max'])? Yii::app()->session['price_max']:0;
    }
    
    public static function setPriceMin($priceMin){
        //$_SESSION['filter']['genre_id']=$id;
        Yii::app()->session['price_min']=$priceMin;
    }

    public static function getPriceMin()
    {
        //return isset($_SESSION['filter']['genre_id'])? $_SESSION['filter']['genre_id'] : FALSE;
        return isset(Yii::app()->session['price_min'])? Yii::app()->session['price_min']:0;
    }
    
    public static function getPrice(){
        return array(
            isset(Yii::app()->session['price_min'])? Yii::app()->session['price_min']:0,
            isset(Yii::app()->session['price_max'])? Yii::app()->session['price_max']:0,
        );
    }
}
