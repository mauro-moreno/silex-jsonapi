<?php
/**
 * Class JSONApiServiceProvider
 *
 * @author Mauro Moreno <moreno.mauro.emanuel@gmail.com>
 */
namespace MauroMoreno\JSONApi;

use \Silex\ServiceProviderInterface;
use \Silex\Application;

/**
 * Class JSONApiServiceProvider implements ServiceProviderInterface
 * @package MauroMoreno\JSONApi
 */
class JSONApiServiceProvider implements ServiceProviderInterface
{

    /**
     * Register JSONApi
     *
     * @param Application $app
     */
    public function register(Application $app)
    {
        $app['jsonapi'] = function () use ($app) {
            return new JSONApi;
        };
    }

    /**
     * Boot
     *
     * @param Application $app
     */
    public function boot(Application $app)
    {

    }

}