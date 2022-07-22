<?php

/**
 * @file
 * RandomShoesBlock.
 */

namespace Drupal\random_shoes\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'RandomShoesBlock' block.
 *
 * @Block(
 *  id = "random_shoes_block",
 *  admin_label = @Translation("Random Dogs block"),
 *  category = @Translation("Random Shoes"),
 * )
 */

class RandomShoesBlock extends BlockBase
{

  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $shoesUrl = "https://dog.ceo/api/breeds/image/random";


    $data = file_get_contents($shoesUrl);
    $data = json_decode($data, TRUE);

    $ShoesImage = $data['message'];

    $html = "<div>
        <img height='200' width='200' class='img-fluid rounded img-thumbnail' alt='#' src='$ShoesImage' />
      </div>";

    return [
      '#type' => 'markup',
      '#markup' => $this->t('
        <div class="d-flex justify-content-center text-center align-items-center flex-column">
          ' . $html . '
          <a href="/random-dogs" title="Dog generator">
            <img height="80" width="80" src="http://www.retrovisiones.com/wp-content/uploads/2011/10/circulo.jpg" />
          </a>
        </div>
      '),
    ];
  }
}
