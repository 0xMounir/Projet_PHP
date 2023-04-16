<?php
if (isset($_POST["register"])) {
    require_once "./config/pdo.php";

    $errMsg = "";

    // Obtenir les informations que l'utilisateur a entré.
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : null;
    $password = $_POST["password"];
    $birthdate = $_POST["birthdate"];
    $phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : null;

    // Obtenir l'image et sa taille et imposer une limite de taille.
    $img = $_FILES["image"]["name"];
    $imgSize = $_FILES["image"]["size"];
    $maxSize = 2000000;
    $imgOutput = "";
    $imgUniqID = uniqid("IMG-");

    // Obtenir les informations de l'utilisateur avec l'adresse e-mail.
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email");
    $result = $stmt->execute(["email" => $email]);
    $user = $stmt->fetch();

    // Vérifier si l'utilisateur a rentré une image ou non
    if ($img == "") {
        $imgOutput = null;
    } else {
        $allowedExt = ["gif", "png", "jpg", "jpeg"];
        $ext = pathinfo($img, PATHINFO_EXTENSION);

        // Vérifier le format de l'image.
        if (!in_array($ext, $allowedExt)) {
            $errMsg =
                "Uniquement les formats .PNG, .JPG .JPEG et .GIF sont autorisés.";
        }
        // Vérifier la taille de l'image.
        if ($imgSize > $maxSize || $imgSize == 0) {
            $errMsg = "La taille de l'image ne doit pas dépasser 2Mo.";
        }
        $imgOutput = "$imgUniqID.$ext";
    }

    // Vérifier la taille de l'image.
    if ($firstname == "") {
        $errMsg = "Entrez votre prénom.";
    }
    if (strlen($firstname) < 2 && strlen($firstname) > 32) {
        $errMsg = "Prénom doit comporter de 2 à 32 caractères.";
    }
    if ($lastname == "") {
        $errMsg = "Entrez votre nom.";
    }
    if (strlen($firstname) < 2 && strlen($firstname) > 32) {
        $errMsg = "Nom doit comporter de 2 à 32 caractères.";
    }

    // Noms de domaines autorisés
    $allowedDomains = [
        "gmail.com",
        "yahoo.com",
        "yahoo.fr",
        "outlook.com",
        "outlook.fr",
        "live.com",
        "live.fr",
        "hotmail.com",
        "hotmail.fr",
        "pm.me",
        "protonmail.com",
        "icloud.com",
    ];

    // Vérifier si l'adresse est valide
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Séparer les strings par @
        $parts = explode("@", $email);

        // Récupère la dernière valeur d'un tableau (le nom de domaine)
        $domain = array_pop($parts);

        // Vérifier si le nom de domaine fait parti des domaines autorisés
        if (!in_array($domain, $allowedDomains)) {
            $errMsg = "Entrez une adresse e-mail valide.";
        }
    }

    if ($email == "") {
        $errMsg = "Entrez votre adresse e-mail.";
    }
    if (!$user["email"] == null) {
        $errMsg = "Cette adresse e-mail est déjà inscrite sur le site.";
    }
    if ($password == "") {
        $errMsg = "Entrez votre mot de passe.";
    }

    // Création de plusieurs variables pour vérifier le mot de passe
    $uppercase = preg_match("@[A-Z]@", $password);
    $lowercase = preg_match("@[a-z]@", $password);
    $number = preg_match("@[0-9]@", $password);
    $specialChars = preg_match("@[^\w]@", $password);

    if (
        !$uppercase ||
        !$lowercase ||
        !$number ||
        !$specialChars ||
        strlen($password) < 8
    ) {
        $errMsg =
            "Mot de passe doit comporter au moins 8 caractères et contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial.";
    }
    // Hash du mot de passe
    $hashSecure = password_hash($password, PASSWORD_BCRYPT);

    if ($birthdate == "") {
        $errMsg = "Entrez votre date de naissance.";
    }
    if ($phone == "") {
        $phone = null;
    }
    if ($errMsg == "") {
        try {
            $stmt = $pdo->prepare(
                "INSERT INTO users (lastname, firstname, email, password, birthdate, phone, profile_image, created_at, role) VALUES (:lastname, :firstname, :email, :password, :birthdate, :phone, :image, :created_at, :role)"
            );
            $stmt->execute([
                ":lastname" => $lastname,
                ":firstname" => $firstname,
                ":email" => $email,
                ":password" => $hashSecure,
                ":birthdate" => $birthdate,
                ":phone" => $phone,
                ":image" => $imgOutput,
                ":created_at" => date("Y-m-d"),
                ":role" => "user",
            ]);

            if (!$imgOutput == null) {
                move_uploaded_file(
                    $_FILES["image"]["tmp_name"],
                    "uploads/$imgOutput"
                );
            }

            header("Location: login.php?action=sucess");
            exit();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>
