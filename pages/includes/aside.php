<aside class="aside">
    <div class="sidebar">
        <h4 class="sidebar-text">Жанры музыки</h4>
        <nav class="nav">
            <?php if ($genres) { ?>
                <ul class="nav-menu">
                    <?php $i = 0;
                    $n = 1;
                    foreach ($genres as $genre) { ?>
                        <a href="<?php echo get_url('genre?id=' . $genre['genre_id']); ?>" class="nav-link">
                            <li class="nav-item">
                                <span class="nav-text"><?php echo $genre['name_genre'] ?></span>
                            </li>
                        </a>
                    <?php } ?>

                </ul>
            <?php } else {
                echo "Похоже что-то отломалось, увы :(";
            } ?>
        </nav>
        <?php if (logged_in()) { ?>
            <ul class="nav-menu-user">
                <li class="nav-item-user">
                    <a href="<?php echo get_url('liked'); ?>" class="nav-link">
                        <svg width="24" height="21" viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.33857 10.7637C-0.041108 7.65052 0.752117 2.9808 4.71824 1.42423C8.68437 -0.13234 11.064 2.9808 11.8573 4.53737C12.6505 2.9808 15.8234 -0.13234 19.7895 1.42423C23.7556 2.9808 23.7556 7.65052 21.376 10.7637C18.9963 13.8768 11.8573 20.1031 11.8573 20.1031C11.8573 20.1031 4.71824 13.8768 2.33857 10.7637Z" stroke="#3D1D9A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="nav-text-user">Избранное</span>
                    </a>
                </li>
                <li class="nav-item-user hidden">
                    <a href="#" class="nav-link">
                        <svg width="24" height="21" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 2.5C10.1658 2.5 10.3247 2.56585 10.4419 2.68306C10.5592 2.80027 10.625 2.95924 10.625 3.125V9.375H16.875C17.0408 9.375 17.1997 9.44085 17.3169 9.55806C17.4342 9.67527 17.5 9.83424 17.5 10C17.5 10.1658 17.4342 10.3247 17.3169 10.4419C17.1997 10.5592 17.0408 10.625 16.875 10.625H10.625V16.875C10.625 17.0408 10.5592 17.1997 10.4419 17.3169C10.3247 17.4342 10.1658 17.5 10 17.5C9.83424 17.5 9.67527 17.4342 9.55806 17.3169C9.44085 17.1997 9.375 17.0408 9.375 16.875V10.625H3.125C2.95924 10.625 2.80027 10.5592 2.68306 10.4419C2.56585 10.3247 2.5 10.1658 2.5 10C2.5 9.83424 2.56585 9.67527 2.68306 9.55806C2.80027 9.44085 2.95924 9.375 3.125 9.375H9.375V3.125C9.375 2.95924 9.44085 2.80027 9.55806 2.68306C9.67527 2.56585 9.83424 2.5 10 2.5Z" fill="#3D1D9A" />
                            <rect x="0.75" y="0.75" width="18.5" height="18.5" rx="4.25" stroke="#3D1D9A" stroke-width="1.5" />
                        </svg>
                        <span class="nav-text-user">Создать плейлист</span>
                    </a>
                </li>
            </ul>
        <?php } ?>
    </div>
</aside>
<!-- aside -->