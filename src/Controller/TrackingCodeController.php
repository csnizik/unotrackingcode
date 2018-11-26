<?php

namespace Drupal\tracking_code\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
* Class TrackingCodeController : Define Tracking Code Options.
*
* @package Drupal\tracking_code\TrackingCodeController
*/
class TrackingCodeController extends ControllerBase {
  /**
  * {@inheritdoc}
  */
  public function getTrackingCode(){
    // Get the Tracking Code settings.
    $tracking_code_config = $this->config('tracking_code.settings');

    $build = [
      '#type' => 'snippet',
      '#markup' => '',
      '#prefix' => '<div class="snippet_container">"'. $this->('@foo') . '</div>',
      '#suffix' => '</div>',
      '#attached' => [
        'drupalSettings' => [
          'sample_snippets' => $tracking_code_config->get('sample_snippets'),
        ],
        'http_header' => [
          ['Tracking Codes', 'Sample Snippets'],
        ],
        'html_head_link' => [
          [
            [
              'rel' => 'author',
              'href' => 'http://www.snizik.com',
            ],
          ],
        ],
        'html_head' => [
          [
            [
              '#tag' => 'meta',
              '#attributes' => [
                'name' => 'Tracking Codes',
                'description' => 'Sample Snippets',
              ],
            ],
            'Tracking Codes',
          ],
        ],
        'feed' => [
          '/rss.xml', 'Default Feeds by Drupal Core.'],
        ],
        'placeholders' => [
          "@foo" => ["#markup" => "Sample Snippets:"],
        ],
        ] ,
    ];
    return $build;
  }
}
