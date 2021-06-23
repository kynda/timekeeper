<?php

declare(strict_types=1);

namespace App\Application\Actions\Time;

use Psr\Http\Message\ResponseInterface as Response;

class ListTimeAccountAction extends TimeAction
{
    /**
     * {@inheritdoc}
     */
    public function action(): Response
    {
        return $this->respondWithResource(
            $this->timeService->collectTimeAccounts()
        );
    }
}
