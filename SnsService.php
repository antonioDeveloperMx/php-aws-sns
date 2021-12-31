<?php

namespace  App\Http\Services;
use Aws\Credentials\Credentials;
use Aws\Sns\SnsClient;

class SnsService
{

    public static function SendSms($country_code, $phone, $message){
        $sent = true;
        try {

            $phone_to_send = $country_code . $phone;
            $sms = new SnsClient([
                'version' => '2010-03-31',
                'region' => env('SNS_REGION'),
                'credentials' => new Credentials(
                    env('SNS_KEY'),
                    env('SNS_KEY_SECRET')
                )
            ]);

            $result = $sms->publish([
                'Message' => $message,
                'PhoneNumber' => $phone_to_send,    
                'MessageAttributes' => [
                    'AWS.SNS.SMS.SMSType'  => [
                        'DataType'    => 'String',
                        'StringValue' => 'Transactional',
                    ]
                ],
            ]);
            //var_dump($result->data);
            $sent = true;

        } catch (AwsException $e) {
            $sent = false;
        } 

        return $sent;

    }

}