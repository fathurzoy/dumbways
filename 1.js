// // Soal Nomor 1
// // Ismail berangkat dari rumah menuju ke kantor yang berjarak 64,5km dengan kecepatan 3 m/detik. Tetapi setelah 23 menit kemudian, kecepatan menjadi 5 m/detik. Demikian setelah 12 menit berikutnya kecepatan konstan dengan lebih lambat 3 m/detik dibandingkan 23 menit sebelumnya. Buatlah suatu program untuk menghitung dan mengetahui berapa lama Ismail menempuh perjalanan dalam format Jam, Menit dan Detik dari rumah menuju ke kantornya.
// // 64.5km == 64.500m
// let jarak = 64500;
// let kecepatan1 = 3;
// let kecepatan2 = 5;
// let kecepatan3 = 3;
// let waktu1 = 23;
// let waktu2 = 12;
// let waktu3 = waktu1 - waktu2;
// console.log(waktu3);

// kecepatan1 = (kecepatan1 * 60 * 23) / 1000;
// console.log(kecepatan1);
// kecepatan2 = (kecepatan2 * 60 * 12) / 1000;
// console.log(kecepatan2);
// jarak = jarak - kecepatan1 - kecepatan2;
// console.log(jarak);
// kecepatan3 = (kecepatan3 * 60) / 1000;
// console.log(kecepatan3);
// jarak = jarak / kecepatan3;
// console.log(jarak);

// 64.5km == 64.500m
let jarak = 64500;

let kecepatan1 = 3 * 60;
console.log(kecepatan1);
let kecepatan2 = 5 * 60;
console.log(kecepatan2);
let kecepatan3 = 3 * 60;
console.log(kecepatan3);

let waktu1 = 23;
let waktu2 = 12;
hitung = kecepatan1 * waktu1 + kecepatan2 * waktu2;
sisa = jarak - hitung;
console.log(sisa);

let menit = sisa / 180;
let detik = menit / 60;
console.log(detik);

let hasil = waktu1 + waktu2 + detik;
console.log("jadi sampai " + hasil + " menit");
