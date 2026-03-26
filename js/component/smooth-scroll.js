/**
 * スムーススクロール
 * single-recruit.php_pill-linkで使用
 *
 */
export const initializeSmoothScroll = () => {
  // 他ページからハッシュ付きで遷移した場合
  if (window.location.hash) {
    const targetElement = document.querySelector(window.location.hash);
    if (targetElement) {
      targetElement.scrollIntoView({ behavior: "instant" });
    }

    // 表示を復活
    requestAnimationFrame(() => {
      document.body.classList.remove("is-hash-loading");
    });
  }

  const pillLinks = document.querySelectorAll('a[href^="#"]');
  if (pillLinks.length === 0) {
    return;
  }

  pillLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
      const targetId = link.getAttribute("href");
      if (targetId === "#") return;

      const targetElement = document.querySelector(targetId);
      if (!targetElement) return;

      e.preventDefault();
      targetElement.scrollIntoView({ behavior: "smooth" });
    });
  });
};
