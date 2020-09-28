var mysql=require('mysql');
require('dotenv').config();
var connection=mysql.createPool({

    host:process.env.DB_HOST || 'localhost',
    // user:process.env.DB_USERNAME || 'root',
    user:process.env.DB_USERNAME || 'cms-tmdt',
    password:process.env.DB_PASSWORD || 'cms-tmdt',
    // password:process.env.DB_PASSWORD || '',
    database:process.env.DB_DATABASE || 'TMDT'

});
module.exports=connection;

// var mysql=require('mysql');
// require('dotenv').config();
// var connection=mysql.createPool({
//
//     host:process.env.DB_HOST || 'localhost',
//     user:process.env.DB_USERNAME || 'app-tamly.yez.vn',
//     password:process.env.DB_PASSWORD || 'Vin@123$',
//     database:process.env.DB_DATABASE || 'app-tamly.yez.vn'
//
// });
// module.exports=connection;
