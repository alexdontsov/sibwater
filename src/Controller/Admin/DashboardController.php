<?php

namespace App\Controller\Admin;

use App\Entity\Region;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DashboardController
 * @package App\Controller\Admin
 */
class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('SibWater 2.0');
    }

    public function configureMenuItems(): iterable
    {
//        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        return [
            MenuItem::linktoDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Content'),
            MenuItem::linkToCrud('Conferences', 'fa fa-tags', Region::class)
                ->setQueryParameter('sortField', 'createdAt')
                ->setQueryParameter('sortDirection', 'DESC'),

            MenuItem::linkToCrud('Comments', 'fa fa-tags', User::class)
                ->setQueryParameter('sortField', 'createdAt')
                ->setQueryParameter('sortDirection', 'DESC'),
        ];
    }
}
