# Datatable数据表格


## 数据表格

数据表格是xgee生成之后默认的数据列表管理界面，lumina有很多内置的字段，请参考：

```html
<script>
    layui.use(['table', 'element'], function(){
    var table = layui.table,
        element = layui.element;
    table.render({
        elem: '#data_post_table', // 表格渲染div
        url: '{{ URL::full() }}', // 列表接口
        treeMode: false, //开启树模式
        autoShow: '{{ route("ticket.post.show", ":id") }}', // 自动详情接口，不配置则关闭
        where: {'orderBy': 'created_at', 'sortedBy': 'desc'}, // 初始化查询接口参数
        page: true, // 分页
        canSearch: true, // 字段搜索
        toolbar: 'default', // 工具栏
        height: 'full-110', // 默认表格高度自适应全屏
        action: [{'text': '推送到微信', 'event': 'pushWx'}], // 自定义行事件
        export: {url: '{{ URL::full() }}', can: true, all: true}, // 数据导出权限及接口配置
        cols: [[
            {"type":"checkbox","fixed":"left"},
            {"field":"id","title":"id","sort":"true"},
            {"field":"title","title":"title"},
            {"field":"content","title":"content"},
            {"field":"create_by","title":"create_by"},
            {"field":"created_at","title":"created_at","hide":"true"},
            {"field":"updated_at","title":"updated_at"}]]
    });
    //监听行工具事件
    table.on('toolbar(data_post_table)', function(obj){
        var checked = table.checkStatus('data_post_table');
        if(obj.event == 'create') {
            parent.layui.admin.openTabsPage('{{ route('ticket.post.create') }}', '新增数据')
            return true;
        }
        if(_.indexOf(['delete', 'update'], obj.event) > -1 && checked.data.length >0 ) {
            if(checked.data.length !== 1) {
                layer.msg('请选择一条数据!');
                return false;
            }
            if(obj.event === 'delete') {
                layer.confirm('真的删除行么', function(index){
                    parent.layui.admin.request.post('{{ route('ticket.post.destroy', ['id'=>':id']) }}'.replace(':id', checked.data[0].id), {'_method': 'DELETE'}, function(res){
                        layer.msg('删除成功');
                        table.reload('data_post_table')
                    })
                    layer.close(index);
                });
            }else if(obj.event === 'update') {
                parent.layui.admin.openTabsPage('{{route('ticket.post.edit', ['id'=>':id'])}}'.replace(':id', checked.data[0].id), '修改数据#'+checked.data[0].id)
                return true;
            }
        }
    });
});
</script>
```


### 表格扩展功能

#### autoShow
系统会默认开启autoShow，当然，你也可以关闭。

```js
table.render({
    ...
    autoShow: '{{ route("ticket.post.show", ":id") }}',
    ...
});
autoShow开启后，表格固定最后一栏会出现一个小眼睛，可查看当前行数据的详情；
autoShow使用了lumina封装的toTable方法，toTable方法也支持关联查询显示：
$user = $this->repository->with('address')->find($id);
$user = $this->repository->with([
  'organizations:name,oid',
  'departments:name,level',
  'address:user_id,province,city,address,contact_name,contact_phone'
])->find($id);
```

#### 自定义事件
```js
table.render({
    ...
    action: [{'text': '推送到微信', 'event': 'pushWx'}],
    ...
});
添加自定义事件后可监听table的toolbar子事件，做出相应的操作反馈
```

#### 导出

```js
table.render({
    ...
    export: {
        url: '{{ 下载对应路由 }}', 
        can: true, // 是否可以导出选中
        all: true // 是否可以导出搜索结果
    },
    ...
});

```

这里开放了下载选中和下载全部的权限控制，你可以通过policy控制具体权限。  
下载的后端代码需要自己写，但你也不必担心，lumina已为你提供了toAjaxExport方法，使用事例如下：

```php
return $this->toAjaxExport(new PostExport());
```

PostExport就是Maatwebsite创建的可下载的数据表格文本对象，具体请查看`Maatwebsite/Laravel-Excel`文档
