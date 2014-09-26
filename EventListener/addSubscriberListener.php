<?php
namespace Poznet\NewsletterBundle\EventListener; 

use Poznet\NewsletterBundle\Event\submitEvent; 
use Poznet\NewsletterBundle\Entity\Subscribers;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraints\Email as EmailConstraint;
 
class addSubscriberListener
{	
    //services
	protected $em;
    protected $validator;
    protected $session;
    protected $templating;
    protected $mailer;
    //parameters
    private $from;
    private $url;
  
 
    // Inject your services to the constructor etc..
 	
 	public function __construct($em,$validator,$session,$templating,$mailer,$from,$url){
 		$this->em=$em;
        $this->validator=$validator;
        $this->session=$session;
        $this->templating=$templating;
        $this->mailer=$mailer;
        $this->from=$from;
        $this->url=$url;
     	}

  
    public function onaddListenerEvent(submitEvent $event) {
            $em=$this->em;
    		$email=$event->getEmail();
            $emailConstraint = new EmailConstraint();
            $emailConstraint->message = 'Podany adres e-mail jest niepoprawny';
            $errors = $this->validator->validateValue($email,$emailConstraint );
            $kom='';
            if($errors!=''){
                $kom=$this->templating->render('PoznetNewsletterBundle:Infos:error',array('error'=>$errors));
                
            }else{
                  //poprawny e-mail
                $spr= $em->getRepository('PoznetNewsletterBundle:Subscribers')->findOneByEmail($email);
                if($spr){
                    //juz jest
                    $kom=$this->templating->render('PoznetNewsletterBundle:Infos:error_already_added.html.twig');

                    
                }else{
                    $konto=new Subscribers();
                    $konto->setEmail($email);
                    $em->persist($konto);
                    $em->flush();
                      $message = \Swift_Message::newInstance()
                      ->setSubject('Potwierdzenie rejestracji w newsletterze')
                      ->setFrom($this->from)
                      ->setTo($konto->getEmail())
                      ->setBody($this->templating->render('PoznetNewsletterBundle:Mail:email_newsletter_rejestracja.txt.twig',array('id'=>$konto->getId(),'url'=>$this->url,'kod'=>$konto->getconfrimationCode())) ,'text/html');
                
                    $this->mailer->send($message);
                    echo 'ok';

                    $em->flush();

                    $kom=$this->templating->render('PoznetNewsletterBundle:Infos:email_added_to_subscribers.html.twig');

                }    
                
            }
            $this->session->getFlashBag()->add('notice',$kom);
    	 
      
    }
} 