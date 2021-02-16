<?php


class Validation
{
    public static function CheckEmpty(mixed ...$Items):bool
    {
        foreach ($Items as $item){
            if(empty($item)){
                return true;
            }
        }
        return false;
    }

}
