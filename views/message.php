<!-- si un message existe, on l'affiche -->
<?php if (!empty($message)): ?>
    <div class="notif notif-<?= $message->getColor() ?>" role="alert">
        <h2><?= $message->getTitle() ?></h2>
        <p><?= $message->getMessage() ?></p>
    </div>
<?php endif ?>