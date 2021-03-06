<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/api/servicecontrol/v1/service_controller.proto

namespace Google\Api\Servicecontrol\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\GPBUtil;
use Google\Protobuf\Internal\Message;
use Google\Protobuf\Internal\RepeatedField;
use GPBMetadata\Google\Api\Servicecontrol\V1\ServiceController;

/**
 * Request message for the Report method.
 *
 * Generated from protobuf message <code>google.api.servicecontrol.v1.ReportRequest</code>
 */
class ReportRequest extends Message
{
    /**
     * The service name as specified in its service configuration. For example,
     * `"pubsub.googleapis.com"`.
     * See
     * [google.api.Service](https://cloud.google.com/service-management/reference/rpc/google.api#google.api.Service)
     * for the definition of a service name.
     *
     * Generated from protobuf field <code>string service_name = 1;</code>
     */
    private $service_name = '';
    /**
     * Operations to be reported.
     * Typically the service should report one operation per request.
     * Putting multiple operations into a single request is allowed, but should
     * be used only when multiple operations are natually available at the time
     * of the report.
     * If multiple operations are in a single request, the total request size
     * should be no larger than 1MB. See
     * [ReportResponse.report_errors][google.api.servicecontrol.v1.ReportResponse.report_errors]
     * for partial failure behavior.
     *
     * Generated from protobuf field <code>repeated .google.api.servicecontrol.v1.Operation operations = 2;</code>
     */
    private $operations;
    /**
     * Specifies which version of service config should be used to process the
     * request.
     * If unspecified or no matching version can be found, the
     * latest one will be used.
     *
     * Generated from protobuf field <code>string service_config_id = 3;</code>
     */
    private $service_config_id = '';

    /**
     * Constructor.
     *
     * @param array                        $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string                    $service_name
     *           The service name as specified in its service configuration. For example,
     *           `"pubsub.googleapis.com"`.
     *           See
     *           [google.api.Service](https://cloud.google.com/service-management/reference/rpc/google.api#google.api.Service)
     *           for the definition of a service name.
     *     @type Operation[]|RepeatedField $operations
     *           Operations to be reported.
     *           Typically the service should report one operation per request.
     *           Putting multiple operations into a single request is allowed, but should
     *           be used only when multiple operations are natually available at the time
     *           of the report.
     *           If multiple operations are in a single request, the total request size
     *           should be no larger than 1MB. See
     *           [ReportResponse.report_errors][google.api.servicecontrol.v1.ReportResponse.report_errors]
     *           for partial failure behavior.
     *     @type string                    $service_config_id
     *           Specifies which version of service config should be used to process the
     *           request.
     *           If unspecified or no matching version can be found, the
     *           latest one will be used.
     * }
     */
    public function __construct($data = NULL) {
        ServiceController::initOnce();
        parent::__construct($data);
    }

    /**
     * The service name as specified in its service configuration. For example,
     * `"pubsub.googleapis.com"`.
     * See
     * [google.api.Service](https://cloud.google.com/service-management/reference/rpc/google.api#google.api.Service)
     * for the definition of a service name.
     *
     * Generated from protobuf field <code>string service_name = 1;</code>
     * @return string
     */
    public function getServiceName()
    {
        return $this->service_name;
    }

    /**
     * The service name as specified in its service configuration. For example,
     * `"pubsub.googleapis.com"`.
     * See
     * [google.api.Service](https://cloud.google.com/service-management/reference/rpc/google.api#google.api.Service)
     * for the definition of a service name.
     *
     * Generated from protobuf field <code>string service_name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setServiceName($var)
    {
        GPBUtil::checkString($var, True);
        $this->service_name = $var;

        return $this;
    }

    /**
     * Operations to be reported.
     * Typically the service should report one operation per request.
     * Putting multiple operations into a single request is allowed, but should
     * be used only when multiple operations are natually available at the time
     * of the report.
     * If multiple operations are in a single request, the total request size
     * should be no larger than 1MB. See
     * [ReportResponse.report_errors][google.api.servicecontrol.v1.ReportResponse.report_errors]
     * for partial failure behavior.
     *
     * Generated from protobuf field <code>repeated .google.api.servicecontrol.v1.Operation operations = 2;</code>
     *
     * @return RepeatedField
     */
    public function getOperations()
    {
        return $this->operations;
    }

    /**
     * Operations to be reported.
     * Typically the service should report one operation per request.
     * Putting multiple operations into a single request is allowed, but should
     * be used only when multiple operations are natually available at the time
     * of the report.
     * If multiple operations are in a single request, the total request size
     * should be no larger than 1MB. See
     * [ReportResponse.report_errors][google.api.servicecontrol.v1.ReportResponse.report_errors]
     * for partial failure behavior.
     *
     * Generated from protobuf field <code>repeated .google.api.servicecontrol.v1.Operation operations = 2;</code>
     *
     * @param Operation[]|RepeatedField $var
     * @return $this
     */
    public function setOperations($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, GPBType::MESSAGE, Operation::class);
        $this->operations = $arr;

        return $this;
    }

    /**
     * Specifies which version of service config should be used to process the
     * request.
     * If unspecified or no matching version can be found, the
     * latest one will be used.
     *
     * Generated from protobuf field <code>string service_config_id = 3;</code>
     * @return string
     */
    public function getServiceConfigId()
    {
        return $this->service_config_id;
    }

    /**
     * Specifies which version of service config should be used to process the
     * request.
     * If unspecified or no matching version can be found, the
     * latest one will be used.
     *
     * Generated from protobuf field <code>string service_config_id = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setServiceConfigId($var)
    {
        GPBUtil::checkString($var, True);
        $this->service_config_id = $var;

        return $this;
    }

}

