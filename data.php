<?php
$data = array (
  'clients' => 
  array (
    0 => 
    array (
      'id' => 1,
      'nom' => 'Fall',
      'prenom' => 'Abdou',
      'tel' => 775205028,
    ),
    1 => 
    array (
      'id' => 2,
      'nom' => 'Sow',
      'prenom' => 'Mamadou',
      'tel' => 785236985,
    ),
    2 => 
    array (
      'id' => 3,
      'nom' => 'Diop',
      'prenom' => 'Aissatou',
      'tel' => 752147896,
    ),
    3 => 
    array (
      'id' => 4,
      'nom' => 'Gueye',
      'prenom' => 'Ibrahime',
      'tel' => 701236985,
    ),
  ),
  'produits' => 
  array (
    0 => 
    array (
      'id' => 1,
      'nom_produit' => 'iphone14',
      'ref' => 'A-100G-BL',
      'prix' => '45000',
    ),
    1 => 
    array (
      'id' => 2,
      'nom_produit' => 'iphone15',
      'ref' => 'A-128G-RG',
      'prix' => '55000',
    ),
    2 => 
    array (
      'id' => 3,
      'nom_produit' => 'iphone16',
      'ref' => 'A-256G-GR',
      'prix' => '65000',
    ),
    3 => 
    array (
      'id' => 4,
      'nom_produit' => 'sucre',
      'ref' => 'abhg6',
      'prix' => '500',
    ),
    4 => 
    array (
      'id' => 5,
      'nom_produit' => 'riz',
      'ref' => 'abhg6',
      'prix' => '300',
    ),
    5 => 
    array (
      'id' => 6,
      'nom_produit' => 'huile',
      'ref' => 'abhg6',
      'prix' => '300',
    ),
    6 => 
    array (
      'id' => 7,
      'nom_produit' => 'pain',
      'ref' => 'abhg6',
      'prix' => '150',
    ),
  ),
  'commandes' => 
  array (
    0 => 
    array (
      'id' => 1,
      'date' => '27-02-2023',
      'numero_commande' => '325AB6',
      'statut' => 'payé',
      'montant_paye' => 210000,
      'id_client' => 2,
      'details' => 
      array (
        0 => 
        array (
          'id_produit' => 1,
          'quantite' => 2,
        ),
        1 => 
        array (
          'id_produit' => 2,
          'quantite' => 1,
        ),
        2 => 
        array (
          'id_produit' => 3,
          'quantite' => 1,
        ),
      ),
    ),
    1 => 
    array (
      'id' => 2,
      'date' => '20-07-2023',
      'numero_commande' => '455AB6',
      'statut' => 'impayé',
      'montant_paye' => 21000,
      'id_client' => 1,
      'details' => 
      array (
        0 => 
        array (
          'id_produit' => 1,
          'quantite' => 2,
        ),
        1 => 
        array (
          'id_produit' => 3,
          'quantite' => 3,
        ),
      ),
    ),
    2 => 
    array (
      'id' => 3,
      'date' => '17-09-2024',
      'numero_commande' => '892AB6',
      'statut' => 'payé',
      'montant_paye' => 260000,
      'id_client' => 1,
      'details' => 
      array (
        0 => 
        array (
          'id_produit' => 3,
          'quantite' => 4,
        ),
      ),
    ),
    3 => 
    array (
      'id' => 4,
      'date' => '06-02-2025',
      'numero_commande' => 'rtgf8',
      'statut' => 'impaye',
      'montant_paye' => 0,
      'id_client' => 2,
      'details' => 
      array (
        0 => 
        array (
          'id_produit' => 4,
          'quantite' => '2',
        ),
        1 => 
        array (
          'id_produit' => 5,
          'quantite' => '1',
        ),
        2 => 
        array (
          'id_produit' => 1,
          'quantite' => '4',
        ),
      ),
    ),
    4 => 
    array (
      'id' => 5,
      'date' => '10-02-2025',
      'numero_commande' => 'rtgf9',
      'statut' => 'impaye',
      'montant_paye' => 0,
      'id_client' => 3,
      'details' => 
      array (
        0 => 
        array (
          'id_produit' => 6,
          'quantite' => '2',
        ),
      ),
    ),
    5 => 
    array (
      'id' => 6,
      'date' => '10-02-2025',
      'numero_commande' => 'RTGF7',
      'statut' => 'impaye',
      'montant_paye' => 0,
      'id_client' => 3,
      'details' => 
      array (
        0 => 
        array (
          'id_produit' => 7,
          'quantite' => '3',
        ),
      ),
    ),
    6 => 
    array (
      'id' => 7,
      'date' => '10-02-2025',
      'numero_commande' => 'RTGF6',
      'statut' => 'impaye',
      'montant_paye' => 0,
      'id_client' => 2,
      'details' => 
      array (
        0 => 
        array (
          'id_produit' => 7,
          'quantite' => '5',
        ),
      ),
    ),
  ),
);
?>