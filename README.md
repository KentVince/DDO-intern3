# Minerals Form
- localhost:8000/minerals to access form
```
+--------+-----------+-------------------------+------------------+------------------------------------------------------------------------+---------------------------------------------+
| Domain | Method    | URI                     | Name             | Action                                                                 | Middleware                                  |
+--------+-----------+-------------------------+------------------+------------------------------------------------------------------------+---------------------------------------------+
|        | GET|HEAD  | /                       |                  | Closure                                                                | web                                         |
|        | GET|HEAD  | api/user                |                  | Closure                                                                | api                                         |
|        |           |                         |                  |                                                                        | App\Http\Middleware\Authenticate:sanctum    |
|        | GET|HEAD  | login                   | login            | App\Http\Controllers\Auth\LoginController@showLoginForm                | web                                         |
|        |           |                         |                  |                                                                        | App\Http\Middleware\RedirectIfAuthenticated |
|        | POST      | login                   |                  | App\Http\Controllers\Auth\LoginController@login                        | web                                         |
|        |           |                         |                  |                                                                        | App\Http\Middleware\RedirectIfAuthenticated |
|        | POST      | logout                  | logout           | App\Http\Controllers\Auth\LoginController@logout                       | web                                         |
|        | GET|HEAD  | minerals                | minerals.index   | App\Http\Controllers\MineralsController@index                          | web                                         |
|        |           |                         |                  |                                                                        | App\Http\Middleware\Authenticate            |
|        | POST      | minerals                | minerals.store   | App\Http\Controllers\MineralsController@store                          | web                                         |
|        |           |                         |                  |                                                                        | App\Http\Middleware\Authenticate            |
|        | GET|HEAD  | minerals/create         | minerals.create  | App\Http\Controllers\MineralsController@create                         | web                                         |
|        |           |                         |                  |                                                                        | App\Http\Middleware\Authenticate            |
|        | GET|HEAD  | minerals/{mineral}      | minerals.show    | App\Http\Controllers\MineralsController@show                           | web                                         |
|        |           |                         |                  |                                                                        | App\Http\Middleware\Authenticate            |
|        | PUT|PATCH | minerals/{mineral}      | minerals.update  | App\Http\Controllers\MineralsController@update                         | web                                         |
|        |           |                         |                  |                                                                        | App\Http\Middleware\Authenticate            |
|        | DELETE    | minerals/{mineral}      | minerals.destroy | App\Http\Controllers\MineralsController@destroy                        | web                                         |
|        |           |                         |                  |                                                                        | App\Http\Middleware\Authenticate            |
|        | GET|HEAD  | minerals/{mineral}/edit | minerals.edit    | App\Http\Controllers\MineralsController@edit                           | web                                         |
|        |           |                         |                  |                                                                        | App\Http\Middleware\Authenticate            |
|        | GET|HEAD  | password/confirm        | password.confirm | App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm    | web                                         |
|        |           |                         |                  |                                                                        | App\Http\Middleware\Authenticate            |
|        | POST      | password/confirm        |                  | App\Http\Controllers\Auth\ConfirmPasswordController@confirm            | web                                         |
|        |           |                         |                  |                                                                        | App\Http\Middleware\Authenticate            |
|        | POST      | password/email          | password.email   | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web                                         |
|        | GET|HEAD  | password/reset          | password.request | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web                                         |
|        | POST      | password/reset          | password.update  | App\Http\Controllers\Auth\ResetPasswordController@reset                | web                                         |
|        | GET|HEAD  | password/reset/{token}  | password.reset   | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web                                         |
|        | GET|HEAD  | register                | register         | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web                                         |
|        |           |                         |                  |                                                                        | App\Http\Middleware\RedirectIfAuthenticated |
|        | POST      | register                |                  | App\Http\Controllers\Auth\RegisterController@register                  | web                                         |
|        |           |                         |                  |                                                                        | App\Http\Middleware\RedirectIfAuthenticated |
|        | GET|HEAD  | sanctum/csrf-cookie     |                  | Laravel\Sanctum\Http\Controllers\CsrfCookieController@show             | web                                         |
+--------+-----------+-------------------------+------------------+------------------------------------------------------------------------+---------------------------------------------+
```
- Commented files to delete
1. create minerals table - specification migration
2. homecontroller - renamed HomeController to MerHomeController
3. web.php - commented relations in HomeController
4. layouts - edited routes to href nothing. Old code is commented ( navigate to navbar )
5. Models - changed MineralSpecification to min_specs_dummy
6. Models - commented foreign key relationships.
