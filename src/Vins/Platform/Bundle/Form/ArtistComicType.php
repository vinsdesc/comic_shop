<?php

namespace Vins\Platform\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArtistComicType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('artist', 'entity', array(
                    'class'   => 'VinsPlatformBundle:Artist'
                  ))
            ->add('job', 'choice', array(
                'choices' => array(
                    'Artist' =>'Artist',
                    'Writer' =>'Writer',
                    'Letterer' =>'Letterer',
                    'Cover' =>'Cover',
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
            'data_class' => 'Vins\Platform\Bundle\Entity\ArtistComic'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vins_platform_bundle_artistcomic';
    }
}
