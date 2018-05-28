@extends('layouts.app')

@section('content')
    @include('items')

    <div id="detail">
        <div class="window">
            <div class="title">
                <div class="name">사보-히든</div>
                <div class="close">X</div>
            </div>
            <div class="line descr">명령어같은거입니다.</div>
            <div class="line">조합법</div>
            <div class="line itemlist recipe">

            </div>
            <div class="ads">
                <iframe id="ads" src="http://home.sions.kr/skin/board/makeHelper/ads.php?name=init"></iframe>
            </div>
            <div class="line">부족한 재료</div>
            <div class="line itemlist lack"></div>
            <div class="line">부족한 재료 (최하위)</div>
            <div class="line itemlist lack-lowest"></div>
            <div class="line">상위 조합</div>
            <div class="line itemlist upper"></div>
            <div class="line">최상위 조합</div>
            <div class="line itemlist top"></div>
            <div class="line">하위 재료</div>
            <div class="line itemlist lowrecipe"></div>
            <div class="line">하위 재료 (최하위)</div>
            <div class="line itemlist lowrecipe-lowest"></div>
        </div>
    </div>

    <div class="grouplist">
        <div class="groupColumn" style="width: 14.1429%;">
            <div class="group">
                <div class="groupname">옵션</div>
                <div class="itemlist">

                    <div id="mkoption" class="">
                        <div class="option">
                            <input id="option_build_etc" type="checkbox" checked="">
                            <label for="option_build_etc">진행에 기타 포함</label>
                        </div>
                        <div class="option zoom">
                            <div class="zbtn zoomin">+</div>
                            <div class="zbtn zoomout">-</div>
                            <div class="zbtn zoomreset">○</div>
                            <div style="clear:both"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="group">
                <div class="groupname">흔함</div>
                <div class="itemlist">

                    <div class="item" uindex="0" uid="5">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/wisp.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">위습</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="1" uid="6">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000286.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">루피</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="2" uid="7">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000248.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">조로</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="3" uid="8">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000243.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">나미</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="4" uid="9">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000287.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">우솝</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="5" uid="10">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000246.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">상디</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="6" uid="11">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000288.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">쵸파</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="7" uid="12">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000307.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">칼병</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="8" uid="13">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000307.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">총병</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="9" uid="14">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000383.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">버기</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                </div>
            </div>
            <div class="group">
                <div class="groupname">안흔함</div>
                <div class="itemlist">

                    <div class="item" uindex="10" uid="22">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000219.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">CP9 블루노</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="11" uid="20">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000217.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">CP9 후쿠로</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="12" uid="16">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000244.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">로빈</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="13" uid="26">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000258.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">베포</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="14" uid="17">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000302.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">브룩</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="15" uid="21">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000382.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">스모커</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="16" uid="15">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000285.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">에이스</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="17" uid="25">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000226.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">이나즈마</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="18" uid="18">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000247.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">저격왕</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="19" uid="27">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000320.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">쵸파</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="20" uid="24">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000238.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">페로나</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="21" uid="19">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000252.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">프랑키</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="22" uid="23">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000240.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">하찌</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="groupColumn" style="width: 14.1429%;">

            <div class="group">
                <div class="groupname">특별함</div>
                <div class="itemlist">

                    <div class="item" uindex="23" uid="42">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000303.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">X-드레이크</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="24" uid="59">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000225.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">갓 에넬</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="25" uid="48">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000264.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">겟코 모리아</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="26" uid="30">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000243.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">나미</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="27" uid="38">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000215.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">로브 루치</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="28" uid="35">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000244.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">로빈</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="29" uid="40">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000269.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">로우</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="30" uid="29">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000286.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">루피</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="31" uid="36">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000281.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">마르코</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="32" uid="57">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000261.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">바질 호킨스</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="33" uid="33">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000383.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">버기</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="34" uid="44">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000234.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">봉쿠레</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="35" uid="31">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000246.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">상디</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="36" uid="54">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000282.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">스퀴드</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="37" uid="52">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000235.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">아론</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="38" uid="61">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000236.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">압살롬</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="39" uid="50">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000285.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">에이스</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="40" uid="60">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000256.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">우솝</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="41" uid="45">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000226.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">이나즈마</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="42" uid="32">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/33845a1ea8de190ef6.11876619.png') }}">
                            <div class="progress"></div>
                            <div class="name">조로 귀기</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="43" uid="53">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000248.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">조로 초신성</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="44" uid="51">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000267.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">징베</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="45" uid="37">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/70315a1e54a4d77f00.54305555.png') }}">
                            <div class="progress"></div>
                            <div class="name">챠카</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="46" uid="56">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000316.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">쵸파 두뇌강화</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="47" uid="55">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000318.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">쵸파 점프강화</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="48" uid="39">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000257.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">카포네 갱 벳지</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="49" uid="41">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000292.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">쿠마</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="50" uid="47">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000268.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">크로커다일</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="51" uid="58">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000259.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">키드</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="52" uid="43">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000260.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">킬러</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="53" uid="34">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000279.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">타시기</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="54" uid="46">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000371.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">파이러츠 도킹 5</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="55" uid="49">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/282685a1e549e6d2703.96426781.png') }}">
                            <div class="progress"></div>
                            <div class="name">헤르메포</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="groupColumn" style="width: 14.1429%;">

            <div class="group">
                <div class="groupname">희귀함</div>
                <div class="itemlist">

                    <div class="item" uindex="56" uid="99">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000225.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">갓 에넬</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="57" uid="79">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000381.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">검은수염</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="58" uid="88">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000263.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">도플라밍고</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="59" uid="75">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000216.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">로브 루치</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="60" uid="80">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000269.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">로우</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="61" uid="62">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000286.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">루피</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="62" uid="84">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000284.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">류마</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="63" uid="94">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000281.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">마르코</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="64" uid="72">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000270.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">마젤란</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="65" uid="73">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000479.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">모몬가</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="66" uid="65">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000266.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">미호크</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="67" uid="96">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/193415a1e547ac4a1c2.99022063.png') }}">
                            <div class="progress"></div>
                            <div class="name">바르톨로메오</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="68" uid="82">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000232.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">바제스</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="69" uid="81">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000262.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">바질 호킨스</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="70" uid="97">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000233.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">반 더 데켄</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="71" uid="91">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000254.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">벤 베크만</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="72" uid="66">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000291.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">보아 핸콕</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="73" uid="85">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000302.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">브룩</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="74" uid="68">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/166525a1e5491732111.23960980.png') }}">
                            <div class="progress"></div>
                            <div class="name">비비</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="75" uid="93">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000561.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">사보</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="76" uid="63">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000246.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">상디</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="77" uid="90">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000255.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">샹크스</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="78" uid="70">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000292.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">센토마루</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="79" uid="87">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/312215a1e5450ecb9e4.12149098.png') }}">
                            <div class="progress"></div>
                            <div class="name">슈가</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="80" uid="71">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000382.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">스모커</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="81" uid="74">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000321.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">시류</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="82" uid="76">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000311.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">아오키지</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="83" uid="78">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000276.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">아카이누</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="84" uid="83">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000222.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">오즈</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="85" uid="98">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000287.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">우솝</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="86" uid="92">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000380.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">이완코브</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="87" uid="100">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000560.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">제프</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="88" uid="64">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/33845a1ea8de190ef6.11876619.png') }}">
                            <div class="progress"></div>
                            <div class="name">조로</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="89" uid="95">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000280.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">죠즈</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="90" uid="89">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000314.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">쵸파 가드포인트</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="91" uid="67">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000268.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">크로커다일</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="92" uid="102">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000259.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">키드</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="93" uid="77">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000278.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">키자루</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="94" uid="101">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000480.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">킨에몬</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="95" uid="86">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000238.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">페로나</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="96" uid="69">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000252.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">프랑키</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="groupColumn" style="width: 14.1429%;">

            <div class="group">
                <div class="groupname">전설적인</div>
                <div class="itemlist">

                    <div class="item" uindex="97" uid="106">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000479.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">거프</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="98" uid="131">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000381.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">검은수염</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="99" uid="103">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000265.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">겟코 모리아</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="100" uid="130">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000243.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">나미</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="101" uid="107">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000221.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">드래곤</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="102" uid="115">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000304.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">라분</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="103" uid="113">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/215675a1e54853a3f26.10813644.png') }}">
                            <div class="progress"></div>
                            <div class="name">레이쥬</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="104" uid="135">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000231.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">레일리</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="105" uid="118">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000216.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">로브 루치</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="106" uid="126">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000269.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">로우</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="107" uid="122">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000286.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">루피JET개틀링</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="108" uid="104">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000245.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">루피 나이트메어</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="109" uid="123">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000281.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">마르코</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="110" uid="116">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/193415a1e547ac4a1c2.99022063.png') }}">
                            <div class="progress"></div>
                            <div class="name">바르톨로메오</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="111" uid="108">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000291.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">보아 핸콕</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="112" uid="119">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000246.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">상디</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="113" uid="111">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000255.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">샹크스</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="114" uid="110">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000273.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">센고쿠</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="115" uid="134">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/312215a1e5450ecb9e4.12149098.png') }}">
                            <div class="progress"></div>
                            <div class="name">슈가</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="116" uid="129">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000306.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">시저</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="117" uid="109">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000230.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">시키</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="118" uid="127">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000285.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">에이스</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="119" uid="128">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000277.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">제파</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="120" uid="133">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000560.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">제프</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="121" uid="117">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000248.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">조로</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="122" uid="124">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000267.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">징베</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="123" uid="105">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000251.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">쵸파 럼블볼 폭주</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="124" uid="114">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000227.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">카르가라</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="125" uid="120">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000481.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">코비</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="126" uid="132">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000292.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">쿠마</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="127" uid="121">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000509.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">후지토라</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="128" uid="112">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000283.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">흰수염</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="129" uid="125">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000228.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">히루루크</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="groupColumn" style="width: 14.1429%;">

            <div class="group">
                <div class="groupname">히든</div>
                <div class="itemlist">

                    <div class="item" uindex="130" uid="166">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000298.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">레드포스호</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="131" uid="148">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/288655a1e542e66e132.24115907.png') }}">
                            <div class="progress"></div>
                            <div class="name">레베카</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="132" uid="159">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000284.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">류마</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="133">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000271.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">마젤란 베놈데몬</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="134" uid="163">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000301.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">모비딕호</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="135" uid="155">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000266.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">미호크</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="136" uid="144">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000233.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">반더데켄</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="137" uid="164">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000246.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">발라티에</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="138" uid="165">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/bangzumaxim.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">방주맥심</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="139" uid="154">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000534.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">베르고</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="140" uid="158">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000234.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">봉쿠레</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="141" uid="147">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000561.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">사보</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="142" uid="160">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000321.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">시류</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="143" uid="162">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000372.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">써니호</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="144" uid="151">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000311.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">아오키지</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="145" uid="167">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/7395a1ea72c33a228.56058844.png') }}">
                            <div class="progress"></div>
                            <div class="name">아인</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="146" uid="150">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000276.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">아카이누</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="147" uid="145">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000380.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">이완코브</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="148" uid="153">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000220.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">카쿠</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="149" uid="149">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/coala.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">코알라</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="150" uid="152">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000278.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">키자루</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="151" uid="146">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000480.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">킨에몬</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="152" uid="156">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000260.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">킬러</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="153" uid="157">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000371.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">파이러츠 도킹6</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="154" uid="161">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/perona.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">페로나</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="155" uid="143">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000239.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">피셔타이거</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="groupColumn" style="width: 14.1429%;">

            <div class="group">
                <div class="groupname">초월함</div>
                <div class="itemlist">

                    <div class="item" uindex="156" uid="186">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000381.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">검은수염</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="157" uid="175">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000373.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">나미</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="158" uid="189">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000263.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">도플라밍고</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="159" uid="179">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000374.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">로빈</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="160" uid="188">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000463.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">로우</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="161" uid="173">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000377.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">루피</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="162" uid="181">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000376.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">브룩</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="163" uid="190">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000561.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">사보</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="164" uid="177">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000375.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">상디</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="165" uid="187">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000255.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">샹크스</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="166" uid="182">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000224.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">시라호시</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="167" uid="184">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000275.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">아오키지</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="168" uid="183">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000276.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">아카이누</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="169" uid="176">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000379.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">우솝</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="170" uid="174">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000378.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">조로</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="171" uid="178">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000250.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">쵸파</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="172" uid="185">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000278.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">키자루</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="173" uid="1">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000279.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">타시기</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="174" uid="180">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000253.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">프랑키</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="175" uid="191">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000509.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">후지토라</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="176" uid="3">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="http://home.sions.kr/skin/board/makeHelper/img/unkown.jpg">
                            <div class="progress"></div>
                            <div class="name">빅맘</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                </div>
            </div>
            <div class="group">
                <div class="groupname">변화</div>
                <div class="itemlist">

                    <div class="item" uindex="177" uid="141">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000263.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">도플라밍고</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="178" uid="138">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000265.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">모리아</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="179" uid="142">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000254.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">벤 베크만</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="180" uid="140">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/166525a1e5491732111.23960980.png') }}">
                            <div class="progress"></div>
                            <div class="name">비비</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="181" uid="137">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000285.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">에이스</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="182" uid="139">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000237.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">제파</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="183" uid="136">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000481.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">코비</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="groupColumn" style="width: 14.1429%;">

            <div class="group">
                <div class="groupname">불멸의</div>
                <div class="itemlist">

                    <div class="item" uindex="184" uid="195">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000479.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">거프</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="185" uid="198">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000230.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">금사자시키</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="186" uid="199">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000221.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">드래곤</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="187" uid="193">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000231.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">레일리</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="188" uid="192">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000229.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">로져</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="189" uid="197">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000273.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">센고쿠</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="190" uid="194">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000456.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">스코퍼가반</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="191" uid="200">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/297935a1ea71ea469a3.45650945.png') }}">
                            <div class="progress"></div>
                            <div class="name">제트</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="192" uid="196">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000283.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">흰수염</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                </div>
            </div>
            <div class="group">
                <div class="groupname">영원함</div>
                <div class="itemlist">

                    <div class="item" uindex="193" uid="207">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/240955a1ea69c5157e2.72898257.png') }}">
                            <div class="progress"></div>
                            <div class="name">미호크</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="194" uid="205">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000383.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">버기</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="195" uid="206">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/158065a1ea693997146.73355157.png') }}">
                            <div class="progress"></div>
                            <div class="name">비비</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="196" uid="203">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000382.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">스모커</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="197" uid="201">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000285.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">에이스</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="198" uid="204">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/277695a1ea689726c38.50157330.png') }}">
                            <div class="progress"></div>
                            <div class="name">카벤딧슈</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="199" uid="202">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000291.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">핸콕</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                </div>
            </div>
            <div class="group">
                <div class="groupname">제한됨</div>
                <div class="itemlist">

                    <div class="item" uindex="200" uid="210">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/13445a1ea681c439d4.59694809.png') }}">
                            <div class="progress"></div>
                            <div class="name">레드필드</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="201" uid="211">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/288655a1e542e66e132.24115907.png') }}">
                            <div class="progress"></div>
                            <div class="name">레베카</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="202" uid="208">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000225.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">에넬</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="203" uid="209">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/113155a1ea746a5fd19.27116175.png') }}">
                            <div class="progress"></div>
                            <div class="name">크로커다일</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                </div>
            </div>
            <div class="group">
                <div class="groupname">기타</div>
                <div class="itemlist">

                    <div class="item" uindex="204" uid="2">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/etc-wood') }}.jpg">
                            <div class="progress"></div>
                            <div class="name">나무</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="205" uid="1">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/token.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">토큰</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="206" uid="3">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/idontknow.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">세이브</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="207" uid="4">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/idontknow.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">확장팩</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="208" uid="28">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/zombie.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">좀비</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="209" uid="169">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000231.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">레일리</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="210" uid="170">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/hezuksun.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">해적선</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="211" uid="171">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/File00000292.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">쿠마</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                    <div class="item" uindex="212" uid="4">
                        <div class="namewrap">
                            <img class="thumb" onerror="JAVASCRIPT:UnkownImg(this)" src="{{ url('images/characters/littleoz.jpg') }}">
                            <div class="progress"></div>
                            <div class="name">거인족</div>
                        </div>
                        <div class="ibtns">
                            <div class="ibtn minus">-</div>
                            <div class="ibtn build">조합</div>
                            <div class="ibtn lock">락</div>
                        </div>
                        <input class="count" type="text" value="0">
                        <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop