<?php

namespace App\Controller;

use App\Services\GetUser;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * @Security("is_granted('ROLE_ADMIN')")
 **/
class MainController extends AbstractController
{
    /**
     * @Security("is_granted('ROLE_ADMIN')")
     * @Route("/main", name="app_main")
     */
    public function index( GetUser $getUser, AuthorizationCheckerInterface $checker): Response
    {
        if (true === $checker->isGranted('ROLE_ADMIN')){
            $user = $this->getUser();
            dump($user->getUserIdentifier());
        }

        $getUser->getUser();

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
