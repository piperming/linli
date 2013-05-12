<div class="location">客户申请记录</div>
<!--
<div class="search">
    <ul>
        <li><span>工号:</span><input type="text" id="keywords_number"></li>
        <li><span>姓名:</span><input type="text" id="keywords_name"></li>
        <li>
            <a class="buttom" id="search_btn" href="javascript:void(0)">搜索</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a class="buttom" href="/staff">查看所有</a>
        </li>
    </ul>
</div>
-->
<table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
    <thead>
    <tr>
        <td width='40'>ID</td>
        <td width='90'>员工姓名</td>
        <td width='90'>客户姓名</td>
        <td width="40">性别</td>
        <td width="90">教育程度</td>
        <td width="90">职业</td>
        <td width="100">手机号码</td>
        <td width="100">座机号码</td>
        <td width="100">信用卡号码</td>
        <td width="100">注册时间</td>
        <td widht="120">操作</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($customs as $custom):?>
    <tr>
        <td class="center row_<?=$custom['id']?>"><?=$custom['id'];?></td>
        <td class="center row_<?=$custom['id']?>"><?=$custom['staff_name'];?></td>
        <td class="center row_<?=$custom['id']?>"><?=$custom['custom_name'];?></td>
        <td class="center row_<?=$custom['id']?>"><?= $custom['sex']==0?'男':'女';?></td>
        <td class="center row_<?=$custom['id']?>"><?= $custom['education'];?></td>
        <td class="center row_<?=$custom['id']?>"><?= $custom['job'];?></td>
        <td class="center row_<?=$custom['id']?>"><?= $custom['phone'];?></td>
        <td class="center row_<?=$custom['id']?>"><?= $custom['tel'];?></td>
        <td class="center row_<?=$custom['id']?>"><?= $custom['credit_card_number'];?></td>
        <td class="center row_<?=$custom['id']?>"><?= date('Y-m-d' , $custom['ctime']);?></td>
        <td class="center row_<?=$custom['id']?>"><a href="javascript:void(0)" class="detail_btn" sid="<?= $custom['id']?>">详情</a></td>
    </tr>
    <?php endforeach?>
</tbody>
</table>
<script id="editTemplate" type="text/x-jquery-tmpl">
    <table id="edit_table">
        <tr><td width="120">ID</td><td width="260">${id}</td></tr>
        <tr><td>员工工号</td><td>${staff_number}</td></tr>
        <tr><td>员工姓名</td><td>${staff_name}</td></tr>
        <tr><td>客户姓名</td><td>${custom_name}</td></tr>
        <tr><td>性别</td><td>${sex}</td></tr>
        <tr><td>生日</td><td>${brithday}</td></tr>
        <tr><td>教育程度</td><td>${education}</td></tr>
        <tr><td>职业</td><td>${job}</td></tr>
        <tr><td>电话号码</td><td>${tel}</td></tr>
        <tr><td>手机号码</td><td>${phone}</td></tr>
        <tr><td>信用卡号</td><td>${credit_card_number}</td></tr>
        <tr><td>身份证号码</td><td>${id_card_number}</td></tr>
        <tr><td>注册时间</td><td>${ctime}</td></tr>
    </table>
    <div class="save"><a href="javascript:void(0)" class="buttom save_btn" sid="${id}">保存</a></div>
</script>
<script type="text/javascript">
    $('.detail_btn').click(function(){
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
            title:'详细信息',
            message:content,
            themedCSS:{
                width:'auto',
                height:'auto',
                top:'50px'
            }
        });
    });
</script>
