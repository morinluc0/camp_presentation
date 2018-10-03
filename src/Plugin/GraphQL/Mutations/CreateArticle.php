<?php

namespace Drupal\camp_presentation\Plugin\GraphQL\Mutations;

use Drupal\graphql\GraphQL\Type\InputObjectType;
use Drupal\graphql_core\Plugin\GraphQL\Mutations\Entity\CreateEntityBase;
use Drupal\graphql\GraphQL\Execution\ResolveContext;
use GraphQL\Type\Definition\ResolveInfo;
use \Drupal\taxonomy\Entity\Term;

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
 *      "title" = "String",
 *      "description" = "String",
 *      "fieldTags" = "String"
 *   }
 * )
 */
class CreateArticle extends CreateEntityBase {

  /**
   * {@inheritdoc}
   */
  protected function extractEntityInput($value, array $args, ResolveContext $context, ResolveInfo $info) {
    // Split the fieldtags and check if they exist. 
    $field_tags = [];
    if (isset($args['fieldTags']) && !empty($args['fieldTags'])) {
      $exploded = explode(',', $args['fieldTags']);
      foreach ($exploded as $term) {
        $loaded = \Drupal::entityManager()->getStorage('taxonomy_term')->loadByProperties(['name' => $term]);
        if (!empty($loaded)) {
          $field_tags[] = reset($loaded);
        }
        else {
          $new_term = Term::create([
            'name' => $term, 
            'vid' => 'tags',
          ]);
          $new_term->save();
	  $field_tags[] = $new_term->id();
        }
      }
    }
 
    return array_filter([
      'title' => $args['title'],
      'body' => $args['body'],
      'field_tags' => $field_tags,
    ]);
  }

}
