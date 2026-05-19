# Illuminate\Database\QueryException - Internal Server Error

SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'file_path' cannot be null (Connection: mysql, Host: 127.0.0.1, Port: 3306, Database: db_portal_web, SQL: insert into `materials` (`subject_id`, `title`, `description`, `teacher_name`, `file_path`, `file_url`, `file_type`, `status`, `grade`, `major`, `updated_at`, `created_at`) values (18, Video Pengenalan Kabel, ?, ?, ?, https://youtu.be/OjBOVL6ujbc, link, published, 10, Rekayasa Perangkat Lunak, 2026-05-19 05:20:24, 2026-05-19 05:20:24))

PHP 8.3.30
Laravel 12.53.0
127.0.0.1:8000

## Stack Trace

0 - vendor\laravel\framework\src\Illuminate\Database\Connection.php:838
1 - vendor\laravel\framework\src\Illuminate\Database\Connection.php:794
2 - vendor\laravel\framework\src\Illuminate\Database\MySqlConnection.php:42
3 - vendor\laravel\framework\src\Illuminate\Database\Query\Processors\MySqlProcessor.php:35
4 - vendor\laravel\framework\src\Illuminate\Database\Query\Builder.php:4140
5 - vendor\laravel\framework\src\Illuminate\Database\Eloquent\Builder.php:2235
6 - vendor\laravel\framework\src\Illuminate\Database\Eloquent\Model.php:1436
7 - vendor\laravel\framework\src\Illuminate\Database\Eloquent\Model.php:1401
8 - vendor\laravel\framework\src\Illuminate\Database\Eloquent\Model.php:1240
9 - vendor\laravel\framework\src\Illuminate\Database\Eloquent\Builder.php:1219
10 - vendor\laravel\framework\src\Illuminate\Support\helpers.php:388
11 - vendor\laravel\framework\src\Illuminate\Database\Eloquent\Builder.php:1218
12 - vendor\laravel\framework\src\Illuminate\Support\Traits\ForwardsCalls.php:23
13 - vendor\laravel\framework\src\Illuminate\Database\Eloquent\Model.php:2540
14 - vendor\laravel\framework\src\Illuminate\Database\Eloquent\Model.php:2556
15 - app\Http\Controllers\Admin\MaterialController.php:55
16 - vendor\laravel\framework\src\Illuminate\Routing\ControllerDispatcher.php:46
17 - vendor\laravel\framework\src\Illuminate\Routing\Route.php:265
18 - vendor\laravel\framework\src\Illuminate\Routing\Route.php:211
19 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:822
20 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
21 - vendor\laravel\framework\src\Illuminate\Routing\Middleware\SubstituteBindings.php:50
22 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
23 - vendor\laravel\framework\src\Illuminate\Auth\Middleware\Authenticate.php:63
24 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
25 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken.php:87
26 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
27 - vendor\laravel\framework\src\Illuminate\View\Middleware\ShareErrorsFromSession.php:48
28 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
29 - vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php:120
30 - vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php:63
31 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
32 - vendor\laravel\framework\src\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse.php:36
33 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
34 - vendor\laravel\framework\src\Illuminate\Cookie\Middleware\EncryptCookies.php:74
35 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
36 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:137
37 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:821
38 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:800
39 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:764
40 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:753
41 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:200
42 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
43 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php:21
44 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull.php:31
45 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
46 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php:21
47 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TrimStrings.php:51
48 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
49 - vendor\laravel\framework\src\Illuminate\Http\Middleware\ValidatePostSize.php:27
50 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
51 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance.php:109
52 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
53 - vendor\laravel\framework\src\Illuminate\Http\Middleware\HandleCors.php:61
54 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
55 - vendor\laravel\framework\src\Illuminate\Http\Middleware\TrustProxies.php:58
56 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
57 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\InvokeDeferredCallbacks.php:22
58 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
59 - vendor\laravel\framework\src\Illuminate\Http\Middleware\ValidatePathEncoding.php:26
60 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
61 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:137
62 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:175
63 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:144
64 - vendor\laravel\framework\src\Illuminate\Foundation\Application.php:1220
65 - public\index.php:20
66 - vendor\laravel\framework\src\Illuminate\Foundation\resources\server.php:23

## Request

POST /admin/materials

## Headers

* **host**: 127.0.0.1:8000
* **connection**: keep-alive
* **content-length**: 1176
* **cache-control**: max-age=0
* **sec-ch-ua**: "Chromium";v="148", "Google Chrome";v="148", "Not/A)Brand";v="99"
* **sec-ch-ua-mobile**: ?0
* **sec-ch-ua-platform**: "Windows"
* **upgrade-insecure-requests**: 1
* **content-type**: multipart/form-data; boundary=----WebKitFormBoundarycjoHKevzPxzjN8Zl
* **user-agent**: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36
* **origin**: http://127.0.0.1:8000
* **accept**: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7
* **sec-fetch-site**: same-origin
* **sec-fetch-mode**: navigate
* **sec-fetch-user**: ?1
* **sec-fetch-dest**: document
* **referer**: http://127.0.0.1:8000/admin/materials
* **accept-encoding**: gzip, deflate, br, zstd
* **accept-language**: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7
* **cookie**: XSRF-TOKEN=eyJpdiI6Im9ZS3o1MXVrZmRpK25OMDA3bjYvdnc9PSIsInZhbHVlIjoiSHMrZG5Tek1GbU45dS9pVzZhTXROT21Xemk4Zlc5YS9ydVFtc3l1Q2I0NGdBN0NoZk1UbUdaejJ3U2RuNWxRMFNERG52N0puZStLcEd3aUpRenBXVHA2UTZPbXJyWlRTMlVNU3RkbytVRy9IeEI5L2RZRDQvdk9RRDdMWnp3cWQiLCJtYWMiOiJhOTZiYmU3YjNkMDczNGU0MjVmNzUwYjY5MGJlYjQxNTBlNzU2ZWYwOGUwOWU3YmNjODA3Y2FhYzE4MDY2YTRiIiwidGFnIjoiIn0%3D; laravel-session=eyJpdiI6InpaLzZ4YlRJdTNaVWExWDlBSDRBTmc9PSIsInZhbHVlIjoibVR3bkZqcHU1N2Yxb2djeDFDck1FTlZXMmJ0V2IveEhvazl5eDJyT3UwNGxsbGg4S2hseTg1ejhPVzFyMlJ3WWZTWXpZU0ljMkdTeFAzVHRiOTRXOE5aMzVTRS8rb3h6UUtldStlUndDNVZrak1qNGJaTjZlQUpIVGxZcHRlTFIiLCJtYWMiOiJmNzE1ZjA1MTY1YTZhYjYyYzk5YjIwYjFhZDYzY2FjOTc0MmM4NTI5YjI5MWI0ZTcwNDJiYTgzYWVjN2NhNDlmIiwidGFnIjoiIn0%3D

## Route Context

controller: App\Http\Controllers\Admin\MaterialController@store
route name: admin.materials.store
middleware: web, auth

## Route Parameters

No route parameter data available.

## Database Queries

* mysql - select * from `sessions` where `id` = '2fgvFYUqUf3jl50Lan4GsAQiA22ysRcrvbwm8jig' limit 1 (7.41 ms)
* mysql - select * from `users` where `id` = 1 limit 1 (2.04 ms)
* mysql - select count(*) as aggregate from `subjects` where `id` = '18' (1.68 ms)
