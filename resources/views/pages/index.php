<?php
    use Controller\AuthorController;
?>

<header>
    <h1><?=APP_NAME?></h1>
    <p><?=APP_DESCRIPTION?></p>
    <a href="https://github.com/Dakpaneel/fulcrum">Source Code</a>
</header>

<section>
    <h2>Authors</h2>

    <ul>
        <?php foreach(AuthorController::index() as $author): ?>
            <li>
                <p><?=$author['name']?></p>
                <p><?=$author['role']?></p>
            </li>
        <?php endforeach;?>
    </ul>
</section>