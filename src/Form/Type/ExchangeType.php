<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Required;

/**
 * Class ExchangeType
 * @package App\Form\Type
 * @author Dominick Makome <makomedominick@gmail.com>
 */
class ExchangeType extends AbstractType
{

    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('from', CurrencyType::class)
            ->add('amount', NumberType::class, ['constraints' => [new Required(), new NotBlank()]])
            ->add('to', CurrencyType::class);
    }

}