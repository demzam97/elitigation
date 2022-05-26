<?php
/**
 * PresentaddressObj
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * DCRC_CitizenDetailsAPI
 *
 * No description provided (generated by Swagger Codegen https://github.com/swagger-api/swagger-codegen)
 *
 * OpenAPI spec version: 1.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.3.1
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Model;

use \ArrayAccess;
use \Swagger\Client\ObjectSerializer;

/**
 * PresentaddressObj Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PresentaddressObj implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'presentaddressObj';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'cid' => 'string',
        'dzongkhag_id' => 'string',
        'dzongkhag_name' => 'string',
        'gewog_id' => 'string',
        'gewog_name' => 'string',
        'house_no' => 'string',
        'thram_no' => 'string',
        'village_name' => 'string',
        'village_serial_no' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'cid' => null,
        'dzongkhag_id' => null,
        'dzongkhag_name' => null,
        'gewog_id' => null,
        'gewog_name' => null,
        'house_no' => null,
        'thram_no' => null,
        'village_name' => null,
        'village_serial_no' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'cid' => 'cid',
        'dzongkhag_id' => 'dzongkhagId',
        'dzongkhag_name' => 'dzongkhagName',
        'gewog_id' => 'gewogId',
        'gewog_name' => 'gewogName',
        'house_no' => 'houseNo',
        'thram_no' => 'thramNo',
        'village_name' => 'villageName',
        'village_serial_no' => 'villageSerialNo'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cid' => 'setCid',
        'dzongkhag_id' => 'setDzongkhagId',
        'dzongkhag_name' => 'setDzongkhagName',
        'gewog_id' => 'setGewogId',
        'gewog_name' => 'setGewogName',
        'house_no' => 'setHouseNo',
        'thram_no' => 'setThramNo',
        'village_name' => 'setVillageName',
        'village_serial_no' => 'setVillageSerialNo'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cid' => 'getCid',
        'dzongkhag_id' => 'getDzongkhagId',
        'dzongkhag_name' => 'getDzongkhagName',
        'gewog_id' => 'getGewogId',
        'gewog_name' => 'getGewogName',
        'house_no' => 'getHouseNo',
        'thram_no' => 'getThramNo',
        'village_name' => 'getVillageName',
        'village_serial_no' => 'getVillageSerialNo'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['cid'] = isset($data['cid']) ? $data['cid'] : null;
        $this->container['dzongkhag_id'] = isset($data['dzongkhag_id']) ? $data['dzongkhag_id'] : null;
        $this->container['dzongkhag_name'] = isset($data['dzongkhag_name']) ? $data['dzongkhag_name'] : null;
        $this->container['gewog_id'] = isset($data['gewog_id']) ? $data['gewog_id'] : null;
        $this->container['gewog_name'] = isset($data['gewog_name']) ? $data['gewog_name'] : null;
        $this->container['house_no'] = isset($data['house_no']) ? $data['house_no'] : null;
        $this->container['thram_no'] = isset($data['thram_no']) ? $data['thram_no'] : null;
        $this->container['village_name'] = isset($data['village_name']) ? $data['village_name'] : null;
        $this->container['village_serial_no'] = isset($data['village_serial_no']) ? $data['village_serial_no'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        return true;
    }


    /**
     * Gets cid
     *
     * @return string
     */
    public function getCid()
    {
        return $this->container['cid'];
    }

    /**
     * Sets cid
     *
     * @param string $cid cid
     *
     * @return $this
     */
    public function setCid($cid)
    {
        $this->container['cid'] = $cid;

        return $this;
    }

    /**
     * Gets dzongkhag_id
     *
     * @return string
     */
    public function getDzongkhagId()
    {
        return $this->container['dzongkhag_id'];
    }

    /**
     * Sets dzongkhag_id
     *
     * @param string $dzongkhag_id dzongkhag_id
     *
     * @return $this
     */
    public function setDzongkhagId($dzongkhag_id)
    {
        $this->container['dzongkhag_id'] = $dzongkhag_id;

        return $this;
    }

    /**
     * Gets dzongkhag_name
     *
     * @return string
     */
    public function getDzongkhagName()
    {
        return $this->container['dzongkhag_name'];
    }

    /**
     * Sets dzongkhag_name
     *
     * @param string $dzongkhag_name dzongkhag_name
     *
     * @return $this
     */
    public function setDzongkhagName($dzongkhag_name)
    {
        $this->container['dzongkhag_name'] = $dzongkhag_name;

        return $this;
    }

    /**
     * Gets gewog_id
     *
     * @return string
     */
    public function getGewogId()
    {
        return $this->container['gewog_id'];
    }

    /**
     * Sets gewog_id
     *
     * @param string $gewog_id gewog_id
     *
     * @return $this
     */
    public function setGewogId($gewog_id)
    {
        $this->container['gewog_id'] = $gewog_id;

        return $this;
    }

    /**
     * Gets gewog_name
     *
     * @return string
     */
    public function getGewogName()
    {
        return $this->container['gewog_name'];
    }

    /**
     * Sets gewog_name
     *
     * @param string $gewog_name gewog_name
     *
     * @return $this
     */
    public function setGewogName($gewog_name)
    {
        $this->container['gewog_name'] = $gewog_name;

        return $this;
    }

    /**
     * Gets house_no
     *
     * @return string
     */
    public function getHouseNo()
    {
        return $this->container['house_no'];
    }

    /**
     * Sets house_no
     *
     * @param string $house_no house_no
     *
     * @return $this
     */
    public function setHouseNo($house_no)
    {
        $this->container['house_no'] = $house_no;

        return $this;
    }

    /**
     * Gets thram_no
     *
     * @return string
     */
    public function getThramNo()
    {
        return $this->container['thram_no'];
    }

    /**
     * Sets thram_no
     *
     * @param string $thram_no thram_no
     *
     * @return $this
     */
    public function setThramNo($thram_no)
    {
        $this->container['thram_no'] = $thram_no;

        return $this;
    }

    /**
     * Gets village_name
     *
     * @return string
     */
    public function getVillageName()
    {
        return $this->container['village_name'];
    }

    /**
     * Sets village_name
     *
     * @param string $village_name village_name
     *
     * @return $this
     */
    public function setVillageName($village_name)
    {
        $this->container['village_name'] = $village_name;

        return $this;
    }

    /**
     * Gets village_serial_no
     *
     * @return string
     */
    public function getVillageSerialNo()
    {
        return $this->container['village_serial_no'];
    }

    /**
     * Sets village_serial_no
     *
     * @param string $village_serial_no village_serial_no
     *
     * @return $this
     */
    public function setVillageSerialNo($village_serial_no)
    {
        $this->container['village_serial_no'] = $village_serial_no;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


