<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <?php
        $user_id = session()->get('id');
        foreach ($menus as $sidebar) {
            if ($sidebar == $menu) { ?>
                <li class="nav-item">
                    <a class="nav-link " href="/user/<?= $sidebar ?>/<?= $user_id ?>">
                        <i class="bi bi-grid"></i>
                        <span><?= $sidebar ?></span>
                    </a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link collapsed " href="/user/<?= $sidebar ?>/<?= $user_id ?>">
                        <i class="bi bi-grid"></i>
                        <span><?= $sidebar ?></span>
                    </a>
                </li>
        <?php }
        }
        ?>

    </ul>

</aside><!-- End Sidebar-->