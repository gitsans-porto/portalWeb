# Illuminate\Database\QueryException - Internal Server Error

SQLSTATE[01000]: Warning: 1265 Data truncated for column 'category' at row 1 (Connection: mysql, Host: localhost, Port: 3306, Database: u521918736_dev5, SQL: insert into `subjects` (`name`, `code`, `slug`, `category`, `image`, `icon`, `color`, `is_active`, `updated_at`, `created_at`) values (Bahasa Jepang, ?, bahasa-jepang, pilihan, ?, book-open, red, 0, 2026-05-19 21:49:18, 2026-05-19 21:49:18))

PHP 8.3.30
Laravel 12.53.0
dev5.smkn1limboto.sch.id

## Stack Trace

0 - vendor/laravel/framework/src/Illuminate/Database/Connection.php:838
1 - vendor/laravel/framework/src/Illuminate/Database/Connection.php:794
2 - vendor/laravel/framework/src/Illuminate/Database/MySqlConnection.php:42
3 - vendor/laravel/framework/src/Illuminate/Database/Query/Processors/MySqlProcessor.php:35
4 - vendor/laravel/framework/src/Illuminate/Database/Query/Builder.php:4140
5 - vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php:2235
6 - vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php:1436
7 - vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php:1401
8 - vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php:1240
9 - vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php:1219
10 - vendor/laravel/framework/src/Illuminate/Support/helpers.php:388
11 - vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php:1218
12 - vendor/laravel/framework/src/Illuminate/Support/Traits/ForwardsCalls.php:23
13 - vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php:2540
14 - vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php:2556
15 - app/Http/Controllers/Admin/SubjectController.php:46
16 - vendor/laravel/framework/src/Illuminate/Routing/ControllerDispatcher.php:46
17 - vendor/laravel/framework/src/Illuminate/Routing/Route.php:265
18 - vendor/laravel/framework/src/Illuminate/Routing/Route.php:211
19 - vendor/laravel/framework/src/Illuminate/Routing/Router.php:822
20 - vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php:180
21 - vendor/laravel/framework/src/Illuminate/Routing/Middleware/SubstituteBindings.php:50
22 - vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php:219
23 - vendor/laravel/framework/src/Illuminate/Auth/Middleware/Authenticate.php:63
24 - vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php:219
25 - vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/VerifyCsrfToken.php:87
26 - vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php:219
27 - vendor/laravel/framework/src/Illuminate/View/Middleware/ShareErrorsFromSession.php:48
28 - vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php:219
29 - vendor/laravel/framework/src/Illuminate/Session/Middleware/StartSession.php:120
30 - vendor/laravel/framework/src/Illuminate/Session/Middleware/StartSession.php:63
31 - vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php:219
32 - vendor/laravel/framework/src/Illuminate/Cookie/Middleware/AddQueuedCookiesToResponse.php:36
33 - vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php:219
34 - vendor/laravel/framework/src/Illuminate/Cookie/Middleware/EncryptCookies.php:74
35 - vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php:219
36 - vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php:137
37 - vendor/laravel/framework/src/Illuminate/Routing/Router.php:821
38 - vendor/laravel/framework/src/Illuminate/Routing/Router.php:800
39 - vendor/laravel/framework/src/Illuminate/Routing/Router.php:764
40 - vendor/laravel/framework/src/Illuminate/Routing/Router.php:753
41 - vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php:200
42 - vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php:180
43 - vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php:21
44 - vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ConvertEmptyStringsToNull.php:31
45 - vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php:219
46 - vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php:21
47 - vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TrimStrings.php:51
48 - vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php:219
49 - vendor/laravel/framework/src/Illuminate/Http/Middleware/ValidatePostSize.php:27
50 - vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php:219
51 - vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/PreventRequestsDuringMaintenance.php:109
52 - vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php:219
53 - vendor/laravel/framework/src/Illuminate/Http/Middleware/HandleCors.php:61
54 - vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php:219
55 - vendor/laravel/framework/src/Illuminate/Http/Middleware/TrustProxies.php:58
56 - vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php:219
57 - vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/InvokeDeferredCallbacks.php:22
58 - vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php:219
59 - vendor/laravel/framework/src/Illuminate/Http/Middleware/ValidatePathEncoding.php:26
60 - vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php:219
61 - vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php:137
62 - vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php:175
63 - vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php:144
64 - vendor/laravel/framework/src/Illuminate/Foundation/Application.php:1220
65 - public/index.php:20

