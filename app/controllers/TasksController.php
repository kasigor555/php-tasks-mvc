<?php

namespace App\controllers;

use League\Plates\Engine;
use App\services\Database;


class TasksController
{
  private $view;
  private $database;

  public function __construct(Engine $view, Database $database)
  {
    $this->view = $view;
    $this->database = $database;
  }

  public function index() // Отображение главной страницы со всеми задачами
  {
    $myTasks = $this->database->getAll('tasks');

    echo $this->view->render('tasks/index', [
      'name' => 'This is INDEX ACTION',
      'h1' => 'Это главная страница',
      'tasks' => $myTasks,
    ]);
  }

  public function create() // Создание новой задачи
  {
    echo $this->view->render('tasks/create', [
      'h1' => 'CREATE new task',
      'name' => 'Страница создания новой задачи.'
    ]);
  }

  public function save() // Сохранение задачи
  {
    $this->database->save('tasks', $_POST);

    header("Location: /");
  }

  public function show($id) // Отображение одной задачи, подробно
  {
    $myTask = $this->database->getOne('tasks', $id);

    echo $this->view->render('tasks/show', [
      'h1' => 'SHOW one task',
      'name' => 'Страница отображение одной задачи.',
      'task' => $myTask,
    ]);
  }

  public function edit($id)
  {
    $myTask = $this->database->getOne('tasks', $id);

    echo $this->view->render('tasks/edit', [
      'h1' => "EDIT task id: $id",
      'name' => 'Страница редактирования задачи.',
      'task' => $myTask,
    ]);
  }

  public function update($id) // Обновление задачи
  {
    $this->database->update('tasks', $id, $_POST);

    header("Location: /");
  }

  public function delete($id) // Удаление задачи
  {
    $this->database->delete('tasks', $id);

    header("Location: /");
  }
}
