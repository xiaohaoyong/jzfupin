<?php include $this->_include('header.html'); ?>
<script src="/assets/lib/webuploader/webuploader.nolog.min.js"></script>
<script src="/assets/lib/webuploader/upload.js"></script>
<script type="text/javascript">
    $(function(){
        $("#date").calendar({
            //value: ['1984-12-12'],
            minDate: '1900-12-12'
        });
        webUploadH5($('#avatarImages .fileList'),$('#avatarImages .filePicker'),'data[avatar]',false);
        webUploadH5($('#uplodImages .fileList'),$('#uplodImages .filePicker'),'data[images][]',true);
    });

	function checkpass() {
		var pass1 = $('#password').val();
		var pass2 = $('#password2').val();
		if (pass1 != pass2) {
			$('#checkpassword2').html('<span>两次密码不一致</span>');
			$('#password').focus();
			return false;
		} else {
		    $('#checkpassword2').html('<span>正确</span>');
		}
	}
</script>

<div class="complete">
    <form action="" method="post">
    <input type="hidden" value="保 存" name="submit">
    <div class="weui_cells weui_cells_access weui_cells_form">
        <?php if (count($member_model)>1) { ?>            
        <div class="weui_cell weui_cell_select weui_select_after">
            <div class="weui_cell_hd">
                <label for="" class="weui_label">类型</label>
            </div>
            <div class="weui_cell_bd weui_cell_primary">
                <select class="weui_select" name="data[modelid]">
                    <?php if (is_array($member_model))  foreach ($member_model as $t) { ?>
                    	<option value="1"<?php if ($member_default_modelid==$t['modelid']) { ?> selected<?php } ?>><?php echo $t['modelname']; ?></option>
                    <?php  } ?>
                </select>
            </div>
        </div>
        <?php } ?>
        <div class="weui_cell">
            <div class="weui_cell_hd weui_cell_primary"><label class="weui_label">头像</label></div>
            <div class="upload-avatar">
                <div class="weui_uploader_bd" id="avatarImages">
                    <ul class="weui_uploader_files fileList">
                        <li class="weui_uploader_file" style="background-image:url(/assets/images/avatar.png)">
                            <input type="hidden" name="data[avatar]" value="<?php echo $member[avatar]; ?>" />
                        </li>
                    </ul>
                    <div class="weui_uploader_input_wrp filePicker"> </div>
                </div>
            </div>
            <div class="weui_cell_ft"></div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">姓名</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" name="data[name]" value="<?php echo $member[name]; ?>" placeholder="请输入姓名">
            </div>
        </div>

        <div class="weui_cell weui_cell_select weui_select_after">
            <div class="weui_cell_hd">
                <label for="" class="weui_label">性别</label>
            </div>
            <div class="weui_cell_bd weui_cell_primary">
                <select class="weui_select" name="data[sex]">
                    <option value="1"<?php if ($member[sex] == 1) { ?> selected<?php } ?>>男</option>
                    <option value="2"<?php if ($member[sex] == 2) { ?> selected<?php } ?>>女</option>
                </select>
            </div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">手机号</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" type="tel" name="data[phone]" value="<?php echo $member[phone]; ?>" placeholder="请输入手机号">
            </div>
        </div>
                <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">身份证</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" type="text" name="data[cardid]" value="<?php echo $member[cardid]; ?>" placeholder="请输入身份证">
            </div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_hd"><label for="date" class="weui_label">出生日期</label></div>
            <div class="weui_cell_bd weui_cell_primary">
              <input class="weui_input" id="date" name="data[brithday]" type="text" value="<?php echo $member[brithday]; ?>" placeholder="请选择您的出生日期" readonly="">
            </div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">专长疾病</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" name="data[good]" value="<?php echo $member[good]; ?>" placeholder="请输入专长疾病">
            </div>
        </div>
        <?php if ($config['member_logincode']) { ?>
	    <div class="weui_cell weui_vcode">
	        <div class="weui_cell_hd">
                <label for="" class="weui_label">验证码</label>
            </div>
	        <div class="weui_cell_bd weui_vcode weui_cell_primary">
	            <input class="weui_input" type="text" name="code" placeholder="请输入验证码">
	        </div>
	        <div class="weui_cell_ft">
	        	<img id="code" src="../index.php?c=api&a=checkcode&width=100&height=30" align="absmiddle" title="看不清楚？换一张" onclick="document.getElementById('code').src='../index.php?c=api&a=checkcode&width=100&height=30&'+Math.random();" style="cursor:pointer; margin-top:-3px;">
	        </div>
	    </div>
	    <?php } ?>
    </div>
    <div class="weui_cells_title">医生简介</div>
    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <textarea class="weui_textarea" placeholder="请输入医生简介" name="data[info]" rows="3"><?php echo $member[info]; ?></textarea>
            </div>
        </div>
    </div>
    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <div class="weui_uploader">
                    <div class="weui_uploader_hd weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">证书上传</div>
                    </div>
                    <div class="weui_uploader_bd" id="uplodImages">
                        <ul class="weui_uploader_files fileList"></ul>
                        <div class="weui_uploader_input_wrp filePicker"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="weui_btn_area">
        <button class="weui_btn weui_btn_primary">下一步</button>
    </div>
    </form>
</div>

<?php include $this->_include('footer.html'); ?>