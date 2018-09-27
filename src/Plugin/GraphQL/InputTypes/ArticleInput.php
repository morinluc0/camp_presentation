<?php

namespace Drupal\camp_presentation\Plugin\GraphQL\InputTypes;

use Drupal\graphql\Plugin\GraphQL\InputTypes\InputTypePluginBase;

/**
 * The input type for article mutations.
 *
 * @GraphQLInputType(
 *   id = "article_input",
 *   name = "ArticleInput",
 *   fields = {
 *     "title" = "String",
 *     "body" = {
 *        "type" = "String",
 *        "nullable" = "TRUE"
 *     }
 *   }
 * )
 */
class ArticleInput extends InputTypePluginBase {

}
