<?php

namespace Msgowl\MsgowlSDKPhp;

use GuzzleHttp\Psr7\Response;

class MsgowlResponse
{
    /**
     * Guzzle response 
     * @var GuzzleHttp\Psr7\Response;
    */
    protected $response;

    /**
     * Response status 
     * @var number
    */
    protected $status;

    /**
     * Response reason 
     * @var string
    */
    protected $reason;

    /**
     * Create a new instance.
     *
     * @param  GuzzleHttp\Psr7\Response $response
     * @return void
     */
    public function __construct(Response $response) {
        $this->response = $response;
        $this->status = $response->getStatusCode();
        $this->reason = $response->getReasonPhrase();
    }

    /**
     * determine if request succeeded or failed
     *
     * @return Boolean
     */
    public function failed() {
        return !in_array($this->status, [200, 201]);
    }

    /**
     * get response data
     *
     * @return String 
     */
    public function getBody() {
        return json_decode($this->response->getBody());
    }
}