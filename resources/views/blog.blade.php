<!DOCTYPE html>
<html lang="en-US" class="no-js scheme_default">
<head>
    <title>CORE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no" />
    <link rel='stylesheet' href='\js/custom/trx/trx_addons_icons-embedded.css' type='text/css' media='all' />
    <link rel='stylesheet' href='\js/custom/trx/trx_addons.css' type='text/css' media='all' />
    <link rel='stylesheet' href='\fonts/Carnas/stylesheet.css' type='text/css' media='all' />
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans%3A400%2C800italic%2C300%2C300italic%2C400italic%2C600%2C600italic%2C700%2C700italic%2C800&#038;subset=latin%2Clatin-ext&#038;ver=4.7.3' type='text/css' media='all' />
    <link rel='stylesheet' href='\css/fontello/css/fontello.css' type='text/css' media='all' />
    <link rel='stylesheet' href='\css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='\css/animation.css' type='text/css' media='all' />
    <link rel='stylesheet' href='\css/colors.css' type='text/css' media='all' />
    <link rel='stylesheet' href='\css/styles.css' type='text/css' media='all' />
    <link rel='stylesheet' href='\css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' href='\css/custom.css' type='text/css' media='all' />

    <link rel="icon" href="\images/cropped-fav-big-32x32.jpg" sizes="32x32" />
    <link rel="icon" href="\images/cropped-fav-big-192x192.jpg" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="images/cropped-fav-big-180x180.jpg" />
    <meta name="msapplication-TileImage" content="images/c.png" />

</head>

