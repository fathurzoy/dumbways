// Soal Nomor 2
// Diketahui sebuah array seperti berikut:

// undefined
// Urutkanlah array di atas berdasarkan abjad dari A ke Z. dilarang
// menggunakan build in function array_multisort wajib menggunakan methode quickshort.

var data = [
  ["T", "S", "Q", "P", "R"],
  ["W", "U", "V"],
];

var datalain = [
  ["M", "L", "O", "N"],
  ["T", "S", "Q", "P", "R"],
  ["W", "U", "V"],
];

const sort_array = (args) => {
  const asc = args.sort((a, b) => a.length - b.length);
  // console.log(desc);
  // console.log("")
  for (let i = 0; i < asc.length; i++) {
    array = asc[i];
    console.log(array.sort());
  }
  console.log("");
};

sort_array(data);

sort_array(datalain);
