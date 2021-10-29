<?php

/**
 * This file is part of totoloto
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * HomePage
 *
 * @package App\Controller
 */
final class HomePage extends AbstractController
{

    /**
     * home
     */
    #[Route("/")]
    public function home(): Response
    {
        return $this->render('home.html.twig');
    }
}