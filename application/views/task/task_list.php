<div class="location"><?=$title?></div>
<div class="search">
        <span>工号:</span>
        <input type="text" id="keywords_number">
        <span>姓名:</span>
        <input type="text" id="keywords_name">
        <a class="buttom" id="search_btn" href="javascript:void(0)">搜索</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a class="buttom" href="/task/day">查看所有</a>
</div>
<table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
    <thead>
    <tr>
        <td width='40'>ID</td>
        <td width='90'>员工工号</td>
        <td width='90'>员工姓名</td>
        <td width="100">计划卡数</td>
        <td width="120">实际完成卡数</td>
        <td width="120">不符合要求卡数</td>
        <td width="120">不符合要求原因</td>
        <td width="130">录入时间</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($tasks as $task):?>
    <tr>
        <td class="center row_<?=$task['id']?>"><?=$task['id'];?></td>
        <td class="center row_<?=$task['id']?>"><?=$task['staff_number'];?></td>
        <td class="center row_<?=$task['id']?>"><?=$task['staff_name'];?></td>
        <td class="center row_<?=$task['id']?>"><?= $task['plan_no'];?></td>
        <td class="center row_<?=$task['id']?>"><?= $task['fact_no'];?></td>
        <td class="center row_<?=$task['id']?>"><?= $task['fail_no'];?></td>
        <td class="center row_<?=$task['id']?>"><?= $task['fail_reason'];?></td>
        <td class="center row_<?=$task['id']?>"><?= date('Y-m-d H:i' , $task['ctime']);?></td>
    </tr>
    <?php endforeach?>
</tbody>
</table>
<script type="text/javascript">
    $("#search_btn").click(function(){
        var keywords_number = '';
        var keywords_name = '';
         keywords_number = $('#keywords_number').val();
         keywords_name = $('#keywords_name').val();
        if(keywords_number=='' && keywords_name==''){
            return false;
        }
        var url = '/task/day?number='+keywords_number+'&name='+keywords_name;
        location.href= url;
    });
</script>