## Request

POST /admin/subjects

## Headers

* **accept**: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7
* **accept-encoding**: br
* **accept-language**: en-GB,en-US;q=0.9,en;q=0.8
* **content-type**: application/x-www-form-urlencoded
* **content-length**: 208
* **cookie**: XSRF-TOKEN=eyJpdiI6IkUwczI2OGFGclJKS05NYkk2WEhRWGc9PSIsInZhbHVlIjoiSit5bFJ5aExUT2wyOFhwL3ZjMzdZU0ZqVVYrd0hPdnN0R3RhSEgyR0tINTFmSzFUL1FuOEcvcnBYejRJeXJkbTNTV2hHRFpIeG9rUndSNlM3NUFlTE15RVBQRldWbUFJVUxpVGJ6YmRFSU5qRU9kNTYzSXZXaXBZNDlJZHpMejIiLCJtYWMiOiJhZmUzNjcyZDQ1YjhjNDlkN2QwZTJmMGM3NTE2MTkyN2YyOTc0ZWNhZDE5YjhlNzhhZDAzNjE1YzE4N2NiYjlmIiwidGFnIjoiIn0%3D; laravel-session=eyJpdiI6ImFsTzRaOHZkUzkyRnFHcDAxeFpvRGc9PSIsInZhbHVlIjoiWHJtK2dDZEgraVljZkhjNjFIWm54YnNTcFNacnJXRXpOY2M0T1pJT1V1U0daT2tFMFNJNzE5emRoMjlZRk1kSGt6aG9EeDhwVHNERmlYeVQvQ0FZcWZFRWE2M3NpdGttQ1FQbzRTNWR4YmE3NDEwSWZoMmRFSDdqUklyVDJpYVQiLCJtYWMiOiJiMzc2OWZiYjFmMThmNzJlMDEwODMxMmU3N2EyNmY0ZDQ2NzhmNzAzNTllZWRlMTU1OTY2NDJiNmUwNzdlNmE3IiwidGFnIjoiIn0%3D
* **host**: dev5.smkn1limboto.sch.id
* **referer**: https://dev5.smkn1limboto.sch.id/admin/subjects?tab=mata-pelajaran
* **user-agent**: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36
* **cache-control**: max-age=0
* **x-forwarded-for**: 2402:8780:1049:184c:b098:f217:c9eb:a2be
* **x-forwarded-proto**: https
* **x-real-ip**: 2402:8780:1049:184c:b098:f217:c9eb:a2be
* **x-real-port**: 59266
* **x-forwarded-port**: 443
* **x-port**: 443
* **x-lscache**: 1
* **sec-ch-ua**: "Chromium";v="148", "Google Chrome";v="148", "Not/A)Brand";v="99"
* **sec-ch-ua-mobile**: ?0
* **sec-ch-ua-platform**: "Windows"
* **upgrade-insecure-requests**: 1
* **origin**: https://dev5.smkn1limboto.sch.id
* **sec-fetch-site**: same-origin
* **sec-fetch-mode**: navigate
* **sec-fetch-user**: ?1
* **sec-fetch-dest**: document
* **priority**: u=0, i

## Route Context

controller: App\Http\Controllers\Admin\SubjectController@store
route name: admin.subjects.store
middleware: web, auth

## Route Parameters

No route parameter data available.

## Database Queries

* mysql - select * from `sessions` where `id` = 'IFxBQSXltvmA8USWrubI2kVqT3bmEPkgNKf9Af41' limit 1 (0.88 ms)
* mysql - select * from `users` where `id` = 1 limit 1 (0.22 ms)
