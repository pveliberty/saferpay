<?php

namespace Payment\Saferpay\Data;

interface AuthorizationResponseInterface
{
    /**
     * Always contains the value "PayConfirm".
     */
    const MSGTYPE = 'a[..30]';



    /**
     * Contains the result of the authorization request.
     * 0 = Request successfully processed.
     * ≠ 0 = Request unsuccessfully treated. A list of values
     * RESULT possible values ​​is given in section
     * RESULT
     */
    const RESULT  = 'n[..4]';

    /**
     * Number Saferpay merchant account for this transaction.
     */
    const ACCOUNTID  = 'ns[..15]';

    /**
     * Saferpay unique transaction identifier.
     */
    const ID = 'an[28]';

    /**
     * May contain additional information for the
     * processing the transaction.
     * Default value: "(unused)"
     */
    const TOKEN = 'ans[..40]';

    /**
     * Contains the Provider ID from the institution of treatment means of payment.
     */
    const PROVIDERID  = 'n[..4]';

    /**
     * Contains the name of the institution responsible for processing means of payment.
     */
    const PROVIDERNAME = 'ans[..30]';

    /**
     * Contains the response code of the acquirer. If no connection
     * with the acquirer could not be achieved, the value contained in
     * RESULT actually state. The values ​​vary according to the protocol
     * means of payment used
     */
    const AUTHRESULT  = 'n[..3]';

    /**
     * Contains the authorization code of the institution responsible 
     * for treatment means of payment if successful authorization.
     */
    const AUTHCODE  = 'n[6]';

    /**
     * Protocol name means of payment upon which 
     * the connection.Contains the name of the institution responsible for processing means of payment.
     */
    const PAYMENT_PROTOCOL = 'ans[..30]';

    /**
     * Parameter 3-D Secure 
     * Cardholder Authentication Verification Value
     * Here contains the UCAF value for MasterCard. saferpay
     * used regardless of the type of credit card value
     * CAVV.
     */
    const CAVV = 'ans[28]';

    /**
     * Parameter 3-D Secure 
     * Indicates if there is a transfer of responsibility from the point of
     * for purely technical.
     * Values​​: "yes" or "no"
     */
    const MPI_LIABILITYSHIFT  = 'a[..3]';

    /**
     * Parameter 3-D Secure 
     * extra Identify
     * This sequence of characters in Base 64 is assigned by the
     * MPI refers to the procedure with the 3-D Secure protocol.
     */
    const XID = 'ans[28]';

    /**
     * Parameter 3-D Secure 
     * Electronic Commerce Indicator
     * Necessary for the identification of transactions with 3-D
     * Secure ("Verified by Visa", "MasterCard SecureCode"):
     * 0 = Payment on Internet transfer of responsibility
     * 1 = Payment with 3-D Secure with permission
     * 2 = Payment with 3-D Secure, the card does not participate in the
     * proceedings
     */
    const ECI  = 'n[1]';

    /**
     * Contains the date and time of the authorization.
     * Format: YYYYMMDD hh: mm: ss
     */
    const AUTHDATE = 'ns[17]';

    /**
     * Contains the expiration date of the credit card applicant.
     * Format: MMYY
     */
    const EXP  = 'n[4]';

    /**
     * Contains the number of hidden credit card or relationship 
     * Transfer of the request.
     */
    const PAN  = 'ans[..23]';

    /**
     * Contains the number of replacement with which the application
     * authorization was made.
     */
    const CARDREFID  = 'ans[..40]';

    /**
     * Contains according to the acquirer a phone number or
     * written message to a prior authorization by phone.
     */
    const REFERRAL  = 'ans[..30]';

    /**
     * Contains the identifier of the terminal acquirer ELV.
     */
    const ACQUIRER_TERMINALID = 'n[..10]';

    /**
     * Contains the bank code of the requested bank account.
     */
    const BANK_CODE_NUMBER = 'n[8]';

    /**
     * Contains the authorization code if the acquirer ELV authorization is successful.
     */
    const PROTOCOL_AID = 'n[8]';

    /**
     * Contains a text concerning the authorization response.
     */
    const AUTHMESSAGE  = 'ans[..30]';

    /**
     * optional 
     * Contains the IP address assigned to the client.
     */
    const IP  = 'ns[..15]';

    /**
     * optional **
     * Country of origin of the IP address of the payer in accordance with ISO
     * 3166. Country code (eg, CH, DE, AT). If an assignment is
     * impossible, the value is "IX".
     * Example: "DE"
     */
    const IPCOUNTRY = 'a[2]';

