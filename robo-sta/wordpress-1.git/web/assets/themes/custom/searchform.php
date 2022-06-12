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
        </dd>
        <dt>検索対象の絞込</dt>
        <dd>
            <ul>
                <li><label><input name="option[]" type="checkbox" value="condition1" /> 条件1</label></li>
                <li><label><input name="option[]" type="checkbox" value="condition2" /> 条件1</label></li>
            </ul>
        </dd>
    </dl>
    <p class="submit"><input type="submit" value="検索" /></p>
</form>
