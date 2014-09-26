<?php

namespace Poznet\NewsletterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SubscribersType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('confirmed')
            ->add('confrimationCode')
            ->add('registerDate')
            ->add('registerIp')
            ->add('confirmationDate')
            ->add('confirmationIp')
            ->add('revokeCode')
            ->add('revokeDate')
            ->add('revokeIp')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Poznet\NewsletterBundle\Entity\Subscribers'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'poznet_newsletterbundle_subscribers';
    }
}
