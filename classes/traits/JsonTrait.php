<?php


namespace classes\Wrapper;


trait JsonTrait
{
    private $json = '';

    protected static function ExecuteCurl(string $url): string
    {
        //echo $url . "\n";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_USERAGENT,
            'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        curl_close($curl);
        return $json;
    }

    /**
     * @return string
     */
    public function getJson(): string
    {
        return $this->json;
    }

    /**
     * @param string $json
     */
    public function setJson(string $json): void
    {
        $this->json = $json;
    }

    /**
     * @return mixed
     */
    public function decodeJson()
    {
        return json_decode($this->json, true);
    }
}
