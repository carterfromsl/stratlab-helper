// Function to display the correct copyright year
window.onload = function() {
  const socketElement = document.getElementById("socket");
  
  // Check if #socket contains .copyright
  if (socketElement) {
    const copyrightElement = socketElement.querySelector(".copyright");
    
    if (copyrightElement) {
      // Check if #getYear already exists within .copyright
      let yearElement = copyrightElement.querySelector("#getYear");
      
      if (!yearElement) {
        // If #getYear doesn't exist, remove any existing © symbol
        copyrightElement.innerHTML = copyrightElement.innerHTML.replace(/&copy;|©/g, '').trim();
        
        // Create #getYear as a span
        yearElement = document.createElement("span");
        yearElement.id = "getYear";
        yearElement.innerHTML = `&copy; ${new Date().getFullYear()} `;
        
        // Insert the year element at the beginning of .copyright
        copyrightElement.prepend(yearElement);
      } else {
        // If #getYear exists, just update the year
        yearElement.innerHTML = new Date().getFullYear();
      }
    }
  }
};
