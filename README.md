https://erikbelusic.com/tracking-if-a-user-is-online-in-laravel

- save file to `app/Http/Middleware/CheckIfUserIsOnlineMiddleware.php`
- Then add this to the end of the ***web*** array in **app/Http/Kernel.php**

```php
'App\Http\Middleware\CheckIfUserIsOnlineMiddleware'
```

- and now add the below method to ur User Model usually in `app/User.php`

```php
public function isOnline()
{
    return Cache::has('user-is-online-' . $this->id);
}
```

- so u can easily check current user state in view like so

```blade
@if($user->isOnline())
    user is online!!
@endif
```
