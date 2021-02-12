<?php


class QueryString
{
    protected static string $Domain;
    protected static string $QueryString;

    public static function setDomain(string $Domain) : void
    {
        self::$Domain = $Domain;
    }

    public static function setQueryString(array $Query):void
    {
        self::$QueryString = http_build_query($Query);
    }
    public static function getDomain():string
    {
        return self::$Domain;
    }
    public static function getQueryString():string
    {
        return self::$QueryString;
    }

    public static function getFullUrl():string
    {
        return "http://" . self::$Domain . "?" . self::$QueryString ;
    }


}