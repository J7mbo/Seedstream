<?php

namespace App\Model\Form;

use App\Model\Entity\Client;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\Form\AbstractType;

class ClientType extends AbstractType
{
    /**
     * @inhertidocs
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** All forms for the Client will have 'port', 'authUsername' and 'authPassword' fields **/
        $builder->add('port', 'text')
                ->add('authUsername', 'text')
                ->add('authPassword', 'password');

        /** If the Client is a brand new one, add 'type' and 'endpoint' fields to the form **/
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) {
            $client = $event->getData();
            $form   = $event->getForm();

            if (!$client || $client->getId() === null)
            {
                $form->add('type', 'text')
                     ->add('endPoint', 'text');
            }
        });
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'App\Model\Entity\Client',
            'empty_data' => function (FormInterface $form) {
                return new Client(
                    $form->get('type')->getData(),
                    $form->get('port')->getData(),
                    $form->get('endPoint')->getData(),
                    $form->get('authUsername')->getData(),
                    $form->get('authPassword')->getData()
                );
            }
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'client';
    }
}