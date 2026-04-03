document.addEventListener("DOMContentLoaded", function () {
    let currentStep = 0;
    const steps = document.querySelectorAll(".step");
  
    if (steps.length > 0) {
      steps[currentStep].classList.add("active");
  
      window.nextStep = function (step) {
        steps[currentStep].classList.remove("active");
        currentStep = step;
        steps[currentStep].classList.add("active");
        window.scrollTo(0, 0);
      };
  
      window.prevStep = function (step) {
        steps[currentStep].classList.remove("active");
        currentStep = step;
        steps[currentStep].classList.add("active");
        window.scrollTo(0, 0);
      };
  
      document
        .getElementById("multiStepForm")
        .addEventListener("submit", function (event) {
          event.preventDefault();
          alert("Form submitted!");
        });
    }
  });
  