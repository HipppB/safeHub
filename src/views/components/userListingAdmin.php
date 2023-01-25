<?php
$age = 'N/A';
if (new DateTime($user['birth_date'])) {
    $start_datetime = new DateTime();
    $diff = $start_datetime->diff(new DateTime($user['birth_date']));
    $age = $diff->y;
}
echo '
<div class="item-in-list rwidth" onclick="window.location.href = \'./user?userid=' .
    $user['id'] .
    '\';">
       
        
        <div class="name">
            <div class="gradienttext s030">' .
    $user['name'] .
    ' ' .
    $user['lastname'] .
    '</div>
            <div class="s025 leftAl">' .
    $user['email'] .
    '</div>
        </div>

        <div>
        <div class="small-2 s025">' .
    $user['phone'] .
    '
        </div>
        </div>
        
    </div>
    <div class="line rwidth"></div>

    ';
?>
