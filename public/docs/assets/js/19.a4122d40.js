(window.webpackJsonp=window.webpackJsonp||[]).push([[19],{387:function(t,a,s){"use strict";s.r(a);var n=s(26),r=Object(n.a)({},(function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("ContentSlotsDistributor",{attrs:{"slot-key":t.$parent.slotKey}},[s("h1",{attrs:{id:"lumina-js前端解决方案"}},[s("a",{staticClass:"header-anchor",attrs:{href:"#lumina-js前端解决方案"}},[t._v("#")]),t._v(" Lumina.js前端解决方案")]),t._v(" "),s("p",[t._v("前端这块要感谢layui提供完善的ui解决方案，lumina.js是基于layui进行深度开发和维护的一个js架构。\n具体使用可参见layui官方文档。lumina将layui合并到了一个文件减少请求，但扩展的js你也可以单独继承然后载入使用。为了方便，lumina.js也内置了lodash.core.js")]),t._v(" "),s("h2",{attrs:{id:"datatable"}},[s("a",{staticClass:"header-anchor",attrs:{href:"#datatable"}},[t._v("#")]),t._v(" datatable")]),t._v(" "),s("p",[t._v("这里不做过多使用说明，lumina对layui的数据表格做个非常多的定制化开发，具体可以参考"),s("a",{attrs:{href:"./datatable"}},[t._v("datatable一章")]),t._v("；")]),t._v(" "),s("h2",{attrs:{id:"表单元素"}},[s("a",{staticClass:"header-anchor",attrs:{href:"#表单元素"}},[t._v("#")]),t._v(" 表单元素")]),t._v(" "),s("p",[t._v("lumina.js封装了大部分表单涉及的js，你在使用的时候直接调用laravel组件即可完成相关表单元素，如果对代码感兴趣可查看form.js源代码。\n所涉及的表单元素：")]),t._v(" "),s("ul",[s("li",[t._v("时间选择器（日期、日期时间、时间）")]),t._v(" "),s("li",[t._v("时间区间选择器（日期、日期时间、时间）")]),t._v(" "),s("li",[t._v("wangEditor所见即所得编辑器")]),t._v(" "),s("li",[t._v("图片上传")]),t._v(" "),s("li",[t._v("区域选择器（数据库编码版）")])]),t._v(" "),s("h2",{attrs:{id:"http请求"}},[s("a",{staticClass:"header-anchor",attrs:{href:"#http请求"}},[t._v("#")]),t._v(" http请求")]),t._v(" "),s("p",[t._v("lumina.js封装了jquery ajax请求，结合lumina接口相应统一处理异常及csrf验证和其他laravel需要的请求头")]),t._v(" "),s("div",{staticClass:"language-js extra-class"},[s("pre",{pre:!0,attrs:{class:"language-js"}},[s("code",[s("span",{pre:!0,attrs:{class:"token comment"}},[t._v("// 请求代码示例")]),t._v("\n"),s("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("var")]),t._v(" request "),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),t._v(" layui"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(".")]),t._v("util"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(".")]),t._v("request\n  \nrequest"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(".")]),s("span",{pre:!0,attrs:{class:"token function"}},[t._v("ajax")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),t._v("option"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),t._v("\nrequest"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(".")]),s("span",{pre:!0,attrs:{class:"token function"}},[t._v("get")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),t._v("url"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v(" data"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v(" cb"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),t._v("\nrequest"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(".")]),s("span",{pre:!0,attrs:{class:"token function"}},[t._v("post")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),t._v("url"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v(" data"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v(" cb"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),t._v("\n\n")])])]),s("h2",{attrs:{id:"弹层管理"}},[s("a",{staticClass:"header-anchor",attrs:{href:"#弹层管理"}},[t._v("#")]),t._v(" 弹层管理")]),t._v(" "),s("h3",{attrs:{id:"tab页面管理"}},[s("a",{staticClass:"header-anchor",attrs:{href:"#tab页面管理"}},[t._v("#")]),t._v(" tab页面管理")]),t._v(" "),s("div",{staticClass:"language-js extra-class"},[s("pre",{pre:!0,attrs:{class:"language-js"}},[s("code",[t._v("    "),s("span",{pre:!0,attrs:{class:"token number"}},[t._v("1")]),t._v("、html代码格式  \n    "),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v("<")]),t._v("a lay"),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v("-")]),t._v("href"),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),s("span",{pre:!0,attrs:{class:"token string"}},[t._v('"XX"')]),t._v(" lay"),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v("-")]),t._v("text"),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),s("span",{pre:!0,attrs:{class:"token string"}},[t._v('"title"')]),t._v(" "),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v(">")]),t._v("内容管理"),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v("<")]),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v("/")]),t._v("a"),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v(">")]),t._v("  \n    "),s("span",{pre:!0,attrs:{class:"token number"}},[t._v("2")]),t._v("、js触发模式\n    layui"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(".")]),t._v("admin"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(".")]),s("span",{pre:!0,attrs:{class:"token function"}},[t._v("openTabsPage")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),t._v("href"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v(" title"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),t._v("\n")])])]),s("h3",{attrs:{id:"modal组件"}},[s("a",{staticClass:"header-anchor",attrs:{href:"#modal组件"}},[t._v("#")]),t._v(" Modal组件")]),t._v(" "),s("div",{staticClass:"language-js extra-class"},[s("pre",{pre:!0,attrs:{class:"language-js"}},[s("code",[t._v("  "),s("span",{pre:!0,attrs:{class:"token comment"}},[t._v("// option具体参数参考layer参数")]),t._v("\n  layui"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(".")]),t._v("admin"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(".")]),s("span",{pre:!0,attrs:{class:"token function"}},[t._v("openModal")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),t._v("content"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v(" title"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v(" option"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),t._v("\n")])])]),s("h2",{attrs:{id:"扩展包开发"}},[s("a",{staticClass:"header-anchor",attrs:{href:"#扩展包开发"}},[t._v("#")]),t._v(" 扩展包开发")]),t._v(" "),s("div",{staticClass:"language-js extra-class"},[s("pre",{pre:!0,attrs:{class:"language-js"}},[s("code",[s("span",{pre:!0,attrs:{class:"token function"}},[t._v("$")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),s("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("function")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("{")]),t._v("\n    layui"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(".")]),s("span",{pre:!0,attrs:{class:"token function"}},[t._v("extend")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("{")]),t._v("\n        "),s("span",{pre:!0,attrs:{class:"token string"}},[t._v("'user_picker'")]),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v(":")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token string"}},[t._v("'extends/XXX/XX'")]),t._v("\n    "),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("}")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(".")]),s("span",{pre:!0,attrs:{class:"token function"}},[t._v("use")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),s("span",{pre:!0,attrs:{class:"token string"}},[t._v("'user_picker'")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v(" "),s("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("function")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("{")]),t._v("\n        "),s("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("var")]),t._v(" userPicker "),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),t._v(" layui"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(".")]),t._v("userPicker"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n        "),s("span",{pre:!0,attrs:{class:"token operator"}},[t._v("...")]),t._v("\n    "),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("}")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),t._v("\n"),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("}")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),t._v("\n\n···\n")])])])])}),[],!1,null,null,null);a.default=r.exports}}]);