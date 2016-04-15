<?php

namespace Vins\Platform\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArtistType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('firstName')
            ->add('biography')
             ->add('birthDate' , 'date', array(
                  'widget' => 'choice',
                  'years' => range(1950,1990),
                  'format' => 'dd-MM-yyyy',
                   'placeholder' => array(
                        'year' => 'Year', 'month' => 'Month', 'day' => 'Day'
                    )
                  ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vins\Platform\Bundle\Entity\Artist'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vins_platform_bundle_artist';
    }
}
