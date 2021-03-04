# MVC

lumina的MVC结构是xgee生成的，`php artisan module:make XX` 大致目录如下：

```php
--Config            ：模块配置文件，需要接入在线配置文件管理，请查看配置文件一章
--Console           ：命令相关
--Database          ：数据库相关    
----factories           ：数据工厂
----migrations          ：数据库表结构设计
----seeders             ：种子数据，测试数据
--Exceptions        ：异常
--Http              ：请求处理相关
----Controllers         ：控制器
----Filters             ：过滤器
----Middleware          ：中间件
----Requests            ：form验证
----Resources           ：json数据响应格式化
--Models            ：models   
--Policies          : 授权管理
--Providers         ：模块入口，服务注册                  
--Resources         ：前端资源管理
--Routes            ：路由
// 下面是非必要目录
--Exports           ：数据导出对象
--Helpers           ：辅助函数
--Job               ：任务
--Listeners         ：事件
--Notifications     ：通知
--Traits            ：trait脚本
--Utils             ：三方工具
--View              ：组件视图、合成视图等


```

