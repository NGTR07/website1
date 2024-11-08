<?php
// Paramètres de connexion à la base de données
$host = 'localhost';
$dbname = 'gautnico9'; // Remplacez par le nom de votre base
$username = 'gautnico'; // Votre nom d'utilisateur MySQL
$password = '0279'; // Votre mot de passe MySQL

// Récupération des données du formulaire
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = $_POST['email'];

// Connexion à la base de données
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparation de la requête d'insertion
    $sql = "INSERT INTO utilisateurs (prenom, nom, email) VALUES (:prenom, :nom, :email)";
    $stmt = $conn->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':email', $email);

    // Exécution de la requête
    $stmt->execute();
    echo "Inscription réussie !";
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
