<?php

namespace App\Traits\Cache;

use App\Models\ModuleAdmin;
use Illuminate\Database\Eloquent\Model;

trait Cacheable
{
    /**
     * 自动清除tag缓存
     */
    public static function bootCacheable(): void
    {
        $tag = 'model:'.(new self)->getTable();
        static::updated(function (Model $cachedModel) use($tag) {
            $cachedModel::flushCache($tag);
        });

        static::created(function (Model $cachedModel) use($tag) {
            $cachedModel::flushCache($tag);
        });

        static::deleted(function (Model $cachedModel) use($tag) {
            $cachedModel::flushCache($tag);
        });
    }

    /**
     * Get a new query builder instance for the connection.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    protected function newBaseQueryBuilder()
    {
        $conn = $this->getConnection();

        $grammar = $conn->getQueryGrammar();

        $builder = new RememberBuilder($conn, $grammar, $conn->getPostProcessor());

        if (isset($this->rememberFor)) {
            $builder->remember($this->rememberFor);
        }

        if (isset($this->rememberCacheTag)) {
            $builder->cacheTags($this->rememberCacheTag);
        }

        if (isset($this->rememberCachePrefix)) {
            $builder->prefix($this->rememberCachePrefix);
        }

        if (isset($this->rememberCacheDriver)) {
            $builder->cacheDriver($this->rememberCacheDriver);
        }

        return $builder;
    }
}
