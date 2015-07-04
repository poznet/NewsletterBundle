<?php

namespace Poznet\NewsletterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Poznet\NewsletterBundle\Classes\Password;

/**
 * Subscribers
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Poznet\NewsletterBundle\Entity\SubscribersRepository")
 */
class Subscribers
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
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="confirmed", type="boolean")
     */
    private $confirmed=false;

    /**
     * @var string
     *
     * @ORM\Column(name="confrimation_code", type="string", length=100,nullable=true)
     */
    private $confrimationCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="register_date", type="datetime")
     */
    private $registerDate;

    /**
     * @var string
     *
     * @ORM\Column(name="register_ip", type="string", length=100,nullable=true)
     */
    private $registerIp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="confirmation_date", type="datetime" ,nullable=true)
     */
    private $confirmationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="confirmation_ip", type="string", length=100 ,nullable=true)
     */
    private $confirmationIp;

    /**
     * @var string
     *
     * @ORM\Column(name="revoke_code", type="string", length=100 ,nullable=true)
     */
    private $revokeCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="revoke_date", type="datetime" ,nullable=true)
     */
    private $revokeDate;

    /**
     * @var string
     *
     * @ORM\Column(name="revoke_ip", type="string", length=100 ,nullable=true)
     */
    private $revokeIp;

    /**
      * @ORM\OneToMany(targetEntity="Sends", mappedBy="subscriber"  ,cascade={"persist"})
     **/
    private $wyslane;


    /**
     * Get id
     *
     * @return integer 
     */

    public function __construct(){
        $this->registerDate=new \DateTime('now');
        $this->registerIp=$_SERVER['REMOTE_ADDR'];
        $this->confrimationCode=new Password();
        $this->revokeCode=new Password();

    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Subscribers
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set confirmed
     *
     * @param boolean $confirmed
     * @return Subscribers
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    /**
     * Get confirmed
     *
     * @return boolean 
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * Set confrimationCode
     *
     * @param string $confrimationCode
     * @return Subscribers
     */
    public function setConfrimationCode($confrimationCode)
    {
        $this->confrimationCode = $confrimationCode;

        return $this;
    }

    /**
     * Get confrimationCode
     *
     * @return string 
     */
    public function getConfrimationCode()
    {
        return $this->confrimationCode;
    }

    /**
     * Set registerDate
     *
     * @param \DateTime $registerDate
     * @return Subscribers
     */
    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;

        return $this;
    }

    /**
     * Get registerDate
     *
     * @return \DateTime 
     */
    public function getRegisterDate()
    {
        return $this->registerDate;
    }

    /**
     * Set registerIp
     *
     * @param string $registerIp
     * @return Subscribers
     */
    public function setRegisterIp($registerIp)
    {
        $this->registerIp = $registerIp;

        return $this;
    }

    /**
     * Get registerIp
     *
     * @return string 
     */
    public function getRegisterIp()
    {
        return $this->registerIp;
    }

    /**
     * Set confirmationDate
     *
     * @param \DateTime $confirmationDate
     * @return Subscribers
     */
    public function setConfirmationDate($confirmationDate)
    {
        $this->confirmationDate = $confirmationDate;

        return $this;
    }

    /**
     * Get confirmationDate
     *
     * @return \DateTime 
     */
    public function getConfirmationDate()
    {
        return $this->confirmationDate;
    }

    /**
     * Set confirmationIp
     *
     * @param string $confirmationIp
     * @return Subscribers
     */
    public function setConfirmationIp($confirmationIp)
    {
        $this->confirmationIp = $confirmationIp;

        return $this;
    }

    /**
     * Get confirmationIp
     *
     * @return string 
     */
    public function getConfirmationIp()
    {
        return $this->confirmationIp;
    }

    /**
     * Set revokeCode
     *
     * @param string $revokeCode
     * @return Subscribers
     */
    public function setRevokeCode($revokeCode)
    {
        $this->revokeCode = $revokeCode;

        return $this;
    }

    /**
     * Get revokeCode
     *
     * @return string 
     */
    public function getRevokeCode()
    {
        return $this->revokeCode;
    }

    /**
     * Set revokeDate
     *
     * @param \DateTime $revokeDate
     * @return Subscribers
     */
    public function setRevokeDate($revokeDate)
    {
        $this->revokeDate = $revokeDate;

        return $this;
    }

    /**
     * Get revokeDate
     *
     * @return \DateTime 
     */
    public function getRevokeDate()
    {
        return $this->revokeDate;
    }

    /**
     * Set revokeIp
     *
     * @param string $revokeIp
     * @return Subscribers
     */
    public function setRevokeIp($revokeIp)
    {
        $this->revokeIp = $revokeIp;

        return $this;
    }

    /**
     * Get revokeIp
     *
     * @return string 
     */
    public function getRevokeIp()
    {
        return $this->revokeIp;
    }

    /**
     * Add wyslane
     *
     * @param \Poznet\NewsletterBundle\Entity\Sends $wyslane
     * @return Subscribers
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
