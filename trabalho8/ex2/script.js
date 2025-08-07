const images = document.querySelectorAll("img");

images.forEach((img) => {
  img.onmouseenter = () => {
    img.classList.add("red-shadow");
  };

  img.onmouseleave = () => {
    img.classList.remove("red-shadow");
  };
});
