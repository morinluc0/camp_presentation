<?php

namespace Drupal\camp_presentation\Plugin\GraphQL\Fields;

use Drupal\graphql\GraphQL\Execution\ResolveContext;
use Drupal\graphql\Plugin\GraphQL\Fields\FieldPluginBase;
use GraphQL\Type\Definition\ResolveInfo;

/**
 * Body of the content.
 *
 * @GraphQLField(
 *   id = "comment_name",
 *   secure = true,
 *   name = "commentName",
 *   type = "String",
 *   parents = {"JsonData"}
 * )
 */
class Name extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  public function resolveValues($value, array $args, ResolveContext $context, ResolveInfo $info) {
    yield $value['name'];
  }

}
