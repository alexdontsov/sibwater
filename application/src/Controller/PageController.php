<?php

namespace App\Controller;

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
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function index(): Response
    {
        return new Response($this->twig->render('pages/index.html.twig', []));
    }

    /**
     * @Route("about", name="about")
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function about(): Response
    {
        return new Response($this->twig->render('pages/about.html.twig', []));
    }

	/**
	 * @Route("data", name="data")
	 * @return Response
	 * @throws LoaderError
	 * @throws RuntimeError
	 * @throws SyntaxError
	 */
	public function data(): Response
	{
		return new Response($this->twig->render('pages/data.html.twig', []));
	}

	/**
	 * @Route("tacsonametrosheskiy-sostav", name="data-tacs")
	 * @return Response
	 * @throws LoaderError
	 * @throws RuntimeError
	 * @throws SyntaxError
	 */
	public function dataTacs(): Response
	{
		return new Response($this->twig->render('pages/data-1.html.twig', []));
	}

	/**
	 * @Route("contact", name="contact")
	 * @return Response
	 * @throws LoaderError
	 * @throws RuntimeError
	 * @throws SyntaxError
	 */
	public function contact(): Response
	{
		return new Response($this->twig->render('pages/contacts.html.twig', []));
	}

    /**
     * @Route("/map", name="map")
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function map(): Response
    {
        return new Response($this->twig->render('pages/index.html.twig', []));
    }
}