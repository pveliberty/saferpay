<?php

namespace Payment\Saferpay\Data;

class AuthorizationResponse extends AbstractData implements AuthorizationResponseWithDataInterface
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
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->set('ID', $id);

        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->get('ID');
    }


    /**
     * @param string $token
     * @return $this
     */
    public function setToken($token)
    {
        $this->set('TOKEN', $token);

        return $this;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->get('TOKEN');
    }


    /**
     * @param string $providerid
     * @return $this
     */
    public function setProviderId($providerid)
    {
         $this->set('PROVIDERID', $providerid);

        return $this; 

    }

    /**
     * @return int
     */
    public function getProviderId()
    {
        return $this->get('PROVIDERID');
    }

    /**
     * @param string $providername
     * @return $this
     */
    public function setProviderName($providername)
    {
        $this->set('PROVIDERNAME', $providername);

        return $this; 
    }

    /**
     * @return string
     */
    public function getProviderName()
    {
        return $this->get('PROVIDERNAME');
    }

    /**
     * @param string $authresult 

     * @return $this
     */
    public function setAuthResult($authresult)
    {
        $this->set('AUTHRESULT', $authresult);

        return $this; 
    }

    /**
     * @return string
     */
    public function getAuthResult()
    {
        return $this->get('AUTHRESULT');
    }

    /**
     * @param string $authcode
     * @return $this
     */
    public function setAuthCode($authcode)
    {
        $this->set('AUTHCODE', $authcode);

        return $this; 
    }

    /**
     * @return string
     */
    public function getAuthCode()
    {
        return $this->get('AUTHCODE');
    }

    /**
     * @param string $paymentprotocol
     * @return $this
     */
    public function setPaymentProtocol($paymentprotocol)
    {
        $this->set('PAYMENT_PROTOCOL', $paymentprotocol);

        return $this; 
    }

    /**
     * @return string
     */
    public function getPaymentProtocol()
    {
         return $this->get('PAYMENT_PROTOCOL');
    }

    /**
     * @param string $cavv
     * @return $this
     */
    public function setCavv($cavv)
    {
         $this->set('CAVV', $cavv);

        return $this; 
    }

    /**
     * @return string
     */
    public function getCavv()
    {
        return $this->get('CAVV');
    }

    /**
     * @param string $mpiliabilityshift
     * @return $this
     */
    public function setMpiLiabilityShift($mpiliabilityshift)
    {
        $this->set('MPI_LIABILITYSHIFT', $mpiliabilityshift);

        return $this; 
    }

    /**
     * @return string
     */
    public function getMpiLiabilityShift()
    {
        return $this->get('MPI_LIABILITYSHIFT');
    }

    /**
     * @param string $xid
     * @return $this
     */
    public function setXid($xid)
    {
        $this->set('XID', $xid);

        return $this;
    }

    /**
     * @return string
     */
    public function getXid()
    {
         return $this->get('XID');
    }

    /**
     * @param string $eci
     * @return $this
     */
    public function setEci($eci)
    {
        $this->set('ECI', $eci);

        return $this;
    }

    /**
     * @return string
     */
    public function getEci()
    {
        return $this->get('ECI');
    }

    /**
     * @param string $authdate
     * @return $this
     */
    public function setAuthDate($authdate)
    {
        $this->set('AUTHDATE', $authdate);

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthDate()
    {
        return $this->get('AUTHDATE');
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
     * @param string $referral
     * @return $this
     */
    public function setReferral($referral)
    {
        $this->set('REFERRAL', $referral);

        return $this;
    }

    /**
     * @return string
     */
    public function getReferral()
    {
        return $this->get('REFERRAL');
    }

    /**
     * @param string $acquirerterminal
     * @return $this
     */
    public function setAcquirerTerminal($acquirerterminal)
    {
        $this->set('ACQUIRER_TERMINALID', $acquirerterminal);

        return $this;
    }

    /**
     * @return string
     */
    public function getAcquirerTerminal()
    {
         return $this->get('ACQUIRER_TERMINALID');
    }

    /**
     * @param string $bankcodenumber
     * @return $this
     */
    public function setBankCodeNumber($bankcodenumber)
    {
        $this->set('BANK_CODE_NUMBER', $bankcodenumber);

        return $this;
    }

    /**
     * @return string
     */
    public function getBankCodeNumber()
    {
         return $this->get('BANK_CODE_NUMBER');
    }

    /**
     * @param string $protocolaid
     * @return $this
     */
    public function setProtocolAid($protocolaid)
    {
        $this->set('PROTOCOL_AID', $protocolaid);

        return $this;
    }

    /**
     * @return string
     */
    public function getProtocolAid()
    {
         return $this->get('PROTOCOL_AID');
    }


    /**
     * @param string $protocolstan 

     * @return $this
     */
    public function setProtocolStan($protocolstan)
    {
        $this->set('PROTOCOL_STAN', $protocolstan);

        return $this;
    }

    /**
     * @return string
     */
    public function getProtocolStan()
    {
        return $this->get('PROTOCOL_STAN');
    }


    /**
     * @param string $authmessage 

     * @return $this
     */
    public function setAuthMessage($authmessage)
    {
        $this->set('AUTHMESSAGE', $authmessage);

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthMessage()
    {
        return $this->get('AUTHMESSAGE');
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
     * @param string $ipcountry 

     * @return $this
     */
    public function setIpCountry($ipcountry)
    {
        $this->set('IPCOUNTRY', $ipcountry);

        return $this;
    }

    /**
     * @return string
     */
    public function getIpCountry()
    {
        return $this->get('IPCOUNTRY');
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

}
