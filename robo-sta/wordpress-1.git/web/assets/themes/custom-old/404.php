<?php
/**
 * wordpress templates
 *
 * 404エラーページ
 *
 * @package Torapants default
 */

get_header();
?>

  <div id="body">

    <div id="contents">

      <div class="section">

        <h1>ページが見つかりません。</h1>
        <div class="section detail">
          <p>お探しのページは、ホームページリニューアルによりURLが変更されたか、情報が古いため削除された可能性があります。</p>
          <h2>対処方法</h2>
          <ul>
            <li>ブラウザのアドレスバーに表示されたアドレスのつづりと形式が正しいことを確認してください。</li>
            <li>リンクをクリックしてこのページに到達した場合は、サイトの管理者に連絡して、リンクの形式が正しくないことをお知らせください。</li>
          </ul>

      </div> <!-- /.section -->

    </div> <!-- /#contents -->

  </div> <!-- /#body -->

<?php get_footer(); ?>
