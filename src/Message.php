<?php

namespace Msgowl\MsgowlSDKPhp;

class Message implements IMessage
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
     * @var array
    */
    protected $to = [];

    /**
     * Create a new instance.
     *
     * @param  String  $msg
     * @param  String  $header
     * @return void
     */
    public function __construct(String $msg, String $header) {
        $this->header = $header?? config('sender_id');
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
     * convert to an Array.
     *
     * @return Array 
     */
    public function toArray(): array {
        return [
            'body' => $this->body,
            'sender_id' => $this->header,
            'recipients' => $this->to,
        ];
    }

    /**
     * convert to JSON.
     *
     * @return String 
     */
    public function toJson(): string {
        return json_encode($this->toArray());
    }
}