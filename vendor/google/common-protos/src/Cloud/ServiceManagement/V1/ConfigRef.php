<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/api/servicemanagement/v1/resources.proto

namespace Google\Cloud\ServiceManagement\V1;

use Google\Protobuf\Internal\GPBUtil;
use Google\Protobuf\Internal\Message;
use GPBMetadata\Google\Api\Servicemanagement\V1\Resources;

/**
 * Represents a service configuration with its name and id.
 *
 * Generated from protobuf message <code>google.api.servicemanagement.v1.ConfigRef</code>
 */
class ConfigRef extends Message
{
    /**
     * Resource name of a service config. It must have the following
     * format: "services/{service name}/configs/{config id}".
     *
     * Generated from protobuf field <code>string name = 1;</code>
     */
    private $name = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Resource name of a service config. It must have the following
     *           format: "services/{service name}/configs/{config id}".
     * }
     */
    public function __construct($data = NULL) {
        Resources::initOnce();
        parent::__construct($data);
    }

    /**
     * Resource name of a service config. It must have the following
     * format: "services/{service name}/configs/{config id}".
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Resource name of a service config. It must have the following
     * format: "services/{service name}/configs/{config id}".
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

}

