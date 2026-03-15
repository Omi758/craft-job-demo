/**
 * トップページ用スライダー
 * Splideを使用してSP版では１枚表示、PC版では3枚表示
 * ページネーションと矢印も表示
 */
export const initializeTopSlider = () => {
  const splides = document.querySelectorAll(".js-top-slider");
  if (splides.length === 0) {
    return;
  }

  splides.forEach((el) => {
    new Splide(el, {
      type: "loop",
      perMove: 1,
      perPage: 3,
      gap: "12px",
      pagination: true,
      arrows: true,
      breakpoints: {
        767: {
          perPage: 1,
          gap: "20px",
        },
      },
    }).mount();
  });
};
