<?php

/**
 * @file
 * RandomShoesController
 */

namespace Drupal\random_shoes\Controller;

use Drupal\Core\Controller\ControllerBase;

class RandomShoesController extends ControllerBase
{
  public function getRandomDogs()
  {
    $urlApi = 'https://dog.ceo/api/breeds/image/random';

    $html = '';

    for ($i = 0; $i < 8; $i++) {

      $data = file_get_contents($urlApi);
      $data = json_decode($data, TRUE);

      $shoesImage = $data['message'];

      $html .= "<div class='col-12 col-sm-6 col-md-4 col-lg-3'>
        <img height='200' width='200' class='img-fluid rounded img-thumbnail' alt='#' src='$shoesImage' />
      </div>";
    }

    return [
      '#type' => 'markup',
      '#markup' => $this->t('
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="d-flex flex-wrap">
                ' . $html . '
              </div>
            </div>
          </div>
        </div>
      '),
    ];
  }

}
