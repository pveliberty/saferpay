<?php

namespace Payment\Saferpay\Data;

interface AuthorizationParameterInterface
{
    const REQUEST_URL = 'https://www.saferpay.com/hosting/Execute.asp';

    /**
     * Saferpay password  identifier or this merchant Transaction.
     * Mandatory parameter.
     */
    const spPassword = 'ans[40]';

    /**
     * The Saferpay account number for this merchant Transaction.
     * For example, "99867-94913159" for the Saferpay test account
     */
    const ACCOUNTID = 'ns[..15]';

  
    /**
     * Primary Account Number
     */
    const PAN = 'n[..19]';

    /**
     * Expiry date as shown on the credit card
     */
    const EXP = 'n[4]';

    /**
     * card verification number to 3 or 4 digits
     */
    const CVC = '000011n[..4]';


    /**
     * Banking relationship for the German recovery system direct electronic
     */
    const TRACK2  = 'ns[22]';
 
    /**
     * Optionnel
     * Replacement value for the credit card number and the expiration date or bank (only german ELV)
     * For the use of CARDREFID="new" must at first set a numeric start default value for the Saferpay account
     * Contact integration@saferpay.com
     */
    const CARDREFID = 'ans[..40]';

    /**
     * Payment amount in the smallest currency unit.
     * For example, "1230" corresponding amount in euro 12,30.
     */
    const AMOUNT = 'n[..8]';

    /**
     * Three-digit ISO 4217 currency code.
     * For example, "CHF" or "EUR"
     */
    const CURRENCY = 'a[3]';

    /**
     * optional, mandatory parameters when payment giropay
     * ORDERID contains the reference number for a payment
     */
    const ORDERID = 'ans[..80]';

    /**
     * optional
     * Contains the name of the card holder.
     */
    const NAME = 'ans[..50]';

    /**
     * optional
     * IP 
     */
    const IP  = 'ns[..15]';

    /**
     * optional
     * The session of the procedure is necessary VerifyEnrollment
     * request for authorization to enter a payment
     * 3-D Secure (Only for "Verified by Visa" and
     * "MasterCard SecureCode").
     */
    const MPI_SESSIONID  = 'an[28]';

    /**
     * optional
     * Contains the authorization code of the acquirer, if the application
     * for example, been authorized in advance by phone.
     */
    const AUTHCODE   = 'n[6]';

    /*
     * optional
     * The following values ​​are possible:
     * 0 = standard value, the payment is made
     * authorization.
     * 4 = Authorization of payment already made
     * (AUTHCODE).
     * 16 = At your own risk, payment is made without
     * authorization.
     */
    const AUTHFLAGS = 'n[..2]';

    /*
     * optional
     * Indicates whether the payment request an accounting test
     * or credit. 
     * Values: "Flow" (standard cardholder pays)
     * and "Credit" (cardholder receives money).
     */
    const ACTION = 'a[..6]';

    /*
     * optional
     * Indicates that the application is a recurring payment.
     * Values​​: "yes" or "no" (standard)
     * To be used for the initial payment and all payments
     * subsequent.
     * Can not be used with installment!
     * 
     */
    const RECURRING = 'a[..3]';

    /*
     * optional
     * Gives the interval in days between recurring payments.
     * For example, "28" corresponds to a month.
     * Must be used with RECEXP!
     */
    const RECFREQ = 'n[..3]';
 
    /*
     * optional
     * Date from which there will be no more payments
     * recurring. The format is YYYYMMJJ eg
     * "20151231" to 31/12/2015. For applications 3-D
     * Secure ACS checks whether the expiry date of the card is
     * sufficient.
     * Must be used with RECFREQ!
     */
    const RECEXP = 'n[8]';

    /*
     * optional
     * Indicates that the request is a periodic payment.
     * To be used for the initial payment and all payments
     * subsequent.
     * Values​​: "yes" or "no" (standard)
     * Can not be used with RECURRING!
     */
    const INSTALLMENT = 'a[..3]';

