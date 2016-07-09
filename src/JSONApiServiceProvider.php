<?php
/**
 * Class JSONApiServiceProvider
 *
 * @author Mauro Moreno <moreno.mauro.emanuel@gmail.com>
 */
namespace MauroMoreno\SilexJsonApi;

use \NilPortugues\Api\JsonApi\JsonApiSerializer;
use \NilPortugues\Api\JsonApi\JsonApiTransformer;
use \NilPortugues\Api\Mapping\Mapper;
use \Pimple\ServiceProviderInterface;
use \Pimple\Container;

/**
 * Class JSONApiServiceProvider implements ServiceProviderInterface
 * @package MauroMoreno\SilexJsonApi
 */
class JsonApiServiceProvider implements ServiceProviderInterface
{

    /**
     * {@inheritdoc}
     */
    public function register(Container $app)
    {
        $app['jsonapi.mappers'] =
            isset($app['jsonapi.mappers']) ? $app['jsonapi.mappers'] : null;
        $app['jsonapi.mapper'] = function () use ($app) {
            return new Mapper($app['jsonapi.mappers']);
        };
        $app['jsonapi.transformer'] = function() use ($app) {
            return new JsonApiTransformer($app['jsonapi.mapper']);
        };
        $app['jsonapi'] = function () use ($app) {
            return new JsonApiSerializer($app['jsonapi.transformer']);
        };
    }

    /**
     * {@inheritdoc}
     */
    public function boot(Container $app)
    {

    }

}