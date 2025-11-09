function jourTravailler(date) {
  let jourSemaine = date.getDay();

  if (jourSemaine === 6 || jourSemaine === 0) {
    console.log("C'est un week-end")
    return jourSemaine;
  }
  console.log("Le sautres jours de la semaine")
}

jourTravailler(0);