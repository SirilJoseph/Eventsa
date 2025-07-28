// Simple fade-in effect for content sections
window.addEventListener('DOMContentLoaded', () => {
  const sections = document.querySelectorAll('.fade');
  const opts = { threshold: 0.1 };
  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        obs.unobserve(entry.target);
      }
    });
  }, opts);
  sections.forEach(section => observer.observe(section));
});
