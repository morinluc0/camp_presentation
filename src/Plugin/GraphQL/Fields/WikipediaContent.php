<?php

namespace Drupal\camp_presentation\Plugin\GraphQL\Fields;

use Drupal\Core\DependencyInjection\DependencySerializationTrait;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\graphql\GraphQL\Execution\ResolveContext;
use Drupal\graphql\Plugin\GraphQL\Fields\FieldPluginBase;
use Drupal\camp_presentation\WikipediaInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use GraphQL\Type\Definition\ResolveInfo;
use Drupal\taxonomy\Entity\Term;

/**
 * List everything we've got in our garage.
 *
 * @GraphQLField(
 *   id = "wikipedia_content",
 *   secure = true,
 *   name = "wikipediaContent",
 *   type = "[WikipediaData]",
 *   nullable = true,
 *   parents = {"TaxonomyTerm"}
 * )
 */
class WikipediaContent extends FieldPluginBase implements ContainerFactoryPluginInterface {
  use DependencySerializationTrait;

  /**
   * The placeholder instance.
   *
   * @var \Drupal\camp_presentation\WikipediaInterface
   */
  protected $wikipedia;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $pluginId, $pluginDefinition) {
    return new static($configuration, $pluginId, $pluginDefinition, $container->get('camp_presentation.wikipedia'));
  }

  /**
   * Garage constructor.
   *
   * @param array $configuration
   *   The plugin configuration array.
   * @param string $pluginId
   *   The plugin id.
   * @param mixed $pluginDefinition
   *   The plugin definition array.
   * @param \Drupal\camp_presentation\wikipediaInterface $wikipedia
   *   The placeholder service.
   */
  public function __construct(array $configuration, $pluginId, $pluginDefinition, WikipediaInterface $wikipedia) {
    $this->wikipedia = $wikipedia;
    parent::__construct($configuration, $pluginId, $pluginDefinition);
  }

  /**
   * {@inheritdoc}
   */
  public function resolveValues($value, array $args, ResolveContext $context, ResolveInfo $info) {
    if ($value instanceof Term) {
      foreach ($this->wikipedia->getWikipediaContent($value->getName()) as $comment) {
        yield $comment;
      }
    }
  }

}
