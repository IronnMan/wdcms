# Trait

## HasPathTree (lumina树结构解决方案)

具体源代码请自行前往`Modules\Core\Traits`下查看
### 配置及使用
```php
// step1: 数据库设计，对需要开启pathtree的model,数据库设计时需要调用pathtree方法（自定义blueprint）
Schema::create('core_departments', function(Blueprint $table) {
  ...
  $table->pathtree();
  ...
});

// step2: 在model中use HasPathTree;系统即会自动维护pathtree相关字段，
// 由于lumina要求model强制设置fillabled，需要在fillabled中添加：level,path,parentid字段；
class Category extends BaseModel{
    use HasPathTree;
}
```

#### 可用方法
```php
<?php
namespace Modules\Core\Traits;
use Illuminate\Support\Facades\DB;
use Modules\Core\Utils\Tree;
/**
 * Class RevisionableTrait
 * @package Venturecraft\Revisionable
 */
trait HasPathTree
{
    /**
     * Create the event listeners for the saving and saved events
     * This lets us save revisions whenever a save is made, no matter the
     * http method.
     *
     */
    public static function bootHasPathTree(){}
    /**
     * 获取数据结构option
     * @param $parentid
     * @param string $name
     * @return string
     */
    public static function getOptionsHtml($parentid, $name = 'name'){}
    /**
     * 获取树结构table
     * @param string $name
     * @param string $withCount
     * @return string
     */
    public static function getTableHtml($name = 'name', $withCount = false){}
    /**
     * 获取树
     * @param int $level
     * @param bool $withCount
     * @param bool $withCascade
     * @return array
     */
    public static function getTree($level = 1, $withCount = false, $withCascade = false){}
    /**
     * 获取所有子集
     * @param $path
     * @param bool $withSelf
     * @return mixed
     */
    public static function getChildren($path, $withSelf = true){}
    /**
     * @param $path
     * @param bool $withSelf
     * @return mixed
     */
    public static function getSimpleTree($query = null)
    /**
     * 获取父级全路径
     *
     * @param [type] $id
     * @return void
     */
    public function getParents($withSelf = true)
}
``` 

### 视图中使用示例

```html
1. select下拉示例.
    <x-input.select name="parentid" :optionHtml="\Modules\Core\Models\Department::getOptionsHtml($department->parentid??'')" :value="$department->parentid??''" />
2. 树目录示例
    $department_tree.jstree({
            core: {data: @json(\Modules\Cms\Models\CmsCategory::getTree(2, 'posts', true))}
    }).on('changed.jstree', function (e, data) {
            ...
    });
3. 树结构表格示例
    <table class="layui-hide" lay-filter="department_table">
    <thead>
    <tr>
    <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
    <th lay-data="{field:'id', width:80, fixed: 'left'}">ID</th>
    <th lay-data="{field:'name', width:350}">名称</th>
    <th lay-data="{field:'path'}">路径</th>
    <th lay-data="{field:'level',width:80}">深度</th>
    <th lay-data="{field:'order',width:80}">排序</th>
    <th lay-data="{field:'updated_at'}">更新时间</th>
    </tr>
    </thead>
    <tbody>
        {!! \Modules\Core\Models\Department::getTableHtml() !!}
    </tbody>
    </table>
```
## HasOrg

```php
<?php

namespace Modules\Core\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class RevisionableTrait
 * @package Venturecraft\Revisionable
 */
trait HasOrg
{
    public $orgFilter = true;
    public function setOrgFilter(bool $toggle){}

    /**
     * Create the event listeners for the saving and saved events
     * This lets us save revisions whenever a save is made, no matter the
     * http method.
     *
     */
    public static function bootHasOrg() {}
}
```
## ResponseTrait


```php
<?php

namespace Modules\Core\Traits;

use Illuminate\Support\Arr;
use Maatwebsite\Excel\Facades\Excel;

trait ResponseTrait {

    /**
     * @param $model
     * @param $resource
     * @param string $msg
     * @return mixed
     */
    public function toResource($model, $resource, $msg = ''){}

    /**
     * @param $collection
     * @param $resource
     * @param string $msg
     * @return mixed
     */
    public function toCollection($collection, $resource, $msg = ''){}

    /**
     * @param $data
     * @param string $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function toResponse($data, $msg = ''){}

    /**
     * @param $errcode
     * @param $msg
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function toError($errcode = -1, $msg, array $data = []){}

    /**
     * @param $e
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function toException($e){}

    /**
     * 生成模型详情table
     * @param $obj
     * @param array $except
     * @param array $only
     * @return string
     */
    public function toTable($obj, $except = [], $only = []){}
    
    /**
     * @param $exportClass
     * @param $filename
     * @param string $ext
     * @return \Illuminate\Http\JsonResponse
     */
    public function toAjaxExport($exportClass, $filename = '', $ext = 'xlsx'){}
}
```

