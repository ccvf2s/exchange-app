<?php

namespace App\Controller;

use App\Form\Type\ExchangeType;
use App\Service\Calculator\ExchangeCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package App\Controller
 * @author Dominick Makome <makomedominick@gmail.com>
 */
class DefaultController extends Controller
{

    /**
     * @param Request $request
     * @param ExchangeCalculator $exchangeCalculator
     *
     * @return Response
     */
    public function exchangeAction(Request $request, ExchangeCalculator $exchangeCalculator): Response
    {
        $form = $this->createForm(ExchangeType::class, []);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $amount = $form->get('amount')->getData();
            $from = $form->get('from')->getData();
            $to = $form->get('to')->getData();

            $result = $exchangeCalculator->exchange($amount, $from, $to);
            return $this->render(
                'default/exchange.html.twig',
                    [
                        'form' => $form->createView(),
                        'exchangeAmount' => $result ? "Convert {$amount} {$from} -> {$result} {$to}" : "Come back later we still don't have this exchange for {$from} -> {$to}",
                    ]
            );
        }
        return $this->render('default/exchange.html.twig', ['form' => $form->createView()]);
    }

}