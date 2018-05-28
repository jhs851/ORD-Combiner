var ITEM_TEMPLATE;
var RECIPE_TEMPLATE;
var GROUP_TEMPLATE;

//------------------------------------------------------------
//  Common
//------------------------------------------------------------

// initialize
$(window).ready(function()
{
    Item.Init();
    Group.Init();

    // 초기화
    $("#mk").show();
    LoadFromWrContent();
});
function LoadFromWrContent()
{
    var obj = $.parseJSON($("#wr_content_json").text());
    if(obj)
    {
        Reference = obj.reference || [];
        console.log(Reference);

        $("#mk_top .descr").text(obj.descr);

        $(obj.groups).each(function(i,group){
            Group.AddGroup(group);
        });
        $(obj.groups).each(function(i,groupData){
            $(groupData.items).each(function(ii, itemData){
                var item = GetItem(itemData.id);
                $(itemData.recipes).each(function(iii, recipeData){
                    var recipe = GetItem(recipeData[0]);
                    item.recipes.push([recipe, recipeData[1]]);
                });
                item.InitRecipes();
            });
        });

        var url = location.pathname + location.search;
        var replaceTarget = "";
        {
            var args = location.search.split('&');
            $(args).each(function(i,arg){
                if(arg[0] === '?')
                    arg = arg.substr(1);
                if(!arg)
                    return;
                if(arg.startsWith("wr_id="))
                {
                    replaceTarget = arg;
                    return false;
                }
            });
        }
        if(replaceTarget)
        {
            var reflist = $("#mk_references");
            reflist.show();
            $(Reference).each(function(i,ref){
                var anchor = $("<a></a>");
                reflist.append(anchor);

                anchor.text(ref.title);
                anchor.attr("href", url.replace(replaceTarget, "wr_id="+ref.id));
            });
        }
    }
}

//------------------------------------------------------------
//  GROUP
//------------------------------------------------------------
Group.Init = function()
{
    //-- 그룹 템플릿 만들기
    var item = $("#mk .group");
    GROUP_TEMPLATE = item[0].outerHTML;
    item.remove();
};
Group.prototype.Init = function(data){
    var self = this;

    this.dom.find(".groupname .name").text(this.name);

    // 폴더 여닫
    this.dom.find(".title").click(function(){
        var folderlist = self.dom.find(".folderlist");
        if(folderlist.is(":visible"))
            folderlist.hide();
        else
            folderlist.show();
    });

    // 아이템 목록 구성
    if(data.items)
    {
        $(data.items).each(function(i,itemData){
            self.AddItem(itemData);
        });
    }

    // 목록에 아무것도 없다면 목록을 안보이게한다.
    if(this.dom.find(".itemlist .item.visible").length == 0)
    {
        this.dom.hide();
    }
};
Group.prototype.SortItems = function(){
    var itemlist = this.dom.find(".itemlist");
    $(this.items).each(function(i,item){
        itemlist.append(item.dom);
    });
};
Group.prototype.AddItem = function(data){
    data.group = this;
    var dom = $(ITEM_TEMPLATE);
    this.dom.find(".itemlist").append(dom);

    var item = new Item(dom, data);
    this.items.push(item);
    ITEMS.push(item);
    return item;
};

//------------------------------------------------------------
//  ITEM
//------------------------------------------------------------

Item.Init = function()
{
    //-- 레시피 템플릿 만들기
    item = $("#mk .group .item .rItem");
    RECIPE_TEMPLATE = item[0].outerHTML;
//  <div class="rItem">
//      <img class="rThumb" src="/data/file/mk_helper_thumb/1/ord/wisp.jpg" onerror="JAVASCRIPT:UnkownImg(this)">
//      <div class="rName">위습-흔함</div>
//  </div>

    item.remove();

    //-- 아이템 템플릿 만들기
    var item = $("#mk .group .item");
    ITEM_TEMPLATE = item[0].outerHTML;
//  <div class="item visible">
//      <div class="name">위습</div>
//      <div class="recipes"></div>
//      <div style="clear:both"></div>
//  </div>
    item.remove();
};
// initialize
Item.prototype.Init = function(data)
{
    var self = this;
    var dom = this.dom;

    dom.find(".name").text(this.name);
    dom.find(".thumb img").attr("src", THUMB_ROOT + this.img);

    if(this.hide){
        dom.hide();
    }else{
        dom.addClass("visible");
    }
};
// initialize
Item.prototype.InitRecipes = function(data)
{
    var recipesDom = this.dom.find(".recipes");
    $(this.recipes).each(function(i,r){
        var rdom = $(RECIPE_TEMPLATE);
        recipesDom.append(rdom);

        var name = r[0].ToString();
        if(r[1] > 1)
            name += "x"+r[1];

        rdom.find(".rThumb").attr("src", THUMB_ROOT + r[0].img);
        rdom.find(".rName").text(name);
    });
};
