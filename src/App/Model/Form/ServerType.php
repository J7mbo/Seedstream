<?php

namespace App\Model\Form;

use Symfony\Component\OptionsResolver\OptionsResolverInterface,
    Symfony\Component\Routing\Generator\UrlGenerator,
    App\Model\Entity\ValueObjects\Server\IpAddress,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\Form\FormInterface,
    Symfony\Component\Form\AbstractType,
    App\Model\Entity\Server;

/**
 * Class ServerType
 *
 * Custom form field type used to display the 'addServer' form
 *
 * @see http://symfony.com/doc/current/cookbook/form/create_custom_field_type.html
 *
 * @package App\Model\Form
 */
class ServerType extends AbstractType
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
        $builder->add('ipAddress', 'text')->add('name', 'text')->add('addServer', 'submit');;

        $builder->setAction($this->urlGenerator->generate('admin_servers_add_server'))->setMethod('POST');
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'App\Model\Entity\Server',
            'empty_data' => function(FormInterface $form) {
                return new Server(
                    new IpAddress($form->get('ipAddress')->getData()),
                    $form->get('name')->getData()
                );
            }
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'server';
    }
}