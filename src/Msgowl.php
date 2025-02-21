<?php

namespace Msgowl\MsgowlSDKPhp;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

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
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Create a new instance.
     *
     * @param  String  $token
     * @return void
     */
    public function __construct() {
        // create a new guzzle instance
        $token = config('msgowl.api_token');
        $this->client = new Client([
            'base_uri' => $this->api_url,
            'headers' => [
                'Authorization' => "bearer $token"
            ],
        ]);

    }

    /**
     * submit API request
     * @param \GuzzleHttp\Request $request
     * @param Mixed $data
     * @return Msgowl\MsgowlSDKPhp\MsgowlResponse
     */
    public function submit(Request $request, $data) {
        try {
            $resp = $this->client->send($request, [ 'json' => $data ]);
            return new MsgowlResponse($resp);
        } catch (ClientException $e) {
            return new MsgowlResponse($e->getResponse());
        } catch (ServerException $e) {
            return new MsgowlResponse($e->getResponse());
        }
    }


    /**
     * Send a new message.
     *
     * @param  Msgowl\MsgowlSDKPhp\Message  $message
     * @return Msgowl\MsgowlSDKPhp\MsgowlResponse
     */
    public function send(IMessage $message) {
        $req = new Request('POST', '/messages');
        $data = $message->toArray();
        return $this->submit($req, $message->toArray());
    }
}
