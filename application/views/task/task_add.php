<div class="location">新增任务</div>
<form action="/task/task_add" id="new_staff_task">
    <table class="fullwidth add_staff" cellpadding="0" cellspacing="0" border="0">
        <tr><td width="140">员工工号</td><td width="440"><input type="text" name="staff_number"/></td></tr>
        <tr><td>员工姓名</td><td><input type="text" name="staff_name"/></td></tr>
        <tr><td>计划卡数</td><td><input type="text" name="plan_no"/></td></tr>
        <tr><td>实际卡数</td><td><input type="text" name="fact_no"/></td></tr>
        <tr><td>未通过卡数</td><td><input type="text" name="fail_no"/></td></tr>
        <tr><td>失败原因</td><td><textarea name="fail_reason"></textarea></td></tr>
        <tr><td>录入时间</td><td><?=date("Y年m月d日" , time())?></td></tr>
    </table>
    <div class="save"><a class="buttom" id="add_staff_task_btn" href="javascript:void(0)">添加员工任务</a></div>
</form>
<script type="text/javascript">
    $('#add_staff_task_btn').click(function(){
        var form = $('#new_staff_task');
        $.ajax({
            url:form.attr('action'),
            type:'post',
            data:form.serialize(),
            success:function(data){
                var json = $.parseJSON(data);
                if(json.status == 0){
                    alert(json.msg);
                }else{
                    alert('新增任务成功');
                    location.reload(false);
                }
            }
        });
    });
</script>
