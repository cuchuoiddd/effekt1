const model = require("../models/TiviBox");
const axios = require('axios');
require('../constants/SettingTivibox');

/**
 * Nhập liệu khách hàng từ tin nhắn
 *
 * @param phone
 * @param recipientId
 * @param text
 * @param senderId
 * @constructor
 */
exports.SetCustomers = (phone, recipientId, text, senderId) => {

    model.CheckFanpage(recipientId, function (err, rows) {
        if (err) {
            console.log(err, 'err');
        } else {
            if (rows.length > 0) {
//call api get name with PSID
                let url = 'https://graph.facebook.com/v8.0/' + senderId + '/?fields=name&access_token=' + rows[0].access_token;
                var name = 'Customer Facebook';
                axios.get(url).then(response => {
                    name = response.data.name;
                });
                const created_at = new Date();
                model.CheckSource(1, function (err, row2) {
                    if (err) {
                        console.log(err);
                    } else {
                        if (row2.length > 0) {
                            let new_position = 0;
                            let array = JSON.parse(row2[0].sale_id);
                            let user_id = array[row2[0].position];
                            if (row2[0].position < array.length - 1 && array.length > 1) {
                                new_position = row2[0].position + 1;
                            }
                            console.log(new_position)
                            model.UpdateSource(row2[0].id, new_position, function (err) {
                                if (err) {
                                    console.log(err);
                                } else {
                                    model.CreateCustomer(row2[0].id, name, phone, text, user_id, 1, created_at, function (err) {
                                        if (err) {
                                            console.log(err);
                                        } else {
                                            console.log('Them KH thanh cong');
                                        }
                                    })
                                }
                            })
                        }
                    }
                })
//end call
            }
        }
    })
};

/**
 * Nhập liệu khách hàng từ comment bài viết
 *
 * @param phone
 * @param post_id
 * @param text
 * @param sender
 * @constructor
 */
exports.SetComment = (phone, post_id, text, sender) => {

    model.CheckPost(post_id, function (err, rows) {
        if (err) {
            console.log(err, 'err');
        } else {
            if (rows.length > 0) {
                const created_at = new Date();
                model.CreateCustomer(rows[0].source_id, sender, phone, text, 1, 1, created_at, function (err) {
                    if (err) {
                        console.log(err);
                    } else {
                        console.log('Them KH thanh cong');
                    }
                })
            }
        }
    })
};

exports.UpdateTimeOrderOff = (socket_id, io) => {
    model.CheckOnline(socket_id, function (err, rows) {
        if (err) {
            console.log(err);
        } else {
            console.log(rows.length);
            if (rows.length > 0) {
                const now = Math.round(new Date().getTime() / 1000);
                const before = Math.round(rows[0].created_at.getTime() / 1000);
                const time = parseInt(now) - parseInt(before);
                const lecture_id = rows[0].lecture_id;
                const user_id = rows[0].user_id;
                const video_id = rows[0].video_id;
                const created_at = new Date();
                model.UpdateLearn(user_id, lecture_id, video_id, time, created_at);
                console.log('done disconnect');
            } else {
                console.log('Không tìm thấy socket_orders');
            }
        }
    })
};
