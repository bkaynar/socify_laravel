<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            AHI<span>Socify</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item <?php echo e(active_class(['/'])); ?>">
                <a href="<?php echo e(url('/')); ?>" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Anasayfa</span>
                </a>
            </li>
            <li class="nav-item <?php echo e(active_class(['yemek/*'])); ?>">
                <a class="nav-link" data-bs-toggle="collapse" href="#yemek" role="button"
                   aria-expanded="<?php echo e(is_active_route(['yemek/*'])); ?>" aria-controls="email">
                    <i class="link-icon" data-feather="coffee"></i>
                    <span class="link-title">Yemek</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse <?php echo e(show_class(['yemek/*'])); ?>" id="yemek">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="<?php echo e(url('/yemekler')); ?>"
                               class="nav-link <?php echo e(active_class(['yemekler'])); ?>">Yemekler</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('/yemekekle')); ?>" class="nav-link <?php echo e(active_class(['yemekekle'])); ?>">Yemek
                                Ekle</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?php echo e(active_class(['otobus/*'])); ?>">
                <a class="nav-link" data-bs-toggle="collapse" href="#otobus" role="button"
                   aria-expanded="<?php echo e(is_active_route(['otobus/*'])); ?>" aria-controls="email">
                    <i class="link-icon" data-feather="clock"></i>
                    <span class="link-title">Otobüsler</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse <?php echo e(show_class(['otobus/*'])); ?>" id="otobus">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="<?php echo e(url('/otobus-saatleri')); ?>"
                               class="nav-link <?php echo e(active_class(['otobus-saatleri'])); ?>">Otobüsler</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('/otobus-saati-ekle')); ?>"
                               class="nav-link <?php echo e(active_class(['otobus-saati-ekle'])); ?>">Otobüs Saati Ekle</a>
                        </li>
                    </ul>
                </div>
            </li>
            </li>
            <li class="nav-item <?php echo e(active_class(['birim/*'])); ?>">
                <a class="nav-link" data-bs-toggle="collapse" href="#birim" role="button"
                   aria-expanded="<?php echo e(is_active_route(['birim/*'])); ?>" aria-controls="email">
                    <i class="link-icon" data-feather="briefcase"></i>
                    <span class="link-title">Birimler</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse <?php echo e(show_class(['birim/*'])); ?>" id="birim">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="<?php echo e(url('/birimler')); ?>"
                               class="nav-link <?php echo e(active_class(['birimler'])); ?>">Birimler</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('/birimekle')); ?>" class="nav-link <?php echo e(active_class(['birimekle'])); ?>">Birim
                                Ekle</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?php echo e(active_class(['topluluk/*'])); ?>">
                <a class="nav-link" data-bs-toggle="collapse" href="#topluluk" role="topluluk"
                   aria-expanded="<?php echo e(is_active_route(['topluluk/*'])); ?>" aria-controls="email">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Topluluklar</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse <?php echo e(show_class(['topluluk/*'])); ?>" id="topluluk">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="<?php echo e(url('/topluluklar')); ?>"
                               class="nav-link <?php echo e(active_class(['topluluklar'])); ?>">Topluluklar</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('/toplulukekle')); ?>" class="nav-link <?php echo e(active_class(['toplulukekle'])); ?>">Topluluk
                                Ekle</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?php echo e(active_class(['etkinlik/*'])); ?>">
                <a class="nav-link" data-bs-toggle="collapse" href="#etkinlik" role="etkinlik"
                   aria-expanded="<?php echo e(is_active_route(['etkinlik/*'])); ?>" aria-controls="email">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Etkinlik</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse <?php echo e(show_class(['etkinlik/*'])); ?>" id="etkinlik">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="<?php echo e(url('/etkinlikler')); ?>"
                               class="nav-link <?php echo e(active_class(['etkinlikler'])); ?>">Etkinlikler</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('/etkinlikekle')); ?>" class="nav-link <?php echo e(active_class(['etkinlikekle'])); ?>">Etkinlik
                                Ekle</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?php echo e(active_class(['kullanici/*'])); ?>">
                <a class="nav-link" data-bs-toggle="collapse" href="#kullanici" role="kullanici"
                   aria-expanded="<?php echo e(is_active_route(['kullanici/*'])); ?>" aria-controls="email">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Kullanıcı</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse <?php echo e(show_class(['kullanici/*'])); ?>" id="kullanici">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="<?php echo e(url('/kullanicilar')); ?>"
                               class="nav-link <?php echo e(active_class(['kullanicilar'])); ?>">Kullanıcılar</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('/kullaniciekle')); ?>"
                               class="nav-link <?php echo e(active_class(['kullaniciekle'])); ?>">Kullanıcı
                                Ekle</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?php echo e(active_class(['ekip/*'])); ?>">
                <a class="nav-link" data-bs-toggle="collapse" href="#ekip" role="ekip"
                   aria-expanded="<?php echo e(is_active_route(['ekip/*'])); ?>" aria-controls="email">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Ekip</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse <?php echo e(show_class(['ekip/*'])); ?>" id="ekip">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="<?php echo e(url('/ekip')); ?>"
                               class="nav-link <?php echo e(active_class(['ekip'])); ?>">Ekip</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('/ekipekle')); ?>"
                               class="nav-link <?php echo e(active_class(['ekipekle'])); ?>">Ekip Üyesi Ekle</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?php echo e(active_class(['guncelleme/*'])); ?>">
                <a class="nav-link" data-bs-toggle="collapse" href="#guncelleme" role="guncelleme"
                   aria-expanded="<?php echo e(is_active_route(['guncelleme/*'])); ?>" aria-controls="email">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Güncelleme</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse <?php echo e(show_class(['guncelleme/*'])); ?>" id="guncelleme">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="<?php echo e(url('/guncelleme')); ?>"
                               class="nav-link <?php echo e(active_class(['guncelleme'])); ?>">Güncelleme</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('/guncelleme-ekle')); ?>"
                               class="nav-link <?php echo e(active_class(['guncelleme-ekle'])); ?>">Güncelleme Ekle</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?php echo e(active_class(['taksi/*'])); ?>">
                <a class="nav-link" data-bs-toggle="collapse" href="#taksi" role="taksi"
                   aria-expanded="<?php echo e(is_active_route(['taksi/*'])); ?>" aria-controls="email">
                    <i class="link-icon" data-feather=""></i>
                    <span class="link-title">Taksi</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse <?php echo e(show_class(['taksi/*'])); ?>" id="taksi">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="<?php echo e(url('/taksi')); ?>"
                               class="nav-link <?php echo e(active_class(['taksi'])); ?>">Taksi</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('/taksi-ekle')); ?>"
                               class="nav-link <?php echo e(active_class(['taksi-ekle'])); ?>">Taksi Ekle</a>
                        </li>
                    </ul>
                </div>
            </li> <li class="nav-item <?php echo e(active_class(['story/*'])); ?>">
                <a class="nav-link" data-bs-toggle="collapse" href="#story" role="story"
                   aria-expanded="<?php echo e(is_active_route(['story/*'])); ?>" aria-controls="email">
                    <i class="link-icon" data-feather=""></i>
                    <span class="link-title">Story</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse <?php echo e(show_class(['story/*'])); ?>" id="story">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="<?php echo e(url('/story')); ?>"
                               class="nav-link <?php echo e(active_class(['story'])); ?>">Story</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('/story-ekle')); ?>"
                               class="nav-link <?php echo e(active_class(['story-ekle'])); ?>">Story Ekle</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('logout')); ?>">
                    <i class="link-icon" data-feather="log-out"></i>
                    <span class="link-title">Çıkış Yap</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<?php /**PATH /home/shiningm/ahisocitify.shiningmoony.com.tr/resources/views/layout/sidebar.blade.php ENDPATH**/ ?>