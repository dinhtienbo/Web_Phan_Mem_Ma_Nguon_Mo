<?php if (session('errosMsg')) : ?>
    <?php foreach ((session('errosMsg')) as $error) : ?>
        <div class="nNote nInformation hideit">
            <p><strong>Thông báo: </strong><?= $error ?></p>
        </div>
        <?php break; ?>
    <?php endforeach ?>
<?php endif ?>

<!--Thành công -->
<?php if (session('successMsg')) : ?>
    <?php foreach ((session('successMsg')) as $success) : ?>
        <div class="nNote nInformation hideit">
            <p><strong>Thông báo: </strong><?= $success ?></p>
        </div>
        <?php break; ?>
    <?php endforeach ?>
<?php endif ?>