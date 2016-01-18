<?php
/**
 * Class JSONApi
 *
 * @author Mauro Moreno <moreno.mauro.emanuel@gmail.com>
 */
namespace MauroMoreno\JSONApi;

use \Symfony\Component\HttpFoundation\JsonResponse;
use \MauroMoreno\JSONApi\Model\Error;
use \JMS\Serializer\SerializerBuilder;

/**
 * Class JSONApi
 * @package MauroMoreno\JSONApi
 */
class JSONApi
{

    /**
     * Content-Type Header
     */
    const HEADER_CONTENT_TYPE = 'application/vnd.api+json';

    /**
     * Errors array
     * @var array
     */
    protected $_errors = array();

    /**
     * Json Method
     *
     * @param $data
     * @param int $status
     * @param array $headers
     * @return JsonResponse
     */
    public function json($data, $status = 200, $headers = [])
    {
        $headers['Content-Type'] = self::HEADER_CONTENT_TYPE;
        return new JsonResponse($data, $status, $headers);
    }

    /**
     * Error Method
     *
     * @param array $errors
     * @param int $status
     * @return JsonResponse
     */
    public function error($errors = [], $status = 404)
    {
        foreach ($errors as $error) {
            $this->_errors[] = new Error($error);
        }
        return $this->json(['errors' => $this->_errors], $status);
    }

}