    /**
     * optional **
     * Country of origin of the map according to ISO 3166. If one
     * assignment is impossible, is not included CCCOUNTRY
     * in the response.
     * Example: "DE
     */
    const CCCOUNTRY  = 'a[2]';

   





    /**
     * @param string $msgtype
     * @return $this
     */
    public function setMsgtype($msgtype);

    /**
     * @return string
     */
    public function getMsgtype();


    /**
     * @param string $result
     * @return $this
     */
    public function setResult($result);

    /**
     * @return string
     */
    public function getResult();


    /**
     * @param string $accountid
     * @return $this
     */
    public function setAccountid($accountid);

    /**
     * @return string
     */
    public function getAccountid();

    /**
     * @param string $id
     * @return $this
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $token
     * @return $this
     */
    public function setToken($token);

    /**
     * @return string
     */
    public function getToken();


    /**
     * @param string $providerid
     * @return $this
     */
    public function setProviderId($providerid);

    /**
     * @return int
     */
    public function getProviderId();

    /**
     * @param string $providername
     * @return $this
     */
    public function setProviderName($providername);

    /**
     * @return string
     */
    public function getProviderName();

    /**
     * @param string $authresult 

     * @return $this
     */
    public function setAuthResult($authresult);

    /**
     * @return string
     */
    public function getAuthResult();

    /**
     * @param string $authcode
     * @return $this
     */
    public function setAuthCode($authcode);

    /**
     * @return string
     */
    public function getAuthCode();

    /**
     * @param string $paymentprotocol
     * @return $this
     */
    public function setPaymentProtocol($paymentprotocol);

    /**
     * @return string
     */
    public function getPaymentProtocol();

    /**
     * @param string $cavv
     * @return $this
     */
    public function setCavv($cavv);

    /**
     * @return string
     */
    public function getCavv();

    /**
     * @param string $mpiliabilityshift
     * @return $this
     */
    public function setMpiLiabilityShift($mpiliabilityshift);

    /**
     * @return string
     */
    public function getMpiLiabilityShift();

    /**
     * @param string $xid
     * @return $this
     */
    public function setXid($xid);

    /**
     * @return string
     */
    public function getXid();

    /**
     * @param string $eci
     * @return $this
     */
    public function setEci($eci);

    /**
     * @return string
     */
    public function getEci();

    /**
     * @param string $authdate
     * @return $this
     */
    public function setAuthDate($authdate);

    /**
     * @return string
     */
    public function getAuthDate();

    /**
     * @param string $exp
     * @return $this
     */
    public function setExp($exp);

    /**
     * @return string
     */
    public function getExp();

    /**
     * @param string $pan
     * @return $this
     */
    public function setPan($pan);

    /**
     * @return string
     */
    public function getPan();

    /**
     * @param string $cardrefid
     * @return $this
     */
    public function setCardrefid($cardrefid);

    /**
     * @return string
     */
    public function getCardrefid();


    /**
     * @param string $referral
     * @return $this
     */
    public function setReferral($referral);

    /**
     * @return string
     */
    public function getReferral();

    /**
     * @param string $acquirerterminal
     * @return $this
     */
    public function setAcquirerTerminal($acquirerterminal);

    /**
     * @return string
     */
    public function getAcquirerTerminal();

    /**
     * @param string $bankcodenumber
     * @return $this
     */
    public function setBankCodeNumber($bankcodenumber);

    /**
     * @return string
     */
    public function getBankCodeNumber();

    /**
     * @param string $protocolaid
     * @return $this
     */
    public function setProtocolAid($protocolaid);

    /**
     * @return string
     */
    public function getProtocolAid();


    /**
     * @param string $protocolstan 

     * @return $this
     */
    public function setProtocolStan($protocolstan);

    /**
     * @return string
     */
    public function getProtocolStan();


    /**
     * @param string $authmessage 

     * @return $this
     */
    public function setAuthMessage($authmessage);

    /**
     * @return string
     */
    public function getAuthMessage();


    /**
     * @param string $ip
     * @return $this
     */
    public function setIp($ip);

    /**
     * @return string
     */
    public function getIp();


    /**
     * @param string $ipcountry 

     * @return $this
     */
    public function setIpCountry($ipcountry);

    /**
     * @return string
     */
    public function getIpCountry();

    /**
     * @param string $cccountry 

     * @return $this
     */
    public function setCcCountry($cccountry);

    /**
     * @return string
     */
    public function getCcCountry();

}
