<?php
namespace AppBundle\Form;

use AppBundle\AppBundle;
use AppBundle\Entity\Proposal;
use AppBundle\Entity\Job;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('proposal', EntityType::class, [
                'class' => Proposal::class,
                'choices' => $options['proposals'],
                'choice_label' => 'reference',
            ])
            ->add('submit', SubmitType::class, array('label' => 'Submit'));

        parent::buildForm($builder, $options);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Job',
            'proposals' => null,
        ));
    }

}