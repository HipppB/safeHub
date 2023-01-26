<section>
            <header>
              <img src='../views/assets/icons/homeInline.svg' alt='house'>
              <h2 class='gradienttext'>
              <?php echo $product['product_name']; ?>
              (
              <?php echo $product['room_name']; ?>
              )</h2>
            </header>
            <div class='graphList'>
            <a href='./datas?productId=<?php echo $product[
                'id'
            ]; ?>&type=temperature'>
            <div>
               <img src='../views/assets/graph.svg' alt='graph'/>
                <?php printTranslation('temperature'); ?></div>
</a>

                            <a href='./datas?productId=<?php echo $product[
                                'id'
                            ]; ?>&type=humidity'>
                            <div>
                        <img src='../views/assets/graph.svg' alt='graph'/> <?php printTranslation(
                            'humidity'
                        ); ?></div></a>

                          <a href='./datas?productId=<?php echo $product[
                              'id'
                          ]; ?>&type=carbon_dioxide'>
                          <div>
              <img src='../views/assets/graph.svg' alt='graph'/>
CO2</div>
                </a>

                          <a href='./datas?productId=<?php echo $product[
                              'id'
                          ]; ?>&type=sound_level'>
                          <div>
               <img src='../views/assets/graph.svg' alt='graph'/><?php printTranslation(
                   'sound_level'
               ); ?></div></a>

            </div>
        </section>