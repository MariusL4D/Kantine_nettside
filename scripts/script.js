var updates1 = [
  'Søndags Medisterkaker',
  'Mandags Pasta',
  'Tirsdags Laks',
  'Onsdags Erte Suppe',
  'Torsdags Fiskegrateng',
  'Fredags Taco',
  'Lørdags Kylling Carbonara',
];

var updates2 = [
  'Medisterkakene server med pølser, poter, rødkål og deilig brun saus.',
  'Pastaen serveres med røykt svinekam, sennespsaus, brød og salat.',
  'Laksen serveres med poteter i persillevinagrette og kokte grønnsaker.',
  'Den gule ertesuppe serveres med brød og smør.',
  'Fiskegratengen er laget med røyketorsk, og serveres med råkostsalat og smeltet smør.',
  'Taco alla Andreas med alt det gode til.',
  'Nesten pasta carbonara med kylling.',
];
var date = new Date();
var currentDay = date.getDay();

var update1 = updates1[currentDay];
var updateElement1 = document.getElementById('dagensmiddag');
updateElement1.textContent = update1;

var update2 = updates2[currentDay];
var updateElement2 = document.getElementById('middagsinfo');
updateElement2.textContent = update2;
