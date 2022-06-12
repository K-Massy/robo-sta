<?php
/**
 * wordpress functions common
 *
 * @package Torapants default
 */

/**
 * 曜日を取得する
 */
function get_week($week){
    $weekArray = array('日','月','火','水','木','金','土');
    return $weekArray[$week];
}
