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
        <td class="center"><?php echo $staff['id'];?></td>
        <td class="center"><?php echo $staff['staff_number'];?></td>
        <td class="center"><?php echo $staff['staff_name'];?></td>
        <td class="center"><?php echo $staff['sex']==0?'男':'女';?></td>
        <td class="center"><?php echo date('Y年m月d日' , $staff['brithday']);?></td>
        <td class="center"><?php echo $staff['email'];?></td>
        <td class="center"><?php echo $staff['education'];?></td>
        <td class="center"><?php echo $staff['phone'];?></td>
        <td class="center"><?php echo $staff['tel'];?></td>
        <td class="center"><?php echo date('Y-m-d H:i:s' , $staff['ctime']);?></td>
        <td class="center"><a href="">编辑</a><a href="">删除</a></td>
    </tr>
    <?php endforeach?>
</tbody>
</table>
