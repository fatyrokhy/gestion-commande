<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.4.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <nav>
        <div class="w-screen  bg-slate-300 text-gray-600 font-semibold items-center h-14 p-2 font-serif grid grid-cols-2 gap-4">
        <h1 class="text-2xl font-bold ">Gestion Client</h1>
        <ul class="flex justify-start gap-4 ">
                <li><a href="<?= PAGE ?>controller=controllerClient&page=listeclient">Client</a></li>
                <li><a href="<?= PAGE ?>controller=controllerCommande&page=listeCommande">Commande</a></li>
            </ul>
        </div>
    </nav>

