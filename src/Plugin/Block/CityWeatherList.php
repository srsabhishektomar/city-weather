<?php
namespace Drupal\city_weather\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'City Weather' Block.
 *
 * @Block(
 *   id = "city_weather_list",
 *   admin_label = @Translation("City Weather Block"),
 *   category = @Translation("City Weather"),
 * )
 */
class CityWeatherList extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $nids = \Drupal::entityQuery('node')->condition('type','city_weather')->execute();
    $nodes =  \Drupal\node\Entity\Node::loadMultiple($nids);
    return array(
        '#theme' => 'city_weather_list',
        '#rec' => $nodes,
    );
  }
}