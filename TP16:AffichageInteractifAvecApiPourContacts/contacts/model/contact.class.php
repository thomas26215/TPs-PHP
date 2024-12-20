<?php
require_once(__DIR__ . '/dao.class.php');

// Un contact 
class Contact implements JsonSerializable
{
    private int $id; // Identifiant unique. ATTENTION: à laisser gérer par la BD
    private string $nom; // Nom du contact
    private string $prenom; // Prénom du contact
    private int $mobile; // No de téléphone mobile

    // Constructeur
    public function __construct(string $prenom = '', string $nom = '', int $mobile = 0)
    {
        $this->id = -1; // Indique que cet objet n'est pas (encore) dans la BD
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->mobile = $mobile;
    }

    public function jsonSerialize(): mixed
    { 
        return get_object_vars($this);
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getMobile(): int
    {
        return $this->mobile;
    }

    // Acces à un Contact connaissant son nom, il peut y en avoir plusieurs, ou aucun
    public static function read(string $nom): array
    {
        $dao = DAO::get();
        $query = $dao->prepare('SELECT * FROM contact WHERE nom = :nom');
        
        try {
            $query->execute([':nom' => $nom]);
            // Récupère le résultat
            return self::fetchContacts($query);
        } catch (Exception $e) {
            // Gérer l'erreur si nécessaire
            return [];
        }
    }

    // Recherche des contacts sachant le début d'un nom ou d'un prénom 
    public static function readLike(string $pattern): array
    {
        $dao = DAO::get();
        // Utilisation correcte du LIKE avec des jokers %
        $query = $dao->prepare('SELECT * FROM contact WHERE nom LIKE :pattern OR prenom LIKE :pattern');
        
        try {
            // Ajouter les jokers au pattern pour la recherche
            $pattern = $pattern . '%';
            $query->execute([':pattern' => $pattern]);
            return self::fetchContacts($query);
        } catch (Exception $e) {
            // Gérer l'erreur si nécessaire
            return [];
        }
    }

    private static function fetchContacts($query): array
    {
        // Récupération des données dans un array
        $contacts = [];
        while ($row = $query->fetch()) {
            $contact = new Contact($row['prenom'], $row['nom'], (int)$row['mobile']);
            // Ajoute l'id, car il n'est pas dans le constructeur
            $contact->id = (int)$row['id'];
            // Ajoute le nouvel objet à la liste
            $contacts[] = $contact;
        }
        return $contacts;
    }
}
