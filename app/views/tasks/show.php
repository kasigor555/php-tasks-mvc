<?php $this->layout('layout', ['title' => 'Простой таск-менеджер - Отображение задачи']) ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1><?= $this->e($h1) ?></h1>
      <p><?= $this->e($name) ?></p>
      <h2><?= $task['title']; ?></h2>
      <p>
        <?= $task['description']; ?>
      </p>
      <a href="/">Go Back</a>
    </div>
  </div>
</div>