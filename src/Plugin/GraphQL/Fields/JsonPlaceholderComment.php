<?php

namespace Drupal\camp_presentation\Plugin\GraphQL\Fields;

use Drupal\graphql\GraphQL\Execution\ResolveContext;
use Drupal\graphql\Plugin\GraphQL\Fields\FieldPluginBase;
use GraphQL\Type\Definition\ResolveInfo;

/**
 * A simple field that returns the simple json placeholder data.
 *
 * @GraphQLField(
 *   id = "json_placeholder_comment",
 *   type = "String",
 *   name = "placeholderComment",
 *   nullable = true,
 *   multi = true,
 *   parents = {"Entity"}
 * )
 */
class JsonPlaceholderComment extends FieldPluginBase {
  /**
   * {@inheritdoc}
   */
  public function resolveValues($value, array $args, ResolveContext $context, ResolveInfo $info) {
    //if ($value instanceof EntityInterface) {
      // Fetch the related json comments from https://jsonplaceholder.typicode.com
    $resolve_value = array('hello', 'world');
    foreach ($resolve_value as $text) {
      yield $text;
    }
  }
}
