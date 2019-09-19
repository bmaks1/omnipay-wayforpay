<?php

namespace Bmaks1\Wayforpay\Message;

use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;

/**
 * Abstract Request
 *
 */
abstract class AbstractRequest extends BaseAbstractRequest
{
    protected $endpoint = 'https://secure.wayforpay.com/pay';


    public function getKey()
    {
        return $this->getParameter('key');
    }

    public function setKey($value)
    {
        return $this->setParameter('key', $value);
    }

    public function sendData($data)
    {
        $url = $this->getEndpoint();
        $response = $this->httpClient->post($url, null, $data);
        $data = json_decode($response->getBody(), true);
        return $this->createResponse($data);
    }


    protected function getEndpoint()
    {
        return $this->endpoint;
    }

    protected function createResponse($data)
    {
        return $this->response = new Response($this, $data);
    }
}
