<?php

namespace Drupal\camp_presentation\Plugin\GraphQL\Fields;

use Drupal\graphql\GraphQL\Execution\ResolveContext;
use Drupal\graphql\Plugin\GraphQL\Fields\FieldPluginBase;
use GraphQL\Type\Definition\ResolveInfo;

/**
 * Body of the content.
 *
 * @GraphQLField(
 *   id = "comment_body",
 *   secure = true,
 *   name = "commentBody",
 *   type = "String",
 *   parents = {"JsonComment"}
 * )
 */
class Body extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  public function resolveValues($value, array $args, ResolveContext $context, ResolveInfo $info) {
    yield $value['body'];
  }

}
