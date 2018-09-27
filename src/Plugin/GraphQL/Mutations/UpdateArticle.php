<?php

namespace Drupal\camp_presentation\Plugin\GraphQL\Mutations;

use Drupal\graphql\GraphQL\Type\InputObjectType;
use Drupal\graphql_core\Plugin\GraphQL\Mutations\Entity\UpdateEntityBase;
use Drupal\graphql\GraphQL\Execution\ResolveContext;
use GraphQL\Type\Definition\ResolveInfo;

/**
 * Simple mutation for updating an existing article node.
 *
 * @GraphQLMutation(
 *   id = "update_article",
 *   entity_type = "node",
 *   entity_bundle = "article",
 *   secure = true,
 *   name = "updateArticle",
 *   type = "EntityCrudOutput",
 *   arguments = {
 *      "id" = "String",
 *      "input" = "ArticleInput"
 *   }
 * )
 */
class UpdateArticle extends UpdateEntityBase {

  /**
   * {@inheritdoc}
   */
  protected function extractEntityInput($value, array $args, ResolveContext $context, ResolveInfo $info) {
    ksm($args);
    ksm($value);
    return array_filter([
      'title' => $args['input']['title'],
      'body' => $args['input']['body'],
    ]);
  }

}
