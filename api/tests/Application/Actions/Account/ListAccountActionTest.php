<?php

declare(strict_types=1);

namespace Tests\Application\Actions\Account;

use App\Application\Actions\ActionError;
use App\Application\Actions\ActionPayload;
use App\Domain\Account\Account;

class ListAcountActionTest extends AccountActionTestCase
{
    public function testAction()
    {
        $account= [
            new Account(self::ACCOUNT_DAYJOB),
            new Account(self::ACCOUNT_PERSONAL)
        ];

        $this
            ->accountServiceProphecy
            ->collectAccounts()
            ->willReturn($this->accountCollection())
            ->shouldBeCalledOnce();

        $request = $this->createRequest('GET', '/account');
        $response = $this->app->handle($request);

        $payload = (string)$response->getBody();

        $expectedPayload = new ActionPayload(
            200,
            $this->resourceArray($this->accountCollection())
        );
        $serializedPayload = json_encode($expectedPayload, JSON_PRETTY_PRINT);

        $this->assertEquals($serializedPayload, $payload);
    }
}