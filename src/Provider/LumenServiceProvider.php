<?php

/**
 * Auther: stevewoo
 * Date: 01/04/2017 12:13 PM
 * @author stevewoo <stevewoo@labyun.cn>
 * @copyright COPYRIGHT © 2017,LABYUN.CN ALL RIGHTS RESERVED
 */
namespace STWOO\SMS\Provider;
use Illuminate\Support\ServiceProvider;

class LumenServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //从应用根目录的config文件夹中加载用户的jwt配置文件
        $this->app->configure('sms');

        //获取扩展包配置文件的真实路径
        $path = realpath(__DIR__ . '/../../config/sms.php');

        //将扩展包的配置文件merge进用户的配置文件中
        $this->mergeConfigFrom($path, 'sms');
    }
}