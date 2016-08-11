<?php
namespace AppBundle\Form;

use AppBundle\AppBundle;
use AppBundle\Entity\Client;
use AppBundle\Entity\RequestJob;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RequestJobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('client', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'name',
            ])
            ->add('visit_date', DateType::class,[
                'label' => 'Visit Date',

                'data' => new \DateTime('now'),
            ])
            ->add('contact', TextType::class,[
                'label' => 'Driver/Contact Name'
            ])
            ->add('job_type', TextType::class,[
                'label' => 'Job Type'
            ])
            ->add('submit', SubmitType::class, array('label' => 'Submit'))
            ->add('item', CollectionType::class, array(
                'by_reference' => false,
                'entry_type' => ItemType::class,
                'allow_add' => true,
                'allow_delete' => true,
            ));

        parent::buildForm($builder, $options);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\RequestJob',
        ]);
    }

}