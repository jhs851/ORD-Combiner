var initDate = new Date();

var COLUMN_TEMPLATE;
var GROUP_TEMPLATE;
var ITEM_TEMPLATE;
var PRE_BUILD_ID = 0;
var LockItems = [];
var USE_ETC = true;
var ZOOM = 1;

var RD = {
    log : function(cat, action, label, value){
        var data = {};
        if(cat) data.event_category = cat;
        if(action) data.event_action = action;
        if(label) data.event_label = label;
        if(typeof(value) === 'number') data.value = value;

        gtag("event", "makeHelper", data);
    }
};

$(window).ready(function()
{
    // Make Template
    var columntemplate = $("#mkh .groupColumn");
    var grouptemplate = columntemplate.find(".group");
    var itemtemplate = grouptemplate.find(".item");


    ITEM_TEMPLATE = itemtemplate[0].outerHTML;
    itemtemplate.remove();

    GROUP_TEMPLATE = grouptemplate[0].outerHTML;
    grouptemplate.remove();

    COLUMN_TEMPLATE = columntemplate[0].outerHTML;
    columntemplate.remove();

    InitDetail();

    // add Open Event
    var mkh = $("#mkh");
    var mkh_btn = $("#mk_top .mkh_open_btn");
    mkh_btn.click(function(){
        try{
            if(new Date() - initDate > 1000)
            {
                RD.log(document.title, "init");

                mkh.css("display", "block");
                $(document.body).append(mkh);
                $(document.body).css("background", mkh.css("background"));
                $(document.body).children().each(function(i,c){
                    if(c != mkh[0]){
                        $(c).remove();
                    }
                });

                InitTool();
            }
            else
            {
                if(!window.IsRequestMkOpen)
                {
                    window.IsRequestMkOpen = true;
                    setTimeout(function(){mkh_btn.click();}, 1000);
                }
            }
        }catch(e)
        {
            console.log(e);
            alert(e);
        }
    });

    $(document).on("click", "#mkh .grouplist .groupColumn .group", function(e){
        if($(e.target).hasClass("groupname"))
        {
            if($(this).hasClass("clps")){
                $(this).removeClass("clps");
            }else{
                $(this).addClass("clps");
            }
        }
    });
    //setTimeout(function(){mkh_btn.click();}, 100);
});

