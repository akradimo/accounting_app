<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سیستم حسابداری</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/project/public/css/styles.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <?php if (isset($content) && !empty($content)) {
            include $content;
        } else {
            echo "Content not found.";
        } ?>
    </div>
</body>
</html>