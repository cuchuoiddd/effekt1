var db = require('../database');

var TiviBox = {
    /**
     * Check tồn tại lịch sử học
     * @param user_id
     * @param lecture_id
     * @param callback
     * @constructor
     */
    CheckPost: function (post_id, callback) {
        return db.query("SELECT * FROM fanpage_posts WHERE post_id = ? ", [post_id], callback);
    },

    CheckFanpage: function (page_id, callback) {
        return db.query("SELECT * FROM fanpages WHERE page_id = ? ", [page_id], callback);
    },

    CheckSource: function (source_id, callback) {
        return db.query("SELECT * FROM sources WHERE id = ? ", [source_id], callback);
    },

    CreateCustomer: function (source_id, name, phone, message, user_id, status, created_at, callback) {
        return db.query("INSERT INTO customers (source_id,name,phone,message,user_id,status,created_at,updated_at) VALUES(?, ?, ?, ?, ?,?,?,?)", [source_id, name, phone, message, user_id, status, created_at, created_at], callback);
    },

    UpdateSource: function (source_id, position, callback) {
        return db.query("UPDATE sources SET position = ? WHERE id = ?", [position, source_id], callback);
    },

    DeleteOnline: function (socket_id, callback) {
        return db.query("DELETE FROM onlines WHERE socket_id = ?", [socket_id], callback);
    },
};
module.exports = TiviBox;
