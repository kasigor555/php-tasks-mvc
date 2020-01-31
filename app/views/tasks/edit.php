<?php $this->layout('layout', ['title' => 'Простой таск-менеджер - Отображение задачи']) ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3><?= $this->e($h1) ?></h3>
      <p><?= $this->e($name) ?></p>
      <form action="/tasks/<?= $task['id']; ?>/update" method="post">

        <div class="form-group">
          <input type="text" name="title" class="form-control" value="<?= $task['title']; ?>">
        </div>

        <div class="form-group">
          <textarea name="description" class="form-control"><?= $task['description']; ?></textarea>
        </div>

        <div class="form-group">
          <button class="btn btn-warning" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>