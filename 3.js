// Soal Nomor 3
// Mencetak bendera
// Anda diberi sebuah array yaitu $string = [‘D’,’U’,’M’,’B’,’W’,’A’,’Y’,’S’,’I’,’D’];
// Buatlah sebuah function yang memproses array diatas sehingga jika dijalankan akan mencetak gambar seperti dibawah ini.
// Catatan: Harus menggunakan perulangan jangan hardcode/ditulis langsung.

const string = ["D", "U", "M", "B", "W", "A", "Y", "S", "I", "D"];

let p = 7;
for (let i = 1; i <= p; i++) {
  var middle = Math.floor(p / 2 + 1);
  // console.log(middle);
  var middle1 = Math.floor(p / 2);
  // console.log(middle1);
  var middle2 = Math.floor(p / 2 + 2);
  // console.log(middle2);
  if (i == middle) {
    console.log(string.join(" "));
  } else if (i == middle1) {
    let code = [];
    for (let j = 0; j < string.length; j++) {
      if (j % 2 == 0) {
        code.push("*");
      } else {
        code.push("=");
      }
    }
    console.log(code.join(" "));
  } else if (i == middle2) {
    let code = [];
    for (let j = 0; j < string.length; j++) {
      if (j % 2 == 0) {
        code.push("*");
      } else {
        code.push("=");
      }
    }
    console.log(code.join(" "));
  } else {
    let code = [];
    for (let j = 0; j < string.length; j++) {
      if (j % 2 == 0) {
        code.push("=");
      } else {
        code.push("*");
      }
    }
    console.log(code.join(" "));
  }
}

// var arr = ["D", "U", "M", "B", "W", "A", "Y", "S", "I", "D"];

// console.log(arr.join(" "));
