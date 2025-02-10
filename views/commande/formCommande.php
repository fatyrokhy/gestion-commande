<?php require_once("./views/composants/navbar.html.php");

?>
<div class="grid grid-cols-1 gap-8 text-gray-700 bg-white rounded-md w-[70%] p-2  mx-auto mt-12">
    <div class="shadow w-[50%] border border-gray-400 rounded-md  gap-8 p-2 place-self-start">
        <form action="" method="get" class="w-full ">
            <input type="text" name="search_numero" value="<?= $_SESSION['client'][0]['tel']??''?>" class="rounded-md border-2 border-slate-100 w-[50%] h-8" placeholder="Entrez le numero de téléphone">
            <input type="hidden" name="controller" value="controllerCommande">
            <input type="hidden" name="page" value="formCommande">
            <button type="submit" name="searchbtn1" class="rounded-md bg-blue-400 p-1 text-white">OK</button>
        </form>
        <form action="" method="post">
                    <?php if (isset($_SESSION['client']) && count($_SESSION['client'])>0): ?>
                    <div class="flex justify-between gap-32 mt-2">
                        <div class="flex flex-nowrap gap-4">
                            <label for="ref">Nom:</label>
                            <input type="text" value="<?= $_SESSION['client'][0]['nom'] ?>" name="nom" class="rounded-md border-2 border-gray-400 w-[50%] h-8" readonly>
                            <span><?= $errors["nom"] ?? '' ?></span>
                        </div>
                        <div class="flex flex-nowrap gap-4">
                            <label for="ref">Préom:</label>
                            <input type="text" value="<?= $_SESSION['client'][0]['prenom'] ?>" name="prenom" class="rounded-md border-2 border-gray-400 w-[50%] h-8" readonly>
                            <span></span>
                        </div>
                        <div class="text-red-400"><?= $errors["nomClient"] ?? '' ?></div>
                    </div>
                <?php  else: ?>
                    <p></p>
                <?php endif ?>
                </form>

    </div>
    <form action="" method="post">
        <div class="place-self-end w-[50%] flex justify-between">
            <input type="hidden" name="controller" value="controllerCommande">
            <input type="hidden" name="page" value="formCommande">
            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-nowrap gap-4">
                    <label for="ref">Ref</label>
                    <input type="text" value="" name="ref" class="rounded-md border-2 border-gray-400 w-[50%] h-8">
                    <div class="text-red-400"><?= $errors["ref"] ?? "" ?></div>
                    </div>
            </div>

        </div>
        <!-- formliste -->
        <div class=" border-2 border-gray-400 grid grid-cols-1 gap-8 p-4 rounded-md">
            <form action="" method="post">
                <input type="hidden" name="controller" value="controllerCommande">
                <input type="hidden" name="page" value="formCommande">
                <input type="hidden" name="id" value="<?= $_GET['edit'] ?? '' ?>">
                <div class="grid grid-cols-4 gap-4">
                    <div class="flex fle x-wrap gap-4">
                        <label for="ref">Article:</label>
                        <input type="text" value="<?= $edit['article'] ?? '' ?>" name="article" class="rounded-md border-2 border-gray-400 w-[50%] h-8">
                        <div class="text-red-400"><?= $errors["article"] ?? "" ?></div>
                    </div>
                    <div class="flex flex-wrap gap-4">
                        <label for="ref">Prix:</label>
                        <input type="text" value="<?= $edit['prix'] ?? '' ?>" name="prix" class="rounded-md border-2 border-gray-400 w-[50%] h-8">
                        <div class="text-red-400"><?= $errors["prix"] ?? "" ?></div>
                    </div>
                    <div class="flex flex-wrap gap-4">
                        <label for="ref">Quantitée:</label>
                        <input type="text" value="<?= $edit['quantite'] ?? '' ?>" name="quantite" class="rounded-md border-2 border-gray-400 w-[50%] h-8">
                        <div class="text-red-400"><?= $errors["quantite"] ?? "" ?></div>
                    </div>
                    <button type="submit" name="btnAdd" class="rounded-md bg-blue-400 p-1 text-white">Ajouter</button>
                </div>
            </form>
            <div class="text-red-400"><?=$errors['msge']??''?></div>
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
                        <?php if (count($_SESSION['commandes'])): ?>
                            <?php foreach ($_SESSION['commandes'] as $index => $commande):
                                 ?>
                                <tr class="text-center border-b-2 border-slate-200 p-2">
                                    <td><?= htmlspecialchars($commande['article']) ?></td>
                                    <td><?= htmlspecialchars($commande['prix']) ?></td>
                                    <td><?= htmlspecialchars($commande['quantite']) ?></td>
                                    <td><?= htmlspecialchars($commande['quantite']) * htmlspecialchars($commande['prix']) ?></td>
                                    <td class="   gap-4">
                                        <a href="?controller=controllerCommande&page=formCommande&edit=<?= $index ?>&search_numero=<?= $_SESSION['client'][0]['tel']?>" class="text-blue-500"><i class="ri-edit-circle-line"></i></a>
                                        <a href="?controller=controllerCommande&page=formCommande&index=<?= $index ?>&search_numero=<?= $_SESSION['client'][0]['tel']?>" class="text-red-500"><i class="ri-delete-bin-6-line"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Aucune commande n'a été faite.</p>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
            <span class="text-red-400"><?=$errors["msge1"]??''?></span>
            <div class="flex justify-between">
                <button type="submit" name="btnCmd" class="rounded-md bg-blue-400 p-1 text-white" >Commander</button>
                <div>Total: <span class="text-red-400"><?= totalAmount() ?> F CFA</span></div>
            </div>
        </div>
    </form>

</div>