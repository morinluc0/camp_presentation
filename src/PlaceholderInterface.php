<?php

namespace Drupal\camp_presentation;

/**
 * Interface definition for a Placeholder.
 *
 * Used for testing GraphQL queries and mutations.
 */
interface PlaceholderInterface {

  /**
   * Retrieve a list commentsdata.
   *
   * @param int $id
   *   id of the post comments to fetch.
   * @return mixed
   *   The list of comment.
   */
  public function getComments($id);

}
