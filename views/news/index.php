<?php require_once ROOT . "/views/header.php"?>
<!-- About Container -->
<div class="w3-container" id="about">
    <?php foreach ($newsList as $newsItem) : ?>
        <div class="w3-content" style="max-width:960px">
            <h5 class="w3-padding-16"><span class="w3-tag w3-wide"><?= $newsItem['title']; ?></span></h5>
            <img src="<?= $newsItem['preview']; ?>" style="width:100%;max-width:1000px" class="w3-margin-top">
            <p><?= $newsItem['short_content']; ?></p>
            <p><strong>Date:</strong> <?= $newsItem['date']; ?></p>
            <p><strong>Author:</strong> <?= $newsItem['author_name']; ?></p>
            <p><a href="/news/<?= $newsItem['id']; ?>">Read More</a></p>
        </div>
    <?php endforeach; ?>
    <?php echo $pagination->get(); ?>


</div>

<?php require_once ROOT . "/views/footer.php"?>
