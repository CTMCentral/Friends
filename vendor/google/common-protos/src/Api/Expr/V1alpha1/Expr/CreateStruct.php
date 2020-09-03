<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/api/expr/v1alpha1/syntax.proto

namespace Google\Api\Expr\V1alpha1\Expr;

use Google\Api\Expr\V1alpha1\Expr\CreateStruct\Entry;
use Google\Api\Expr\V1alpha1\Expr_CreateStruct;
use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\GPBUtil;
use Google\Protobuf\Internal\Message;
use Google\Protobuf\Internal\RepeatedField;
use GPBMetadata\Google\Api\Expr\V1Alpha1\Syntax;

/**
 * A map or message creation expression.
 * Maps are constructed as `{'key_name': 'value'}`. Message construction is
 * similar, but prefixed with a type name and composed of field ids:
 * `types.MyType{field_id: 'value'}`.
 *
 * Generated from protobuf message <code>google.api.expr.v1alpha1.Expr.CreateStruct</code>
 */
class CreateStruct extends Message
{
    /**
     * The type name of the message to be created, empty when creating map
     * literals.
     *
     * Generated from protobuf field <code>string message_name = 1;</code>
     */
    private $message_name = '';
    /**
     * The entries in the creation expression.
     *
     * Generated from protobuf field <code>repeated .google.api.expr.v1alpha1.Expr.CreateStruct.Entry entries = 2;</code>
     */
    private $entries;

    /**
     * Constructor.
     *
     * @param array                    $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string                $message_name
     *           The type name of the message to be created, empty when creating map
     *           literals.
     *     @type Entry[]|RepeatedField $entries
     *           The entries in the creation expression.
     * }
     */
    public function __construct($data = NULL) {
        Syntax::initOnce();
        parent::__construct($data);
    }

    /**
     * The type name of the message to be created, empty when creating map
     * literals.
     *
     * Generated from protobuf field <code>string message_name = 1;</code>
     * @return string
     */
    public function getMessageName()
    {
        return $this->message_name;
    }

    /**
     * The type name of the message to be created, empty when creating map
     * literals.
     *
     * Generated from protobuf field <code>string message_name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setMessageName($var)
    {
        GPBUtil::checkString($var, True);
        $this->message_name = $var;

        return $this;
    }

    /**
     * The entries in the creation expression.
     *
     * Generated from protobuf field <code>repeated .google.api.expr.v1alpha1.Expr.CreateStruct.Entry entries = 2;</code>
     *
     * @return RepeatedField
     */
    public function getEntries()
    {
        return $this->entries;
    }

    /**
     * The entries in the creation expression.
     *
     * Generated from protobuf field <code>repeated .google.api.expr.v1alpha1.Expr.CreateStruct.Entry entries = 2;</code>
     *
     * @param Entry[]|RepeatedField $var
     * @return $this
     */
    public function setEntries($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, GPBType::MESSAGE, Entry::class);
        $this->entries = $arr;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreateStruct::class, Expr_CreateStruct::class);
