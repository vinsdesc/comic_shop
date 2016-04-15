<?php

namespace Vins\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientType extends AbstractType
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
         return 'fos_user_registration';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder->add('adresses', 'collection', array(
        'type'         => new AddressType(),
        'allow_add'    => true,
        'allow_delete' => true
      ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vins_userbundle_client';
    }
}
