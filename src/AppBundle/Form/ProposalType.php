<?php
namespace AppBundle\Form;

use AppBundle\AppBundle;
use AppBundle\Entity\Client;
use AppBundle\Entity\Proposal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
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
            ->add('series', NumberType::class, ['label' => 'Proposal series'])
            ->add('type', TextType::class, ['label' => 'Proposal type'])
            ->add('status', ChoiceType::class, [
                'choices' => Proposal::getStatuses(),
                'label' => 'Status:',
            ])
            ->add('proposalName', FileType::class, [
                'required' => false,
                'label' => 'Proposal Document'
            ])
            ->add('submit', SubmitType::class, array('label' => 'Submit'));

//        $builder->get('proposalName')
//            ->addModelTransformer(new CallbackTransformer(
//                function ($proposalNameAsString) {
//                    return new File('\'%kernel.root_dir%/../web/uploads/docs\''.'/'.$proposalNameAsString);
//                },
//                function ($proposalNameAsFile) {
//                    // transform the string back to an array
//                    return $proposalNameAsFile['path'];
//                }
//            ))
//        ;

        parent::buildForm($builder, $options);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Proposal',
        ]);
    }
}