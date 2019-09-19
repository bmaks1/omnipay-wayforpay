<?php

namespace Bmaks1\Wayforpay;

use Omnipay\Common\AbstractGateway;

/**
 * Wayforpay Gateway
 */
class WayforpayGateway extends AbstractGateway
{
    public function getName()
    {
        return 'Wayforpay';
    }

    public function getDefaultParameters()
    {
        return array(
            'merchantSecretKey' => 'flk3409refn54t54t*FNJRET',
            'merchantAccount' => 'test_merch_n1',
            'merchantAuthType' => 'SimpleSignature',
            'merchantDomainName' => '',
            'merchantTransactionType' => 'AUTO',
            'merchantTransactionSecureType' => 'AUTO',
            'merchantSignature' => '',
            'language' => 'AUTO',
            'returnUrl' => '',
            'serviceUrl' => '',
            'orderDate' => '',
            'orderNo' => '',
            'amount' => '',
            'currency' => '',
            'alternativeAmount' => '',
            'alternativeCurrency' => '',
            'holdTimeout' => '',
            'orderLifetime' => '',
            'recToken' => '',
            'productName' => [],
            'productPrice' => [],
            'productCount' => [],
            'clientAccountId' => '',
            'socialUri' => '',
            'clientFirstName' => '',
            'clientLastName' => '',
            'clientAddress' => '',
            'clientCity' => '',
            'clientState' => '',
            'clientZipCode' => '',
        );
    }

    public function getMerchantSecretKey()
    {
        return $this->getParameter('merchantSecretKey');
    }

    public function setMerchantSecretKey($value)
    {
        return $this->setParameter('merchantSecretKey', $value);
    }

    public function getMerchantAccount()
    {
        return $this->getParameter('merchantAccount');
    }

    public function setMerchantAccount($value)
    {
        return $this->setParameter('merchantAccount', $value);
    }



    public function getMerchantDomainName()
    {
        return $this->getParameter('merchantDomainName');
    }

    public function setMerchantDomainName($value)
    {
        return $this->setParameter('merchantDomainName', $value);
    }



    public function getOrderReference()
    {
        return $this->getParameter('orderReference');
    }

    public function setOrderReference($value)
    {
        return $this->setParameter('orderReference', $value);
    }



    public function getOrderDate()
    {
        return $this->getParameter('orderDate');
    }

    public function setOrderDate($value)
    {
        return $this->setParameter('orderDate', $value);
    }


    public function getAmount()
    {
        return $this->getParameter('amount');
    }

    public function setAmount($value)
    {
        return $this->setParameter('amount', $value);
    }


    public function getProductName()
    {
        return $this->getParameter('productName');
    }

    public function setProductName($value)
    {
        return $this->setParameter('productName', $value);
    }


    public function getProductCount()
    {
        return $this->getParameter('productCount');
    }

    public function setProductCount($value)
    {
        return $this->setParameter('productCount', $value);
    }



    public function getProductPrice()
    {
        return $this->getParameter('productPrice');
    }

    public function setProductPrice($value)
    {
        return $this->setParameter('productPrice', $value);
    }

    public function calculateSignature($algorithm="md5")
    {
        $stringParams =
                    $this->getMerchantAccount().
                    $this->getMerchantDomainName().
                    $this->getOrderReference().
                    $this->getOrderDate().
                    $this->getAmount().
                    $this->getCurrency().
                    implode(";",$this->getProductName()).
                    implode(";",$this->getProductCount()).
                    implode(";",$this->getProductPrice());
        return hash_hmac($algorithm,$stringParams,$this->getMerchantSecretKey());
    }

    public function getMerchantSignature()
    {
        return $this->getParameter('merchantSignature');
    }

    public function setMerchantSignature($value)
    {
        return $this->setParameter('merchantSignature', $value);
    }


    public function purchase(array $parameters = [])
    {
        return $this->createRequest('Omnipay\Wayforpay\Message\PurchaseRequest', $parameters);
    }


}
