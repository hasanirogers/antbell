const observer = new IntersectionObserver(
  (entries, observer) => {
    entries.forEach(entry => {
      if (entry.intersectionRatio > 0.5) {
        entry.target.classList.add('page-background__container--visible');
      } else {
        entry.target.classList.remove('page-background__container--visible');
      }
    });
  },
  { threshold: 0.5 }
);

document.querySelectorAll('.page-background__container').forEach(container => {
  observer.observe(container);
});
