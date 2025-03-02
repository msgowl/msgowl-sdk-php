<?php

namespace Msgowl\MsgowlSDKPhp;

class OTPMessage implements IMessage
{
    /**
     * Mesasge phone number 
     * @var string
    */
    protected $phoneNumber;

    /**
     * Mesasge code 
     * @var string
    */
    protected $code;

    /**
     * Mesasge length 
     * @var int
    */
    protected $length;

    /**
     * Create a new instance.
     *
     * @param  String  $header
     * @param  String  $msg
     * @return void
     */
    public function __construct(String $phoneNumber, ?int $length = null, ?String $code = null) {
        $this->phoneNumber = $phoneNumber;
        $this->length = $length;
        $this->code = $code;
    }

    /**
     * convert to an Array.
     *
     * @return Array 
     */
    public function toArray(): array {
        return [
            'phone_number' => $this->phoneNumber,
            'code' => $this->code,
            'code_length' => $this->length,
        ];
    }

    /**
     * convert to JSON.
     *
     * @return String 
     */
    public function toJson(): string {
        $filteredData = array_filter($this->toArray(), function($value) {
            return $value !== "" && $value !== null;
        });
        return json_encode($filteredData);
    }
}