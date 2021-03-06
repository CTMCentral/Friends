<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/api/consumer.proto

namespace Google\Api;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\GPBUtil;
use Google\Protobuf\Internal\Message;
use Google\Protobuf\Internal\RepeatedField;
use GPBMetadata\Google\Api\Consumer;

/**
 * A descriptor for defining project properties for a service. One service may
 * have many consumer projects, and the service may want to behave differently
 * depending on some properties on the project. For example, a project may be
 * associated with a school, or a business, or a government agency, a business
 * type property on the project may affect how a service responds to the client.
 * This descriptor defines which properties are allowed to be set on a project.
 * Example:
 *    project_properties:
 *      properties:
 *      - name: NO_WATERMARK
 *        type: BOOL
 *        description: Allows usage of the API without watermarks.
 *      - name: EXTENDED_TILE_CACHE_PERIOD
 *        type: INT64
 *
 * Generated from protobuf message <code>google.api.ProjectProperties</code>
 */
class ProjectProperties extends Message
{
    /**
     * List of per consumer project-specific properties.
     *
     * Generated from protobuf field <code>repeated .google.api.Property properties = 1;</code>
     */
    private $properties;

    /**
     * Constructor.
     *
     * @param array                       $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type Property[]|RepeatedField $properties
     *           List of per consumer project-specific properties.
     * }
     */
    public function __construct($data = NULL) {
        Consumer::initOnce();
        parent::__construct($data);
    }

    /**
     * List of per consumer project-specific properties.
     *
     * Generated from protobuf field <code>repeated .google.api.Property properties = 1;</code>
     *
     * @return RepeatedField
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * List of per consumer project-specific properties.
     *
     * Generated from protobuf field <code>repeated .google.api.Property properties = 1;</code>
     *
     * @param Property[]|RepeatedField $var
     * @return $this
     */
    public function setProperties($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, GPBType::MESSAGE, Property::class);
        $this->properties = $arr;

        return $this;
    }

}

