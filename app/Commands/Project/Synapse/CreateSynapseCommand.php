<?php

namespace DreamsArk\Commands\Project\Synapse;

use DreamsArk\Commands\Command;
use DreamsArk\Commands\Project\ChargeUserCommand;
use DreamsArk\Events\Project\Synapse\SynapseWasCreated;
use DreamsArk\Models\Project\Synapse\Synapse;
use DreamsArk\Repositories\Project\Synapse\SynapseRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Foundation\Bus\DispatchesJobs;

class CreateSynapseCommand extends Command implements SelfHandling
{
    use DispatchesJobs;

    /**
     * @var int
     */
    private $project_id;

    /**
     * @var array
     */
    private $fields;

    /**
     * Create a new command instance.
     *
     * @param int $project_id
     * @param array $fields
     */
    public function __construct($project_id, array $fields)
    {
        $this->project_id = $project_id;
        $this->fields = $fields;
    }

    /**
     * Execute the command.
     *
     * @param SynapseRepositoryInterface $repository
     * @param Dispatcher $event
     * @return Synapse
     */
    public function handle(SynapseRepositoryInterface $repository, Dispatcher $event)
    {
        /**
         * Create Idea
         */
        $synapse = $repository->create($this->project_id, $this->fields);

        /**
         * Deduct Coins from the user
         */
        $command = new ChargeUserCommand($synapse->project->user, $this->fields['reward']);
        $this->dispatch($command);

        /**
         * Announce IdeaWasCreated
         */
        $event->fire(new SynapseWasCreated($synapse));

    }
}
