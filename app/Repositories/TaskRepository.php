<?php
namespace App\Repositories;

use App\Entities\Task;

/**
 * @property int $id
 * @property string $content
 * @property date $end_time
 */
class TaskRepository implements TaskRepositoryInterface
{
    /** @var Task */
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function createTask(string $content, DatetimeInterface $end_date = null): int
    {
        $this->task->content = $content;

        if ($end_date !== null) {
            $this->task->end_date = null;
        }

        $this->task->save();
        return $this->task->id;
    }
}
