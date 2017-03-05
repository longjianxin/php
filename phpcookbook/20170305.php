<?php
/**
 * Created by PhpStorm.
 * User: zhangyue
 * Date: 2017/3/6
 * Time: 上午12:36
 */
//1.11生成逗号分隔数据
$sales = [
    ['Northeast','2005-01-01','2005-02-01',12.54],
    ['Northwest','2005-01-01','2005-02-01',546.33],
    ['Southeast','2005-01-01','2005-02-01',93.26],
    ['Southwest','2005-01-01','2005-02-01',945.21],
    ['All Regions','--','--',1597.34]
];
ob_start();
$fh = fopen("php://output",'w') or die("Can't open php://output");
foreach($sales as $sales_line){
    if(fputcsv($fh,$sales_line)===false){
        die("Can't write CSV line");
    }
}
fclose($fh) or die("Can't close php://output");
$output = ob_get_contents();
ob_end_clean();

print_r($output);