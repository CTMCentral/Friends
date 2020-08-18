<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// Copyright 2019 Google LLC
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
namespace Google\Cloud\Firestore\V1;

use Grpc\BaseStub;
use Grpc\Channel;

/**
 * Specification of the Firestore API.
 *
 * The Cloud Firestore service.
 *
 * Cloud Firestore is a fast, fully managed, serverless, cloud-native NoSQL
 * document database that simplifies storing, syncing, and querying data for
 * your mobile, web, and IoT apps at global scale. Its client libraries provide
 * live synchronization and offline support, while its security features and
 * integrations with Firebase and Google Cloud Platform (GCP) accelerate
 * building truly serverless apps.
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
        return $this->_simpleRequest('/google.firestore.v1.Firestore/GetDocument',
        $argument,
        ['\Google\Cloud\Firestore\V1\Document', 'decode'],
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
        return $this->_simpleRequest('/google.firestore.v1.Firestore/ListDocuments',
        $argument,
        ['\Google\Cloud\Firestore\V1\ListDocumentsResponse', 'decode'],
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
        return $this->_simpleRequest('/google.firestore.v1.Firestore/UpdateDocument',
        $argument,
        ['\Google\Cloud\Firestore\V1\Document', 'decode'],
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
        return $this->_simpleRequest('/google.firestore.v1.Firestore/DeleteDocument',
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
        return $this->_serverStreamRequest('/google.firestore.v1.Firestore/BatchGetDocuments',
        $argument,
        ['\Google\Cloud\Firestore\V1\BatchGetDocumentsResponse', 'decode'],
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
        return $this->_simpleRequest('/google.firestore.v1.Firestore/BeginTransaction',
        $argument,
        ['\Google\Cloud\Firestore\V1\BeginTransactionResponse', 'decode'],
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
        return $this->_simpleRequest('/google.firestore.v1.Firestore/Commit',
        $argument,
        ['\Google\Cloud\Firestore\V1\CommitResponse', 'decode'],
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
        return $this->_simpleRequest('/google.firestore.v1.Firestore/Rollback',
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
        return $this->_serverStreamRequest('/google.firestore.v1.Firestore/RunQuery',
        $argument,
        ['\Google\Cloud\Firestore\V1\RunQueryResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Partitions a query by returning partition cursors that can be used to run
     * the query in parallel. The returned partition cursors are split points that
     * can be used by RunQuery as starting/end points for the query results.
     *
     * @param PartitionQueryRequest $argument input argument
     * @param array                 $metadata metadata
     * @param array                 $options  call options
     */
    public function PartitionQuery(PartitionQueryRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.firestore.v1.Firestore/PartitionQuery',
        $argument,
        ['\Google\Cloud\Firestore\V1\PartitionQueryResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Streams batches of document updates and deletes, in order.
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Write($metadata = [], $options = []) {
        return $this->_bidiRequest('/google.firestore.v1.Firestore/Write',
        ['\Google\Cloud\Firestore\V1\WriteResponse','decode'],
        $metadata, $options);
    }

    /**
     * Listens to changes.
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Listen($metadata = [], $options = []) {
        return $this->_bidiRequest('/google.firestore.v1.Firestore/Listen',
        ['\Google\Cloud\Firestore\V1\ListenResponse','decode'],
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
        return $this->_simpleRequest('/google.firestore.v1.Firestore/ListCollectionIds',
        $argument,
        ['\Google\Cloud\Firestore\V1\ListCollectionIdsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Applies a batch of write operations.
     *
     * The BatchWrite method does not apply the write operations atomically
     * and can apply them out of order. Method does not allow more than one write
     * per document. Each write succeeds or fails independently. See the
     * [BatchWriteResponse][google.firestore.v1.BatchWriteResponse] for the success status of each write.
     *
     * If you require an atomically applied set of writes, use
     * [Commit][google.firestore.v1.Firestore.Commit] instead.
     *
     * @param BatchWriteRequest $argument input argument
     * @param array             $metadata metadata
     * @param array             $options  call options
     */
    public function BatchWrite(BatchWriteRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/google.firestore.v1.Firestore/BatchWrite',
        $argument,
        ['\Google\Cloud\Firestore\V1\BatchWriteResponse', 'decode'],
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
        return $this->_simpleRequest('/google.firestore.v1.Firestore/CreateDocument',
        $argument,
        ['\Google\Cloud\Firestore\V1\Document', 'decode'],
        $metadata, $options);
    }

}
