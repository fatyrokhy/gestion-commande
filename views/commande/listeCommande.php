
<?php require_once("./views/composants/navbar.html.php"); ?>
    <div class="grid grid-cols-1 gap-4 text-gray-700 bg-white rounded-md w-[70%] p-2  mx-auto mt-12">
        <div class="bg-slate-200 font-semibold rounded-md p-2 flex items-center">Liste des Commandes</div>
        <form method="GET" action="" class="p-2 flex gap-2 ">
            <div class="grid grid-cols-[85%_auto] gap-2 h-8  w-[60%] ">
                <input type="text" name="search_numero" class="rounded-md border-2 border-slate-100  " placeholder="Entrez le numero de téléphone">
                <input type="hidden" name="controller" value="controllerCommande">
                <input type="hidden" name="page" value="listeCommande">
                <button type="submit" name="searchbtn1" class="rounded-md bg-blue-400 p-2 text-white">OK</button>
            </div>
        </form>
        <a class="place-self-end" href="<?= PAGE ?>page=formclient">
            <button type="submit" name="searchbtn" class="rounded-lg bg-blue-400 text-white p-2 ">Nouveau</button>
        </a>
        <div class="flex-grow  bg-white rouded-md  ">
            <?php if ($commandes != null): ?>
                <table class=' table-auto w-full  border border-none rounded-full'>
                    <thead class="text-center text-gray-700 font-bold border-b-2 bg-slate-200">
                        <tr>
                            <th class="rounded-l-md">Numero Commande</th>
                            <th>Date</th>
                            <th>Client</th>
                            <th>Téléphone</th>
                            <th>Montant Payé</th>
                            <th>Statut</th>
                            <th class="rounded-r-md">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($commandes as $value): ?>
                            <tr class="text-center text-gray-700 p-2 border-b-1 odd:bg-white even:bg-gray-50 hover:bg-slate-100 cursor-pointer">
                                <td class="p-2"><?= $value['numero_commande'] ?></td>
                                <td class="p-2"><?= $value['date'] ?></td>
                                <?php foreach ($clients as $client):
                                    if ($value['id_client']==$client['id'] ):
                                      ?>
                                <td class="p-2"><?=$client['prenom']?> <?= $client['nom'] ?></td>
                                <td class="p-2"><?=$client['tel']?> </td>
                                <?php endif;
                                endforeach ?>
                                <td class="p-2"><?= $value['montant_paye'] ?></td>
                                <td class="p-2"><?= $value['statut'] ?></td>
                                <td class="p-2">
                                    <a
                                    class="text-blue-400   font-medium px-2 py-1 rounded-md place-self-center"
                                     href="<?= PAGE ?>controller=controllerDetailsCommande&page=DetailsCommande&client=<?= $value['id_client'] ?>">
                                       voir détails commande
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
        </div>
    <?php else: echo "Aucune commande trouvée";
            endif ?>

    </div>
    <?php require_once("./views/composants/footer.html.php"); ?>

