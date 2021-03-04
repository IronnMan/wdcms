# Lumina.js前端解决方案

前端这块要感谢layui提供完善的ui解决方案，lumina.js是基于layui进行深度开发和维护的一个js架构。
具体使用可参见layui官方文档。lumina将layui合并到了一个文件减少请求，但扩展的js你也可以单独继承然后载入使用。为了方便，lumina.js也内置了lodash.core.js

## datatable

这里不做过多使用说明，lumina对layui的数据表格做个非常多的定制化开发，具体可以参考[datatable一章](./datatable)；

## 表单元素

lumina.js封装了大部分表单涉及的js，你在使用的时候直接调用laravel组件即可完成相关表单元素，如果对代码感兴趣可查看form.js源代码。
所涉及的表单元素：
- 时间选择器（日期、日期时间、时间）
- 时间区间选择器（日期、日期时间、时间）
- wangEditor所见即所得编辑器
- 图片上传
- 区域选择器（数据库编码版）


## http请求
lumina.js封装了jquery ajax请求，结合lumina接口相应统一处理异常及csrf验证和其他laravel需要的请求头

```js
// 请求代码示例
var request = layui.util.request
  
request.ajax(option)
request.get(url, data, cb)
request.post(url, data, cb)

```

## 弹层管理

### tab页面管理

```js
    1、html代码格式  
    <a lay-href="XX" lay-text="title" >内容管理</a>  
    2、js触发模式
    layui.admin.openTabsPage(href, title)
```

### Modal组件
```js
  // option具体参数参考layer参数
  layui.admin.openModal(content, title, option)
```

## 扩展包开发

```js
$(function(){
    layui.extend({
        'user_picker': 'extends/XXX/XX'
    }).use('user_picker', function(){
        var userPicker = layui.userPicker;
        ...
    })
})

···
