<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/iam/admin/v1/iam.proto

namespace Google\Iam\Admin\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\GPBUtil;
use Google\Protobuf\Internal\Message;
use Google\Protobuf\Internal\RepeatedField;
use GPBMetadata\Google\Iam\Admin\V1\Iam;

/**
 * The service account list response.
 *
 * Generated from protobuf message <code>google.iam.admin.v1.ListServiceAccountsResponse</code>
 */
class ListServiceAccountsResponse extends Message
{
    /**
     * The list of matching service accounts.
     *
     * Generated from protobuf field <code>repeated .google.iam.admin.v1.ServiceAccount accounts = 1;</code>
     */
    private $accounts;
    /**
     * To retrieve the next page of results, set
     * [ListServiceAccountsRequest.page_token][google.iam.admin.v1.ListServiceAccountsRequest.page_token]
     * to this value.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     */
    private $next_page_token = '';

    /**
     * Constructor.
     *
     * @param array                             $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type ServiceAccount[]|RepeatedField $accounts
     *           The list of matching service accounts.
     *     @type string                         $next_page_token
     *           To retrieve the next page of results, set
     *           [ListServiceAccountsRequest.page_token][google.iam.admin.v1.ListServiceAccountsRequest.page_token]
     *           to this value.
     * }
     */
    public function __construct($data = NULL) {
        Iam::initOnce();
        parent::__construct($data);
    }

    /**
     * The list of matching service accounts.
     *
     * Generated from protobuf field <code>repeated .google.iam.admin.v1.ServiceAccount accounts = 1;</code>
     *
     * @return RepeatedField
     */
    public function getAccounts()
    {
        return $this->accounts;
    }

    /**
     * The list of matching service accounts.
     *
     * Generated from protobuf field <code>repeated .google.iam.admin.v1.ServiceAccount accounts = 1;</code>
     *
     * @param ServiceAccount[]|RepeatedField $var
     * @return $this
     */
    public function setAccounts($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, GPBType::MESSAGE, ServiceAccount::class);
        $this->accounts = $arr;

        return $this;
    }

    /**
     * To retrieve the next page of results, set
     * [ListServiceAccountsRequest.page_token][google.iam.admin.v1.ListServiceAccountsRequest.page_token]
     * to this value.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->next_page_token;
    }

    /**
     * To retrieve the next page of results, set
     * [ListServiceAccountsRequest.page_token][google.iam.admin.v1.ListServiceAccountsRequest.page_token]
     * to this value.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setNextPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->next_page_token = $var;

        return $this;
    }

}
