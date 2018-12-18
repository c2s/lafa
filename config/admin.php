<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-03-01 23:18
 */

use Illuminate\Support\Facades\Auth;

return [

    // 后台的 URI
    'uri' => 'admin',

    // 后台专属域名，没有的话可以留空
    'domain' => '',

    'paginate' => [
        'limit' => 15,
    ],


    /**
     * 后台菜单数组
     */
    'menu' => [
        [
            "id" => "system",
            "text" => "系统设置",
            "permission" => function(){ return Auth::user()->can('manage_system'); },
            "icon" => "icon-cog",
            "route" => "",
            "params" => [],
            "children" => [
                [
                    "id" => "system.users",
                    "text" => "用户管理",
                    "permission" => function(){ return Auth::user()->can('manage_users'); },
                    "icon" => "icon-user",
                    "link" => "",
                    "route" => "users.index",
                    "params" => [],
                    "query" => [],
                ],
                [
                    "id" => "system.permissions",
                    "text" => "权限管理",
                    "permission" => function(){ return Auth::user()->can('manage_permissions'); },
                    "icon" => "icon-circle",
                    "link" => "",
                    "route" => "permissions.index",
                    "params" => [],
                    "query" => [],
                ],
                [
                    "id" => "system.roles",
                    "text" => "角色管理",
                    "permission" => function(){ return Auth::user()->can('manage_roles'); },
                    "icon" => "icon-group",
                    "link" => "",
                    "route" => "roles.index",
                    "params" => [],
                    "query" => [],
                ],
            ],
        ],

        [
            "id" => "website",
            "text" => "站点设置",
            "permission" => function(){ return Auth::user()->can('manage_setting'); },
            "icon" => "icon-sitemap",
            "link" => "",
            "route" => "",
            "params" => [],
            "children" => [
                [
                    "id" => "website.basic",
                    "text" => "站点信息",
                    "permission" => function(){ return Auth::user()->can('manage_site_basic'); },
                    "icon" => "icon-ie",
                    "link" => "",
                    "route" => "admin.site.basic",
                    "params" => [],
                    "query" => [],
                ],
                [
                    "id" => "website.company",
                    "text" => "公司信息",
                    "permission" => function(){ return Auth::user()->can('manage_site_company'); },
                    "icon" => "icon-home",
                    "link" => "",
                    "route" => "admin.site.company",
                    "params" => [],
                    "query" => [],
                ],
                [
                    "id" => "website.contact",
                    "text" => "联系方式",
                    "permission" => function(){ return Auth::user()->can('manage_site_contact'); },
                    "icon" => "icon-phone",
                    "link" => "",
                    "route" => "admin.site.contact",
                    "params" => [],
                    "query" => [],
                ],
                [
                    "id" => "website.link",
                    "text" => "友情链接",
                    "permission" => function(){ return Auth::user()->can('manage_links'); },
                    "icon" => "icon-link",
                    "link" => "",
                    "route" => "links.index",
                    "params" => [],
                    "query" => [],
                ],
                [
                    "id" => "website.navigation",
                    "text" => "栏目导航",
                    "permission" => function(){ return Auth::user()->can('manage_navigation'); },
                    "icon" => "icon-th-large",
                    "link" => "",
                    "route" => "admin.navigation.index",
                    "params" => ['desktop'],
                    "query" => [],
                ],
                [
                    "id" => "website.wechat",
                    "text" => "微信管理",
                    "permission" => function(){ return Auth::user()->can('manage_wechat'); },
                    "icon" => "icon-wechat",
                    "link" => "",
                    "route" => "wechats.index",
                    "params" => [],
                    "query" => [],
                ],

            ],
        ],

        [
            "id" => "content",
            "text" => "内容管理",
            "permission" => function(){ return Auth::user()->can('manage_content'); },
            "icon" => "icon-bars",
            "route" => "",
            "params" => [],
            "children" => [
                [
                    "id" => "content.category.article",
                    "text" => "内容分类",
                    "permission" => function(){ return Auth::user()->can('manage_category'); },
                    "icon" => "icon-list-ul",
                    "link" => "",
                    "route" => "admin.category.index",
                    "params" => ['article'],
                    "query" => [],
                ],
                [
                    "id" => "content.article.article",
                    "text" => "内容管理",
                    "permission" => function(){ return Auth::user()->can('manage_article'); },
                    "icon" => "icon-paste",
                    "link" => "",
                    "route" => "articles.index",
                    "params" => [],
                    "query" => [ "type=article", ],
                ],
                [
                    "id" => "content.article.video",
                    "text" => "视频管理",
                    "permission" => function(){ return Auth::user()->can('manage_article'); },
                    "icon" => "icon-play-sign",
                    "link" => "",
                    "route" => "articles.index",
                    "params" => [],
                    "query" => [ "type=video", ],
                ],

                [
                    "id" => "content.page",
                    "text" => "页面管理",
                    "permission" => function(){ return Auth::user()->can('manage_page'); },
                    "icon" => "icon-archive",
                    "link" => "",
                    "route" => "pages.index",
                    "params" => [],
                    "query" => [],
                ],
                [
                    "id" => "content.slide",
                    "text" => "幻灯管理",
                    "permission" => function(){ return Auth::user()->can('manage_slide'); },
                    "icon" => "icon-sliders",
                    "link" => "",
                    "route" => "slides.index",
                    "params" => [],
                    "query" => [],
                ],
                [
                    "id" => "content.block",
                    "text" => "区块管理",
                    "permission" => function(){ return Auth::user()->can('manage_block'); },
                    "icon" => "icon-check-empty",
                    "link" => "",
                    "route" => "blocks.index",
                    "params" => [],
                    "query" => [],
                ],

                [
                    "id" => "content.images",
                    "text" => "图片管理",
                    "permission" => function(){ return Auth::user()->can('manage_images'); },
                    "icon" => "icon-file-image",
                    "link" => "",
                    "route" => "media.image",
                    "params" => [],
                    "query" => [],
                ],
                [
                    "id" => "content.form.feedback",
                    "text" => "意见反馈",
                    "permission" => function(){ return Auth::user()->can('manage_form'); },
                    "icon" => "icon-file-image",
                    "link" => "",
                    "route" => "form.index",
                    "params" => ['feedback'],
                    "query" => [],
                ],
                /*
            [
                "id" => "content.annex",
                "text" => "附件管理",
                "permission" => function(){ return Auth::user()->can('manage_annex'); },
                "icon" => "",
                "link" => "",
                "route" => "",
                "params" => [],
                "query" => [],
            ],
            */
            ],
        ],



    ],

    // 快捷方式
    'shortcut' => [
        [
            "id" => "dashboard",
            "text" => "控制台",
            "permission" => function(){ return true; },
            "icon" => "",
            "route" => "admin.dashboard",
            "params" => [],
            "query" => [],
            "link" => "",
            "children" => [],
        ],
        [
            "id" => "develop",
            "text" => "开发调试",
            "permission" => function(){ return Auth::user()->can('manage_develop'); },
            "icon" => "",
            "link" => "",
            "route" => "",
            "params" => [],
            "query" => [],
            "children" => [
                [
                    "id" => "develop.log",
                    "text" => "系统日志",
                    "permission" => function(){ return Auth::user()->can('manage_develop'); },
                    "icon" => "",
                    "link" => "",
                    "route" => "log.laravel",
                    "params" => [],
                    "query" => [],
                ],
                [
                    "id" => "develop.task",
                    "text" => "任务日志",
                    "permission" => function(){ return Auth::user()->can('manage_develop'); },
                    "icon" => "",
                    "link" => "",
                    "route" => "log.jobs",
                    "params" => [],
                    "query" => [],
                ],
                [
                    "id" => "develop.queue",
                    "text" => "队列状态",
                    "permission" => function(){ return Auth::user()->can('manage_develop'); },
                    "icon" => "",
                    "link" => "",
                    "route" => "log.queue",
                    "params" => [],
                    "query" => [],
                ],
                [
                    "id" => "develop.behavior",
                    "text" => "行为日志",
                    "permission" => function(){ return Auth::user()->can('manage_develop'); },
                    "icon" => "",
                    "link" => "",
                    "route" => "log.behavior",
                    "params" => [],
                    "query" => [],
                ],
                [
                    "id" => "develop.business",
                    "text" => "业务日志",
                    "permission" => function(){ return Auth::user()->can('manage_develop'); },
                    "icon" => "",
                    "link" => "",
                    "route" => "log.business",
                    "params" => [],
                    "query" => [],
                ],
            ],
        ],
        [
            "id" => "github",
            "text" => "Github",
            "permission" => function(){ return true; },
            "icon" => "",
            "route" => "",
            "params" => [],
            "query" => [],
            "link" => "https://github.com/wanglelecc",
            "children" => [],
        ],
    ],

];