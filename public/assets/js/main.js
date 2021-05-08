// Lorsqu'on clique sur le bouton menu, donne/enleve la classe "disable" à navigation
// Cela permet de la faire apparaitre ou disparaitre
$("#sidebarCollapse").click(function () {
  $(".navigation").toggleClass("disable");
});

$("#btn-return").click(function () {
  $(".navigation").toggleClass("disable");
});

let btn = document.getElementById("add");
let input = document.getElementById("devise");
btn.addEventListener("click", function () {
  let ajax = new XMLHttpRequest();
  let devise_name = input.value;
  ajax.responseType = "json";
  ajax.open(
    "GET",
    "https://api.coingecko.com/api/v3/coins/" + devise_name.toLowerCase()
  );
  ajax.send();
  ajax.onload = () => {
    let data = ajax.response;
    console.log(data);
    let li = document.createElement("li");
    let a = document.createElement("a");
    a.setAttribute("id", data.name.toLowerCase());
    a.setAttribute("href", "#");
    a.setAttribute("onclick", "getId(this.id);");
    let image = document.createElement("img");
    image.src = data.image.small;
    image.setAttribute("alt", "image " + data.name);
    let ul = document.getElementById("todo").querySelector("ul");
    a.innerText = data.name;
    li.append(image);
    li.append(a);
    ul.append(li);
    let http = new XMLHttpRequest();
    let url = "index.php";
    let params = "name=" + data.name + "&img=" + data.image.small;
    http.open("POST", url, true);
    //Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(params);
  };
});

function getId(id) {
  let label = document.getElementById("graph").querySelector("label");
  let graph = document.getElementById("graph_x");
  let graph_y = document.getElementById("graph_y");
  graph.innerHTML = "";
  graph_y.innerHTML = "";
  let tab = [];
  let tabPrice = [];
  label.innerText = id.toUpperCase();

  for (let i = 1; i <= 5; i++) {
    let ajax = new XMLHttpRequest();
    let devise_name = input.value;
    ajax.responseType = "json";
    let date = new Date();
    date.setDate(date.getDate() - i);
    tab.unshift(convertDate(date));
    ajax.open(
      "GET",
      "https://api.coingecko.com/api/v3/coins/" +
        id.toLowerCase() +
        "/history?date=" +
        convertDate(date) +
        "&localization=false"
    );
    ajax.send();
    ajax.onload = () => {
      let data = ajax.response;
      if (data.market_data != undefined) {
        let val = data.market_data.current_price.eur;
        tabPrice.unshift(Math.ceil(val));
      }
    };
  }

  let j = 50;
  tab.forEach((element) => {
    graph.innerHTML += "<text x='" + j + "' y='270'>" + element + "</text>";
    j += 100;
  });

  setTimeout(() => {
    let k = 250;
    let min = Math.min(...tabPrice);
    let max = Math.max(...tabPrice);
    let dif = max - min;
    let path = min;
    let num = dif / 5;
    let num2 = num / 10 / 5;
    let result = [];
    let ligneGraph = document.getElementById("graph_line");
    let ligneGraphFin = document.getElementById("graph_line_find");
    tabPrice.forEach((element) => {
      if (k == 250) {
        graph_y.innerHTML +=
          "<text x='25' y='" + k + "'>" + min.toFixed(1) + "</text>";
      } else if (k < 250) {
        graph_y.innerHTML +=
          "<text x='25' y='" + k + "'>" + min.toFixed(1) + "</text>";
      }
      let point = element - path;
      point = point / 5;
      result.push((point / num2) * 5);

      min = min + num;
      k = k - 50;
    });
    let l = 50;
    let d = "";
    result.forEach((element) => {
      if (l == 50) {
        d += "M " + l + " " + (250 - element) + " ";
      } else {
        d += "L " + l + " " + (250 - element) + " ";
      }
      l += 100;
    });
    ligneGraph.setAttribute("d", d);
    d = d + "L 450 250 L 50 250";
    ligneGraphFin.setAttribute("d", d);
  }, 800);
}

function convertDate(inputFormat) {
  function pad(s) {
    return s < 10 ? "0" + s : s;
  }
  let d = new Date(inputFormat);
  return [pad(d.getDate()), pad(d.getMonth() + 1), d.getFullYear()].join("-");
}
