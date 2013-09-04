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
            case 0 : $response = htmlentities('Demande exécutée avec succès');break;
            case 311 : $response = htmlentities('L’authentification a échoué à cause d’un problème technique 
                                                sur le serveur ACS. La poursuite éventuelle 
                                                de la demande d’autorisation est à faire dépendre de la 
                                                valeur ECI');break;
            default : $response = htmlentities('Error non gerer');break;
        }

        return $response;
    }
    /**
     * @return string
     */
    public function getErrorRegistration($coderesult)
    {
        switch($coderesult){
            case 0 : $response = htmlentities('Enregistrement réussi.');break;
            case 7000 : $response = htmlentities('Erreur générale (voir DESCRIPTION).');break;
            case 7001 : $response = htmlentities('Demande n’a pas pu être entièrement traitée.');break;
            case 7002 : $response = htmlentities('Type de carte non disponible sur le terminal.');break;
            case 7003 : $response = htmlentities('Contenu ou format invalide du paramètre.');break;
            case 7004 : $response = htmlentities('CARDREFID introuvable (uniquement lors de l’autorisation).');break;
            case 7005 : $response = htmlentities('Paramètre manquant dans la demande.');break;
            case 7006 : $response = ('CARDREFID déjà existant.');break;
            case 7007 : $response = htmlentities('Aucune autorisation existante pour le SCD.');break;
            default : $response = htmlentities('Error non gerer');break;
        }

        return $response;
    }
    /**
     * @return string
     */
    public function getErrorAuthorization($coderesult)
    {
        switch($coderesult){
            case 0 : $response = htmlentities('Authorization réussi.');break;
            case 61 : $response = htmlentities('La validation de la carte a échoué.');break;
            case 62 : $response = htmlentities('La date d’expiration n’est pas plausible.');break;
            case 63 : $response = htmlentities('La carte a expiré, elle n’est plus valable.');break;
            case 64 : $response = htmlentities('La carte est inconnue, elle n’a pas pu être rattachée à un type de carte.');break;
            case 65 : $response = htmlentities('L’acquirer de la carte a refusé la transaction. Le declined champ AUTHRESULT contient la raison du refus de la part de l’acquirer.');break;
            case 67 : $response = htmlentities('Le terminal ne dispose pas du contrat d’acceptation available pour le type de carte ou pour la devise demandée.');break;
            case 70 : $response = htmlentities('Le pays d’origine de l’IP de la demande n’est pas débloqué dans le Saferpay Risk Management.');break;
            case 83 : $response = htmlentities('Le code de la devise n’est pas valable.');break;
            case 84 : $response = htmlentities('Le montant n’est pas valable.');break;
            case 85 : $response = htmlentities('L’abonnement de transaction est épuisé.');break;
            case 102 : $response = htmlentities('L’acquirer ne prend pas en charge cette fonction.');break;
            case 104 : $response = htmlentities('La carte a été bloquée par le Saferpay Risk Management.');break;
            case 105 : $response = htmlentities('Le pays d’origine de la carte n’est pas débloqué dans le Saferpay Risk Management.');break;
            case 113 : $response = htmlentities('Le numéro de vérification de la carte contient une valeur non valable.');break;
            case 114 : $response = htmlentities('La saisie du numéro de vérification de la carte est absolument nécessaire.');break;
            case 8100 : $response = htmlentities('Le MPI_SESSIONID est inconnu.');break;
            default : $response = htmlentities('Error non gerer');break;
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
    public function payCompleteV2Authorization(AuthorizationResponse $authorizationResponse, $action = 'Settlement', $accountId)
    {
        
        if (is_null($authorizationResponse->getId())) {
            $this->getLogger()->critical('Saferpay: call confirm before complete!');
            throw new \Exception('Saferpay: call confirm before complete!');
        }

        $payCompleteParameter = new PayCompleteParameter();
         
        $payCompleteParameter->setId($authorizationResponse->getId());
          
        $payCompleteParameter->setAccountid($accountId);
         
        $payCompleteParameter->setAction($action);
       
        $data = array_merge($payCompleteParameter->getData(), array('spPassword' => 'XAjc3Kna'));
 
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

        if (substr($payCompleteParameter->getAccountid(), 0, 6) == '99867-') {
            $response = $this->request($payCompleteParameter->getRequestUrl(), array_merge($payCompleteParameter->getData(), array('spPassword' => 'XAjc3Kna')));
        } else {
            $response = $this->request($payCompleteParameter->getRequestUrl(), $payCompleteParameter->getData());
        }

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
           // $this->getLogger()->critical('Saferpay: request failed with statuscode: {statuscode}!', array('statuscode' => $response->getStatusCode()));
            //throw new \Exception('Saferpay: request failed with statuscode: ' . $response->getStatusCode() . '!');
        }

        if (strpos($response->getContent(), 'ERROR') !== false) {
            $this->getLogger()->critical('Saferpay: request failed: {content}!', array('content' => $response->getContent()));
            throw new \Exception('Saferpay: request failed: ' . $response->getContent() . '!');
        }*/

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