function NewColumn()
{
    var column = $(COLUMN_TEMPLATE);
    $("#mkh .grouplist").append(column);
    return column;
}
function InitTool()
{
    var column = NewColumn();
    {
        var groupDom = $(GROUP_TEMPLATE);
        column.append(groupDom);
        groupDom.find(".groupname").text("옵션");

        var itemlist = groupDom.find(".itemlist");
        var mkoption = $("#mkoption");
        mkoption.removeClass("hide");
        itemlist.append(mkoption);

        mkoption.find("#option_build_etc").change(function(){
            USE_ETC = $(this).prop("checked");
            Item.RefreshAll();
        });
        mkoption.find(".zoomin").click(function(){
            if(ZOOM < 2)
                ZOOM += 0.1;
            $(document.body).css('zoom', ZOOM);
        });
        mkoption.find(".zoomout").click(function(){
            if(ZOOM > 0.5)
                ZOOM -= 0.1;
            $(document.body).css('zoom', ZOOM);
        });
        mkoption.find(".zoomreset").click(function(){
            ZOOM =1;
            $(document.body).css('zoom', ZOOM);
        });
    }

    var columnDirty = false;
    $(GROUPS).each(function(i,group){
        if(group)
        {
            // 아이템이 있다면 목록을 표시한다.
            if(group.items.length != 0)
            {
                // 그룹생성
                var groupDom = $(GROUP_TEMPLATE);
                column.append(groupDom);
                groupDom.find(".groupname").text(group.name);

                var itemlist = groupDom.find(".itemlist");
                var itemVisibleCount = 0;
                $(group.items).each(function(j,item)
                {
                    if(!item.hide)
                    {
                        itemVisibleCount ++;
                        AddInitItem(itemlist, item);
                    }
                });

                // 비어있는 그룹 가리기
                if(itemVisibleCount == 0)
                {
                    groupDom.remove();
                }
                else
                {
                    columnDirty = true;
                }
            }
            // 아이템이 없다면 단을 나누는 요소가 된다.
            else
            {
                column = NewColumn();
            }
        }
    });

    if(!columnDirty)
    {
        column.remove();
    }

    var columns = $(".groupColumn");
    columns.css("width", (99/columns.length)+"%");
}
function AddInitItem(itemlist, item)
{
    // 아이템 생성
    var itemDom = $(ITEM_TEMPLATE);
    itemlist.append(itemDom);

    itemDom.find(".thumb").attr("src", THUMB_ROOT + item.img);
    itemDom.find(".name").text(item.name);
    itemDom.attr("uindex", ITEMS.indexOf(item));
    itemDom.attr("uid", item.id);

    // 아이템 속성추가
    item.dom = itemDom;
    item.upperBuild = [];

    // 상위 조합
    $(ITEMS).each(function(i,it){
        for(var j=0; j<it.recipes.length; j++){
            var ritem = it.recipes[j][0];
            if(ritem == item){
                item.upperBuild.push(it);
            }
        }
    });

    // 계산
    item.CalcBuildScore();

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
        Item.RefreshAll();
    }
    function build(){
        if(item.Build(true))
        {
            Item.RefreshAll();
        }
    }

    // 마우스를 클릭해서 아이템 갯수를 조절합니다.
    itemDom.find(".namewrap").click(function(e)
           {
               if(e.shiftKey)
               {
                   if(item.count > 0)
                   {
                       item.SetCount(item.count - 1);
                       Item.RefreshAll();
                   }
               }
               else{
                   item.SetCount(item.count + 1);
                   Item.RefreshAll();
               }
               e.preventDefault();
           })
           // 마우스 오른쪽 버튼을 이용해서 아이템을 조합합니다.
           .on("contextmenu",function(e){
               build();
               e.preventDefault();
           })
           // 마우스 휠을 이용해서 아이템의 갯수를 조절합니다.
           .on("mousewheel MozMousePixelScroll", function(e) {
               if (e.shiftKey || !!$("#isWheel").prop("checked"))
               {
                   //증가 계산
                   var delta = e.originalEvent.wheelDelta;
                   if (!delta)
                       delta = -e.originalEvent.detail;

                   item.SetCount(item.count + (delta > 0 ? 1 : -1));

                   Item.RefreshAll();
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
        Item.RefreshAll();
    }).focusin(function(){
        $(this).select();
    }).on("contextmenu", function(e){
        toggleLock();
        e.preventDefault();
    });
    itemDom.find(".ibtn.lock").click(toggleLock);

    itemDom.find(".ibtn.minus").click(function(){
        item.SetCount(item.count - 1);
        Item.RefreshAll();
    });
    itemDom.find(".ibtn.build").click(build);

    // 상세페이지
    itemDom.find(".detail").click(function(){
        ShowDetail(item);
    });
}


///////////////////////////////////////////////////////////////////////////////////
//
//	 @ITEM
//
///////////////////////////////////////////////////////////////////////////////////

Item.prototype.count = 0;
Item.prototype.buildScore = 0;
Item.prototype.etcBuildScore = 0;
Item.prototype.preCount = 0;
Item.prototype.preBuildWarn = 0;
Item.prototype.preBuildID = 0;
Item.prototype.GetBuildScore = function()
{
    return USE_ETC ? this.buildScore : this.buildScore-this.etcBuildScore;
}
Item.prototype.SetCount = function(count)
{
    if(!isNaN(count)){
        if(count < 0)
            this.count = 0
        else
            this.count = count;
    }
}

/*
 해당 아이템의 완성도를 화면에 표시하도록 도와줍니다.
 화면에 해당하는 모든 ui 리프레시를 담당합니다.
 */
