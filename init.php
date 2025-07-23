<?php
    ob_start();
    session_start();

    try {
        
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false
        ];

        $dsn = "pgsql:host=webmap2-enviro-mapper.h.aivencloud.com;dbname=webmap2;port=10662";
        $pdo = new PDO($dsn, 'avnadmin', 'AVNS_jBpSPJB7nCduTnzamrU', $opt);

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>

