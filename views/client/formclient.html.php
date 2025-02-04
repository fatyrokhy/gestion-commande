<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form_Client</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.4.0/fonts/remixicon.css" rel="stylesheet" />
</head>
<body>
<div class="grid grid-cols-1 gap-4 p-8 bg-slate-50 w-full overflow-x-hidden ">
        <form method="POST" class="w-[70%] grid grid-cols-1 gap-1 p-6 ">
            <p class="text-2xl font-semibold text-center mt-4">Nouveau client</p>
            <div class="flex flex-nowrap gap-2">
                <label for="nom" class="block text-gray-700 m-2">Nom:</label>
                <input type="text" class="peer border border-gray-300 rounded-full p-2 h-8 w-full focus:outline-none focus:ring-2 <?= isset($errors['nom']) ? 'border-red-500 focus:ring-red-500' : 'focus:ring-purple-500' ?>"
                value="<?=$_POST['nom']??''?>"  name="nom" id="" aria-describedby="emailHelp">
                <div class="mt-1 text-red-500 text-sm  peer-invalid:block"><?= $errors['nom'] ?? '' ?></div>
            </div>
            <div class="flex flex-nowrap gap-2">
                <label for="prenom" class="block text-gray-700 m-2">Prénom:</label>
                <input type="text" class="peer border border-gray-300 rounded-full p-2  h-8 w-full focus:outline-none focus:ring-2 <?= isset($errors['prenom']) ? 'border-red-500 focus:ring-red-500' :' focus:ring-purple-500' ?>"
                value="<?=$_POST['prenom']??''?>"  name="prenom" id="" aria-describedby="emailHelp">
                <div class="mt-1 text-red-500 text-sm  peer-invalid:block"><?= $errors['prenom'] ?? '' ?></div>
            </div>
            <div class="flex flex-nowrap gap-2">
                <label for="age" class="block text-gray-700 m-2">Téléphone</label>
                <input type="text" class="peer border border-gray-300 rounded-full p-2   h-8 w-full focus:outline-none focus:ring-2 <?= isset($errors['age']) ? 'border-red-500 focus:ring-red-500' : 'focus:ring-purple-500' ?>"
                value="<?=$_POST['age']??''?>"   name="age" id="" aria-describedby="emailHelp">
                <div class="mt-1 text-red-500 text-sm  peer-invalid:block"><?= $errors['age'] ?? '' ?></div>
            </div>
                <div class="flex flex-nowrap gap-2">
                    <label for="note1" class="block text-gray-700 m-2">Adresse:</label>
                    <input type="text" textarea class="peer border border-gray-300 rounded-full p-2  h-8 w-full focus:outline-none focus:ring-2 <?= isset($errors['note1']) ? 'border-red-500 focus:ring-red-500' : 'focus:ring-purple-500' ?>"
                     value="<?=$_POST['note1']??''?>"  name="note1" id="" aria-describedby="emailHelp">
                    <div class="mt-1 text-red-500 text-sm  peer-invalid:block"><?= $errors['note1'] ?? '' ?></div>
                </div>
                <div class="grid">
                <button type="submit" class="bg-slate-200  text-white font-semibold px-4 py-2 rounded-full place-self-center" name="add">Annuler</button>
                <button type="submit" class="bg-blue-400  text-white font-semibold px-4 py-2 rounded-full place-self-center" name="add">Enregistrer</button>
                </div>
        </form>
    </div>

</body>
</html>