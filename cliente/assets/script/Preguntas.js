document.addEventListener("DOMContentLoaded", () => {
  const faqQuestions = document.querySelectorAll(".faq-question");

  const isMobile = () => window.innerWidth <= 768; 

  faqQuestions.forEach((question) => {
    question.addEventListener("click", () => {
      const icon = question.querySelector("i");
      const answer = question.nextElementSibling;

      
      if (isMobile()) {
        const openAnswer = document.querySelector(".faq-answer.show");
        if (openAnswer && openAnswer !== answer) {
          openAnswer.classList.remove("show");
          openAnswer.style.display = "none";
          openAnswer.previousElementSibling.querySelector("i").classList.replace("fa-chevron-up", "fa-chevron-down");
          openAnswer.previousElementSibling.classList.remove("active");
        }
      } else {
        const openAnswer = question.closest('.col-md-6').querySelector(".faq-answer.show"); 
        if (openAnswer && openAnswer !== answer) {
          openAnswer.classList.remove("show");
          openAnswer.style.display = "none";
          openAnswer.previousElementSibling.querySelector("i").classList.replace("fa-chevron-up", "fa-chevron-down");
          openAnswer.previousElementSibling.classList.remove("active");
        }
      }

      if (answer.classList.contains("show")) {
        answer.classList.remove("show");
        answer.style.display = "none";
        icon.classList.replace("fa-chevron-up", "fa-chevron-down");
        question.classList.remove("active");
      } else {
        answer.classList.add("show");
        answer.style.display = "block";
        icon.classList.replace("fa-chevron-down", "fa-chevron-up");
        question.classList.add("active");
      }
    });
  });
});