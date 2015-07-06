<?php
namespace ministryofjustice\postcodeInfo\client;

class Postcode
{
    /**
     * @var boolean
     */
    private $isValid;
    
    /**
     * @var number
     */
    private $latitude;
    
    /**
     * @var number
     */
    private $longitude;
    
    /**
     * @var string
     */
    private $localAuthority;
    
    /**
     * An array of type Address
     * 
     * @var array
     */
    private $addresses;
    
    /**
     * @return $isValid
     */
    public function getIsValid()
    {
        return $this->isValid;
    }

    /**
     * @param boolean $isValid
     */
    public function setIsValid($isValid)
    {
        $this->isValid = $isValid;
    }

    /**
     * @return the $latitude
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param number $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return the $longitude
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param number $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return the $localAuthority
     */
    public function getLocalAuthority()
    {
        return $this->localAuthority;
    }

    /**
     * @param string $localAuthority
     */
    public function setLocalAuthority($localAuthority)
    {
        $this->localAuthority = $localAuthority;
    }

    /**
     * @return the $addresses
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param array $addresses
     */
    public function setAddresses($addresses)
    {
        $this->addresses = $addresses;
    }
 
}
