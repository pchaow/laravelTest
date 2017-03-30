<?php

namespace App\Soaps;

use Artisaninweb\SoapWrapper\SoapWrapper;

class UPSoapController
{
    /**
     * @var SoapWrapper
     */
    protected $soapWrapper;

    /**
     * SoapController constructor.
     *
     * @param SoapWrapper $soapWrapper
     */
    public function __construct(SoapWrapper $soapWrapper)
    {
        $this->soapWrapper = $soapWrapper;
    }

    public function login($username, $password)
    {
        $this->soapWrapper->add('AuthenService', function ($service) {
            $service
                ->wsdl('https://ws.up.ac.th/mobile/AuthenService.asmx?WSDL')
                ->trace(true);
        });

        $response = $this->soapWrapper->call('AuthenService.Login', [
            'Login' => [
                'username' => base64_encode($username),
                'password' => base64_encode($password),
                'ProductName' => 'decaffair_student',
            ]
        ]);

        return $response;
    }

}