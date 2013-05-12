<div class="location">客户申请</div>
<form action="/custom/add" id="new_staff">
    <table class="fullwidth add_staff" cellpadding="0" cellspacing="0" border="0">
        <tr><td width="140">员工工号</td><td width="440"><input type="text" name="staff_id"/></td></tr>
        <tr><td width="140">员工姓名</td><td width="440"><input type="text" name="staff_name"/></td></tr>
        <tr><td>客户姓名</td><td><input type="text" name="custom_name"/></td></tr>
        <tr>
            <td>性别</td>
            <td>
                <input type="radio" name="sex" checked="checked" value="0">男
                <input type="radio" name="sex" value="1">女
            </td>
        </tr>
        <tr><td>生日</td><td><input type="text" name="brithday"/></td></tr>
        <tr><td>教育程度</td><td><input type="text" name="education"/></td></tr>
        <tr>
            <td>婚姻状况</td>
            <td>
                <input type="radio" name="marital_status" checked="checked" value="0">未婚
                <input type="radio" name="marital_status" value="1">已婚
                <input type="radio" name="marital_status" value="2">离异
            </td>
        </tr>
        <tr><td>职业</td><td><input type="text" name="job"/></td></tr>
        <tr><td>手机号码</td><td><input type="text" name="phone"/></td></tr>
        <tr><td>信用卡号</td><td><input type="text" name="credit_card_number"/></td></tr>
        <tr><td>身份证号码</td><td><input type="text" name="id_card_number"/></td></tr>
        <tr><td>联系地址</td><td><input type="text" name="address"/></td></tr>
        <tr><td>注册时间</td><td><?=date("Y年m月d日" , time())?></td></tr>
    </table>
    <div class="save"><a class="buttom" id="add_new_staff_btn" href="javascript:void(0)">添加新员工</a></div>
</form>
<script type="text/javascript">
    $('#add_new_staff_btn').click(function(){
        var form = $('#new_staff');
        $.ajax({
            url:form.attr('action'),
            type:'post',
            data:form.serialize(),
            success:function(data){
                var json = $.parseJSON(data);
                if(json.status == 0){
                    alert(json.msg);
                }else{
                    alert('客户申请成功');
                    location.reload(false);
                }
            }
        });
    });
</script>

