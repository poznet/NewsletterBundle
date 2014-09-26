<?php
namespace Poznet\NewsletterBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Poznet\NewsletterBundle\Entity\Subscribers;

class removeInactiveCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('newsletter:remove:notconfirmed')
            ->setDescription('Usuwa niepotwierdzone w ciagu 7 dni konta')             
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Konta :');
        $em = $this->getContainer()->get('doctrine')->getManager();
        $konta=$em->getRepository('PoznetNewsletterBundle:Subscribers')->oldandnotconfirmed();
	    $ile=count($konta);
      		for($i=0;$i<$ile;$i++){
	            $output->writeln($konta[$i]->getEmail());
              	$em->remove($konta[$i]);
        }
        $em->flush();



       
        $output->writeln('');
        $output->writeln('Done');
    }
}