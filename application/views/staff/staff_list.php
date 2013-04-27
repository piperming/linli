<div class="location">员工列表</div>
<table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
    <thead>
    <tr>
        <td width='40'>ID</td>
        <td width='90'>员工工号</td>
        <td width='90'>员工姓名</td>
        <td width="40">性别</td>
        <td width='100'>生日</td>
        <td width="100">邮箱</td>
        <td width="90">教育程度</td>
        <td width="100">手机号码</td>
        <td width="100">座机号码</td>
        <td width="100">注册时间</td>
        <td widht="100">操作</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($staffs as $staff):?>
    <tr>
        <td class="center row_<?=$staff['id']?>"><?=$staff['id'];?></td>
        <td class="center row_<?=$staff['id']?>"><?=$staff['staff_number'];?></td>
        <td class="center row_<?=$staff['id']?>"><?=$staff['staff_name'];?></td>
        <td class="center row_<?=$staff['id']?>"><?= $staff['sex']==0?'男':'女';?></td>
        <td class="center row_<?=$staff['id']?>"><?= date('Y年m月d日' , $staff['brithday']);?></td>
        <td class="center row_<?=$staff['id']?>"><?= $staff['email'];?></td>
        <td class="center row_<?=$staff['id']?>"><?= $staff['education'];?></td>
        <td class="center row_<?=$staff['id']?>"><?= $staff['phone'];?></td>
        <td class="center row_<?=$staff['id']?>"><?= $staff['tel'];?></td>
        <td class="center row_<?=$staff['id']?>"><?= date('Y-m-d H:i:s' , $staff['ctime']);?></td>
        <td class="center row_<?=$staff['id']?>"><a href="javascript:void(0)" class="edit_btn" sid="<?= $staff['id']?>">编辑</a>&nbsp;&nbsp;<a href="javascript:void(0)" sid="<?php echo $staff['id']?>" class="del_btn">删除</a></td>
    </tr>
    <?php endforeach?>
</tbody>
</table>
<script id="editTemplate" type="text/x-jquery-tmpl">
    <table id="edit_table">
        <tr><td width="120">ID</td><td width="260">${id}</td></tr>
        <tr><td>员工工号</td><td>${staff_number}</td></tr>
        <tr><td>员工姓名</td><td>${staff_name}</td></tr>
        <tr><td>性别</td><td>${sex}</td></tr>
        <tr><td>生日</td><td>${brithday}</td></tr>
        <tr><td>邮箱</td><td><input   class="edit_val" type="text" name="" value="${email}"/></td></tr>
        <tr><td>教育程度</td><td><input  class="edit_val" type="text" name="" value="${education}"/></td></tr>
        <tr><td>手机号码</td><td><input  class="edit_val" type="text" name="" value="${phone}"/></td></tr>
        <tr><td>座机号码</td><td><input  class="edit_val" type="text" name="" value="${tel}"/></td></tr>
        <tr><td>注册时间</td><td>${ctime}</td></tr>
    </table>
    <div class="save"><a href="javascript:void(0)" class="buttom save_btn" sid="${id}">保存</a></div>
</script>
<script type="text/javascript">
    $('.edit_btn').click(function(){
        var json = Object();
        var key_arr = Array('id' , 'staff_number' , 'staff_name' , 'sex' , 'brithday' , 'email' , 'education' , 'phone' , 'tel' , 'ctime');
        var id = $(this).attr('sid');
        $('.row_'+id).each(function(i){
            var key = key_arr[i];
            json[key] = $(this).text();
        });
        var content =  $('#editTemplate').tmpl(json);
        $.blockUI({
            theme:true,
            title:'编辑员工信息',
            message:content,
            themedCSS:{
                width:'auto',
                height:'auto',
                top:'50px'
            }
        });
    });
    $('.save_btn').live('click' , function(){
        var json = Object();
        var key_arr = Array('email' , 'education' , 'phone' , 'tel');
        var id = $(this).attr('sid');
        json['id'] = id;
        $('#edit_table input.edit_val').each(function(i){
            var key = key_arr[i];
            json[key] = $(this).val();
        });
        $.post(
                '/staff/save_staff',
                json,
                function(data){
                    if(data.status==0){
                        alert(data.msg);
                    }else{
                        alert('更新成功');
                        location.reload(false);
                    }
                },
                'json'
        );
    });
</script>
<script type="text/javascript">
    $('.del_btn').click(function(){
        var del_node = $(this);
        var del_html = $(this).parent('td').parent('tr');
        var staff_id = del_node.attr('sid');
        if(!confirm('确定删除?')){
            return;
        }
        $.get(
            '/staff/del/'+staff_id,
            function(data){
                var status = $.parseJSON(data);
                if(status.status == 0){
                    alert('删除失败!');
                }else{
                    alert('删除成功!');
                    del_html.html('');
                }
            }
        );
    });
</script>
