<?php

namespace ExPage;

class ExhentaiLoader extends EhentaiLoader
{
    
    private $cookie = "cookie/exhantai";
    protected $header = array("Referer: http://exhentai.org", "Host: exhentai.org");
    protected $home = "http://exhentai.org/";

    public function __construct(array $setting)
    {
        parent::__construct($setting);
        $this->login();
    }

    public function getCookieFile()
    {
        return $this->getExhentaiCookieFile();
    }

    protected function getExhentaiCookieFile()
    {
        return dirname(__FILE__) . "/" . $this->cookie;
    }

    private function login()
    {
        Curl::http("get", "http://exhentai.org", array(), $this->getExhentaiCookieFile(), $this->getEhentaiCookieFile(), array("Referer: http://exhentai.org", "Host: exhentai.org"));
    }
}
?>