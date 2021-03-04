---
sidebarDepth:1
---

# XGEE生成器

安装生成器：

```php
composer require xbhub/laravel-xgee --dev
```

以下需要按步骤生成:
```php

// step1:生成model,migrate,repository,policy
php artisan biu:make-model Post --fillable=string:title,text:content --module=Ticket

// step2:生成数据库，在此步之前可自行修改migrate和model内的fillable字段
php artisan migrate

// step3:生成controller,request,resource
php artisan biu:make-controller Post --module=Ticket

// step4:生成视图['create', 'edit', 'fields', 'index'];
php artisan biu:make-view Post --module=Ticket

// step5: 添加资源路由：
Route::resource('post', 'PostController');

// step6:配置后台菜单，打开module.json => 添加menus选项
"menus": [
  ...
    {"name": "ticket_post", "icon": "", "label": "内容管理", "route": "ticket.post.index"}
  ...
]

```

接下来，你就可以在菜单中找到刚才配置的路由，点开路由看到下图说明一切顺利~
以上步骤已经完成了一套curd，下面配置好路由和后台菜单就跑起来了~

如果你嫌弃以上步骤过于复杂，可以自定义命令组合调用以上脚本即可。目前保持单条命令行执行，方便你自定义model和migrate文件，如果一条命令执行完毕，意味着你又要记忆大量migration相关api了，这又违背了我们尽量少api的初衷。当然，如果愿意，你可以基于此做一个gui，如果你完成了，欢迎你提交代码到lumina~
