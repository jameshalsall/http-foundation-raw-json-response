<?php

namespace JamesHalsall\Component\HttpFoundation\Tests\Response;

use JamesHalsall\Component\HttpFoundation\Response\RawJsonResponse;

/**
 * RawJsonResponse tests
 *
 * @package JamesHalsall\Component\HttpFoundation\Tests\Response
 * @author  James Halsall <james.t.halsall@googlemail.com>
 */
class RawJsonResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getRawJsonData
     */
    public function testConstructor($data)
    {
        $response = new RawJsonResponse($data);

        $this->assertEquals(RawJsonResponse::HTTP_OK, $response->getStatusCode());
        $this->assertEquals($data, $response->getContent());
    }

    /**
     * @dataProvider getRawJsonData
     */
    public function testConstructorWithStatusCode($data)
    {
        $response = new RawJsonResponse($data, RawJsonResponse::HTTP_FORBIDDEN);

        $this->assertEquals(RawJsonResponse::HTTP_FORBIDDEN, $response->getStatusCode());
        $this->assertEquals($data, $response->getContent());
    }

    /**
     * @dataProvider getRawJsonData
     */
    public function testSetData($data)
    {
        $response = new RawJsonResponse();
        $response->setData($data);
        $this->assertEquals($data, $response->getContent());
    }

    /**
     * @return array
     */
    public function getRawJsonData()
    {
        $data = array(
            'property' => 1,
            'hello' => 'something',
            'object' => new \stdClass()
        );
        return [
            [json_encode($data)]
        ];
    }
}
