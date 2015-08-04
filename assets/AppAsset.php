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
        'css/app.css',
		'css/font.css',
		'assets/animate.css/animate.css',
		'assets/font-awesome/css/font-awesome.min.css',
		'simple-line-icons/css/simple-line-icons.css',
    ];
    public $js = [
	'js/ui-load.js',
	'js/ui-jp.js',
	'js/ui-jp.config.js',
	'js/ui-nav.js',
	'js/ui-toggle.js',
	'js/ui-client.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
