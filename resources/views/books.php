<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <? if (empty($data)): ?>
        Data is empty!
    <? else: ?>
        <? foreach ($data as $item): ?>
            <article>
                <div class="author"><span class="text-gray">автор: </span> <?=$item[1]?></div>
                <div class="year"><span class="text-gray">год: </span> <?=$item[2]?></div>
                <div class="name"><?= $item[0] ?></div>

            </article>
        <br/>
        <? endforeach; ?>
    <? endif; ?>

</div>

</body>
</html>