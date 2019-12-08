<?php

namespace Tanseercena\Quotes;

use GuzzleHttp\Client;

class Quotes {

  protected $random;

  protected $limit;

  protected $quotes;

  private $client;

  private $api_endpoint = 'https://api.quotable.io/';

  public function __construct($random = true, $limit=1, $quotes = []){
    $this->random = true;
    $this->limit = 1;
    $this->quotes = [];
    $this->client = new Client();
  }

  public function setRandom($random){
    $this->random = $random;
  }

  public function setLimit($limit){
    $this->limit = $limit;
  }

  public function getApiEndpoint(){
    $url = $this->api_endpoint;

    if($this->random){
      return $url.'random';
    }

    // Set Limit and other parameter below
    // TODO
  }


  public function getQuotes($random = true, $limit = 1){
    $this->setRandom($random);
    $this->setLimit($limit);

    $url = $this->getApiEndpoint();

    $response = $this->client->request('GET',$url);

    if($response->getStatusCode() != 200)
      return false;

    if($response->getStatusCode() == 200){
      $quotes = json_decode((string)$response->getBody(),true);
      $this->quotes = $quotes;
    }

    return $this->quotes;
  }
}
