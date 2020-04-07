<?php

namespace Icernn03\Msgowl;

class Message
{
    /**
     * Mesasge body 
     * @var string
    */
    protected $body;

    /**
     * Mesasge header 
     * @var string
    */
    protected $header;

    /**
     * Mesasge to 
     * @var string
    */
    protected $to = [];

    /**
     * Create a new instance.
     *
     * @param  String  $header
     * @param  String  $msg
     * @return void
     */
    public function __construct(String $header, String $msg) {
        $this->header = $header;
        $this->body = $msg;
    }

    /**
     * add to sending list.
     *
     * @param  String | Array  $number
     * @return Message
     */
    public function to($number) {
        if (is_array($number)) {
            array_merge($this->to, $number);
        } if (is_string($number)) {
            array_push($this->to, $number);
        }
        return $this;
    }

    /**
     * convert to JSON.
     *
     * @return String 
     */
    public function toJson() {
        return json_encode([
            'body' => $this->body,
            'sender_id' => $this->header,
            'recipients' => $this->to,
        ]);
    }
}