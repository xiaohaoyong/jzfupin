<?php include $this->_include('header.html'); ?>
<script type="text/javascript">
var modalid = Number("<?php echo $member['modalid']; ?>");
$(function(){
	$('#tabbar').hide();
    if(modalid > 0 ) {
        if(modalid == 5) window.location.href="/?catid=22";
        if(modalid == 7) window.location.href="/?catid=15";
    } else {

        $.modal({
          title: "欢迎使用拉手医疗",
          text: "使用拉手医疗需要登录",
          buttons: [
            { text: "立即登录", onClick: function(){ 
                    window.location.href="/member/?c=login&back=/";
                }
            }
          ]
        });

    }
})
</script>
<?php include $this->_include('footer.html'); ?>