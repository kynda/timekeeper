<?php

declare(strict_types=1);

namespace Tests\Application\Actions\Task;

use App\Application\Actions\ActionError;
use App\Application\Actions\ActionPayload;
use App\Domain\Task\Task;

class ListTaskActionTest extends TaskActionTestCase
{
    public function testAction()
    {
        $task= [
            new Task(self::TASK_SHOPPING),
            new Task(self::TASK_CHORES)
        ];

        $this
            ->taskServiceProphecy
            ->collectTasks()
            ->willReturn($this->taskCollection())
            ->shouldBeCalledOnce();

        $request = $this->createRequest('GET', '/task');
        $response = $this->app->handle($request);

        $payload = (string)$response->getBody();

        $expectedPayload = new ActionPayload(
            200,
            $this->resourceArray($this->taskCollection())
        );
        $serializedPayload = json_encode($expectedPayload, JSON_PRETTY_PRINT);

        $this->assertEquals($serializedPayload, $payload);
    }
}