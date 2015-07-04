<?php

namespace Poznet\NewsletterBundle\Services;

use Poznet\NewsletterBundle\Entity\Subscribers;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraints\Email as EmailConstraint;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of subscriber
 *
 * @author michalg
 */
class newsletter {
    private $em;
    private $error=null;
    private $templating;
    private $translator;
    private $validator;
    private $from;
    private $url;
        
    public function __construct($em=null,$temp=null,$trans=null,$validator=null,$from=null,$url=null) {
        $this->em=$em;
        $this->templating=$temp;
        $this->translator=$trans;
        $this->validator=$validator;
        $this->from=$from;
        $this->url=$url;        
           
    }
    
    
    public function getError(){
        return $this->error;
    }
    public function checkEmail($email){
        
        $wynik=$this->em->getRepository('PoznetNewsletterBundle:Subscribers')->findOneByEmail($email);
        if($wynik){
            $this->error=$this->templating->render('PoznetNewsletterBundle:Infos:error_already_added.html.twig');
          echo 'blee';
            return false;
            
        }
        
        $emailConstraint = new EmailConstraint();
        $emailConstraint->message = $this->translator->trans('Podany adres e-mail jest niepoprawny');
        $errors = $this->validator->validateValue($email,$emailConstraint );
        if($errors!=''){
           $this->error=$this->templating->render('PoznetNewsletterBundle:Infos:error.html.twig',array('error'=>$errors)); 
           echo 'blee';
            return false;
        }    
        echo 'ok';
        return true;
    }
    
    public function addSubscriber($email){
        if(!$this->checkEmail($email)){
            return false;
        }
        $user=new Subscribers();
        $user->setEmail($email);
        $this->em->persist($user);
        $this->em->flush();
         $message = \Swift_Message::newInstance()
                      ->setSubject($this->translator->trans('Potwierdzenie rejestracji w newsletterze'))
                      ->setFrom($this->from)
                      ->setTo($konto->getEmail())
                      ->setBody($this->templating->render('PoznetNewsletterBundle:Mail:email_newsletter_rejestracja.txt.twig',array('id'=>$konto->getId(),'url'=>$this->url,'kod'=>$konto->getconfrimationCode())) ,'text/html');
                
                    $this->mailer->send($message);
        return true;
                
     
        
    }
}
