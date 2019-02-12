

/* connexion 
    $dsn = 'mysql:host=localhost;dbname=blog';
    $user = 'guillaumedg'; 
    $password = ''; 
    // on crée $options afin d'insérer automatiquement le FETCH ASSOC dans les fetch
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Gestion des erreurs SQL
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Type de récupération des résultats par défaut 
    ];
    
    // on ajoute options dedans par default
    $pdo = new PDO($dsn, $user, $password, $options);
    $pdo->exec('SET NAMES UTF8');
    
    // Paramétrage de la liaison PHP <-> MySQL, les données sont encodées en UTF-8.
    $pdo->exec('SET NAMES UTF8');*/