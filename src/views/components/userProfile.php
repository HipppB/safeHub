<div class="central-container">
            <h2 class="gradienttext">
                <?php echo $user['name'] . ' ' . $user['lastname']; ?></h2>
            <div>
            <?php if (new DateTime($user['birth_date'])) {
                $start_datetime = new DateTime();
                $diff = $start_datetime->diff(
                    new DateTime($user['birth_date'])
                );
                echo $diff->y;
            } else {
                echo 'N/A';
            } ?>    
            <?php printTranslation('year'); ?></div>
            <div class="small-stroke"></div>
            
            <?php echo '<div>' . $user['phone'] . '</div>'; ?>
            <div>
                <?php echo $user['email']; ?></h2>
            </div>
        </div>