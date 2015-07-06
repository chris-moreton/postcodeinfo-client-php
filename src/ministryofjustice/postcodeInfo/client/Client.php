<?php
namespace ministryofjustice\postcodeinfo\client;

use ministryofjustice\postcodeInfo\client\Postcode;
use GuzzleHttp\Client as GuzzleClient;

class Client
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $apiEndpoint;
    
    /**
     * @var GuzzleClient
     */
    private $guzzleClient;
    
    /**
     * @param string $apiKey
     * @param string $apiEndpoint
     */
    public function __construct($apiKey, $apiEndpoint)
    {
        $this->apiKey = $apiKey;
        $this->apiEndpoint = $apiEndpoint;
    }
    
    /**
     * Lookup information for the given postcode
     * and return the contents in a Postcode object
     * 
     * @param Postcode $postcode
     */
    public function lookupPostcode($postcode)
    {
        $path = $this->apiEndpoint . '/addresses/?postcode=' . $postcode;
    }
    
    public function client()
    {
        if ( !isset($this->guzzleClient) ) {
            $this->guzzleClient = new GuzzleClient();
        }
    }
    
    /**
     * @return the $apiKey
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return the $apiEndpoint
     */
    public function getApiEndpoint()
    {
        return $this->apiEndpoint;
    }

    /**
     * @param string $apiEndpoint
     */
    public function setApiEndpoint($apiEndpoint)
    {
        $this->apiEndpoint = $apiEndpoint;
    }

    /**
     * @return the $guzzleClient
     */
    public function getGuzzleClient()
    {
        return $this->guzzleClient;
    }

    /**
     * @param GuzzleClient $guzzleClient
     */
    public function setGuzzleClient($guzzleClient)
    {
        $this->guzzleClient = $guzzleClient;
    }

}
