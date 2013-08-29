<?php

namespace Payment\Saferpay\Data;

interface RecordLinkInitParameterInterface
{
    const REQUEST_URL = 'https://www.saferpay.com/hosting/CreatePayInit.asp';

    /**
     * The Saferpay account number for this merchant Transaction.
     * For example, "99867-94913159" for the Saferpay test account
     */
    const ACCOUNTID = 'ns[..15]';

    /**
     * URL to which the customer get redirected after a successful completion
     */
    const SUCCESSLINK = 'ans[..1024]';

    /**
     * URL to which the customer get redirected after a failed authorization
     */
    const FAILLINK = 'ans[..1024]';

    /*
     * Replacement value for the credit card number and the expiration date or bank (only german ELV)
     * For the use of CARDREFID="new" must at first set a numeric start default value for the Saferpay account
     * Contact integration@saferpay.com
     */
    const CARDREFID = 'ans[..40]';

    /*
     * optional
     * Number of days during which a registered card
     * stored in the database. The time of
     * last used as a point of departure for the count.
     * No indication of time, the data is stored
     * for 1000 days. They are automatically erased
     * After that time. The maximum value is LIFETIME
     * 1600 days.
     */
    const LIFETIME = 'n[..4]';

    /**
     * optional
     * Language code according to ISO 639-1.
     * @link http://support.saferpay.de/download/LanguageList.pdf.
     */
    const LANGID = 'a[2]';

    /*
      * optional
      * Message displayed on the browser cardholder before
      * be redirected (Redirect). If call forwarding is
      * not work, or the SUCCESSLINK FAILLINK can be
      * executed by clicking on this message.
     */
    const REDIRECTMESSAGE = 'ans[..30]';

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
     * @param string $langid
     * @return $this
     */
    public function setLangid($langid);

    /**
     * @return string
     */
    public function getLangid();

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
     * @param string $redirectmessage
     * @return $this
     */
    public function setRedirectMessage($redirectmessage);

    /**
     * @return string
     */
    public function getRedirectMessage();
     
}