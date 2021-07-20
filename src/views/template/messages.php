<?php

$errors = [];

if($exception){
    $message = [
        'type' => 'error',
        'message' => $exception->getMessage()
    ];

    if(get_class($exception) === 'validationException') {
        $errors = $exception->getErrors();
    }
}

$alertType = '';

if($message['type'] === 'error') {
    $alertType = 'danger';
} else {
    $alertType = 'sucsses';
}

?>

<?php if($message): ?>
    <div role="alert" class="my-3 alert alert-<?= $alertType ?>"> 
        <?= $message['message'] ?>
    </div>
<?php endif ?>