<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <link rel="stylesheet" type="text/css" href="../css/variables.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">

    <link rel="shortcut icon" href="../assets/media/tool.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <header class="flex">
        <nav class="container flex justify">
            <section>
                <article class="flex center" id="icon">
                    <img class="icon" src="../assets/media/tool.png"/>
                    <p><?php echo APP_NAME; ?></p>
                </article>
            </section>

            <section>
                <article class="flex">
                    <a href="#"><img class="icon" src="../assets/media/config.png"/></a>
                    <a href="#"><img class="icon" src="../assets/media/config.png"/></a>
                </article>
            </section>
        </nav>
    </header>