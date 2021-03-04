<?php


namespace App\Actions;


use Lorisleiva\Actions\Concerns\AsCommand;
use Lorisleiva\Actions\Concerns\AsController;
use Lorisleiva\Actions\Concerns\AsFake;
use Lorisleiva\Actions\Concerns\AsJob;
use Lorisleiva\Actions\Concerns\AsListener;
use Lorisleiva\Actions\Concerns\AsObject;
use Lorisleiva\Actions\Decorators\JobDecorator;

abstract class BaseAction
{
    use AsObject;
    use AsListener;
    use AsJob;
    use AsCommand;
    use AsFake;
    use AsController;

    /**
     * @param JobDecorator $job
     */
    public function configureJob(JobDecorator $job): void
    {
        $job->onQueue('default');
    }

}
