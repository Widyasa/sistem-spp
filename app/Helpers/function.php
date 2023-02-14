<?php
function redirect($string){
    header("Location:" . baseurl . "$string");
    exit();
}
function assets($path)
{
    return baseurl . "assets/$path";
}
