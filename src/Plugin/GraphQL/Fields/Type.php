<?php

namespace Drupal\camp_presentation\Plugin\GraphQL\Fields;

use Drupal\graphql\GraphQL\Execution\ResolveContext;
use Drupal\graphql\Plugin\GraphQL\Fields\FieldPluginBase;
use GraphQL\Type\Definition\ResolveInfo;

/**
 * Retrieves the type of vehicle.
 *
 * @GraphQLField(
 *   id = "type",
 *   secure = true,
 *   name = "type",
 *   type = "String",
 *   parents = {"JsonData","WikipediaData"}
 * )
 */
class Type extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  public function resolveValues($value, array $args, ResolveContext $context, ResolveInfo $info) {
    yield $value['type'];
  }

}
