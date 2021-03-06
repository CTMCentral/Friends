<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/api/expr/v1alpha1/checked.proto

namespace Google\Api\Expr\V1alpha1\Type;

use Google\Api\Expr\V1alpha1\Type;
use Google\Api\Expr\V1alpha1\Type_MapType;
use Google\Protobuf\Internal\GPBUtil;
use Google\Protobuf\Internal\Message;
use GPBMetadata\Google\Api\Expr\V1Alpha1\Checked;

/**
 * Map type with parameterized key and value types, e.g. `map<string, int>`.
 *
 * Generated from protobuf message <code>google.api.expr.v1alpha1.Type.MapType</code>
 */
class MapType extends Message
{
    /**
     * The type of the key.
     *
     * Generated from protobuf field <code>.google.api.expr.v1alpha1.Type key_type = 1;</code>
     */
    private $key_type = null;
    /**
     * The type of the value.
     *
     * Generated from protobuf field <code>.google.api.expr.v1alpha1.Type value_type = 2;</code>
     */
    private $value_type = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type Type $key_type
     *           The type of the key.
     *     @type Type $value_type
     *           The type of the value.
     * }
     */
    public function __construct($data = NULL) {
        Checked::initOnce();
        parent::__construct($data);
    }

    /**
     * The type of the key.
     *
     * Generated from protobuf field <code>.google.api.expr.v1alpha1.Type key_type = 1;</code>
     * @return Type
     */
    public function getKeyType()
    {
        return $this->key_type;
    }

    /**
     * The type of the key.
     *
     * Generated from protobuf field <code>.google.api.expr.v1alpha1.Type key_type = 1;</code>
     * @param Type $var
     * @return $this
     */
    public function setKeyType($var)
    {
        GPBUtil::checkMessage($var, Type::class);
        $this->key_type = $var;

        return $this;
    }

    /**
     * The type of the value.
     *
     * Generated from protobuf field <code>.google.api.expr.v1alpha1.Type value_type = 2;</code>
     * @return Type
     */
    public function getValueType()
    {
        return $this->value_type;
    }

    /**
     * The type of the value.
     *
     * Generated from protobuf field <code>.google.api.expr.v1alpha1.Type value_type = 2;</code>
     * @param Type $var
     * @return $this
     */
    public function setValueType($var)
    {
        GPBUtil::checkMessage($var, Type::class);
        $this->value_type = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MapType::class, Type_MapType::class);

