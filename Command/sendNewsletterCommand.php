<?php
namespace Poznet\NewsletterBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Poznet\NewsletterBundle\Entity\Subscribers;
use Poznet\NewsletterBundle\Entity\Sends;

class sendNewsletterCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('newsletter:send:letters')
            ->setDescription('Wysyła newsletter')             
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	$now=new \DateTime('now');
        $em = $this->getContainer()->get('doctrine')->getManager();
        //wybiera listy przygotowane dla wysyłki
        $listy=$em->getRepository('PoznetNewsletterBundle:Letter')->toSend();
        $ile=count($listy);
        for($i=0;$i<$ile;$i++){
        	$output->writeln('List ['.$listy[$i]->getTopic().'] ');
	        // wybiera userów  z datą  rejestracji < teraz  (juz zerejstrownych)
	        $konta=$em->getRepository('PoznetNewsletterBundle:Subscribers')->readytosend($now);
		    $ile2=count($konta);
	      		for($j=0;$j<$ile2;$j++){
	      			$output->write('		'.$konta[$j]->getEmail().' ');
	      			$check=$em->getRepository('PoznetNewsletterBundle:Sends')->confirmsend($listy[$i]->getId(),$konta[$j]->getId());
	      			if($check){
	      				$output->writeln('   JUZ BYLO ');
	      			}else{
	      				$output->writeln('	 WYSYLKA ');

	      				$message = \Swift_Message::newInstance()
                      ->setSubject($listy[$i]->getTopic())
                      ->setFrom($this->getContainer()->getParameter('mailer_from'))
                      ->setTo($konta[$j]->getEmail())
                      ->setBody($this->getContainer()->get('templating')->render('PoznetNewsletterBundle:Mail:newsletter.txt.twig',array('tresc'=>$listy[$i]->getMessage(),'id'=>$konta[$j]->getId(),'kod'=>$konta[$j]->getrevokeCode())) ,'text/html');
                
	                    $this->getContainer()->get('mailer')->send($message);


	      				$send=new Sends();
	      				$send->setDate($now);
	      				$send->setLetter($listy[$i]);
	      				$send->setSubscriber($konta[$j]);
	      				$em->persist($send);
	      			}

		            
	              	
	        }
	        $em->flush();
    	}
        



       
        $output->writeln('');
        $output->writeln('Done');
    }
}