<?php require_once("./views/composants/navbar.html.php");
?>
<div class="grid grid-cols-1 gap-8 text-gray-700 bg-white rounded-md w-[70%] p-2  mx-auto mt-12">
    <div class="shadow w-[50%] border border-gray-400 rounded-md  gap-8 p-2 place-self-start">
        <form action="" method="get" class="w-full ">
            <input type="text" name="search_numero" class="rounded-md border-2 border-slate-100 w-[50%] h-8" placeholder="Entrez le numero de téléphone">
            <input type="hidden" name="controller" value="controllerCommande">
            <input type="hidden" name="page" value="formCommande">
            <button type="submit" name="searchbtn1" class="rounded-md bg-blue-400 p-1 text-white">OK</button>
        </form>
        <?php if (isset($_GET["searchbtn1"])): ?>
            <?php if (isset($_SESSION['client'])): ?>
                <form action="" method="post">
                    <div class="flex justify-between gap-32 mt-2">
                        <div class="flex flex-nowrap gap-4">
                            <label for="ref">Nom:</label>
                            <input type="text" value="<?= $_SESSION['client'][0]['nom'] ?>" name="nom" class="rounded-md border-2 border-gray-400 w-[50%] h-8" readonly>
                            <span></span>
                        </div>
                        <div class="flex flex-nowrap gap-4">
                            <label for="ref">Préom:</label>
                            <input type="text" value="<?= $_SESSION['client'][0]['prenom'] ?>" name="prenom" class="rounded-md border-2 border-gray-400 w-[50%] h-8" readonly>
                            <span></span>
                        </div>
                    </div>
                <?php else: ?>
                    <p>Aucun client trouvé avec ce numero</p>
                <?php endif ?>
            <?php endif ?>
                </form>

    </div>
    <div class="place-self-end w-[50%] flex justify-between">
        <form action="" method="post">
            <input type="hidden" name="controller" value="controllerCommande">
            <input type="hidden" name="page" value="formCommande">
            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-nowrap gap-4">
                    <label for="ref">Ref</label>
                    <input type="text" value="" name="ref" class="rounded-md border-2 border-gray-400 w-[50%] h-8">
                    <div></div>
                </div>
                <div class="flex flex-nowrap gap-4 place-self-end">
                    <label class="inline-flex items-center cursor-pointer">statut
                        <input type="checkbox" value="" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
                    </label>
                </div>
            </div>
        </form>
    </div>
    <!-- formliste -->
    <div class=" border-2 border-gray-400 grid grid-cols-1 gap-8 p-4 rounded-md">
        <form action="" method="post">
            <input type="hidden" name="controller" value="controllerCommande">
            <input type="hidden" name="page" value="formCommande">
            <div class="grid grid-cols-4 gap-4">
                <div class="flex fle x-wrap gap-4">
                    <label for="ref">Article:</label>
                    <input type="text" value="" name="article" class="rounded-md border-2 border-gray-400 w-[50%] h-8">
                    <div class="text-red-400"><?= $errors["article"] ?? "" ?></div>
                </div>
                <div class="flex flex-wrap gap-4">
                    <label for="ref">Prix:</label>
                    <input type="text" value="" name="prix" class="rounded-md border-2 border-gray-400 w-[50%] h-8">
                    <div></div>
                </div>
                <div class="flex flex-wrap gap-4">
                    <label for="ref">Quantitée:</label>
                    <input type="text" value="" name="quantite" class="rounded-md border-2 border-gray-400 w-[50%] h-8">
                    <div></div>
                </div>
                <button type="submit" name="btnAdd" class="rounded-md bg-blue-400 p-1 text-white">Ajouter</button>
            </div>
        </form>
        <div class="flex-grow">
            <table class="table-auto border-2 border-gray-400 rounded-lg w-full">
                <thead>
                    <tr class="text-center bg-gray-200">
                        <th>Articles</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Montant</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($_SESSION['commandes']) > 0): ?>
                        <?php foreach ($_SESSION['commandes'] as $index => $commande): ?>
                            <tr class="text-center border-b-2 border-slate-200 p-2">
                                <td><?= htmlspecialchars($commande['article']) ?></td>
                                <td><?= htmlspecialchars($commande['prix']) ?></td>
                                <td><?= htmlspecialchars($commande['quantite']) ?></td>
                                <td><?= htmlspecialchars($commande['quantite']) * htmlspecialchars($commande['prix']) ?></td>
                                <td class="   gap-4">
                                    <a href="?controller=controllerCommande&page=formCommande&edit=<?= $index ?>" class="text-blue-500"><i class="ri-edit-circle-line"></i></a>
                                    <a href="?controller=controllerCommande&page=formCommande&index=<?= $index ?>" class="text-red-500"><i class="ri-delete-bin-6-line"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Aucune commande n'a été faite.</p>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
        <div class="flex justify-between">
            <button type="submit" name="btnCmd" class="rounded-md bg-blue-400 p-1 text-white">Commander</button>
            <div>Total: <span class="text-red-400"><?= totalAmount() ?> F CFA</span></div>
        </div>
    </div>


</div>