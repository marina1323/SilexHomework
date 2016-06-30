<?php

namespace Application\Controller;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Application\Repository\PostRepository;

class PostServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['posts.repository'] = $app->share(function () use ($app) {
            return new PostRepository($app['db']);
        });
        $app['posts.controller'] = $app->share(function () use ($app) {
            return new PostController($app);
        });
    }
    public function boot(Application $app)
    {
    }
}
