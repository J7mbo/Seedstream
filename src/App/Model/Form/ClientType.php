<?php

namespace App\Model\Form;

use Symfony\Component\OptionsResolver\OptionsResolverInterface,
    Symfony\Component\Routing\Generator\UrlGenerator,
    Symfony\Component\Form\FormBuilderInterface,
    App\Model\Repository\ServerRepository,
    Symfony\Component\Form\FormInterface,
    Symfony\Component\Form\AbstractType,
    App\Model\Entity\Client;

/**
 * Class ClientType
 *
 * Custom form field type used to display the 'addClient' form
 *
 * @see http://symfony.com/doc/current/cookbook/form/create_custom_field_type.html
 *
 * @package App\Model\Form
 */
class ClientType extends AbstractType
{
    /**
     * @var UrlGenerator
     */
    protected $urlGenerator;

    /**
     * @constructor
     *
     * @param UrlGenerator $urlGenerator
     */
    public function __construct(UrlGenerator $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** Dropdown box containing the server name **/
        $builder->add('server', 'entity', [
            'class' => 'App\Model\Entity\Server',
            'query_builder' => function(ServerRepository $serverRepository) {
                return $serverRepository->createQueryBuilder('s');
            },
            'empty_data' => '--- NO SERVERS ---'
        ]);

        /** Dropdown box containing the client names **/
        $builder->add('client', 'choice', [
            'choices' => [
                'transmission' => 'transmission',
                'deluge'       => 'deluge'
            ],
            'mapped' => false
        ]);

        /** The rest of the form elements **/
        $builder->add('port')
                ->add('authUsername')
                ->add('authPassword')
                ->add('endPoint')
                ->add('addClient', 'submit');

        $builder->setAction($this->urlGenerator->generate('admin_servers_add_client'))->setMethod('POST');
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'App\Model\Entity\Client',
            'empty_data' => function(FormInterface $form) {
                return new Client(
                    $form->get('client')->getData(),
                    $form->get('port')->getData(),
                    $form->get('endPoint')->getData(),
                    $form->get('authPassword')->getData(),
                    $form->get('authUsername')->getData()
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