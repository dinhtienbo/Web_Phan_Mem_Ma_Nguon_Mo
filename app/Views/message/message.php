<?php if (session('errosMsg')) : ?>
    <?php foreach ((session('errosMsg')) as $error) : ?>
        <div class="alert alert-danger">
            <strong>Thông báo:</strong> <?= $error ?>
        </div>
        <?php break; ?>
    <?php endforeach ?>
<?php endif ?>

<!--Thành công -->
<?php if (session('successMsg')) : ?>
    <?php foreach ((session('successMsg')) as $success) : ?>
        <div class="alert alert-success">
            <strong>Thông báo:</strong> <?= $success ?>
        </div>
        <?php break; ?>
    <?php endforeach ?>
<?php endif ?>