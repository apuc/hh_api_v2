<?php

namespace classes;

use classes\Wrapper\JsonTrait;
use classes\Wrapper\ParserTrait;

class Wrapper
{
    use JsonTrait;
    use ParserTrait;

    private $path;

    /**
     * Wrapper constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * @param $path
     * @return Wrapper
     */
    public static function runFor($path)
    {
        return new self($path);
    }

    /**
     * @param array|null $params
     * @return $this
     */
    public function get(Array $params = null)
    {
        //print_r($params);

        if (empty($params)) {

            $url = $this->createUrl(array(
                VacancyParams::page => '1'
            ));
            $this->json = Wrapper::ExecuteCurl($url);

        } else {

            $url = $this->createUrl($params);
            $this->json = Wrapper::ExecuteCurl($url);
        }

        return $this;
    }

    /**
     * @param array $params
     * @return false|string
     */
    public function createUrl(Array $params)
    {
        return IUrls::MainPath . $this->path . '?' . http_build_query($params);
    }

    /**
     * @return mixed|null
     */
    public function getItemFromJson()
    {
        if ($this->json === '') {
            return null;
        }

        return $this->createObjFromArr($this->ValidateJson($this->json), 'VacancyResponse');
    }
}
