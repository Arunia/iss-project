<?php

namespace Iss\ConferenceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConferenceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')->add('start_date')
            ->add('start_date', DateType::class, array(
                'widget' => 'single_text',
                'attr' => array('class' => 'datepicker', 'data-format' => 'yyyy-mm-dd'),
                'format' => 'yyyy-MM-dd',
            ))->add('end_date', DateType::class, array(
                'widget' => 'single_text',
                'attr' => array('class' => 'datepicker', 'data-format' => 'yyyy-mm-dd'),
                'format' => 'yyyy-MM-dd',
            ))->add('domeniu')->add('descriere', TextareaType::class, array(
                'attr' => array('class' => 'tinymce')
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Iss\ConferenceBundle\Entity\Conference'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'iss_conferencebundle_conference';
    }


}