<body class="blog body_style_fullwide scheme_default blog_mode_blog blog_style_classic_3 sidebar_hide expand_content header_style_header-2 header_title_on no_layout vc_responsive">
<div class="body_wrap">
    <div class="page_wrap">
        <header class="top_panel top_panel_style_2 scheme_default">
            <div class="top_panel_navi scheme_dark">
                <div class="menu_main_wrap clearfix">
                    <div class="content_wrap">
                        <a class="logo scheme_dark" href="/">
                            <img src="images/LOGOTIPO-%20PNG-AZUL-CORE.png" alt="">
                        </a>
                        <nav class="menu_main_nav_area menu_hover_fade">
                            <div class="menu_main_inner">
                                <div class="contact_wrap scheme_default ">
                                    <div class="phone_wrap icon-mobile">4423768429</div>
                                    <div class="socials_wrap">
                                            <span class="social_item">
                                                <a href="#" target="_blank" class="social_icons social_twitter">
                                                    <span class="trx_addons_icon-twitter"></span>
                                                </a>
                                            </span>
                                        <span class="social_item">
                                                <a href="#" target="_blank" class="social_icons social_facebook">
                                                    <span class="trx_addons_icon-facebook"></span>
                                                </a>
                                            </span>
                                        <span class="social_item">
                                                <a href="#" target="_blank" class="social_icons social_gplus">
                                                    <span class="trx_addons_icon-gplus"></span>
                                                </a>
                                            </span>
                                        <span style="padding-left: 2em">
                                                <a href="\cotizacion"><input type="button"  class="btn-info" value="Cotizar"></a>
                                            </span>

                                    </div>
                                </div>
                                <ul id="menu_main" class="sc_layouts_menu_nav menu_main_nav">
                                    <li class="menu-item"><a href="\"><span>Inicio</span></a></li>
                                    <li class="menu-item"><a href="\servicios"><span>Servicios</span></a></li>
                                    <li class="menu-item"><a href="\contactos"><span>Contacto</span></a></li>
                                    <li class="menu-item"><a href="\empleo"><span>Empleo</span></a></li>
                                    <li class="menu-item"><a href="\blog"><span>Blog</span></a></li>
                                    <li class="menu-item"><a href="\singin"><span>Login</span></a></li>

                                    <!--li class="menu-item menu-item-has-children"><a href="#"><span>Blog</span></a>
                                        <ul class="sub-menu">
                                            <li class="menu-item menu-item-has-children"><a><span>Blog Style 1</span></a>
                                                <ul class="sub-menu">
                                                    <li class="menu-item"><a href="blog-1-chess.html"><span>Blog Style &#8216;Chess&#8217; /1 column/</span></a></li>
                                                    <li class="menu-item"><a href="blog-2-chess.html"><span>Blog Style &#8216;Chess&#8217; /2 columns/</span></a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item menu-item-has-children"><a><span>Blog Style 2</span></a>
                                                <ul class="sub-menu">
                                                    <li class="menu-item"><a href="blog-2-classic.html"><span>Blog Style &#8216;Classic&#8217; /2 columns/</span></a></li>
                                                    <li class="menu-item"><a href="blog-3-classic.html"><span>Blog style &#8216;Classic&#8217; /3 columns/</span></a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item"><a href="post-formats.html"><span>Post Formats</span></a></li>
                                            <li class="menu-item"><a href="single-post"><span>Post With Comments</span></a></li>
                                        </ul>
                                    </li-->
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div style="background-color: #0374a6; padding:10px "></div>
            <br>

        </header>

        <div class="page_content_wrap scheme_default">
            <br>
            <div class="content_wrap">
                <div class="content">
                    <div class="columns_wrap posts_container">


                    @foreach($post as $item)
                            <div class="column-1_3">
                                <article class="post_item post_layout_classic post_layout_classic_3 post has-post-thumbnail hentry">
                                    <div class="post_featured with_thumb hover_dots">
                                        <img src="/imagen/{{$item->imagen}}" alt="" />
                                        <div class="mask"></div>
                                        <a href="\single-post/{{$item->clave_post}}" aria-hidden="true" class="icons">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div>
                                    <div class="post_header entry-header">
                                        <div class="post_meta">
                                            <span class="post_meta_item post_date">Publicado:
                                                <a href="single-post">{{$item->fecha_alta}}</a>
                                            </span>
                                            <span class="post_meta_item post_categories">en
                                                <a href="post-formats.html" rel="category tag">{{$item->categoria}}</a>
                                            </span>
{{--                                            <a href="single-post#respond" class="post_meta_item post_counters_item post_counters_comments trx_addons_icon-comment">--}}
{{--                                                <span class="post_counters_number">0</span>--}}
{{--                                                <span class="post_counters_label">Comentarios</span>--}}
{{--                                            </a>--}}
                                        </div>
                                        <h3 class="post_title entry-title">
                                            <a href="" rel="bookmark"> {{$item->titulo}}</a>
                                        </h3>
                                    </div>
                                    <div class="post_content entry-content">
                                        <div class="post_content_inner">
                                            <p>
                                                    {{\Illuminate\Support\Str::limit($item->contenido, 200)}}
                                            </p>
                                        </div>
                                    </div>
                                    <a href="\single-post/{{$item->clave_post}}"> Leer mas</a>
                                </article>
                            </div>
                        @endforeach

                    </div>
{{--                    <div class="nav-links-old">--}}
{{--                        <span class="nav-prev"></span>--}}
{{--                        <span class="nav-next"><a href="#" >Older posts</a></span>--}}
{{--                    </div>--}}

                </div>
            </div>
        </div>
        <footer class="site_footer_wrap">
            <div class="footer_wrap widget_area scheme_dark">
                <div class="footer_wrap_inner widget_area_inner">
                    <div class="content_wrap">
                        <div class="columns_wrap">
                            <aside class="column-1_4 widget widget_text">
                                <div class="textwidget">
                                    <img src="images/LOGOTIPO- PNG- BLANCO -CORE.png" alt="CORE">
                                    <ul class="trx_addons_list  icons">
                                        <li class="icon-home-alt">Querétaro, Querétaro</li>
                                        <li class="icon-white">soluciones@core-consultoria.com</li>
                                        <li class="icon-tablet">4423768429</li>
                                    </ul>
                                </div>
                            </aside>
                            <aside class="column-1_4 widget widget_nav_menu">
                                <h5 class="widget_title">Navegación</h5>
                                <div class="menu-footer-navigate-container">
                                    <ul id="menu-footer-navigate" class="menu">
                                        <li class="menu-item"><a href="/servicios">Servicios</a></li>
                                        <li class="menu-item"><a href="/nosotros">Nosotros</a></li>
                                        <li class="menu-item"><a href="/cotizacion">Cotización</a></li>
                                        <li class="menu-item"><a href="/contactos">Contacto</a></li>
                                        <li class="menu-item"><a href="/empleo">Empleo</a></li>

                                        <li class="menu-item current-menu-item"><a href="/">Inicio</a></li>
                                        <!--li class="menu-item"><a href="post-formats.html">Blog</a></li-->
                                    </ul>
                                </div>
                            </aside>
                            <aside class="column-1_4 widget widget_text">
                                <h5 class="widget_title">Subscribete</h5>
                                <div class="textwidget">
                                    <ul class="trx_addons_list  icons">
                                        <li class="icon-facebook"><a href="#">Facebook</a></li>
                                        <li class="icon-twitter"><a href="#">Twitter</a></li>
                                        <li class="icon-linkedin"><a href="#">Linkedin</a></li>
                                        <li class="icon-gplus"><a href="#">Gplus</a></li>
                                    </ul>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright_wrap scheme_dark">
                <div class="copyright_wrap_inner">
                    <div class="content_wrap">
                        <div class="copyright_text">
                            <div class="columns_wrap">
                                <div class="column-1_2">Identidad Films &copy;. 2021.</div>
                                <div class="column-1_2">
                                    <a href="#">Terms of use</a> and
                                    <a href="#">Privacy Policy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
</div>

<script type='text/javascript' src='js/vendor/jQuery/jquery.js'></script>
<script type='text/javascript' src='js/vendor/jQuery/jquery-migrate.min.js'></script>
<script type='text/javascript' src='js/custom/custom.js'></script>
<script type='text/javascript' src='js/custom/trx/trx_addons.js'></script>
<script type='text/javascript' src='js/custom/scripts.js'></script>
<script type='text/javascript' src='js/custom/embed.min.js'></script>
<a href="#" class="trx_addons_scroll_to_top trx_addons_icon-up" title="Scroll to top"></a>
</body>

</html>
