export const initializeFavorite = () => {
  const favoriteButtons = document.querySelectorAll(".js-favorite-button");
  if (favoriteButtons.length === 0) {
    return;
  }

  const STORAGE_KEY = "craftjob_favorites";

  //お気に入り一覧を取得
  const getFavorites = () => {
    const favorites = localStorage.getItem(STORAGE_KEY);
    return favorites ? JSON.parse(favorites) : [];
  };

  //お気に入りに追加
  const addFavorite = (postId) => {
    const addedFavorites = getFavorites();
    if (!addedFavorites.includes(postId)) {
      addedFavorites.push(postId);
      localStorage.setItem(STORAGE_KEY, JSON.stringify(addedFavorites));
    }
  };

  // お気に入りから削除
  const removeFavorite = (postId) => {
    const currentFavorites = getFavorites();
    const removedFavorites = currentFavorites.filter((id) => id !== postId);
    localStorage.setItem(STORAGE_KEY, JSON.stringify(removedFavorites));
  };

  // 特定のIDがお気に入りかチェックする関数
  const isFavorite = (postId) => {
    const currentFavorites = getFavorites();
    return currentFavorites.includes(postId);
  };

  favoriteButtons.forEach((button) => {
    const postId = button.dataset.postId;

    // 初期状態を設定
    if (isFavorite(postId)) {
      button.classList.add("is-favorite");
      button.setAttribute("aria-label", "お気に入りを解除");
      button.setAttribute("aria-pressed", "true");
    }

    // クリックイベントを設定
    button.addEventListener("click", () => {
      if (isFavorite(postId)) {
        removeFavorite(postId);
        button.classList.remove("is-favorite");
        button.setAttribute("aria-label", "お気に入りに登録");
        button.setAttribute("aria-pressed", "false");
      } else {
        addFavorite(postId);
        button.classList.add("is-favorite");
        button.setAttribute("aria-label", "お気に入りを解除");
        button.setAttribute("aria-pressed", "true");
      }
    });
  });
};
