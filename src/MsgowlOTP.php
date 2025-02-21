<?php

namespace Msgowl\MsgowlSDKPhp;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class MsgowlOTP
{
    /**
     * API Url.
     *
     * @var String
     */
    protected $otp_url = 'https://otp.msgowl.com';
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
        $token = config('msgowl.otp_key');
        $this->client = new Client([
            'base_uri' => $this->otp_url,
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
     * Send a new OTP message.
     *
     * @param  Msgowl\MsgowlSDKPhp\OTPMessage  $message
     * @return Msgowl\MsgowlSDKPhp\MsgowlResponse
     */
    public function send(IMessage $message) {
        $req = new Request('POST', '/send');
        return $this->submit($req, $message->toArray());
    }

    /**
     * Verify OTP message.
     *
     * @param  Msgowl\MsgowlSDKPhp\OTPMessage  $message
     * @return Msgowl\MsgowlSDKPhp\MsgowlResponse
     */
    public function verify(IMessage $message) {
        $req = new Request('POST', '/verify');
        return $this->submit($req, $message->toArray());
    }
}
