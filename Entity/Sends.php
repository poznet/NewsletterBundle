<?php

namespace Poznet\NewsletterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sends
 *
 * @ORM\Table(name="Newsletter_Sends")
 * @ORM\Entity(repositoryClass="Poznet\NewsletterBundle\Entity\SendsRepository")
 */
class Sends
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

     /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Letter", inversedBy="wyslane"  )
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL")
     */
     
    private $letter;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Subscribers", inversedBy="wyslane"  )
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL")
     */
     
    private $subscriber;





    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Sends
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set letter
     *
     * @param \Poznet\NewsletterBundle\Entity\Letter $letter
     * @return Sends
     */
    public function setLetter(\Poznet\NewsletterBundle\Entity\Letter $letter = null)
    {
        $this->letter = $letter;

        return $this;
    }

    /**
     * Get letter
     *
     * @return \Poznet\NewsletterBundle\Entity\Letter 
     */
    public function getLetter()
    {
        return $this->letter;
    }

    /**
     * Set subscriber
     *
     * @param \Poznet\NewsletterBundle\Entity\Subscribers $subscriber
     * @return Sends
     */
    public function setSubscriber(\Poznet\NewsletterBundle\Entity\Subscribers $subscriber = null)
    {
        $this->subscriber = $subscriber;

        return $this;
    }

    /**
     * Get subscriber
     *
     * @return \Poznet\NewsletterBundle\Entity\Subscribers 
     */
    public function getSubscriber()
    {
        return $this->subscriber;
    }
}
