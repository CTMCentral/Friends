<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/api/servicemanagement/v1/resources.proto

namespace Google\Cloud\ServiceManagement\V1\Rollout;

use Google\Cloud\ServiceManagement\V1\Rollout_RolloutStatus;
use UnexpectedValueException;

/**
 * Status of a Rollout.
 *
 * Protobuf type <code>google.api.servicemanagement.v1.Rollout.RolloutStatus</code>
 */
class RolloutStatus
{
    /**
     * No status specified.
     *
     * Generated from protobuf enum <code>ROLLOUT_STATUS_UNSPECIFIED = 0;</code>
     */
    const ROLLOUT_STATUS_UNSPECIFIED = 0;
    /**
     * The Rollout is in progress.
     *
     * Generated from protobuf enum <code>IN_PROGRESS = 1;</code>
     */
    const IN_PROGRESS = 1;
    /**
     * The Rollout has completed successfully.
     *
     * Generated from protobuf enum <code>SUCCESS = 2;</code>
     */
    const SUCCESS = 2;
    /**
     * The Rollout has been cancelled. This can happen if you have overlapping
     * Rollout pushes, and the previous ones will be cancelled.
     *
     * Generated from protobuf enum <code>CANCELLED = 3;</code>
     */
    const CANCELLED = 3;
    /**
     * The Rollout has failed and the rollback attempt has failed too.
     *
     * Generated from protobuf enum <code>FAILED = 4;</code>
     */
    const FAILED = 4;
    /**
     * The Rollout has not started yet and is pending for execution.
     *
     * Generated from protobuf enum <code>PENDING = 5;</code>
     */
    const PENDING = 5;
    /**
     * The Rollout has failed and rolled back to the previous successful
     * Rollout.
     *
     * Generated from protobuf enum <code>FAILED_ROLLED_BACK = 6;</code>
     */
    const FAILED_ROLLED_BACK = 6;

    private static $valueToName = [
        self::ROLLOUT_STATUS_UNSPECIFIED => 'ROLLOUT_STATUS_UNSPECIFIED',
        self::IN_PROGRESS => 'IN_PROGRESS',
        self::SUCCESS => 'SUCCESS',
        self::CANCELLED => 'CANCELLED',
        self::FAILED => 'FAILED',
        self::PENDING => 'PENDING',
        self::FAILED_ROLLED_BACK => 'FAILED_ROLLED_BACK',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RolloutStatus::class, Rollout_RolloutStatus::class);
