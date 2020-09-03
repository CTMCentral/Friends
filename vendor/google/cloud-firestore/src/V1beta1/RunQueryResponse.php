<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/firestore/v1beta1/firestore.proto

namespace Google\Cloud\Firestore\V1beta1;

use Google\Protobuf\Internal\GPBUtil;
use Google\Protobuf\Internal\Message;
use Google\Protobuf\Timestamp;
use GPBMetadata\Google\Firestore\V1Beta1\Firestore;

/**
 * The response for [Firestore.RunQuery][google.firestore.v1beta1.Firestore.RunQuery].
 *
 * Generated from protobuf message <code>google.firestore.v1beta1.RunQueryResponse</code>
 */
class RunQueryResponse extends Message
{
    /**
     * The transaction that was started as part of this request.
     * Can only be set in the first response, and only if
     * [RunQueryRequest.new_transaction][google.firestore.v1beta1.RunQueryRequest.new_transaction] was set in the request.
     * If set, no other fields will be set in this response.
     *
     * Generated from protobuf field <code>bytes transaction = 2;</code>
     */
    private $transaction = '';
    /**
     * A query result.
     * Not set when reporting partial progress.
     *
     * Generated from protobuf field <code>.google.firestore.v1beta1.Document document = 1;</code>
     */
    private $document = null;
    /**
     * The time at which the document was read. This may be monotonically
     * increasing; in this case, the previous documents in the result stream are
     * guaranteed not to have changed between their `read_time` and this one.
     * If the query returns no results, a response with `read_time` and no
     * `document` will be sent, and this represents the time at which the query
     * was run.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp read_time = 3;</code>
     */
    private $read_time = null;
    /**
     * The number of results that have been skipped due to an offset between
     * the last response and the current response.
     *
     * Generated from protobuf field <code>int32 skipped_results = 4;</code>
     */
    private $skipped_results = 0;

    /**
     * Constructor.
     *
     * @param array        $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string    $transaction
     *           The transaction that was started as part of this request.
     *           Can only be set in the first response, and only if
     *           [RunQueryRequest.new_transaction][google.firestore.v1beta1.RunQueryRequest.new_transaction] was set in the request.
     *           If set, no other fields will be set in this response.
     *     @type Document  $document
     *           A query result.
     *           Not set when reporting partial progress.
     *     @type Timestamp $read_time
     *           The time at which the document was read. This may be monotonically
     *           increasing; in this case, the previous documents in the result stream are
     *           guaranteed not to have changed between their `read_time` and this one.
     *           If the query returns no results, a response with `read_time` and no
     *           `document` will be sent, and this represents the time at which the query
     *           was run.
     *     @type int       $skipped_results
     *           The number of results that have been skipped due to an offset between
     *           the last response and the current response.
     * }
     */
    public function __construct($data = NULL) {
        Firestore::initOnce();
        parent::__construct($data);
    }

    /**
     * The transaction that was started as part of this request.
     * Can only be set in the first response, and only if
     * [RunQueryRequest.new_transaction][google.firestore.v1beta1.RunQueryRequest.new_transaction] was set in the request.
     * If set, no other fields will be set in this response.
     *
     * Generated from protobuf field <code>bytes transaction = 2;</code>
     * @return string
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * The transaction that was started as part of this request.
     * Can only be set in the first response, and only if
     * [RunQueryRequest.new_transaction][google.firestore.v1beta1.RunQueryRequest.new_transaction] was set in the request.
     * If set, no other fields will be set in this response.
     *
     * Generated from protobuf field <code>bytes transaction = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setTransaction($var)
    {
        GPBUtil::checkString($var, False);
        $this->transaction = $var;

        return $this;
    }

    /**
     * A query result.
     * Not set when reporting partial progress.
     *
     * Generated from protobuf field <code>.google.firestore.v1beta1.Document document = 1;</code>
     *
     * @return Document
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * A query result.
     * Not set when reporting partial progress.
     *
     * Generated from protobuf field <code>.google.firestore.v1beta1.Document document = 1;</code>
     *
     * @param Document $var
     * @return $this
     */
    public function setDocument($var)
    {
        GPBUtil::checkMessage($var, Document::class);
        $this->document = $var;

        return $this;
    }

    /**
     * The time at which the document was read. This may be monotonically
     * increasing; in this case, the previous documents in the result stream are
     * guaranteed not to have changed between their `read_time` and this one.
     * If the query returns no results, a response with `read_time` and no
     * `document` will be sent, and this represents the time at which the query
     * was run.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp read_time = 3;</code>
     * @return Timestamp
     */
    public function getReadTime()
    {
        return $this->read_time;
    }

    /**
     * The time at which the document was read. This may be monotonically
     * increasing; in this case, the previous documents in the result stream are
     * guaranteed not to have changed between their `read_time` and this one.
     * If the query returns no results, a response with `read_time` and no
     * `document` will be sent, and this represents the time at which the query
     * was run.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp read_time = 3;</code>
     * @param Timestamp $var
     * @return $this
     */
    public function setReadTime($var)
    {
        GPBUtil::checkMessage($var, Timestamp::class);
        $this->read_time = $var;

        return $this;
    }

    /**
     * The number of results that have been skipped due to an offset between
     * the last response and the current response.
     *
     * Generated from protobuf field <code>int32 skipped_results = 4;</code>
     * @return int
     */
    public function getSkippedResults()
    {
        return $this->skipped_results;
    }

    /**
     * The number of results that have been skipped due to an offset between
     * the last response and the current response.
     *
     * Generated from protobuf field <code>int32 skipped_results = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setSkippedResults($var)
    {
        GPBUtil::checkInt32($var);
        $this->skipped_results = $var;

        return $this;
    }

}
