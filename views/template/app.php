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
        <div class="navbar bg-base-100 shadow-sm">
            <div class="flex-1">
                <a class="btn btn-ghost text-xl">LockBox</a>
            </div>
            <div class="flex-none">
                <ul class="menu menu-horizontal px-1">
                    <li><a href="/mostrar">👁️</a></li>
                    <li>
                        <details>
                            <summary><?= auth()->nome ?></summary>
                            <ul class="bg-base-100 rounded-t-none p-2">
                                <li><a href="/logout">Logout</a></li>
                            </ul>
                        </details>
                    </li>
                </ul>
            </div>
        </div>

        <div class="flex space-x-4">
            <form class="w-full">
                <label class="input input-bordered flex items-center gap-2 w-full">
                    <input type="text" class="grow" name="pesquisar" placeholder="Pesquisar notas no LockBox..." />
                    <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g
                            stroke-linejoin="round"
                            stroke-linecap="round"
                            stroke-width="2.5"
                            fill="none"
                            stroke="currentColor">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </g>
                    </svg>
                </label>
            </form>

            <a href="/notas/criar" class="btn btn-primary">+ item</a>
        </div>

        <div class="flex flex-grow py-6">
            <?php require "../views/{$view}.view.php"; ?>
        </div>
    </div>
</body>
</html>