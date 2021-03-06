<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: ApiCore/Testing/mocks.proto

namespace Google\ApiCore\Testing;

use Google\Protobuf\BytesValue;
use Google\Protobuf\Duration;
use Google\Protobuf\FieldMask;
use Google\Protobuf\Int64Value;
use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\GPBUtil;
use Google\Protobuf\Internal\Message;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\ListValue;
use Google\Protobuf\StringValue;
use Google\Protobuf\Struct;
use Google\Protobuf\Timestamp;
use Google\Protobuf\Value;
use GPBMetadata\ApiCore\Testing\Mocks;

/**
 * Generated from protobuf message <code>google.apicore.testing.MockRequestBody</code>
 */
class MockRequestBody extends Message
{
    protected $oneof_field;
    /**
     * Generated from protobuf field <code>string name = 1;</code>
     */
    private $name = '';
    /**
     * Generated from protobuf field <code>uint64 number = 2;</code>
     */
    private $number = 0;
    /**
     * Generated from protobuf field <code>repeated string repeated_field = 3;</code>
     */
    private $repeated_field;
    /**
     * Generated from protobuf field <code>.google.apicore.testing.MockRequestBody nested_message = 4;</code>
     */
    private $nested_message = null;
    /**
     * Generated from protobuf field <code>.google.protobuf.BytesValue bytes_value = 5;</code>
     */
    private $bytes_value = null;
    /**
     * Generated from protobuf field <code>.google.protobuf.Duration duration_value = 6;</code>
     */
    private $duration_value = null;
    /**
     * Generated from protobuf field <code>.google.protobuf.FieldMask field_mask = 7;</code>
     */
    private $field_mask = null;
    /**
     * Generated from protobuf field <code>.google.protobuf.Int64Value int64_value = 8;</code>
     */
    private $int64_value = null;
    /**
     * Generated from protobuf field <code>.google.protobuf.ListValue list_value = 9;</code>
     */
    private $list_value = null;
    /**
     * Generated from protobuf field <code>.google.protobuf.StringValue string_value = 10;</code>
     */
    private $string_value = null;
    /**
     * Generated from protobuf field <code>.google.protobuf.Struct struct_value = 11;</code>
     */
    private $struct_value = null;
    /**
     * Generated from protobuf field <code>.google.protobuf.Timestamp timestamp_value = 12;</code>
     */
    private $timestamp_value = null;
    /**
     * Generated from protobuf field <code>.google.protobuf.Value value_value = 13;</code>
     */
    private $value_value = null;

