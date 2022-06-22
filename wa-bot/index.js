const { Client, LocalAuth } = require("whatsapp-web.js");
const qrcode = require("qrcode-terminal");
const app = require("express")();

let ready = false;

const client = new Client({
  restartOnAuthFail: true,
  puppeteer: {
    headless: true,
    args: [
      "--no-sandbox",
      "--disable-setuid-sandbox",
      "--disable-dev-shm-usage",
      "--disable-accelerated-2d-canvas",
      "--no-first-run",
      "--no-zygote",
      "--single-process", // <- this one doesn't works in Windows
      "--disable-gpu",
    ],
  },
  authStrategy: new LocalAuth(),
});

client.on("qr", (qr) => {
  qrcode.generate(qr, { small: true }, (res) => {
    console.log(res);
  });
});

client.on("ready", () => {
  console.log("Client is ready!");
  ready = true;
});

app.listen(3000, () => {
  client.initialize().catch(console.log);
  console.log("Listenong port: 3000");
});

app.get("/send_invoice", (req, res) => {
  let { number, tiket, laporan, url_req } =
    req.query;
  number = phoneNumberFormatter(number);

  const template = `Pelanggan Yth,

Berikut Nomor Tiket Laporan Yang Anda Buat : *$tiket*
Laporan gangguan *$laporan*.

Kunjungi $url_req/$tiket untuk Melihat Detail Laporan Anda.

Terima kasih.`;

  const text = template
    .replace(/\$tiket/g, tiket || "__")
    .replace(/\$laporan/g, laporan || "__")
    .replace(/\$url_req/g, url_req || "__");

  if (ready) {
    if (checkRegisteredNumber(number)) {
      client
        .sendMessage(number, text)
        .then((e) => {
          res.json({
            status: "success",
            to: number,
            text: text,
          });
        })
        .catch((err) => {
          res.json({
            status: "error",
            response: err,
          });
        });
    } else {
      res.json({
        status: "error",
        message: "Number is not registered!",
      });
    }
  } else {
    res.json({
      status: "error",
      message: "Bot is not ready yet!",
    });
  }
});

const checkRegisteredNumber = async function (number) {
  const isRegistered = await client.isRegisteredUser(number);
  return isRegistered;
};

const phoneNumberFormatter = function (number) {
  // 1. Menghilangkan karakter selain angka
  let formatted = number.replace(/\D/g, "");

  // 2. Menghilangkan angka 0 di depan (prefix)
  //    Kemudian diganti dengan 62
  if (formatted.startsWith("0")) {
    formatted = "62" + formatted.substr(1);
  }

  if (!formatted.endsWith("@c.us")) {
    formatted += "@c.us";
  }

  return formatted;
};
