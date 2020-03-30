<?php

namespace App\Controller;

use ExchangeRate\ExchangeRateFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

/**
 * Class MainController
 * @package App\Controller
 */
class MainController
{
    /**
     * @Route("/main/avg_rates", name="avg_rates")
     * @throws \Exception
     * @throws ExceptionInterface
     */
    public function avgRates()
    {
        $exchangeRate = (new ExchangeRateFactory())->createExchangeRate();
        $rates = $exchangeRate->getAverageRate(new \DateTime());

        return new JsonResponse([$rates->getEur(), $rates->getUsd(),]);
    }
}