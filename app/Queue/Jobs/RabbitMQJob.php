<?php

declare(strict_types=1);

namespace App\Queue\Jobs;

use VladimirYuldashev\LaravelQueueRabbitMQ\Queue\Jobs\RabbitMQJob as BaseJob;
use Override;

class RabbitMQJob extends BaseJob
{
    /**
     * Fire the job.
     *
     * @return void
     */
    #[Override]
    public function fire(): void
    {
        $payload = $this->payload();
        $job = $payload['job'];
        $class = $job;
        $method = 'handle';

        $instance = $this->resolve($class);
        if (is_object($instance) && method_exists($instance, $method)) {
            $instance->{$method}($this, $payload);
        }

        $this->delete();
    }
}
