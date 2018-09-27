<?php

namespace Drupal\camp_presentation;

/**
 * Interface definition for a Wikipedia.
 *
 * Used for testing GraphQL queries and mutations.
 */
interface WikipediaInterface {

  /**
   * Retrieve wikipedia content for taxonomy.
   *
   * @param string tag
   *   string text of the wikipedia article to fetch.
   * @return string
   *   The wikipedia article
   */
  public function getWikipediaContent($tag);

}
