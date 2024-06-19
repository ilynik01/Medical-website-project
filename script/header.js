var slideN = 0;
slideshow();

function slideshow() {
  let i;
  let slideImg = document.getElementsByClassName("heading1");

  

  
    for (i = 0; i < slideImg.length; i++) {
      slideImg[i].style.display = "none";
    }
    slideN++;


    
    if (slideN > slideImg.length) {slideN = 1}

      
    slideImg[slideN-1].style.display = "flex";
    setTimeout(slideshow, 5000); 


}





