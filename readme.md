<span style="color:red">Please note that the repositories <a href="https://github.com/wyxos/laravel-listing">`wyxos/laravel-listing`</a> and <a href="https://github.com/wyxos/laravel-resources">`wyxos/laravel-resources`</a> are no longer maintained. They are now unified under <a href="https://github.com/wyxos/harmonie">`wyxos/harmonie`</a>.</span>

Laravel Resources

Add the concept of route handlers and resource handlers.

The aim of this package is:
- Bypass the need to define controllers
- Enforce defining route actions as string making renaming difficult
- Reduce navigating to nested folders to reach Requests


```
// Create a route instance

php artisan make:route StoreUser

// Output

app/Routes/StoreUser.php

// Usage

Route::post('/users/store', StoreUser::class)

// Create a resource route instance

php artisan make:route User/Store --resource

// Output

app/Resources/User/Store.php

// Usage

route('resource', ['user', 'store'])

```
