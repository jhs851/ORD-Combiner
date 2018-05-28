//------------------------------------------------------------
//  Common
//------------------------------------------------------------
var GROUPS = [];
var ITEMS = [];
var THUMB_ROOT = "/data/file/mk_helper_thumb/";
var Reference = [];

function GetGroup(id) {
    var result = null;
    $(GROUPS).each(function(i,n){
        if(n && n.id == id){
            result = n;
            return false;
        }
    });
    return result;
}
function GetItem(id) {
    var result = null;
    $(ITEMS).each(function(i,n){
        if(n && n.id == id){
            result = n;
            return false;
        }
    });
    return result;
}

//------------------------------------------------------------
//  GROUP
//------------------------------------------------------------
function Group(dom, data)
{
    this.dom = dom;

    // variables
    this.id = data.id;
    this.name = data.name || "";
    this.items = [];

    this.Init(data);
}
Group.prototype.Init = function(data){};
Group.prototype.AddItem = function(data){};
Group.prototype.Remove = function(){};

//------------------------------------------------------------
//  GROUP STATIC
//------------------------------------------------------------
Group.Init = function(){}
Group.AddGroup = function(data)
{
    if(!data)
        data = { id: GENERATE_GROUP_ID++, name:"" };

    var dom = $(GROUP_TEMPLATE);
    $("#mk .grouplist").append(dom);

    var group = new Group(dom, data);
    GROUPS.push(group);
    return group;
};
Group.Sort = function()
{
    var grouplist = $("#mk .grouplist");
    $(GROUPS).each(function(i,g){
        grouplist.append(g.dom);
    });
};

//------------------------------------------------------------
//  ITEM
//------------------------------------------------------------
function Item(dom, data)
{
    this.dom = dom;

    // variables
    this.id = data.id;
    this.group = data.group;
    this.name = data.name || "";
    this.descr = data.descr || "";
    this.img = data.img || "";
    this.warn = data.warn || false;
    this.etc = data.etc || false;
    this.hide = data.hide || false;
    this.lowest = data.lowest || false;
    this.recipes = [];

    this.Init(data);
}
Item.prototype.Init = function(data){};
Item.prototype.ToString = function()
{
    if(this.group)
    {
        return this.name+"-"+this.group.name;
    }
    else
    {
        return this.name;
    }
};
Item.prototype.InitRecipes = function(){}
//------------------------------------------------------------
//  ITEM STATIC
//------------------------------------------------------------
Item.Init = function(){};









// Safari 3.0+ "[object HTMLElementConstructor]"
var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification));
if(isSafari){
    alert("조합기 기능은 사파리에서 정상적으로 동작하지 않거나 느리게 작동할 수 있습니다. 크롬, 파이어폭스 등의 브라우저를 이용해주시기 바랍니다.");
}

// Internet Explorer 6-11
var isIE = /*@cc_on!@*/false || !!document.documentMode;
if(isIE){
    alert("조합기 기능은 인터넷 익스프로러에서 정상적으로 동작하지 않거나 느리게 작동할 수 있습니다. 크롬, 파이어폭스, 엣지 등의 브라우저를 이용해주시기 바랍니다.");
}

//------------------------------------------------------------
//  EXTENSION
//------------------------------------------------------------
if(!"".startsWith){
    String.prototype.startsWith = function(val){
        for(var i=0; i<this.length; i++)
        {
            if(this[i] !== val[i])
                return false;
        }
        return true;
    }
}
if(![].find)
{
    Array.prototype.find = function(func){
        for(var i=0; i<this.length; i++)
        {
            var rs = func(this[i]);
            if(rs === true)
            {
                return this[i];
            }
        }
    }
}