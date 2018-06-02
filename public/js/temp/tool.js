let PRE_BUILD_ID = 0,
    LockItems = [],
    USE_ETC = true;

let RD = {
    log: function(cat, action, label, value) {
        let data = {};

        if (cat) {
            data.event_category = cat;
        }

        if (action) {
            data.event_action = action;
        }

        if (label) {
            data.event_label = label;
        }

        if (typeof(value) === 'number') {
            data.value = value;
        }
    }
};

$(() => {
    InitDetail();

    let mkh = $("#mkh");

    RD.log(document.title, 'fetch');

    mkh.css('display', 'block');

    InitTool();

    $(document).on('click', '#mkh .grouplist .groupColumn .group', e => {
        if ($(e.target).hasClass('groupname')) {
            if ($(this).hasClass('clps')) {
                $(this).removeClass('clps');
            } else {
                $(this).addClass('clps');
            }
        }
    });
});

function InitTool() {
    let column = createColumn(),
        unitsCount = 0;

    $.each($(GROUPS), (index, group) => {
        if (group.units.length != 0) {
            let groupDom = Template.rate();
            column.append(groupDom);
            groupDom.find('.groupname').text(group.name);

            let itemlist = groupDom.find('.itemlist'),
                itemVisibleCount = 0;

            $(group.units).each((index, unit) => {
                itemVisibleCount++;
                AddInitItem(itemlist, Unit.get(unit.id));
            });
        } else {
            column = createColumn();
        }
    });

    let columns = $('.groupColumn');
    columns.css('width', `${100 / columns.length}%`);
}

function AddInitItem(itemlist, item) {
    // 아이템 생성
    let itemDom = Template.unit();
    itemlist.append(itemDom);

    itemDom.find(".thumb").attr("src", THUMB_ROOT + item.image);
    itemDom.find(".name").text(item.name);
    itemDom.attr("uindex", ITEMS.indexOf(item));
    itemDom.attr("uid", item.id);

    // 아이템 속성추가
    item.html = itemDom;
    item.upperBuild = [];

    // 상위 조합
    $(ITEMS).each(function(i,it){
        for(var j=0; j<it.formulas.length; j++){
            var ritem = it.formulas[j][0];
            if(ritem == item){
                item.upperBuild.push(it);
            }
        }
    });

    // 계산
    item.calculate();

    // 이벤트
    function toggleLock(){
        var idx = LockItems.indexOf(item);
        if(idx != -1){
            LockItems[idx] = null;
        }
        else{
            var added = false;
            for(var i=0; i<LockItems.length; i++){
                if(!LockItems[i])
                {
                    LockItems[i] = item;
                    added = true;
                    break;
                }
            }
            if(!added)
                LockItems.push(item);
        }
        Unit.RefreshAll();
    }

    function build(){
        if(item.build(true))
        {
            Unit.RefreshAll();
        }
    }

    // 마우스를 클릭해서 아이템 갯수를 조절합니다.
    itemDom.find(".namewrap")
           .click(e => {
            if (e.shiftKey) {
                if (item.count > 0) {
                    item.SetCount(item.count - 1);
                    Unit.RefreshAll();
                }
            } else {
                item.SetCount(item.count + 1);
                Unit.RefreshAll();
            }

            e.preventDefault();
        })
        .on('contextmenu', function(e){
            // 마우스 오른쪽 버튼을 이용해서 아이템을 조합합니다.
            build();
            e.preventDefault();
        })
        .on('mousewheel MozMousePixelScroll', function(e) {
            // 마우스 휠을 이용해서 아이템의 갯수를 조절합니다.
            if (e.shiftKey || !!$("#isWheel").prop("checked"))
            {
                //증가 계산
                var delta = e.originalEvent.wheelDelta;
                if (!delta)
                    delta = -e.originalEvent.detail;

                item.SetCount(item.count + (delta > 0 ? 1 : -1));

                Unit.RefreshAll();
                e.preventDefault();
            }
        });

    // textField를 수정하여 갯수를 임의로 조절합니다.
    itemDom.find(".count").keyup(function(){
        var before = item.count;
        try{
            item.SetCount(parseInt($(this).val()));
        }catch(e){
            item.count = before;
        }
        Unit.RefreshAll();
    }).focusin(function(){
        $(this).select();
    }).on("contextmenu", function(e){
        toggleLock();
        e.preventDefault();
    });
    itemDom.find(".ibtn.lock").click(toggleLock);

    itemDom.find(".ibtn.minus").click(function(){
        item.SetCount(item.count - 1);
        Unit.RefreshAll();
    });
    itemDom.find(".ibtn.build").click(build);

    // 상세페이지
    itemDom.find(".detail").click(function(){
        ShowDetail(item);
    });
}
var isRecord = false;
var isRecordLowest = false;
var recorder = [];