    /**
     * Constructor.
     *
     * @param array                     $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string                 $name
     *     @type int|string             $number
     *     @type string[]|RepeatedField $repeated_field
     *     @type MockRequestBody        $nested_message
     *     @type BytesValue             $bytes_value
     *     @type Duration               $duration_value
     *     @type FieldMask              $field_mask
     *     @type Int64Value             $int64_value
     *     @type ListValue              $list_value
     *     @type StringValue            $string_value
     *     @type Struct                 $struct_value
     *     @type Timestamp              $timestamp_value
     *     @type Value                  $value_value
     *     @type string                                           $field_1
     *     @type string $field_2
     *     @type string $field_3
     * }
     */
    public function __construct($data = NULL) {
        Mocks::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
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

    /**
     * Generated from protobuf field <code>uint64 number = 2;</code>
     * @return int|string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Generated from protobuf field <code>uint64 number = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setNumber($var)
    {
        GPBUtil::checkUint64($var);
        $this->number = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated string repeated_field = 3;</code>
     *
     * @return RepeatedField
     */
    public function getRepeatedField()
    {
        return $this->repeated_field;
    }

    /**
     * Generated from protobuf field <code>repeated string repeated_field = 3;</code>
     *
     * @param string[]|RepeatedField $var
     * @return $this
     */
    public function setRepeatedField($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, GPBType::STRING);
        $this->repeated_field = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.google.apicore.testing.MockRequestBody nested_message = 4;</code>
     *
     * @return MockRequestBody
     */
    public function getNestedMessage()
    {
        return $this->nested_message;
    }

    /**
     * Generated from protobuf field <code>.google.apicore.testing.MockRequestBody nested_message = 4;</code>
     *
     * @param MockRequestBody $var
     * @return $this
     */
    public function setNestedMessage($var)
    {
        GPBUtil::checkMessage($var, MockRequestBody::class);
        $this->nested_message = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.BytesValue bytes_value = 5;</code>
     * @return BytesValue
     */
    public function getBytesValue()
    {
        return $this->bytes_value;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.BytesValue bytes_value = 5;</code>
     * @param BytesValue $var
     * @return $this
     */
    public function setBytesValue($var)
    {
        GPBUtil::checkMessage($var, BytesValue::class);
        $this->bytes_value = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.Duration duration_value = 6;</code>
     * @return Duration
     */
    public function getDurationValue()
    {
        return $this->duration_value;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.Duration duration_value = 6;</code>
     * @param Duration $var
     * @return $this
     */
    public function setDurationValue($var)
    {
        GPBUtil::checkMessage($var, Duration::class);
        $this->duration_value = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.FieldMask field_mask = 7;</code>
     * @return FieldMask
     */
    public function getFieldMask()
    {
        return $this->field_mask;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.FieldMask field_mask = 7;</code>
     * @param FieldMask $var
     * @return $this
     */
    public function setFieldMask($var)
    {
        GPBUtil::checkMessage($var, FieldMask::class);
        $this->field_mask = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.Int64Value int64_value = 8;</code>
     * @return Int64Value
     */
    public function getInt64Value()
    {
        return $this->int64_value;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.Int64Value int64_value = 8;</code>
     * @param Int64Value $var
     * @return $this
     */
    public function setInt64Value($var)
    {
        GPBUtil::checkMessage($var, Int64Value::class);
        $this->int64_value = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.ListValue list_value = 9;</code>
     * @return ListValue
     */
    public function getListValue()
    {
        return $this->list_value;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.ListValue list_value = 9;</code>
     * @param ListValue $var
     * @return $this
     */
    public function setListValue($var)
    {
        GPBUtil::checkMessage($var, ListValue::class);
        $this->list_value = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.StringValue string_value = 10;</code>
     * @return StringValue
     */
    public function getStringValue()
    {
        return $this->string_value;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.StringValue string_value = 10;</code>
     * @param StringValue $var
     * @return $this
     */
    public function setStringValue($var)
    {
        GPBUtil::checkMessage($var, StringValue::class);
        $this->string_value = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.Struct struct_value = 11;</code>
     * @return Struct
     */
    public function getStructValue()
    {
        return $this->struct_value;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.Struct struct_value = 11;</code>
     * @param Struct $var
     * @return $this
     */
    public function setStructValue($var)
    {
        GPBUtil::checkMessage($var, Struct::class);
        $this->struct_value = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.Timestamp timestamp_value = 12;</code>
     * @return Timestamp
     */
    public function getTimestampValue()
    {
        return $this->timestamp_value;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.Timestamp timestamp_value = 12;</code>
     * @param Timestamp $var
     * @return $this
     */
    public function setTimestampValue($var)
    {
        GPBUtil::checkMessage($var, Timestamp::class);
        $this->timestamp_value = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.Value value_value = 13;</code>
     * @return Value
     */
    public function getValueValue()
    {
        return $this->value_value;
    }

    /**
     * Generated from protobuf field <code>.google.protobuf.Value value_value = 13;</code>
     * @param Value $var
     * @return $this
     */
    public function setValueValue($var)
    {
        GPBUtil::checkMessage($var, Value::class);
        $this->value_value = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string field_1 = 14;</code>
     * @return string
     */
    public function getField1()
    {
        return $this->readOneof(14);
    }

    /**
     * Generated from protobuf field <code>string field_1 = 14;</code>
     * @param string $var
     * @return $this
     */
    public function setField1($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(14, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>string field_2 = 15;</code>
     * @return string
     */
    public function getField2()
    {
        return $this->readOneof(15);
    }

    /**
     * Generated from protobuf field <code>string field_2 = 15;</code>
     * @param string $var
     * @return $this
     */
    public function setField2($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(15, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>string field_3 = 16;</code>
     * @return string
     */
    public function getField3()
    {
        return $this->readOneof(16);
    }

    /**
     * Generated from protobuf field <code>string field_3 = 16;</code>
     * @param string $var
     * @return $this
     */
    public function setField3($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(16, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getOneofField()
    {
        return $this->whichOneof("oneof_field");
    }

}

