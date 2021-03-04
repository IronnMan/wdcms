# Cache 缓存


## query cache

```bash

    // 永久缓存，增删改会自动清除
    User::remember(-1)->get();
    // 定时时间缓存，增删改会自动清除
    User::remember(now()->addDay())->get();
    
    // 不自动清除缓存
    User::remember(-1)->cacheTags('user_list')->where(...)->get();
    User::flushCache('user_list');

```
