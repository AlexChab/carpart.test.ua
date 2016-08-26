<?php
/**
 * Created by PhpStorm.
 * User: service
 * Date: 23.08.2016
 * Time: 22:42
 */

namespace app\assets;


use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
		//'css/main.css',
	];
	public $js = [
		'js/sb-admin-2.js',
		'js/metisMenu.min.js',
		'/js/jquery.dataTables.min.js',
    //  '/js/dataTables.bootstrap.min.js',
    //  '/js/dataTables.responsive.js',
	];

	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
	];
}