Item.prototype.Refresh = function()
{
    var name = this.dom.find(".name");
    var cnt = this.dom.find(".count");
    var prg = this.dom.find(".progress");

    // change count
    cnt.val(this.count);

    // change percent
    var preBuild = this.PreBuild(true,true);
    var currScore = preBuild.score;
    var maxScore = this.buildScore;
    if(!USE_ETC){
        currScore -= this.etcBuildScore;
        maxScore -= this.etcBuildScore;
    }
    var percent = Math.round(Math.min(currScore/maxScore, 1) * 100);

    prg.css("width", percent +"%");

    // change name
    if(percent == 100){
        // 만들 수 있는 갯수 계산
        var makeCount = 1;
        if(USE_ETC || !this.etc){
            for(var i=0; i<100; i++)
            {
                if(this.PreBuild(false,true).score == this.buildScore)
                    makeCount ++;
                else
                    break;
            }
        }

        // 이름 지정
        if(makeCount == 1)
            name.text(this.name);
        else
            name.text("("+makeCount+") "+this.name);

        // class 추가
        this.dom.addClass("success");
        if(preBuild.warn)
            this.dom.addClass("warn");
        else
            this.dom.removeClass("warn");
    }
    else if(percent > 0){
        name.text(percent+"% "+this.name);
        this.dom.removeClass("warn");
        this.dom.removeClass("success");
    }else{
        name.text(this.name);
        this.dom.removeClass("warn");
        this.dom.removeClass("success");
    }

    // lock Item
    if(LockItems.indexOf(this) != -1){
        cnt.addClass("lock");
    }else{
        cnt.removeClass("lock");
    }
}
// 아이템을 만들기 위해서 필요한 갯수(수량)값을 계산하여 반환합니다.
Item.prototype.CalcBuildScore = function(noneEtc)
{
    if(!this.buildScore)
    {
        //하위 조합법이 있을경우 계산을 시작한다.
        if(this.recipes && this.recipes.length)
        {
            for(var i=0; i<this.recipes.length; i++)
            {
                var recipe = this.recipes[i];
                recipe[0].CalcBuildScore();
                this.buildScore += (recipe[0].buildScore * recipe[1]);
                if(recipe[0].etc){
                    this.etcBuildScore += (recipe[0].buildScore * recipe[1]);
                }else{
                    this.etcBuildScore += (recipe[0].etcBuildScore * recipe[1]);
                }
            }
        }
        else
        {
            this.buildScore = 1;
            if(this.etc){
                this.etcBuildScore = 1;
            }
        }
        console.log(this.name, this.etcBuildScore);
    }
    return this.buildScore;
}
/*
 빌드가 가능한지에 대해서 먼저 시험해봅니다.
 빌드가 가능할경우 buildScore를 리턴하며, 빌드가 불가능할경우 그 아래의 숫자를 리턴합니다.
 쉇자와 함께 경고를 리턴합니다.
 */
Item.prototype.Build = function(newBuild)
{
    if(newBuild)
    {
        var result = this.PreBuild(true,true);
        if(result.score != this.buildScore)
        {
            console.log("Can not make "+this.name+". because not passed Pre build");
            return false;
        }
    }

    RD.log(document.title, "build", this.name);

    if(!newBuild && this.count > 0)
    {
        this.SetCount(this.count - 1);
    }
    else
    {
        if(this.recipes && this.recipes.length)
        {
            for(var j=0; j<this.recipes.length; j++)
            {
                var recipe = this.recipes[j];
                for(var i=0; i<recipe[1]; i++)
                {
                    recipe[0].Build();
                }
            }
        }
    }

    if(newBuild)
    {
        this.SetCount(this.count + 1);
        return true;
    }
}
var isRecord = false;
var isRecordLowest = false;
var recorder = [];
/*
 빌드가 가능한지에 대해서 먼저 시험해봅니다.
 빌드가 가능할경우 buildScore를 리턴하며, 빌드가 불가능할경우 그 아래의 숫자를 리턴합니다.
 쉇자와 함께 경고를 리턴합니다.

 skipCount: 현재 제작할 수 있는 갯수가 충분하더라도 갯수를 감소시키지 않고 조합만 한다. 제작할때 자신의 갯수를 감소시키지 않기위해 사용
 skipLocks: 락을 제외한 체로 조합가능성을 따진다. (최상위 조합법을 판별하기위함)
 absMake  : 갯수검사를 하지않고 조합만으로 제작여부를 판별한다 (최상위 조합법을 판별하기 위함)
 */
