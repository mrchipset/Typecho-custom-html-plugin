<?php

namespace TypechoPlugin\CustomHtmlPlugin;

use Typecho\Plugin\PluginInterface;
use Typecho\Widget\Helper\Form;
use Typecho\Widget\Helper\Form\Element\Textarea;

use Widget\Options;

if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}

/**
 * Custom Html Plugin
 *
 * @package CustomHtmlPlugin
 * @author Mr.Chip
 * @version 0.0.1
 * @link https://www.xtigerkin.com
 */

class Plugin implements PluginInterface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     */
    public static function activate()
    {
        \Typecho\Plugin::factory('Widget_Archive')->header = __CLASS__ . '::header';
        \Typecho\Plugin::factory('Widget_Archive')->footer = __CLASS__ . '::footer';
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     */
    public static function deactivate()
    {
    }

    /**
     * 插件实现方法
     * 
     * @access public
     * @return void
     */
    public static function render() {

    }

    /**
     * 获取插件配置面板
     *
     * @param Form $form 配置面板
     */
    public static function config(Form $form)
    {
        $header = new Textarea('header', null, '', _t('Header Codes, metas, stylesheet, scripts'));
        $footer = new Textarea('footer', null, '', _t('Footer scripts, html footer'));

        $form->addInput(input: $header);
        $form->addInput(input: $footer);

    }

    /**
     * 个人用户的配置面板
     *
     * @param Form $form
     */
    public static function personalConfig(Form $form)
    {
    }

    /**
     * 插件实现方法 header
     *
     * @access public
     * @return void
     */
    public static function header(...$args)
    {

        
        $header = Options::alloc()->plugin('CustomHtmlPlugin')->header;
        if (!is_null($header)) {
            echo $header;
        }
    }

    /**
     * 插件实现方法 header
     *
     * @access public
     * @return void
     */
    public static function footer(...$args)
    {

        $footer = Options::alloc()->plugin('CustomHtmlPlugin')->footer;
        if (!is_null($footer)) {
            echo $footer;
        }

    }
}

