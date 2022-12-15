<?php foreach ($search as $news) : ?>
    <div class="col-xl-4 d-grid zoom-hover div-height">
        <div class="card text-bg-dark card-thumbnail">
            <div class="fill-cover get-div">
                <?php $pathImg = "assets/original/img/" . $news['thumbnail']; ?>
                <?php if ($news["thumbnail"] != "random" && (file_exists($pathImg))) : ?>
                    <img class="set-img get-width" src="assets/original/img/<?= $news["thumbnail"] ?>" alt="">
                <?php endif; ?>
            </div>
            <div class="px-4 my-4">
                <h4 class="card-title"><a href="news.php?id=<?= $news['newsID'] ?>" class="no-decoration-pure"><?= limitText($news["title"], 20) ?></a></h4>
                <span class="small-font anti-white-a"><?= $news["name"] ?></span>
                <span class="small-font anti-white-a">-</span>
                <span class="small-font anti-white-a"><?= $news["date"] ?></span>
                <p class="card-text mt-1"><?= limitText($news["article"], 35) ?> <a class="no-decoration" href="news.php?id=<?= $news['newsID'] ?>">read more</a></p>
            </div>
            <?php if (isset($_SESSION["isAdmin"]) && isset($_SESSION["name"])) : ?>
                <?php if ($_SESSION["isAdmin"] || filterWriter($_SESSION["name"], $news["name"])) : ?>
                    <div class="px-4 mb-4">
                        <div class="row g-2 pad-go">
                            <br>
                            <br>
                            <div class="col-6 d-grid ps-4 flex-go-left">
                                <a href="addnews.php?id=<?= $news['newsID'] ?>" class="btn btn-outline-success">Edit</a>
                                <br>
                            </div>
                            <div class="col-6 d-grid pe-4 flex-go-right">
                                <a href="delete.php?id=<?= $news['newsID'] ?>" class="btn btn-outline-danger">Delete</a>
                                <br>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>