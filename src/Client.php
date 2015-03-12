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

    public function post( $uri, array $options = array() )
    {
        /** @var $request \Guzzle\Http\Message\Request */
        $request = $this->client->post( $uri, array(), '', array( 'exceptions' => false ) );
        foreach ($options as $key => $value) {
            $request->setPostField( $key, $value );
        }
        return $this->process( $request );
    }

    public function put( $uri, array $options )
    {
        $version = isset( $options['version'] ) ? $options['version'] : '1';
        if ( ! is_numeric( $version )) {
            throw new InvalidIntegerArgumentException();
        }
        $request = $this->client->put( $uri, array(), '', array( 'exceptions' => false ) );
        unset( $options['id'] );
        foreach ($options as $key => $value) {
            $request->setPostField( $key, $value );
        }
        return $this->process( $request );
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

    public function delete( $uri )
    {
        $request = $this->client->delete( $uri, array(), '', array( 'exceptions' => false ) );
        return $this->process( $request );
    }
}