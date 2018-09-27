<?php

namespace Drupal\camp_presentation;

use GuzzleHttp\Client;
use Drupal\Component\Serialization\Json;

/**
 * Wikipedia Implementation.
 *
 * Dummy implementation for the sake of of a complete example.
 */
class Wikipedia implements WikipediaInterface {

  /**
   * {@inheritdoc}
   */
  public function getWikipediaContent($tag) {
    $return = [];
    // Make the guzzle request to fetch a wikipedia page.
    try {
      $query = [
        'action' => 'parse',
        'section' => '0',
        'prop' => 'text',
        'page' => $tag,
      ];

      $url = 'https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro&explaintext&redirects=1&titles=' . $tag;
      $http_client = new Client();
      $response = $http_client->request('get', $url, array());

      $json_data = Json::decode($response->getBody());

      foreach ($json_data['query']['pages'] as $data) {
        $data['type'] = 'WikipediaPage';
        $data['id'] = $data['pageid'];
        $return[] = $data;
      }
    }
    catch (Exception $e) {
      \Drupal::logger('camp_presentation')->error($e->getMessage());
    }
    return $return;
  }

}
