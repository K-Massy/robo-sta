<?php
/**
 * wordpress templates
 *
 * 検索窓
 *
 * @package Torapants default
 */
?>

                <form method="get" action="<?php bloginfo( 'url' ); ?>">
                    <dl>
                        <dt>検索ワード</dt>
                        <dd>
                            <input type="text" id="s" name="s" />
                            <p>上位検索ワード：発変電工学、電気工学実験、メカトロニクス</p>
                        </dd>
                        <!--dt>キーワード選択</dt>
                        <dd>
                            <ul>
                                <li><label><input type="checkbox" value="#" /> 発変電工学</label></li>
                                <li><label><input type="checkbox" value="#" /> マイコン</label></li>
                                <li><label><input type="checkbox" value="#" /> 電気工学実験</label></li>
                                <li><label><input type="checkbox" value="#" /> プログラム</label></li>
                                <li><label><input type="checkbox" value="#" /> メカトロニクス</label></li>
                                <li><label><input type="checkbox" value="#" /> 新エネルギー技術</label></li>
                                <li><label><input type="checkbox" value="#" /> プランテーション</label></li>
                                <li><label><input type="checkbox" value="#" /> バイオテクノロジー</label></li>
                                <li><label><input type="checkbox" value="#" /> ＦＡオートメーション</label></li>
                                <li><label><input type="checkbox" value="#" /> ナノテクノロジー</label></li>
                            </ul>
                        </dd-->
                        <dt>検索対象の絞込</dt>
                        <dd>
                            <ul>
                                <li><label><input name="option[]" type="checkbox" value="facility" /> 設備のみ検索対象とする</label></li>
                                <li><label><input name="option[]" type="checkbox" value="scholar" /> 研究者シーズのみ検索対象とする</label></li>
                            </ul>
                        </dd>
                    </dl>
                    <p class="submit"><input type="image" src="<?php bloginfo('template_directory'); ?>/img/search_button.png" alt="検索" id="search_submit" class="submit" /></p>
                </form>