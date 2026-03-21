/**
 * 絞り込み検索フォームのアコーディオン
 * PC版(1080px)ではデフォルトで開いた状態にする。
 * アコーディオン開閉アニメーションの設置
 *
 */
export const initializeSearchFormAccordion = () => {
  const detailsElements = document.querySelectorAll(".js-search-form-details");
  if (detailsElements.length === 0) {
    return;
  }

  const PC_BREAKPOINT = 1080;
  const DURATION = 300;

  // PC版(1080px)ではデフォルトで開いた状態
  const isPC = window.innerWidth >= PC_BREAKPOINT;
  if (isPC) {
    detailsElements.forEach((el) => {
      el.setAttribute("open", "");
    });
  }

  // リサイズ監視：SP→閉じる、PC→開く
  let previousIsPC = isPC;
  window.addEventListener("resize", () => {
    const currentIsPC = window.innerWidth >= PC_BREAKPOINT;
    if (previousIsPC === currentIsPC) return; // 変化なしなら何もしない

    detailsElements.forEach((el) => {
      if (currentIsPC) {
        el.setAttribute("open", "");
      } else {
        el.removeAttribute("open");
      }
    });
    previousIsPC = currentIsPC;
  });

  // 各details要素に対してアニメーションを設定
  detailsElements.forEach((details) => {
    const summary = details.querySelector(".js-search-form-summary");
    const body = details.querySelector(".c-search-form-body");
    if (!summary || !body) return;

    summary.addEventListener("click", (e) => {
      e.preventDefault();

      if (details.open) {
        // 閉じるアニメーション
        body.style.overflow = "hidden";
        const startHeight = body.offsetHeight;
        body.style.maxHeight = startHeight + "px";

        requestAnimationFrame(() => {
          body.style.transition = `max-height ${DURATION}ms ease-out`;
          body.style.maxHeight = "0px";
        });

        setTimeout(() => {
          details.removeAttribute("open");
          body.style.maxHeight = "";
          body.style.overflow = "";
          body.style.transition = "";
        }, DURATION);
      } else {
        // 開くアニメーション
        details.setAttribute("open", "");
        body.style.overflow = "hidden";
        const fullHeight = body.offsetHeight;
        body.style.maxHeight = "0px";

        requestAnimationFrame(() => {
          body.style.transition = `max-height ${DURATION}ms ease-out`;
          body.style.maxHeight = fullHeight + "px";
        });

        setTimeout(() => {
          body.style.maxHeight = "";
          body.style.overflow = "";
          body.style.transition = "";
        }, DURATION);
      }
    });
  });
};
