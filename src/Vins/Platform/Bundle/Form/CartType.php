<?php

namespace Vins\Platform\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CartType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('paid')
            ->add('send')
            ->add('dateOrder')
            ->add('dateExpected')
            ->add('client', 'entity', array(
                  'class' => 'VinsUserBundle:Client',
                  'property' => 'username',
                  'multiple' => false,
                  'expanded' => false
                ))
            ->add('cartLines', 'collection',  array
                ('type' => new CartLineType(),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false
                 ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vins\Platform\Bundle\Entity\Cart'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vins_platform_bundle_cart';
    }
}
