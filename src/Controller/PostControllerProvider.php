<?php

namespace Application\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;

class PostControllerProvider implements ControllerProviderInterface
{
  public function connect(Application $app)
  {
     $controllers = $app['controllers_factory'];
	 $controllers->get('/','posts.controller:indexAction')->bind('posts.view');
	 $controllers->match('/add','posts.controller:addAction')->bind('posts.add');
	 $controllers->match('/edit/{id}','posts.controller:editAction')->bind('posts.edit')
      ->convert('posts', function ($id) use ($app) {
          return $app['posts.repository']->findById($id);
        });
    return $controllers;
  }
}
