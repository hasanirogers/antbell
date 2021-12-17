const observer = new IntersectionObserver(
  (entries, observer) => {
    entries.forEach(entry => {
      if (entry.intersectionRatio > 0.5) {
        entry.target.classList.add('page-background__container--visible');
        console.log('add visible');
      } else {
        entry.target.classList.remove('page-background__container--visible');
        console.log('remove visible');
      }
    });
  },
  { threshold: 0.5 }
);

console.log(observer);

document.querySelectorAll('.page-background__container').forEach(container => {
  observer.observe(container);
});
