
<?php require ('views/partials/head.php') ?>

<h1>Submint your name</h1>
<form method="POST" action="/names">
    <input name="name">
    <input name="email">
    <p><button type="submit">Submit name</button></p>

</form>

<ul>
    <?php foreach ($tasks as $task): ?>
        <?php if ($task->isCompleted()) : ?>
            <li><s><?= $task->getDescription() ?><?php $task->isCompleted() ?></s></li>
        <?php else: ?>
            <li> <?= $task->getDescription() ?><?php $task->isCompleted() ?></li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

<?php require('views/partials/footer.php') ?>

