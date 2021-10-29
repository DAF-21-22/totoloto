<?php

/**
 * This file is part of totoloto
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Application\GenerateGameBetsCommand;
use App\Application\GenerateGameBetsHandler;
use App\Domain\Totoloto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * TotolotoPage
 *
 * @package App\Controller
 */
final class TotolotoPage extends AbstractController
{

    #[Route("/totoloto")]
    public function handle(GenerateGameBetsHandler $handler): Response
    {
        $game = $handler->handle(new GenerateGameBetsCommand(Totoloto::class, 30));
        return $this->render('totoloto.html.twig', ['game' => $game]);
    }
}