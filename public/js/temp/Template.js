class Template {
    static unit() {
        return $(`
            <div class="item" uindex="0" uid="0">
                <div class="namewrap">
                    <img class="thumb">
                    <div class="progress"></div>
                    <div class="name">이름</div>
                </div>
                <div class="ibtns">
                    <div class="ibtn build">조합</div>
                    <div class="ibtn lock">락</div>
                </div>
                <input class="count" type="text" value="0">
                <img class="detail" src="http://home.sions.kr/skin/board/makeHelper/img/information_def.png">
            </div>
        `);
    }

    static rate() {
        return $(`
            <div class="group">
                <div class="groupname">이름</div>
                <div class="itemlist"></div>
            </div>   
        `);
    }

    static column() {
        return $(`<div class="groupColumn"></div>`);
    }
}
