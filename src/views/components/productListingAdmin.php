<?php
echo '
<div class="item-in-list rwidth" onclick="window.location.href = \'./product?productid=' .
    $product['id'] .
    '\';">
    <div>
        <div class="image-notif-normale">
        </div>
    </div>
    
    <div class="name">
        <div class="gradienttext s030">' .
    $product['product_name'] .
    '</div>
        <div class="s025 leftAl">' .
    $product['room_name'] .
    '</div>
    </div>

    <div>
    <div class="small-2 s025 mR10">' .
    $product['user_code'] .
    '
    </div>
    </div>      
</div>
<div class="line rwidth"></div>

    ';
