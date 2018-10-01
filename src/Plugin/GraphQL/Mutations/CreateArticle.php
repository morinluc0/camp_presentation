<?php

namespace Drupal\camp_presentation\Plugin\GraphQL\Mutations;

use Drupal\graphql\GraphQL\Type\InputObjectType;
use Drupal\graphql_core\Plugin\GraphQL\Mutations\Entity\CreateEntityBase;
use Drupal\graphql\GraphQL\Execution\ResolveContext;
use GraphQL\Type\Definition\ResolveInfo;

/**
 * Simple mutation for updating an existing article node.
 *
 * @GraphQLMutation(
 *   id = "create_article",
 *   entity_type = "node",
 *   entity_bundle = "article",
 *   secure = true,
 *   name = "createArticle",
 *   type = "EntityCrudOutput",
 *   arguments = {
 *      "input" = "ArticleInput"
 *   }
 * )
 */
class CreateArticle extends CreateEntityBase {

  /**
   * {@inheritdoc}
   */
  protected function extractEntityInput($value, array $args, ResolveContext $context, ResolveInfo $info) {
    return array_filter([
      'title' => $args['input']['title'],
      'body' => $args['input']['body'],
    ]);
  }

}
