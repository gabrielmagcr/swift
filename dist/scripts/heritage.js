

// Selecciona todas las secciones de años y las fechas en la barra lateral
const yearSections = document.querySelectorAll('.year-badge .years');
const dateLinks = document.querySelectorAll('.dates .date');

// Crea un IntersectionObserver
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      // ID de la sección en el viewport
      const yearId = entry.target.id;
      
      // Remueve la clase 'date-active' de todas las fechas
      dateLinks.forEach(date => date.classList.remove('date-active'));
      
      // Encuentra y activa la fecha correspondiente al año visible
      const activeDate = document.querySelector(`.dates .date a[href="#${yearId}"]`).parentElement;
      if (activeDate) {
        activeDate.classList.add('date-active');
      }
    }
  });
}, {
  root: null,         // Observa en la ventana del navegador
  threshold: 0.6      // Activa cuando el 60% de la sección es visible
});

// Observa cada sección de año
yearSections.forEach(section => observer.observe(section));
