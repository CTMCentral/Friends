<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/rpc/error_details.proto

namespace Google\Rpc;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\GPBUtil;
use Google\Protobuf\Internal\Message;
use Google\Protobuf\Internal\RepeatedField;
use Google\Rpc\PreconditionFailure\Violation;
use GPBMetadata\Google\Rpc\ErrorDetails;

/**
 * Describes what preconditions have failed.
 * For example, if an RPC failed because it required the Terms of Service to be
 * acknowledged, it could list the terms of service violation in the
 * PreconditionFailure message.
 *
 * Generated from protobuf message <code>google.rpc.PreconditionFailure</code>
 */
class PreconditionFailure extends Message
{
    /**
     * Describes all precondition violations.
     *
     * Generated from protobuf field <code>repeated .google.rpc.PreconditionFailure.Violation violations = 1;</code>
     */
    private $violations;

    /**
     * Constructor.
     *
     * @param array                        $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type Violation[]|RepeatedField $violations
     *           Describes all precondition violations.
     * }
     */
    public function __construct($data = NULL) {
        ErrorDetails::initOnce();
        parent::__construct($data);
    }

    /**
     * Describes all precondition violations.
     *
     * Generated from protobuf field <code>repeated .google.rpc.PreconditionFailure.Violation violations = 1;</code>
     *
     * @return RepeatedField
     */
    public function getViolations()
    {
        return $this->violations;
    }

    /**
     * Describes all precondition violations.
     *
     * Generated from protobuf field <code>repeated .google.rpc.PreconditionFailure.Violation violations = 1;</code>
     *
     * @param Violation[]|RepeatedField $var
     * @return $this
     */
    public function setViolations($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, GPBType::MESSAGE, Violation::class);
        $this->violations = $arr;

        return $this;
    }

}
