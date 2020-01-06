<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table>
    <tr><th> 编号 </th><th> 名称 </th><th> 浏览次数 </th></tr>
    <?php
        $TPL = "<tr><td> %s </td><td> %s </td><td> %s </td></tr>";
        foreach($results as $product) {
            //list($id,$title,$views)  = array_values($product);
            //printf($TPL,$id,$title,$views);
            [$a,$b,$c]  = array_values($product);
            printf($TPL,$a,$b,$c);
            //printf($TPL,...array_values($product));
        }
    ?>
</table>
</body>
</html>