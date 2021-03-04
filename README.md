<p align="center"><a href="http://wd.xbhub.com" target="_blank" rel="noopener noreferrer"><img width="100" src="http://cdn.xbhub.com/wdcms.png" alt="Wdcms"></a></p>

<h2 align="center">SAAS软件快速开发方案（PHP）</h2>

<div align="center">

<a href="https://www.php.net"><img src="https://img.shields.io/badge/php-%3E=7.4-brightgreen.svg?maxAge=2592000" alt="Php Version"></a>
  <a href="https://github.com/mochat-cloud/mochat/blob/master/LICENSE"><img src="https://img.shields.io/badge/license-GPL3-blue" alt="wdcmsLicense"></a>

</div>

### 项目简介

WDCMS是开源企业级SASS服务开发框架&引擎，wdcms保持着高效的开发体验及强大的稳定易用性，也保持的及其灵活的可扩展性。

#### 功能特性

SAAS特点：
*  单数据库、多数据库模式无缝切换（多数据库暂未做多模块兼容，如有需求请联系我）
*  非破坏性迁移，传统laravel项目也可以轻松切换到wdcms中
*  租户子域名分配，租户内部权限管理，租户模块权限管理
*  资源隔离：文件存储、redis、缓存隔离

基础模块：

* [核心模块](https://gitee.com/wdcms/core-module)：通过多渠道活码获取客户，条理有序分类
* [社交登录](https://gitee.com/wdcms/social-module)：微信/支付宝/抖音/QQ/淘宝/头条/豆瓣
* [文件引擎](https://gitee.com/wdcms/file-module)：阿里OSS/腾讯COS/七牛一键切换
* [定时任务](https://gitee.com/wdcms/task-module)：SAAS版本定时任务解决方案
* [支付引擎](https://gitee.com/wdcms/payment-module)：支付聚合平台，支付宝/微信/银联/头条
* [电商引擎](https://gitee.com/wdcms/shop-module)：完备的电商业务模型

#### 自研SASS模块供三方使用

wdcms支持自研模块，只需少许配置即可。
> 使用之前请仔细学习下 [laravel-modules](https://github.com/nWidart/laravel-modules)

eq: 你新建模块名：Shop，实现租户模块只需加入以下配置
```php
// 租户路由全局Middlewire
Route::middleware(['tenant'])...

// 住户用户权限验证：只有房东在后台分配当前模块才有权限访问
Route::middleware('admin:shop')....

			
```
### 联系作者加入群

![输入图片说明](http://cdn.xbhub.com/code.jpg)

## License

[GPL-3.0](https://gitee.com/wdcms/wdcms/blob/master/LICENSE)

Copyright (c) 2017-present, Shijie (Jory) Zhou
