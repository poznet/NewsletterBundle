<?php
namespace Poznet\NewsletterBundle\Event;
 
use Symfony\Component\EventDispatcher\Event;
 
class submitEvent extends Event
{
    private $email = '';
 	
 	public function __construct($adres){
 	$this->email=$adres;

 	}
    public function addEmail($email)
    {
        $this->$email = $email;
            
    }
 
    public function getEmail()
    {
        return $this->email;
    }
}