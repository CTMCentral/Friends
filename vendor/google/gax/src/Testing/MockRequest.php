<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: ApiCore/Testing/mocks.proto

namespace Google\ApiCore\Testing;

use Google\Protobuf\Internal\GPBUtil;
use Google\Protobuf\Internal\Message;
use GPBMetadata\ApiCore\Testing\Mocks;

/**
 * Generated from protobuf message <code>google.apicore.testing.MockRequest</code>
 */
class MockRequest extends Message
{
    /**
     * Generated from protobuf field <code>string page_token = 1;</code>
     */
    private $page_token = '';
    /**
     * Generated from protobuf field <code>uint64 page_size = 2;</code>
     */
    private $page_size = 0;

    public function __construct() {
        Mocks::initOnce();
        parent::__construct();
    }

    /**
     * Generated from protobuf field <code>string page_token = 1;</code>
     * @return string
     */
    public function getPageToken()
    {
        return $this->page_token;
    }

    /**
     * Generated from protobuf field <code>string page_token = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->page_token = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint64 page_size = 2;</code>
     * @return int|string
     */
    public function getPageSize()
    {
        return $this->page_size;
    }

    /**
     * Generated from protobuf field <code>uint64 page_size = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setPageSize($var)
    {
        GPBUtil::checkUint64($var);
        $this->page_size = $var;

        return $this;
    }

}
