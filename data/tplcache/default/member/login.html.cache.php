<?php include $this->_include('header.html'); ?>
<script type="text/javascript">
$(function(){
	$('#tabbar').hide();
	$('.complete').on('click','#getsmscode',viewModel.getSmsCode);

	$('a#submit').click(function(){
        var posturl = window.location.href;
        var form_data = $("form#login_form").serializeObject();
        console.log(form_data);
        $.ajax(posturl, {
            type: 'POST',
            data: form_data,
            beforeSend:function(){
              $.showLoading();
            },
            success: function (resInfo) {
              $.hideLoading();
              console.log(resInfo);
              if(resInfo.code == 1) { 
                $.toast("登录成功");
                //window.location.href = resInfo.url;//跳转
                setTimeout("location.href='/';", 500);
              } else {
                $.alert(resInfo.msg);
              }
            }
        });
    });
});
</script>
<style type="text/css">
	.top_message{display: none}
</style>
<form  action="" method="post" id="login_form">
	<input style="display:none"><!-- for disable autocomplete on chrome -->
	<input type="hidden" class="button" value="登 录" name="submit">
	<input type="hidden" class="button" value="1" name="ajax">
	<input type="hidden" value="<?php echo $gobackurl; ?>" name="data[gobackurl]">
	<div class="hd">
		<h2 class="page_title"><img src="/assets/images/loginbg.png" class="logo"/></h2>
	</div>
	<div class="weui_cells weui_cells_form weui_cells_radio complete">
	    
		
		<div class="weui-row weui-no-gutter">
			<div class="weui-col-50">
				<label class="weui_cell weui_check_label" for="x11">
					<div class="weui_cell_bd weui_cell_primary">
						<p>我是居民</p>
					</div>
					<div class="weui_cell_ft">
						<input type="radio" name="data[modelid]" class="weui_check" value="5" id="x11"  checked="checked">
						<span class="weui_icon_checked"></span>
					</div>
				</label>
			</div>
			<div class="weui-col-50">
				<label class="weui_cell weui_check_label" for="x12">

					<div class="weui_cell_bd weui_cell_primary">
						<p>我是医生</p>
					</div>
					<div class="weui_cell_ft">
						<input type="radio" name="data[modelid]" class="weui_check" value="7" id="x12">
						<span class="weui_icon_checked"></span>
					</div>
				</label>
			</div>
		</div>


	    <div class="weui_cell weui_vcode">
	        <div class="weui_cell_bd weui_vcode weui_cell_primary">
	            <input class="weui_input" type="tel" name="data[phone]" id="phone" placeholder="请输入手机号">
	        </div>
	        <div class="weui_cell_ft">
	        	<a class="weui_btn weui_btn_default" href="javascript:" id="getsmscode">获取验证码</a>
	        </div>
	    </div>
	    <!--div class="weui_cell">
	        <div class="weui_cell_bd weui_cell_primary">
	            <input class="weui_input" type="password" name="data[password]" placeholder="请输入登录密码" autocomplete="off">
	        </div>
	    </div-->

	    <?php if ($config['member_logincode']) { ?>
	    <div class="weui_cell">
	        <div class="weui_cell_bd weui_vcode weui_cell_primary">
	            <input class="weui_input" type="text" name="code" id="smscode" placeholder="请输入验证码">
	        </div>
	        <!--div class="weui_cell_ft">
	        	<img id="code" src="../index.php?c=api&a=checkcode&width=100&height=30" align="absmiddle" title="看不清楚？换一张" onclick="document.getElementById('code').src='../index.php?c=api&a=checkcode&width=100&height=30&'+Math.random();" style="cursor:pointer;">
	        </div-->
	    </div>
	    <?php } ?>

	    <div class="weui_cell weui_cell_switch">
	        <div class="weui_cell_ft weui_cell_hd">
	            <input class="weui_switch" type="checkbox" checked style="zoom: 0.7;">
	        </div>
	        <div class="weui_cell_hd weui_cell_primary">
	        	<p class="text-sm color-gray">&nbsp;&nbsp;勾选代表您同意《<a href="<?php echo $cats[14][url]; ?>">村医对口帮扶协议</a>》</p>
	        </div>
	    </div>
	</div>

	<div class="weui_btn_area">
	    <a class="weui_btn weui_btn_primary" id="submit">登录</a>
	    <!--a class="weui_btn weui_btn_default" href="<?php echo url('register'); ?>">注册新会员</a-->
	</div>
</form>
<?php include $this->_include('footer.html'); ?>