<?php

namespace Vins\UserBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientEditType extends AbstractType
{
	/**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vins\UserBundle\Entity\Client'
        ));
    }


    public function getParent()
    {
         return new ClientType();    
     }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder->remove('plainPassword');
       $builder->add('roles', 'collection', array(
       
        'allow_add'    => true,
        'allow_delete' => true
      ));

    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vins_userbundle_client_edit';
    }
}