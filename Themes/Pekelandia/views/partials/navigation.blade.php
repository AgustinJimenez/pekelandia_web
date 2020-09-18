<div class="nicdark_section nicdark_navigation">

    <div class="nicdark_menu_boxed">

    <!--Contenedor de publicidad-->
        <div class="grid grid_12" style="margin-left: 0px; width: 100%;">

            <!--archive1-->
            <div class="nicdark_archive1 nicdark_radius nicdark_shadow" style="height: 100px;">

                <div id="owl-banner" class="owl-carousel owl-theme" style="height: 100px;">
                    @foreach ($anuncios as $anuncio)
                        <a href="{{$anuncio->vinculo}}" target="_blank">
                        <img class="item" src="{{$anuncio->imagen}}" alt="" style="height: 100px;width: 100%;">
                        </a>
                    @endforeach
                </div>

            </div>
            <!--archive1-->

        </div>

        <!--Cambiado seccion por contacto y mail en la cabecera, comentadas secciones no utilizadas-->
        <div class="nicdark_section nicdark_bg_greydark menu_display_responsive" style="margin-bottom: -10px;">

            <div class="nicdark_container nicdark_clearfix">

                <div class="grid grid_5">
                    <div class="nicdark_focus">
                        <h6 class="white nav-title" style="margin-top: 4px;">
                            <p>&nbsp;<a class="white"  href="/"><i class="icon-home"></i>&nbsp;Inicio&nbsp;&nbsp;</a>
                            <i class="icon-mail"></i>&nbsp;<a class="white" href="mailto:info@pekelandia.com.py">info@pekelandia.com.py</a>
                            &nbsp;
                            <i class="icon-phone-outline"></i>&nbsp;(+595) 982 164 507
                            </p>
                        </h6>
                    </div>
                </div>
                <div class="grid grid_3 right">
                    <div class="nicdark_focus">
                        <h6 class="white nav-title" style="margin-top: 4px; ">
                        <p><i class="icon-plus-outline"></i>&nbsp;&nbsp;<a class="white" href="{{ (url('singlepost')).'/?registro'}}">Registro de Newsletter</a>
                        </p>
                        </h6>
                    </div>
                </div>
                <div class="grid grid_2 right" style="margin-top:8px;">
                    <div class="nicdark_focus right">
                            <!--<i class="icon-search"></i>&nbsp;&nbsp;-->
                            <!--text-indent para la sangria del texto-->
                            <!--<input class="nicdark_bg_greydark2 nicdark_radius nicdark_shadow white subtitle" type="text" value="" placeholder="Buscar.." style="float: right; margin-top: -3px; text-indent: 0.5em; width: 110px;">-->
                            <!--text-indent para la sangria del texto-->
                        {!! Form::open(array('route' => 'searchFilter','method' => 'get')) !!}
                            <input class="search-btn nicdark_bg_greydark2 nicdark_radius nicdark_shadow white subtitle" type="search" value="" name="inputSearch" id="inputSearch" placeholder="Buscar.." required="">
                            <button type="submit" class="nicdark_btn right" style="border:none; background-color: rgba(0,0,0,0);">
                                <i class="white icon-search"></i>
                            </button> 
                        {!! Form::close() !!}
                    </div>
                </div>

                    <!--Seccion de redes sociales-->
                <div class="grid grid_2 right">
                    <div class="nicdark_focus right" style="margin-top: -7px;">
                        <div class="nicdark_margin5 margin5-disable">
                            <a href="https://www.facebook.com/pages/Pekelandia/178570488929518" target="_blank" class="nicdark_press right nicdark_btn_icon pekelandia white"><i class="fa fa-facebook-official nav-icons"></i></a>
                        </div>
                        <div class="nicdark_margin5 margin5-disable">
                            <a href="https://twitter.com/pekelandia_py" target="_blank" class="nicdark_press right nicdark_btn_icon pekelandia white"><i class="fa fa-twitter nav-icons"></i></a>
                        </div>
                        <div class="nicdark_margin5 margin5-disable">
                            <a href="https://www.youtube.com/user/PekelandiaPy" target="_blank" class="nicdark_press right nicdark_btn_icon pekelandia white"><i class="fa fa-youtube-play"></i></a>
                        </div>
                        <div class="nicdark_margin5 margin5-disable">
                            <a href="https://www.instagram.com/pekelandiapy/" target="_blank" class="nicdark_press right nicdark_btn_icon pekelandia white"><i class="fa fa-instagram nav-icons"></i></a>
                        </div>
                        <div class="nicdark_margin5 margin5-disable">
                            <a href="http://pekelandiaguiainfantil.blogspot.com/" target="_blank" class="nicdark_press right nicdark_btn_icon pekelandia white">
                            <!--<i class="fa fa-rss-square nav-icons"></i>-->
                            <img src="{{asset('assets/images/blogger.png')}}" style="margin-bottom: 3px;">    
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <!--end nickdark container-->

        </div>

        <div class="nicdark_space3 nicdark_bg_gradient"></div>

        <div class="nicdark_section nicdark_bg_menu nicdark_shadow nicdark_radius_bottom">
            <div class="nicdark_container nicdark_clearfix">

                <div class="grid grid_12 percentage">

                        <div class="nicdark_space20"></div>

                        <!--Logo de la Pagina-->
                        <div class="nicdark_logo">
                            <a href="/"><img alt="" src="{{asset('assets/images/logo.jpg')}}"></a>
                        </div>

                        <div class="search-display"> 
                        {!! Form::open(array('route' => 'searchFilter','method' => 'get')) !!}
                        <input id="search-btn-responsive" class="nicdark_radius" type="search" value="" name="inputSearch" id="inputSearch" placeholder="Buscar.." required="">
                        <button type="submit" class="nicdark_btn right" style="border:none; background-color: rgba(0,0,0,0);margin-top: 2px;">
                            <i class="icon-search" style="color: #868585"></i>
                        </button> 
                        {!! Form::close() !!}
                        </div>

                        <nav>
                        
                            <ul class="nicdark_menu nicdark_margin010 nicdark_padding50" style="margin-top: 5px;">
                            @foreach($categorias as $categoria)
                            @if ($categoria->menu == 1)

                            <!--Inicio de las categorias-->
                            <li class="blue">
                                <div class="contenedor fademenu">
                                    <a href="{{ (url('empresas')).'/?categoria_id='.$categoria->id }}" class="titulo">{{$categoria->nombre}}</a>
                                </div>
                            @endif
                                <ul class="sub-menu">
                                @foreach ($subcategorias as $subcategoria)

                                    @if ($subcategoria->categoria_id == $categoria->id & $subcategoria->tiene_hijos == false)
                                    
                                        <li><a href="{{ (url('empresas')).'/?subcategoria_id='.$subcategoria->id }}">
                                            {{$subcategoria->nombre}}
                                            </a></li>
                                    
                                    @elseif ($subcategoria->categoria_id == $categoria->id & $subcategoria->tiene_hijos == true)

                                        <li><a href="{{ (url('empresas')).'/?subcategoria_id='.$subcategoria->id }}">{{$subcategoria->nombre}}</a>

                                            <ul class="sub-menu">
                                                @foreach ($subsubcategorias as $subsubcategoria)

                                                    @if ($subsubcategoria->subcategoria_id == $subcategoria->id)
                                                    <li><a href="{{ (url('empresas')).'/?subsubcategoria_id='.$subsubcategoria->id }}">{{$subsubcategoria->nombre}}</a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                                </ul>
                            </li>
                            @endforeach
                                <!--PROMOCIONES ESTATICO-->
                                <li class="blue">
                                    <div class="contenedor fademenu">
                                        <a href="{{(url('promociones'))}}" class="titulo">Promociones</a>
                                    </div>
                                </li>
                            </ul>
                        </nav>

                        <div class="nicdark_space20"></div>

                </div>

            </div>
            <!--end container-->

        </div>
        <!--end header-->

    </div>

</div>