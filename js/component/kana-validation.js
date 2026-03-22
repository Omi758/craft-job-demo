/**
 * ふりがなバリデーション（JS）_ユーザーがふりがな欄にひらがな以外を入力した際の即時フィードバック
 * functions.phpのPHP版バリデーションと同じルール
 * 【PHP版とJS版の両方がある理由】 JS版はユーザーへの即時フィードバック用で、
 * PHP版はJSが無効な環境やフォーム送信時のサーバー側チェック用
 * （セキュリティ上、JS版だけでは不十分なのでPHP版は残しておく必要があり）
 * ひらがな・長音符（ー）・スペースのみ許可
 */

export const initializeKanaValidation = () => {
  const KanaInputs = document.querySelectorAll('input[name="your-kana"]');
  if (KanaInputs.length === 0) {
    return;
  }

  const KANA_PATTERN = /^[ぁ-んー\s]+$/;
  const ERROR_MESSAGE = "ひらがなで入力してください。";
  const ERROR_CLASS = "wpcf7-not-valid-tip";

  KanaInputs.forEach((input) => {
    // エラーメッセージ要素を作成
    const errorEl = document.createElement("span");
    errorEl.classList.add(ERROR_CLASS);
    errorEl.classList.add("js-kana-error");
    errorEl.textContent = ERROR_MESSAGE;
    errorEl.style.display = "none";
    input.closest(".wpcf7-form-control-wrap").after(errorEl);

    // 入力欄からフォーカスが外れた時にcheck
    input.addEventListener("blur", () => {
      const value = input.value.trim();
      if (value === "") {
        // 空欄はCF7の必須checkに任せる
        errorEl.style.display = "none";
        return;
      }

      if (!KANA_PATTERN.test(value)) {
        errorEl.style.display = "block";
      } else {
        errorEl.style.display = "none";
      }
    });

    // 入力中にエラーが出ていたら修正時にリアルタイムで消す
    input.addEventListener("input", () => {
      const value = input.value.trim();
      if (value === "" || KANA_PATTERN.test(value)) {
        errorEl.style.display = "none";
      }
    });
  });

  // フォーム送信時にJS版エラーを非表示にする（CF7のエラーに任せる）
  const forms = document.querySelectorAll(".wpcf7-form");
  forms.forEach((form) => {
    form.addEventListener("submit", () => {
      const jsErrors = form.querySelectorAll(".js-kana-error");
      jsErrors.forEach((el) => {
        el.style.display = "none";
      });
    });
  });
};
