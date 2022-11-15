<?php

namespace App\Controller;

use App\Service\Meterage\MeterageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PageController
 */
class DataController extends AbstractController
{
    private Environment $twig;
    private MeterageService $service;
    private SerializerInterface $serializer;

    public function __construct(
        Environment $twig,
        MeterageService $service,
        SerializerInterface $serializer
    ) {
        $this->twig = $twig;
        $this->service = $service;
        $this->serializer = $serializer;
    }

    /**
     * @Route("/data-meters", name="data-meters")
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function index(): Response
    {
        return new Response($this->twig->render('pages/sat_data.html.twig', []));
    }

    /**
     * @Route("/data-sat", name="data-meters")
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function sat(): Response
    {
        return new Response($this->twig->render('pages/data.html.twig', []));
    }

    /**
     * @Route("/get-table-data", name="get-data")
     * @return Response
     */
    public function table(): Response
    {
        $data = $this->service->createTable();

        $jsonContent = $this->serializer->serialize($data, 'json');

        return new JsonResponse(json_decode($jsonContent));
    }

    /**
     * @Route("/get-plot-data", name="get-plot-data")
     * @return Response
     */
    public function plot(
        Request $request
    ): Response
    {
        $parameter = $request->query->get('parameter');
        $location = $request->query->get('location');

        $data = $this->service->createPlot($parameter, $location);
        $jsonContent = $this->serializer->serialize(
            $data, 'json');

        return new JsonResponse(json_decode($jsonContent));
    }

    /**
     * @Route("/data-plot", name="/plot")
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function plotView(): Response
    {
        return new Response($this->twig->render('plot.html.twig', []));
    }
}