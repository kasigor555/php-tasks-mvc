<?php $this->layout('layout', ['title' => 'Простой таск-менеджер']) ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1><?= $this->e($h1) ?></h1>
      <p>Hello, <?= $this->e($name) ?></p>
      <a href="tasks/create" class="btn btn-success">Add Task</a>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($tasks as $task) : ?>
            <tr>
              <td><?= $task['id']; ?></td>
              <td><?= $task['title']; ?></td>
              <td>
                <a href="/tasks/<?= $task['id']; ?>" class="btn btn-info">
                  Show
                </a>
                <a href="edit.php?id=<?= $task['id']; ?>" class="btn btn-warning">
                  Edit
                </a>
                <a onclick="return confirm('Вы уверены, что хотите удалить задачу?');" href="delete.php?id=<?= $task['id']; ?>" class="btn btn-danger">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>
</div>