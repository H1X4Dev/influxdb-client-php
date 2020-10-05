<?php
/**
 * SecretsService
 * PHP version 5
 *
 * @category Class
 * @package  InfluxDB2
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Influx API Service
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * OpenAPI spec version: 0.1.0
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 3.3.4
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace InfluxDB2\Service;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use InfluxDB2\ApiException;
use InfluxDB2\Configuration;
use InfluxDB2\HeaderSelector;
use InfluxDB2\ObjectSerializer;

/**
 * SecretsService Class Doc Comment
 *
 * @category Class
 * @package  InfluxDB2
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class SecretsService
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getOrgsIDSecrets
     *
     * List all secret keys for an organization
     *
     * @param  string $org_id The organization ID. (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InfluxDB2\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \InfluxDB2\Model\SecretKeysResponse|\InfluxDB2\Model\Error
     */
    public function getOrgsIDSecrets($org_id, $zap_trace_span = null)
    {
        list($response) = $this->getOrgsIDSecretsWithHttpInfo($org_id, $zap_trace_span);
        return $response;
    }

    /**
     * Operation getOrgsIDSecretsWithHttpInfo
     *
     * List all secret keys for an organization
     *
     * @param  string $org_id The organization ID. (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InfluxDB2\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \InfluxDB2\Model\SecretKeysResponse|\InfluxDB2\Model\Error, HTTP status code, HTTP response headers (array of strings)
     */
    public function getOrgsIDSecretsWithHttpInfo($org_id, $zap_trace_span = null)
    {
        $request = $this->getOrgsIDSecretsRequest($org_id, $zap_trace_span);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            switch($statusCode) {
                case 200:
                    if ('\InfluxDB2\Model\SecretKeysResponse' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\InfluxDB2\Model\SecretKeysResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('\InfluxDB2\Model\Error' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\InfluxDB2\Model\Error', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\InfluxDB2\Model\SecretKeysResponse';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\InfluxDB2\Model\SecretKeysResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\InfluxDB2\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getOrgsIDSecretsAsync
     *
     * List all secret keys for an organization
     *
     * @param  string $org_id The organization ID. (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getOrgsIDSecretsAsync($org_id, $zap_trace_span = null)
    {
        return $this->getOrgsIDSecretsAsyncWithHttpInfo($org_id, $zap_trace_span)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getOrgsIDSecretsAsyncWithHttpInfo
     *
     * List all secret keys for an organization
     *
     * @param  string $org_id The organization ID. (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getOrgsIDSecretsAsyncWithHttpInfo($org_id, $zap_trace_span = null)
    {
        $returnType = '\InfluxDB2\Model\SecretKeysResponse';
        $request = $this->getOrgsIDSecretsRequest($org_id, $zap_trace_span);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getOrgsIDSecrets'
     *
     * @param  string $org_id The organization ID. (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getOrgsIDSecretsRequest($org_id, $zap_trace_span = null)
    {
        // verify the required parameter 'org_id' is set
        if ($org_id === null || (is_array($org_id) && count($org_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $org_id when calling getOrgsIDSecrets'
            );
        }

        $resourcePath = '/api/v2/orgs/{orgID}/secrets';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($zap_trace_span !== null) {
            $headerParams['Zap-Trace-Span'] = ObjectSerializer::toHeaderValue($zap_trace_span);
        }

        // path params
        if ($org_id !== null) {
            $resourcePath = str_replace(
                '{' . 'orgID' . '}',
                ObjectSerializer::toPathValue($org_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation patchOrgsIDSecrets
     *
     * Update secrets in an organization
     *
     * @param  string $org_id The organization ID. (required)
     * @param  map[string,string] $request_body Secret key value pairs to update/add (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InfluxDB2\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function patchOrgsIDSecrets($org_id, $request_body, $zap_trace_span = null)
    {
        $this->patchOrgsIDSecretsWithHttpInfo($org_id, $request_body, $zap_trace_span);
    }

    /**
     * Operation patchOrgsIDSecretsWithHttpInfo
     *
     * Update secrets in an organization
     *
     * @param  string $org_id The organization ID. (required)
     * @param  map[string,string] $request_body Secret key value pairs to update/add (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InfluxDB2\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function patchOrgsIDSecretsWithHttpInfo($org_id, $request_body, $zap_trace_span = null)
    {
        $request = $this->patchOrgsIDSecretsRequest($org_id, $request_body, $zap_trace_span);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\InfluxDB2\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation patchOrgsIDSecretsAsync
     *
     * Update secrets in an organization
     *
     * @param  string $org_id The organization ID. (required)
     * @param  map[string,string] $request_body Secret key value pairs to update/add (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchOrgsIDSecretsAsync($org_id, $request_body, $zap_trace_span = null)
    {
        return $this->patchOrgsIDSecretsAsyncWithHttpInfo($org_id, $request_body, $zap_trace_span)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation patchOrgsIDSecretsAsyncWithHttpInfo
     *
     * Update secrets in an organization
     *
     * @param  string $org_id The organization ID. (required)
     * @param  map[string,string] $request_body Secret key value pairs to update/add (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchOrgsIDSecretsAsyncWithHttpInfo($org_id, $request_body, $zap_trace_span = null)
    {
        $returnType = '';
        $request = $this->patchOrgsIDSecretsRequest($org_id, $request_body, $zap_trace_span);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'patchOrgsIDSecrets'
     *
     * @param  string $org_id The organization ID. (required)
     * @param  map[string,string] $request_body Secret key value pairs to update/add (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function patchOrgsIDSecretsRequest($org_id, $request_body, $zap_trace_span = null)
    {
        // verify the required parameter 'org_id' is set
        if ($org_id === null || (is_array($org_id) && count($org_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $org_id when calling patchOrgsIDSecrets'
            );
        }
        // verify the required parameter 'request_body' is set
        if ($request_body === null || (is_array($request_body) && count($request_body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $request_body when calling patchOrgsIDSecrets'
            );
        }

        $resourcePath = '/api/v2/orgs/{orgID}/secrets';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($zap_trace_span !== null) {
            $headerParams['Zap-Trace-Span'] = ObjectSerializer::toHeaderValue($zap_trace_span);
        }

        // path params
        if ($org_id !== null) {
            $resourcePath = str_replace(
                '{' . 'orgID' . '}',
                ObjectSerializer::toPathValue($org_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($request_body)) {
            $_tempBody = $request_body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PATCH',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation postOrgsIDSecrets
     *
     * Delete secrets from an organization
     *
     * @param  string $org_id The organization ID. (required)
     * @param  \InfluxDB2\Model\SecretKeys $secret_keys Secret key to delete (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InfluxDB2\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function postOrgsIDSecrets($org_id, $secret_keys, $zap_trace_span = null)
    {
        $this->postOrgsIDSecretsWithHttpInfo($org_id, $secret_keys, $zap_trace_span);
    }

    /**
     * Operation postOrgsIDSecretsWithHttpInfo
     *
     * Delete secrets from an organization
     *
     * @param  string $org_id The organization ID. (required)
     * @param  \InfluxDB2\Model\SecretKeys $secret_keys Secret key to delete (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InfluxDB2\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function postOrgsIDSecretsWithHttpInfo($org_id, $secret_keys, $zap_trace_span = null)
    {
        $request = $this->postOrgsIDSecretsRequest($org_id, $secret_keys, $zap_trace_span);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\InfluxDB2\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation postOrgsIDSecretsAsync
     *
     * Delete secrets from an organization
     *
     * @param  string $org_id The organization ID. (required)
     * @param  \InfluxDB2\Model\SecretKeys $secret_keys Secret key to delete (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postOrgsIDSecretsAsync($org_id, $secret_keys, $zap_trace_span = null)
    {
        return $this->postOrgsIDSecretsAsyncWithHttpInfo($org_id, $secret_keys, $zap_trace_span)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation postOrgsIDSecretsAsyncWithHttpInfo
     *
     * Delete secrets from an organization
     *
     * @param  string $org_id The organization ID. (required)
     * @param  \InfluxDB2\Model\SecretKeys $secret_keys Secret key to delete (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postOrgsIDSecretsAsyncWithHttpInfo($org_id, $secret_keys, $zap_trace_span = null)
    {
        $returnType = '';
        $request = $this->postOrgsIDSecretsRequest($org_id, $secret_keys, $zap_trace_span);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'postOrgsIDSecrets'
     *
     * @param  string $org_id The organization ID. (required)
     * @param  \InfluxDB2\Model\SecretKeys $secret_keys Secret key to delete (required)
     * @param  string $zap_trace_span OpenTracing span context (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function postOrgsIDSecretsRequest($org_id, $secret_keys, $zap_trace_span = null)
    {
        // verify the required parameter 'org_id' is set
        if ($org_id === null || (is_array($org_id) && count($org_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $org_id when calling postOrgsIDSecrets'
            );
        }
        // verify the required parameter 'secret_keys' is set
        if ($secret_keys === null || (is_array($secret_keys) && count($secret_keys) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $secret_keys when calling postOrgsIDSecrets'
            );
        }

        $resourcePath = '/api/v2/orgs/{orgID}/secrets/delete';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($zap_trace_span !== null) {
            $headerParams['Zap-Trace-Span'] = ObjectSerializer::toHeaderValue($zap_trace_span);
        }

        // path params
        if ($org_id !== null) {
            $resourcePath = str_replace(
                '{' . 'orgID' . '}',
                ObjectSerializer::toPathValue($org_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($secret_keys)) {
            $_tempBody = $secret_keys;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}