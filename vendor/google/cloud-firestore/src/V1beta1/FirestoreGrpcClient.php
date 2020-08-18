<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2017 Google LLC.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.
//
//
namespace Google\Cloud\Firestore\V1beta1;

use Grpc\BaseStub;
use Grpc\Channel;

/**
 * Specification of the Firestore API.
 *
 * The Cloud Firestore service.
 *
 * This service exposes several types of comparable timestamps:
 *
 * *    `create_time` - The time at which a document was created. Changes only
 *      when a document is deleted, then re-created. Increases in a strict
 *       monotonic fashion.
 * *    `update_time` - The time at which a document was last updated. Changes
 *      every time a document is modified. Does not change when a write results
 *      in no modifications. Increases in a strict monotonic fashion.
 * *    `read_time` - The time at which a particular state was observed. Used
 *      to denote a consistent snapshot of the database or the time at which a
 *      Document was observed to not exist.
 * *    `commit_time` - The time at which the writes in a transaction were
 *      committed. Any read with an equal or greater `read_time` is guaranteed
 *      to see the effects of the transaction.
 */
class FirestoreGrpcClient extends BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Gets a single document.
     *
     * @param GetDocumentRequest $argument input argument
     * @param array              $metadata metadata
     * @param array              $options  call options
     */
    public function GetDocument(GetDocumentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.firestore.v1beta1.Firestore/GetDocument',
        $argument,
        ['\Google\Cloud\Firestore\V1beta1\Document', 'decode'],
        $metadata, $options);
    }

    /**
     * Lists documents.
     *
     * @param ListDocumentsRequest $argument input argument
     * @param array                $metadata metadata
     * @param array                $options  call options
     */
    public function ListDocuments(ListDocumentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.firestore.v1beta1.Firestore/ListDocuments',
        $argument,
        ['\Google\Cloud\Firestore\V1beta1\ListDocumentsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Creates a new document.
     *
     * @param CreateDocumentRequest $argument input argument
     * @param array                 $metadata metadata
     * @param array                 $options  call options
     */
    public function CreateDocument(CreateDocumentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.firestore.v1beta1.Firestore/CreateDocument',
        $argument,
        ['\Google\Cloud\Firestore\V1beta1\Document', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates or inserts a document.
     *
     * @param UpdateDocumentRequest $argument input argument
     * @param array                 $metadata metadata
     * @param array                 $options  call options
     */
    public function UpdateDocument(UpdateDocumentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.firestore.v1beta1.Firestore/UpdateDocument',
        $argument,
        ['\Google\Cloud\Firestore\V1beta1\Document', 'decode'],
        $metadata, $options);
    }

    /**
     * Deletes a document.
     *
     * @param DeleteDocumentRequest $argument input argument
     * @param array                 $metadata metadata
     * @param array                 $options  call options
     */
    public function DeleteDocument(DeleteDocumentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.firestore.v1beta1.Firestore/DeleteDocument',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Gets multiple documents.
     *
     * Documents returned by this method are not guaranteed to be returned in the
     * same order that they were requested.
     *
     * @param BatchGetDocumentsRequest $argument input argument
     * @param array                    $metadata metadata
     * @param array                    $options  call options
     */
    public function BatchGetDocuments(BatchGetDocumentsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/google.firestore.v1beta1.Firestore/BatchGetDocuments',
        $argument,
        ['\Google\Cloud\Firestore\V1beta1\BatchGetDocumentsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Starts a new transaction.
     *
     * @param BeginTransactionRequest $argument input argument
     * @param array                   $metadata metadata
     * @param array                   $options  call options
     */
    public function BeginTransaction(BeginTransactionRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.firestore.v1beta1.Firestore/BeginTransaction',
        $argument,
        ['\Google\Cloud\Firestore\V1beta1\BeginTransactionResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Commits a transaction, while optionally updating documents.
     *
     * @param CommitRequest $argument input argument
     * @param array         $metadata metadata
     * @param array         $options  call options
     */
    public function Commit(CommitRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.firestore.v1beta1.Firestore/Commit',
        $argument,
        ['\Google\Cloud\Firestore\V1beta1\CommitResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Rolls back a transaction.
     *
     * @param RollbackRequest $argument input argument
     * @param array           $metadata metadata
     * @param array           $options  call options
     */
    public function Rollback(RollbackRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.firestore.v1beta1.Firestore/Rollback',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * Runs a query.
     *
     * @param RunQueryRequest $argument input argument
     * @param array           $metadata metadata
     * @param array           $options  call options
     */
    public function RunQuery(RunQueryRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/google.firestore.v1beta1.Firestore/RunQuery',
        $argument,
        ['\Google\Cloud\Firestore\V1beta1\RunQueryResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Streams batches of document updates and deletes, in order.
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Write($metadata = [], $options = []) {
        return $this->_bidiRequest('/google.firestore.v1beta1.Firestore/Write',
        ['\Google\Cloud\Firestore\V1beta1\WriteResponse','decode'],
        $metadata, $options);
    }

    /**
     * Listens to changes.
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Listen($metadata = [], $options = []) {
        return $this->_bidiRequest('/google.firestore.v1beta1.Firestore/Listen',
        ['\Google\Cloud\Firestore\V1beta1\ListenResponse','decode'],
        $metadata, $options);
    }

    /**
     * Lists all the collection IDs underneath a document.
     *
     * @param ListCollectionIdsRequest $argument input argument
     * @param array                    $metadata metadata
     * @param array                    $options  call options
     */
    public function ListCollectionIds(ListCollectionIdsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.firestore.v1beta1.Firestore/ListCollectionIds',
        $argument,
        ['\Google\Cloud\Firestore\V1beta1\ListCollectionIdsResponse', 'decode'],
        $metadata, $options);
    }

}
