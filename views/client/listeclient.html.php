
    <?php require_once("./views/composants/navbar.html.php"); ?>
    <div class="grid grid-cols-1 gap-4 text-gray-700 bg-white rounded-md w-[70%] p-2  mx-auto mt-12">
        <div class="bg-slate-200 font-semibold rounded-md p-2 flex items-center">Liste des clients</div>
        <form method="GET" action="" class="p-2 flex gap-2 ">
            <div class="grid grid-cols-[85%_auto] gap-2 h-8  w-[60%] ">
                <input type="text" name="search_tel" class="rounded-md border-2 border-slate-100  " placeholder="Entrez le numero de telephone">
                <button type="submit" name="searchbtn" class="rounded-md bg-blue-400 p-2 text-white">OK</button>
            </div>
        </form>
        <a class="place-self-end" href="<?= PAGE ?>page=formclient">
            <button type="submit" name="searchbtn" class="rounded-lg bg-blue-400 text-white p-2 ">Nouveau</button>
        </a>
        <div class="flex-grow  bg-white rouded-md  ">
            <?php if ($clients != null): ?>
                <table class=' table-auto w-full  border border-none rounded-full'>
                    <thead class="text-center text-gray-700 font-bold border-b-2 bg-slate-200">
                        <tr>
                            <th class="rounded-l-md">Nom</th>
                            <th>Prénom</th>
                            <th>Téléphone</th>
                            <th class="rounded-r-md">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clients as $value): ?>
                            <tr class="text-center text-gray-700 p-2 border-b-1 odd:bg-white even:bg-gray-50 hover:bg-slate-100 cursor-pointer">
                                <td class="p-2"><?= $value['nom'] ?></td>
                                <td class="p-2"><?= $value['prenom'] ?></td>
                                <td class="p-2"><?= $value['tel'] ?></td>
                                <td class="p-2">
                                    <a
                                    class="bg-blue-400  text-white font-medium px-2 py-1 rounded-md place-self-center"
                                     href="<?= PAGE ?>controller=controllerDetailsCommande&page=DetailsCommande&client=<?= $value['id'] ?>">
                                       Commander
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
        </div>
    <?php else: echo "Aucun client trouvé";
            endif ?>

    </div>
    <?php require_once("./views/composants/footer.html.php"); ?>

