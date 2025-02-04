<?php
$data = [
    "clients" =>  [
        [
            "id" => 1,
            "nom" => "Fall",
            "prenom" => "Abdou",
            "tel" => 775205028
        ],

        [
            "id" => 2,
            "nom" => "Sow",
            "prenom" => "Mamadou",
            "tel" => 785236985
        ],

        [
            "id" => 3,
            "nom" => "Diop",
            "prenom" => "Aissatou",
            "tel" => 752147896
        ],

        [
            "id" => 4,
            "nom" => "Gueye",
            "prenom" => "Ibrahime",
            "tel" => 701236985
        ]

    ],

    "produits" => [
        [
            "id" => 1,
            "nom_produit" => "iphone14",
            "ref" => "A-100G-BL",
            "prix" => "45000"
        ],

        [
            "id" => 2,
            "nom_produit" => "iphone15",
            "ref" => "A-128G-RG",
            "prix" => "55000"
        ],

        [
            "id" => 3,
            "nom_produit" => "iphone16",
            "ref" => "A-256G-GR",
            "prix" => "65000"
        ],

    ],

    "commandes" => [
        [
            "id" => 1,
            "date" => "27-02-2023",
            "numero_commande" => "325AB6",
            "statut" => "payé",
            "montant_paye" => 210000,
            "id_client" => 2,
            "details" => [
                [
                    "id_produit" => 1,
                    "quantite" => 2
                ],
                [
                    "id_produit" => 2,
                    "quantite" => 1
                ],
                [
                    "id_produit" => 3,
                    "quantite" => 1
                ],
            ]

        ],

        [
            "id" => 2,
            "date" => "20-07-2023",
            "numero_commande" => "455AB6",
            "statut" => "impayé",
            "montant_paye" => 21000,
            "id_client" => 1,
            "details" => [
                [
                    "id_produit" => 1,
                    "quantite" => 2
                ],
                [
                    "id_produit" => 3,
                    "quantite" => 3
                ]
            ]

        ],

        [
            "id" => 3,
            "date" => "17-09-2024",
            "numero_commande" => "892AB6",
            "statut" => "payé",
            "montant_paye" => 260000,
            "id_client" => 1,
            "details" => [
                [
                    "id_produit" => 3,
                    "quantite" => 4
                ],
            ]

        ]

    ]


];
