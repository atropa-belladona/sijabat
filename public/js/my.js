function addSeparator(objek) {
  var separator = ".";
  var k = "";
  var m = "";
  var a = objek.value;
  if (a.substring(0, 1) == "-") {
      m = "-";
      a1 = a.replace("-", "");
  } else {
      a1 = a;
  }

  if (a1.search(",") == -1) {
      a2 = a1;
  } else {
      a2 = a1.substring(0, a1.search(","));
      a4 = a.split(",");
      a5 = a4[1].replace(/[^\d]/g, "");
      k = "," + a5.substring(0, 2);
  }

  b = a2.replace(/[^\d]/g, "");
  c = "";
  panjang = b.length;
  j = 0;
  for (i = panjang; i > 0; i--) {
      j = j + 1;
      if (((j % 3) == 1) && (j != 1)) {
          c = b.substr(i - 1, 1) + separator + c;
      } else {
          c = b.substr(i - 1, 1) + c;
      }
  }
  objek.value = m + c + k;
}

function septoint(v0) {
  //var v1=v0.replace(".","");
  //var v2=v1.replace(",",".");
  //return v2;
  return accounting.unformat(v0, ",");
}

function inttosep(v0) {
  //return accounting.formatNumber(v0, 2, ".", ",");
  return accounting.formatMoney(v0, "", 2, ".", ",");
  //return v0;
}

function inttosep0(v0) {
  //return accounting.formatNumber(v0, 2, ".", ",");
  return accounting.formatMoney(v0, "", 0, ".", ",");
  //return v0;
}

function unit_id(v0) {
  var nilai = v0;

  if (nilai >= 1000000000) {
      return (nilai / 1000000000).toFixed(0) + " Milyar";
  } else if (nilai >= 1000000) {
      return (nilai / 1000000).toFixed(0) + " Juta";
  } else if (nilai >= 1000) {
      return (nilai / 1000).toFixed(0) + " Ribu";
  } else {
      return (nilai);
  }
}

function date_format_ddmmyyyy(date){

  if(date == null || date == '')
  {
      return '-';
  }
  
  var date = new Date(date);

  return date.getDate()+'/'+date.getMonth()+'/'+date.getFullYear();
}