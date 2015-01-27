<?php

namespace JamesHalsall\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

/**
 * Raw Json Response.
 *
 * Provides a response object for serving raw JSON response to
 * the client.
 *
 * @package JamesHalsall\Component\HttpFoundation\Response
 * @author  James Halsall <james.t.halsal@googlemail.com>
 */
class RawJsonResponse extends JsonResponse
{
    /**
     * Constructor
     *
     * @param string  $data    The raw JSON data
     * @param integer $status  The status code (defaults to 200)
     * @param array   $headers An array of response headers
     */
    public function __construct($data = null, $status = 200, array $headers = array())
    {
        parent::__construct('', $status, $headers);

        $this->setData($data);
    }

    /**
     * Sets the raw JSON data on the response object
     *
     * @param array|string $data The raw JSON data
     *
     * @return JsonResponse
     */
    public function setData($data = array())
    {
        $this->data = (string) $data;

        $this->update();
    }
}
