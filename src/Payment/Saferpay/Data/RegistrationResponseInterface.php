<?php

namespace Payment\Saferpay\Data;

interface RegistrationResponseInterface
{

    const REQUEST_URL = 'https://www.saferpay.com/hosting/VerifyPayConfirm.asp';
    /**
     * Always contains the value "PayConfirm".
     */
    const MSGTYPE = 'a[..30]';

    /**
     * Saferpay unique transaction identifier.
     */
    const KEYID = 'ans[..40]';

    /**
     * Contains the result of the authorization request.
     * 0 = Request successfully processed.
     * ≠ 0 = Request unsuccessfully treated. A list of values
     * RESULT possible values ​​is given in section
     * RESULT
     */
    const RESULT  = 'n[..4]';

    /**
     * Same RESULT.
     */
    const SCDRESULT  = 'n[..4]';

    /**
     * Contains a short description of the error.
     */
    const DESCRIPTION = 'ans[..50] ';

    /**
     * Same DESCRIPTION.
     */
    const SCDDESCRIPTION = 'ans[..50] ';


    /**
     * Number Saferpay merchant account for this transaction.
     */
    const ACCOUNTID  = 'ns[..15]';

    /**
     * Contains the number of replacement with which the application
     * authorization was made.
     */
    const CARDREFID  = 'ans[..40]';

    /**
     * Contains the number of hidden card.
     */
    const CARDMASK  = 'ans[19]';

    /**
     * Contains the identification of the issuer six-digit code (BIN
     * or IIN), through which the bank edger can be identified.
     * CARDBIN are only for credit cards where
     * availability depends on the license and the acquirer.
     *      
     */
    const CARDBIN = 'n[6]';

    /**
     * Contains the ID card types.
     * 21699 System electronic direct debit (ELV)
     * 19265 American Express
     * 19269 MasterCard
     * 19274 J.C.B.
     * 19286 Visa
     * 99072 Test Pattern Saferpay
     */
    const CARDTYPE = 'n[5]';

    /**
     * Contains the name of the card type.
     */
    const CARDBRAND = 'ans[..50]';

    /**
     * optional **
     * Country of origin of the map according to ISO 3166. If one
     * assignment is impossible, is not included CCCOUNTRY
     * in the response.
     * Example: "DE
     */
    const CCCOUNTRY  = 'a[2]';

    /**
     * Record number of days in the database information of the payment.
     */
    const LIFETIME = 'n[..4]';

    /**
     * Contains The expiration month MM credit card.
     */
    const EXPIRYMONTH = 'n[2]';

    /**
     *  Contains The expiration year MM credit card.
     */
    const EXPIRYYEAR = 'n[2]';

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
     * @param int $keyid
     * @return $this
     */
    public function setKeyid($keyid);

    /**
     * @return string
     */
    public function getKeyid();

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
     * @param string $scdresult
     * @return $this
     */
    public function setScdResult($scdresult);

    /**
     * @return string
     */
    public function getScdResult();

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getDescription();
    
    /**
     * @param string $scddescription
     * @return $this
     */
    public function setScdDescription($scddescription);

    /**
     * @return string
     */
    public function getScdDescription();

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
     * @param string $cardrefid
     * @return $this
     */
    public function setCardrefid($cardrefid);

    /**
     * @return string
     */
    public function getCardrefid();

    /**
     * @param string $cardmask
     * @return $this
     */
    public function setCardMask($cardmask);

    /**
     * @return string
     */
    public function getCardMask();


    /**
     * @param string $cardbin
     * @return $this
     */
    public function setCardBin($cardbin);

    /**
     * @return int
     */
    public function getCardBin();

    /**
     * @param string $cardtype
     * @return $this
     */
    public function setCardType($cardtype);

    /**
     * @return string
     */
    public function getCardType();

    /**
     * @param string $cardbrand

     * @return $this
     */
    public function setCardBrand($cardbrand);

    /**
     * @return string
     */
    public function getCardBrand();

    /**
     * @param string $cccountry 

     * @return $this
     */
    public function setCcCountry($cccountry);

    /**
     * @return string
     */
    public function getCcCountry();

    /**
     * @param string $lifetime
     * @return $this
     */
    public function setLifeTime($lifetime);

    /**
     * @return string
     */
    public function getLifeTime();

    /**
     * @param string $expirymonth
     * @return $this
     */
    public function setExpiryMonth($expirymonth);

    /**
     * @return string
     */
    public function getExpiryMonth();

    /**
     * @param string $expiryyear
     * @return $this
     */
    public function setExpiryYear($expiryyear);

    /**
     * @return string
     */
    public function getExpiryYear();
}
