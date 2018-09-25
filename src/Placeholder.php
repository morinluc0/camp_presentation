<?php

namespace Drupal\camp_presentation;

use GuzzleHttp\Client;
use Drupal\Component\Serialization\Json;

/**
 * Placeholder implementation.
 *
 * Dummy implementation for the sake of of a complete example.
 */
class Placeholder implements PlaceholderInterface {
  /**
   * The list of comments.
   *
   * @var array
   */
  protected $comments = [];

  /**
   * {@inheritdoc}
   */
  public function getComments($id) {
    $return = [];
    // Make the guzzle request to fetch a post.
    try {
      $http_client = new Client();
      $response = $http_client->request('get', 'https://jsonplaceholder.typicode.com/posts/' . $id . '/comments', array());
      $json_data = Json::decode($response->getBody());
      foreach ($json_data as $data) {
        $data['type'] = 'JsonComment';
        $return[] = $data;
      }
    }
    catch (Exception $e) {
      \Drupal::logger('camp_presentation')->error($e->getMessage());
    }
    return $return;
  }

}
