/**
 * スムーススクロール
 * single-recruit.php_pill-linkで使用
 *
 */
export const initializeSmoothScroll = () => {
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