///////////////////////////////////////////////////////////////////////////////////
//
//	 @Detail Window
//
///////////////////////////////////////////////////////////////////////////////////
var DETAIL_ITEM_TEMPLATE;
var DETAIL_ADS_TIME = 0;
var AD_DETAIL_RELASE_TIME = 60000;
var detailStack = [];
function InitDetail()
{
    $("#detail .close").click(function(){
        HideDetail();
    });

    $("#detail").click(function(e) {
        if (e.target == this) {
            HideDetail();
        }
    });

    $(document.body).keyup(function(e) {
        if(e.keyCode == 27 && $("#detail").is(":visible")) {
            HideDetail();
        }
    });

    var item = $("#detail .item");
    DETAIL_ITEM_TEMPLATE = item[0].outerHTML;
    item.remove();

    ReloadAds("fetch");
}
function ShowDetail(item){

    RD.log(document.title, "detail", item.name);

    detailStack.push(item);

    var detail = $("#detail");
    detail.show();

    detail.find(".title .name").text(item.ToString());
    detail.find(".descr").text(item.description);

    // 조합법
    var itemlist = detail.find(".itemlist.recipe");
    itemlist.html("");
    $(item.recipes).each(function(i, recipe){
        AddDetailItem(itemlist, recipe);
    });

    // 상위 조합법
    itemlist = detail.find(".itemlist.upper");
    itemlist.html("");
    $(item.upperBuild).each(function(i, iitem){
        AddDetailItem(itemlist, [iitem,1]);
    });

    // 최상위 조합법
    itemlist = detail.find(".itemlist.top");
    itemlist.html("");
    $(ITEMS).each(function(i,it){
        if(it !== item && it.upperBuild && it.upperBuild.length === 0)
        {
            it.PreBuild(true,true,true,true);
            if(item.preBuildID == PRE_BUILD_ID)
            {
                AddDetailItem(itemlist, [it,1]);
            }
        }
    });

    isRecord = true;
    {
        // 부족한 재료
        itemlist = detail.find(".itemlist.lack");
        itemlist.html("");
        recorder = [];
        item.PreBuild(true, true);
        CalculateRecorderData();
        $(recorder).each(function(i,it){
            AddDetailItem(itemlist, it);
        });
        // 하위 재료
        itemlist = detail.find(".itemlist.lowrecipe");
        itemlist.html("");
        recorder = [];
        item.PreBuild(true, true, true, true);
        CalculateRecorderData();
        $(recorder).each(function(i,it){
            AddDetailItem(itemlist, it);
        });

        // 최하위
        isRecordLowest = true;
        {
            // 부족한 재료
            itemlist = detail.find(".itemlist.lack-lowest");
            itemlist.html("");
            recorder = [];
            item.PreBuild(true, true);
            CalculateRecorderData();
            $(recorder).each(function(i,it){
                AddDetailItem(itemlist, it);
            });
            // 하위 재료
            itemlist = detail.find(".itemlist.lowrecipe-lowest");
            itemlist.html("");
            recorder = [];
            item.PreBuild(true, true, true, true);
            CalculateRecorderData();
            $(recorder).each(function(i,it){
                AddDetailItem(itemlist, it);
            });
        }
        isRecordLowest = false;
    }
    isRecord = false;

    // 광고 리로드
    if ((new Date() - DETAIL_ADS_TIME) > AD_DETAIL_RELASE_TIME) {
        ReloadAds(item.name);
    }
}
function CalculateRecorderData(){
    var newRec = [];
    for(var i=0; i<recorder.length; i++){
        var unitSet = newRec.find(function(a){return a[0]==recorder[i];});
        if(unitSet){
            unitSet[1]++;
        }else{
            newRec.push([recorder[i],1]);
        }
    }
    recorder = newRec;
}
function AddDetailItem(list, itemData)
{
    var item = itemData[0];
    var count = itemData[1];

    var dom = $(DETAIL_ITEM_TEMPLATE);
    list.append(dom);
    dom.data("item", item);

    //썸네일
    dom.find(".thumb").attr("src", THUMB_ROOT + item.img);

    //이름
    var name = item.ToString();
    if(count > 1)
        name += " x"+count;
    dom.find(".name").text(name);

    dom.click(function(){
        ShowDetail(item);
    });
}
function HideDetail(){
    var detail = $("#detail");
    detail.hide();

    detailStack.pop();
    var beforeItem = detailStack.pop();
    if(beforeItem)
    {
        ShowDetail(beforeItem);
    }
}
function ReloadAds(text)
{
    var ads = $("#ads");
    if(ads && ads.length > 0){
        ads.prop("src", DETAIL_ADS_PATH + "?name=" + text);
        DETAIL_ADS_TIME = +new Date();
    }
}
