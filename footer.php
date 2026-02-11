<!-- footer -->
<footer class="l-footer">
  <div class="l-footer-inner l-container">
    <nav class="l-footer-nav">
      <ul class="l-footer-nav-list">
        <li class="l-footer-nav-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
        <li class="l-footer-nav-item"><a href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>">求人を探す</a></li>
        <li class="l-footer-nav-item"><a
            href="<?php echo esc_url( add_query_arg( 'orderby', 'popular', home_url( '/recruit/' ) ) ); ?>">人気求人</a>
        </li>
        <li class="l-footer-nav-item"><a
            href="<?php echo esc_url( add_query_arg( 'view', 'favorite', home_url( '/recruit/' ) ) ); ?>">お気に入り</a>
        </li>
        <li class="l-footer-nav-item"><a href="<?php echo esc_url( home_url( '/column/' ) ); ?>">就活コラム</a></li>
        <li class="l-footer-nav-item"><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お問い合わせ</a></li>
        <li class="l-footer-nav-item"><a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>">プライバシーポリシー</a></li>
        <li class="l-footer-nav-item"><a
            href="<?php echo esc_url( get_theme_mod( 'craftjob_company_url', 'https://google.com/' ) ); ?>"
            target="_blank" rel="noopener noreferrer">運営会社</a>
        </li>
      </ul>
    </nav>

    <small class="l-footer-copyright">
      &copy; <?php echo esc_html( date( 'Y' ) ); ?> LIBERA inc.
    </small>
  </div>
</footer>
<!-- footer end -->
<?php wp_footer(); ?>
</body>

</html>