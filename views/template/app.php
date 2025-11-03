<!DOCTYPE html>
<html lang="en" data-theme="dracula">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LockBox</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="mx-auto max-w-screen-lg h-screen flex flex-col">
        <?php require base_path('views/partials/_navbar.view.php') ?>

        <?php require base_path('views/partials/_pesquisar.view.php') ?>
        
        <div class="flex flex-grow py-6">
            <?php require "../views/{$view}.view.php"; ?>
        </div>
    </div>
</body>
</html>