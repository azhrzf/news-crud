<nav class="navbar navbar-expand-lg navbar-dark dark-bg sticky-top">
    <div class="container-fluid container-sm py-2">
        <a class="navbar-brand anti-white py-2" href="index.php">ON! News</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link anti-white-a" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" aria-current="page" href="#">About</a>
                </li>
            </ul>
            <form class="d-flex" role="search" method="POST">
                <input name="keyword" id="keyword" class="form-control text-bg-dark border-0 py-2" type="text" placeholder="Search news/writer" aria-label="Search">
                <button class="btn btn-dark border-0 py-2 ms-2" type="submit" name="search">🔎</button>
            </form>
        </div>
    </div>
</nav>
<div class="collapse" id="collapseExample">
    <div class="card card-body dark-bg text-white container-sm mt-3">
        <span>Runs using php, MySQL, HTML, CSS, and the Bootstrap framework,</span>
        <span class="span-space">this website was developed to fulfill the final semester exam for the "Web Platform Programming" subject taught by Mr. Eko Hadi Gunawan, M.Eng.</span>
        <span class="span-space anti-white-a">&copy; <?= date("Y"); ?> Azhar Zaidan Fauzi, 20106050022</span>
    </div>
</div>