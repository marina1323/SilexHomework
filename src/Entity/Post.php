<?php

namespace Application\Entity;
use Symfony\Component\Validator\Constraints as Assert;
class Post{

     /**
     * Post id.
     *
     * @var integer
     */
     protected $id;
	 
	 /**
     * Authors first name.
     *
     * @var string
     */
     protected $firstName;
	 
	 /**
     *  Authors last name.
     *
     * @var string
     */
	
     protected $lastName;
	 /**
     *  Authors email.
     *
     * @var string
     */
	 
     protected $email;
	 
	 /**
     *  Authors telephone number.
     *
     * @var string
     */
	 
     protected $phoneNumber;
	 
	 /**
     *  Comment.
     *
     * @var string
     */
     
     protected $comment;

    public function setId($id)
    {
       $this->id = $id;
    }
	
    public function getId()
    {
        return $this->id;
    }
    
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
   
    public function getFirstName()
    {
        return $this->firstName;
    }
	
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
   
    public function getLastName()
    {
        return $this->lastName;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }
   
    public function getEmail()
    {
        return $this->email;
    }
	
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
    
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
   
    public function setComment($comment)
    {
        $this->comment = $comment;
    }
   
    public function getComment()
    {
        return $this->comment;
    }

  

 }
