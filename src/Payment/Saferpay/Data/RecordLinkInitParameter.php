<?php

namespace Payment\Saferpay\Data;

class RecordLinkInitParameter extends AbstractData implements RecordLinkInitParameterWithDataInterface
{

    

    /**
     * @param string $accountid
     * @return $this
     */
    public function setAccountid($accountid)
    {
        $this->set('ACCOUNTID', $accountid);

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
     * @param string $successlink
     * @return $this
     */
    public function setSuccesslink($successlink)
    {
        $this->set('SUCCESSLINK', $successlink);

        return $this;
    }

    /**
     * @return string
     */
    public function getSuccesslink()
    {
        return $this->get('SUCCESSLINK');
    }

    /**
     * @param string $faillink
     * @return $this
     */
    public function setFaillink($faillink)
    {
        $this->set('FAILLINK', $faillink);

        return $this;
    }

    /**
     * @return string
     */
    public function getFaillink()
    {
        return $this->get('FAILLINK');
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
     * @param string $langid
     * @return $this
     */
    public function setLangid($langid)
    {
        $this->set('LANGID', $langid);

        return $this;
    }

    /**
     * @return string
     */
    public function getLangid()
    {
        return $this->get('LANGID');
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
     * @param string $redirectmessage
     * @return $this
     */
    public function setRedirectMessage($redirectmessage)
    {
        $this->set('REDIRECTMESSAGE', $redirectmessage);

        return $this;
    }

    /**
     * @return string
     */
    public function getRedirectMessage()
    {
        return $this->get('REDIRECTMESSAGE');
    }

}