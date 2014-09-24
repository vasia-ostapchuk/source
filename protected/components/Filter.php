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
        $_SESSION['filter']['country_id']=$id;
    }

    public static function getCountryId()
    {
        return $_SESSION['filter']['country_id'];
    }
    
    public static function setCityId($id){
        $_SESSION['filter']['city_id']=$id;
    }

    public static function getCityId()
    {
        return $_SESSION['filter']['city_id'];
    }
    public static function setStyleId($id){
        $_SESSION['filter']['style_id']=$id;
    }

    public static function getStyleId()
    {
        return $_SESSION['filter']['style_id'];
    }
    public static function setGenreId($id){
        $_SESSION['filter']['genre_id']=$id;
    }

    public static function getGenreId()
    {
        return $_SESSION['filter']['genre_id'];
    }
}
