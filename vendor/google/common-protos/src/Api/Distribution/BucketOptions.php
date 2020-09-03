<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/api/distribution.proto

namespace Google\Api\Distribution;

use Google\Api\Distribution\BucketOptions\Explicit;
use Google\Api\Distribution\BucketOptions\Exponential;
use Google\Api\Distribution\BucketOptions\Linear;
use Google\Api\Distribution_BucketOptions;
use Google\Api\Distribution_BucketOptions_Explicit;
use Google\Api\Distribution_BucketOptions_Exponential;
use Google\Api\Distribution_BucketOptions_Linear;
use Google\Protobuf\Internal\GPBUtil;
use Google\Protobuf\Internal\Message;
use GPBMetadata\Google\Api\Distribution;

/**
 * `BucketOptions` describes the bucket boundaries used to create a histogram
 * for the distribution. The buckets can be in a linear sequence, an
 * exponential sequence, or each bucket can be specified explicitly.
 * `BucketOptions` does not include the number of values in each bucket.
 * A bucket has an inclusive lower bound and exclusive upper bound for the
 * values that are counted for that bucket. The upper bound of a bucket must
 * be strictly greater than the lower bound. The sequence of N buckets for a
 * distribution consists of an underflow bucket (number 0), zero or more
 * finite buckets (number 1 through N - 2) and an overflow bucket (number N -
 * 1). The buckets are contiguous: the lower bound of bucket i (i > 0) is the
 * same as the upper bound of bucket i - 1. The buckets span the whole range
 * of finite values: lower bound of the underflow bucket is -infinity and the
 * upper bound of the overflow bucket is +infinity. The finite buckets are
 * so-called because both bounds are finite.
 *
 * Generated from protobuf message <code>google.api.Distribution.BucketOptions</code>
 */
class BucketOptions extends Message
{
    protected $options;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type Linear $linear_buckets
     *           The linear bucket.
     *     @type Exponential $exponential_buckets
     *           The exponential buckets.
     *     @type Explicit $explicit_buckets
     *           The explicit buckets.
     * }
     */
    public function __construct($data = NULL) {
        Distribution::initOnce();
        parent::__construct($data);
    }

    /**
     * The linear bucket.
     *
     * Generated from protobuf field <code>.google.api.Distribution.BucketOptions.Linear linear_buckets = 1;</code>
     * @return Linear
     */
    public function getLinearBuckets()
    {
        return $this->readOneof(1);
    }

    /**
     * The linear bucket.
     *
     * Generated from protobuf field <code>.google.api.Distribution.BucketOptions.Linear linear_buckets = 1;</code>
     * @param Linear $var
     * @return $this
     */
    public function setLinearBuckets($var)
    {
        GPBUtil::checkMessage($var, Distribution_BucketOptions_Linear::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * The exponential buckets.
     *
     * Generated from protobuf field <code>.google.api.Distribution.BucketOptions.Exponential exponential_buckets = 2;</code>
     * @return Exponential
     */
    public function getExponentialBuckets()
    {
        return $this->readOneof(2);
    }

    /**
     * The exponential buckets.
     *
     * Generated from protobuf field <code>.google.api.Distribution.BucketOptions.Exponential exponential_buckets = 2;</code>
     * @param Exponential $var
     * @return $this
     */
    public function setExponentialBuckets($var)
    {
        GPBUtil::checkMessage($var, Distribution_BucketOptions_Exponential::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * The explicit buckets.
     *
     * Generated from protobuf field <code>.google.api.Distribution.BucketOptions.Explicit explicit_buckets = 3;</code>
     * @return Explicit
     */
    public function getExplicitBuckets()
    {
        return $this->readOneof(3);
    }

    /**
     * The explicit buckets.
     *
     * Generated from protobuf field <code>.google.api.Distribution.BucketOptions.Explicit explicit_buckets = 3;</code>
     * @param Explicit $var
     * @return $this
     */
    public function setExplicitBuckets($var)
    {
        GPBUtil::checkMessage($var, Distribution_BucketOptions_Explicit::class);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getOptions()
    {
        return $this->whichOneof("options");
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BucketOptions::class, Distribution_BucketOptions::class);
