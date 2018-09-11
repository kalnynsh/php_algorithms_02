<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check if is string palindrom</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<div class="container">
    <h2>Check palindrom string using strrev and strcasecmp php functions</h2>
    <p class="palindrom">
        <?php require_once __DIR__
            . '/utilities/isPalindromSubCompare/index.php'; ?>
    </p>

    <h2>Check palindrom string using recursion</h2>
    <p class="palindrom">
        <?php require_once __DIR__
            . '/utilities/isPalindromreUseRecursion/index.php'; ?>
    </p>
</div>

</body>
</html>
