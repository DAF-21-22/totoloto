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
use App\Domain\EuroMilhoes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * EuromilhoesPage
 *
 * @package App\Controller
 */
final class EuromilhoesPage extends AbstractController
{

    public function __construct(
        private GenerateGameBetsHandler $handler
    ) {
    }

    #[Route("/euromilhoes", name: "euromilhoes")]
    public function handle(Request $request): Response
    {
        $bets = (int) $request->query->get('bets', 5);
        $game = $this->handler->handle(
            new GenerateGameBetsCommand(EuroMilhoes::class, $bets)
        );
        return $this->render('euromilhoes.html.twig',  compact('game',));
    }
}