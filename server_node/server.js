const app = require("./app");
var controller = require('./controllers/TiviBoxController');
const https = require("https");
// const http = require("http");
const port = process.env.PORT || 2021;

const fs = require('fs');
const key = fs.readFileSync('/etc/letsencrypt/live/tmdt.adamtech.vn/privkey.pem');
const cert = fs.readFileSync('/etc/letsencrypt/live/tmdt.adamtech.vn/cert.pem');
const ca = fs.readFileSync('/etc/letsencrypt/live/tmdt.adamtech.vn/chain.pem');
const options = {
    key: key,
    cert: cert,
    ca: ca
};
const server = https.createServer(options, app);
// const server = http.createServer(app);
const model = require("./models/TiviBox");


app.get('/', (req, res) => {
    res.send("Home page. Server running okay.");
});

app.get('/webhook', function (req, res) {
    if (req.query['hub.verify_token'] === '0975091435') {
        res.send(req.query['hub.challenge']);
    }
    res.send('Error, wrong validation token');
});

app.post('/webhook', function (req, res) {
    var entries = req.body.entry;
    for (var entry of entries) {
        var messaging = entry.messaging;
        if (messaging) {
            for (var message of messaging) {
                var senderId = message.sender.id;
                var recipientId = message.recipient.id;
                if (message.message) {
                    if (message.message.text) {
                        let text = message.message.text;
                        console.log('Noi dung tin nhan', text); // In tin nhắn người dùng
                        res.sendStatus(200);
                        let letr = text.match(/\d+/g);
                        letr.every(function (i) {
                            if (i.length > 9) {
                                controller.SetCustomers(i, recipientId, text, senderId);
                                return false;
                            }
                        })
                    }
                }
            }
        } else {
            var comments = entry.changes;
            for (var value of comments) {
                res.sendStatus(200);
                if (value.value.item === 'comment') {
                    let letr = value.value.message.match(/\d+/g);
                    letr.every(function (i) {
                        if (i.length > 9) {
                            controller.SetComment(i, value.value.post_id, value.value.message, value.value.from.name);
                            return false;
                        }
                    })
                }
            }

        }
    }
});

server.listen(port, "0.0.0.0", function (error) {
    if (error) console.log("Connect error");
    const created_at = new Date();
    console.log("Start server port:", port);
});

