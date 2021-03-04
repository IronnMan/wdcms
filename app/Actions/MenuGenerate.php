<?php


namespace App\Actions;

use App\Traits\AsAction;
use App\Utils\Tree;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;

class MenuGenerate extends BaseAction
{
    private $defaultMenus = [];

    public function handle()
    {
        $menus = collect()->merge($this->defaultMenus);
        foreach(Module::getOrdered() as $module){
            // 开启组织模块权限，有权限的组织才有访问权限
            if(
                in_array($module->getAlias(), ['core']) || //Core模块全部菜单不验证模块权限
                tenant()->checkModule($module->getName())
            ){
                $menus = $menus->merge($module->get('menus', []));
            }
        }
        $menus = $this->_parseMenu($menus)->sortBy('sort')->all();
        $menuTree = (new Tree($menus))->get_tree_array();

        // 构造html
        $menuHtml = '';
        foreach($menuTree as $_menu) {
            $menuHtml .= '<li data-id="'.$_menu['id'].'" class="layui-nav-item">';
            if(!isset($_menu['target'])) {
                $menuHtml .= '<a href="javascript:;" lay-tips="'.$_menu['text'].'" lay-direction="2" '.(!isset($_menu['children'])?'lay-href='.$_menu['url']:'').'>';
            }else{
                $menuHtml .= '<a href="'.$_menu['url'].'" target="'.$_menu['target'].'" title="'.$_menu['text'].'">';
            }
            $menuHtml .= '<i class="fa '.($_menu['icon'] ?? '').' absolute" style="left: 30px;top: 50%;margin-top: -5px;"></i><cite>'.$_menu['text'].'</cite>';

            if (isset($_menu['children'])) {
                $menuHtml .= '<i class="fa fa-angle-right ml-4"></i></a>'.$this->__buildChildHtml($_menu['children']);
            }else{
                $menuHtml .= '</a>';
            }
        }
        return $menuHtml;
    }

    /**
     * 权限检查, url生成
     * @param $menu
     * @return array
     */
    protected function _parseMenu($menus)
    {
        if (empty($menus)) return [];

        return $menus->filter(function($item){
            return !isset($item['auth']) || $this->__checkIfPass($item['auth']);
        })->map(function($item) {
            $item['url'] = $this->__buildUrl($item);
            return $item;
        });
    }

    /**
     * build item url
     *
     * @param [type] $item
     * @return void
     */
    protected function __buildUrl($item)
    {
        $_url = '';
        if(isset($item['route'])) {
            $_url = Route::has($item['route'])?route($item['route'], $item['params']??[]):'';
        }else if(isset($item['uri'])){
            $_url = $item['uri'].(isset($item['params'])?'?='.http_build_query($item['params']):'');
        }
        return $_url ?? 'javascript:;';
    }

    /**
     * @param $child
     * @return string
     */
    protected function __buildChildHtml($child)
    {
        $childHtml = '<dl class="layui-nav-child">';
        foreach ($child as $_child) {
            $childHtml .= '<dd data-id="'.$_child['id'].'">';
            $childHtml .= '<a '.(!isset($_child['children'])&&!empty($_child['url'])?'lay-href='.$_child['url']:'href="javascript:;"').' title="'.$_child['text'].'">'.(isset($_child['icon'])?'<i class="fa '.$_child['icon'].' mr-1"></i>':'').$_child['text'];
            if(isset($_child['children'])) {
                $childHtml .= '<i class="fa fa-angle-right ml-1"></i></a>'.$this->__buildChildHtml($_child['children']);
            }else{
                $childHtml .= '</a>';
            }
        }
        $childHtml .= '</dl>';
        return $childHtml;
    }

    /**
     * @param $auth
     * @return bool
     */
    protected function __checkIfPass($auth)
    {
        if(\is_bool($auth)){
            return $auth;
        }

        $user = \auth()->user();
        $pass = true;

        if(isset($auth['ROLE']) && !$user->isSuper()) {
            // 角色条件
            if(Str::contains($auth['ROLE'], '|')) {
                $pass = $user->hasAnyRole(explode('|', $auth['ROLE'])); // or
            }else if(Str::contains($auth['ROLE'], ',')) {
                $pass = $user->hasAllRole(explode(',', $auth['ROLE'])); // and
            }else{
                $pass = $user->hasRole($auth['ROLE']);
            }
        }
        //        if(isset($auth['OID'])) {
        //            $pass = $auth['OID'] == auth()->oid();
        //        }

        return $pass;
    }
}
