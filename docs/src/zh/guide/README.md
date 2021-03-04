
# lumina介绍

### 基本介绍

lumina（路米拉）是lumen负数，lumen是laravel的轻量级框架。  
lumina是一个基于laravel+iframe+layui高度定制的快速开发框架。


快速开发框分两种：

1. 类laravel-nova单套ui封装curd及常见操作，优势是：针对小量需求可以快速实现，但是缺陷也非常明显：自定义难度大，api文档较多，三方系统结合难度大，不同前端脚本难以结合；典型如laravel-admin；

2. 基于代码生成器的基础服务架构，系统一般集成了常规开发中所需要的解决方案，奠定了系统开发的基本架构，新业务一般可使用生成器一键生成，高度自定义嵌入；lumina就是这一种

用简单的示例来说明：

```php
// laravel-admin表单字段使用
$form->text('title')->default('jory')->attribute(['data-title' => 'title'])->required();

// lumina表单字段使用
<x-input :value="{{ $value ?? 'jory' }}" data-title="title" required />

```

从示例中可以看出lumina自由度高了很多，这些代码都是生成器根据字段自动生成的，你可以基于生成器代码完全自定义，甚至不使用lumina自带组件也可以完全使用html去构建表单，语法完全遵从html标准，学习门槛几乎为零。

PHP最大的优势在于有很多的开源项目或者开源模块，lumina的开发设计模式，可以让你轻松融合新的系统或者模块到当前系统中：
- 初步结合：因为lumina是基于iframe设计，你可以直接内嵌三方应用；
- 代码层结合：创建provider，注册module，即可无缝对接，前端代码无需做任何更改。这种场景很常见，例如：我们系统需要一个团队协作，找到一款开源作品，需要对接成我们自己的模块，只需改造开源作品用户授权管理模块即可（非laravel框架可能需要部分代码移植，但工作量都是可估量且可行的）。


### lumina架构图

![](http://cdn.xbhub.com/lumina/main.jpg)




