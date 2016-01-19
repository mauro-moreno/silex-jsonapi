<?php

namespace MauroMoreno\SilexJsonApi;

use Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory;
use NilPortugues\Api\JsonApi\Http\Response\ResourceCreated;
use NilPortugues\Api\JsonApi\Http\Response\ResourceDeleted;
use NilPortugues\Api\JsonApi\Http\Response\ResourceNotFound;
use NilPortugues\Api\JsonApi\Http\Response\ResourceProcessing;
use NilPortugues\Api\JsonApi\Http\Response\ResourceUpdated;
use NilPortugues\Api\JsonApi\Http\Response\Response;
use NilPortugues\Api\JsonApi\Http\Response\UnsupportedAction;

trait JsonApiResponseTrait
{
    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function addHeaders(\Psr\Http\Message\ResponseInterface $response)
    {
        return $response;
    }

    /**
     * @param string $json
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function resourceCreatedResponse($json)
    {
        return (new HttpFoundationFactory())
            ->createResponse($this->addHeaders(new ResourceCreated($json)));
    }

    /**
     * @param string $json
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function resourceDeletedResponse($json)
    {
        return (new HttpFoundationFactory())
            ->createResponse($this->addHeaders(new ResourceDeleted($json)));
    }

    /**
     * @param string $json
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function resourceNotFoundResponse($json)
    {
        return (new HttpFoundationFactory())
            ->createResponse($this->addHeaders(new ResourceNotFound($json)));
    }

    /**
     * @param string $json
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function resourceProcessingResponse($json)
    {
        return (new HttpFoundationFactory())
            ->createResponse($this->addHeaders(new ResourceProcessing($json)));
    }

    /**
     * @param string $json
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function resourceUpdatedResponse($json)
    {
        return (new HttpFoundationFactory())
            ->createResponse($this->addHeaders(new ResourceUpdated($json)));
    }

    /**
     * @param string $json
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function response($json)
    {
        return (new HttpFoundationFactory())
            ->createResponse($this->addHeaders(new Response($json)));
    }

    /**
     * @param string $json
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function unsupportedActionResponse($json)
    {
        return (new HttpFoundationFactory())
            ->createResponse($this->addHeaders(new UnsupportedAction($json)));
    }
}