<?php
namespace App\Repositories;

interface TaskRepositoryInterface
{
    public function createTask(string $content, DatetimeInterface $end_date = null): int;
    public function deleteTask(int $id);
    public function updateTask(int $id, string $content, DateTimeInterface $end_date = null);
}
