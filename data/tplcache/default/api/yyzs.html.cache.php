<?php include $this->_include('header.html'); ?>
<script> 
$(function(){
	viewModel.loadyyzscat(184);//初始化
});
</script>
<div class="bd">
    <div class="weui_search_bar" id="search_bar">
        <form class="weui_search_outer">
            <div class="weui_search_inner">
                <i class="weui_icon_search"></i>
                <input type="search" class="weui_search_input" id="search_input" placeholder="请您输入您要想了解的资讯" required="">
                <a href="javascript:" class="weui_icon_clear" id="search_clear"></a>
            </div>
            <!--label for="search_input" class="weui_search_text" id="search_text">
                <i class="weui_icon_search"></i>
                <span>请您输入您要想了解的资讯</span>
            </label-->
        </form>
        <a href="javascript:" class="weui_search_cancel" id="search_cancel">取消</a>
    </div>
</div>

<div class="weui_tab">
    <div class="weui_navbar" id="yyzs_nav">
        <a href="javascript:;" class="weui_navbar_item weui_bar_item_on" data-id="184">
            中药
        </a>
        <a href="javascript:;" class="weui_navbar_item" data-id="1">
            西药
        </a>
        <a href="javascript:;" class="weui_navbar_item" data-id="666">
            基药目录
        </a>
    </div>
    <div class="weui_tab_bd">
        <div class="weui_cells weui_cells_access nomtop" id="cat_list"></div>
    </div>
</div>

<script id="cat_list_tmpl" type="text/x-jquery-tmpl"> 
    <a class="weui_cell" href="/?c=api&a=yyzslist&cid=${id}" data-id="${id}">
        <div class="weui_cell_bd weui_cell_primary">
            <p>${name}</p>
        </div>
        <div class="weui_cell_ft"></div>
    </a>
</script>

<script id="cat_list_no_tmpl" type="text/x-jquery-tmpl"> 
    <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
            <p>${name}</p>
        </div>
        <div class="weui_cell_ft"></div>
    </div>
</script>




<?php include $this->_include('footer.html'); ?>