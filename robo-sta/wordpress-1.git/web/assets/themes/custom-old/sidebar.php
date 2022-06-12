<?php
/**
 * wordpress templates
 *
 * サイドバー
 * <?php get_sidebar(); ?>
 * で呼び出し
 *
 * @package Torapants default
 */

?>


        <div id="sidebar">
            <section>
                <h2>メニュー</h2>
                <ul class="navigation">
                    <li>
                    <?php if(is_category(1)): ?>
                        <a href="#">お知らせ</a>
                    <?php else: ?>
                        <a href="#"><?php the_title(); ?></a>
                    <?php endif; ?>
                    </li>
                </ul>
            </section>
        </div>
