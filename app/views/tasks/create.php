<?php $this->layout('layout', ['title' => 'Простой таск-менеджер - Создание новой задачи']) ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1><?= $this->e($h1) ?></h1>
      <p><?= $this->e($name) ?></p>
      <form action="/tasks/store" method="post">
        <div class="form-group">
          <input type="text" class="form-control" name="title">
        </div>

        <div class="form-group">
          <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
          <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>