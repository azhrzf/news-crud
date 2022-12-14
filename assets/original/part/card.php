<?php foreach ($search as $news) : ?>
    <div class="col-xl-4 d-grid zoom-hover">
        <div class="card text-bg-dark <?= isset($_SESSION["isAdmin"]) && isset($_SESSION["name"]) ? "card-thumbnail" : "card-thumbnail-visitor" ?>">
            <div class="fill-cover" style="background-image: linear-gradient(160deg, rgb(<?= rgbRandom() ?>) 0%, rgb(<?= rgbRandom() ?>) 100%);">
                <?php if ($news["thumbnail"] != "random") : ?>
                    <img class="set-img" src="assets/original/img/<?=$news["thumbnail"]?>" alt="">
                <?php endif; ?>
            </div>
            <div class="px-4 my-4">
                <h4 class="card-title"><a href="news.php?id=<?= $news['newsID'] ?>" class="no-decoration-pure"><?= $news["title"] ?></a></h4>
                <span class="small-font anti-white-a"><?= $news["name"]?></span>
                <span class="small-font anti-white-a">-</span>
                <span class="small-font anti-white-a"><?=$news["date"]?></span>
                <p class="card-text mt-1"><?= limitText($news["article"], 35) ?> <a class="no-decoration" href="news.php?id=<?= $news['newsID'] ?>">read more</a></p>
            </div>
            <?php if (isset($_SESSION["isAdmin"]) && isset($_SESSION["name"])) : ?>
                <?php if ($_SESSION["isAdmin"] || filterWriter($_SESSION["name"], $news["name"])) : ?>
                    <div class="px-4">
                        <div class="row g-2">
                            <div class="col-6 d-grid">
                                <a href="addnews.php?id=<?= $news['newsID'] ?>" class="btn btn-outline-success">Edit</a>
                            </div>
                            <div class="col-6 d-grid">
                                <a href="delete.php?id=<?= $news['newsID'] ?>" class="btn btn-outline-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>