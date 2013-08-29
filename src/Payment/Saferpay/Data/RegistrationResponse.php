<?php

namespace Payment\Saferpay\Data;

class RegistrationResponse extends AbstractData implements RegistrationResponseWithDataInterface
{
    /**
     * @param string $msgtype
     * @return $this
     */
    public function setMsgtype($msgtype)
    {
        $this->set('MSGTYPE', $msgtype);

        return $this;
    }

    /**
     * @return string
     */
    public function getMsgtype()
    {
        return $this->get('MSGTYPE');
    }

    /**
     * @param int $keyid
     * @return $this
     */
    public function setKeyid($keyid)
    {
        $this->set('KEYID', $keyid);

        return $this;
    }

    /**
     * @return string
     */
    public function getKeyid()
    {
        return $this->get('KEYID');
    }

    /**
     * @param string $result
     * @return $this
     */
    public function setResult($result)
    {
        $this->set('RESULT', $result);

        return $this;
    }

    /**
     * @return string
     */
    public function getResult()
    {
        return $this->get('RESULT');
    }

    /**
     * @param string $scdresult
     * @return $this
     */
    public function setScdResult($scdresult)
    {
        $this->set('SCDRESULT', $scdresult);

        return $this; 
    }

    /**
     * @return string
     */
    public function getScdResult()
    {
        return $this->get('SCDRESULT');
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->set('DESCRIPTION', $description);

        return $this; 
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->get('DESCRIPTION');
    }
    
    /**
     * @param string $scddescription
     * @return $this
     */
    public function setScdDescription($scddescription)
    {
        $this->set('SCDDESCRIPTION', $scddescription);

        return $this; 
    }

    /**
     * @return string
     */
    public function getScdDescription()
    {
        return $this->get('SCDDESCRIPTION');
    }

    /**
     * @param string $accountid
     * @return $this
     */
    public function setAccountid($accountid)
    {
        $this->set('ACCOUNTID ', $accountid);

        return $this; 
    }

    /**
     * @return string
     */
    public function getAccountid()
    {
        return $this->get('ACCOUNTID');
    }

       /**
     * @param string $cardrefid
     * @return $this
     */
    public function setCardrefid($cardrefid)
    {
        $this->set('CARDREFID', $cardrefid);

        return $this; 
    }

    /**
     * @return string
     */
    public function getCardrefid()
    {
        return $this->get('CARDREFID');
    }

    /**
     * @param string $cardmask
     * @return $this
     */
    public function setCardMask($cardmask)
    {
        $this->set('CARDMASK', $cardmask);

        return $this; 
    }

    /**
     * @return string
     */
    public function getCardMask()
    {
        return $this->get('CARDMASK');
    }


    /**
     * @param string $cardbin
     * @return $this
     */
    public function setCardBin($cardbin)
    {
        $this->set('CARDBIN', $cardbin);

        return $this; 
    }

    /**
     * @return int
     */
    public function getCardBin()
    {
        return $this->get('CARDBIN');
    }

    /**
     * @param string $cardtype
     * @return $this
     */
    public function setCardType($cardtype)
    {
        $this->set('CARDTYPE', $cardtype);

        return $this; 
    }

    /**
     * @return string
     */
    public function getCardType()
    {
        return $this->get('CARDTYPE');
    }

    /**
     * @param string $cardbrand

     * @return $this
     */
    public function setCardBrand($cardbrand)
    {
        $this->set('CARDBRAND', $cardbrand);

        return $this; 
    }

    /**
     * @return string
     */
    public function getCardBrand()
    {
        return $this->get('CARDBRAND');
    }

    /**
     * @param string $cccountry 

     * @return $this
     */
    public function setCcCountry($cccountry)
    {
        $this->set('CCCOUNTRY', $cccountry);

        return $this; 
    }

    /**
     * @return string
     */
    public function getCcCountry()
    {
        return $this->get('CCCOUNTRY');
    }

    /**
     * @param string $lifetime
     * @return $this
     */
    public function setLifeTime($lifetime)
    {
        $this->set('LIFETIME', $lifetime);

        return $this; 
    }

    /**
     * @return string
     */
    public function getLifeTime()
    {
        return $this->get('LIFETIME'); 
    }

    /**
     * @param string $expirymonth
     * @return $this
     */
    public function setExpiryMonth($expirymonth)
    {
        $this->set('EXPIRYMONTH', $expirymonth);

        return $this; 
    }

    /**
     * @return string
     */
    public function getExpiryMonth()
    {
        return $this->get('EXPIRYMONTH');        
    }

    /**
     * @param string $expiryyear
     * @return $this
     */
    public function setExpiryYear($expiryyear)
    {
        $this->set('EXPIRYYEAR', $expiryyear);

        return $this; 
    }

    /**
     * @return string
     */
    public function getExpiryYear()
    {
         return $this->get('EXPIRYYEAR'); 
    }
}