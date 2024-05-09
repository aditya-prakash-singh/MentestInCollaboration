function popup() {
  alert("Bhai Whatsapp Karle");
}
var a = 1;
function daynight() {
  if (a) {
      document.getElementById("moon").className = "fa fa-lightbulb-o fa-lg mode";
      document.documentElement.style.setProperty("--navbgg", "#242322");
      document.documentElement.style.setProperty("--bodybg", "#302f2f");
      document.documentElement.style.setProperty("--navbg", "white");
      a = 0;
  } else {
      document.getElementById("moon").className = "fa fa-moon-o fa-lg mode";
      document.documentElement.style.setProperty("--navbgg", "#e6884e");
      document.documentElement.style.setProperty("--bodybg", "#fedbc5");
      document.documentElement.style.setProperty("--navbg", "#6c5ce7");
      a = 1;
  }
}
