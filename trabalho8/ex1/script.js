const subTitles = document.querySelectorAll("h2");

for (let subtitle of subTitles) {
  const content = subtitle.nextElementSibling;

  subtitle.onclick = () => {
    content.style.display = "none";
  };
}
