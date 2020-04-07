<?php

namespace Icernn03\Msgowl;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use Message;
use MsgowlResponse;

class Msgowl
{
    /**
     * API Url.
     *
     * @var String
     */
    protected $api_url = 'https://rest.msgowl.com';
    /**
     * Guzzle instance.
     *
     * @var \GuzzleHttp\Client\Client
     */
    protected $client;

    /**
     * Create a new instance.
     *
     * @param  String  $token
     * @return void
     */
    public function __construct(String $token) {
        // create a new guzzle instance
        $this->client = new Client([
            'base_uri' => $this->api_url,
            'headers' => [
                'Authorization' => "bearer $token"
            ],
        ]);

    }

    /**
     * Send a new message.
     *
     * @param  \Icernn03\Msgowl\Message  $message
     * @return \Icernn03\Msgowl\MsgowlResponse
     */
    public function send(Message $message) {
        $resp = $this->client->post($message);
        return new MsgowlResponse($resp);
    }
}
