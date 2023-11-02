const myImage = document.querySelector(".image");

myImage.onclick = () => {
  const mySrc = myImage.getAttribute("src");
  if (mySrc === "images/banner.png") {
    myImage.setAttribute("src", "images/banner2.jpg");
  } else if (mySrc === "images/banner2.jpg") {
    myImage.setAttribute("src", "images/teaching.jpg");
  }else if(mySrc === "images/teaching.jpg")
  {
    myImage.setAttribute("src", "images/certificate.jpg");
  }
  else if(mySrc === "images/certificate.jpg")
  {
    myImage.setAttribute("src", "images/community.jpg");
  }
  else if(mySrc === "images/community.jpg")
  {
    myImage.setAttribute("src", "images/banner.png");
  }

};