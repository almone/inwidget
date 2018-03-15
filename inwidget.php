<?php

/**
 * Inwidget plugin
 *
 * @package   Kirby CMS
 * @author    Sergey Arustamov
 * @link      http://arustamov.com
 * @version   0.0.1
 */

function inwidget() {

  require_once 'classes/InstagramScraper.php';
  require_once 'classes/Unirest.php';
  require_once 'classes/InWidget.php';

  try {

    // Set options through class constructor

    $config = array(
      'LOGIN' => 'sergey_arustamov',
      'HASHTAG' => '',
      'ACCESS_TOKEN' => '',
      'tagsBannedLogins' => '',
      'tagsFromAccountOnly' => false,
      'imgRandom' => true,
      'imgCount' => 30,
      'cacheExpiration' => 6,
      'cacheSkip' => false,
      'cachePath' => __DIR__.'/cache/',
      'skinDefault' => 'default',
      'skinPath'=> '/site/plugins/inwidget/skins/',
      'langDefault' => 'ru',
      'langAuto' => false,
      'langPath' => __DIR__.'/langs/',
    );
    $inWidget = new \inWidget\Core($config);

    // Change default values of properties

    $inWidget->width = 800; // widget width in pixels
    $inWidget->inline = 4; // number of images in single line
    $inWidget->view = 4; // number of images in widget
    $inWidget->toolbar = false; // show profile avatar, statistic and action button
    $inWidget->preview = 'large'; // quality of images: small, large, fullsize
    $inWidget->adaptive = true; // enable adaptive mode
    $inWidget->skipGET = true; // skip GET variables to avoid name conflicts
    $inWidget->setOptions(); // apply new values


    $inWidget->getData();
    include 'template.php';

  }
  catch (\Exception $e) {
    echo $e->getMessage();
  }

}
