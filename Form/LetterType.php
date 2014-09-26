<?php

namespace Poznet\NewsletterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LetterType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date',null,array("label"=>"Data","widget"=>"single_text"))
            ->add('topic',null,array("label"=>"Temat listu",'attr'=>array('class'=>'newsletter')))
            ->add('message','textarea',array("label"=>"Wiadomość", 'attr'=>array('class'=>'newsletter')))
            ->add('submit', 'submit', array('label' => 'Zapisz' , 'attr'=>array('class'=>'newsletterbutton')))
            ->add('cancel', 'button', array('label' => 'Anluluj', 'attr' => array('onClick' => 'history.back();','class'=>'newsletterbutton')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Poznet\NewsletterBundle\Entity\Letter'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'poznet_newsletterbundle_letter';
    }
}
