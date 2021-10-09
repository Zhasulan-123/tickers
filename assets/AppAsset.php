<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'template/plugins/fontawesome-free/css/all.min.css',
        'template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
        'template/plugins/toastr/toastr.min.css',
        'template/dist/css/adminlte.min.css',
    ];
    public $js = [
        'template/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'template/plugins/datatables/jquery.dataTables.min.js',
        'template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
        'template/plugins/toastr/toastr.min.js',
        'template/plugins/jquery-validation/jquery.validate.min.js',
        'template/plugins/jquery-validation/additional-methods.min.js',
        'template/plugins/moment/moment.min.js',
        'template/dist/js/adminlte.min.js',
        'template/dist/js/demo.js',
    ];
    public $depends = [
        'app\assets\JqueryAsset'
    ];
}
