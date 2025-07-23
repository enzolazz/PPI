const subTitles = document.querySelectorAll("h2");

subTitles.forEach((subTitle) => {
  const content = subTitle.nextElementSibling;

  subTitle.addEventListener("click", () => {
    content.style.display = "none";
  });

  subTitle.addEventListener("dblclick", () => {
    content.style.display = "block";
  });
});
