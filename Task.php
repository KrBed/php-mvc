<?php


class Task
{
    private $id;
    protected $description;
    protected $completed = false;

    public static function buildFromPDO($id,$description,$completed){
        $task = new self($description);
        $task->id = $id;
        $task->description = $description;
        $task->completed = $completed;
        return $task;
    }

    public function __construct($description)
    {
        $this->description = $description;
    }
    public function setDescription($description){
        $this->description = $description;
    }

    public function isCompleted()
    {
        return $this->completed;
    }

    public function complete()
    {
        $this->completed = true;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
