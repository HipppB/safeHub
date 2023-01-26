

<?php
if (empty($rankMode)) {
    $rankMode = false;
}
echo '
<div class="frow w100p">
    <div class="item-in-list rwidth onBottom"  onclick="window.location.href = \'./product?productid=' .
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
    ' .
    ($rankMode && userIsAdmin()
        ? '<div class="small-2 s025  flex center relative" onclick="toggleUserGestionnaire(' .
            $user['id'] .
            ',' .
            $product['id'] .
            ')"><img src="../views/assets/icons/' .
            (!$product['is_gestionnaire'] ? 'upgreen.svg' : 'downred.svg') .
            '" class="w30px onTop hover5p hoverClick left10 absolute"/></div>'
        : '') .
    '
</div>
<div class="line rwidth"></div>

    ';

