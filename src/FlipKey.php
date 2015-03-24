<?php

namespace FlipKey;

class FlipKey
{
    protected $client = null;

    public function __construct($key, $remoteId, $client = null)
    {
        $this->client = ( is_null($client)) ? new Client($key, $remoteId) : $client;
    }

    public function getProperty($propertyCode)
    {
        $result = $this->client->get($propertyCode);

        if(!$result) {
            return false;
        }

        return new Property($this->client->detail);
    }
}
