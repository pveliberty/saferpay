<?php

namespace Payment\Saferpay;

use Payment\HttpClient\HttpClientInterface;
use Payment\Saferpay\Data\AbstractData;
use Payment\Saferpay\Data\PayCompleteParameter;
use Payment\Saferpay\Data\PayCompleteResponse;
use Payment\Saferpay\Data\RegistrationResponse;
use Payment\Saferpay\Data\AuthorizationResponse;
use Payment\Saferpay\Data\PayConfirmParameter;
use Payment\Saferpay\Data\PayInitParameterWithDataInterface;
use Payment\Saferpay\Data\AuthorizationParameterWithDataInterface;
use Payment\Saferpay\Data\RecordLinkInitParameterWithDataInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class Saferpay
{
    /**
     * @var HttpClientInterface
     */
    protected $httpClient;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @param HttpClientInterface $httpClient
     * @return $this
     */
    public function setHttpClient(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    /**
     * @return HttpClientInterface
     * @throws \Exception
     */
    protected function getHttpClient()
    {
        if (is_null($this->httpClient)) {
            throw new \Exception('Please define a http client based on the HttpClientInterface!');
        }

        return $this->httpClient;
    }

    /**
     * @param LoggerInterface $logger
     * @return $this
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;

        return $this;
    }

    /**
     * @return string
     */
    public function getErrorAuthenticationConfirm($coderesult)
    {
        switch($coderesult){
            case 0 : $response = 'Demande exécutée avec succès';break;
            case 311 : $response = 'L’authentification a échoué à cause d’un problème technique 
                                                sur le serveur ACS. La poursuite éventuelle 
                                                de la demande d’autorisation est à faire dépendre de la 
                                                valeur ECI';break;
            default : $response = 'Error non gerer';break;
        }

        return $response;
    }
    /**
     * @return string
     */
    public function getErrorRegistration($coderesult)
    {
        switch($coderesult){
            case 0 : $response = 'Enregistrement réussi.';break;
            case 61 : $response = 'La validation de la carte a échoué.';break;
            case 62 : $response = 'La date d’expiration n’est pas plausible.';break;
            case 63 : $response ='La carte a expiré, elle n’est plus valable.';break;
            case 64 : $response = 'La carte est inconnue, elle n’a pas pu être rattachée à un type de carte.';break;
            case 65 : $response = 'L’acquirer de la carte a refusé la transaction. Le declined champ AUTHRESULT contient la raison du refus de la part de l’acquirer.';break;
            case 67 : $response = 'Le terminal ne dispose pas du contrat d’acceptation available pour le type de carte ou pour la devise demandée.';break;
            case 70 : $response ='Le pays d’origine de l’IP de la demande n’est pas débloqué dans le Saferpay Risk Management.';break;
            case 83 : $response = 'Le code de la devise n’est pas valable.';break;
            case 84 : $response = 'Le montant n’est pas valable.';break;
            case 85 : $response = 'L’abonnement de transaction est épuisé.';break;
            case 102 : $response = 'L’acquirer ne prend pas en charge cette fonction.';break;
            case 104 : $response = 'La carte a été bloquée par le Saferpay Risk Management.';break;
            case 105 : $response = 'Le pays d’origine de la carte n’est pas débloqué dans le Saferpay Risk Management.';break;
            case 113 : $response = 'Le numéro de vérification de la carte contient une valeur non valable.';break;
            case 114 : $response = 'La saisie du numéro de vérification de la carte est absolument nécessaire.';break;
            case 8100 : $response = 'Le MPI_SESSIONID est inconnu.';break;
            case 7000 : $response = 'Erreur générale (voir DESCRIPTION).';break;
            case 7001 : $response = 'Demande n’a pas pu être entièrement traitée.';break;
            case 7002 : $response = 'Type de carte non disponible sur le terminal.';break;
            case 7003 : $response = 'Contenu ou format invalide du paramètre.';break;
            case 7004 : $response = 'CARDREFID introuvable (uniquement lors de l’autorisation).';break;
            case 7005 : $response = 'Paramètre manquant dans la demande.';break;
            case 7006 : $response = 'CARDREFID déjà existant.';break;
            case 7007 : $response = 'Aucune autorisation existante pour le SCD.';break;
            default : $response = 'Error non gerer : code'.$coderesult;break;
        }

        return $response;
    }
    /**
     * @return string
     */
    public function getErrorAuthorization($coderesult)
    {
        switch($coderesult){
            case 0   : $response = 'The authorization or request processing was successful';break;
            case 5   : $response = 'The access to the specified account was denied by Saferpay.';break;
            case 23  : $response = 'Invalid action attribute or action not possible.';break;
            case 61  : $response = 'The static checks failed on this card (range check, LUHN check digit).';break;
            case 62  : $response = 'Invalid expiration date.';break;
            case 63  : $response = 'The card has expired.';break;
            case 64  : $response = 'The card type is unknown, the BIN range could not be assigned to a known brand.';break;
            case 65  : $response = 'The processor has denied the transaction request.';break;
            case 67  : $response = 'No contract exists for the card/currency combination specified.';break;
            case 68  : $response = 'More than one contracts exist for this card/currency combination.';break;
            case 75  : $response = 'The amount is not plain numerical.';break;
            case 76  : $response = 'The connection to the card processor could not be established or was broken during the request.';break;
            case 77  : $response = 'No endpoint is specified for the processor of the card.';break;
            case 78  : $response = 'A system error has occurred during processing the request. Retry the request.';break;
            case 79  : $response = 'Function Unknown';break;
            case 80  : $response = 'Terminal does not exist.';break;
            case 81  : $response = 'The terminal type does not support the requested service.';break;
            case 82  : $response = 'Transaction not found.';break;
            case 83  : $response = 'The specified currency code is invalid.';break;
            case 84  : $response = 'The specified amout is invalid or does not match the rules for the currency.';break;
            case 85  : $response = 'No more credits available';break;
            case 86  : $response = 'Double transaction';break;
            case 87  : $response = 'Access denied';break;
            case 88  : $response = 'Reservation invalid';break;
            case 89  : $response = 'Amount of reservation overbooked.';break;
            case 90  : $response = 'The contract for this card is currently disabled.';break;
            case 97  : $response = 'Transaction already captured (PayComplete)';break;
            case 98  : $response = 'Invalid digital signature of message content received from Saferpay.';break;
            case 102 : $response = 'Function not supported by provider.';break;
            case 103 : $response = 'Function not allowed';break;
            case 104 : $response = 'Card number in customer black list.';break;
            case 105 : $response = 'Card number not in country BIN range list.';break;
            case 110 : $response = 'Timeout waiting on authorization response.';break;
            case 113 : $response = 'The CVC contains a wrong value, must be 3 or 4 digits only.';break;
            case 114 : $response = 'Missing CVC Number';break;
            case 115 : $response = 'Communication error to GICC provider.';break;
            case 120 : $response = 'Received no answer for authorization request.';break;
            case 130 : $response = 'Received unknown message type from provider.';break;
            case 150 : $response = 'Authorization response from provider invalid.';break;
            case 151 : $response = 'Timeout waiting on authorization response.';break;
            case 152 : $response = 'The processor has denied the transaction request for this terminal.';break;
            case 153 : $response = 'A problem occurred during syncronisation with the processor.';break;
            case 154 : $response = 'The processors response is invalid it contains a format error.';break;
            case 301 : $response = 'The Merchant Plug-In application aborted errorous.';break;
            case 7000: $response = 'Internal error during registration, DESCRIPTION contains further details';break;
            case 7001: $response = 'Registration request could not be processed completely';break;
            case 7002: $response = 'The registration process could not match a valid card scheme';break;
            case 7003: $response = 'Registration request malformed or wrong field content';break;
            case 7004: $response = 'Card reference number not found in database.';break;
            case 7005: $response = 'Missing attribute in registration request';break;
            case 7006: $response = 'Card reference number already existing in database';break;
            case 7007: $response = 'Unknown Error: code'.$coderesult;break;
            default  : $response = 'Unknown Error: code'.$coderesult;break;
        }

        return $response;
    }

    /**
     * @return LoggerInterface
     */
    protected function getLogger()
    {
        if (is_null($this->logger)) {
            $this->logger = new NullLogger();
        }

        return $this->logger;
    }

    /**
     * @param  PayInitParameterWithDataInterface $payInitParameter
     * @return string
     */
    public function createPayInit(PayInitParameterWithDataInterface $payInitParameter)
    {
        return $this->request($payInitParameter->getRequestUrl(), $payInitParameter->getData());
    }   

    /**
     * @param  RecordLinkInitParameterWithDataInterface $RecordLinkInitParameter
     * @return string
     */
    public function creatRecordLinkInit(RecordLinkInitParameterWithDataInterface $recordLinkInitParameter)
    {
        $data = array_merge($recordLinkInitParameter->getData(), $recordLinkInitParameter->getInvalidData());
        return $this->request($recordLinkInitParameter->getRequestUrl(), $data);
    }

    /**
     * @param  AuthorizationInitParameterWithDataInterface $autoInitParameter
     * @return string
     */
    public function creatAuthorizationInit(AuthorizationParameterWithDataInterface $authorizationParameter)
    {

        $data = array_merge($authorizationParameter->getData(), $authorizationParameter->getInvalidData()); 

        $response = $this->request($authorizationParameter->getRequestUrl(), $data);

        $authorizationResponse = new AuthorizationResponse();
        $this->fillDataFromXML($authorizationResponse, substr($response, 3));

        return $authorizationResponse;
         
    }

    /**
     * @param  PayInitParameterWithDataInterface $payInitParameter
     * @return string
     */
    public function cardRecording($url, array $data)
    {
        $retour =  $this->request($url, $data);

         return $retour;
    }

    /**
     * @param $xml
     * @param $signature
     * @return PayConfirmParameter
     */
    public function verifyError ($xml, $signature)
    {
        $payConfirmParameter = new PayConfirmParameter();
        $this->fillDataFromXML($payConfirmParameter, $xml);
        return $payConfirmParameter;
    }
    /**
     * @param $xml
     * @param $signature
     * @return PayConfirmParameter
     */
    public function verifyPayConfirm($xml, $signature)
    {
        $payConfirmParameter = new PayConfirmParameter();
        $this->fillDataFromXML($payConfirmParameter, $xml);
        $this->request($payConfirmParameter->getRequestUrl(), array(
            'DATA' => $xml,
            'SIGNATURE' => $signature
        ));

        return $payConfirmParameter;
    }    

    

    /**
     * @param $xml
     * @param $signature
     * @return PayConfirmParameter
     */
    public function verifRegistrationConfirm($xml, $signature)
    {
        $RegistrationConfirmParameter = new RegistrationResponse();
        $this->fillDataFromXML($RegistrationConfirmParameter, $xml);
        $this->request($RegistrationConfirmParameter->getRequestUrl(), array(
            'DATA' => $xml,
            'SIGNATURE' => $signature
        ));

        return $RegistrationConfirmParameter;
    }

     /**
     * @param  PayConfirmParameter $payConfirmParameter
     * @param  string              $action
     * @return PayCompleteResponse
     * @throws \Exception
     */
    public function payCompleteV2Authorization(AuthorizationResponse $authorizationResponse, $action = 'Settlement', $accountId, $spPassword)
    {
        
        if (is_null($authorizationResponse->getId())) {
            $this->getLogger()->critical('Saferpay: call confirm before complete!');
            throw new \Exception('Saferpay: call confirm before complete!');
        }

        $payCompleteParameter = new PayCompleteParameter();
         
        $payCompleteParameter->setId($authorizationResponse->getId());
          
        $payCompleteParameter->setAccountid($accountId);
         
        $payCompleteParameter->setAction($action);

        $data = array_merge($payCompleteParameter->getData(), array('spPassword' => $spPassword));
        

        $response = $this->request($payCompleteParameter->getRequestUrl(), $data);
 
        $payCompleteResponse = new PayCompleteResponse();
        $this->fillDataFromXML($payCompleteResponse, substr($response, 3));

        return $payCompleteResponse;
    }

    /**
     * @param  PayConfirmParameter $payConfirmParameter
     * @param  string              $action
     * @return PayCompleteResponse
     * @throws \Exception
     */
    public function payCompleteV2(PayConfirmParameter $payConfirmParameter, $action = 'Settlement')
    {
        if (is_null($payConfirmParameter->getId())) {
            $this->getLogger()->critical('Saferpay: call confirm before complete!');
            throw new \Exception('Saferpay: call confirm before complete!');
        }

        $payCompleteParameter = new PayCompleteParameter();
        $payCompleteParameter->setId($payConfirmParameter->getId());
        $payCompleteParameter->setAmount($payConfirmParameter->getAmount());
        $payCompleteParameter->setAccountid($payConfirmParameter->getAccountid());
        $payCompleteParameter->setAction($action);
 
        $response = $this->request($payCompleteParameter->getRequestUrl(), $payCompleteParameter->getData());
 
        $payCompleteResponse = new PayCompleteResponse();
        $this->fillDataFromXML($payCompleteResponse, substr($response, 3));

        return $payCompleteResponse;
    }


 
    
    /**
     * @param $url
     * @param  array      $data
     * @return mixed
     * @throws \Exception
     */
    protected function request($url, array $data)
    {

        $response = $this->getHttpClient()->request(
            'POST',
            $url,
            http_build_query($data),
            array('Content-Type' => 'application/x-www-form-urlencoded')
        );

        /*if ($response->getStatusCode() != 200) {
            $this->getLogger()->critical('Saferpay: request failed with statuscode: {statuscode}!', array('statuscode' => $response->getStatusCode()));
            throw new \Exception('Saferpay: request failed with statuscode: ' . $response->getStatusCode() . '!');
        }*/

        if (strpos($response->getContent(), 'ERROR') !== false) {
            $this->getLogger()->critical('Saferpay: request failed: {content}!', array('content' => $response->getContent()));
            throw new \Exception('Saferpay: request failed: ' . $response->getContent() . '!');
        }

        return $response->getContent();
    }

    /**
     * @param AbstractData $data
     * @param $xml
     * @throws \Exception
     */
    protected function fillDataFromXML(AbstractData $data, $xml)
    {
        $document = new \DOMDocument();
        $fragment = $document->createDocumentFragment();

        if (!$fragment->appendXML($xml)) {
            $this->getLogger()->critical('Saferpay: Invalid xml received from saferpay');
            throw new \Exception('Saferpay: Invalid xml received from saferpay!');
        }

        foreach ($fragment->firstChild->attributes as $attribute) {
            /** @var \DOMAttr $attribute */
            $data->set($attribute->nodeName, $attribute->nodeValue);
        }
    }
}
