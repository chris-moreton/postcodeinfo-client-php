<?php
namespace ministryofjustice\postcodeInfo\client;

class Address
{
    /**
     * @var string
     */
    private $uprn;
    
    /**
     * @var string
     */
    private $organisationName;
    
    /**
     * @var string
     */
    private $departmentName;
    
    /**
     * @var string
     */
    private $poBoxNumber;
    
    /**
     * @var string
     */
    private $buildingName;
    
    /**
     * @var string
     */
    private $subBuildingName;
    
    /**
     * @var string
     */
    private $thoroughfareName;
    
    /**
     * @var string
     */
    private $dependentLocality;
    
    /**
     * @var string
     */
    private $doubleDependentLocality;
    
    /**
     * @var string
     */
    private $postTown;
    
    /**
     * @var string
     */
    private $postcodeType;
    
    /**
     * @var string
     */
    private $formattedAddress;
    
    /**
     * @var Point
     */
    private $point;
    
    
}
