# Error - Internal Server Error

Class "App\Http\Controllers\Admin\Storage" not found

PHP 8.3.30
Laravel 12.53.0
127.0.0.1:8000

## Stack Trace

0 - app\Http\Controllers\Admin\SubjectController.php:205
1 - vendor\laravel\framework\src\Illuminate\Routing\ControllerDispatcher.php:46
2 - vendor\laravel\framework\src\Illuminate\Routing\Route.php:265
3 - vendor\laravel\framework\src\Illuminate\Routing\Route.php:211
4 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:822
5 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
6 - vendor\laravel\framework\src\Illuminate\Routing\Middleware\SubstituteBindings.php:50
7 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
8 - vendor\laravel\framework\src\Illuminate\Auth\Middleware\Authenticate.php:63
9 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
10 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken.php:87
11 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
12 - vendor\laravel\framework\src\Illuminate\View\Middleware\ShareErrorsFromSession.php:48
13 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
14 - vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php:120
15 - vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php:63
16 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
17 - vendor\laravel\framework\src\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse.php:36
18 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
19 - vendor\laravel\framework\src\Illuminate\Cookie\Middleware\EncryptCookies.php:74
20 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
21 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:137
22 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:821
23 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:800
24 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:764
25 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:753
26 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:200
27 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
28 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php:21
29 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull.php:31
30 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
31 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php:21
32 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TrimStrings.php:51
33 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
34 - vendor\laravel\framework\src\Illuminate\Http\Middleware\ValidatePostSize.php:27
35 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
36 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance.php:109
37 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
38 - vendor\laravel\framework\src\Illuminate\Http\Middleware\HandleCors.php:61
39 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
40 - vendor\laravel\framework\src\Illuminate\Http\Middleware\TrustProxies.php:58
41 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
42 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\InvokeDeferredCallbacks.php:22
43 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
44 - vendor\laravel\framework\src\Illuminate\Http\Middleware\ValidatePathEncoding.php:26
45 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
46 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:137
47 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:175
48 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:144
49 - vendor\laravel\framework\src\Illuminate\Foundation\Application.php:1220
50 - public\index.php:20
51 - vendor\laravel\framework\src\Illuminate\Foundation\resources\server.php:23

## Request

DELETE /admin/majors/10

## Headers

* **host**: 127.0.0.1:8000
* **connection**: keep-alive
* **content-length**: 62
* **cache-control**: max-age=0
* **sec-ch-ua**: "Chromium";v="148", "Google Chrome";v="148", "Not/A)Brand";v="99"
* **sec-ch-ua-mobile**: ?0
* **sec-ch-ua-platform**: "Windows"
* **upgrade-insecure-requests**: 1
* **content-type**: application/x-www-form-urlencoded
* **user-agent**: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36
* **origin**: http://127.0.0.1:8000
* **accept**: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7
* **sec-fetch-site**: same-origin
* **sec-fetch-mode**: navigate
* **sec-fetch-user**: ?1
* **sec-fetch-dest**: document
* **referer**: http://127.0.0.1:8000/admin/subjects?tab=jurusan
* **accept-encoding**: gzip, deflate, br, zstd
* **accept-language**: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7
* **cookie**: XSRF-TOKEN=eyJpdiI6Im5mNU5Lc0xkYzVSMVZoM0pFMGM3OFE9PSIsInZhbHVlIjoiZGhBTWwrQ01mQ2pDY25rUzFhNDBDYVpUY0UvVDFoOEpMRGU0WVRRMzNlcDJkZ3g2N3VpUWhyTDhGQ1NOaHhkNUo5UFhBRkFQdXJob1JvT2JrTzlEOHVHSXpvU0lLdE5QY1hsTXRJeGdnU3h2ZnhzYVpoM1hqbThxOTgrODc0YWkiLCJtYWMiOiI2MTY4YzgwMDFjYjI0ODBiNTEyNzk5ZTJlNjg0MTU5NGRlNWMyMzQzYjFmNDRmYjFmNmYwOGNiZDAyNWVlOGJjIiwidGFnIjoiIn0%3D; laravel-session=eyJpdiI6IjZjVUlXdHVMU0xUUm1BMytzUTlWNVE9PSIsInZhbHVlIjoiZFBYZnM0U1NmMWJLSUwvS1FxT1NucXhtN2xFWCtTTTNJQjZPcUphUXFXSzFoL0M3bTViMFFDdkhWY0FwWE9PNXY1eGF2YnpwZ2JRcTBTeEV3WStCQnBQSXpFbDJqZlFYT3RmM3dYcHZ5QWVDRFljU2xVK05zT3E5b3paYkR3cHEiLCJtYWMiOiI5Mzk4ZWFiNjdlMGMyM2E5NGQ5YmQzMTUxOGM4ZDE5NWI2Yjg0M2NlMjlkYzkyNmJiZmYxZGMyY2JhZTYwZjA0IiwidGFnIjoiIn0%3D

## Route Context

controller: App\Http\Controllers\Admin\SubjectController@destroyMajor
route name: admin.majors.destroy
middleware: web, auth

## Route Parameters

{
    "major": {
        "id": 10,
        "name": "Akuntansi dan Keuangan Lembaga",
        "code": null,
        "image_path": "majors/VNtpRcJgadNSXVBUqCq5Lghtm2fqGsfLnitISeWp.png",
        "created_at": "2026-05-19T08:40:48.000000Z",
        "updated_at": "2026-05-19T08:40:48.000000Z"
    }
}

## Database Queries

* mysql - select * from `sessions` where `id` = '2fgvFYUqUf3jl50Lan4GsAQiA22ysRcrvbwm8jig' limit 1 (15.95 ms)
* mysql - select * from `users` where `id` = 1 limit 1 (1.77 ms)
* mysql - select * from `majors` where `id` = '10' limit 1 (1.39 ms)
