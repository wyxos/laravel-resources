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

// Create a resource route instance within a namespace

php artisan make:route User/Role/Store --resource

// Output

app/Resources/User/Store.php

// Usage

route('resource', ['user', 'store'])

```
