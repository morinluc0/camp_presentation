<?php

namespace Drupal\camp_presentation\Plugin\GraphQL\Types;

use Drupal\graphql\GraphQL\Execution\ResolveContext;
use Drupal\graphql\Plugin\GraphQL\Types\TypePluginBase;
use GraphQL\Type\Definition\ResolveInfo;

/**
 * A comment type.
 *
 * @GraphQLType(
 *   id = "wikipedia_page",
 *   name = "WikipediaPage",
 *   interfaces = {"WikipediaData"}
 * )
 */
class WikipediaPage extends TypePluginBase {

  /**
   * {@inheritdoc}
   */
  public function applies($object, ResolveContext $context, ResolveInfo $info) {
    return $object['type'] == 'WikipediaPage';
  }
}
