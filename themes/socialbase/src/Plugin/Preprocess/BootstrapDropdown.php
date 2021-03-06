<?php
/**
 * @file
 * Contains \Drupal\socialbase\Plugin\Preprocess\BootstrapDropdown.
 */

namespace Drupal\socialbase\Plugin\Preprocess;

use Drupal\bootstrap\Utility\Variables;
use Drupal\bootstrap\Utility\Unicode;

/**
 * Pre-processes variables for the "bootstrap_dropdown" theme hook.
 *
 * @ingroup plugins_preprocess
 *
 * @BootstrapPreprocess("bootstrap_dropdown")
 */
class BootstrapDropdown extends \Drupal\bootstrap\Plugin\Preprocess\BootstrapDropdown {

  /**
   * {@inheritdoc}
   */
  public function preprocess(array &$variables, $hook, array $info) {
    parent::preprocess($variables, $hook, $info);
    if (isset($variables['items']['#items']['publish']['element']['#button_type']) && $variables['items']['#items']['publish']['element']['#button_type'] == 'primary') {
      $variables['alignment'] = 'right';

      if (isset($variables['toggle'])) {
        $variables['toggle']['#button_type'] = 'primary';
        $variables['toggle']['#button_level'] = 'raised';

      }

    }

  }

  protected function preprocessLinks(Variables $variables) {
    parent::preprocessLinks($variables);

    $operations = !!Unicode::strpos($variables->theme_hook_original, 'operations');

    // Make operations button small, not smaller ;).
    // Bootstrap basetheme override

    if ($operations) {
      $variables->toggle['#attributes']['class'] = ['btn-sm'];
      $variables['btn_context'] = 'operations';
      $variables['alignment'] = 'right';
    }

  }

}