Item.prototype.PreBuild = function(newBuild, skipCount, skipLocks, absMake)
{
    if(newBuild)
    {
        PRE_BUILD_ID++;

        if(!skipLocks)
        {
            var self = this;
            for(var i=0; i<LockItems.length; i++)
            {
                var litem = LockItems[i];
                if(litem && self != litem)
                {
                    litem.PreBuild(false, true);
                }
            }
        }
    }

    //초기화
    if(this.preBuildID != PRE_BUILD_ID)
    {
        this.preBuildID = PRE_BUILD_ID;
        this.preCount = this.count;
    }

    if(!newBuild && !USE_ETC && this.etc)
    {
        return {
            score: this.buildScore,
            warn: false
        };
    }

    if(!absMake && !skipCount && this.preCount > 0)
    {
        this.preCount --;
        return {
            score: this.buildScore,
            warn: false
        };
    }
    else
    {
        var result = {};
        var addRecord = false;

        // 기록모드이면서 최하유닛이라면 기록한다.
        if(isRecord && !newBuild && this.lowest)
        {
            addRecord = true;
        }
        else if(this.recipes && this.recipes.length)
        {
            var buildScore = 0;
            var warn = (!newBuild && this.warn); // 자기 자신을 만드는데 warning은 필요없음
            var recorderSize = recorder.length;

            for(var j=0; j<this.recipes.length; j++)
            {
                var recipe = this.recipes[j];
                for(var i=0; i<recipe[1]; i++)
                {
                    var result = recipe[0].PreBuild(false, false, false, absMake);

                    buildScore += result.score;
                    warn |= result.warn;
                }
            }

            // 제작할 수 없는경우, 이 유닛이 경고유닛이라면 레코드한다. (단, 하위 조합의 레코드를 제거한다)
            if(isRecord && !newBuild && buildScore < this.buildScore && (!isRecordLowest && this.warn))
            {
                /*
                 for(var i=recorderSize; i<recorder.length; i++)
                 {
                 recorder[i].preCount++;
                 }*/

                recorder = recorder.slice(0,recorderSize);
                addRecord = true;
            }
            else
            {
                result = {
                    score: buildScore,
                    warn: warn
                };
            }
        }
        else
        {
            // 재료도 부족한데 레시피도 없는대상이라면 당연히 기록해야죠 // 최하위라는 증거
            if(isRecord && !newBuild)
            {
                addRecord = true;
            }
            else
            {
                result = {
                    score: 0,
                    warn: false
                };
            }
        }

        if(addRecord)
        {
            //var self = this;
            recorder.push(this);
            /*
             var result = recorder.find(function(v){ return v[0] == self; });
             if(result)
             result[1]++;
             else
             recorder.push([this, 1]);*/

            result = {
                score: 0,
                warn: false
            };
        }
        return result;
    }
}
/*
 갯수의 변동(클릭,숫자입력 등으로 아이템의 갯수가 변경)이 있을때 호출되며
 모든 아이템의 제작 완료도 등을 다시 계산하게합니다.
 */
Item.RefreshAll = function()
{
    $(ITEMS).each(function(i,item)
    {
        if(!item.hide)
        {
            item.Refresh();
        }
    });
}




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
    $("#detail").click(function(e){
        if(e.target == this)
        {
            HideDetail();
        }
    });
    $(document.body).keyup(function(e){
        if(e.keyCode == 27 && $("#detail").is(":visible"))
        {
            HideDetail();
        }
    });

    var item = $("#detail .item");
    DETAIL_ITEM_TEMPLATE = item[0].outerHTML;
    item.remove();

    ReloadAds("init");
}
function ShowDetail(item){

    RD.log(document.title, "detail", item.name);

    detailStack.push(item);

    var detail = $("#detail");
    detail.show();

    detail.find(".title .name").text(item.ToString());
    detail.find(".descr").text(item.descr);

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











