<?php require_once("./views/composants/navbar.html.php"); ?>
<div class="grid grid-cols-1 gap-4 text-gray-700 bg-white rounded-md w-[70%] p-2  mx-auto mt-12">
    <div class="bg-slate-200 font-semibold rounded-md p-2 flex items-center grid grid-cols-3 gap-6
        shadow-[3px_3px_5px_rgba(0,0,0,0.2),-6px_-6px_5px_rgba(255,255,255,0.8)]">
        <?php $cli = findClientById(); ?>
        <?php if (!empty($cli)): ?>
            <p>Nom: <?= $cli['nom'] ?></p>
            <p>Prénom: <?= $cli['prenom'] ?></p>
            <p>Téléphone: <?= $cli['tel'] ?></p>
        <?php endif ?>
    </div>
    <div class="flex justify-between gap-4">
        <?php if (isset($_GET['commande'])):
            if (count($cmd) > 0): ?>
                <?php foreach ($cmd as $val): ?>
                    <div class="  flex flex-col gap-2 bg-white font-semibold rounded-md p-2 flex items-start shadow-md">
                        <p>Reff: <?= $val['numero_commande'] ?></p>
                        <p>Date: <?= $val['date'] ?></p>
                        <p>Montant: <span class="text-green-500"><?= montantTotalCommande($produits, $val["details"]) ?> </span> </p>
                    </div>
                    <div class="flex-grow  bg-white rounded-md shadow-m">
                        <table class=' table-auto w-full  border border-none '>
                            <thead class="text-center text-gray-700 font-bold border-b-2 bg-slate-200">
                                <tr>
                                    <th class="rounded-l-md">Produits</th>
                                    <th>Quantite</th>
                                    <th>Prix</th>
                                    <th class="rounded-r-md">Montant</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($prod) > 0): ?>
                                    <?php foreach ($prod as $valu): ?>
                                        <tr class="text-center text-gray-700 p-2 border-b-1 odd:bg-white even:bg-gray-50 hover:bg-slate-100 cursor-pointer">
                                            <td class="p-2"><?= $valu['nom_produit'] ?></td>
                                            <td class="p-2"><?= $valu['quantite'] ?></td>
                                            <td class="p-2"><?= $valu['prix'] ?></td>
                                            <td class="p-2"><?= $valu['prix'] * $valu['quantite'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                    </div>

                    <div class="  flex flex-col gap-6 bg-white font-semibold  rounded-md p-2 flex items-start shadow-md">
                        <p>Montant du: <?= montantTotalCommande($produits, $val["details"]) - $val['montant_paye'] ?>F CFA </p>
                        <p>Montant payé: <span class="text-green-500"><?= $val['montant_paye'] ?> </span> </p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="flex justify-between">
        <a class="" href="<?= PAGE ?>controller=controllerClient&page=listeclient">
            <button type="submit" name="searchbtn" class="rounded-lg bg-red-400 text-white p-2 ">Retour</button>
        </a>
        <a class="" href="<?= PAGE ?>page=formclient">
            <button type="submit" name="searchbtn" class="rounded-lg bg-blue-400 text-white p-2 ">Nouveau</button>
        </a>
    </div>
    <div class="flex-grow  bg-white rounded-md shadow-[2px_2px_2px_2px_rgba(0,0,0,0.3)] ">
        <table class=' table-auto w-full  border border-none '>
            <thead class="text-center text-gray-700 font-bold border-b-2 bg-slate-200">
                <tr>
                    <th class="rounded-l-md">Date</th>
                    <th>Montant</th>
                    <th>Status</th>
                    <th class="rounded-r-md">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($commande) > 0): ?>
                    <?php foreach ($commande as $value): ?>

                        <tr class="text-center text-gray-700 p-2 border-b-1 odd:bg-white even:bg-gray-50 hover:bg-slate-100 cursor-pointer">
                            <td class="p-2"><?= $value['date'] ?></td>
                            <td class="p-2"><?= montantTotalCommande($produits, $value["details"]) ?> F CFA</td>

                            <td class="p-2"><?= $value['statut'] ?></td>
                            <td class="p-2">
                                <a
                                    class=" text-blue-400 font-medium p-2   place-self-center"
                                    href="<?= PAGE ?>controller=controllerDetailsCommande&page=DetailsCommande&client=<?= $value['id_client'] ?>&commande=<?= $value['id'] ?>">
                                    Détails
                            </td>
                        </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php else: ?>
    <p>Aucune commande pour ce client</p>
<?php endif; ?>

<?php require_once("./views/composants/footer.html.php"); ?>