var nikado_brandnumber = 6,
nikado_brandscrollnumber = 2,
nikado_brandpause = 3000,
nikado_brandanimate = 2000;
var nikado_brandscroll = false;
nikado_brandscroll = true;
var nikado_categoriesnumber = 6,
nikado_categoriesscrollnumber = 2,
nikado_categoriespause = 3000,
nikado_categoriesanimate = 2000;
var nikado_categoriesscroll = 'false';
var nikado_blogpause = 3000,
nikado_bloganimate = 2000;
var nikado_blogscroll = false;
nikado_blogscroll = false;
var nikado_testipause = 3000,
nikado_testianimate = 2000;
var nikado_testiscroll = false;
nikado_testiscroll = true;
var nikado_catenumber = 6,
nikado_catescrollnumber = 2,
nikado_catepause = 3000,
nikado_cateanimate = 700;
var nikado_catescroll = false;
var nikado_menu_number = 9;
var nikado_sticky_header = false;
nikado_sticky_header = true;
jQuery(document).ready(function(){
jQuery("#ws").focus(function(){
if(jQuery(this).val()=="Search product..."){
jQuery(this).val("");
}
});
jQuery("#ws").focusout(function(){
if(jQuery(this).val()==""){
jQuery(this).val("Search product...");
}
});
jQuery("#wsearchsubmit").click(function(){
if(jQuery("#ws").val()=="Search product..." || jQuery("#ws").val()==""){
jQuery("#ws").focus();
return false;
}
});
jQuery("#search_input").focus(function(){
if(jQuery(this).val()=="Search..."){
jQuery(this).val("");
}
});
jQuery("#search_input").focusout(function(){
if(jQuery(this).val()==""){
jQuery(this).val("Search...");
}
});
jQuery("#blogsearchsubmit").click(function(){
if(jQuery("#search_input").val()=="Search..." || jQuery("#search_input").val()==""){
jQuery("#search_input").focus();
return false;
}
});
});
