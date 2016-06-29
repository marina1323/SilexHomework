<?php

namespace Application\Repository;

use Doctrine\DBAL\Connection;
use Application\Entity\Post;

class PostRepository
{
  
    /**
     * @var \Doctrine\DBAL\Connection
     */
    protected $db;
	
	 public function __construct(Connection $db)
    {
        $this->db = $db;
    }
	
	/**
     * Return all posts from the database.
     *
     * @return array of posts.
     */
	public function getAll()
	{
	    $data = $this->db->executeQuery('SELECT * FROM posts');
		$posts = array();
        foreach ($data as $item) {
            $postId = $item['id'];
            $posts[$postId] = $this->createPost($item);
        }
        return $posts;
	}
	
	 /**
     * Inserts post to the database.
     *
     * @param \Application\Entity\Post $post
     */
	 
	public function insert(Post $post)
	{
	     $this->db->insert('posts', array(
	    'first_name' => $post->getFirstName(),
	    'last_name' => $post->getLastName(),
		'email' => $post->getEmail(),
		'phone_number' => $post->getPhoneNumber(),
	    'comment' => $post->getComment()
	    )); 
	}
	
	/**
     * Returns the post with the given id.
     *
     * @param integer $postId
     *
     * @return \Application\Entity\Post
     */
	 
	public function findById($postId)
	{
	   $data = $this->db->fetchAssoc('SELECT * FROM posts WHERE id = ?', array($postId));
	    if(!$data)
	   {
	       return false;
	   }
       return $this->createPost($data);
	}
	
	/**
     * Updates post.
     *
     * @param \Application\Entity\Post
     */
	public function edit(Post $post)
	{
	 $this->db->executeUpdate('UPDATE posts SET first_name = ?,last_name = ?,email = ?, phone_number = ?, comment = ?  WHERE id = ?', 
	 array(
	 $post->getFirstName(),
	 $post->getLastName(),
	 $post->getEmail(),
	 $post->getPhoneNumber(),
	 $post->getComment(),
	 $post->getId()
	    )
	 );
	   
	}
	/**
     * Creates a post entity and sets its properties using array of 
	 *  data from database.
     *
     * @param array $data
     * 
     * @return \Application\Entity\Post
     */
	private function createPost($data)
	{
	    $post = new Post();
		$post->setId($data['id']);
        $post->setFirstName($data['first_name']);
        $post->setLastName($data['last_name']);
        $post->setEmail($data['email']);
        $post->setPhoneNumber($data['phone_number']);
        $post->setComment($data['comment']);
        
        return $post;
	}

}
