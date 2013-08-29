<?php

namespace Payment\Saferpay\Data;

class AuthorizationParameter extends AbstractData implements AuthorizationParameterWithDataInterface
{

    /**
     * @param string $sppassword
     * @return $this
     */
    public function setSpPassword($sppassword)
    {
        $this->set('spPassword', $sppassword);

        return $this;
    }

    /**
     * @return string
     */
    public function getSpPassword()
    {
        return $this->get('spPassword');
    }
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
     * @param int $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->set('AMOUNT', $amount);

        return $this;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
         return $this->get('AMOUNT');
    }

     /**
     * @param string $currency
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->set('CURRENCY', $currency);

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->get('CURRENCY');
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
     * @param string $pan
     * @return $this
     */
    public function setPan($pan)
    {
        $this->set('PAN', $pan);

        return $this;
    }
    /**
     * @return string
     */
    public function getPan()
    {
        return $this->get('PAN');
    }
    /**
     * @param string $exp
     * @return $this
     */
    public function setExp($exp)
    {
        $this->set('EXP', $exp);

        return $this;
    }
    /**
     * @return string
     */
    public function getExp()
    {
         return $this->get('EXP');
    }

    /**
     * @param string $cvc
     * @return $this
     */
    public function setCvc($cvc)
    {
        $this->set('CVC', $cvc);

        return $this;
    
    }

    /**
     * @return string
     */
    public function getCvc()
    {
         return $this->get('CVC');
    }

    /**
     * @param string $track2
     * @return $this
     */
    public function setTrack2($track2)
    {

        $this->set('TRACK2', $track2);

        return $this;
    }
    /**
     * @return string
     */
    public function getTrack2()
    {
         return $this->get('TRACK2');
    }

     /**
     * @param string $orderid
     * @return $this
     */
    public function setOrderid($orderid)
    {
        $this->set('ORDERID', $orderid);

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderid()
    {
        return $this->get('ORDERID');
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->set('NAME', $name);

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->get('NAME');
    }


    /**
     * @param string $mpi_sessionid
     * @return $this
     */
    public function setMpiSessionId($mpi_sessionid)
    {
        $this->set('MPI_SESSIONID', $mpi_sessionid);

        return $this;
    }

    /**
     * @return string
     */
    public function getMpiSessionId()
    {
        return $this->get('MPI_SESSIONID');
    }

    /**
     * @param string $ip
     * @return $this
     */
    public function setIp($ip)
    {
        $this->set('IP', $ip);

        return $this;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->get('IP');
    }

    /**
     * @param string $authcode
     * @return $this
     */
    public function setAuthcode($authcode)
    {
        $this->set('AUTHCODE', $authcode);

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthcode()
    {
        return $this->get('AUTHCODE');
    }

    /**
     * @param string $authflags
     * @return $this
     */
    public function setAuthflags($authflags)
    {
        $this->set('AUTHFLAGS', $authflags);

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthflags()
    {
        return $this->get('AUTHFLAGS');
    }

    /**
     * @param string $action
     * @return $this
     */
    public function setAction($action)
    {
        $this->set('ACTION', $action);

        return $this;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->get('ACTION');
    }

    /**
     * @param string $recurring
     * @return $this
     */
    public function setRecurring($recurring)
    {
        $this->set('RECURRING', $recurring);

        return $this;
    }

    /**
     * @return string
     */
    public function getRecurring()
    {
        return $this->get('RECURRING');
    }

    /**
     * @param string $recfreq
     * @return $this
     */
    public function setRecfreq($recfreq)
    {
        $this->set('RECFREQ', $recfreq);

        return $this;
    }
    /**
     * @return string
     */
    public function getRecfreq()
    {
        return $this->get('RECFREQ');
    }

    /**
     * @param string $recexp
     * @return $this
     */
    public function setRecexp($recexp)
    {
        $this->set('RECEXP', $recexp);

        return $this;
    }

    /**
     * @return string
     */
    public function getRecexp()
    {
         return $this->get('RECEXP');
    }

    /**
     * @param string $installment
     * @return $this
     */
    public function setInstallment($installment)
    {
        $this->set('INSTALLMENT', $installment);

        return $this;
    }

    /**
     * @return string
     */
    public function getInstallment()
    {
        return $this->get('INSTALLMENT');
    }

    /**
     * @param string $instcount
     * @return $this
     */
    public function setInstcount($instcount)
    {
        $this->set('INSTCOUNT', $instcount);

        return $this;
    }

    /**
     * @return string
     */
    public function getInstcount()
    {
        return $this->get('INSTCOUNT');
    }

    /**
     * @param string $refid
     * @return $this
     */
    public function setRefid($refid)
    {
        $this->set('REFID', $refid);

        return $this;
    }

    /**
     * @return string
     */
    public function getRefid()
    {
        return $this->get('REFID');
    }

    /**
     * @param string $refoid
     * @return $this
     */
    public function setRefoid($refoid)
    {
        $this->set('REFOID', $refoid);

        return $this;
    
    }

    /**
     * @return string
     */
    public function getRefoid()
    {
        return $this->get('REFOID');
    }
}