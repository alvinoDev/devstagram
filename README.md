
## Laravel Model factories
Registros de la base de datos de forma predecible y fácilmente replicable, para que las pruebas de tu aplicación sean coherentes y estén controladas.

## Formas de almacenar con LARAVEL

// Post::create([
//     'title' => $request->title,
//     'description' => $request->description,
//     'image' => $request->image,
//     'user_id' => auth()->user()->id
// ]);

//OTRA FORMA DE HACER LO ANTERIOR
$post = new Post;
$post->title = $request->title;
$post->description = $request->description;
$post->image = $request->image;
$post->user_id = auth()->user()->id;
$post->save();

// UNA TERCERA FORMA
<!-- $request->user()->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => auth()->user()->id
        ]); -->


## About Laravel

Laravel Framework 10.24.0

PHP 8.2.10 (cli) (built: Sep  2 2023 06:59:22) (NTS) - Copyright (c) The PHP Group
Zend Engine v4.2.10, Copyright (c) Zend Technologies - with Zend OPcache v8.2.10, Copyright (c), by Zend Technologies - with Xdebug v3.2.1, Copyright (c) 2002-2023, by Derick Rethans

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
