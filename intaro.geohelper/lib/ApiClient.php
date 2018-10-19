<?php
namespace Geohelper;

use Geohelper\Http\Client;
use Geohelper\Response\ApiResponse;

class ApiClient
{
    const VERSION = 'v1';

    protected $client;

    public function __construct($apiKey, $lang = 'ru')
    {
        $url = 'http://geohelper.info/api/' . self::VERSION;

        $this->client = new Client($url, array('apiKey' => $apiKey, 'locale' => array('lang'=> $lang)));
    }

    /**
     * Returns cities list
     *
     * @param array $filter
     * @param null  $page
     * @param null  $limit
     *
     * @throws \Geohelper\Exception\InvalidJsonException
     * @throws \Geohelper\Exception\CurlException
     * @throws \InvalidArgumentException
     *
     * @return ApiResponse
     */
    public function citiesList(array $filter = array(), $page = null, $limit = 100)
    {
        $parameters = array();

        if (count($filter)) {
            $parameters['filter'] = $filter;
        }
        if (null !== $page) {
            $parameters['pagination']['page'] = (int) $page;
        }
        if (null !== $limit) {
            $parameters['pagination']['limit'] = (int) $limit;
        }

        return $this->client->makeRequest(
            '/cities',
            Client::METHOD_GET,
            $parameters
        );
    }    
    
    /**
     * Returns countries list
     *
     * @param array $filter
     * @param null  $page
     * @param null  $limit
     *
     * @throws \Geohelper\Exception\InvalidJsonException
     * @throws \Geohelper\Exception\CurlException
     * @throws \InvalidArgumentException
     *
     * @return ApiResponse
     */
    public function countriesList(array $filter = array(), $page = null, $limit = 100)
    {
        $parameters = array();

        if (count($filter)) {
            $parameters['filter'] = $filter;
        }
        if (null !== $page) {
            $parameters['pagination']['page'] = (int) $page;
        }
        if (null !== $limit) {
            $parameters['pagination']['limit'] = (int) $limit;
        }

        return $this->client->makeRequest(
            '/countries',
            Client::METHOD_GET,
            $parameters
        );
    }
    
    /**
     * Returns post code list
     *
     * @param array $filter
     * @param null  $page
     * @param null  $limit
     *
     * @throws \Geohelper\Exception\InvalidJsonException
     * @throws \Geohelper\Exception\CurlException
     * @throws \InvalidArgumentException
     *
     * @return ApiResponse
     */
    public function postCodeList(array $filter = array())
    {
        $parameters = array();

        if (count($filter)) {
            $parameters['filter'] = $filter;
        }

        return $this->client->makeRequest(
            '/post-code',
            Client::METHOD_GET,
            $parameters
        );
    }
    
    /**
     * Returns regions list
     *
     * @param array $filter
     * @param null  $page
     * @param null  $limit
     *
     * @throws \Geohelper\Exception\InvalidJsonException
     * @throws \Geohelper\Exception\CurlException
     * @throws \InvalidArgumentException
     *
     * @return ApiResponse
     */
    public function regionsList(array $filter = array(), $page = null, $limit = 100)
    {
        $parameters = array();

        if (count($filter)) {
            $parameters['filter'] = $filter;
        }
        if (null !== $page) {
            $parameters['pagination']['page'] = (int) $page;
        }
        if (null !== $limit) {
            $parameters['pagination']['limit'] = (int) $limit;
        }

        return $this->client->makeRequest(
            '/regions',
            Client::METHOD_GET,
            $parameters
        );
    }
    
    /**
     * Returns streets list
     *
     * @param array $filter
     * @param null  $page
     * @param null  $limit
     *
     * @throws \Geohelper\Exception\InvalidJsonException
     * @throws \Geohelper\Exception\CurlException
     * @throws \InvalidArgumentException
     *
     * @return ApiResponse
     */
    public function streetsList(array $filter = array(), $page = null, $limit = 100)
    {
        $parameters = array();

        if (count($filter)) {
            $parameters['filter'] = $filter;
        }
        if (null !== $page) {
            $parameters['pagination']['page'] = (int) $page;
        }
        if (null !== $limit) {
            $parameters['pagination']['limit'] = (int) $limit;
        }

        return $this->client->makeRequest(
            '/streets',
            Client::METHOD_GET,
            $parameters
        );
    }       
    
}
