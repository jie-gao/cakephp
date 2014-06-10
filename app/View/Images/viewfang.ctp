<body>
<?php include_once("analyticstracking.ctp") ?>
<div id="box">

<div id="box0" class="">
<?php echo $this -> Html -> image(__("/images/contents/{$image['Image']['filename']}"), array('width' => '90%', 'height' => '90%'), array('action' => "/contents/{$image['Image']['filename']}"), array ('target' => '_blank'));
?>
</div>
<div id="box1" class="">
<table class="main">
<tr>
<td class="item">地址：</td>
<td class="value">伊旗世纪大道</td>
<td class="item">平米数：</td>
<td class="value">92</td>
</tr>
<tr>
<td class="item">售价：</td>
<td class="value">33万</td>
<td class="item">房屋类型：</td>
<td class="value">电梯楼</td>
</tr>
<tr>
<td class="item">楼层：</td>
<td class="value">11层楼顶层</td>
<td class="item">朝向:</td>
<td class="value">南</td>
</tr>
<tr>
<td class="item">阁楼：</td>
<td class="value">有</td>
<td class="item">停车位：</td>
<td class="value">有</td>
</tr>
<tr>
<td class="item">周边设施</td>
<td class="value">一完小，四中,机场,高级中学</td>
<td class="item">手续等</td>
<td class="value">手续齐全，可立即办理转让</td>
</tr>
</table>
</div>
<div id="box2" class="">
<h1>小区及楼房内外图片</h1>
<hr>
<br>
 <table border>
 <?php foreach ($images as $i): ?>
  <?php echo $this -> Html -> image(__("/images/contents/{$i['Image']['filename']}"), array('width' => '25%', 'height' => '25%'), array('action' => "/contents/{$i['Image']['filename']}"), array ('target' => '_blank'), array('url' => "/contents/{$i['Image']['filename']}"));
?>
&nbsp;
 <?php endforeach;
?> 
</table>
</div>
 
<div id="box3" class="">
<h1>联系方式</h1>
<hr>
<br>
<table class="main">
<tr>
<td class="item">联系人</td>
<td class="value">高先生</td>
</tr>
<tr>
<td class="item">电话</td>
<td class="value">13087189464</td>
</tr>
<tr>
<td class="item">QQ</td>
<td class="value">68132328</td>
</tr>
<tr>
<td class="item">E-mail</td>
<td class="value">68132328@qq.com</td>
</tr>
</table>
<br>
<br>
</div>
 
</div>
