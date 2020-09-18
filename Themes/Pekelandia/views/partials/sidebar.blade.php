<div class="grid grid_3 nicdark_masonry_item">

    <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
        <div class="nicdark_textevidence nicdark_bg_blue nicdark_radius_top" style="background-color: #{{$color}};box-shadow: 0px 4px 0px 0px #{{$subcolor}};">
        <a href="{{ (url('empresas')).'/?categoria_id='.$categoria->id }}">
            <h4 class="white nicdark_margin20">{{$categoria->nombre}}</h4>
        </a>
            <i class="icon-clipboard nicdark_iconbg right medium blue" style="color: #{{$subcolor}};"></i>
        </div>
        <ul class="nicdark_list border">
                
        @foreach ($sidebars as $sidebar)
            @if ($sidebar->tiene_hijos == false)
            <li class="nicdark_border_grey">
                <div class="nicdark_margin20">
                    <div class="nicdark_activity">
                        <a href="{{ (url('empresas')).'/?subcategoria_id='.$sidebar->id }}">
                            <p><i class="icon-right-open-outline"></i>&nbsp;{{$sidebar->nombre}}</p>
                        </a>
                    </div>
                </div>
            </li>

            @elseif ($sidebar->tiene_hijos == true)
            <li class="nicdark_border_grey">
                
                <div class="nicdark_margin20">
                    <div class="nicdark_activity">
                        <a href="{{ (url('empresas')).'/?subcategoria_id='.$sidebar->id }}">
                            <p><i class="icon-right-open-outline"></i>&nbsp;{{$sidebar->nombre}}</p>
                        </a>
                    </div>
                </div>

                <ul class="nicdark_list">
                @foreach ($subsidebars as $subsidebar)
                    <li class="">
                        <div class="nicdark_margin2040">
                            <div class="nicdark_activity">
                                <a href="{{ (url('empresas')).'/?subsubcategoria_id='.$subsidebar->id }}">
                                    <p><i class="icon-right-open-outline"></i>&nbsp;{{$subsidebar->nombre}}</p>
                                </a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endif
        @endforeach
                
        </ul>
    </div>

</div>