<?php

namespace App\Utils;


use Illuminate\Database\Schema\Blueprint;

class WdBlueprint
{

    /**
     * 组织code
     * @param Blueprint $table
     */
    public static function tenant(Blueprint $table)
    {
        $table->char('tenant_id', 32)->comment('租户id');
    }

    /**
     * 创建人
     * @param Blueprint $table
     */
    public static function createby(Blueprint $table)
    {
        $table->unsignedInteger('create_by')->comment('创建人');
        $table->index('create_by');
    }

    /**
     * 栏目树
     * @param Blueprint $table
     */
    public static function pathtree(Blueprint $table)
    {
        $table->unsignedInteger('parentid')->default(0)->comment('父级id');
        $table->string('path', 500)->nullable()->comment('路径');
        $table->integer('level')->nullable()->comment('路径深度');
    }

    /**
     * 状态
     * @param Blueprint $table
     */
    public static function status(Blueprint $table)
    {
        $table->char('status', 15)->nullable()->comment('状态');
    }

    /**
     * 状态
     * @param Blueprint $table
     */
    public static function count(Blueprint $table)
    {
        $table->integer('count')->default(0)->comment('计数');
    }

    /**
     * 排序
     * @param Blueprint $table
     */
    public static function sort(Blueprint $table)
    {
        $table->tinyInteger('sort')->default(50)->comment('排序');
    }

    /**
     * 数据跟踪
     *
     * @param Blueprint $table
     * @return void
     */
    public static function trace(Blueprint $table)
    {
        $table->ipAddress('trace_ip');
        $table->string('trace_agent');
    }
}
