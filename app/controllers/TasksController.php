<?php
namespace App\controllers;

class TasksController
{
  public function index() // Отображение главной страницы со всеми задачами
  {
    echo "This is INDEX ACTION";
  }

  public function create() // Создание новой задачи
  {
    echo "CREATE new task";
  }

  public function save()
  {
    echo "SAVE task";

    header("Location: /");
  }

  public function show($id) // Отображение одной задачи, подробно
  {
    echo "This is SHOW ACTION with id: $id";
  }

  public function edit($id)
  {
    echo "EDIT task id: $id";
  }

  public function update($id) // Обновление задачи
  {
    echo "This is UPDATE ACTION, id: $id";
  }

  public function delete($id) // Удаление задачи
  {
    echo "DELETE task id: $id";
  }
}