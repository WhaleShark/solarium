<?php

/**
 * Solarium client HTTP exception
 *
 * @package Solarium
 * @subpackage Client
 */
class Solarium_Client_RmnHttpException extends Solarium_Exception
{

    /**
     * HTTP status message
     *
     * @var string
     */
    protected $_statusMessage;

    /**
     * Exception constructor
     *
     * @param string $statusMessage
     * @param array|null $data
     * @param int|null $code
     */
    public function __construct($statusMessage, $data = null, $code = null)
    {
        $this->_statusMessage = $statusMessage;
        $message = 'Solr Error: ';
        if($code)
            $message .= "Response Code: ($code)\n";
        $message .= 'Message: (' . $statusMessage . ')\n';
        $message .= 'Request:(' . $data['request']['q'] . ') \n';
        $message .= 'URI:(' . $data['uri'] . ') \n';


        parent::__construct($message);
    }

    /**
     * Get the HTTP status message
     *
     * @return string
     */
    public function getStatusMessage()
    {
        return $this->_statusMessage;
    }

}