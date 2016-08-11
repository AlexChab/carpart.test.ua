<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      'css/main.css',
    ];
    public $js = [
      'js/main.js',
      'js/sb-admin-2.js',
      'js/metisMenu.min.js',
      'js/bootstrap.min.js',
      '/js/jquery.dataTables.min.js',
//      '/js/dataTables.bootstrap.min.js',
//      '/js/dataTables.responsive.js',
    ];
    public $depends = [
      'yii\web\YiiAsset',
      'yii\bootstrap\BootstrapAsset',
    ];
}
