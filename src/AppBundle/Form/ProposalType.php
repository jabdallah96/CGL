<?php
namespace AppBundle\Form;

use AppBundle\AppBundle;
use AppBundle\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProposalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //Need to add client, should I add the option to choose from existing? If so, how should I make it look alongside the create client form
            ->add('client', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'name',
            ])
            ->add('number', TextType::class)
            ->add('status', ChoiceType::class, array('choices' => ['Pending'=>0, 'Approved'=> 1, 'Rejected' => 2] , 'label' => 'Status: '))
            ->add('proposalName', FileType::class, array(
                'required'      => false,
                'label' => 'Proposal Document'
            ))
            ->add('submit', SubmitType::class, array('label' => 'Submit'))
        ;

        parent::buildForm($builder,$options);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Proposal',
        ]);
    }
}