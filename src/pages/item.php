<?php require '../scripts/ribbons.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>item</title>
    <link rel="stylesheet" href="../../res/styles/item.css">
</head>
<body>

<?php head()?>

    <div id="main" class="box">
        <div style="flex-direction: row;">
            <img src="https://picsum.photos/id/40/200" alt="generic image">
            <div style="flex-direction:row">
                <div style="flex-direction: column;">
                    <h1 id="name">lorem</h1>
                    <h3>vendido por <span id="owner">ipsum</span></h3>
                    <p id="description">dolor</p>
                </div>
                <div style="flex-direction: column; align-items: end;">
                    <h1>R$<span id="price">sit</span></h1>
                    <h3><span id="amount">amet</span> disponível(is)</h3>
                    <button onclick="addCart()">comprar</button>
                </div>
            </div>
        </div>
        
    </div>

<?php foot()?>

    <script src="../scripts/item.js" async></script>
</body>
</html>