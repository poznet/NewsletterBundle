<?php

namespace Poznet\NewsletterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Letter
 *
 * @ORM\Table(name="Newsletter_Letter")
 * @ORM\Entity(repositoryClass="Poznet\NewsletterBundle\Entity\LetterRepository")
 */
class Letter
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
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="topic", type="string", length=255,nullable=true)
     */
    private $topic;

    /**
      * @ORM\OneToMany(targetEntity="Sends", mappedBy="letter"  ,cascade={"persist"})
     **/
    private $wyslane;


    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text",nullable=false)
     */
    private $message;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sended", type="boolean")
     */
    private $sended=false;


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
     * @return Letter
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
     * Set message
     *
     * @param string $message
     * @return Letter
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set sended
     *
     * @param boolean $sended
     * @return Letter
     */
    public function setSended($sended)
    {
        $this->sended = $sended;

        return $this;
    }

    /**
     * Get sended
     *
     * @return boolean 
     */
    public function getSended()
    {
        return $this->sended;
    }

    /**
     * Set topic
     *
     * @param string $topic
     * @return Letter
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get topic
     *
     * @return string 
     */
    public function getTopic()
    {
        return $this->topic;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->wyslane = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add wyslane
     *
     * @param \Poznet\NewsletterBundle\Entity\Sends $wyslane
     * @return Letter
     */
    public function addWyslane(\Poznet\NewsletterBundle\Entity\Sends $wyslane)
    {
        $this->wyslane[] = $wyslane;

        return $this;
    }

    /**
     * Remove wyslane
     *
     * @param \Poznet\NewsletterBundle\Entity\Sends $wyslane
     */
    public function removeWyslane(\Poznet\NewsletterBundle\Entity\Sends $wyslane)
    {
        $this->wyslane->removeElement($wyslane);
    }

    /**
     * Get wyslane
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWyslane()
    {
        return $this->wyslane;
    }
}
