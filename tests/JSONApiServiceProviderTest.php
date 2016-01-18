<?php
/**
 * Class JSONAPiProviderTest
 *
 * @author Mauro Moreno <moreno.mauro.emanuel@gmail.com>
 */
use \Silex\Application;
use \MauroMoreno\JSONApi\JSONApiServiceProvider;

/**
 * Class JSONApiServiceProviderTest
 */
class JSONApiServiceProviderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test Json Method
     */
    public function testJsonMethod()
    {
        $app = new Application;
        $app->register(new JSONApiServiceProvider);

        $response = $app['jsonapi']->json(['foo' => 'bar']);
        $this->assertEquals('{"foo":"bar"}', $response->getContent());
        $this->assertEquals(
            'application/vnd.api+json',
            $response->headers->get('Content-Type')
        );
    }

    /**
     * Test Error Method
     */
    public function testErrorMethod()
    {
        $app = new Application;
        $app->register(new JSONApiServiceProvider);

        // Empty errors
        $response = $app['jsonapi']->error([]);
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertEquals('{"errors":[]}', $response->getContent());

        // Filled errors
        $response = $app['jsonapi']->error([['id' => 1]]);
        $json_response = json_decode($response->getContent());
        $this->assertEquals(1, $json_response->errors[0]->id);
    }

}