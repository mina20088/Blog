<?php


class QueryString
{
    protected static string $Domain;
    protected static string $QueryArguments;
    protected static array $QueryString;
    protected static string $url;

    public static function setDomain(string $Domain) : void
    {
        self::$Domain = $Domain;
    }

    public static function setQueryString(array $Query):void
    {
        self::$QueryArguments = http_build_query($Query);
    }
    public static function getDomain():string
    {
        return self::$Domain;
    }
    public static function getQueryString():string
    {
        return self::$QueryArguments;
    }

    public static function getQuaryStringArgs():array
    {
        self::$url = "http://". $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if(isset(self::$url)){
           $parsedUrl = parse_url(urldecode(self::$url),PHP_URL_QUERY);
           self::$QueryString = explode("&",$parsedUrl);
        }
        return self::$QueryString;
    }


}