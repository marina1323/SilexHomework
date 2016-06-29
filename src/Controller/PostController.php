<?php

namespace Application\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Application\App;
use Application\Form\PostType;
use Application\Entity\Post;

class PostController
{

   /** 
   * @var Application\App
   */
    protected $app;
	
	 public function __construct(App $app)
    {
         $this->app = $app;
    }
     
    public function indexAction(Request $request)
    {
      $posts = $this->app['posts.repository']->getAll();
      return $this->app['twig']->render('main.html.twig', array('posts' => $posts));
    }
	
	public function addAction(Request $request)
	{
	   $post = new Post();
	   $form = $this->app['form.factory']->create(PostType::class, $post);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $this->app['posts.repository']->insert($post);
                return $this->app->redirect($this->app['url_generator']->generate('posts.view'));
            }
        }

        return $this->app['twig']->render('form.html.twig', array('form' => $form->createView(),'action' => 'Create post'));
	}
    
	public function editAction($id, Request $request)
	{
      $post = $this->app['posts.repository']->findById($id);
	  if (!$post) {
           $this->app->abort(404, 'This post was not found.');
        }
		$form = $this->app['form.factory']->create(PostType::class, $post);
		if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $this->app['posts.repository']->edit($post);
                return 'The post has been saved.';
                
            }
        }
     return $this->app['twig']->render('form.html.twig', array('form' => $form->createView(), 'action' => 'Edit post'));
	}
    
}
