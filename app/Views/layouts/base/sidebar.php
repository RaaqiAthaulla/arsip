<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <?php
        $id = session()->get('id');
        foreach ($menus as $sidebar) {
            if ($sidebar == $menu) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/<?= $sidebar ?>/<?= $id ?>">
                        <i class="bi bi-grid"></i>
                        <span><?= $sidebar ?></span>
                    </a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="/admin/<?= $sidebar ?>/<?= $id ?>">
                        <i class="bi bi-grid"></i>
                        <span><?= $sidebar ?></span>
                    </a>
                </li>
    <?php }
        }
    ?>
    </ul>

</aside><!-- End Sidebar-->