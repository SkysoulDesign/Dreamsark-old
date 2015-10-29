<?php

namespace DreamsArk\Commands\Project\Idea;

use Carbon\Carbon;
use DreamsArk\Commands\Command;
use DreamsArk\Commands\Project\ChargeUserCommand;
use DreamsArk\Commands\Project\Vote\CreateVotingCommand;
use DreamsArk\Events\Project\IdeaWasCreated;
use DreamsArk\Models\Project\Idea\Idea;
use DreamsArk\Repositories\Project\Idea\IdeaRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Foundation\Bus\DispatchesJobs;

class CreateIdeaCommand extends Command implements SelfHandling
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
        $this->fields = collect($fields);
    }

    /**
     * Execute the command.
     *
     * @param IdeaRepositoryInterface $repository
     * @param Dispatcher $event
     * @return Idea
     */
    public function handle(IdeaRepositoryInterface $repository, Dispatcher $event)
    {
        /**
         * Create Idea
         */
        $idea = $repository->create($this->project_id, $this->fields->all());

        /**
         * Announce IdeaWasCreated
         */
        $event->fire(new IdeaWasCreated($idea));

    }
}
