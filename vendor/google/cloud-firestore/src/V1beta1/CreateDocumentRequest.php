<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/firestore/v1beta1/firestore.proto

namespace Google\Cloud\Firestore\V1beta1;

use Google\Protobuf\Internal\GPBUtil;
use Google\Protobuf\Internal\Message;
use GPBMetadata\Google\Firestore\V1Beta1\Firestore;

/**
 * The request for [Firestore.CreateDocument][google.firestore.v1beta1.Firestore.CreateDocument].
 *
 * Generated from protobuf message <code>google.firestore.v1beta1.CreateDocumentRequest</code>
 */
class CreateDocumentRequest extends Message
{
    /**
     * Required. The parent resource. For example:
     * `projects/{project_id}/databases/{database_id}/documents` or
     * `projects/{project_id}/databases/{database_id}/documents/chatrooms/{chatroom_id}`
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $parent = '';
    /**
     * Required. The collection ID, relative to `parent`, to list. For example: `chatrooms`.
     *
     * Generated from protobuf field <code>string collection_id = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $collection_id = '';
    /**
     * The client-assigned document ID to use for this document.
     * Optional. If not specified, an ID will be assigned by the service.
     *
     * Generated from protobuf field <code>string document_id = 3;</code>
     */
    private $document_id = '';
    /**
     * Required. The document to create. `name` must not be set.
     *
     * Generated from protobuf field <code>.google.firestore.v1beta1.Document document = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $document = null;
    /**
     * The fields to return. If not set, returns all fields.
     * If the document has a field that is not present in this mask, that field
     * will not be returned in the response.
     *
     * Generated from protobuf field <code>.google.firestore.v1beta1.DocumentMask mask = 5;</code>
     */
    private $mask = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string       $parent
     *           Required. The parent resource. For example:
     *           `projects/{project_id}/databases/{database_id}/documents` or
     *           `projects/{project_id}/databases/{database_id}/documents/chatrooms/{chatroom_id}`
     *     @type string       $collection_id
     *           Required. The collection ID, relative to `parent`, to list. For example: `chatrooms`.
     *     @type string       $document_id
     *           The client-assigned document ID to use for this document.
     *           Optional. If not specified, an ID will be assigned by the service.
     *     @type Document     $document
     *           Required. The document to create. `name` must not be set.
     *     @type DocumentMask $mask
     *           The fields to return. If not set, returns all fields.
     *           If the document has a field that is not present in this mask, that field
     *           will not be returned in the response.
     * }
     */
    public function __construct($data = NULL) {
        Firestore::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The parent resource. For example:
     * `projects/{project_id}/databases/{database_id}/documents` or
     * `projects/{project_id}/databases/{database_id}/documents/chatrooms/{chatroom_id}`
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. The parent resource. For example:
     * `projects/{project_id}/databases/{database_id}/documents` or
     * `projects/{project_id}/databases/{database_id}/documents/chatrooms/{chatroom_id}`
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setParent($var)
    {
        GPBUtil::checkString($var, True);
        $this->parent = $var;

        return $this;
    }

    /**
     * Required. The collection ID, relative to `parent`, to list. For example: `chatrooms`.
     *
     * Generated from protobuf field <code>string collection_id = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getCollectionId()
    {
        return $this->collection_id;
    }

    /**
     * Required. The collection ID, relative to `parent`, to list. For example: `chatrooms`.
     *
     * Generated from protobuf field <code>string collection_id = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setCollectionId($var)
    {
        GPBUtil::checkString($var, True);
        $this->collection_id = $var;

        return $this;
    }

    /**
     * The client-assigned document ID to use for this document.
     * Optional. If not specified, an ID will be assigned by the service.
     *
     * Generated from protobuf field <code>string document_id = 3;</code>
     * @return string
     */
    public function getDocumentId()
    {
        return $this->document_id;
    }

    /**
     * The client-assigned document ID to use for this document.
     * Optional. If not specified, an ID will be assigned by the service.
     *
     * Generated from protobuf field <code>string document_id = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setDocumentId($var)
    {
        GPBUtil::checkString($var, True);
        $this->document_id = $var;

        return $this;
    }

    /**
     * Required. The document to create. `name` must not be set.
     *
     * Generated from protobuf field <code>.google.firestore.v1beta1.Document document = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     *
     * @return Document
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Required. The document to create. `name` must not be set.
     *
     * Generated from protobuf field <code>.google.firestore.v1beta1.Document document = 4 [(.google.api.field_behavior) = REQUIRED];</code>
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
     * The fields to return. If not set, returns all fields.
     * If the document has a field that is not present in this mask, that field
     * will not be returned in the response.
     *
     * Generated from protobuf field <code>.google.firestore.v1beta1.DocumentMask mask = 5;</code>
     *
     * @return DocumentMask
     */
    public function getMask()
    {
        return $this->mask;
    }

    /**
     * The fields to return. If not set, returns all fields.
     * If the document has a field that is not present in this mask, that field
     * will not be returned in the response.
     *
     * Generated from protobuf field <code>.google.firestore.v1beta1.DocumentMask mask = 5;</code>
     *
     * @param DocumentMask $var
     * @return $this
     */
    public function setMask($var)
    {
        GPBUtil::checkMessage($var, DocumentMask::class);
        $this->mask = $var;

        return $this;
    }

}
