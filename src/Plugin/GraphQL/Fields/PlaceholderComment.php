<?php

namespace Drupal\camp_presentation\Plugin\GraphQL\Fields;

use Drupal\Core\DependencyInjection\DependencySerializationTrait;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\graphql\GraphQL\Execution\ResolveContext;
use Drupal\graphql\Plugin\GraphQL\Fields\FieldPluginBase;
use Drupal\camp_presentation\PlaceholderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use GraphQL\Type\Definition\ResolveInfo;
use Drupal\node\Entity\Node;

/**
 * List everything we've got in our garage.
 *
 * @GraphQLField(
 *   id = "placeholder_comment",
 *   secure = true,
 *   name = "placeholderComment",
 *   type = "[JsonData]",
 *   nullable = true,
 *   parents = {"Entity"}
 * )
 */
class PlaceholderComment extends FieldPluginBase implements ContainerFactoryPluginInterface {
  use DependencySerializationTrait;

  /**
   * The placeholder instance.
   *
   * @var \Drupal\camp_presentation\PlaceholderInterface
   */
  protected $placeholder;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $pluginId, $pluginDefinition) {
    return new static($configuration, $pluginId, $pluginDefinition, $container->get('camp_presentation.placeholder'));
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
   * @param \Drupal\camp_presentation\PlaceholderInterface $placeholder
   *   The placeholder service.
   */
  public function __construct(array $configuration, $pluginId, $pluginDefinition, PlaceholderInterface $placeholder) {
    $this->placeholder = $placeholder;
    parent::__construct($configuration, $pluginId, $pluginDefinition);
  }

  /**
   * {@inheritdoc}
   */
  public function resolveValues($value, array $args, ResolveContext $context, ResolveInfo $info) {
    if ($value instanceof Node) {
      foreach ($this->placeholder->getComments($value->id()) as $comment) {
        yield $comment;
      }
    }
  }

}
