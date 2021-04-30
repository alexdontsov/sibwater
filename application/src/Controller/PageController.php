<?php

namespace App\Controller;

use App\Repository\RegionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PageController
 */
class PageController extends AbstractController
{
    /**
     * @var Environment
     */
    private Environment $twig;

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * ConferenceController constructor.
     * @param Environment $twig
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(Environment $twig, EntityManagerInterface $entityManager)
    {
        $this->twig = $twig;
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/", name="homepage")
     * @param RegionRepository $conferenceRepository
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function index(RegionRepository $conferenceRepository)
    {
        return new Response($this->twig->render('pages/index.html.twig', [
            'conferences' => $conferenceRepository->findAll(),
        ]));
    }
}