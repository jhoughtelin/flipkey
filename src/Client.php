<?php
namespace FlipKey;

use Guzzle\Http;

class Client
{
    const USER_AGENT = 'flipkey-php/0.0.1';
    protected $baseURI = 'https://data.flipkey.com/feeds/reviews_remoteid/';
    protected $apiKey = '';
    protected $client = null;
    protected $request = null;
    public $response = null;
    public $statusCode = null;
    public $detail = null;

    public function __construct( $key, $remoteId, $httpClient = null )
    {
        $this->apiKey = $key;
        $this->remoteId = $remoteId;
        $this->client = ( is_null( $httpClient ) ) ? new Http\Client( $this->baseURI . $this->apiKey . "/" . $this->remoteId . "/" ) : $httpClient;
        $this->client->setUserAgent( $this::USER_AGENT . '/' . PHP_VERSION );
    }

    protected function process( $request )
    {
        $request->setHeader( 'Authorization', 'Bearer ' . $this->apiKey );
        $this->response   = $request->send();
        $this->statusCode = $this->response->getStatusCode();
        $this->detail     = $this->response->xml();
        return $this->response->isSuccessful();
    }

    public function get( $uri, array $parameters = array() )
    {
        $request = $this->client->get( $uri, array(), array( 'exceptions' => false ) );
        foreach ($parameters as $key => $value) {
            $request->getQuery()->set( $key, $value );
        }
        $this->process( $request );
        return $this->response->xml();
    }
}