<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Installation Instructions

<ol> 
    <li> 
        <h3>Clone the Repository</h3> 
        <p>Clone the repository to your local machine:</p> 
        <pre>git clone https://github.com/Razzaq44/razzaq_fdtest</pre> 
    </li> 
    <li> 
        <h3>Install Dependencies</h3> 
        <p>Make sure you have Composer installed. Then, run the following command:</p> 
        <pre>composer install && npm install</pre> </li> 
    <li> 
        <h3>Set Up The Environment</h3> 
        <p>Copy .env.example to .env:</p>
        <pre>cp .env.example .env</pre> </li>
    <li> <h3>Generate Application Key</h3>
        <p>Run the command to generate the app key:</p>
        <pre>php artisan key:generate</pre> </li> <li> 
            <h3>Set Up Database</h3> <p>Configure your database connection in the .env file.</p>
        </li> 
    <li> 
        <h3>Migrate Database</h3> 
        <p>Run the migrations to set up your database schema:</p>
        <pre>php artisan migrate</pre> </li>
    <li> 
        <h3>Start the Development Server</h3> 
        <p>Run the server to start your application:</p> 
        <pre>composer run dev</pre>
    </li> 
</ol>

<h3>Why Livewire and FluxUi</h3>
<p>
    FlexUI and Livewire complement each other perfectly by enhancing the development experience. FlexUI, with its flexible design system, allows for a responsive and user-friendly interface. Livewire, on the other hand, brings dynamic functionality without needing to write much JavaScript. Together, they streamline the process of building modern, interactive applications, allowing developers to focus on business logic while maintaining a great user interface. Using FlexUi s for consistent of my UI. :)
</p>