    /*
     * optionnel
     * Nombre des versements convenus entre le vendeur et
     * l’acheteur. La valeur minimale est « 2 ».
     * INSTCOUNT est absolument nécessaire pour le paiement
     * initial, mais pas pour les paiements échelonnés subséquents !
     */
    const INSTCOUNT = 'n[..2]';

    /*
     * optional
     * accounting;
     * Referenced using the identifier of the payment transaction
     * for initial or recurring milestone payments.
     * Value: ID initial payment
     * credit:
     * A credit reference with the transaction ID of
     * initial recognition. To do this, reservations must
     * first be recorded via PayComplete, otherwise the
     * credit will be refused!
     */
    const REFID ='an[28]';

    /*
     * Optional
     * postings:
     * Referenced with the reference number of payment
     * for initial or recurring milestone payments.
     * Value: ORDERID initial payment
     * credit:
     * A credit reference with the reference number of the
     * initial recognition. To do this, reservations must
     * first be recorded via PayComplete, otherwise the
     * credit will be refused!
     */
    const REFOID ='ans[..80]';

    /**
     * @param string $sppassword
     * @return $this
     */
    public function setSpPassword($sppassword);
   
    /**
     * @return string
     */
    public function getSpPassword();


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
     * @param int $amount
     * @return $this
     */
    public function setAmount($amount);

    /**
     * @return int
     */
    public function getAmount();

    /**
     * @param string $currency
     * @return $this
     */
    public function setCurrency($currency);

    /**
     * @return string
     */
    public function getCurrency();

    /**
     * @param string $successlink
     * @return $this
     */
    public function setSuccesslink($successlink);

    /**
     * @return string
     */
    public function getSuccesslink();

    /**
     * @param string $faillink
     * @return $this
     */
    public function setFaillink($faillink);

    /**
     * @return string
     */
    public function getFaillink();


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
     * @param string $pan
     * @return $this
     */
    public function setPan($pan);

    /**
     * @return string
     */
    public function getPan();
    
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
     * @param string $cvc
     * @return $this
     */
    public function setCvc($cvc);

    /**
     * @return string
     */
    public function getCvc();

    /**
     * @param string $track2
     * @return $this
     */
    public function setTrack2($track2);

    /**
     * @return string
     */
    public function getTrack2();

    /**
     * @param string $orderid
     * @return $this
     */
    public function setOrderid($orderid);

    /**
     * @return string
     */
    public function getOrderid();

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();


    /**
     * @param string $mpi_sessionid
     * @return $this
     */
    public function setMpiSessionId($mpi_sessionid);

    /**
     * @return string
     */
    public function getMpiSessionId();

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
     * @param string $authcode
     * @return $this
     */
    public function setAuthcode($authcode);

    /**
     * @return string
     */
    public function getAuthcode();

    /**
     * @param string $authflags
     * @return $this
     */
    public function setAuthflags($authflags);

    /**
     * @return string
     */
    public function getAuthflags();

    /**
     * @param string $action
     * @return $this
     */
    public function setAction($action);

    /**
     * @return string
     */
    public function getAction();

    /**
     * @param string $recurring
     * @return $this
     */
    public function setRecurring($recurring);

    /**
     * @return string
     */
    public function getRecurring();

    /**
     * @param string $recfreq
     * @return $this
     */
    public function setRecfreq($recfreq);

    /**
     * @return string
     */
    public function getRecfreq();

    /**
     * @param string $recexp
     * @return $this
     */
    public function setRecexp($recexp);

    /**
     * @return string
     */
    public function getRecexp();

    /**
     * @param string $installment
     * @return $this
     */
    public function setInstallment($installment);

    /**
     * @return string
     */
    public function getInstallment();

    /**
     * @param string $instcount
     * @return $this
     */
    public function setInstcount($instcount);

    /**
     * @return string
     */
    public function getInstcount();

        /**
     * @param string $refid
     * @return $this
     */
    public function setRefid($refid);

    /**
     * @return string
     */
    public function getRefid();

        /**
     * @param string $refoid
     * @return $this
     */
    public function setRefoid($refoid);

    /**
     * @return string
     */
    public function getRefoid();


}
