<?php
/**
 * File for inputs for index action of shop service
 */

namespace My\Application\Service\Bazaar\Shop\Index;

/**
 * Class for input for index action of shop service
 *
 */
class Input extends \My\Application\BaseInputWithToken
{
    /**
     * UUID of category of sellers
     * @var string
     */
    public $category;
    
    /**
     * Code of entity subtype
     * @var string
     */
    public $subtype;
    
    /**
     * Search term
     * @var string
     */
    public $term;
    
    /**
     * Search near postcode
     * @var string
     */
    public $postcode;
    
    /**
     * Search area
     * @var GeoCircle | GeoBox
     */
    public $area;
}
