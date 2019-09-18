<?php

namespace Omnipay\Wayforpay\Message;

use Omnipay\Common\Exception\InvalidRequestException;


class PurchaseRequest extends AbstractRequest
{

    public function getMerchantAccount()
    {
        return $this->getParameter('merchantAccount');
    }

    public function getMerchantDomainName()
    {
        return $this->getParameter('merchantDomainName');
    }

    public function getOrderReference()
    {
        return $this->getParameter('orderReference');
    }

    public function getOrderDate()
    {
        return $this->getParameter('orderDate');
    }

    public function getAmount()
    {
        return $this->getParameter('amount');
    }

    public function getCurrency()
    {
        return $this->getParameter('currency');
    }

    public function getProductName()
    {
        return $this->getParameter('productName');
    }

    public function getProductCount()
    {
        return $this->getParameter('productCount');
    }

    public function getProductPrice()
    {
        return $this->getParameter('productPrice');
    }

    public function getMerchantSignature()
    {
        return $this->getParameter('merchantSignature');
    }


    /**
     * @return array
     * @throws InvalidRequestException
     */

    public function getData()
    {
        $this->validate(
            'merchantAccount',
            'merchantDomainName',
            'orderReference',
            'orderDate',
            'amount',
            'currency',
            'productName',
            'productCount',
            'productPrice',
            'merchantSignature'
        );

        return array(
            'merchantAccount'   => $this->getMerchantAccount(),
            'merchantDomainName'=> $this->getMerchantDomainName(),
            'orderReference'    => $this->getOrderReference(),
            'orderDate'         => $this->getOrderDate(),
            'amount'            => $this->getAmount(),
            'currency'          => $this->getCurrency(),
            'productName'         => $this->getProductName(),
            'productCount'      => $this->getProductCount(),
            'productPrice'            => $this->getProductPrice(),
            'merchantSignature'         => $this->getMerchantSignature(),

        );
    }

    /**
     * @param array $data
     *
     * @return Response
     */
    public function sendData($data)
    {
        return $this->response = new Response($this, $data);
    }
}
