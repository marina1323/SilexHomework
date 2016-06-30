<?php

namespace Application;

use Silex\Application as SilexApplication;
use Silex\Provider\TwigServiceProvider as TwigServiceProvider;
use Silex\Provider\DoctrineServiceProvider as DoctrineServiceProvider;
use Silex\Provider\FormServiceProvider as FormServiceProvider;
use Silex\Provider\ValidatorServiceProvider as ValidatorServiceProvider;
use Silex\Provider\TranslationServiceProvider as TranslationServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Application\Controller\PostControllerProvider;
use Application\Controller\PostServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class App extends SilexApplication
{
    public function __construct()
    {
        parent::__construct();
        $this->registerProviders($this);
        $this->registerRoutes($this);
    }

    protected function registerRoutes(App $app)
    {
        $app->mount('/', new PostControllerProvider());
    }
  
    protected function registerProviders(App $app)
    {
         $app->register(new PostServiceProvider());
         $app->register(new UrlGeneratorServiceProvider());
         $app->register(new ServiceControllerServiceProvider());
         $app->register(new TwigServiceProvider(), array
         (
            'twig.path' => __DIR__.'\..\resources\views',
         ));

         $app->register(new DoctrineServiceProvider(), array(
         'db.options' => array(
         'driver'   => 'pdo_mysql',
         'dbname'   => 'homework',
         'host'     => 'localhost',
         'user'     => 'root',
         'password' => ''
         ),
             ));
         $app->register(new PostServiceProvider());
         $app->register(new FormServiceProvider());
         $app->register(new ValidatorServiceProvider());
         $app->register(new TranslationServiceProvider(), array(
         'translator.messages' => array(),
         ));
    }
}
