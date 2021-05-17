<?php
    // 引入类库
    require_once './jpgraph-4.3.4/src/jpgraph.php';
    require_once './jpgraph-4.3.4/src/jpgraph_bar.php';
    //柱形图模拟数据
    $data=array(0=>-21,1=>-3,2=>12,3=>19,4=>23,5=>29,6=>30,7=>22,8=>26,9=>18,10=>5,11=>-10);
    //创建背景图
    $graph=new Graph(400,300);
    //设置刻度样式
    $graph->SetScale("textlin");
    //设置边界范围
    $graph->img->SetMargin(30,30,80,30);
    //设置标题
    $graph->title->Set("BarPlot test");
    //得到柱形图对象
    $barPlot=new BarPlot($data);
    //设置柱形图图例
    $barPlot->SetLegend("beijing");
    //显示柱形图代表数据的值
    $barPlot->value->show();
    //将柱形图加入到背景图
    $graph->Add($barPlot);
    //设置柱形图填充颜色
    $barPlot->SetFillColor('yellow');
    //设置边框颜色
    $barPlot->SetColor('red');
    //将柱形图输出到浏览器
    $graph->Stroke();
     
    //保存图片
     $graph->Stroke('../pic/barPlot.png');

?>  

